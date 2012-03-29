<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - Gamemaster",
                  "This page contains a listing of the Illarion Game Masters.",
                  "Gamemaster, Game leaders, Contact" );
   include_header();
?>

   <h1>Gamemaster</h1>

   <h2>Contents</h2>

   <ul>
      <li><a class="hidden" href="#1">General information</a></li>

      <li><a class="hidden" href="#2">Players with Gamemaster Status</a></li>
   </ul>

   <?php insert_go_to_top_link(); ?>

   <p><a name="1"></a></p>

   <h2>General information</h2>

   <?php cap(S); ?>

   <p>ome players have a special Gamemaster character. These uphold the rules of Illarion, and may
   punish any and all infractions severely, or even pass it on to the admins. Lying to or
   deceiving a Gamemaster, regarding rule offenders and bugs/errors is strictly forbidden.
   Furthermore, if a Gamemaster is busy or discussing game relevant matters, he should only be
   disturbed in urgent cases. The names of other characters of a Gamemaster are withheld, and will
   only be released when specifically requested by the Gamemaster
   herself/himself.</p>

   <?php insert_go_to_top_link(); ?>

   <p><a name="2"></a></p>

   <h2>Players with Gamemaster Status</h2>

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
      "mailto:Irania_51374@hotmail.com">Irania_51374@hotmail.com</a>)</
   </ul>

   <?php insert_go_to_top_link(); ?>

<?php include_footer(); ?>