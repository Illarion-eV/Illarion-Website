<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_gmtool.php' );

	if (!IllaUser::loggedIn())
	{
		IllaUser::requireLogin();
	}

	if (!IllaUser::auth('gmtool_chars') && !IllaUser::auth('gmtool_accounts') && !IllaUser::auth('gmtool_raceapplys') && !IllaUser::auth('gmtool_namecheck') && !IllaUser::auth('gmtool_gms') && !IllaUser::auth('gmtool_pages'))
	{
		Messages::add('Access not granded', 'error');
		includeWrapper::includeOnce( Page::getRootPath().'/general/us_startpage.php' );
		exit();
	}

	$pendingwork = getPendingWork();

	Page::setTitle( array( 'GM-Tool', 'Overview' ) );
	Page::setDescription( 'On this page you see a overview of all functions the GM-Tool offers you.' );
	Page::setKeywords( array( 'GM-Tool', 'Overview', 'administration' ) );

	Page::setXHTML();
	Page::Init();
?>

<h1>GM-Tool</h1>

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

<?php if (IllaUser::auth('gmtool_raceapplys') || IllaUser::auth('gmtool_namecheck')): ?>
<fieldset style="background: transparent url(<?php echo IllarionData::getItemPicture(3109); ?>) scroll no-repeat 15px center;">
	<legend>Account work</legend>
	<ul style="list-style-type:none;padding-left:50px;">
		<?php if (IllaUser::auth('gmtool_raceapplys')): ?>
		<li>
			<a href="<?php echo $url; ?>/illarion/gmtool/us_raceapplies.php">Handle race applies</a>
			<?php if ( $pendingwork['apply_checks'] > 0 ): ?><span style="color:red;font-weight:bold;"><?php else: ?><span><?php endif; ?>
				(<?php echo $pendingwork['apply_checks']; ?>)
			</span>
		</li>
		<?php endif; ?>
		<?php if (IllaUser::auth('gmtool_namecheck')): ?>
		<li>
			<a href="<?php echo $url; ?>/illarion/gmtool/us_namecheck.php">Handle name checks</a>
			<?php if ( $pendingwork['name_checks'] > 0 ): ?><span style="color:red;font-weight:bold;"><?php else: ?><span><?php endif; ?>
				(<?php echo $pendingwork['name_checks']; ?>)
			</span>
		</li>
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
			<a href="<?php echo $url; ?>/illarion/gmtool/us_pages.php?filter=0">New GM pages</a>
			<?php if ( $pendingwork['pages_new'] > 0 ): ?><span style="color:red;font-weight:bold;"><?php else: ?><span><?php endif; ?>
				(<?php echo $pendingwork['pages_new']; ?>)
			</span>
		</li>
		<li>
			<a href="<?php echo $url; ?>/illarion/gmtool/us_pages.php?filter=1">GM pages in work</a>
			<span>(<?php echo $pendingwork['pages_inwork']; ?>)</span>
		</li>
		<li>
			<a href="<?php echo $url; ?>/illarion/gmtool/us_pages.php?filter=2">GM Pages done</a>
			<span>(<?php echo $pendingwork['pages_done']; ?>)</span>
		</li>
		<li>
			<a href="<?php echo $url; ?>/illarion/gmtool/us_pages.php?filter=3">Archived GM pages</a>
			<span>(<?php echo $pendingwork['pages_archiv']; ?>)</span>
		</li>
	</ul>
</fieldset>

<div style="height:15px;"></div>
<?php endif; ?>