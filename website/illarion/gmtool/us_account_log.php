<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_topmenu.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_accountmenu.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_account.php' );

	if (!IllaUser::auth('gmtool_accounts'))
	{
		Messages::add( (Page::isGerman() ? 'Zugriff verweigert' : 'Access denied'), 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/us_gmtool.php' );
		exit();
	}

	Page::setTitle( array( 'GM Tool', 'Account Log' ) );
    Page::setDescription( 'Account Log Overview' );
    Page::setKeywords( array( 'GM Tool', 'Account', 'Log', 'Overview') );

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

	$loglist = getLogs( $accid );

?>

<h1>Account Log - <?php echo $account_login; ?></h1>

<?php include_menu(); ?>

<div class="spacer"></div>

<?php include_account_menu( $accid, 1 ); ?>

<div class="spacer"></div>
<table style="width:100%;text-align:center;">
    <thead>
        <tr>
            <th style="width:20px;">ID</th>
            <th style="width:20px;">Date</th>
            <th style="width:20px;">Added By</th>
            <th>Message</th>
            <th style="width:20px;">Type</th>
        </tr>
    </thead>
    <tbody>
		<?php if (count($loglist) == 0)
		{ ?> 
			<tr><td style='height:50px;text-align:center;' colspan='5'>No Logs Available.</td></tr>
	<?php } else { ?>
        	<?php foreach ($loglist as $key=>$log): ?>
			<?php $class = ( $log['al_type']==ACC_LOG_TYPE_ADMONISHMENT) ? "rowerror" : "row".(($key+1)%2); ?>
        	<tr class="<?php echo $class; ?>">
        	    <td><?php echo $log['al_id']; ?></td>
        	    <td><?php echo convertDBTime($log['al_time']); ?></td>
        	    <td class='center'><?php echo $log['acc_name']; ?></td>
        	    <td><?php echo $log['al_message']; ?></td>
        	    <td class='center'><?php echo getLogTypeString($log['al_type']); ?></td>
        	</tr>
        	<?php endforeach; ?>
		<?php } ?>
    </tbody>
</table>
