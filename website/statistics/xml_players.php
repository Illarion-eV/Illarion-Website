<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setXML( );
	Page::Init( );

	$db =& Database::getPostgreSQL( 'illarionserver' );
	$query = 'SELECT chars.chr_name, chars.chr_playerid, chars.chr_race, (( SELECT MAX(a.chr_accid) FROM chars AS a) - 400) < chars.chr_accid AS newbie'
	.PHP_EOL.'FROM onlineplayer'
	.PHP_EOL.'INNER JOIN chars ON onlineplayer.on_playerid = chars.chr_playerid'
	.PHP_EOL.'INNER JOIN player ON onlineplayer.on_playerid = player.ply_playerid'
	.PHP_EOL.'WHERE (( SELECT COUNT(gms.gm_charid) AS count FROM gms WHERE gms.gm_charid = chars.chr_playerid AND NOT (gms.gm_rights_server & 131072) > 0)) = 0'
	.PHP_EOL.'ORDER BY chars.chr_race, chars.chr_name'
	;

	$db->setQuery( $query );
	$list = $db->loadAssocList();

	$shown_chars = 0;
	$found_newbies = 0;

	echo '<list>';
	if( count($list) > 0 )
	{
		$charids = array();
		foreach( $list as $key=>$char )
		{
			$list[$key]['chr_race'] = min(9,$char['chr_race']);
			$charids[] = $char['chr_playerid'];
		}

		$db_hp =& Database::getPostgreSQL( 'homepage' );
		$query = 'SELECT character_details.char_id, character_details.settings'
		.PHP_EOL.'FROM character_details'
		.PHP_EOL.'WHERE char_id IN ('.implode(',',$charids).')'
		;
		$db_hp->setQuery( $query );
		$chr_settings = $db_hp->loadAssocList( 'char_id' );

		$current_race = -1;
		$anything = false;

		foreach($list as $key=>$char)
		{
			if (!isset($chr_settings[$char['chr_playerid']]))
			{
				$show_char = true;
				$show_profil = false;
			}
			else
			{
				//$show_char = ((int)($chr_settings[$char['chr_playerid']]['settings']&2) == 0);
				$show_char = true;
				$show_profil = ((int)($chr_settings[$char['chr_playerid']]['settings']&1) > 0);
			}

			if (!$show_char)
			{
				continue;
			}
			++$shown_chars;
			if ($char['newbie']=='t' && !IllaUser::auth('hidden_chars'))
			{
				++$found_newbies;
				continue;
			}
			if ($char['chr_race'] != $current_race)
			{
				if ($anything)
				{
					echo '</race>';
				}

				$current_race = $char['chr_race'];
				$race_str = '<race id="'.$current_race.'" us="%s" de="%s">';
				switch($current_race)
				{
					case 0: echo sprintf( $race_str, 'Humans', 'Menschen' ); break;
					case 1: echo sprintf( $race_str, 'Dwarfs', 'Zwerge' ); break;
					case 2: echo sprintf( $race_str, 'Halflings', 'Halblinge' ); break;
					case 3: echo sprintf( $race_str, 'Elves', 'Elfen' ); break;
					case 4: echo sprintf( $race_str, 'Orcs', 'Orks' ); break;
					case 5: echo sprintf( $race_str, 'Lizardfolk', 'Echsenmenschen' ); break;
					case 6: echo sprintf( $race_str, 'Gnomes', 'Gnome' ); break;
					case 7: echo sprintf( $race_str, 'Fairies', 'Feen' ); break;
					case 8: echo sprintf( $race_str, 'Goblins', 'Goblins' ); break;
					default: echo sprintf( $race_str, 'Others', 'Sonstige' );
				}
			}
			$anything = true;
			echo '<char id="',dechex( $char['chr_playerid'] ),'" profil="',( $show_profil ? 'yes' : 'no' ),'">',$char['chr_name'],'</char>';
		}
		if ($anything)
		{
			echo '</race>';
		}
	}
	echo '<hidden>',(Page::getPlayerCount() - $shown_chars),'</hidden>';
	echo '<newbies>',$found_newbies,'</newbies>';
	echo '</list>';
?>
