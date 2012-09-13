<?php
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php' );
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/shared/illarion_data.php' );
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/inc_topmenu.php' );
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/inc_accountmenu.php' );
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/inc_account.php' );

	if (!IllaUser::auth('gmtool_accounts'))
	{
		Messages::add('Zugriff verweigert', 'error');
		include_once( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/de_gmtool.php' );
		exit();
	}

    Page::setTitle( array( 'GM-Tool', 'Account' ) );
    Page::setDescription( 'Hier befindet sich eine Übersicht die Notizen zu dem Account' );
    Page::setKeywords( array( 'GM-Tool', 'Account', 'Notizen' ) );

    Page::addCSS( array( 'menu', 'gmtool' ) );

    Page::setXHTML();
    Page::Init();

	$accid = ( is_numeric($_GET['id']) ? (int)$_GET['id'] : 0 );
	if (!$accid)
	{
		Messages::add('Account ID wurde nicht richtig übergeben', 'error');
		include_once( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$account_login = getAccountLogin( $accid );
	if (!$account_login || !strlen($account_login))
	{
		Messages::add('Account wurde nicht gefunden', 'error');
		include_once( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/de_gmtool.php' );
		exit();
	}

?>

<h1>Notizen und Warnungen - <?php echo $account_login; ?></h1>

<?php include_menu(); ?>

<div class="spacer"></div>

<?php include_account_menu( $accid, 4 ); ?>

<div class="spacer"></div>

<h2>Notizen</h2>

<form action="<?php echo $url; ?>/illarion/gmtool/de_account_notes.php?id=<?php echo $accid; ?>" method="post" id="note_form">
	<p><textarea name="entry" rows="5" cols="60"></textarea></p>
	<p>
		<input type="submit" value="Neue Notiz eintragen" name="submit" />
		<input type="hidden" name="action" value="account_notes" />
		<input type="hidden" name="method" value="add" />
		<input type="hidden" name="id" value="1" />
	</p>
</form>

<h2>Verwarnungen</h2>

<form action="<?php echo $url; ?>/illarion/gmtool/de_account_notes.php?id=<?php echo $accid; ?>" method="post" id="warn_form">
	<p><textarea name="entry" rows="5" cols="60"></textarea></p>
	<p>
		<input type="submit" value="Neue Verwarnung eintragen" name="submit" />
		<input type="hidden" name="action" value="account_notes" />
		<input type="hidden" name="method" value="add" />
		<input type="hidden" name="id" value="2" />
	</p>
</form>

