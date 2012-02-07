<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( 'Chronik' );
	Page::setDescription( 'Die Chronik von Gobaith' );
	Page::setKeywords(array('Chronik','Geschichte','Gobaith') );

	Page::setXHTML( );
	Page::Init( );

	define( 'YEARS_PER_PAGE', 4 );

	$db =& Database::getPostgreSQL( 'homepage' );

	$curr_date  = IllaDateTime::IllaDatestampToDate();
	$first_year = ( isset($_GET['start']) && is_numeric($_GET['start']) ? (int)$_GET['start'] : $curr_date['year'] );

	$first_date = IllaDateTime::mkIllaDatestamp( 1, 1, $first_year-YEARS_PER_PAGE+1 );
	$last_date = IllaDateTime::mkIllaDatestamp( 16, 5, $first_year );

	$query = 'SELECT COUNT(*) AS entries, FLOOR(date/365)-10000 AS year, FLOOR((date%365)/24)+1 AS month, COUNT(*)*2-(COUNT(note_en)+COUNT(note_de)) AS missing_translations'
	.PHP_EOL.'FROM chronicle'
	.PHP_EOL.'WHERE date >= '.$db->Quote( $first_date ).' AND date <= '.$db->Quote( $last_date )
	.PHP_EOL.'GROUP BY year, month'
	;
	$db->setQuery( $query );
	$entry_count = $db->loadAssocList();

	$sorted_entry_list = array();
	foreach ($entry_count as $entry)
	{
		if (!isset($sorted_entry_list[ $entry['year'] ]))
		{
			$sorted_entry_list[ $entry['year'] ] = array();
		}
		$sorted_entry_list[ $entry['year'] ][ $entry['month'] ] = array($entry['entries'],$entry['missing_translations']);
	}

	// Set up links for next and prev pages
	Page::setFirstPage( Page::getURL().'/illarion/chronik/de_chronik.php' );
	if ($first_year < $curr_date['year'])
	{
		Page::setPrevPage( Page::getURL().'/illarion/chronik/de_chronik.php?start='.min( $curr_date['year'], $first_year + YEARS_PER_PAGE ) );
	}
	if ($first_year > YEARS_PER_PAGE)
	{
		Page::setNextPage( Page::getURL().'/illarion/chronik/de_chronik.php?start='.max( YEARS_PER_PAGE, $first_year - YEARS_PER_PAGE ) );
	}
	Page::setLastPage( Page::getURL().'/illarion/chronik/de_chronik.php?start=5' );
?>
<?php Page::navBarTop(); ?>

<h1>Die Chronik von Gobaith</h1>

<h2>Inhaltsverzeichnis</h2>

<p class="center">
	<a href="<?php echo Page::getURL() ?>/illarion/chronik/de_foreword.php">~ Vorwort ~</a>
</p>

<?php if (IllaUser::auth('chronic_edit')): ?>
<div class="float_right">
	<a href="<?php echo Page::getURL() ?>/illarion/chronik/de_new.php">[Einen neuen Eintrag anlegen]</a>
</div>
<?php endif; ?>
<form method="post" action="<?php echo Page::getURL() ?>/illarion/chronik/de_search.php">
	<p>
		Im Archiv nach Einträgen suchen<br />
		<input type="text" name="search" />
		<input type="submit" name="submit" value="Suche starten" style="margin-left:8px;" />
	</p>
</form>

<table style="width:100%">
	<?php for( $month=0; $month<=16; ++$month ): ?>
		<tr class="row<?php echo ($month%2); ?>">
		<?php for( $year=$first_year; $year>=$first_year-YEARS_PER_PAGE+1; --$year ): ?>
			<?php if( $month == 0 ): ?>
				<th style="width:<?php echo (100/YEARS_PER_PAGE); ?>%">Im Jahre <?php echo $year; ?></th>
			<?php else: ?>
				<td class="right" style="vertical-align:top;">
					<?php if( isset( $sorted_entry_list[ $year ][ $month ] ) ): ?>
					<a class="float_left" href="<?php echo Page::getURL() ?>/illarion/chronik/de_entries.php?date=<?php echo IllaDateTime::mkIllaDatestamp( $month, 1, $year ); ?>"><?php echo IllaDateTime::getMonthName( $month ); ?></a>
					<span style="font-size:10pt;">
						(<?php echo $sorted_entry_list[ $year ][ $month ][0]; ?>
						<?php if( $sorted_entry_list[ $year ][ $month ][0] != 1 ): ?>
							Einträge
						<?php else: ?>
							Eintrag
						<?php endif; ?>)
					</span>
					<?php if( IllaUser::auth('chronic_edit') && $sorted_entry_list[ $year ][ $month ][1] > 0 ): ?>
					<br />
					<span style="font-size:10pt;">
						(<?php echo $sorted_entry_list[ $year ][ $month ][1]; ?>
						unübersetzt)
					</span>
					<?php endif; ?>
					<?php else: ?>
					<span class="float_left">
						<?php echo IllaDateTime::getMonthName( $month ); ?>
					</span>
					<?php endif; ?>
				</td>
			<?php endif; ?>
		<?php endfor; ?>
		</tr>
	<?php endfor; ?>
</table>

<?php if (false): ?>
<p class="center">
	<a href="<?php echo Page::getURL() ?>/illarion/chronik/de_dedication.php">~ Schlusswort ~</a>
</p>
<?php endif; ?>

<?php Page::navBarBottom(); ?>
