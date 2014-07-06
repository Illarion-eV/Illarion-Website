<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( 'Das kostenlose Online-Rollenspiel' );
	Page::setDescription( 'Illarion ist ein kostenloses Online-Rollenspiel in einer mittelalterlichen Fantasy Umgebung mit dem Schwerpunkt auf echtes Rollenspiel.' );
	Page::setKeywords( array( 'Startseite', 'Neuigkeiten' ) );
	Page::setXHTML();
	Page::Init();
?>

<h1>Willkommen in Illarion!</h1>

<img align="right" vspace="10" hspace="20" src="<?php echo $url; ?>/shared/pics/illarion_icon.png" alt="Illarion"/>
<?php Page::cap('D'); ?>
<p class="hyphenate">
ie Welt ist in Aufruhr. Die Rückkehr der Alten Götter zerrüttete die Reiche,
Flüchtlinge aller Völker strömen in die Bastionen der Menschheit im Land
Illarion, die verschont geblieben sind von den Entbehrungen der vergangenen
Tage. Sechs Edelsteine der Macht waren den Fürsten dieser Bastionen zur
Verwahrung gegeben; doch Missgunst, Verrat und Neid sind die alltäglichen
Geißeln der Macht.</p>

<p class="hyphenate">
Illarion ist ein kostenloses Open Source-MMORPG, welches seinen Schwerpunkt
auf echtes Rollenspiel legt. Alle Charaktere um dich herum werden sich wie
lebendige, atmende Wesen dieser eigenständigen, geheimnisvollen Welt
verhalten. Jeder Charakter hat eine eigene Vergangenheit, Ziele, Stärken und
Schwächen. Erlebe als edler Ritter ruhmvolle Abenteuer oder führe ein Leben
als fleißiger Handwerker, geschäftiger Händler oder charismatischer Priester
der Götter.</p>

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
