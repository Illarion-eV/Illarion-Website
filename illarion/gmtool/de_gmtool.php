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
		Messages::add('Zugriff verweigert', 'error');
		includeWrapper::includeOnce( Page::getRootPath().'/general/de_startpage.php' );
		exit();
	}

	$pagecount = countGmPages();

	Page::setTitle( array( 'GM-Tool', 'Übersicht' ) );
	Page::setDescription( 'Auf dieser Seite findest du eine Übersicht über alle Funktionen die das GM Tool dir zur Verfügung stellt.' );
	Page::setKeywords( array( 'GM-Tool', 'Übersicht', 'Administration' ) );

	Page::setXHTML();
	Page::Init();

?>
<h1>GM-Tool</h1>

<h2>Übersicht über die aktiven Funktionen</h2>

<?php if (IllaUser::auth('gmtool_chars') || IllaUser::auth('gmtool_accounts')): ?>
<fieldset style="background: transparent url(<?php echo IllarionData::getItemPicture(336); ?>) scroll no-repeat 15px center;">
	<legend>Suchen</legend>
	<ul style="list-style-type:none;padding-left:50px;">
		<?php if (IllaUser::auth('gmtool_accounts')): ?>
			<li><a href="<?php echo $url; ?>/illarion/gmtool/de_search_accounts.php">Suche nach Accounts</a></li>
		<?php endif; ?>
		<?php if (IllaUser::auth('gmtool_chars')): ?>
			<li><a href="<?php echo $url; ?>/illarion/gmtool/de_search_chars.php">Suche nach Charakteren</a></li>
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
            <a href="<?php echo $url; ?>/illarion/gmtool/de_pages.php?filter=<?php echo PAGE_STATUS_NEW; ?>">Neu</a>
            <?php if ( $pagecount['pages_new'] > 0 ): ?><span style="color:red;font-weight:bold;"><?php else: ?><span><?php endif; ?>
                (<?php echo $pagecount['pages_new']; ?>)
            </span>
        </li>
        <li>
            <a href="<?php echo $url; ?>/illarion/gmtool/de_pages.php?filter=<?php echo PAGE_STATUS_IN_WORK; ?>">In Arbeit</a>
            <span>(<?php echo $pagecount['pages_in_work']; ?>)</span>
        </li>
        <li>
            <a href="<?php echo $url; ?>/illarion/gmtool/de_pages.php?filter=<?php echo PAGE_STATUS_DONE; ?>">Erledigt</a>
            <span>(<?php echo $pagecount['pages_done']; ?>)</span>
        </li>
        <li>
            <a href="<?php echo $url; ?>/illarion/gmtool/de_pages.php?filter=<?php echo PAGE_STATUS_ARCHIVE; ?>">Archiv</a>
            <span>(<?php echo $pagecount['pages_archiv']; ?>)</span>
        </li>
		<li>
            <a href="<?php echo $url; ?>/illarion/gmtool/de_pages_log.php">Log</a>
        </li>
    </ul>
</fieldset>

<div style="height:15px;"></div>
<?php endif; ?>


<?php if (IllaUser::auth('gmtool_gms')): ?>
<fieldset style="background: transparent url(<?php echo IllarionData::getItemPicture(3109); ?>) scroll no-repeat 15px center;">
	<legend>Admin Tools</legend>
		<ul style="list-style-type:none;padding-left:50px;">
		<li><a href="<?php echo $url; ?>/illarion/gmtool/de_gms.php">Gamemaster bearbeiten</a></li>
	</ul>
</fieldset>
<?php endif; ?>
