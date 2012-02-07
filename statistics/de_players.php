<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( 'Online-Spieler' );
	Page::setDescription( 'Diese Seite zeigt an, welche Spieler gerade online sind.' );
	Page::setKeywords( array( 'Online', 'Spieler', 'Statistik' ) );

	Page::addCSS( 'onlineplayer' );

	Page::setXHTML();
	Page::Init();
?>

<h1>Online-Spieler</h1>

<?php if ( Page::getDebugger() > 0 ): ?>
<h2>Debugger läuft</h2>

<p>Im Augenblick läuft zusammen mit dem Spielserver ein Debugger der den Server wärend
er läuft analysiert und so bei der Fehlersuche hilft. Es ist möglich das der Server sehr
langsam läuft und die Verbindung ab und an unterbrochen wird. Wir sind aber dankbar für
jeden der auf dem Server spielt weil das die Fehlersuche vereinfacht.</p>

<?php Page::insert_go_to_top_link(); ?>
<?php endif; ?>

<h2>
	<span class="float_left">Übersicht (Stand: <?php echo strftime( '%d. %B %Y - %H:%M:%S', IllaDateTime::TimestampWithOffset() ) ?> Uhr)</span>
	<span class="float_right"><?php echo IllaDateTime::IllaTimestampToTime( 'd. F Y - H:i:s' ); ?> Uhr</span>
	<a class="clr" style="display:block;"></a>
</h2>

