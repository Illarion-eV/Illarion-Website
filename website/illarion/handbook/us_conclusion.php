<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - Handbook - Client",
                  "Introduction",
                  "Illarion, RPG, online, MPORPG, graphical, free, grafic, Role-Playing Game, handbook, tutorial" );
   include_header();
?>

   <?php navBarTop( "us_frm.php", "us_hb.php", "" ); ?>

   <h1>Conclusion</h1>


   <?php cap(T); ?>
<p>hankyou for spending time reading the manual. Hopefully this will become of much use to you throughout
your game play. If you have any questions, you may ask them on <a href="http://illarion.org/community/forums/viewforum.php?f=6">The Forums</a>.
Please be mindful of the rules, as well as how to roleplay properly. Remember, any uncooperation
with the rules or with the Gamemasters, can lead to your character's deletion! </p>

   <?php navBarBottom( "us_hb.php", "" ); ?>

<?php include_footer(); ?>