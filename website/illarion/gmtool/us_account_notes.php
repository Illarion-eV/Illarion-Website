<?php
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/shared/illarion_data.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_topmenu.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_accountmenu.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_account.php' );

	if (!IllaUser::auth('gmtool_accounts'))
	{
		Messages::add( (Page::isGerman() ? 'Zugriff verweigert' : 'Access denied'), 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/us_gmtool.php' );
		exit();
	}

    Page::setTitle( array( 'GM Tool', 'Account' ) );
    Page::setDescription( 'Account Notes Overview' );
    Page::setKeywords( array( 'GM Tool', 'Account', 'Notes' ) );

    Page::addCSS( array( 'menu', 'gmtool' ) );

    Page::setXHTML();
    Page::Init();

	$accid = ( is_numeric($_GET['accid']) ? (int)$_GET['accid'] : 0 );
	if (!$accid)
	{
		Messages::add( (Page::isGerman() ? 'Account ID wurde nicht richtig übergeben' : 'Account ID was not transferred correctly'), 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/us_gmtool.php' );
		exit();
	}

	$account_login = getAccountLogin( $accid );
	if (!$account_login || !strlen($account_login))
	{
		Messages::add( (Page::isGerman() ? 'Account wurde nicht gefunden' : 'Account not found'), 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/us_gmtool.php' );
		exit();
	}

?>

<h1>Notes and Warnings - <?php echo $account_login; ?></h1>

<?php include_menu(); ?>

<div class="spacer"></div>

<?php include_account_menu( $accid, 4 ); ?>

<div class="spacer"></div>

<h2>Notes</h2>

<form action="<?php echo $url; ?>/illarion/gmtool/us_account_notes.php?accid=<?php echo $accid; ?>" method="post" id="note_form">
	<p><textarea name="entry" rows="5" cols="60"></textarea></p>
	<p>
		<input type="submit" value="Add New Note" name="submit" />
		<input type="hidden" name="action" value="account_notes" />
		<input type="hidden" name="method" value="add" />
		<input type="hidden" name="id" value="1" />
	</p>
</form>

<h2>Warnings</h2>

<form action="<?php echo $url; ?>/illarion/gmtool/us_account_notes.php?accid=<?php echo $accid; ?>" method="post" id="warn_form">
	<p><textarea name="entry" rows="5" cols="60"></textarea></p>
	<p>
		<input type="submit" value="Add New Warning" name="submit" />
		<input type="hidden" name="action" value="account_notes" />
		<input type="hidden" name="method" value="add" />
		<input type="hidden" name="id" value="2" />
	</p>
</form>

