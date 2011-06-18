<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - Handbuch - Client",
                  "Regeln",
                  "Illarion, RPG, online, MPORPG, graphisch, frei, freies, kostenlos, kostenloses, grafisch, Rollenspiel,Handbuch, Anleitung, " );
   include_header();
?>

   <?php navBarTop( "de_hb-13.php", "de_hb-02.php", "de_hb-21.php" ); ?>

   <h2>1.4 Die Sieben Goldenen Regeln</h2>

   <p>Leider kommt es immer wieder vor, dass Spieler (Menschen, nicht Charaktere) versuchen, das
   Spiel massiv zu st&ouml;ren. Die Nichtbeachtung der nachfolgenden Regeln kann zur Folge haben, dass
   Dein Charakter, sogar ohne Vorwarnung, gel&ouml;scht wird. In gravierenden F&auml;llen wird auch der
   gesamte Account gesperrt, das hei&szlig;t, Du selbst, sowie alle &uuml;ber Deinen Anschluss angemeldeten
   Spieler werden gesperrt.<br />
   Weitere Regeln findest Du unter <a href=
   "<?php echo "$url/illarion/rules/" ?>"><?php echo "$url/illarion/rules/" ?></a>.</p>

   <ul>
      <li>T&ouml;te keine Charakter von Mitspielern, wenn es daf&uuml;r keinen Rollenspiel-Grund gibt, den
      die Mitspieler auch kennen. [PLAYERKILLING, PK]</li>

      <li>T&ouml;te einen Charakter nicht mehrmals kurz hintereinander.</li>

      <li>T&ouml;te einen Charakter nicht, solange er am Kreuz steht.</li>

      <li>Schreibe keine sinnlosen Zeichenfolgen. [SPAMMING]</li>

      <li>St&ouml;re nicht das Rollenspiel Anderer durch &uuml;berfl&uuml;ssige Reden out of character. Wenn
      schon, dann fl&uuml;stere Deine Reden out of character und setze sie in Doppelklammern #w: ((ich
      bin neu, wie funktioniert das ?))</li>

      <li>Benutze keine Char-Namen, die nicht zum Ambiente von Illarion passen. Illarion spielt in
      einem mittelalterlichen Fantasy-Reich. Benutze keine Namen, die nur Bezeichnungen sind, wie
      z.B. &quot;der R&auml;cher&quot;. F&uuml;r solche Bezeichnungen gibt es das Zusatzfeld
      &quot;title&quot;.</li>

      <li>Illarion befindet sich als privates Programm in einer st&auml;ndigen Weiterentwicklung
      (Alpha-Phase) und erhebt keinerlei Anspruch darauf, fehlerfrei zu sein. Es stellt daher
      ebenfalls einen Regelversto&szlig; dar, wenn offensichtliche Programmierfehler zur Verbesserung von
      Skills herangezogen werden.</li>
   </ul>

   <?php navBarBottom( "de_hb-13.php", "de_hb-21.php" ); ?>

<?php include_footer(); ?>