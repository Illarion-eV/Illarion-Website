<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( array('Chronik','Suchresultate') );
	Page::setDescription( 'Suchergebnisse in der Chronik' );
	Page::setKeywords(array('Suche','Chronik','Geschichte','Gobaith') );

	Page::setXHTML( );
	Page::Init( );

	// Get searchterm and trim whitespaces. Also check if a searchterm was typed in
	// and redirect to the chronicle main page if not
	$searchterm = ( isset($_POST['search']) ? trim($_POST['search']) : '' );
	if (strlen( $searchterm ) == 0)
	{
		Messages::add('Es wurde kein Suchbegriff eingegeben!', 'info');
		includeWrapper::includeOnce( $_SERVER['DOCUMENT_ROOT'] . '/illarion/chronik/de_chronik.php' );
		exit();
	}

	$viewed_term = $searchterm;
	$searchterm = strtolower( $searchterm );

	Page::setFirstPage( Page::getURL().'/illarion/chronik/de_chronik.php' );
	Page::setNextPage( Page::getURL().'/illarion/chronik/de_chronik.php' );

	$db =& Database::getMySQL();

	// search query
	$query = 'SELECT `homepage_chronik`.`chronik_note_de` AS `chronik_note`, `homepage_chronik`.`chronik_date`, `homepage_user`.`username`, `homepage_user`.`name`'
	.PHP_EOL.' FROM `homepage_chronik`'
	.PHP_EOL.' INNER JOIN `homepage_user` ON `homepage_user`.`id` = `homepage_chronik`.`chronik_author`'
	.PHP_EOL.' WHERE LOWER(`chronik_note_de`) LIKE '.$db->Quote( '%'.$searchterm.'%' )
	.PHP_EOL.' ORDER BY `chronik_date` DESC'
	;
	$db->setQuery( $query );
	$search_results = $db->loadAssocList();
	$result_count = count( $search_results );
?>

<?php Page::NavBarTop(); ?>

<h1>Die Chronik von Gobaith</h1>

<h2>Suche in der Chronik</h2>

<form method="post" action="<?php echo Page::getURL() ?>/illarion/chronik/de_search.php">
	<p>
		Im Archiv nach Einträgen suchen<br />
		<input type="text" name="search" />
		<input type="submit" name="submit" value="Suche starten" style="margin-left:8px;" />
	</p>
</form>

<h2>Suchergebnisse</h2>

<p>Die Suche in der Chronik nach "<?php echo $viewed_term; ?>" hat
<?php echo ($result_count ? $result_count : 'keine' ), ' ', ($result_count==1 ? 'Resultat' : 'Resultate' ); ?>
 hervorgebracht.</p>

<?php foreach( $search_results as $key=>$entry ): ?>

<?php if ($key != 0): ?>
<?php Page::insert_go_to_top_link(); ?>
<?php endif; ?>

<?php
	$entry_date = IllaDateTime::IllaDatestampToDate( $entry['chronik_date'] );
?>
<h4><?php echo $entry_date['day'],'. ',IllaDateTime::getMonthName( $entry_date['month'] ),' ',$entry_date['year']; ?></h4>
<p>
	<?php echo preg_replace( '/(\S*'.$searchterm.'\S*)/mi', '<b>\1</b>', $entry['chronik_note'] ); ?>
	<div class="right">verfasst von <?php echo ( strlen( $entry['name'] ) > 0 ? $entry['name'] : $entry['username'] ); ?></div>
</p>

<?php endforeach; ?>

<?php Page::NavBarBottom(); ?>