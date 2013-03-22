<?php
include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

Page::setTitle( 'Grafiken erstellen' );
Page::setDescription( 'Diese Seite enthält Informationen wie man Grafiken für Illarion erstellt.' );
Page::setKeywords( array( 'Entwicklung', 'Grafiken' ) );
Page::setXHTML();
Page::Init();
?>

<h1>Grafiken für Illarion erstellen</h1>

<h2>Einleitung</h2>

<p>Der Zweck dieser Seite ist es, einige grundlegende Anweisungen zu geben, 
wie man Grafiken für Illarion erstellen kann, wenn man daran interessiert ist. 
Vergiss nicht, dass Illarion ein kostenloses Spiel ist, das von Grund auf von 
Freiwilligen aufgebaut wurde, die dafür niemals bezahlt wurden. Außer mit 
Dankbarkeit kann deine Arbeit für Illarion nicht vergolten werden (abgesehen 
davon macht sich solche Arbeit gut im Portfolio!).</p>

<p>Grafiken sind in Illarion normalerweise mit einer 3D-Modellierungssoftware 
wie Maya oder Blender erstellt. Mit speziellen Einstellungen wie Kamerawinkel 
und Lichtpositionen werden die 3D-Modelle auf PNG-Bilder gerendert, 
ausgeschnitten und dann im Spiel eingebaut. Alle dazu nötigen Schritte werden 
auf dieser Seite erläutert.</p>

<h2>Inhalt</h2>

<ul>
	<li><a href="#size">Bildgrößen und Ausrichtung</a></li>
	<li><a href="#result">Spezifikationen für das erstellte Bild</a></li>
	<li>Anweisungen für die Einstellung der 3D-Modellierungssoftware
	<ul>
		<li><a href="#setup_maya">Autodesk Maya 2009</a></li>
	</ul>
	</li>
</ul>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="size"></a></div>
<h2>Bildgrößen und Ausrichtung</h2>

<p>Allgemein ist die Größe des Bildes in Byte unwichtig. Wichtig ist
nur, dass die Größe eines Illarion-Bodenfeldes (Tile) in dem 
gerenderten Bild exakt stimmt. (Siehe nachfolgendes Bild)</p>

<p style="text-align: center;"><img
	src="<?php echo Page::getURL(); ?>/general/karo.gif" alt="tile"
	height="37" width="76" /></p>

<p>Wenn du ein solches Tile mit deiner 3D-Modellierungssoftware ohne
Kantenglättung renderst, muss jedes Pixel der Kontur mit dem Beispiel
übereinstimmen. Wenn das der Fall ist, sind die Einstellungen für die
Kamera richtig. Diese Einstellungen werden weiter unten für die
bekannten 3D-Anwendungen erklärt. Der Abstand zwischen zwei Ebenen in
Illarion beträgt genau 111 Pixel, also die dreifache Höhe eines Tiles.</p>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="result"></a></div>
<h2>Spezifikationen für das erstellte Bild</h2>

<p>Das erstellte Bild, das in den Client eingebunden werden soll, muss
einige Eigenschaften aufweisen. Das Wichtigste ist, dass das Bild auf die
kleinstmögliche Größe zugeschnitten ist. Alle Zeilen und Spalten
um das Bild herum, die nur aus transparenten Pixeln bestehen, müssen
abgeschnitten werden. Die einzige Ausnahme sind Animationen und
Variationen.</p>

<p>Eine Grafik kann entweder eine Animation oder eine Variation beinhalten. 
In beiden Fällen gibt es mehrere Bilder, die die gleiche Grafik darstellen. 
Diese Bilder müssen alle die selben Abmessungen haben, auch wenn das bedeutet, 
dass einige Bilder nicht perfekt zugeschnitten sind.</p>

<p>Das gerenderte Bild selbst muss ein PNG-Bild sein, das einen der
folgenden Farbräume benutzt:</p>

<ul>
	<li>24bit Farbe und 8bit Alpha-Kanal</li>
	<li>24bit Farbe</li>
	<li>8bit Graustufen und 8bit Alpha-Kanal</li>
	<li>8bit Graustufen</li>
</ul>

<?php Page::insert_go_to_top_link(); ?>

<h2>Anweisungen für die Einstellung der 3D-Modellierungssoftware</h2>

<div><a id="setup_maya"></a></div>
<h3>Autodesk Maya 2009</h3>

