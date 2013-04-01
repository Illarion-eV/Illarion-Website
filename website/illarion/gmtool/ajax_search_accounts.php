<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';

	if (!IllaUser::auth('gmtool_accounts'))
	{
		exit();
	}

	Page::setXML();
	Page::Init();



	function debug($text, $info ="none")
	{
		?>
		<debug>
			<text><?php echo $text; ?></text>
			<info><?php echo $info; ?></info>
		</debug>
		<?php
	}

	// variablen setzen
	$search = ( isset($_POST['search']) ? trim((string)$_POST['search']) : '' );
	$search = preg_replace('/%([0-9a-f]{2})/ie', 'chr(hexdec($1))', $search);
	$acc_list = array();

	if (is_numeric($_POST['state']))
	{
		$status = ( array_search( (int)$_POST['state'], array(0,3,7,8)) === false ? false : (int)$_POST['state'] );
	}
	else
	{
		$status = false;
	}
	
	// Wo soll ueberall nach dem Suchbegriff gesucht werden
	$search_acc = ($_POST['acc'] != 0);
	$search_email = ($_POST['email'] != 0);
	$search_char = ($_POST['char'] != 0);

	// Wir nach ID gesucht?
	$numeric_search = is_numeric( $search );

	// Es wird nach gar nix gesucht: Leeres Ergebnis zurueck
	if (!$search_acc && !$search_email && !$search_char)
	{
		echo '<nothing></nothing>';
		include_short_footer();
		exit();
	}
	
	// Suche nach Charakteren
	if ($search_char)
	{
		$illarionserver =& Database::getPostgreSQL( 'illarionserver' );
		$devserver =& Database::getPostgreSQL( 'devserver' );

		if ($numeric_search) {
			$query = 'SELECT chr_accid'
			.PHP_EOL.' FROM chars'
			.PHP_EOL.' WHERE chr_playerid = '.$illarionserver->Quote( $search )
			;
		}
		else
		{
			$query = 'SELECT chr_accid'
			.PHP_EOL.' FROM chars'
			.PHP_EOL.' WHERE chr_name LIKE '.$illarionserver->Quote( '%'.$search.'%' )
			;
		}
		$illarionserver->setQuery( $query );
		$devserver->setQuery( $query );
		
		$acc_list = $illarionserver->loadResultArray();
		$acc_list = array_merge( $acc_list, $devserver->loadResultArray() );
		$acc_list = array_unique( $acc_list );
	}

	$account =& Database::getPostgreSQL( 'accounts' );

	$search_for = array();
	if ($search_acc)
	{
		if ($numeric_search)
		{
			$search_for[] = 'acc_id = '.$account->Quote( $search );
		}
		$search_for[] = 'acc_login LIKE '.$account->Quote( '%'.$search.'%' );
		$search_for[] = 'acc_name LIKE '.$account->Quote( '%'.$search.'%' );
	}

	if ($search_char && $acc_list && count($acc_list))
	{
		$search_for[] = 'acc_id IN ('.implode(',',$acc_list).')';
	}
	if ($search_email)
	{
		$search_for[] = 'acc_email LIKE '.$account->Quote( '%'.$search.'%' );
	}




	$subquery = PHP_EOL.' FROM account'
	.PHP_EOL.' WHERE ( '.implode( ' OR ', $search_for )
	.PHP_EOL.' ) '.( $status !== false ? 'AND acc_state = '.$account->Quote( $status ) : '' )
	;
	$query = 'SELECT COUNT(*)'.$subquery;

	$account->setQuery( $query );
	$count = $account->loadResult();

	if ($count > 30)
	{
		$query = 'SELECT COUNT(*)'
		.PHP_EOL.' FROM account'
		;
		$account->setQuery( $query );
		$max = $account->loadResult();
	}
	elseif ($count == 0)
	{
		echo '<nothing></nothing>';
		exit();
	}
	else
	{
		$query = 'SELECT acc_id, acc_name, acc_login'.$subquery;
		$account->setQuery( $query );
		$result_list = $account->loadAssocList();
	}

?>

<?php if ($count > 30): ?>
<manyHits>
    <found><?php echo $count; ?></found>
    <max><?php echo $max; ?></max>
</manyHits>
<?php else: ?>
<accounts>
    <?php foreach($result_list as $result): ?>
    <account>
        <id><?php echo $result['acc_id']; ?></id>
        <name><?php echo $result['acc_name'],' (',$result['acc_login'],')'; ?></name>
    </account>
    <?php endforeach; ?>
</accounts>
<?php endif; ?>