<?php if (Page::getServerStatus() == 1): ?>
<p>Der Server ist offline also kann keiner spielen. Aber wir versuchen den Server so
schnell wie möglich wieder in Betrieb zu nehmen.</p>
<?php elseif (Page::getPlayerCount() == 0): ?>
<p>Der Server läuft aber im Augenblick spielt niemand. Das muss aber niemanden davon
abhalten einzuloggen. Oft folgen mehr Spieler nach wenn erstmal jemand eingeloggt ist.
</p>
<?php else:

	$pgSQL =& Database::getPostgreSQL();
	
	$query = 'SELECT s_value'
	.PHP_EOL.' FROM homepage.storage'
	.PHP_EOL.' WHERE s_key = '.$pgSQL->Quote('newbie_accid')
	;
	$pgSQL->setQuery($query);
	$newbie_accs = $pgSQL->loadResult();

	if (IllaUser::auth('hidden_chars'))
	{
		$query = 'SELECT "illarionserver"."chars"."chr_name", "illarionserver"."chars"."chr_playerid", "illarionserver"."chars"."chr_race", '.$newbie_accs.' < "illarionserver"."chars"."chr_accid" AS "newbie", ("illarionserver"."player"."ply_posz" >= 100 AND "illarionserver"."player"."ply_posz" <= 103) AS "newbieisland", (( SELECT count("illarionserver"."gms"."gm_charid") AS "count" FROM "illarionserver"."gms" WHERE "illarionserver"."gms"."gm_charid" = "illarionserver"."chars"."chr_playerid" AND NOT ("illarionserver"."gms"."gm_rights_server" & 131072) > 0)) > 0 AS gm'
		.PHP_EOL.' FROM "illarionserver"."onlineplayer"'
		.PHP_EOL.' INNER JOIN "illarionserver"."chars" ON "illarionserver"."onlineplayer"."on_playerid" = "illarionserver"."chars"."chr_playerid"'
		.PHP_EOL.' INNER JOIN "illarionserver"."player" ON "illarionserver"."onlineplayer"."on_playerid" = "illarionserver"."player"."ply_playerid"'
		.PHP_EOL.' WHERE 1 = 1'
		.PHP_EOL.' ORDER BY "illarionserver"."chars"."chr_race", "illarionserver"."chars"."chr_name"'
		;
	}
	else
	{
		$query = 'SELECT "illarionserver"."chars"."chr_name", "illarionserver"."chars"."chr_playerid", "illarionserver"."chars"."chr_race", '.$newbie_accs.' < "illarionserver"."chars"."chr_accid" AS "newbie"'
		.PHP_EOL.' FROM "illarionserver"."onlineplayer"'
		.PHP_EOL.' INNER JOIN "illarionserver"."chars" ON "illarionserver"."onlineplayer"."on_playerid" = "illarionserver"."chars"."chr_playerid"'
		.PHP_EOL.' INNER JOIN "illarionserver"."player" ON "illarionserver"."onlineplayer"."on_playerid" = "illarionserver"."player"."ply_playerid"'
		.PHP_EOL.' WHERE (( SELECT COUNT("illarionserver"."gms"."gm_charid") AS "count" FROM "illarionserver"."gms" WHERE "illarionserver"."gms"."gm_charid" = "illarionserver"."chars"."chr_playerid" AND NOT ("illarionserver"."gms"."gm_rights_server" & 131072) > 0)) = 0 AND "illarionserver"."chars"."chr_playerid" >= 100'
		.PHP_EOL.' ORDER BY "illarionserver"."chars"."chr_race", "illarionserver"."chars"."chr_name"'
		;
	}
	$pgSQL->setQuery( $query );
	$list = $pgSQL->loadAssocList();

	$displayed_chars = 0;
	$newbies = 0;


    $db_hp =& Database::getPostgreSQL( 'homepage' );
	if( count($list) > 0 )
	{
		$charids = array();
		foreach( $list as $key=>$char )
		{
			$list[$key]['chr_race'] = min(9,$char['chr_race']);
			$charids[] = $char['chr_playerid'];
		}


		$query = 'SELECT character_details.char_id, character_details.settings, character_details.votes_count, character_details.votes_result'
		.PHP_EOL.' FROM character_details'
		.PHP_EOL.' WHERE char_id IN ('.implode( ',', $charids ).')'
		;
		$db_hp->setQuery( $query );
		$chr_settings = $db_hp->loadAssocList( 'char_id' );

		$content = array( 0=>'', 1=>'' );
		$content_length = array( 0=>0, 1=>0 );
		$current_list = 1;
		$current_race = -1;

		foreach($list as $key=>$char)
		{
			if (!isset($chr_settings[$char['chr_playerid']]))
			{
				$show_char = true;
				$show_profil = false;
			}
			else
			{
                // always show chars
				// $show_char = ((int)($chr_settings[$char['chr_playerid']]['settings']&2) == 0);
                $show_char = true;
				$show_profil = ((int)($chr_settings[$char['chr_playerid']]['settings']&1) > 0);
			}

			if (!$show_char && !IllaUser::auth('hidden_chars'))
			{
				continue;
			}
			++$displayed_chars;

			if ($char['newbie']=='t' && !IllaUser::auth('hidden_chars'))
			{
				++$newbies;
				continue;
			}

			if ($char['chr_race'] != $current_race)
			{
				if ($content_length[$current_list] != 0)
				{
					$content[$current_list] .= '</ul>';
				}
				$current_list = ( $content_length[0] > $content_length[1] ? 1 : 0 );

				$current_race = $char['chr_race'];
				$content_length[$current_list] += 56;
				$content[$current_list] .= '<h3>';
				switch($current_race)
				{
					case 0: $content[$current_list] .= 'Menschen'; break;
					case 1: $content[$current_list] .= 'Zwerge'; break;
					case 2: $content[$current_list] .= 'Halblinge'; break;
					case 3: $content[$current_list] .= 'Elfen'; break;
					case 4: $content[$current_list] .= 'Orks'; break;
					case 5: $content[$current_list] .= 'Echsenmenschen'; break;
					case 6: $content[$current_list] .= 'Gnome'; break;
					case 7: $content[$current_list] .= 'Feen'; break;
					case 8: $content[$current_list] .= 'Goblins'; break;
					default: $content[$current_list] .= 'Andere';
				}
				$content[$current_list] .= '</h3>';
				$content[$current_list] .= '<ul>';
			}
			$content[$current_list] .= '<li>';
			$content_length[$current_list] += 17;
			if ($show_char)
			{
				if ($show_profil)
				{
					if ($chr_settings[$char['chr_playerid']]['votes_count'] == 0)
					{
						$chr_settings[$char['chr_playerid']]['votes_result'] = 5;
					}
					$content[$current_list] .= '<a class="rating'.$chr_settings[$char['chr_playerid']]['votes_result'].'" href="'.Page::getURL().'/community/de_charprofile.php?id='.dechex( $char['chr_playerid'] ).'">'.$char['chr_name'] . '</a>';
				}
				else
				{
			    	$content[$current_list] .= $char['chr_name'];
				}
			}
			else
			{
				if ($show_profil)
				{
					if ($chr_settings[$char['chr_playerid']]['votes_count'] == 0)
					{
						$chr_settings[$char['chr_playerid']]['votes_result'] = 5;
					}
					$content[$current_list] .= '<a class="hidden rating'.$chr_settings[$char['chr_playerid']]['votes_result'].'" href="'.Page::getURL().'/community/de_charprofile.php?id='.dechex( $char['chr_playerid'] ).'">'.$char['chr_name'] . '</a>';
				}
				else
				{
			    	$content[$current_list] .= '<span class="hidden">'.$char['chr_name'].'</span>';
				}
			}
			if ($char['newbie']=='t')
			{
				if ($char['newbieisland']=='t')
				{
					$content[$current_list] .= '<span class="newbie"> (NI)</span>';
				}
				else
				{
					$content[$current_list] .= '<span class="newbie"> (N)</span>';
				}
			}
			if ($char['gm']=='t')
			{
			   $content[$current_list] .= '<span class="gm"> (GM)</span>';
			}
	    	$content[$current_list] .= '</li>';
		}
		if ($content_length[$current_list] > 0)
		{
			$content[$current_list] .= '</ul>';
		}
	}
