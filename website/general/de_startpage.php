<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( 'Das kostenlose Online-Rollenspiel' );
	Page::setDescription( 'Illarion ist ein kostenloses Online-Rollenspiel in einer mittelalterlichen Fantasy Umgebung mit dem Schwerpunkt auf echtes Rollenspiel.' );
	Page::setKeywords( array( 'Startseite', 'Neuigkeiten' ) );
	Page::addCSS( array( 'lightwindow', 'lightwindow_de' ) );
	Page::addJavaScript( array( 'prototype', 'effects', 'lightwindow' ) );
	Page::setXHTML();
	Page::Init();
?>

<h1>Willkommen in Illarion!</h1>

<?php Page::cap('D'); ?>
<p class="hyphenate">
ie Welt ist in Aufruhr. Die Rückkehr der Alten Götter zerrüttete die Reiche,
Flüchtlinge aller Völker strömen in die Bastionen der Menschheit im Land
Illarion, die verschont geblieben sind von den Entbehrungen der vergangenen
Tage. Sechs Edelsteine der Macht waren den Fürsten dieser Bastionen zur
Verwahrung gegeben; doch Missgunst, Verrat und Neid sind die alltäglichen
Geißeln der Macht. Das edle <a href="/illarion/de_factions.php#1">Cadomyr</a>, 
das reiche <a href="/illarion/de_factions.php#2">Galmair</a> oder das weise 
<a href="/illarion/de_factions.php#3">Runewick</a> - welchen Weg wirst du einschlagen?</p>

<div style="width:auto;margin:0 auto;text-align:center;float:right;padding:9px 0px 0px 12px">
	<a style="margin:auto;" href="<?php echo Page::getURL(); ?>/general/de_map_of_illarion.jpg" title="Karte von Illarion" rel="Karte von Illarion" class="lightwindow" onclick="return false;">
		<img src="<?php echo Page::getURL(); ?>/general/de_thumb_map_of_illarion.jpg" width="121" height="100" alt="Karte von Illarion. Hier klicken um das Bild in der vollen Größe zu sehen." />
	</a>
</div>

<p class="hyphenate">
Illarion ist ein kostenloses Open Source-MMORPG, welches seinen Schwerpunkt
auf echtes Rollenspiel legt. Alle Charaktere um dich herum werden sich wie
lebendige, atmende Wesen dieser eigenständigen, geheimnisvollen Welt
verhalten. Jeder Charakter hat eine eigene Vergangenheit, Ziele, Stärken und
Schwächen. Erlebe als edler Ritter ruhmvolle Abenteuer oder führe ein Leben
als fleißiger Handwerker, geschäftiger Händler oder charismatischer Priester
der <a href="/illarion/goetter/de_bck_10.php">Götter</a>.</p>

<p class="hyphenate">
Illarion vereint ein klassisches Fantasy-Setting mit den Vorzügen einer
offenen, persistenten Spielwelt. Deine Entscheidungen und Taten formen und
gestalten diese Welt und werden eines Tages die Seiten der Geschichtsbücher
füllen. Du wirst dich dem Zauber dieser Welt nicht entziehen können!</p>

<p>Illarion - Welche Rolle wirst du spielen?</p>

<?php Page::insert_go_to_top_link(); ?>

<h1>Aktuelle News</h1>

<?php
    $newsRenderer = new \News\Renderer\HTMLRenderer(IllaUser::auth('news'));
    $newsDb = new \News\NewsDatabase(IllaUser::auth('news'));
    echo $newsRenderer->renderList($newsDb->getNewsList(3), 'de')
?>
