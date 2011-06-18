<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( 'Links' );
	Page::setDescription( 'Diese Seite enthält Links zu den Gilden, Fan-Seiten etc. Illarions.' );
	Page::setKeywords( array( 'Links', 'Gilden', 'Fan', 'Fans', 'Banner' ) );
	Page::setXHTML();
	Page::Init();
?>

<h1>Links zu anderen Webseiten rund um Illarion</h1>

<h2>Inhalt</h2>

<ul>
	<li><a class="hidden" href="#1">Gilden / Sippen / Klans</a></li>
	<li><a class="hidden" href="#2">Fanseiten</a></li>
	<li><a class="hidden" href="#3">Sonstige</a></li>
</ul>
<?php Page::insert_go_to_top_link(); ?>

<div><a id="1"></a></div>

<h2>Gilden / Sippen / Klans</h2>

<h4>Der Orden der Grauen Rose</h4>

<img class="float_left" src="<?php echo Page::getURL(); ?>/community/pic_greyrose.de.jpg" alt="Graue Rose" />
<p>
	<a rel="external" href="http://home.pages.at/liza/GR/index.htm">Link zur Homepage des Ordens der Grauen Rose</a>
	<br /><br />
	Die Graue Rose ist ein Ritterzirkel, der mit dem Orden des Grauen Lichts verbündet
	ist. Unsere Geschichte in Illarion reicht weit zurück. Wir Ritter halten viel von
	Ehre und Loyalität und leben nach einem strengen Kodex, der die Grundlage unseres
	Zirkels und Verhaltens ist. Unsere Knappen wählen wir sorgfältig aus. In unserer Burg
	(HP) findet ihr mehr über uns und unsere Ziele.
</p>

<h4>Der Orden des Grauen Lichts</h4>

<img class="float_left" src="<?php echo Page::getURL(); ?>/community/pic_greylight-order.de.vu.jpg" alt="Graues Licht" />
<p>
	<a rel="external" href="http://www.greylight.de">Link zur Homepage des Ordens des Grauen Lichts</a>
	<br /><br />
	Die älteste Organisation Illarions ist der Orden des Grauen Lichtes. Ziele des Ordens
	sind: Aufrechterhaltung und Durchsetzung einer Ordnung; die Wahrung des
	Gleichgewichtes in allen Dingen, der Neutralität und der Harmonie; die Mehrung und
	das Bewahren von Wissen, Geschichtsschreibung, sowie die Wissenschaft. Während die
	Schriftgelehrten, die "Scribes" des Ordens eher als Forscher, Philosophen, Taktiker,
	Barden oder Rechtsprecher agieren, sind die "Templer" des Ordens eher Kämpfer oder
	Kampfmagier, Soldaten, Gesetzeshüter, Richter oder Paladine. Templer und Scribes des
	Ordens folgen dem Grauen Kodex. Als Mitglieder werden nur solche akzeptiert, welche
	sich als ehrenhaft und würdig erwiesen haben.
</p>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="2"></a></div>

<h2>Fanseiten</h2>

<h4>Moonsilver</h4>

<img class="float_left" src="<?php echo Page::getURL(); ?>/community/pic_moonsilver.jpg" alt="Moonsilver" />
<p>
	<a rel="external" href="http://www.moonsilver.de">Link zur Homepage von Moonsilver</a>
	<br /><br />
	Dies ist eine Seite mit der Hintergrundgeschichte zu Illarion. Hier findet Ihr die
	Beschreibung zu den Göttern und den Völkern, die Göttergeschichte, Informationen zum
	Kalender, Berufsbeschreibungen und vieles mehr. Nehmt Euch Zeit, die Inhalte
	anzuschauen, denn sie sind für das Spiel hilfreich.
</p>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="3"></a></div>

<h2>Sonstige</h2>

<h4>Computerbild.de</h4>

<img class="float_left" src="<?php echo Page::getURL(); ?>/community/pic_computerbild.de.jpg" alt="Computerbild.de" />
<p>
	<a rel="external" href="http://www.computerbild.de/download/Illarion-2095288.html">Link zur Illarion-Beschreibung</a>
	<br /><br />
	Täglich besuchen über 80.000 Nutzer den Downloadbereich von COMPUTERBILD.DE, um sich die neuesten Programme und Updates runterzuladen. Mit über 7.500 Programmen hat es COMPUTERBILD.DE innerhalb eines Jahres geschafft, eine der umfangreichsten Software-Datenbanken aufzubauen. Illarion hat dort bereits über 11000 Downloads erreicht und wir freuen uns über Eure Bewertungen/Kommentare dort, um andere Nutzer auf unser Spiel neugierig zu machen.
</p>

<?php Page::insert_go_to_top_link(); ?>
