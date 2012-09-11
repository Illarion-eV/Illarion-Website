<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';
	includeWrapper::includeOnce( $_SERVER['DOCUMENT_ROOT'].'/illarion/gmtool/inc_topmenu.php' );
	includeWrapper::includeOnce( $_SERVER['DOCUMENT_ROOT'].'/illarion/gmtool/inc_accountmenu.php' );
	includeWrapper::includeOnce( $_SERVER['DOCUMENT_ROOT'].'/illarion/gmtool/inc_account.php' );

	if (!IllaUser::auth('gmtool_accounts'))
	{
		Messages::add('Zugriff verweigert', 'error');
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	Page::setTitle( array( 'GM-Tool', 'Accountlog', $account_name ) );
    Page::setDescription( 'Accountlog Übersicht zu "'.$account_name.'"' );
    Page::setKeywords( array( 'GM-Tool', 'Account', 'Log', 'Übersicht', $account_name ) );

    Page::addCSS( array( 'menu', 'gmtool' ) );

    Page::setXHTML();
    Page::Init();

	$accid = ( is_numeric($_GET['id']) ? (int)$_GET['id'] : 0 );
	if (!$accid)
	{
		Messages::add('Account ID wurde nicht richtig übergeben', 'error');
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$account_name = getAccountName( $accid );
	if (!$account_name || !strlen($account_name))
	{
		Messages::add('Account wurde nicht gefunden', 'error');
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$loglist = getLogs( $accid );

/*
	echo "<pre>";
	print_r($loglist);
	echo "</pre>";
*/
?>

<h1>Accountlog - <?php echo $account_name; ?></h1>

<?php include_menu(); ?>

<div class="spacer"></div>

<?php include_account_menu( $accid, 5 ); ?>

<div class="spacer"></div>
<table style="width:100%;text-align:center;">
    <thead>
        <tr>
            <th style="width:20px;">ID</th>
            <th style="width:20px;">Datum</th>
            <th style="width:20px;">Verantwortlich</th>
            <th>Nachricht</th>
            <th style="width:20px;">Typ</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($loglist as $key=>$log): ?>
		<?php $class = ( $log['al_type']==2) ? "rowerror" : "row".(($key+1)%2); ?>
        <tr class="<?php echo $class; ?>">
            <td><?php echo $log['al_id']; ?></td>
            <td><?php echo convertDBTime($log['al_time']); ?></td>
            <td class='center'><?php echo $log['acc_name']; ?></td>
            <td><?php echo $log['al_message']; ?></td>
            <td class='center'><?php echo getLogTypeString($log['al_type']); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
