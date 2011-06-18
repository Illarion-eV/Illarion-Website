<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - E-Mails",
                  "Hier stehen f&uuml;r die verschiedenen Bereiche Illarions die E-Mails, an die man sich wenden kann.",
                  "Kontakt, E-Mail, email, Email" );
   include_header();
?>

   <h1>E-Mails</h1>

   <h2>Inhalt</h2>

   <ul>
      <li><a class="hidden" href="#1">Allgemeines</a></li>

      <li><a class="hidden" href="#2">Adressen</a></li>
   </ul>

   <?php insert_go_to_top_link(); ?>

   <p><a name="1"></a></p>

   <h2>Allgemeines</h2>

   <p>Rund um Illarion tauchen immer wieder Fragen, W&uuml;nsche und Anregungen auf. Da f&uuml;r unterschiedliche Bereiche unterschiedliche Projekt-Mitarbeiter verantwortlich sind, gibt es f&uuml;r jeden Bereich eine extra E-Mail-Adresse, an die Du Dich wenden kannst. Aber pr&uuml;fe bitte GENAU, in welche Kategorie Dein Anliegen f&auml;llt und teile die E-Mail gegebenenfalls auf!</p>

   <p>&Uuml;berpr&uuml;fe VORHER, ob deine Anfrage eventuell in der <a href= "../general/de_faq_graphic.php">Grafik-FAQ</a>, <a href= "../general/de_faq_concept.php">Konzept-FAQ</a>, <a href= "../general/de_faq_technic.php">Technik-FAQ</a> oder in den verschiedenen Bereichen des <a href= "<?php echo "$url/community/forums/" ?>">Forum</a> beantwortet wurde oder dort gestellt werden kann. Dies spart uns wertvolle Zeit f&uuml;r der Weiterentwicklung von Illarion.</p>

   <?php insert_go_to_top_link(); ?>

   <p><a name="2"></a></p>

   <h2>Adressen</h2>

   <p><a href="mailto:general@illarion.org">general@illarion.org</a><br /> = Allgemeines aller Art (alles, was durch die anderen E-Mail-Adressen nicht abgedeckt wird)</p>

   <p><a href="mailto:accounts@illarion.org">accounts@illarion.org</a><br /> = Allgemeine Accountanfragen, Fragen bei Account-Problemen</p>

   <p><a href="mailto:webmaster@illarion.org">webmaster@illarion.org</a><br /> = Anfrage auf &Auml;nderungen der Webseite (Inhalt, Rechtschreibfehler), Meldung nicht funktionierender Links, Aufnahme von Links (Gilden, Fan-Pages, etc.)</p>

   <p><a href="mailto:violations@illarion.org">violations@illarion.org</a><br /> = Meldung von Regelverst&ouml;ssen in und ausserhalb des Spiels (PK, Spamming, Cheating, Powergaming, etc.)</p>

   <p><a href="mailto:RPG_requests@illarion.org">RPG_requests@illarion.org</a><br /> = Anfragen an GMs auf Quest-Unterst&uuml;tzungen und &auml;hnliches</p>

   <p><a href="mailto:character_requests@illarion.org">character_requests@illarion.org</a><br /> = Namens&auml;nderungen, Passw&ouml;rter, E-Mail-&Auml;nderungen, Anfragen nach jeglichen &Auml;nderungen am Charakter; ACHTUNG: Char-Passwort mitschicken, sonst keine Bearbeitung!! KEINE Anfragen bzgl. Accounts!</p>

   <p><a href="mailto:bugs@illarion.org">bugs@illarion.org</a><br /> = Fehlermeldungen, kurz &#39;Bugs&#39; aller Art</p>

   <p><a href="mailto:gm_abuse@illarion.org">gm_abuse@illarion.org</a><br /> = Beschwerden &uuml;ber Gamemaster. Diese Mails werden von einer unparteiischen Person empfangen und bearbeitet!</p>

   <?php insert_go_to_top_link(); ?>

<?php include_footer(); ?>