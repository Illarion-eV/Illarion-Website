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

    Page::setTitle( array( 'GM-Tool', 'Account', $account_data['acc_login'] ) );
    Page::setDescription( 'Hier befindet sich eine Übersicht den Status des Accounts "'.$account_data['acc_login'].'"' );
    Page::setKeywords( array( 'GM-Tool', 'Account', 'Einstellungen', $account_data['acc_login'] ) );

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

	list($account_name,$account_state) = getAccountNameAndState( $accid );
	if (!$account_name || !strlen($account_name))
	{
		Messages::add('Account wurde nicht gefunden', 'error');
		include_once( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/de_gmtool.php' );
		exit();
	}
?>

<h1>Status - <?php echo $account_name; ?></h1>

<?php include_menu(); ?>

<div class="spacer"></div>

<?php include_account_menu( $accid, 3 ); ?>

<div class="spacer"></div>

<form action="<?php echo $url; ?>/illarion/gmtool/de_account_status.php?id=<?php echo $accid; ?>" method="post" id="statusForm">
	<h3>Accountstatus</h3>
	<ul style="list-style: none;">
		<?php foreach( array(0,3,7,8) as $status ): ?>
		<li>
			<input type="radio" name="status"<?php echo ($status == $account_state ? ' checked="checked"' : ''); ?> id="status<?php echo $status; ?>" value="<?php echo $status; ?>" />
			<label for="status<?php echo $status; ?>"><?php echo getAccountStatusName( $status ); ?></label>
		</li>
		<?php endforeach; ?>
	</ul>

	<h3>Grund für die Statusänderung</h3>
	<p>
		<textarea cols="60" rows="6" name="reason"></textarea>
	</p>
	<p>
		<input type="submit" name="submit" value="Status ändern" />
		<input type="hidden" name="action" value="account_status" />
	</p>
</form>

