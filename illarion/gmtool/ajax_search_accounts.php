<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';

	if (!IllaUser::auth('gmtool_accounts'))
	{
		exit();
	}

	Page::setXML();
	Page::Init();

	$search = ( isset($_POST['search']) ? trim((string)$_POST['search']) : '' );
	$search = preg_replace('/%([0-9a-f]{2})/ie', 'chr(hexdec($1))', $search);
	if (is_numeric($_POST['state']))
	{
		$status = ( array_search( (int)$_POST['state'], array(0,3,7,8)) === false ? false : (int)$_POST['state'] );
	}
	else
	{
		$status = false;
	}

	$search_acc = ($_POST['acc'] != 0);
	$search_email = ($_POST['email'] != 0);
	$search_char = ($_POST['char'] != 0);

	$numeric_search = is_numeric( $search );

	if (!$search_acc && !$search_email && !$search_char)
	{
		echo '<nothing></nothing>';
		include_short_footer();
		exit();
	}

	if ($search_char)
	{
		$illarionserver =& Database::getPostgreSQL( 'illarionserver' );
		$testserver =& Database::getPostgreSQL( 'testserver' );

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
		$testserver->setQuery( $query );

		$acc_list = $illarionserver->loadResultArray();
		$acc_list = array_merge( $acc_list, $testserver->loadResultArray() );
		$acc_list = array_unique( $acc_list );
	}

	$account =& Database::getMySQL();

	$search_for = array();
	if ($search_acc)
	{
		if ($numeric_search)
		{
			$search_for[] = '`id` = '.$account->Quote( $search );
		}
		$search_for[] = '`name` LIKE '.$account->Quote( '%'.$search.'%' );
		$search_for[] = '`username` LIKE '.$account->Quote( '%'.$search.'%' );
	}
	if ($search_char && $acc_list && count($acc_list))
	{
		$search_for[] = '`id` IN ('.implode(',',$acc_list).')';
	}
	if ($search_email)
	{
		$search_for[] = '`email` LIKE '.$account->Quote( '%'.$search.'%' );
	}

	$subquery = PHP_EOL.' FROM `homepage_user`'
	.PHP_EOL.' WHERE ( '.implode( ' OR ', $search_for )
	.PHP_EOL.' ) '.( $status !== false ? 'AND `state` = '.$account->Quote( $status ) : '' )
	.PHP_EOL.' ORDER BY `username` ASC'
	;
	$query = 'SELECT COUNT(*)'.$subquery;
	$account->setQuery( $query );
	$count = $account->loadResult();
	if ($count > 30)
	{
		$query = 'SELECT COUNT(*)'
		.PHP_EOL.' FROM `homepage_user`'
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
		$query = 'SELECT `id`, `username`, `name`'.$subquery;
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
		<id><?php echo $result['id']; ?></id>
		<name><?php echo $result['username'],' (',$result['name'],')'; ?></name>
	</account>
	<?php endforeach; ?>
</accounts>
<?php endif; ?>