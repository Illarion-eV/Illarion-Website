<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - Handbook - Client",
                  "Client download/installation",
                  "handbook, tutorial" );
   include_header();
?>

   <?php navBarTop( "us_hb-31.php", "us_hb-02.php", "us_hb-33.php" ); ?>

   <h2>3.2 Client download/installation</h2>

   <p>The Illarion client is packed as a ZIP-archive, so you need a programm to unpack the files,
   e.g. <a rel="external" href="http://www.winzip.com">WinZip</a>. Unpack all files in a directory
   of your choice on your hard disk. Where this directory is located and its name isn&#39;t
   important.</p>

   <?php cap(Y); ?>

   <p>ou can create a link of the program &quot;Illarion.exe&quot; on your desktop. To create it
   you will only have to click with your left mouse button on the file and drag it to the desktop,
   while you hold down the mouse button. If you release the right mouse button windows will ask you
   what to do and you choose: &quot;create a link&quot;.</p>

   <p>To remove the game completely from your hard disk you only need to delete the
   Illarion-directory. Illarion doesn&#39;t use any secret hard disk entries or cookies, so the
   removal of the program is unproblematic.</p>

   <?php cap(I); ?>

   <p>f you decide not to play Illarion anymore, you should send us an email that we know we can
   delete your character. If you don&#39;t do, so after some months there will accumulate many
   unnecessary entries in the server&#39;s database and this will waste too much recourses of the
   server.</p>

   <?php navBarBottom( "us_hb-31.php", "us_hb-33.php" ); ?>

<?php include_footer(); ?>