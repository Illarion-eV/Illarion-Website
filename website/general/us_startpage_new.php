<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( 'The Free Online Roleplaying Game' );
	Page::setDescription( 'Illarion is a free online roleplaying game within a middle age fantasy setting with focus on real roleplay.' );
	Page::setKeywords( array( 'Startpage', 'News' ) );
	Page::addCSS( array( 'lightwindow', 'lightwindow_us', 'onlineplayer' ) );
	Page::addJavaScript( array( 'prototype', 'effects', 'lightwindow' ) );
	Page::setXHTML();
	Page::Init();
	
	$xmlC = new XmlC( 'UTF-8' );
	$xml_file = file_get_contents( Page::getRootPath().'/illarion/screenshots_start.xml' );
	$xmlC->Set_XML_data( $xml_file );
	
?>

<h1>Illarion - Carve yourself a new life</h1>

<?php Page::cap('I'); ?>
<p class="hyphenate">llarion is an online game where genuine roleplay is enforced. The main design principle is a focus on the interaction with other players. All the player characters you will encounter during your time here are living, breathing inhabitants of the mysterious world of Illarion. Each character has its own past, goals, strengths, flaws and personality. Experience glorious adventures as noble knight or live the life of a hardworking craftsman, acquisitive merchant or charismatic priest of the gods. Noble <a href="/illarion/us_factions.php#1">Cadomyr</a>, wealthy <a href="/illarion/us_factions.php#2">Galmair</a> or wise <a href="/illarion/us_factions.php#3">Runewick</a> - whose side will you join?</p>

<p class="hyphenate">Illarion - What role will you play? <a href="/illarion/us_java_download.php">Download now and start your adventure!</a></p>

<?php foreach( $xmlC->obj_data->screenshots[0]->group as $currGroup ): ?>
<div><a id="group<?php echo $currGroup->index; ?>"></a></div>
<h2><?php echo $currGroup->eName; ?></h2>
<?php foreach( $currGroup->screenshot as $index=>$currScreen ): ?>
<div style="margin:3px;float:left;width:206px;height:116px;text-align:center;vertical-align:center;">
	<a style="margin:auto;" href="<?php echo Page::getMediaURL(); ?>/screenshots/<?php echo $currScreen->filename; ?>" title="<?php echo $currScreen->eName; ?>" rel="Illarion Screenshots--<?php echo $currGroup->eName; ?>" class="lightwindow" onclick="return false;">
		<img src="<?php echo Page::getMediaURL(); ?>/screenshots/preview/<?php echo $currScreen->filename; ?>" width="206" height="116" alt="Click here to view the picture in full size" />
	</a>
</div>
<?php endforeach; ?>
<?php endforeach; ?>

<div class="clr"></div>

<h1>Latest news</h1>

<?php
$newsRenderer = new \News\Renderer\HTMLRenderer(IllaUser::auth('news'));
$newsDb = new \News\NewsDatabase();
echo $newsRenderer->renderList($newsDb->getNewsList(1), 'en')
?>
