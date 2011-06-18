<?php
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php' );
	create_header( 'Illarion - Hintergrund - Client',
	'Rassen Illarions',
	'Hintergrund, Rassen, Geschichte', '', 'menu', '', true );
	include_header();
?>

<?php navBarTop( 'de_lizards.php','de_story.php','de_faeries.php' ); ?>

<h1>Gnome</h1>

<div class="menu">
	<ul class="menu_top">
		<li><a href="<?php echo $url; ?>/illarion/races/de_humans.php">Menschen</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/de_elfes.php">Elfen</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/de_halflings.php">Halblinge</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/de_dwarfs.php">Zwerge</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/de_orcs.php">Orks</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/de_lizards.php">Echsenmenschen</a></li>
		<li class="selected"><a href="<?php echo $url; ?>/illarion/races/de_gnomes.php">Gnome</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/de_faeries.php">Feen</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/de_goblins.php">Goblins</a></li>
		<li class="end" />
	</ul>
</div>

<table class="center"><tr><td><img src="<?php echo $url; ?>/shared/pics/races/gnome_m.png" alt="münnlicher Gnome"/></td><td> </td><td><img src="<?php echo $url; ?>/shared/pics/races/gnome_f.png" alt="weiblicher Gnome"/></td></tr></table>
<?php cap(G); ?>
<p>nome sind entfernte Verwandte der Zwerge, jedoch viel schmaler gebaut, etwas kleiner und meist schwächer als Halblinge.
Sie sind intelligent, agil und sehr gut in der Herstellung von technischen Dingen, eignen sich jedoch wegen ihrer oft sehr
philosophischen Ansichten nicht als Diebe. Ihre Nasen sind allgemein recht groß, und sie haben eine Vorliebe für lange Namen.
Es ist durchaus üblich, daß männliche Gnome drei oder vier Vornamen besitzen.</p>

<p>Der gnomische Kleidungsstil ist meist eher praktisch als dekorativ.Gnome leben gerne unter der Erdoberfläche, in der Tat
sogar in einer Art Mine wie es Zwerge tun, jedoch nicht so groß oder annähernd so tief. Zudem sind die Wände gnomischer Behausungen
oft mit hellem Lehm getüncht.</p>

<p>Gnome lieben seltsame mechanische Konstruktionen. Ihre Höhlen und Minen sind oftmals mit komplizierten Konstruktionen aus
hölzernen Zahnrädern, Rahmen und Seilen ausgestattet, einfach nur um Wasser aus einem Brunnen zu fördern. Gnome sind auch dafür
bekannt, die effektivsten, jedoch am schwersten zu bedienenden und oft sogar recht selbstzerstörerischsten Kriegsmaschinen der
ganzen Welt zu basteln.</p>

<?php cap(G); ?>
<p>nome leben nicht wie Zwerge in den Bergen, und Einige haben sogar eine Vorliebe für magische Dinge. Solche Gnome werden
oft talentierte Illusionisten. Trotz daß normale Magie im allgemeinen aufgrund der damit verbundenen Gefahren sehr ungern
als Unterhaltung gesehen wird, werden gnomische Illusionisten auf jeder größeren Feier mit offenen Armen willkommen geheißen.
In der Tat sind Gnome sogar daß einzige nicht–Menschliche Volk, das durch Albar reisen kann ohne die Auswirkungen von Vorurteilen
oder gar massive Diskriminierung befürchten zu müssen, hauptsächlich deswegen weil Albarische Adelige es nicht mögen, wenn ihre
teuer bezahlten Party–Attraktionen nicht in der Lage sind ihre Aufgaben zu erfüllen.</p>

<p>Gnome beten oft zu Irmorom wie es auch Zwerge tun, jedoch sind sie übicherweise kaum religiös. In der Tat sind Gnome davon
überzeugt daß sich alle Dinge durch Verwendung der eigenen Intelligenz und ohne Zuhilfenahme mythischer Wesenheiten erledigen
lassen, aber es gibt durchaus einige wenige Gnome, die auch Priester der jüngeren Götter wurden. In der Gesellschaft sind männliche
und weibliche Gnome gleichgestellt.</p>

<?php insert_go_to_top_link(); ?>

<?php include_footer(); ?>
