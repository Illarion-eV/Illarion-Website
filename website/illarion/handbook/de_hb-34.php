<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - Handbuch - Client",
                  "Problembehandlung",
                  "Illarion, RPG, online, MPORPG, graphisch, frei, freies, kostenlos, kostenloses, grafisch, Rollenspiel,Handbuch, Anleitung, " );
   include_header();
?>

   <?php navBarTop( "de_hb-33.php", "de_hb-02.php", "de_hb-41.php" ); ?>

   <h2>3.4 Problembehandlung</h2>

   <ul>
      <li><a class="hidden" href="#1">Der Bildschirm verbleibt nach dem Spielstart
      schwarz.</a></li>

      <li><a class="hidden" href="#2">&quot;No character with this name has been
      found&quot;.</a></li>

      <li><a class="hidden" href="#3">Fehlermeldung: &quot;Wrong password&quot;.</a></li>

      <li><a class="hidden" href="#4">Fehlermeldung: &quot;Can&#39;t establish connection - Maybe
      the server is not online or you have no internet connection&quot; oder &quot;Connecting to
      Server, Can&#39;t connect!&quot;.</a></li>

      <li><a class="hidden" href="#5">Fehlermeldung: &quot;Invalid client version&quot;.</a></li>
   </ul>

   <p><a name="1"></a></p>

   <h2>Der Bildschirm verbleibt nach dem Spielstart schwarz.</h2>

   <p>Du hast die Programmdatei auf den Desktop gezogen, anstatt eine Verkn&uuml;pfung zu erstellen.
   Bitte ziehe das Programm zur&uuml;ck in seinen Ordner und starte das Spiel erneut. Es wurden nicht
   alle Dateien gefunden. Versuche erneut die Dateien zu entpacken.</p>

   <p><a name="2"></a></p>

   <h2>Fehlermeldung: &quot;No character with this name has been found&quot;.</h2>

   <p>Du hast einen falschen Namen eingegeben. Bitte starte das Spiel erneut und gib den richtigen
   Namen ein. Bitte denke daran, dass sowohl beim Namen als auch beim Passwort auf Gro&szlig;- und
   Kleinschreibung geachtet wird. Du hast keinen Charakter mit diesem Namen erzeugt. Bitte starte
   erneut und w&auml;hle &quot;Create new&quot;.</p>

   <p><a name="3"></a></p>

   <h2>Fehlermeldung &quot;Wrong password&quot;.</h2>

   <p>Du hast entweder einen falschen Charakternamen oder ein falsches Passwort eingegeben. Bitte
   starte erneut und gib die richtigen Daten an. Bitte denke daran, dass sowohl beim Namen als auch
   beim Passwort auf Gro&szlig;- und Kleinschreibung geachtet wird.</p>

   <p><a name="4"></a></p>

   <h2>Fehlermeldung: &quot;Can&#39;t establish connection - Maybe the server is not online or you have no internet connection&quot; oder &quot;Connecting to Server, Can&#39;t connect!&quot;.</h2>

   <p>Du hast keine aktive Internetverbindung. Bitte baue eine Internetverbindung auf und starte
   erneut.<br />
   Du benutzt Windows 95 - der Illarion Client ist unter Windows 95 nicht lauff&auml;hig. Eventuell ist
   auch der Illarion Server zu Wartungszwecken abgeschaltet. Bitte versuche es etwas sp&auml;ter.</p>

   <p><a name="5"></a></p>

   <h2>Fehlermeldung: &quot;Invalid client version&quot;.</h2>

   <p>Du benutzt den falschen Client. Bitte installiere den aktuellen Illarion Client und starte
   erneut.</p>

   <?php navBarBottom( "de_hb-33.php", "de_hb-41.php" ); ?>

<?php include_footer(); ?>