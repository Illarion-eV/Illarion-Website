<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - Handbuch - Client",
                  "Bedienung",
                  "Illarion, RPG, online, MPORPG, graphisch, frei, freies, kostenlos, kostenloses, grafisch, Rollenspiel,Handbuch, Anleitung, " );
   include_header();
?>

   <?php navBarTop( "de_hb-32.php", "de_hb-02.php", "de_hb-34.php" ); ?>

   <h2>3.3 Spiel starten / beenden</h2>

   <p>Um das Spiel zu starten, doppelklicke auf die Programmdatei oder die erzeugte Verkn&uuml;pfung
   (manche Systeme sind so konfiguriert, dass ein einzelner Mausklick gen&uuml;gt, um Programme zu
   starten - bitte befrage hierzu Dein Systemhandbuch).<br />
   Nach dem Spielstart wirst Du diesen Login-Dialog sehen:</p>

   <div class="center">
      <img src="log_in_dialog.png" alt="Einlog-Dialog" border="0" width="431" height="166" />
   </div>

   <?php cap(W); ?>

   <p>Wenn Du Illarion zum ersten Mal spielst, musst Du zun&auml;chst einen Charakter erschaffen. Um
   dies zu tun, klicke auf &quot;Create new&quot; - Details &uuml;ber die Charaktererschaffung findest
   Du in der Bedienungsanleitung weiter unten. Wenn Du bereits einen Charakter erschaffen hast, gib
   dessen Namen und das zugeh&ouml;rige Passwort in die Felder &quot;Name&quot; und &quot;Password&quot;
   ein. Klicke anschlie&szlig;end auf &quot;OK&quot;, um direkt ins Spiel zu gelangen. Bitte beachte,
   dass sowohl beim Namen als auch beim Passwort Gro&szlig;- und Kleinschreibung unterschieden werden
   muss. In diesem Startbildschirm kannst Du ebenfalls die Musik- und Soundeffekte f&uuml;r das Spiel
   abschalten. Du musst eine aktive Internetverbindung aufgebaut haben, wenn Du das Spiel
   startest.</p>

   <p>Um das Spiel zu beenden, dr&uuml;cke w&auml;hrend des Spiels einfach die &quot;ESC&quot; Taste. Das
   Spiel wird sofort ohne weitere Abfrage
   beendet.</p>

   <?php navBarBottom( "de_hb-32.php", "de_hb-34.php" ); ?>

<?php include_footer(); ?>