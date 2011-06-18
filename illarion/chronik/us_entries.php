<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	$db = Database::getMySQL( );

	$date = ( isset( $_GET['date'] ) && is_numeric( $_GET['date'] ) ? (int)$_GET['date'] : false );
	if (!$date)
	{
		echo '<div>Wrong parameters</div>';
		exit();
	}

	$date = IllaDateTime::IllaDatestampToDate( $date );

	Page::setTitle( array('Chronicle',IllaDateTime::getMonthName( $date['month'] ).' '.$date['year']) );
	Page::setDescription( 'Entries from '.IllaDateTime::getMonthName( $date['month'] ).' '.$date['year'].' in the chronicle' );
	Page::setKeywords(array(IllaDateTime::getMonthName( $date['month'] ),'chronicle','histroy','Gobaith','Year '.$date['year']) );

	Page::setXHTML( );
	Page::Init( );

	$start_date = IllaDateTime::mkIllaDatestamp( $date['month'], 1, $date['year'] );
	$end_date = IllaDateTime::mkIllaDatestamp( $date['month'], ($date['month']==16 ? 5 : 24), $date['year'] );

	$query = 'SELECT `homepage_chronik`.`chronik_id`, `homepage_chronik`.`chronik_note_en` AS `chronik_note`, `homepage_chronik`.`chronik_note_de` AS `chronik_traslation`, `homepage_chronik`.`chronik_date`, `homepage_user`.`name`, `homepage_user`.`username`'
	.PHP_EOL.' FROM `homepage_chronik`'
	.PHP_EOL.' INNER JOIN `homepage_user` ON `homepage_user`.`id` = `homepage_chronik`.`chronik_author`'
	.PHP_EOL.' WHERE `homepage_chronik`.`chronik_date` >= '.$db->Quote( $start_date )
	.PHP_EOL.' AND `homepage_chronik`.`chronik_date` <= '.$db->Quote( $end_date )
	.PHP_EOL.' ORDER BY `homepage_chronik`.`chronik_date` ASC'
	;
	$db->setQuery( $query );
	$entries = $db->loadAssocList();

	Page::setFirstPage( Page::getURL().'/illarion/chronik/us_chronik.php' );

	$query = 'SELECT MIN(`chronik_date`) AS `last`, MAX(`chronik_date`) AS `next`'
	.PHP_EOL.' FROM `homepage_chronik`'
	.PHP_EOL.' WHERE `homepage_chronik`.`chronik_date` < '.$db->Quote( $start_date )
	;
	$db->setQuery( $query );
	$next_last = $db->loadAssocRow();

	if ($next_last['last'])
	{
		$last_date = IllaDateTime::IllaDatestampToDate( $next_last['last'] );
		$last_date = IllaDateTime::mkIllaDatestamp( $last_date['month'], 1, $last_date['year'] );
		Page::setLastPage( Page::getURL().'/illarion/chronik/us_entries.php?date='.$last_date );
	}
	if ($next_last['next'])
	{
		$last_date = IllaDateTime::IllaDatestampToDate( $next_last['next'] );
		$last_date = IllaDateTime::mkIllaDatestamp( $last_date['month'], 1, $last_date['year'] );
		Page::setNextPage( Page::getURL().'/illarion/chronik/us_entries.php?date='.$last_date );
	}

	$query = 'SELECT MIN(`chronik_date`)'
	.PHP_EOL.' FROM `homepage_chronik`'
	.PHP_EOL.' WHERE `homepage_chronik`.`chronik_date` > '.$db->Quote( $end_date )
	;
	$db->setQuery( $query );
	$prev = $db->loadResult();
	if ($prev)
	{
		$prev = IllaDateTime::IllaDatestampToDate( $prev );
		$prev = IllaDateTime::mkIllaDatestamp( $prev['month'], 1, $prev['year'] );
		Page::setPrevPage( Page::getURL().'/illarion/chronik/us_entries.php?date='.$prev );
	}
?>

<?php Page::NavBarTop(); ?>

<h1><?php echo IllaDateTime::getMonthName( $date['month'] ); ?></h1>

<h2>In the year <?php echo $date['year']; ?></h2>

<?php if( count( $entries ) == 0 ): ?>
<p>No entries avaiable.</p>
<?php
exit();
endif;
?>

<?php foreach( $entries as $entry ): ?>

<?php
$entry_date = IllaDateTime::IllaDatestampToDate( $entry['chronik_date'] );
?>
<h5>
	<?php if( IllaUser::auth('chronic_edit') ): ?>
	<a class="float_right" style="font-size:10pt;" href="<?php echo Page::getURL(); ?>/illarion/chronik/us_delete.php?entry=<?php echo  $entry['chronik_id']; ?>">[Delete entry]</a>
	<a class="float_right" style="font-size:10pt;" href="<?php echo Page::getURL(); ?>/illarion/chronik/us_new.php?entry=<?php echo  $entry['chronik_id']; ?>">[Edit entry]</a>
	<?php endif; ?>
	<?php echo $entry_date['day'],'. ',IllaDateTime::getMonthName( $entry_date['month'] ),' ',$entry_date['year']; ?>
</h5>

<?php if( !$entry['chronik_note'] ): ?>
<p class="italic">No english version avaiable.</p>
<p><?php echo $entry['chronik_traslation']; ?></p>
<?php else: ?>
<p><?php echo $entry['chronik_note']; ?></p>
<?php endif; ?>
<div class="right">
	composed by <?php echo ( strlen( $entry['name'] ) > 0 ? $entry['name'] : $entry['username'] ); ?>
	<?php if( IllaUser::auth('chronic_edit') && !$entry['chronik_traslation'] ): ?>
		(Translation missing!)
	<?php endif; ?>
</div>
<?php endforeach; ?>

<?php Page::NavBarBottom(); ?>