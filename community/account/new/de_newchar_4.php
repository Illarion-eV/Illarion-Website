<?php
include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

IllaUser::requireLogin();

$server = ( isset( $_GET['server'] ) && $_GET['server'] == '1' ? 'testserver' : 'illarionserver');
$charid = ( isset( $_GET['charid'] )  && is_numeric($_GET['charid']) ? (int)$_GET['charid'] : false );

if (!$charid)
{
	exit('Fehler - Charakter ID wurde nicht richtig übergeben.');
}

$pgSQL =& Database::getPostgreSQL( $server );

$query = 'SELECT chr_race, chr_status'
.PHP_EOL.' FROM chars'
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
.PHP_EOL.' FROM player'
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

$query = 'SELECT spl_id, spl_name_de AS name'
	.PHP_EOL.' FROM accounts.startplace'
.( $newbieOnly ? PHP_EOL.' WHERE spl_newbie = 1' : '')
	.PHP_EOL.' ORDER BY spl_id ASC'
	;
$pgSQL->setQuery( $query );
$start_places = $pgSQL->loadAssocList();

$query = 'SELECT spa_id, spa_name_de AS name'
	.PHP_EOL.' FROM accounts.startpack'
.PHP_EOL.' WHERE spa_race IN (-1,'.$pgSQL->Quote( $race ).')'
	;
$pgSQL->setQuery( $query );
$start_packs = $pgSQL->loadAssocList();




Page::Init();

?>

<h1>Neuen Charakter erstellen</h1>

<h2>Schritt 4</h2>
<p>Hier wählst Du die Startausrüstung und die Anfangsfähigkeiten Deines Charakters. Im Laufe des Spiel wirst Du neue Fähigkeiten lernen und
			neue Ausrüstung bekommen. Die Wahl dieser Startausrüstung schränkt den weiteren Verlauf des Spiels nicht ein.
			Wähle also einfach das Paket, dass Dir für den Anfang am meisten zusagt.</p>

