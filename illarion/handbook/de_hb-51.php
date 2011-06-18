<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - Handbuch - Client",
                  "Erste Schritte",
                  "Illarion, RPG, online, MPORPG, graphisch, frei, freies, kostenlos, kostenloses, grafisch, Rollenspiel,Handbuch, Anleitung, " );
   include_header();
?>

   <?php navBarTop( "de_hb-43.php", "de_hb-02.php", "de_hb-52.php" ); ?>

   <h1>5. Erste Schritte</h1>

   <h2>5.1 Der Bildschirm </h2>

   <p>Der Bildschirm ist nach dem Start von Illarion in verschiedene Sektionen unterteilt:</p>

   <p><img src="layout_client_interface.png" alt="" border="0" width="394" height="252" /></p>

   <p>Diese Sektionen lassen sich wie folgt beschreiben:<br />
   <br />
   A) Inventar / F&auml;higkeiten<br />
   B) Automatische Karte<br />
   C) Detailkarte<br />
   D) Inhalt von Containern / Taschen / Runen / Kr&auml;uter / Waren / Erzeugnisse<br />
   E) Inhalt des G&uuml;rtels<br />
   F) Mana<br />
   G) Lebensenergie<br />
   H) Navigationsleisten f&uuml;r die Sektionen &quot;D&quot;<br />
   I) Z&auml;hler f&uuml;r Gegenst&auml;nde<br />
   <br />
   <br />
   Das Inventar besteht aus folgenden Feldern:<br />
   <br />
   a) Hals (z.B. f&uuml;r Amulette)<br />
   b) Umhang<br />
   c) Rechte Hand (z.B. um Waffen zu f&uuml;hren)<br />
   d) Rechter Finger (z.B. f&uuml;r Ringe)<br />
   e) Beide H&auml;nde (z.B. f&uuml;r Handschuhe)<br />
   f) Beine<br />
   g) Kopf<br />
   h) Rucksack (z.B. f&uuml;r Container wie Taschen)<br />
   i) Torso<br />
   k) Linke Hand (z.B. f&uuml;r Schilde)<br />
   m) Linker Finger (z.B. f&uuml;r Ringe)<br />
   n) F&uuml;&szlig;e</p>

   <?php cap(A); ?>

   <p>m unteren Ende ist ein Button mit der Aufschrift &quot;Show skills&quot;. Wenn Du darauf
   klickst, werden statt des Inventars die F&auml;higkeiten des Charakters angezeigt. Mit den Pfeilen
   unterhalb der F&auml;higkeiten kannst Du durch die verschiedenen Kategorien navigieren. Um wieder das
   Inventar anzuzeigen, klickst Du auf &quot;Show inventory&quot;. Die F&auml;higkeiten werden als rote
   Linie unter deren Namen dargestellt. Je l&auml;nger diese Linie ist, desto besser ist die F&auml;higkeit
   ausgebildet.</p>

   <?php navBarBottom( "de_hb-43.php", "de_hb-52.php" ); ?>

<?php include_footer(); ?>