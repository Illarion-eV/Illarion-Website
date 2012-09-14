<?php
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php' );
    includeWrapper::includeOnce( Page::getRootPath().'/shared/illarion_data.php' );
    includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_topmenu.php' );
    includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_accountmenu.php' );
    includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_account.php' );


	if (!IllaUser::auth('gmtool_accounts'))
	{
		Messages::add( (Page::isGerman() ? 'Zugriff verweigert' : 'Access denied'), 'error' );
        includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

    Page::setTitle( array( 'GM-Tool', 'Account' ) );
    Page::setDescription( 'Hier befindet sich eine Übersicht den Status des Accounts' );
    Page::setKeywords( array( 'GM-Tool', 'Account', 'Einstellungen' ) );

    Page::addCSS( array( 'menu', 'gmtool' ) );

    Page::setXHTML();
    Page::Init();


	$accid = ( is_numeric($_GET['accid']) ? (int)$_GET['accid'] : 0 );
	if (!$accid)
	{
		Messages::add( (Page::isGerman() ? 'Account ID wurde nicht richtig übergeben' : 'Account ID was not transfered correctly'), 'error' );	
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	list($account_login,$account_state) = getAccountLoginAndState( $accid );
	if (!$account_login || !strlen($account_login))
	{
		Messages::add( (Page::isGerman() ? 'Account wurde nicht gefunden' : 'Account not found'), 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}
?>

<h1>Status - <?php echo $account_login; ?></h1>

<?php include_menu(); ?>

<div class="spacer"></div>

<?php include_account_menu( $accid, 3 ); ?>

<div class="spacer"></div>

<form action="<?php echo $url; ?>/illarion/gmtool/de_account_status.php?accid=<?php echo $accid; ?>" method="post" id="statusForm">
	<h3>Accountstatus</h3>
	<ul style="list-style: none;">
		<?php foreach( array(0,3,7,8) as $status ): ?>
		<li>
			<input type="radio" name="status"<?php echo (isset($_POST['status']) ? ($_POST['status']==$status ? ' checked="checked"' : '') : ($status == $account_state ? ' checked="checked"' : '')); ?> id="status<?php echo $status; ?>" value="<?php echo $status; ?>" />
			<label for="status<?php echo $status; ?>"><?php echo getAccountStatusName( $status ); ?></label>
		</li>
		<?php endforeach; ?>
	</ul>

	<h3>Grund für die Statusänderung</h3>
	<p>
		<textarea cols="60" rows="6" name="reason"><?php echo (isset($_POST['reason']) ? $_POST['reason'] : ""); ?></textarea>
	</p>
	<p>
		<input type="submit" name="submit" value="Status ändern" />
		<input type="hidden" name="action" value="account_status" />
	</p>
</form>

