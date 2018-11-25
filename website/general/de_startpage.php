<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( 'Das kostenlose Online-Rollenspiel' );
	Page::setDescription( 'Illarion ist ein kostenloses Online-Rollenspiel in einer mittelalterlichen Fantasy Umgebung mit dem Schwerpunkt auf echtes Rollenspiel.' );
	Page::setKeywords( array( 'Startseite', 'Neuigkeiten' ) );
	Page::addCSS( array( 'lightwindow', 'lightwindow_de', 'onlineplayer' ) );
	Page::addJavaScript( array( 'prototype', 'effects', 'lightwindow' ) );
	Page::setXHTML();
	Page::Init();
	
	$xmlC = new XmlC( 'UTF-8' );
	$xml_file = file_get_contents( Page::getRootPath().'/illarion/screenshots_start.xml' );
	$xmlC->Set_XML_data( $xml_file );
?>

<h1>Illarion - Gestalte ein neues Leben</h1>

<?php Page::cap('E'); ?>
<p class="hyphenate">chtes Rollenspiel und die Interaktion mit anderen Spielern - das ist das Onlinespiel Illarion. Alle Charaktere um dich herum werden sich wie lebendige, atmende Wesen dieser eigenständigen, geheimnisvollen Welt verhalten. Jeder Charakter hat eine eigene Vergangenheit, Ziele, Stärken und Schwächen. Erlebe als edler Ritter ruhmvolle Abenteuer oder führe ein Leben als fleißiger Handwerker, geschäftiger Händler oder charismatischer Priester der Götter. Das edle <a href="/illarion/de_factions.php#1">Cadomyr</a>, das reiche <a href="/illarion/de_factions.php#2">Galmair</a> oder das weise <a href="/illarion/de_factions.php#3">Runewick</a> - welchen Weg wirst du einschlagen?</p>

<p class="hyphenate">Illarion - Welche Rolle wirst du spielen? <a href="/illarion/us_java_download.php">Lade das Spiel jetzt herunter und beginne dein Abenteuer!</a></p>

<?php foreach( $xmlC->obj_data->screenshots[0]->group as $currGroup ): ?>
<div><a id="group<?php echo $currGroup->index; ?>"></a></div>
<h2><?php echo $currGroup->gName; ?></h2>
<?php foreach( $currGroup->screenshot as $index=>$currScreen ): ?>
<div style="margin:3px;float:left;width:206px;height:116px;text-align:center;vertical-align:center;">
	<a style="margin:auto;" href="<?php echo Page::getMediaURL(); ?>/screenshots/<?php echo $currScreen->filename; ?>" title="<?php echo $currScreen->gName; ?>" rel="Illarion Screenshots--<?php echo $currGroup->gName; ?>" class="lightwindow" onclick="return false;">
		<img src="<?php echo Page::getMediaURL(); ?>/screenshots/preview/<?php echo $currScreen->filename; ?>" width="206" height="116" alt="Auf das Bild klicken um es in voller Größe zu sehen" />
	</a>
</div>
<?php endforeach; ?>
<?php endforeach; ?>

<div class="clr"></div>

<h1>Aktuelle News</h1>

<?php
$newsRenderer = new \News\Renderer\HTMLRenderer(IllaUser::auth('news'));
$newsDb = new \News\NewsDatabase();
echo $newsRenderer->renderList($newsDb->getNewsList(1), 'de')
?>
