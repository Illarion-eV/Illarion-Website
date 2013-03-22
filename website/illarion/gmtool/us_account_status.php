<?php
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php' );
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/shared/illarion_data.php' );
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/inc_topmenu.php' );
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/inc_accountmenu.php' );
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/inc_account_status.php' );

	if (!IllaUser::auth('gmtool_accounts'))
	{
		Messages::add('Access denided', 'error');
		include_once( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/us_gmtool.php' );
		exit();
	}

	$accid = ( is_numeric($_GET['id']) ? (int)$_GET['id'] : 0 );
	if (!$accid)
	{
		Messages::add('Account ID was not transfered correctly', 'error');
		include_once( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/us_gmtool.php' );
		exit();
	}

	list($account_name,$account_state) = getAccountData( $accid );
	if (!$account_name || !strlen($account_name))
	{
		Messages::add('Account was not found', 'error');
		include_once( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/us_gmtool.php' );
		exit();
	}

	create_header( 'Illarion - GM-Tool - Status - '.$account_name,
	'On this page the status of the account '.$account_name.' can be seen and changed',
	'GM-Tool, Account, Status, '.$account_name, '', 'menu,gmtool', '', true );
	include_header();
?>

<h1>Status - <?php echo $account_name; ?></h1>

<?php include_menu(); ?>

<div class="spacer"></div>

<?php include_account_menu( $accid, 3 ); ?>

<div class="spacer"></div>

<form action="<?php echo $url; ?>/illarion/gmtool/us_account_status.php?id=<?php echo $accid; ?>" method="post" id="statusForm">
	<h3>Accountstatus</h3>
	<ul style="list-style: none;">
		<?php foreach( array(0,3,7,8) as $status ): ?>
		<li>
			<input type="radio" name="status"<?php echo ($status == $account_state ? ' checked="checked"' : ''); ?> id="status<?php echo $status; ?>" value="<?php echo $status; ?>" />
			<label for="status<?php echo $status; ?>"><?php echo getAccountStatusName( $status ); ?></label>
		</li>
		<?php endforeach; ?>
	</ul>

	<h3>Reason for status change</h3>
	<p>
		<textarea cols="60" rows="6" name="reason"></textarea>
	</p>
	<p>
		<input type="submit" name="submit" value="Changed status" />
		<input type="hidden" name="action" value="account_status" />
	</p>
</form>

<?php include_footer(); ?>