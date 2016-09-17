<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setXML( );
	Page::Init( );

	$db =& Database::getPostgreSQL();
	
	$server = (isset($_GET['server']) && $_GET['server'] == 1 ? "illarionserver" : "devserver");
	
	$query = 'SELECT "skl_skill_id", "skl_group_id", "skl_name", "skl_name_german", "skl_name_english"'
	.PHP_EOL.'FROM "'.$server.'"."skills"'
	.PHP_EOL.'ORDER BY "skl_group_id"'
	;
	$db->setQuery( $query );
	$skillList = $db->loadAssocList();

	$query = 'SELECT "skg_group_id", "skg_name_german", "skg_name_english"'
	.PHP_EOL.'FROM "'.$server.'"."skillgroups"'
	.PHP_EOL.'ORDER BY "skg_group_id"'
	;
	$db->setQuery( $query );
	$groupList = $db->loadAssocList();
		
	echo '<skills>', PHP_EOL;
	$currentGroup = -1;
	foreach ($skillList as $skill)
	{
		if ($currentGroup != $skill['skl_group_id'])
		{
			if ($currentGroup > -1)
			{
				echo '  </group>', PHP_EOL;
			}
			$groupData = null;
			foreach ($groupList as $group)
			{
				if ($group['skg_group_id'] == $skill['skl_group_id'])
				{
					$groupData = $group;
					break;
				}
			}
			
			if ($groupData == null)
			{
				echo '  <group id="', $skill['skl_group_id'], '" german="unbekannt" english="unknown">', PHP_EOL;
			}
			else
			{
				echo '  <group id="', $groupData['skg_group_id'],'" german="', $groupData['skg_name_german'], '" english="', $groupData['skg_name_english'], '">', PHP_EOL;
			}
			
			$currentGroup = $skill['skl_group_id'];
		}
		
		echo '    <skill id="', $skill['skl_skill_id'], '" name="', $skill['skl_name'], '" german="', $skill['skl_name_german'], '" english="', $skill['skl_name_english'], '" />', PHP_EOL;
	}
	echo '  </group>', PHP_EOL;
	echo '</skills>', PHP_EOL;
?>
