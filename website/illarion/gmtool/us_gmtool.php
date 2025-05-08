<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_pages.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/shared/def_gmtool.php' );

	if (!IllaUser::loggedIn())
	{
		IllaUser::requireLogin();
	}

	if (!IllaUser::auth('gmtool_chars') && !IllaUser::auth('gmtool_accounts') && !IllaUser::auth('gmtool_raceapplys') && !IllaUser::auth('gmtool_namecheck') && !IllaUser::auth('gmtool_gms') && !IllaUser::auth('gmtool_pages'))
	{
		Messages::add('Access not granted', 'error');
		includeWrapper::includeOnce( Page::getRootPath().'/general/us_startpage.php' );
		exit();
	}

	$pagecount = countGmPages();

	Page::setTitle( array( 'GM Tool', 'Overview' ) );
	Page::setDescription( 'On this page is an overview of all of the functions the GM Tool offers you.' );
	Page::setKeywords( array( 'GM Tool', 'Overview', 'administration' ) );

	Page::setXHTML();
	Page::Init();
	
?>
<h1>GM Tool</h1>

<h2>Overview over the active functions</h2>

<?php if (IllaUser::auth('gmtool_chars') || IllaUser::auth('gmtool_accounts')): ?>
<fieldset style="background: transparent url(<?php echo IllarionData::getItemPicture(336); ?>) scroll no-repeat 15px center;">
	<legend>Search</legend>
	<ul style="list-style-type:none;padding-left:50px;">
		<?php if (IllaUser::auth('gmtool_accounts')): ?>
		<li><a href="<?php echo $url; ?>/illarion/gmtool/us_search_accounts.php">Search for accounts</a></li>
		<?php endif; ?>
		<?php if (IllaUser::auth('gmtool_chars')): ?>
		  <li><a href="<?php echo $url; ?>/illarion/gmtool/us_search_chars.php">Search for characters</a></li>
		<?php endif; ?>
	</ul>
</fieldset>

<div style="height:15px;"></div>
<?php endif; ?>

<?php if (IllaUser::auth('gmtool_pages')): ?>
<fieldset style="background: transparent url(<?php echo IllarionData::getItemPicture(2745); ?>) scroll no-repeat 15px center;">
    <legend>GM Pages</legend>
    <ul style="list-style-type:none;padding-left:50px;">
        <li>
            <a href="<?php echo $url; ?>/illarion/gmtool/us_pages.php?filter=<?php echo PAGE_STATUS_NEW; ?>">New</a>
            <?php if ( $pagecount['pages_new'] > 0 ): ?><span style="color:lime;font-weight:bold;"><?php else: ?><span><?php endif; ?>
                (<?php echo $pagecount['pages_new']; ?>)
            </span>
        </li>
        <li>
            <a href="<?php echo $url; ?>/illarion/gmtool/us_pages.php?filter=<?php echo PAGE_STATUS_IN_WORK; ?>">In Progress</a>
            <span>(<?php echo $pagecount['pages_in_work']; ?>)</span>
        </li>
        <li>
            <a href="<?php echo $url; ?>/illarion/gmtool/us_pages.php?filter=<?php echo PAGE_STATUS_DONE; ?>">Completed</a>
            <span>(<?php echo $pagecount['pages_done']; ?>)</span>
        </li>
        <li>
            <a href="<?php echo $url; ?>/illarion/gmtool/us_pages.php?filter=<?php echo PAGE_STATUS_ARCHIVE; ?>">Archived</a>
            <span>(<?php echo $pagecount['pages_archiv']; ?>)</span>
        </li>
		<li>
            <a href="<?php echo $url; ?>/illarion/gmtool/us_pages_log.php">Log</a>
        </li>
    </ul>
</fieldset>

<div style="height:15px;"></div>
<?php endif; ?>


<?php if (IllaUser::auth('gmtool_gms')): ?>
<fieldset style="background: transparent url(<?php echo IllarionData::getItemPicture(3109); ?>) scroll no-repeat 15px center;">
	<legend>Admin Tools</legend>
		<ul style="list-style-type:none;padding-left:50px;">
		<li><a href="<?php echo $url; ?>/illarion/gmtool/us_gms.php">Edit Gamemasters</a></li>
	</ul>
</fieldset>
<?php endif; ?>
