<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_topmenu.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_accountmenu.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_account.php' );
	includeWrapper::requireOnce(Page::getRootPath() . '/shared/rights_groups.php');

	if (!IllaUser::auth('gmtool_change_rights'))
	{
		Messages::add( (Page::isGerman() ? 'Zugriff verweigert' : 'Access denied'), 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}


	Page::setTitle( array( 'GM-Tool', 'Account', 'Berechtigungen' ) );
    Page::setDescription( 'Account Permissions Overview' );
    Page::setKeywords( array( 'GM Tool', 'Account', 'Permissions' ) );

    Page::addCSS( array( 'menu', 'gmtool' ) );

    Page::setXHTML();
    Page::Init();

	$accid = ( is_numeric($_GET['accid']) ? (int)$_GET['accid'] : 0 );
	if (!$accid)
	{
		Messages::add( (Page::isGerman() ? 'Account ID wurde nicht richtig übergeben' : 'Account ID was not transferred correctly'), 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}


	$account_data = getAccountData( $accid );
	if (!$account_data || !count($account_data))
	{
		Messages::add( (Page::isGerman() ? 'Account wurde nicht gefunden' : 'Account not found'), 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$groups = getGroupArray();

	$acc_groups = getAccGroups($accid);
	
	

/*
echo "<pre>";
//print_r($groups);
print_r($acc_groups);
echo "</pre>";
*/
?>

<h1>Account - <?php echo $account_data['acc_login']; ?></h1>

<?php include_menu(); ?>

<div class="spacer"></div>

<?php include_account_menu( $account_data['acc_id'], 5 ); ?>

<div class="spacer"></div>

<form action="<?php echo Page::getURL(); ?>/illarion/gmtool/de_account_rights.php?accid=<?php echo $account_data['acc_id']; ?>" method="post">
    <div>
        <dl class="gmtool">
            <?php foreach ($groups as $group) : ?>
                <dt><?php
					echo "<input type='checkbox' name='".$group['g_id']."' class='checkbox' value='".$group['g_id']."' id='".$group['g_id']."'";
					echo (in_array($group['g_id'], $acc_groups) ? ' checked="checked"' : '');
					echo "/>";
					?>
                    <label for="<?php echo $group['g_id']; ?>"><?php echo (Page::isGerman() ? $group['g_name_de'] : $group['g_name_us']); ?></label>
                </dt>
                <dd>
					<?php echo getRightStringList($group['g_rights']); ?>
                </dd>
			<div class="spacer"></div>
            <?php endforeach ?>
		</dl>
		<div class="spacer" />
        <input type="submit" name="submit" value="Save Changes" />
        <input type="hidden" name="action" value="account_rights" />
	</div>
</form>