?>

<?php if ( $content_length[0] > 0 ): ?>
<table class="charlist">
	<tr>
		<td><?php echo $content[0]; ?></td>
		<td><?php echo $content[1]; ?></td>
	</tr>
</table>
<?php endif; ?>

<?php
	if ( ( $hidden_chars = Page::getPlayerCount() - $displayed_chars ) > 0 )
	{
		echo '<p class="hidden_chars">';
		if ($hidden_chars == 1)
		{
			echo 'Ein Charakter ist online der nicht auf der Onlineliste angezeigt wird.';
		}
		elseif ($hidden_chars > 1)
		{
			echo $hidden_chars,' Charaktere sind online die nicht auf der Liste angezeigt werden.';
		}
		echo '</p>';
	}

	if ( $newbies > 0 )
	{
		echo '<p class="hidden_newbies">';
		if ($newbies == 1)
		{
			echo 'Ein neuer Spieler ist online der nicht auf der Onlineliste angezeigt wird.';
		}
		elseif ($newbies > 1)
		{
			echo $newbies,' neue Spieler sind online die nicht auf der Onlineliste angezeigt werden.';
		}
		echo '</p>';
	}
?>

<?php Page::insert_go_to_top_link(); ?>

<?php endif; ?>

<?php
	if(IllaUser::auth('quests'))
    {
        $query = 'SELECT q_title_de, q_title_us, q_status, q_id, q_type'
        .PHP_EOL.' FROM homepage.quests'
        .PHP_EOL.' WHERE q_status != 3'
        .PHP_EOL.' ORDER BY q_status DESC, q_type DESC, COALESCE( q_title_de , q_title_us ) ASC'
        ;
    }
    else
    {
        $query = 'SELECT q_title_de, q_title_us, q_status, q_id, q_type'
        .PHP_EOL.' FROM homepage.quests'
        .PHP_EOL.' WHERE q_status != 3 AND ( q_type != 2 OR q_user_id = '.$pgSQL->Quote( IllaUser::$ID ).' )'
        .PHP_EOL.' ORDER BY q_status DESC, q_type DESC, COALESCE( q_title_de , q_title_us ) ASC'
        ;
    }
    $pgSQL->setQuery( $query );
    $quests = $pgSQL->loadAssocList();
	if ( count($quests) > 0):
?>

<h2>Quests</h2>

<table class="quests">
	<?php foreach($quests as $key=>$quest): ?>
	<?php
		if ($quest['q_type'] == 2)
		{
			$quest['q_status'] = 3;
		}
	?>
	<tr>
		<td class="title">
			<a style="font-weight:bold;" href="<?php echo Page::getURL(); ?>/statistics/de_quests.php?id=<?php echo $quest['q_id']; ?>">
				<?php echo ( is_null($quest['q_title_de']) ? $quest['q_title_us'] : $quest['q_title_de'] ); ?>
			</a>
		</td>
		<td class="type"><?php echo ( $quest['q_type'] == 1 ? 'Offizieller Quest' : 'Spieler-Quest'); ?></td>
		<td class="status<?php echo $quest['q_status']; ?>">
			<?php
				switch($quest['q_status'])
				{
					case 0:	echo 'Quest in Planung'; break;
					case 1:	echo 'Quest startet in Kürze'; break;
					case 2:	echo 'Quest läuft zur Zeit'; break;
					case 3:	echo 'Nicht aktiviert'; break;
				}
			?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<?php endif; ?>

<?php if (IllaUser::auth('quests')): ?>
<p><button onclick="window.location.href='<?php echo Page::getURL(); ?>/statistics/de_quests_edit.php'">Neuen Quest eintragen</button></p>
<?php elseif(IllaUser::loggedIn()): ?>
<p><button onclick="window.location.href='<?php echo Page::getURL(); ?>/statistics/de_quests_edit.php'">Neuen Spieler-Quest eintragen</button></p>
<?php endif; ?>

<?php if ( count($quests) > 0): ?>
<?php Page::insert_go_to_top_link(); ?>
<?php endif; ?>
