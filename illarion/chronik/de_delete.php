<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::Init();

	if (!IllaUser::auth('chronic_edit'))
	{
		Messages::add('Du darfst die Chronik nicht editieren', 'error');
		includeWrapper::includeOnce( $_SERVER['DOCUMENT_ROOT'].'/illarion/chronik/de_chronik.php' );
		exit();
	}

	$db =& Database::getMySQL();

	$entry_id = ( isset( $_GET['entry'] ) ? (int)$_GET['entry'] : false );

	if (!$entry_id)
	{
		Messages::add('Kein Eintrag zum löschen angegeben.', 'error');
		includeWrapper::includeOnce( $_SERVER['DOCUMENT_ROOT'].'/illarion/chronik/de_chronik.php' );
		exit();
	}

	$query = 'SELECT `homepage_chronik`.`chronik_date`, `homepage_chronik`.`chronik_note_de`, `homepage_chronik`.`chronik_note_en`, `homepage_user`.`username`, `homepage_user`.`name`'
	.PHP_EOL.' FROM `homepage_chronik`'
	.PHP_EOL.' INNER JOIN `homepage_user` ON `homepage_chronik`.`chronik_author` = `homepage_user`.`id`'
	.PHP_EOL.' WHERE `chronik_id` = '.$db->Quote( $entry_id )
	;
	$db->setQuery( $query );
	$entry = $db->loadAssocRow();

	if (!count( $entry ))
	{
		Messages::add('Angegebener Eintrag wurde nicht gefunden', 'error');
		includeWrapper::includeOnce( $_SERVER['DOCUMENT_ROOT'].'/illarion/chronik/de_chronik.php' );
		exit();
	}

	Page::setTitle( array( 'Chronik', 'Eintrag löschen' ) );
	Page::setDescription( 'Auf dieser Seite kann man einen Eintrag aus der Chronik löschen.' );

	Page::setFirstPage( Page::getURL().'/illarion/chronik/de_chronik.php' );
	Page::setPrevPage( Page::getURL().'/illarion/chronik/de_chronik.php' );
?>

<?php Page::NavBarTop(); ?>

<h1>Eintrag löschen</h1>

<h2>Zu löschender Eintrag</h2>

<?php
	$entry_date = IllaDateTime::IllaDatestampToDate( $entry['chronik_date'] );
?>

<h4><?php echo $entry_date['day'],'. ',IllaDateTime::getMonthName( $entry_date['month'] ),' ',$entry_date['year']; ?></h4>

<?php if( !is_null( $entry['chronik_note_de'] ) ): ?>
<h6>Deutscher Eintrag</h6>
<p>
	<?php echo $entry['chronik_note_de']; ?>
</p>
<?php endif; ?>

<?php if( !is_null( $entry['chronik_note_en'] ) ): ?>
<h6>Englischer Eintrag</h6>
<p>
	<?php echo $entry['chronik_note_en']; ?>
</p>
<?php endif; ?>

<div class="right">verfasst von <?php echo ( strlen( $entry['name'] ) > 0 ? $entry['name'] : $entry['username'] ); ?></div>

<h2>Eintrag löschen</h2>

<p>Bist du sicher das du diesen Eintrag löschen willst? Die Lösung kann <b>nicht</b>
rückgängig gemacht werden.</p>

<form method="post" action="<?php echo Page::getURL(); ?>/illarion/chronik/de_chronik.php">
	<p class="center">
		<input type="submit" name="submit" value="Eintrag löschen" style="width:150px;margin-right:10px;" />
		<input type="button" name="no_delete" value="Nicht löschen" onclick="window.location.href='<?php echo Page::getURL(); ?>/illarion/chronik/de_chronik.php';return false;" style="width:150px;margin-left:10px;" />
		<input type="hidden" name="action" value="delete" />
		<input type="hidden" name="id" value="<?php echo $entry_id; ?>" />
	</p>
</form>

<?php Page::NavBarBottom(); ?>