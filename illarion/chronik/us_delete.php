<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::Init();

	if (!IllaUser::auth('chronic_edit'))
	{
		Messages::add('You are not allowed to edit the chronicles', 'error');
		includeWrapper::includeOnce( $_SERVER['DOCUMENT_ROOT'].'/illarion/chronik/us_chronik.php' );
		exit();
	}

	$db =& Database::getMySQL();

	$entry_id = ( isset( $_GET['entry'] ) ? (int)$_GET['entry'] : false );

	if (!$entry_id)
	{
		Messages::add('There was no entry set to be deleted', 'error');
		includeWrapper::includeOnce( $_SERVER['DOCUMENT_ROOT'].'/illarion/chronik/us_chronik.php' );
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
		Messages::add('The setted entry was not found', 'error');
		includeWrapper::includeOnce( $_SERVER['DOCUMENT_ROOT'].'/illarion/chronik/us_chronik.php' );
		exit();
	}

	Page::setTitle( array( 'Chronicle', 'Delete entry' ) );
	Page::setDescription( 'On this page you can delete a entry from the chronicles' );

	Page::setFirstPage( Page::getURL().'/illarion/chronik/us_chronik.php' );
	Page::setPrevPage( Page::getURL().'/illarion/chronik/us_chronik.php' );
?>

<?php Page::NavBarTop(); ?>

<h1>Delete entry</h1>

<h2>The entry that is about to be deleted</h2>

<?php
	$entry_date = IllaDateTime::IllaDatestampToDate( $entry['chronik_date'] );
?>

<h4><?php echo $entry_date['day'],'. ',IllaDateTime::getMonthName( $entry_date['month'] ),' ',$entry_date['year']; ?></h4>

<?php if( !is_null( $entry['chronik_note_de'] ) ): ?>
<h6>German entry</h6>
<p>
	<?php echo $entry['chronik_note_de']; ?>
</p>
<?php endif; ?>

<?php if( !is_null( $entry['chronik_note_en'] ) ): ?>
<h6>English entry</h6>
<p>
	<?php echo $entry['chronik_note_en']; ?>
</p>
<?php endif; ?>

<div class="right">composed by <?php echo ( strlen( $entry['name'] ) > 0 ? $entry['name'] : $entry['username'] ); ?></div>

<h2>Delete entry</h2>

<p>Are you sure you want to delete this entry. It is <b>not</b> possible to undo this
action.</p>

<form method="post" action="<?php echo Page::getURL(); ?>/illarion/chronik/us_chronik.php">
	<p class="center">
		<input type="submit" name="submit" value="Delete entry" style="width:150px;margin-right:10px;" />
		<input type="button" name="no_delete" value="Do not delete" onclick="window.location.href='<?php echo Page::getURL(); ?>/illarion/chronik/us_chronik.php';return false;" style="width:150px;margin-left:10px;" />
		<input type="hidden" name="action" value="delete" />
		<input type="hidden" name="id" value="<?php echo $entry_id; ?>" />
	</p>
</form>

<?php Page::NavBarBottom(); ?>