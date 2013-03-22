<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - Handbook - Client",
                  "First Steps",
                  "handbook, tutorial" );
   include_header();
?>

   <?php navBarTop( "us_hb-43.php", "us_hb-02.php", "us_hb-52.php" ); ?>

   <h1>5. First steps</h1>

   <h2>5.1 The Screen</h2>

   <p>The screen of Illarion is cut in different sections:</p>

   <p><img src="layout_client_interface.png" alt="" border="0" width="394" height="252" /></p>

   <p>This sections can be specified as follows.<br />
   <br />
   A) inventory / skills<br />
   B) automatic map<br />
   C) detailed map<br />
   D) content of container / bag / runes / herbs / goods / products<br />
   E) content of the belt<br />
   F) mana<br />
   G) health<br />
   H) navigation bars for the sections &quot;D&quot;<br />
   I) counter for items<br />
   <br />
   <br />
   The content consists of following fields:<br />
   <br />
   a) neck (e.g. for amulets)<br />
   b) cape<br />
   c) right hand (e.g. to handle weapons)<br />
   d) right finger (e.g. for rings)<br />
   e) both hands (e.g. for gloves)<br />
   f) legs<br />
   g) head<br />
   h) backpack (e.g. for containers like bags)<br />
   i) torso<br />
   k) left hand (e.g. for shields)<br />
   m) left finger (e.g. for ringe)<br />
   n) feet</p>

   <?php cap(T); ?>

   <p>here is a button at the lower end with the inscription &quot;Show skills&quot;. If you click
   on it you will see your skills instead of your inventory. With the arrow key below your skills
   you can navigate trough the classes. To go back to the inventory you have to click on &quot;Show
   inventory&quot;. The skills will be shown as red bars below the names. The longer the bar, the
   better is your
   skill.</p>

   <?php navBarBottom( "us_hb-43.php", "us_hb-52.php" ); ?>

<?php include_footer(); ?>