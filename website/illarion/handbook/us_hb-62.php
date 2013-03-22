<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - Handbook - Client",
                  "Trading",
                  "handbook, tutorial" );
   include_header();
?>

   <?php navBarTop( "us_hb-61.php", "us_hb-02.php", "us_hb-63.php" ); ?>

   <h2>6.2 Trading</h2> 

   <?php cap(T); ?>

   <p>o trade you have to watch out for trading NPC&#39;s. Some of them will buy items and others
   will sell items (the NPC&#39;s will tell you what to do).</p>

   <p>To sell an item use the NPC with the Item you want to sell. If the NPC buy it, he will hand
   you the money the item is worth. To buy items you have to hold down the SHIFT key and left click
   on the NPC (use it) and now release the SHIFT key. Now the NPC will show you his assortment of
   goods in section &quot;D&quot;.</p>

   <?php cap(C); ?>

   <p>lick on the item you want to buy while you hold down the SHIFT key. If you don&#39;t want to
   buy something you can close the menu by clicking on the ARROW UP PICTURE. You can use the
   counter (section &quot;I&quot;) to buy or sell more than one item at
   once.</p>

   <?php navBarBottom( "us_hb-61.php", "us_hb-63.php" ); ?>

<?php include_footer(); ?>