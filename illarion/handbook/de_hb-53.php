<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - Handbuch - Client",
                  "Kommunikation",
                  "Illarion, RPG, online, MPORPG, graphisch, frei, freies, kostenlos, kostenloses, grafisch, Rollenspiel,Handbuch, Anleitung, " );
   include_header();
?>

   <?php navBarTop( "de_hb-522.php", "de_hb-02.php", "de_hb-54.php" ); ?>

   <h2>5.3 Kommunikation</h2>

   <?php cap(U); ?>

   <p>m mit anderen zu reden, gib einen Text ein und dr&uuml;cke RETURN. Jeder in der n&auml;heren Umgebung
   wird diesen Text lesen k&ouml;nnen. Du kannst Fehler mit der BACKSPACE-Taste korrigieren.<br />
   Wenn andere Personen sprechen, kannst Du deren Worte am Bildschirm sehen. Wenn nicht jeder Dich
   h&ouml;ren soll, kannst Du auch fl&uuml;stern. Gefl&uuml;sterte Texte k&ouml;nnen nur von Person gelesen werden, die
   direkt vor Deinem Charakter stehen. Zum Fl&uuml;stern gibst Du direkt vor Deinem Text das Kommando
   &quot;#whisper&quot; oder &quot;#w&quot; als Abk&uuml;rzung ein. Die Eingabe von &quot;#whisper Ich
   mag Ihn nicht.&quot; Wird den Text &quot;Ich mag Ihn nicht&quot; f&uuml;r die Personen direkt vor Dir
   lesbar anzeigen.</p>

   <?php cap(D); ?>

   <p>amit Dich m&ouml;glichst jeder h&ouml;ren kann, kannst Du auch rufen. Zum Rufen gibst Du vor Deinem
   Text einfach &quot;#shout&quot; oder &quot;#s&quot; ein. Du wirst mehrere Bildschirme entfernt
   noch zu h&ouml;ren sein. Um anderen Leuten Deinen Namen mitzuteilen, kannst Du Dich ihnen mit
   &quot;#introduce&quot; oder &quot;#i&quot; vorstellen. Die Personen, denen Du Dich vorstellst
   m&uuml;ssen allerdings dicht bei Dir stehen (es wird schon recht schwer jemandem auf 5 Meter
   Entfernung die Hand zu sch&uuml;tteln). Um die Namen der anderen Mitspieler zu sehen, dr&uuml;cke
   &quot;F12&quot;. Du wirst die Namen all derer sehen, die sich Dir bereits vorgestellt haben. Bei
   allen anderen ist der Text &quot;Someone&quot; und eine eindeutige Nummer zu sehen (z.B.
   &quot;Someone 7601&quot;).</p>

   <?php cap(U); ?>

   <p>m Aktionen Deines Charakters zu beschreiben, benutzt Du den Befehl &quot;#me&quot;. Dieser
   Befehl wird bei der Ausgabe durch Deinen Namen ersetzt (bzw. durch &quot;Someone 3456&quot;
   falls die anderen Dich nicht kennen). Wenn also ein Spieler namens &quot;Trendor&quot; den Text
   eingibt &quot;#me isst einen Apfel&quot;, dann erscheint am Bildschirm &quot;Trendor isst einen
   Apfel&quot;.</p>

   <?php navBarBottom( "de_hb-522.php", "de_hb-54.php" ); ?>

<?php include_footer(); ?>