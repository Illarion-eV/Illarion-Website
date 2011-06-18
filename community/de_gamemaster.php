<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - Gamemaster",
                  "Diese Seite enth&auml;lt eine Auflistung der Gamemaster in Illarion.",
                  "Gamemaster, Spielleiter, Kontakt" );
   include_header();
?>

   <h1>Gamemaster</h1>

   <h2>Inhalt</h2>

   <ul>
      <li><a class="hidden" href="#1">Allgemeines</a></li>

      <li><a class="hidden" href="#2">Spieler mit Gamemaster-Status</a></li>
   </ul>

   <?php insert_go_to_top_link(); ?>

   <p><a name="1"></a></p>

   <h2>Allgemeines</h2>

   <?php cap(E); ?>

   <p>inige Spieler haben den Status eines Gamemasters f&uuml;r einen speziellen Charakter. Diese sind
   daf&uuml;r zust&auml;ndig f&uuml;r Ordnung zu sorgen und k&ouml;nnen selbst Strafen zur Durchsetzung dieser Regeln
   verh&auml;ngen, bzw. diese durch den Administrator ausf&uuml;hren lassen. Das Bel&uuml;gen/T&auml;uschen eines
   Gamemasters in Bezug auf Regelverst&ouml;&szlig;e und Programmfehler ist verboten. Ist ein Gamemaster
   offensichtlich gerade mit Arbeit besch&auml;ftigt oder in ein wichtiges, spielrelevantes Gespr&auml;ch
   vertieft, soll er nur in dringenden F&auml;llen gest&ouml;rt werden. Die Namen weiterer Charaktere eines
   Gamemasters d&uuml;rfen nicht gegen seinen Willen weitergegeben
   werden.</p>

   <?php insert_go_to_top_link(); ?>

   <p><a name="2"></a></p>

   <h2>Spieler mit Gamemaster-Status</h2>

   <ul>
      <li>Robert Matthes alias Latharan Caine / Damien (<a href=
      "mailto:latharan@illarion.org">latharan@illarion.org</a>)</li>

      <li>Arien Edhel (<a href=
      "mailto:arien@illarion.org">arien@illarion.org</a>)</li>

      <li>Rinya (<a href=
      "mailto:rinya@illarion.org">rinya@illarion.org</a>)</li>
	  
	  <li>Papoitsi (<a href=
      "mailto:papoitsi@illarion.org">papoitsi@illarion.org</a>)</li>
	  
	  <li>Loralyn (<a href=
      "mailto:Irania_51374@hotmail.com">Irania_51374@hotmail.com</a>)</li>
   </ul>

   <?php insert_go_to_top_link(); ?>

<?php include_footer(); ?>