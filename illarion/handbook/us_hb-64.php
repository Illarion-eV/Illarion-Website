<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - Handbook - Client",
                  "Magic System",
                  "handbook, tutorial" );
   include_header();
?>

   <?php navBarTop( "us_hb-63.php", "us_hb-02.php", "us_hb-641.php" ); ?>
   
   <h2>6.4 Magic</h2> 

   <?php cap(T); ?>

   <p>here are known two types of magic in Illarion: The magic of spells and of herbs. Only mages
   can cast spells and only druids can brew potions from herbs. Which kind of magic your character
   can control depends on the magic book your character read first: A spell book makes you a mage
   and an herb book makes you a druid.</p>

   <?php navBarBottom( "us_hb-63.php", "us_hb-641.php" ); ?>

<?php include_footer(); ?>