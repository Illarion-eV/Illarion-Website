<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	$db = Database::getPostgreSQL( 'homepage' );

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

	$query = 'SELECT chronicle.id, chronicle.note_en AS note, chronicle.note_de AS translation, chronicle.date, account.acc_name, account.acc_login'
	.PHP_EOL.' FROM chronicle'
	.PHP_EOL.' INNER JOIN account ON account.acc_id = chronicle.author'
	.PHP_EOL.' WHERE chronicle.date >= '.$db->Quote( $start_date )
	.PHP_EOL.' AND chronicle.date <= '.$db->Quote( $end_date )
	.PHP_EOL.' ORDER BY chronicle.date ASC'
	;
	$db->setQuery( $query );
	$entries = $db->loadAssocList();

	Page::setFirstPage( Page::getURL().'/illarion/chronik/us_chronik.php' );

	$query = 'SELECT MIN(date) AS last, MAX(date) AS next'
	.PHP_EOL.' FROM chronicle'
	.PHP_EOL.' WHERE chronicle.date < '.$db->Quote( $start_date )
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

	$query = 'SELECT MIN(date)'
	.PHP_EOL.' FROM chronicle'
	.PHP_EOL.' WHERE chronicle.date > '.$db->Quote( $end_date )
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
$entry_date = IllaDateTime::IllaDatestampToDate( $entry['date'] );
?>
<h5>
	<?php if( IllaUser::auth('chronic_edit') ): ?>
	<a class="float_right" style="font-size:10pt;" href="<?php echo Page::getURL(); ?>/illarion/chronik/us_delete.php?entry=<?php echo  $entry['id']; ?>">[Delete entry]</a>
	<a class="float_right" style="font-size:10pt;" href="<?php echo Page::getURL(); ?>/illarion/chronik/us_new.php?entry=<?php echo  $entry['id']; ?>">[Edit entry]</a>
	<?php endif; ?>
	<?php echo $entry_date['day'],'. ',IllaDateTime::getMonthName( $entry_date['month'] ),' ',$entry_date['year']; ?>
</h5>

<?php if( !$entry['note'] ): ?>
<p class="italic">No english version avaiable.</p>
<p><?php echo $entry['translation']; ?></p>
<?php else: ?>
<p><?php echo $entry['note']; ?></p>
<?php endif; ?>
<div class="right">
	composed by <?php echo ( strlen( $entry['acc_name'] ) > 0 ? $entry['acc_name'] : $entry['acc_login'] ); ?>
	<?php if( IllaUser::auth('chronic_edit') && !$entry['translation'] ): ?>
		(Translation missing!)
	<?php endif; ?>
</div>
<?php endforeach; ?>

<?php Page::NavBarBottom(); ?>