<p>Befolge diese Anweisungen in der gegebenen Reihenfolge um eine
passende Szene in Autodesk Maya 2009 aufzubauen:</p>

<ol>
	<li>Klick in der Hauptmenuleiste auf "Erstellen" ("Create"), dann wähle
	"Kameras" ("Cameras") aus und anschlie&szlig;end "Kamera" ("Camera").</li>
	<li>Es wird eine Kamera im Ursprung der Szene erzeugt. Selektiere
	sie. (Sie sollte schon selektiert sein).</li>
	<li>In dem kleinen Menü rechts über der Szene kannst du "Paneele" 
	("Panels") auswählen und dann "Blicke durch Ausgewählte" ("Look though 
	selected") anklicken. Jetzt solltest du durch die Linse der gerade erstellten 
	Kamera blicken. (Du kannst die Kamera im Attribut-Editor (attributes selector) 
	auf der rechten Seite umbenennen (STRG-A).</li>
	<li>In dem kleinen Menü rechts über der Szene kannst du die "Ansicht" 
	("View") auswählen, dann "Vordefinierte Lesezeichen" ("Predefined Booksmarks") 
	und am Ende auf "Perspektive" ("Perspective") um die Kamera auf die 
	Standardposition zu setzen. Jetzt darfst du die Kamera nicht mehr bewegen. 
	Sollte dir das doch passieren musst du diesen Schritt wiederholen.</li>
	<li>Auf der rechten Seite, im Attributseditor ("attributes selector") 
	gibt es einen Tab mit dem Namen "cameraShape1" (oder dem Namen deiner Kamera 
	gefolgt von "Shape"). Solltest du diese Tabs nicht sehen, drücke STRG-A um den 
	Attributseditor zu öffnen.</li>
	<li>Scrolle in dem Tab cameraShape solange nach unten bis du den
	Eintrag "Orthografische Ansicht" ("Orthographic views") findest und
	öffne diesen.</li>
	<li>Setze nun den Haken bei "orthografisch" ("orthographic") wenn
	dieser noch nicht gesetzt ist. Dann wird das Eingabefeld
	"orthografische Breite" ("othographic width") aktiv und du musst dort
	den Wert 5.7 eingeben. Anschlie&szlig;end kannst du den Wert durch einen
	Rechtsklick auf das Eingabefeld sperren indem du in dem Kontext Menu
	"Sperre Attribut" ("Lock attribute") auswählst. Das bewirkt, dass du die
	Kamera nicht mehr verändern kannst.</li>

</ol>

<p>Wenn du die Kamera wieder bewegen musst, solltest du nicht den Wert 
entsperren weil du dann wieder alles neu einstellen musst. Klicke einfach 
auf das kleine Kamerabild unter dem "Ansicht" ("View") Menü und wähle 
"Perspektive" ("perspective") oder eine andere Kamera deiner Wahl, 
abgesehen von der eben eingestellten, aus.</p>

<p>Bevor du das Bild renderst, oder um eine Voransicht zu erhalten wie 
das Bild durch die "Illarion Kamera" aussieht, wähle einfach über das 
Kameramenü die eben eingestellte Kamera wieder aus. Bevor das Bild 
gerendert wird, muss die Kamera auf jeden Fall ausgewählt sein, da nur 
die Ausgewählte gerendert wird.</p>

<p>Es ist wichtig, dass die Szene auf eine Fläche von 320x240 Pixel
gerendert wird, denn bei dieser Auflösung stimmt ein Standard-Quadrat im
Maya Raster mit einem Tile in Illarion überein.</p>

<p>Die Erfahrung hat gezeigt, dass die besten Ergebnisse erzeugt werden,
wenn als Renderer der "Maya Software" Renderer benutzt wird und als
Qualitätseinstellung "Produktion" ("production") gewählt wird. Abhängig von 
der gerenderten Szene verbessert der Standard-"Box Filter" von Maya die
Qualität der Kanten und Ecken.</p>

<p>Diese Anleitung wurde aus dem Englischen übersetzt und es ist
möglich, dass die Menüeinträge nicht mit den Bezeichnungen in der
deutschen Version von Maya übereinstimmen. Sollte es Fehler geben, wäre
es gut, wenn du diese im Mantis Bugtracker vermerkst.</p>

<p style="text-align: right;">Der Dank für diese Anleitung gilt Karl
Salameh.</p>

<?php Page::insert_go_to_top_link(); ?>
