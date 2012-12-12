<?php
include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

IllaUser::requireLogin();

Page::Init();

$server = ( isset( $_GET['server'] ) && $_GET['server'] == '1' ? 'testserver' : 'illarionserver');
$charid = ( isset( $_GET['charid'] )  && is_numeric($_GET['charid']) ? (int)$_GET['charid'] : false );

if (!$charid)
{
	exit('Fehler - Charakter ID wurde nicht richtig übergeben.');
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
	Messages::add( 'Charakter wurde nicht gefunden.', 'error' );
	includeWrapper::includeOnce( Page::getRootPath().'/community/account/de_charlist.php' );
	exit();
}

if ($status != 3 && $status != 5 && $status != 7 && $status != 8)
{
	exit('Fehler - Falscher Charakterstatus.');
}

$query = 'SELECT COUNT(*)'
.PHP_EOL.' FROM '.$server.'.player'
.PHP_EOL.' WHERE ply_playerid = '.$pgSQL->Quote( $charid )
;
$pgSQL->setQuery( $query );
if (!$pgSQL->loadResult())
{
	exit("Fehler - Daten nicht gesetzt.");
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

$query = 'SELECT spa_id, spa_name_de AS name'
	.PHP_EOL.' FROM accounts.startpack'
.PHP_EOL.' WHERE spa_race IN (-1,'.$pgSQL->Quote( $race ).')'
	;
$pgSQL->setQuery( $query );
$start_packs = $pgSQL->loadAssocList();

Page::setXHTML();
Page::addJavaScript( 'prototype' );
Page::addJavaScript( 'newchar_3' );

?>

<h1>Neuen Charakter erstellen</h1>

<h2>Schritt 4</h2>
<p>Hier wählst Du die Startausrüstung und die Anfangsfähigkeiten Deines Charakters. Im Laufe des Spiels wirst Du neue Fähigkeiten lernen und
			neue Ausrüstung bekommen. Die Wahl dieser Startausrüstung schränkt den weiteren Verlauf des Spiels nicht ein.
			Wähle also einfach das Paket, das Dir für den Anfang am meisten zusagt.</p>

	<form action="<?php echo Page::getURL(); ?>/community/account/new/de_newchar.php?charid=<?php echo $charid,($_GET['server'] == '1' ? '&amp;server=1' : ''); ?>" method="post" name="package" id="package">

		<h2>Startausrüstung und Fähigkeiten</h2>

		<select name="startpack" id="startpack" onchange="selectStartpack();return false;">
			<?php foreach($start_packs as $pack): ?>
			<option value="<?php echo $pack['spa_id']; ?>"><?php echo $pack['name']; ?></option>
			<?php endforeach; ?>
		</select>
		<button onclick="selectStartpack();return false;" style="margin-right:20px;">Anzeigen</button>
		<span id="loading" style="display:none;">
			<img src="<?php echo Page::getImageURL(); ?>/ajax-loading-small.gif" style="height:16px;width:16px;margin-right:10px;" alt="Laden..." />
			Wird geladen...
		</span>

		<div id="startpack_area"></div>

		<p style="text-align:center;padding:10px;">
			<input type="hidden" name="sel_pack" id="sel_pack" value="" />
			<input type="hidden" name="action" value="newchar_4" />
			<input type="submit" name="submit_button" id="submit_button" value="Daten speichern" />
		</p>
	</form>