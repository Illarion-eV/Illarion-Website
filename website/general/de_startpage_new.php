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
<p class="hyphenate">chtes Rollenspiel und die Interaktion mit anderen Spielern - das ist das Onlinespiel Illarion. Alle Charaktere um dich herum werden sich wie lebendige, atmende Wesen dieser eigenständigen, geheimnisvollen Welt verhalten. Jeder Charakter hat eine eigene Vergangenheit, Ziele, Stärken und Schwächen. Erlebe als edler Ritter ruhmvolle Abenteuer oder führe ein Leben als fleißiger Handwerker, geschäftiger Händler oder charismatischer Priester der Götter.</p>

<p class="hyphenate">Illarion - Welche Rolle wirst du spielen? <a href="/illarion/us_java_download.php">Lade das Spiel jetzt herunter und beginne dein Abenteuer!</a></p>

<h2>Die Welt Illarion</h2>
<p class="hyphenate">Illarion ist eine reife Fantasy-Welt, in der Orks, Elfen und viele andere Kreaturen anzutreffen sind. Es ist eine offene, lebendige Welt mit greifbarem Hintergrund. Sechzehn Götter werden von den Bewohnern von drei Reichen verehrt. Das edle <a href="/illarion/de_factions.php#1">Cadomyr</a>, das reiche <a href="/illarion/de_factions.php#2">Galmair</a> oder das weise <a href="/illarion/de_factions.php#3">Runewick</a> - welchen Weg wirst du einschlagen?</p>

<h2>Dein Abenteuer</h2>
<p class="hyphenate">Deine Entscheidungen und Taten formen und gestalten die Welt. Sie werden eines Tages die Seiten der Geschichtsbücher Illarions füllen. Werde Eins mit der Welt und lass deinen Charakter werden, was du möchtest.</p>

<h2>Kostenlos und Open Source</h2>
<p class="hyphenate">Illarion ist komplett kostenlos. Das Spiel wird von einem eingetragenen Verein geführt und von hochmotivierten Freiwilligen betrieben. Der Client-, Server- und Spielcode sind Open Source gemäß den Bedingungen der Lizenzen GPLv3 und APGPLv3.</p>

<h2>Keine Grenzen</h2>
<p class="hyphenate">Dein Charakter wird nicht auf eine feste Klasse eingegrenzt wie bei den meisten MMORPGs. Du kannst deinen eigenen Charakter formen und sein Schicksal ist nur von deinen Entscheidungen, Vorstellungen und den Spielregeln begrenzt. Das Spiel hat ein skillbasiertes Levelsystem, welches es dem Spieler erlaubt, seine eigene einzigartige Spielerfahrung zu machen.</p>

<h2>Immersives Spielkonzept</h2>
<p class="hyphenate">Die angewandten Spielmechaniken halten die Balance zwischen Komplexität, Innovation und Motivation der Spieler. Illarion ist ein klassisches Spiel im gemächlichen Tempo mit isometrischen Retrografiken und modernen Technologien zugleich.</p>

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
