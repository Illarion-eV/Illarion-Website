<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( array('Chronicle','Search Results') );
	Page::setDescription( 'Results of the search in the chronicle' );
	Page::setKeywords(array('search','chronicle','history','Gobaith') );

	Page::setXHTML( );
	Page::Init( );

	// Get searchterm and trim whitespaces. Also check if a searchterm was typed in
	// and redirect to the chronicle main page if not
	$searchterm = ( isset($_POST['search']) ? trim($_POST['search']) : '' );
	if (strlen( $searchterm ) == 0)
	{
		Messages::add('No search result was found.', 'info');
		includeWrapper::includeOnce( $_SERVER['DOCUMENT_ROOT'] . '/illarion/chronik/us_chronik.php' );
		exit();
	}

	$viewed_term = $searchterm;
	$searchterm = strtolower( $searchterm );

	Page::setFirstPage( Page::getURL().'/illarion/chronik/us_chronik.php' );
	Page::setNextPage( Page::getURL().'/illarion/chronik/us_chronik.php' );

	$db =& Database::getPostgreSQL( 'homepage' );

	// search query
	$query = 'SELECT chronicle.note_en AS note, chronicle.date, account.acc_login, account.acc_name'
	.PHP_EOL.' FROM chronicle'
	.PHP_EOL.' INNER JOIN account ON account.acc_id = chronicle.author'
	.PHP_EOL.' WHERE LOWER(note_en) LIKE '.$db->Quote( '%'.$searchterm.'%' )
	.PHP_EOL.' ORDER BY date DESC'
	;
	$db->setQuery( $query );
	$search_results = $db->loadAssocList();
	$result_count = count( $search_results );
?>

<?php Page::NavBarTop(); ?>

<h1>The Chronicle of Gobaith</h1>

<h2>Searching the the chronicle</h2>

<form method="post" action="<?php echo Page::getURL() ?>/illarion/chronik/us_search.php">
	<p>
		Searching for entries in the archiv<br />
		<input type="text" name="search" />
		<input type="submit" name="submit" value="start searching" style="margin-left:8px;" />
	</p>
</form>

<h2>Searching results</h2>

<p>The search in the chronicle for "<?php echo $viewed_term; ?>" returned
<?php echo ($result_count ? $result_count : 'none' ), ' ', ($result_count==1 ? 'result' : 'results' ); ?>.
</p>

<?php foreach( $search_results as $key=>$entry ): ?>

<?php if ($key != 0): ?>
<?php Page::insert_go_to_top_link(); ?>
<?php endif; ?>

<?php
	$entry_date = IllaDateTime::IllaDatestampToDate( $entry['date'] );
?>
<h4><?php echo $entry_date['day'],'. ',IllaDateTime::getMonthName( $entry_date['month'] ),' ',$entry_date['year']; ?></h4>
<p>
	<?php echo preg_replace( '/(\S*'.$searchterm.'\S*)/mi', '<b>\1</b>', $entry['note'] ); ?>
	<div class="right">composed by <?php echo ( strlen( $entry['acc_name'] ) > 0 ? $entry['acc_name'] : $entry['acc_login'] ); ?></div>
</p>

<?php endforeach; ?>

<?php Page::NavBarBottom(); ?>
