<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( 'Players Online' );
	Page::setDescription( 'This page shows the players who are online' );
	Page::setKeywords( array( 'online', 'players', 'statistics' ) );

	Page::addCSS( 'onlineplayer' );

	Page::setXHTML();
	Page::Init();
?>

<h1>Players Online</h1>

<?php if ( Page::getDebugger() > 0 ): ?>
<h2>Debugger running</h2>

<p>At the moment there is a debugger running along with the gameserver. This debugger
analizes the server while its running and helps this way searching errors. Its
possible that the server runs very slow while the debugger is working or the
connection gets instable. But we are thankful for everyone playing on the server
anyway because this makes it usually easier to find errors.</p>

<?php Page::insert_go_to_top_link(); ?>
<?php endif; ?>

<h2>
	<span class="float_left">Overview (State: <?php echo strftime( '%d. %B %Y %H:%M:%S', IllaDateTime::TimestampWithOffset() ) ?> <?php echo strtolower(strftime( '%p', IllaDateTime::TimestampWithOffset() )) ?>)</span>
	<span class="float_right"><?php echo IllaDateTime::IllaTimestampToTime( 'dS F Y - h:i:s a' ); ?></span>
	<a class="clr" style="display:block;"></a>
</h2>

<?php if (Page::getServerStatus() == 1): ?>
<p>The server is offline so nobody is able to play. But we are working to change this
as soon as possible.</p>
<?php elseif (Page::getPlayerCount() == 0): ?>
<p>The server is up and running but nobody plays currently. This should stop noone from
logging on. Usually other follow if someone is playing.</p>
<?php else:

    $pgSQL =& Database::getPostgreSQL();

    $query = 'SELECT "illarionserver"."chars"."chr_name" AS "chr_name",'
	.PHP_EOL.'       "illarionserver"."chars"."chr_playerid" AS "chr_playerid",'
	.PHP_EOL.'       (NOW() - interval \'1 months\') < "accounts"."account"."acc_registerdate" AS "newbie",'
	.PHP_EOL.'       ("illarionserver"."player"."ply_posz" >= 100 AND "illarionserver"."player"."ply_posz" <= 103) AS "newbieisland",'
	.PHP_EOL.'       ("illarionserver"."gms"."gm_rights_server" IS NOT NULL AND ("illarionserver"."gms"."gm_rights_server" & 131072) = 0) AS "gm",'
	.PHP_EOL.'       CASE WHEN "illarionserver"."questprogress"."qpg_progress" IS NULL OR "illarionserver"."questprogress"."qpg_progress" = 0 THEN \'4\' ELSE "illarionserver"."questprogress"."qpg_progress" END AS "town",'
	.PHP_EOL.'       ("homepage"."character_details"."settings" IS NOT NULL AND ("homepage"."character_details"."settings" & 1) > 0) AS "show_profile"'
	.PHP_EOL.' FROM "illarionserver"."onlineplayer"'
	.PHP_EOL.' INNER JOIN "illarionserver"."chars" ON "illarionserver"."onlineplayer"."on_playerid" = "illarionserver"."chars"."chr_playerid"'
	.PHP_EOL.' INNER JOIN "illarionserver"."player" ON "illarionserver"."onlineplayer"."on_playerid" = "illarionserver"."player"."ply_playerid"'
	.PHP_EOL.' INNER JOIN "accounts"."account" ON "illarionserver"."chars"."chr_accid" = "accounts"."account"."acc_id"'
	.PHP_EOL.' LEFT JOIN "illarionserver"."questprogress" ON "illarionserver"."onlineplayer"."on_playerid" = "illarionserver"."questprogress"."qpg_userid" AND "illarionserver"."questprogress"."qpg_questid" = 199'
	.PHP_EOL.' LEFT JOIN "illarionserver"."gms" ON "illarionserver"."onlineplayer"."on_playerid" = "illarionserver"."gms"."gm_charid"'
	.PHP_EOL.' LEFT JOIN "homepage"."character_details" ON "illarionserver"."onlineplayer"."on_playerid" = "homepage"."character_details"."char_id"'
	.PHP_EOL.' WHERE TRUE'
	.PHP_EOL.' ORDER BY "town", "chr_name"'
	;

	$pgSQL->setQuery( $query );
	$list = $pgSQL->loadAssocList();

	if( count($list) > 0 )
	{
		$content = array( 0=>'', 1=>'' );
		$content_length = array( 0=>0, 1=>0 );
		$current_list = 1;
		$current_town = -1;
		
		foreach($list as $key=>$char)
		{
			if ($char['town'] != $current_town)
			{
				if ($content_length[$current_list] != 0)
				{
					$content[$current_list] .= '</ul>';
				}
				$current_list = ( $content_length[0] > $content_length[1] ? 1 : 0 );

				$current_town = $char['town'];
				$content_length[$current_list] += 56;
				switch($current_town)
				{
					case 1: $content[$current_list] .= '<div style="margin:16px 0"><img style="float:left;margin-top:-4px;" src="'.Page::getCurrentImageURL().'/factions/cadomyrShield32.png" /><h3 style="margin:0">Cadomyr</h3></div>'; break;
					case 2: $content[$current_list] .= '<div style="margin:16px 0"><img style="float:left;margin-top:-4px;" src="'.Page::getCurrentImageURL().'/factions/runewickShield32.png" /><h3 style="margin:0">Runewick</h3></div>'; break;
					case 3: $content[$current_list] .= '<div style="margin:16px 0"><img style="float:left;margin-top:-4px;" src="'.Page::getCurrentImageURL().'/factions/galmairShield32.png" /><h3 style="margin:0">Galmair</h3></div>'; break;
					case 4: $content[$current_list] .= '<h3>Outlaws</h3>'; break;
					default: $content[$current_list] .= '<h3>Unbekannt</h3>';
				}
				$content[$current_list] .= '<ul>';
			}
			$content[$current_list] .= '<li>';
			$content_length[$current_list] += 17;
			
			if ($char["show_profile"] == 't')
			{
				$content[$current_list] .= '<a class="rating8" href="'.Page::getURL().'/community/us_charprofile.php?id='.dechex( $char['chr_playerid'] ).'">'.$char['chr_name'] . '</a>';
			}
			else
			{
				$content[$current_list] .= $char['chr_name'];
			}
			
			if ($char['newbie'] == 't')
			{
				if ($char['newbieisland'] == 't')
				{
					$content[$current_list] .= '<span class="newbie"> (Tutorial)</span>';
				}
				else
				{
					$content[$current_list] .= '<span class="newbie"> (New)</span>';
				}
			}
			
			if ($char['gm'] == 't')
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

<?php Page::insert_go_to_top_link(); ?>

<?php endif; ?>

<?php
	$pgSQL =& Database::getPostgreSQL();

	if(IllaUser::auth('quests'))
	{
		$query = 'SELECT q_title_de, q_title_us, q_status, q_id, q_type, q_starttime'
		.PHP_EOL.' FROM homepage.quests'
		.PHP_EOL.' WHERE q_status != 3'
		.PHP_EOL.' ORDER BY q_starttime ASC, q_status DESC, q_type DESC, COALESCE( q_title_us , q_title_de ) ASC'
		;
	}
	else
	{
		$query = 'SELECT q_title_de, q_title_us, q_status, q_id, q_type, q_starttime'
		.PHP_EOL.' FROM homepage.quests'
		.PHP_EOL.' WHERE q_status != 3 AND ( q_type != 2 OR q_user_id = '.$pgSQL->Quote( IllaUser::$ID ).' )'
		.PHP_EOL.' ORDER BY q_starttime ASC, q_status DESC, q_type DESC, COALESCE( q_title_us , q_title_de ) ASC'
		;
	}

	$pgSQL->setQuery( $query );
	$quests = $pgSQL->loadAssocList();
	if ( count($quests) > 0):
?>

<h2>Quests and Events</h2>

<table class="quests">
	<?php foreach($quests as $key=>$quest): ?>
	<?php
		if ($quest['q_type'] == 2)
		{
			$quest['q_status'] = 3;
		}
		if (!is_null( $quest['q_starttime'] ))
		{
		    $quest['q_starttime'] = strtotime( $quest['q_starttime'] );
		}
	?>
	<tr>
		<td class="title">
			<a style="font-weight:bold;" href="<?php echo Page::getURL(); ?>/statistics/us_quests.php?id=<?php echo $quest['q_id']; ?>">
				<?php echo ( is_null($quest['q_title_us']) ? $quest['q_title_de'] : $quest['q_title_us'] ); ?>
			</a>
		</td>
		<td class="type"><?php echo ( $quest['q_type'] == 1 ? 'Official Quest' : 'Player Quest'); ?></td>
		<td class="status<?php echo $quest['q_status']; ?>">
			<?php
				switch($quest['q_status'])
				{
					case 0:	echo 'Quest is planned'; break;
					case 1:	echo 'Quest starts soon'; break;
					case 2:	echo 'Quest takes place now'; break;
					case 3:	echo 'Not activated'; break;
				}
				if (!is_null( $quest['q_starttime'] ))
				{
					echo '<br />', strftime( '%d. %B %Y %I:%M %P', IllaDateTime::TimestampWithOffset( $quest['q_starttime'] ) );
				}
			?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<?php endif; ?>

<?php if (IllaUser::auth('quests')): ?>
<p><button onclick="window.location.href='<?php echo Page::getURL(); ?>/statistics/us_quests_edit.php'">New quest</button></p>
<?php elseif (IllaUser::loggedIn()): ?>
<p><button onclick="window.location.href='<?php echo Page::getURL(); ?>/statistics/us_quests_edit.php'">New player quest</button></p>
<?php endif; ?>

<?php if ( count($quests) > 0): ?>
<?php Page::insert_go_to_top_link(); ?>
<?php endif; ?>
