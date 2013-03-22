<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - Handbook - Client",
                  "Fight System",
                  "handbook, tutorial" );
   include_header();
?>

   <?php navBarTop( "us_hb-62.php", "us_hb-02.php", "us_hb-64.php" ); ?>

   <h2>6.3 Fight</h2> 

   <?php cap(T); ?>

   <p>o fight click on the target you want (e.g. a monster or a player) while you press
   &quot;CTRL&quot; key. You will attack the target until one of you die or you click on it again
   while holding down &quot;CTRL&quot; key. To use long range weapons like bows you have to take
   the weapon (bow) in one hand and the ammunition (arrows for bows, bolts for crossbows) on the
   other hand.</p>

   <?php cap(T); ?>

   <p>he health of your character is displayed in section &quot;G&quot;. After you got hurt or
   injured it will only regenerate if you eat something - and that very slow. To heal an injury
   faster you can use healing potions or (let) heal with magic. If you die your character will turn
   into a cloud. This cloud can do nothing except moving.</p>

   <p>To revive your character you have to move to a yellow cross or another player heals you. You
   can get revived unlimited but every time you die your character will lose experience, so take
   care!</p>

   <?php navBarBottom( "us_hb-62.php", "us_hb-64.php" ); ?>

<?php include_footer(); ?>