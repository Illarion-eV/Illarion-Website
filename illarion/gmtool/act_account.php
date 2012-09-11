<?php
	if (!IllaUser::auth('gmtool_accounts'))
	{
		Messages::add(($language=='de'?'Zugriff verweigert':'Access denieded'), 'error');
		include_once( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$accid = ( is_numeric($_GET['id']) ? (int)$_GET['id'] : 0 );

	if (!$accid)
	{
		Messages::add(($language=='de'?'Account ID wurde nicht richtig übergeben':'Account ID was not transfered correctly'), 'error');
		include_once( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$new_name   = ( strlen($_POST['acc_name']) > 0 ? (string)$_POST['acc_name'] : null );
	$new_mail   = ( strlen($_POST['acc_email']) > 0 ? (string)$_POST['acc_email'] : false );
	$new_limit  = ( isset($_POST['acc_maxchars']) ? (int)$_POST['acc_maxchars'] : false );
	$new_lang   = ( (int)$_POST['acc_lang'] == 0 ? 0 : 1 );
	$new_dst    = ( (int)$_POST['acc_dst'] == 0 ? 0 : 1 );
	$new_weight = $_POST['acc_weight'];
	$new_length = $_POST['acc_length'];

	$new_offset = ( is_numeric($_POST['timezone']) ? (float)$_POST['timezone'] : 0 );
	$new_offset = (int)($new_offset*100);

	$new_passwd = ( strlen($_POST['acc_passwd']) > 0 ? (string)$_POST['acc_passwd'] : false );
	if ($new_passwd && substr($new_passwd,0,12) != '$1$illarion$')
	{
		$new_passwd = crypt(stripslashes($new_passwd), '$1$illarion1');
	}

	$pgSQL =& Database::getPostgreSQL( 'accounts' );

	$query = "UPDATE account"
	. "\n SET acc_name = ".$pgSQL->Quote( $new_name )
		. ( $new_mail ? ", acc_email = ".$pgSQL->Quote( $new_mail ) : '' )
		. ( $new_limit ? ", acc_maxchars = ".$pgSQL->Quote( $new_limit ) : '' )
		. ", acc_length = ".$pgSQL->Quote( $new_length )
		. ", acc_weight = ".$pgSQL->Quote( $new_weight )
		. ", acc_timeoffset = ".$pgSQL->Quote( $new_offset )
		. ", acc_lang = ".$pgSQL->Quote( $new_lang )	
		. ", acc_dst = ".$pgSQL->Quote( $new_dst )
		. ", acc_lastseen = acc_lastseen"
		. ( $new_limit ? ", acc_passwd = ".$pgSQL->Quote( $new_passwd ) : '' )
		. "\n WHERE acc_id = ".$pgSQL->Quote( $accid )
	;

	$pgSQL->setQuery( $query );

	if ($pgSQL->query())
	{
		Messages::add(($language=='de'?'Änderungen wurden gespeichert':'Changes got saved'), 'info');
	}
	else
	{
		Messages::add(($language=='de'?'Fehler beim speichern der Daten':'Error while saving data'), 'error');
	}
?>
