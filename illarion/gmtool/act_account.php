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

	$new_name   = ( strlen($_POST['name']) > 0 ? (string)$_POST['name'] : null );
	$new_mail   = ( strlen($_POST['email']) > 0 ? (string)$_POST['email'] : false );
	$new_limit  = ( isset($_POST['charlimit']) ? (int)$_POST['charlimit'] : false );
	$new_length = ( (int)$_POST['length'] == 0 ? 0 : 1 );
	$new_weight = ( (int)$_POST['weight'] == 0 ? 0 : 1 );
	$new_lang   = ( (int)$_POST['lang'] == 0 ? 0 : 1 );
	$new_dst    = ( (int)$_POST['dst'] == 0 ? 0 : 1 );

	$new_offset = ( is_numeric($_POST['timezone']) ? (float)$_POST['timezone'] : 0 );
	$new_offset = (int)($new_offset*100);

	$new_passwd = ( strlen($_POST['passwd']) > 0 ? (string)$_POST['passwd'] : false );
	if ($new_passwd && substr($new_passwd,0,12) != '$1$illarion$')
	{
		$new_passwd = crypt(stripslashes($new_passwd), '$1$illarion1');
	}

	$mySQL =& Database::getMySQL();
	$pgSQL =& Database::getPostgreSQL( 'accounts' );

	$query = "UPDATE `homepage_user`"
	. "\n SET `name` = ".$mySQL->Quote( $new_name )
	. ( $new_mail ? ", `email` = ".$mySQL->Quote( $new_mail ) : '' )
	. ( $new_limit ? ", `charlimit` = ".$mySQL->Quote( $new_limit ) : '' )
	. ", `length` = ".$mySQL->Quote( $new_length )
	. ", `weight` = ".$mySQL->Quote( $new_weight )
	. ", `time_offset` = ".$mySQL->Quote( $new_offset )
	. ", `dst` = ".$mySQL->Quote( $new_dst )
	. ", `lastseen` = `lastseen`"
	. ( $new_limit ? ", `passwd` = ".$mySQL->Quote( $new_passwd ) : '' )
	. "\n WHERE `id` = ".$mySQL->Quote( $accid )
	;
	$mySQL->setQuery( $query );

	$query = "UPDATE account"
	. "\n SET acc_lang = ".$pgSQL->Quote( $new_lang )
	. ", acc_passwd = ".$pgSQL->Quote( $new_passwd )
	. "\n WHERE acc_id = ".$pgSQL->Quote( $accid )
	;
	$pgSQL->setQuery( $query );

	if ($mySQL->query() && $pgSQL->query())
	{
		Messages::add(($language=='de'?'Änderungen wurden gespeichert':'Changes got saved'), 'info');
	}
	else
	{
		Messages::add(($language=='de'?'Fehler beim speichern der Daten':'Error while saving data'), 'error');
	}
?>