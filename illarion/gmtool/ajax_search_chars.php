<?php
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php' );

	if (!IllaUser::auth('gmtool_chars'))
	{
		exit();
	}

	create_XMLheader();

	$search = ( isset($_POST['search']) ? trim((string)$_POST['search']) : '' );
	$search = preg_replace('/%([0-9a-f]{2})/ie', 'chr(hexdec($1))', $search);

	$status = ( array_search( $_POST['state'], array(0,1,3,4,6,20,21,30,31,40)) === false ? false : $_POST['state'] );
	$race   = ( $_POST['race'] > -1 && $_POST['race'] < 47 ? $_POST['race'] : false );
	$sex    = ( $_POST['sex'] == 0 || $_POST['sex'] == 1 ? $_POST['sex'] : false );
	$online = ( $_POST['online'] == 0 || $_POST['online'] == 1 ? $_POST['online'] : false );

	$search_acc = ($_POST['acc'] != 0);
	$search_email = ($_POST['email'] != 0);
	$search_char = ($_POST['char'] != 0);

	$server = ( $_POST['server'] == 0 || $_POST['server'] == 1 ? (int)$_POST['server'] : -1 );

	$numeric_search = is_numeric( $search );

	if (!$search_acc && !$search_email && !$search_char)
	{
		echo '<nothing></nothing>';
		include_short_footer();
		exit();
	}

	$account        =& Database::getMySQL();
	$illarionserver =& Database::getPostgreSQL( 'illarionserver' );
	$testserver     =& Database::getPostgreSQL( 'testserver' );

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
	if ($search_email)
	{
		$search_for[] = '`email` LIKE '.$account->Quote( '%'.$search.'%' );
	}
	if (count($search_for))
	{
		$query = "SELECT `id`"
		. "\n FROM `homepage_user`"
		. "\n WHERE ".implode( " OR ", $search_for );
		$account->setQuery( $query );
		$acc_list = $account->loadResultArray();
	}
	else
	{
		$acc_list = false;
	}

	$where = array( '1=1' );
	$or    = array();
	if ($search_char)
	{
		if ($numeric_search)
		{
			$or[] = 'chr_playerid = '.$illarionserver->Quote( $search );
		}
		else
		{
			$or[] = 'chr_name LIKE '.$illarionserver->Quote( '%'.$search.'%' );
		}
	}
	if ($status !== false)
	{
		switch ($status)
		{
			case  3: $where[] = 'chr_status IN (3,5,7,8)'; break;
			default: $where[] = 'chr_status = '.$illarionserver->Quote( $status );
		}
	}
	if ($race !== false)
	{
		switch ($race)
		{
			case  5: $where[] = 'chr_race IN (5,16)'; break;
			case  6: $where[] = 'chr_race IN (6,44,45)'; break;
			case  7: $where[] = 'chr_race IN (7,43)'; break;
			case  8: $where[] = 'chr_race IN (8,31,42)'; break;
			case 14: $where[] = 'chr_race IN (14,25)'; break;
			case 34: $where[] = 'chr_race IN (34,35)'; break;
			default: $where[] = 'chr_race = '.$illarionserver->Quote( $race );
		}
	}
	if ($sex !== false)
	{
		$where[] = 'chr_sex = '.$illarionserver->Quote( $sex );
	}
	if ($online !== false)
	{
		$where[] = '( ( SELECT COUNT(*) FROM onlineplayer WHERE on_playerid = chr_playerid ) = '.( $online === 0 ? 0 : 1).')';
	}
	if ($acc_list)
	{
		$or[] = 'chr_accid IN ('.implode(',',$acc_list).')';
	}

	$subquery = "\n FROM chars"
	. "\n WHERE ".implode( " AND ", $where )
	. "\n AND (".implode( ' OR ', $or ).")";
	;
	$query = "SELECT COUNT(*)".$subquery;
	$count = 0;
	if ($server === -1 || $server === 0)
	{
		$illarionserver->setQuery( $query );
		$count+= $illarionserver->loadResult();
	}
	if ($server === -1 || $server === 1)
	{
		$testserver->setQuery( $query );
		$count+= $testserver->loadResult();
	}
	$max = 0;
	$result_list = array();
	if ($count > 30)
	{
		$query = "SELECT COUNT(*)"
		. "\n FROM chars"
		;
		if ($server === -1 || $server === 0)
		{
			$illarionserver->setQuery( $query );
			$max+= $illarionserver->loadResult();
		}
		if ($server === -1 || $server === 1)
		{
			$testserver->setQuery( $query );
			$max+= $testserver->loadResult();
		}
	}
	elseif ($count == 0)
	{
		echo '<nothing></nothing>';
		include_short_footer();
		exit();
	}
	else
	{
		$query = "SELECT chr_playerid, chr_name".$subquery. "\n ORDER BY chr_name ASC";
		if ($server === -1 || $server === 0)
		{
			$illarionserver_list = array();
			$illarionserver->setQuery( $query );
			$illarionserver_list = $illarionserver->loadAssocList();
			foreach($illarionserver_list as $result)
			{
				$result['server'] = 0;
			}
			$result_list = array_merge($result_list,$illarionserver_list);

		}
		if ($server === -1 || $server === 1)
		{
			$illarionserver_list=array();
			$testserver->setQuery( $query );
			$testserver_list = $testserver->loadAssocList();
			foreach($illarionserver_list as $result)
			{
				$result['server'] = 0;
			}
			$result_list = array_merge($result_list,$testserver_list);
		}
	}
?>

<?php if ($count > 30) { ?>
<manyHits>
	<found><?php echo $count; ?></found>
	<max><?php echo $max; ?></max>
</manyHits>
<?php } else { ?>
<characters>
	<?php foreach($result_list as $result) { ?>
	<char>
		<id><?php echo $result['chr_playerid']; ?></id>
		<name><?php echo $result['chr_name']; ?></name>
		<server><?php echo $result['$server']; ?></server>
	</char>
	<?php } ?>
</characters>
<?php } ?>

<?php include_short_footer(); ?>