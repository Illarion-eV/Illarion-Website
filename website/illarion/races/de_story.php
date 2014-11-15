<?php
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php' );
	create_header( 'Illarion - Völker',
	'Diese Seite enthält einige Worte zu den Völkern Illarions.',
	'Völker, Rassen, Land', '', 'menu', '', true );
	include_header();
?>

<?php navBarTop( 'de_lizards.php','de_story.php','de_humans.php' ); ?>

<h1>Die Völker der Welt</h1>

<div class="menu">
	<ul class="menu_top">
		<li class="selected"><a href="<?php echo $url; ?>/illarion/races/de_humans.php">Menschen</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/de_elfes.php">Elfen</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/de_halflings.php">Halblinge</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/de_dwarfs.php">Zwerge</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/de_orcs.php">Orks</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/de_lizards.php">Echsenmenschen</a></li>
		<li class="end" />
	</ul>
</div>

<?php cap(E); ?>

<p>in Adler schraubt sich immer höher in den Himmel über Illarion. Auf der Suche nach Beute
streifen seine Blicke über die weiten Lande. Er sieht die hohen Berge, die mit ihren schroffen
Spitzen und schneebedeckten Gipfel das Firmament zu berühren scheinen. Mit seinen scharfen Augen
erkennt er die versteckten Eingänge zu den großen Minen der <a href="de_dwarfs.php" class="eyecatcher">Zwerge</a>, die sich tief in das Herz
der Gebirgszüge gegraben haben, um dem Stein seine wertvollsten Schätze zu rauben.</p>

<p>Das Heulen der Wolfsrudel begleitet den Adler, der an den Flanken der Berge in die tiefen
waldbedeckten Täler hinabgleitet. Hier und dort erhebt sich eine Ansammlung von großen
Bradamenbäumen aus der sonst geschlossenen Decke der Baumwipfel und in dem dichten Geflecht der
Äste sind die Wohnstätten der <a href="de_elfes.php" class="eyecatcher">Elfen</a> nur schwer zu erkennen, wie auch ihre Existenz nur selten
Spuren in der unberührten Natur hinterlässt.</p>

<p>Weiter, immer weiter fliegt der Adler und auf seinem Weg werden die Berge abgelöst von einer sanft geschwungenen Hügellandschaft, nur
unterbrochen von den großen Flüssen, die träge dem Meer entgegenströmen. In dieser fruchtbaren Gegend findet man die Dörfer der friedfertigen <a href="de_halflings.php" class="eyecatcher">Halblinge</a>, deren Behausungen von den
wohlgepflegten Gärten und Feldern umgeben sind.</p>

<?php cap(D); ?>

<p>och schon bald erreicht der Adler auf seinem Flug die endlosen Steppen und unwirtlichen
Wüsten. Vereinzelt steigt Rauch in den Himmel empor und zeugt von den Behausungen und
Lagerplätzen der kriegerischen <a href="de_orcs.php" class="eyecatcher">Orks</a>. Ihre Schlachtrufe hallen weit über die Ebene und jedem, der
diese Rufe vernimmt, ist wohlgeraten, ihr Gebiet mit Vorsicht zu betreten.</p>

<p>Endlich erreicht der Adler die sturmgepeitschte Küste und sieht die großen Städte der stolzen
<a href="de_humans.php" class="eyecatcher">Menschen</a>, auf deren Mauern und Zinnen die Fahnen im Winde flattern. Zwischen den Türmen und
Dächern erkennt er das Treiben auf den überfüllten Marktplätzen und die Sonnenstrahlen werden
von den Rüstungen der Ritter reflektiert, die sich hoch zu Ross einen Weg durch die Menge
bahnen.</p>

<p>Vom Hafen aus folgt der Adler den großen Handelsschiffen, die ihre gefährliche Reise über das
Meer antreten. Über den sich hebenden und senkenden Wogen erkennt er tief unter der
Wasseroberfläche die schemenhaften Umrisse der großen Gebetshallen, die dort von den
<a href="de_lizards.php" class="eyecatcher">Echsenmenschen</a> errichtet wurden. Sie leben in einem Element, welches dem Adler fremd ist und
während er seine Kreise hoch in der Luft zieht, gleiten die Echsenmenschen elegant durch die
Fluten und nur ihr schimmerndes Schuppenkleid ist manchmal im Wasser zu
erkennen.</p>

<?php cap(D); ?>

<p>ie Welt von Illarion ist angefüllt mit unerklärlichen Wundern und geheimnisvollen Plätzen,
unsagbaren Schrecken und gefährlichen Orten. Aus dunkler Vergangenheit steigen Dämonen und
Monster empor, die nach dem Leben der Sterblichen trachten. So ist es nicht verwunderlich, dass
in dieser magischen Welt, in der das Schicksal eines jeden vergänglich ist, die Völker Zuflucht
und Trost bei den Göttern suchen. 16 Gottheiten bestimmen das Leben auf Illarion und nehmen
Einfluss, wo immer es ihren Interessen zugute kommt. Kriege sind durch sie entstanden und wurden
geschlichtet. Ganze Geschlechter kamen durch sie an die Macht und wurden gestürzt. Mag es auch
hier und dort Verrückte geben, die ihre Existenz verleugnen, die sich ihrem Willen
wiedersetzten, so gibt es doch keinen Gott, dem die Existenz eines jeden einzelnen Lebewesens
nicht bewusst ist und mag es auch noch so unscheinbar sein. Es wäre unklug, dies zu
ignorieren.</p>

<p>Gänzlich fremd ist diese Welt dem Adler, der unberührt vom Treiben der Sterblichen weiter
seine Kreise über Illarion zieht. Doch weit oben aus der Luft genießt er den Überblick über alle
Orte und mit seinen scharfen Augen sieht er alles, was sich auf dieser Welt zuträgt.</p>

<?php insert_go_to_top_link(); ?>

<?php include_footer(); ?>
