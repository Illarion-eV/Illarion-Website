<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - Handbuch - Client",
                  "Handel treiben",
                  "Illarion, RPG, online, MPORPG, graphisch, frei, freies, kostenlos, kostenloses, grafisch, Rollenspiel,Handbuch, Anleitung, " );
   include_header();
?>

   <?php navBarTop( "de_hb-61.php", "de_hb-02.php", "de_hb-63.php" ); ?>

   <h2>6.2 Handel treiben </h2>

   <?php cap(U); ?>

   <p>m zu handeln, musst Du nach handelnden NPC&#39;s Ausschau halten. Einige werden Gegenst&auml;nde
   kaufen, andere verkaufen Gegenst&auml;nde (die NPC&#39;s sagen Dir jeweils was Deine Aufgabe
   ist).</p>

   <p>Um einen Gegenstand zu verkaufen, &quot;benutze&quot; den NPC mit dem zu verkaufenden
   Gegenstand. Sofern der NPC den Gegenstand annimmt, wird er Dir die entsprechende Menge Gold
   aush&auml;ndigen. Um Gegenst&auml;nde zu kaufen, dr&uuml;cke die SHIFT-Taste und klicke auf den NPC, lass&#39;
   dann die SHIFT-Taste wieder los. Der NPC wird Dir sein Sortiment an Waren in Sektion D
   &quot;zeigen&quot;.</p>

   <?php cap(K); ?>

   <p>licke auf Deine Auswahl, w&auml;hrend Du wieder die SHIFT-Taste bet&auml;tigst. Falls Du doch nichts
   kaufen m&ouml;chtest, kannst Du das Men&uuml; wieder mit dem PFEIL NACH OBEN schlie&szlig;en. Du kannst beim
   Handeln auch den Z&auml;hler (Sektion &quot;I&quot;) benutzen, um mehrere Gegenst&auml;nde auf einmal zu
   kaufen oder zu
   verkaufen.</p>

   <?php navBarBottom( "de_hb-61.php", "de_hb-63.php" ); ?>

<?php include_footer(); ?>