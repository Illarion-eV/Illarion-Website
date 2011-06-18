<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - Handbuch - Client",
                  "Board",
                  "Illarion, RPG, online, MPORPG, graphisch, frei, freies, kostenlos, kostenloses, grafisch, Rollenspiel,Handbuch, Anleitung, " );
   include_header();
?>

   <?php navBarTop( "de_hb-14.php", "de_hb-02.php", "de_hb-31.php" ); ?>

   <h1>2. Das Board</h1>

   <h2>2.1 Was finde ich im Board ?</h2>

   <?php cap(N); ?>

   <p>eben den Spielregeln und allerlei n&uuml;tzlichen Hinweisen und Erl&auml;uterungen finden sich im Board
   mehrere Foren, die teilweise im unmittelbaren Zusammenhang stehen mit den ingame-Ereignissen.
   Das RPG-Board und das Gilden-Board stehen ausschlie&szlig;lich f&uuml;r ingame-Beitr&auml;ge zur Verf&uuml;gung. F&uuml;r
   Anfragen, Spieltipps oder Anregungen stehen die anderen Boards bereit.</p>

   <p>Die Boards sind zu finden unter <a href="<?php echo "$url/community/forums/" ?>"><?php echo "$url/community/forums/" ?></a>.</p>

   <?php navBarBottom( "de_hb-14.php", "de_hb-31.php" ); ?>

<?php include_footer(); ?></p>