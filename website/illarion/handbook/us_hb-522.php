<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - Handbook - Client",
                  "Control",
                  "handbook, tutorial" );
   include_header();
?>

   <?php navBarTop( "us_hb-51.php", "us_hb-02.php", "us_hb-53.php" ); ?>

   <h2>5.2.2 Use Objects</h2> 

   <?php cap(U); ?>

   <p>sing objects is really simple. You have to combine two (or more) objects
   &quot;logically&quot;. To do that press and hold down &quot;SHIFT&quot; key, click at the first
   object, than at the second object and now release the &quot;SHIFT&quot; key. If you have clicked
   an allowed combination of objects and in its right order, your character will execute the
   action. The success of the action can depend on the skills of your character, so don&#39;t
   wonder, if you use coal and ore up, but don&#39;t produce any items - you just have to train. If
   there is needed more than one item for an action - e.g. to blacksmith coal, ore and a hammer is
   needed - you only have to use the first two of it (here: use hammer with ore). The third item
   (here: coal) will be automatically selected from your inventory.</p>

   <?php cap(I); ?>

   <p>f you don&#39;t own all the necessary items, you will get a message and the action won&#39;t
   be executed. You have to carry these items in your belt orb bag with you. If you have to choose
   the result of your action - e.g. the product you want to smith - a selection menu in section
   &quot;D&quot; will open. Click on the items to see the names of them. To make a selection, you
   have to click on the item while you hold down &quot;SHIFT&quot; key. With the arrows to the left
   and right you can navigate trough the whole list of possible items. To abort the action you only
   have to click on the arrow up beside the selection
   menu.</p>

   <?php navBarBottom( "us_hb-521.php", "us_hb-53.php" ); ?>

<?php include_footer(); ?>