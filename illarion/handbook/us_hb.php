<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - Handbook - Client",
                  "Content",
                  "Illarion, RPG, online, MPORPG, graphical, free, grafic, Role-Playing Game, handbook, tutorial" );
   include_header();
?>

   <?php navBarTop( "us_hb-01.php", "", "us_01.php" ); ?>

   <h1>Manual</h1><br />
   The Illarion Manual
   <p><h2>Please note! Manual is not complete yet! There is still much to be added, so please be patient!</h2></p>

   <h2>Getting Started</h2>

   <ul>
      <li><a class="hidden" href="us_01.php">What is Illarion?</a></li>

      <li><a class="hidden" href="us_12.php">What is role-playing?</a></li>

      <li><a class="hidden" href="us_dl.php">Download</a></li>
	  
	  <li><a class="hidden" href="us_05.php">Using Objects</a></li>
	  
	  <li><a class="hidden" href="us_screen.php">The Screen</a></li>
   </ul>

   <h2>Creating Your Character</h2>

   <ul>
      <li><a class="hidden" href="us_accounts.php">Your Account</a></li>
	  
	  <li><a class="hidden" href="us_rc.php">Races</a></li>
	  
	  <li><a class="hidden" href="us_att.php">Attributes</a></li>
   </ul>

   <h2>Getting Around</h2>

   <ul>
      <li><a class="hidden" href="us_com.php">Commands</a></li>
   
      <li><a class="hidden" href="us_traveling.php">Traveling around the Island</a></li>

      <li><a class="hidden" href="us_monsters.php">Monsters</a></li>

      <li><a class="hidden" href="us_npc.php">NPC's</a></li>
   </ul>

   <h2>Skills</h2>

   <ul>
      <li><a class="hidden" href="us_fight.php">Fighting</a></li>

      <li><a class="hidden" href="us_craft.php">Craftmanship</a></li>

      <li><a class="hidden" href="us_mgdr.php">Magic and Druidry</a></li>
   </ul>

   <h2>Final Words</h2>

   <ul>
      <li><a class="hidden" href="us_moon.php">Moonsilver</a></li>

      <li><a class="hidden" href="us_frm.php">Forums</a></li>

      <li><a class="hidden" href="us_conclusion.php">Conclusion</a></li>
   </ul>


   <?php navBarBottom( "us_hb-01.php", "us_01.php" ); ?>

<?php include_footer(); ?>