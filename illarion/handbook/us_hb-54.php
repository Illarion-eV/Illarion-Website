<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - Handbook - Client",
                  "Container",
                  "handbook, tutorial" );
   include_header();
?>

   <?php navBarTop( "us_hb-53.php", "us_hb-02.php", "us_hb-61.php" ); ?>

   <h2>5.4 Container</h2> 

   <?php cap(Y); ?>

   <p>our character will carry around some different things. To this end you drag them simply with
   hold down left mouse button in one of your inventories (your belt, your character sketch or one
   oft the containers) - to do that the item has to lie in close range to you (below or beside
   you), you cant pick up items that lie far away from you. You can carry around up to 6 items in
   your belt. To carry around more you will need a bag or chest. You should drag that container to
   the field &quot;h&quot; of your inventory. To open your &quot;backpack&quot; you have to click
   on it with the right mouse button. The content of this container will now appear in section
   &quot;D&quot;. Every item you drag there now will be tucked in your backpack. With the both
   arrows pictures right and left beside this section you can trough the items of your
   backpack.</p>

   <?php cap(T); ?>

   <p>To close the container you have to click on the arrow picture up beside the content of the
   container. Important items you should carry around in your belt, you can put the rest in your
   backpack. You can open chests on the map with a right click. These containers work in the same
   way like your backpack. But attention! Everybody else can also open that chests on the map and
   take out the content of them! Only the auburn chests are something special: You will recognise
   that you can only carry around a limited amount of items. If you reach the limit you have to
   remove items from your inventory.</p>

   <?php cap(S); ?>

   <p>o that you don&#39;t lose these items you can deposit them in the auburn chest. To open the
   chest you have use it (SHIFT key + left click instead of right click to open). They work like
   your bank account. Only your character can see the content of the chest and you can open any
   other auburn chest in Illarion to take out your items.</p>

   <p>(Moveable) Items that lie on the ground will rot after some
   while.</p>

   <?php navBarBottom( "us_hb-53.php", "us_hb-61.php" ); ?>

<?php include_footer(); ?>