<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	if (!isset( $_GET['file'] ) || !is_numeric( $_GET['file'] ))
	{
		exit();
	}
	else
	{
		$_GET['file'] = (int)$_GET['file'];
	}

	 $pgSQL =& Database::getPostgreSQL();

    $query = 'SELECT spa_name_file'
    .PHP_EOL.' FROM accounts.startpack'
    .PHP_EOL.' WHERE spa_id = '.$pgSQL->Quote($_GET['file']);
    $pgSQL->setQuery($query);
    $filename = Page::getRootPath().'/community/account/startpacks/'.$pgSQL->loadResult();


	$last_mod = array();
	$last_mod[] = filemtime( $_SERVER['SCRIPT_FILENAME'] );
	if (!is_file($filename))
	{
		exit('not found: '.$filename);
	}
	$last_mod[] = filemtime( $filename );

	rsort( $last_mod );
	$last_mod = $last_mod[0];
	$if_last_mod = isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) ? strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) : 0;
	if ( $if_last_mod >= $last_mod )
	{
		header('HTTP/1.0 304 Not Modified');
		exit;
	}

	Page::setXML();
	Page::Init();

	$document = new DOMDocument( '1.0', 'UTF-8' );
	$document->load( $filename, LIBXML_COMPACT );
	$document->documentElement->setAttribute( 'id', $_GET['file'] );

	$skill_tags = $document->getElementsByTagName( 'skill' );

	foreach ($skill_tags as $node)
	{
		$node->setAttribute( 'name_de', getTranslatedSkillName( $node->getAttribute( 'name' ) ) );
	}

	$item_tags = $document->getElementsByTagName( 'item' );

	$items = array();
	foreach ($item_tags as $node)
	{
		$items[] = $node->getAttribute( 'id' );
	}

	$query = 'SELECT itn_itemid, itn_german, itn_english'
	.PHP_EOL.' FROM illarionserver.itemname'
	.PHP_EOL.' WHERE itn_itemid IN ('.implode(',',$items).');'
	;
	$pgSQL->setQuery( $query );
	$itemNames = $pgSQL->loadAssocList( 'itn_itemid' );

	foreach ($item_tags as $node)
	{
		$node->setAttribute( 'name_de', $itemNames[$node->getAttribute( 'id' )]['itn_german'] );
		$node->setAttribute( 'name_us', $itemNames[$node->getAttribute( 'id' )]['itn_english'] );
	}

	echo $document->saveXML( $document->documentElement );

	function getTranslatedSkillName( $name )
	{
		switch($name)
		{
			case 'puncture weapons': return 'Stichwaffen'; break;
			case 'distance weapons': return 'Fernwaffen'; break;
			case 'dodge': return 'Ausweichen'; break;
			case 'tactics': return 'Taktik'; break;
			case 'parry': return 'Parrieren'; break;
			case 'tailoring': return 'Schneidern'; break;
			case 'baking': return 'Backen und Kochen'; break;
			case 'smithing': return 'Schmieden'; break;
			case 'mining': return 'Bergbau'; break;
			case 'wrestling': return 'Waffenloser Kampf'; break;
			case 'concussion weapons': return 'Schlagwaffen'; break;
			case 'slashing weapons': return 'Hiebwaffen'; break;
			case 'gemcutting': return 'Edelstein schleifen'; break;
			case 'library research': return 'Reschersche'; break;
			case 'magic resistance': return 'Magieresistenz'; break;
			case 'fishing': return 'Angeln'; break;
			case 'carpentry': return 'Schreinern'; break;
			case 'lute': return 'Laute'; break;
			case 'lumberjacking': return 'Holz fällen'; break;
			case 'horn': return 'Horn'; break;
			case 'harp': return 'Harfe'; break;
			case 'peasantry': return 'Anpflanzen'; break;
			case 'herb lore': return 'Kräuter suchen'; break;
			case 'alchemy': return 'Alchemie'; break;
			case 'flute': return 'Flöte'; break;
		}
		return $name;
	}
?>
