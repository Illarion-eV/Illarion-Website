<?php
    include_once ( $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php' );
    includeWrapper::includeOnce( Page::getRootPath().'/shared/illarion_data.php' );
    includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_topmenu.php' );
    includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_accountmenu.php' );
    includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_account.php' );

    if (!IllaUser::auth('gmtool_accounts'))
    {
        Messages::add('Access denied', 'error');
        includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/us_gmtool.php' );
        exit();
    }

    $accid = ( is_numeric($_GET['accid']) ? (int)$_GET['accid'] : 0 );
    if (!$accid)
    {
        Messages::add('Account ID was not transferred correctly', 'error');
        includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/us_gmtool.php' );
        exit();
    }

    list($account_login,$account_state) = getAccountLoginAndState( $accid );
    if (!$account_login || !strlen($account_login))
    {
        Messages::add('Account not found', 'error');
        includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/us_gmtool.php' );
        exit();
    }

    if ($_POST['action'] == 'account_status')
    {
        $new_status = (int)$_POST['status'];
        $reason     = trim($_POST['reason']);

        if (!in_array($new_status, array(0,3,7,8)))
        {
            Messages::add('Invalid account status selected', 'error');
        }
        else
        {
            if (changeAccountStatus($accid, $new_status, $reason))
            {
                Messages::add('Account status changed successfully', 'info');
            }
            else
            {
                Messages::add('Failed to change account status', 'error');
            }
        }
    }

    Page::setTitle( array( 'GM-Tool', 'Account', 'Status' ) );
    Page::setDescription( 'Change the status of an account' );
    Page::setKeywords( array( 'GM-Tool', 'Account', 'Status' ) );

    Page::addCSS( array( 'menu', 'gmtool' ) );

    Page::setXHTML();
    Page::Init();
?>

<h1>Status - <?php echo $account_login; ?></h1>

<?php include_menu(); ?>

<div class="spacer"></div>

<?php include_account_menu( $accid, 3 ); ?>

<div class="spacer"></div>

<form action="<?php echo $url; ?>/illarion/gmtool/us_account_status.php?accid=<?php echo $accid; ?>" method="post" id="statusForm">
    <h3>Account Status</h3>
    <ul style="list-style: none;">
        <?php foreach( array(0,3,7,8) as $status ): ?>
        <li>
            <input type="radio" name="status"<?php echo (isset($_POST['status']) ? ($_POST['status']==$status ? ' checked="checked"' : '') : ($status == $account_state ? ' checked="checked"' : '')); ?> id="status<?php echo $status; ?>" value="<?php echo $status; ?>" />
            <label for="status<?php echo $status; ?>"><?php echo getAccountStatusName( $status ); ?></label>
        </li>
        <?php endforeach; ?>
    </ul>

    <h3>Reason for status change</h3>
    <p>
        <textarea cols="60" rows="6" name="reason"><?php echo (isset($_POST['reason']) ? $_POST['reason'] : ""); ?></textarea>
    </p>
    <p>
        <input type="submit" name="submit" value="Change status" />
        <input type="hidden" name="action" value="account_status" />
    </p>
</form>