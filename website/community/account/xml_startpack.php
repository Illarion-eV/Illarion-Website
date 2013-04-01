<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';
	
	Page::setXML('application/xml');
	Page::Init();
	
	if (!isset($_GET['startpack']) || !is_numeric($_GET['startpack']))
	{
		exit("<error>No startpack selected</error>");
	}
	
	$packId = (int)$_GET['startpack'];
	
	if (!isset($_GET['server']) || !is_numeric($_GET['server']))
	{
		$server = 0;
	}
	else
	{
		$server = (int)$_GET['server'];
	}
	
	if (!isset($_GET['language']) || $_GET['language'] != 'de')
	{
		$language = 'us';
	}
	else
	{
		$language = 'de';
	}
	
	$server = ($server == 0) ? 'illarionserver' : 'devserver';
	
	$pgSQL = &Database::getPostgreSQL();
	
	$query = 'SELECT COUNT(*)'
    .PHP_EOL.' FROM "'.$server.'"."startpacks"'
    .PHP_EOL.' WHERE "stp_id" = '.$pgSQL->Quote($packId);
    $pgSQL->setQuery($query);
	
	if ($pgSQL->loadResult() == 0)
	{
		exit('<error>no such package: '.$packId.'</error>');
	}
	
	$query = 'SELECT '.($language == 'de' ? '"skl_name_german"' : '"skl_name_english"').' AS "name"'
    .PHP_EOL.' FROM "'.$server.'"."startpack_skills"'
    .PHP_EOL.' INNER JOIN "'.$server.'"."skills" ON "sps_skill_id" = "skl_skill_id"'
    .PHP_EOL.' WHERE "sps_id" = '.$pgSQL->Quote($packId)
	.PHP_EOL.' ORDER BY "name" ASC';
    $pgSQL->setQuery($query);
	$skills = $pgSQL->loadResultArray();
	
	$query = 'SELECT "spi_item_id" AS "itemid", '.($language == 'de' ? '"itn_german"' : '"itn_english"').' AS "name"'
    .PHP_EOL.' FROM "'.$server.'"."startpack_items"'
    .PHP_EOL.' INNER JOIN "'.$server.'"."itemname" ON "spi_item_id" = "itn_itemid"'
    .PHP_EOL.' WHERE "spi_id" = '.$pgSQL->Quote($packId)
    .PHP_EOL.' ORDER BY "spi_linenumber" ASC';
    $pgSQL->setQuery($query);
	$items = $pgSQL->loadAssocList();
?>
<pack id="<?php echo $packId; ?>">
	<skills>
		<?php foreach ($skills as $skillName): ?>
		<skill name="<?php echo $skillName; ?>" />
		<?php endforeach; ?>
	</skills>
	<items>
		<?php foreach ($items as $item): ?>
		<item name="<?php echo $item['name']; ?>" id="<?php echo $item['itemid']; ?>" />
		<?php endforeach; ?>
	</items>
</pack>