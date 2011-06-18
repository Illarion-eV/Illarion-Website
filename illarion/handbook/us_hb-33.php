<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - Handbook - Client",
                  "Using",
                  "handbook, tutorial" );
   include_header();
?>

   <?php navBarTop( "us_hb-32.php", "us_hb-02.php", "us_hb-34.php" ); ?>

   <h2>3.3 Game start/quit</h2>

   <p>To start the game double click on the program file or the created link (some systems are
   configured so that only a single mouse click is necessary to start programs - read your system
   manual to clear this up). After the start you will see this login-dialog:</p>

   <div class="center">
      <img src="log_in_dialog.png" alt="log in dialog" border="0" width="431" height="166" />
   </div>

   <?php cap(I); ?>

   <p>f you play Illarion the first time you have to create a character. Click on &quot;Create
   new&quot; - details about the creation of a character you will find in this manual some lines
   below. If you already had created a character, you have to type the name and your password in
   the fields &quot;Name&quot; and &quot;Password&quot;. Now click on &quot;OK&quot; to go directly
   in game. Please attend that by typing the name and password you will have pay attention to case
   sensitivity! Here you can also disable or enable the music and sound effects. An active online
   connection is necessary to start the game!</p>

   <p>To end the game press only the &quot;ESC&quot; -key. The game will be closed without any
   further query.</p>

   <?php navBarBottom( "us_hb-32.php", "us_hb-34.php" ); ?>

<?php include_footer(); ?>