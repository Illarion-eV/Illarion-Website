<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_gmtool.php' );

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

	$pendingwork = getPendingWork();

	Page::setTitle( array( 'GM-Tool', 'Übersicht' ) );
	Page::setDescription( 'Auf dieser Seite findest du eine Übersicht über alle Funktionen die das GM Tool dir zur Verfügung stellt.' );
	Page::setKeywords( array( 'GM-Tool', 'Übersicht', 'Administration' ) );

	Page::setXHTML();
	Page::Init();

	echo "<pre>";
	print_r(IllaUser::$moep1);
	print_r(IllaUser::$moep2);
	echo "</pre>";
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
            <a href="<?php echo $url; ?>/illarion/gmtool/de_pages.php?filter=0">Neue GM Pages</a>
            <?php if ( $pendingwork['pages_new'] > 0 ): ?><span style="color:red;font-weight:bold;"><?php else: ?><span><?php endif; ?>
                (<?php echo $pendingwork['pages_new']; ?>)
            </span>
        </li>
        <li>
            <a href="<?php echo $url; ?>/illarion/gmtool/de_pages.php?filter=1">GM Pages in Arbeit</a>
            <span>(<?php echo $pendingwork['pages_inwork']; ?>)</span>
        </li>
        <li>
            <a href="<?php echo $url; ?>/illarion/gmtool/de_pages.php?filter=2">GM Pages fertig</a>
            <span>(<?php echo $pendingwork['pages_done']; ?>)</span>
        </li>
        <li>
            <a href="<?php echo $url; ?>/illarion/gmtool/de_pages.php?filter=3">GM Pages im Archiv</a>
            <span>(<?php echo $pendingwork['pages_archiv']; ?>)</span>
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
