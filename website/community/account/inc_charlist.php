<?php
	function getCharacterList( &$need_slider )
	{
		$illarionserver =& Database::getPostgreSQL( 'illarionserver' );

		$query = 'SELECT chr_playerid, chr_name, chr_sex, chr_race, chr_status, ply_dob, \''.ILLARIONSERVER.'\' AS chr_server'
		.PHP_EOL.' FROM chars'
		.PHP_EOL.' LEFT JOIN player ON ply_playerid = chr_playerid'
		.PHP_EOL.' WHERE chr_accid = '.$illarionserver->Quote( IllaUser::$ID )
		.PHP_EOL.' ORDER BY chr_name ASC'
		;
		$illarionserver->setQuery( $query );
		$char_list = $illarionserver->loadAssocList();
		
		$testserver=& Database::getPostgreSQL( 'testserver' );
		$query = 'SELECT chr_playerid, chr_name, chr_sex, chr_race, chr_status, ply_dob, \''.TESTSERVER.'\' AS chr_server'
		.PHP_EOL.' FROM chars'
		.PHP_EOL.' LEFT JOIN player ON ply_playerid = chr_playerid'
		.PHP_EOL.' WHERE chr_accid = '.$testserver->Quote( IllaUser::$ID )
		.PHP_EOL.' ORDER BY chr_name ASC'
		;
		$testserver->setQuery( $query );
		$char_list = array_merge($char_list,$testserver->loadAssocList());

		if ( IllaUser::auth('devserver') )
		{
			$devserver=& Database::getPostgreSQL( 'devserver' );
			$query = 'SELECT chr_playerid, chr_name, chr_sex, chr_race, chr_status, ply_dob, \''.DEVSERVER.'\' AS chr_server'
			.PHP_EOL.' FROM chars'
			.PHP_EOL.' LEFT JOIN player ON ply_playerid = chr_playerid'
			.PHP_EOL.' WHERE chr_accid = '.$devserver->Quote( IllaUser::$ID )
			.PHP_EOL.' ORDER BY chr_name ASC'
			;
			$devserver->setQuery( $query );
			$char_list = array_merge($char_list,$devserver->loadAssocList());
		}

		for ($i = 0;$i<count($char_list);++$i)
		{
			$char_list[$i]['chr_picture'] = IllarionData::getRacePicture( $char_list[$i]['chr_race'], $char_list[$i]['chr_sex'] );
			if ($char_list[$i]['ply_dob'] == 0 || $char_list[$i]['chr_status'] == 40)
			{
				$need_slider = true;
			}
		}

		return $char_list;
	}

	function getCharacterCount()
	{
		$illarionserver =& Database::getPostgreSQL( 'illarionserver' );

		$query = 'SELECT COUNT(*)'
		.PHP_EOL.' FROM chars'
		.PHP_EOL.' WHERE chr_accid = '.$illarionserver->Quote( IllaUser::$ID )
		;
		$illarionserver->setQuery( $query );
		return (int)($illarionserver->loadResult());
	}

	function viewCharName( $character )
	{
		$id = $character['ident'];
		$name = $character['chr_name'];
		$enable_lightwindow = false;
		switch ($character['chr_status'])
		{
			case 3: // pending creation
			case 5: // name accepted
			case 7: // pending creation
			case 8: // pending creation
				return '<a href="'.Page::getURL().'/community/account/'.Page::getLanguage().'_newchar.php'.$id.'">'.$name.'</a>';
				break;
			case 0:  // playable
			case 1:  // inactive
			case 4:  // name check
			case 20: // perma jailed
			case 21: // temp jailed
			case 31: // temp banned
				if ( $character['ply_dob'] == 0 )
				{
					return '<a href="'.Page::getURL().'/community/account/'.Page::getLanguage().'_char_missinginfo.php'.$id.'"'.($enable_lightwindow ? ' onclick="'.JSBuilder::Lightwindow_activate( null, ( Page::isGerman() ? 'Fehlende Informationen für '.$name : 'Missing information for '.$name ), 460, 340, true ).'"' : '' ).'>'.$name.'</a>';
				}
				else
				{
					return '<a href="'.Page::getURL().'/community/account/'.Page::getLanguage().'_char_details.php'.$id.'">'.$name.'</a>';
				}
				break;
			case 40: // infos reset
				return '<a href="'.Page::getURL().'/community/account/'.Page::getLanguage().'_char_missinginfo.php'.$id.'"'.($enable_lightwindow ? ' onclick="'.JSBuilder::Lightwindow_activate( null, ( Page::isGerman() ? 'Fehlende Informationen für '.$name : 'Missing information for '.$name ), 460, 490, true ).'"' : '' ).'>'.$name.'</a>';
				break;
			default:
				return $name;
		}
	}

	function viewCharStatus( $character )
	{
		switch ($character['chr_status'])
		{
			case 0:  // playable
			case 1:  // inactive
			case 20: // perma jailed
			case 21: // temp jailed
			case 31: // temp banned
				if ( $character[ 'ply_dob' ] == 0 )
				{
					return ( Page::isGerman() ? 'Informationen unvollständig' : 'Information is incomplete' );
				}
				else
				{
					return IllarionData::getCharacterStatusName( $character['chr_status'] );
				}
				break;
			default:
				return IllarionData::getCharacterStatusName( $character['chr_status'] );
		}
	}
?>