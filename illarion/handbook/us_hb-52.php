<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - Handbook - Client",
                  "Control",
                  "handbook, tutorial" );
   include_header();
?>

   <?php navBarTop( "us_hb-51.php", "us_hb-02.php", "us_hb-521.php" ); ?>

   <h2>5.2 Controls</h2>

   <p>There are three possibilities to move in Illarion:</p>

   <ul>
      <li>At first the arrow keys: simply press the direction you will go to.</li>

      <li>Your character will move until you release the arrow key.</li>

      <li>You also can double click at the field you want to go to on the detailed map (section
      &quot;C&quot;).</li>

      <li>Your character will walk until he reaches the target field or comes across an
      obstacle.</li>

      <li>Your hero will stop in front of obstacles.</li>

      <li>At least you can also double click at the target field on the automated map (section
      &quot;B&quot;).</li>

      <li>Your character will stop in front of obstacles again.</li>

      <li>To turn around without moving you only have to hold down the &quot;CTRL&quot; key, while
      you press the arrow keys in the direction you want to look.</li>

      <li>To enter dungeons and caves you only have to walk over the entrance.</li>

      <li>Ladders work the same way.</li>
   </ul>

   <?php navBarBottom( "us_hb-51.php", "us_hb-521.php" ); ?>

<?php include_footer(); ?>