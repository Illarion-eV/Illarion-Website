<?php
include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

IllaUser::requireLogin();

Page::Init();

$server = ( isset( $_GET['server'] ) && $_GET['server'] == '1' ? 'testserver' : 'illarionserver');
$charid = ( isset( $_GET['charid'] )  && is_numeric($_GET['charid']) ? (int)$_GET['charid'] : false );

if (!$charid)
{
	exit('Error - Character ID was not transfered correctly.');
}

$pgSQL =& Database::getPostgreSQL();

$query = 'SELECT chr_race, chr_status'
.PHP_EOL.' FROM '.$server.'.chars'
.PHP_EOL.' WHERE chr_playerid = '.$pgSQL->Quote( $charid )
.PHP_EOL.' AND chr_accid = '.$pgSQL->Quote( IllaUser::$ID )
;
$pgSQL->setQuery( $query );
list( $race, $status ) = $pgSQL->loadRow();

if ($race === null || $race === false)
{
	Messages::add( 'Character not found', 'error' );
	includeWrapper::includeOnce( Page::getRootPath().'/community/account/us_charlist.php' );
	exit();
}

if ($status != 3 && $status != 5 && $status != 7 && $status != 8)
{
	exit('Error - Wrong character state');
}

$query = 'SELECT COUNT(*)'
.PHP_EOL.' FROM '.$server.'.player'
.PHP_EOL.' WHERE ply_playerid = '.$pgSQL->Quote( $charid )
;
$pgSQL->setQuery( $query );
if (!$pgSQL->loadResult())
{
	exit("Error - Data not set");
}

if ($server == 'testserver')
{
	$newbieOnly = false;
}
else
{
	$query = 'SELECT COUNT(*)'
	.PHP_EOL.' FROM '.$server.'.chars'
	.PHP_EOL.' WHERE chr_accid = '.$pgSQL->Quote( IllaUser::$ID )
	.PHP_EOL.' AND chr_status NOT IN (3,5,7,8)'
	;
	$pgSQL->setQuery( $query );
	$char_count = $pgSQL->loadResult();
	if (!$char_count)
	{
		$newbieOnly = true;
	}
	else
	{
		$query = 'SELECT COUNT(*)'
		.PHP_EOL.' FROM '.$server.'.chars'
		.PHP_EOL.' INNER JOIN '.$server.'.questprogress ON qpg_userid = chr_playerid'
		.PHP_EOL.' WHERE chr_accid = '.$pgSQL->Quote( IllaUser::$ID )
		.PHP_EOL.' AND qpg_questid = 2'
		.PHP_EOL.' AND qpg_progress > 0'
		.PHP_EOL.' AND chr_status NOT IN (3,5,7,8)'
		;
		$pgSQL->setQuery( $query );
		if ($char_count>$pgSQL->loadResult())
		{
			$newbieOnly = false;
		}
		else
		{
			$newbieOnly = true;
		}
	}
}

$query = 'SELECT "stp_id", "stp_english" AS "name"'
.PHP_EOL.' FROM "'.$server.'"."skillpacks"'
.PHP_EOL.' WHERE 1=1';
$pgSQL->setQuery($query);
$start_packs = $pgSQL->loadAssocList();

Page::setXHTML();
Page::addJavaScript( 'prototype' );
Page::addJavaScript( 'newchar_3' );

?>

<h1>Create a new character</h1>

<h2>Step 4</h2>

<p>Here you are able to choose the starting equipment as well as the skills your character has at the very beginning. During the game you will
			gain further skills and new equipment. The selection of the first equipment package has no real influence on the further game.
			So just choose the package you like most.</p>

	<form action="<?php echo Page::getURL(); ?>/community/account/us_newchar.php?charid=<?php echo $charid,($_GET['server'] == '1' ? '&amp;server=1' : ''); ?>" method="post" name="package" id="package">

		<h2>Start equipment and skills</h2>

		<select name="startpack" id="startpack" onchange="selectStartpack();return false;">
			<?php foreach($start_packs as $pack): ?>
			<option value="<?php echo $pack['stp_id']; ?>"><?php echo $pack['name']; ?></option>
			<?php endforeach; ?>
		</select>
		<span id="loading" style="display:none;">
			<img src="<?php echo Page::getImageURL(); ?>/ajax-loading-small.gif" style="height:16px;width:16px;margin-right:10px;" alt="Loading..." />
			Downloading package...
		</span>

		<div id="startpack_area"></div>

		<p style="text-align:center;padding:10px;">
			<input type="hidden" name="sel_pack" id="sel_pack" value="" />
			<input type="hidden" name="serverId" id="serverId" value="<?php echo ($server == 'illarionserver' ? '0' : '1'); ?>" />
			<input type="hidden" name="action" value="newchar_4" />
			<input type="submit" name="submit_button" id="submit_button" value="Save data" />
		</p>
	</form>