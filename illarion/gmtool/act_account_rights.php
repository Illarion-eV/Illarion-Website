<?php
	if (!IllaUser::auth('gmtool_accounts'))
	{
		Messages::add((Page::isGerman()?'Zugriff verweigert':'Access denieded'), 'error');
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$accid = ( is_numeric($_GET['accid']) ? (int)$_GET['accid'] : 0 );

	if (!$accid)
	{
		Messages::add((Page::isGerman()?'Account ID wurde nicht richtig übergeben':'Account ID was not transfered correctly'), 'error');
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$groups = getGroupArray();
	$in_groups = array();
	$out_groups = array();
	foreach ($groups as $key=>$group)
	{
		if (isset($_POST[$key]))
		{
			$in_groups[] = $key;
		}
		else
		{
			$out_groups[] = $key;
		}
	}

	$pgSQL =& Database::getPostgreSQL( );

	$delete = "DELETE FROM accounts.account_groups WHERE ag_group_id IN (".implode(",",$out_groups).") AND ag_acc_id = ".$pgSQL->Quote( $accid );
	$pgSQL->setQuery( $delete );
	$pgSQL->query();

	foreach($in_groups as $group)
	{
		$insert = "INSERT INTO accounts.account_groups (ag_group_id, ag_acc_id) VALUES (".$pgSQL->Quote($group).",".$pgSQL->Quote( $accid ).")";
		$pgSQL->setQuery( $insert );
		$pgSQL->query();
	}

		Messages::add((Page::isGerman()?'Änderungen wurden gespeichert':'Changes got saved'), 'info');
?>
