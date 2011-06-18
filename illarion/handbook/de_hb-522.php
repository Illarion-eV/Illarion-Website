<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - Handbuch - Client",
                  "Benutzung von Sachen",
                  "Illarion, RPG, online, MPORPG, graphisch, frei, freies, kostenlos, kostenloses, grafisch, Rollenspiel,Handbuch, Anleitung, " );
   include_header();
?>

   <?php navBarTop( "de_hb-521.php", "de_hb-02.php", "de_hb-53.php" ); ?>

   <h2>5.2.2 Gegenst&auml;nde benutzen</h2>

   <?php cap(G); ?>

   <p>egenst&auml;nde zu benutzen ist recht einfach. Du musst zwei (oder mehr) Gegenst&auml;nde
   &quot;logisch&quot; miteinander in Verbindung bringen. Um dies zu tun, dr&uuml;cke die SHIFT-Taste,
   klicke auf den ersten Gegenstand, dann auf den zweiten und lasse nun die SHIFT-Taste wieder los.
   Wenn Du eine zugelassene Kombination von Gegenst&auml;nden in der richtigen Reihenfolge angeklickt
   hast, wird Dein Charakter die entsprechende Aktion durchf&uuml;hren. Der Erfolg von Aktion kann dabei
   von den F&auml;higkeiten Deines Charakters abh&auml;ngen, also wundere Dich nicht, wenn Du beim Schmieden
   Kohle und Erz verbrauchst, aber keine Gegenst&auml;nde produzieren kannst - Du musst eben trainieren.
   Wenn man mehrere Gegenst&auml;nde f&uuml;r eine Aktion ben&ouml;tigt - z.B. zum Schmieden ben&ouml;tigt man Kohle,
   Erz und einen Hammer - brauchst Du nur die ersten beiden zu benutzen (hier: benutze den Hammer
   mit dem Erz). Der dritte Gegenstand (hier: Kohle) wird vom Programm automatisch aus Deinem
   Inventar gew&auml;hlt.</p>

   <?php cap(W); ?>

   <p>enn Du die weiteren Gegenst&auml;nde nicht alle besitzt, wirst Du dar&uuml;ber informiert und die
   Aktion nicht durchgef&uuml;hrt. Du musst diese Gegenst&auml;nde also im G&uuml;rtel oder einer Tasche bei Dir
   tragen. Wenn Du ein Ergebnis f&uuml;r Deine Aktion ausw&auml;hlen musst - z.B. das Erzeugnis, dass Du
   schmieden m&ouml;chtest - wird sich ein Auswahlmen&uuml; in Sektion &quot;D&quot; &ouml;ffnen. Klicke dort auf
   die verschiedenen Gegenst&auml;nde um deren Namen anzuzeigen. Um Deine Auswahl zu treffen, klicke
   darauf w&auml;hrend Du die SHIFT-Taste dr&uuml;ckst. Du kannst mit den beiden Pfeilen nach links und
   rechts neben dem Men&uuml; evtl. weitere Gegenst&auml;nde anzeigen. Um die Aktion abzubrechen, bet&auml;tige
   den Pfeil nach oben im
   Auswahlmen&uuml;.</p>

   <?php navBarBottom( "de_hb-521.php", "de_hb-53.php" ); ?>

<?php include_footer(); ?>