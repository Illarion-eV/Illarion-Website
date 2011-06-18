<?php
	checkAndUpdateChar();

	function checkAndUpdateChar()
	{
		if (!IllaUser::loggedIn())
		{
			Messages::add((Page::isGerman()?'Nicht eingeloggt':'Not logged in'),'error');
			return;
		}

		$server = ( isset( $_GET['server'] ) && (int)$_GET['server'] == 1 ? 'testserver' : 'illarionserver' );
		$charid = ( isset( $_GET['charid'] ) && is_numeric($_GET['charid']) ? (int)$_GET['charid'] : 0 );
		$pgSQL =& Database::getPostgreSQL( $server );

		$query = 'SELECT chr_race, chr_sex'
		.PHP_EOL.' FROM chars'
		.PHP_EOL.' WHERE chr_playerid = '.$pgSQL->Quote( $charid )
		.PHP_EOL.' AND chr_accid = '.$pgSQL->Quote( IllaUser::$ID )
		;
		$pgSQL->setQuery( $query );
		list( $race, $sex ) = $pgSQL->loadRow();

		if ($race === null || $race === false)
		{
			Messages::add((Page::isGerman()?'Charakter nicht gefunden':'The character was not found'),'error');
			return;
		}

		$account =& Database::getPostgreSQL( 'accounts' );
		$query = 'SELECT *'
		.PHP_EOL.' FROM raceattr'
		.PHP_EOL.' WHERE id IN ( -1, '.$account->Quote( $race ).' )'
		.PHP_EOL.' ORDER BY id DESC'
		;
		$account->setQuery( $query, 0, 1 );
		$limits = $account->loadAssocRow();

		$new_bodyheight = (float)$_POST['bodyheight'];
		$new_weight = (float)$_POST['weight'];

		if (IllaUser::usesMeter())
		{
			$new_bodyheight = round($new_bodyheight*100/2.54);
		}
		if (IllaUser::usesPound())
		{
			$new_weight = round( $new_weight*100/2.204623 );
		}
		else
		{
			$new_weight *= 100;
		}

		if ( $new_weight < $limits['minweight'] || $new_weight > $limits['maxweight'] )
		{
			Messages::add((Page::isGerman()?'Gewicht überschreitet die vorgegebenen Grenzen':'Weight out of range'),'error');
			return;
		}
		if ( $new_bodyheight < $limits['minbodyheight'] || $new_bodyheight > $limits['maxbodyheight'] )
		{
			Messages::add((Page::isGerman()?'Körpergröße überschreitet die vorgegebenen Grenzen':'Height out of range'),'error');
			return;
		}

		$age = (int)$_POST['age'];
		$day = (int)$_POST['day'];
		$month = (int)$_POST['month'];

		if ( $age < $limits['minage'] || $age > $limits['maxage'] )
		{
			Messages::add((Page::isGerman()?'Alter überschreitet die vorgegebenen Grenzen':'Age out of range'),'error');
			return;
		}

		$current_data = IllaDateTime::IllaTimestampToTime( 'array' );

		$illa_day_stamp = ( ( $current_data['year'] - $age ) - ( -10000 ) );
		if ( ( ( $month - 1 ) * 24 + $day ) > ( ( $current_data['month'] - 1 ) * 24 + $current_data['day'] ) )
		{
			$illa_day_stamp -= 1;
		}
		$illa_day_stamp = ( $illa_day_stamp * 365 ) + ( ( $month - 1 ) * 24 ) + $day;

		$attributes = array();
		$sum = 0;
		foreach( array( 'strength', 'agility', 'constitution', 'dexterity', 'intelligence', 'perception', 'willpower', 'essence' ) as $name )
		{
			$attributes[$name] = ( is_numeric($_POST[$name]) ? (int)$_POST[$name] : 0 );
			if ( $attributes[$name] < $limits['min'.$name] || $attributes[$name] > $limits['max'.$name] )
			{
				Messages::add((Page::isGerman()?'Attribute überschreiten die vorgegebenen Grenzen':'Attributes out of range'),'error');
				return;
			}
			$sum += $attributes[$name];
			$attributes[$name] = $pgSQL->Quote( $attributes[$name] );
		}

		if ($sum > $limits['maxattribs'])
		{
			Messages::add((Page::isGerman()?'Die Summe der Attribute ist zu groß. Es müssen genau '.$limits['maxattribs'].' Attributspunkte verteilt werden.':'The sum of attributes is too large. You have to use exactly '.$limits['maxattribs'].' attribute points.'),'error');
			return;
		}
		elseif ($sum < $limits['maxattribs'])
		{
			Messages::add((Page::isGerman()?'Die Summe der Attribute ist zu klein. Es müssen genau '.$limits['maxattribs'].' Attributspunkte verteilt werden.':'The sum of attributes is too low. You have to use exactly '.$limits['maxattribs'].' attribute points.'),'error');
			return;
		}

		$appearance = 1;
		switch ( $race )
		{
			case 0: if ($sex == 0) { $appearance =1;  } else { $appearance =16; } break;
			case 1: if ($sex == 0) { $appearance =12; } else { $appearance =17; } break;
			case 2: if ($sex == 0) { $appearance =24; } else { $appearance =25; } break;
			case 3: if ($sex == 0) { $appearance =20; } else { $appearance =19; } break;
			case 4: if ($sex == 0) { $appearance =13; } else { $appearance =18; } break;
			case 5: $appearance =7; break;
			case 6: if ($sex == 0) { $appearance =47; }	else { $appearance =46; } break;
			case 7: $appearance =45; break;
			case 8: if ($sex == 0) { $appearance =32; }	else { $appearance =49; } break;
		}

		$query = 'INSERT INTO player (ply_playerid,ply_age,ply_weight,ply_body_height,ply_strength,ply_dexterity,ply_constitution,ply_agility,ply_intelligence,ply_perception,ply_willpower,ply_essence,ply_appearance,ply_dob,ply_hitpoints,ply_mana,ply_foodlevel,ply_lifestate)'
		.PHP_EOL.' VALUES ('.$pgSQL->Quote( $charid ).','.$pgSQL->Quote( $age ).','.$pgSQL->Quote( $new_weight ).','.$pgSQL->Quote( $new_bodyheight ).','.$attributes['strength'].','.$attributes['dexterity'].','.$attributes['constitution'].','.$attributes['agility'].','.$attributes['intelligence'].','.$attributes['perception'].','.$attributes['willpower'].','.$attributes['essence'].','.$pgSQL->Quote( $appearance ).','.$pgSQL->Quote( $illa_day_stamp ).',10000,0,50000,1)'
		;
		$pgSQL->setQuery( $query );
		$pgSQL->query();
	}
?>