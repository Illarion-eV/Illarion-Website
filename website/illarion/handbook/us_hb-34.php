<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - Handbook - Client",
                  "Trouble-shooting",
                  "handbook, tutorial" );
   include_header();
?>

   <?php navBarTop( "us_hb-33.php", "us_hb-02.php", "us_hb-41.php" ); ?>

   <h2>3.4 Trouble-shooting</h2>

   <ul>
      <li><a class="hidden" href="#1">The screen stays black after game start.</a></li>

      <li><a class="hidden" href="#2">&quot;No character with this name has been
      found&quot;.</a></li>

      <li><a class="hidden" href="#3">Error message: &quot;Wrong password&quot;.</a></li>

      <li><a class="hidden" href="#4">Error message</a><a class="hidden" href="#4">:
      &quot;Can&#39;t establish connection - Maybe the server is not online or you have no internet
      connection&quot; or &quot;Connecting to Server, Can&#39;t connect!&quot;.</a></li>

      <li><a class="hidden" href="#5">Error message</a><a class="hidden" href="#5">: &quot;Invalid
      client version&quot;.</a></li>
   </ul>

   <p><a name="1"></a></p>

   <h2>The screen stays black after game start.</h2>

   <p>You have drawn the program file (Illarion.exe) to the desktop instead of creating a link.
   Please draw the program file back to the directory and start the game again. The program
   hasn&#39;t found all necessary files, so try to unpack the files again.</p>

   <p><a name="2"></a></p>

   <h2>Error message: &quot;No character with this name has been found&quot;.</h2>

   <p>You have entered the name wrong. Please start the game again and enter the right name. Please
   remember that you have to pay attention to case sensitivity by enter the name and the password.
   You didn&#39;t create a character with that name. Please start again and choose &quot;Create
   new&quot;.</p>

   <p><a name="3"></a></p>

   <h2>Error message: &quot;Wrong password&quot;.</h2>

   <p>You entered the wrong name or password. Please start again and enter the right data. Please
   remember that you have to pay attention to case sensitivity by enter the name and the
   password.</p>

   <p><a name="4"></a></p>

   <h2>Error message: &quot;Can&#39;t establish connection - Maybe the server is not online or you have no internet connection&quot; oder &quot;Connecting to Server, Can&#39;t connect!&quot;.</h2>

   <p>You don&#39;t have an active online connection. Please connect to the net and start
   again.<br />
   You use Windows 95 - the client doesn&#39;t run under Windows 95. Maybe the server is down for
   maintenance work. Please try again later.</p>

   <p><a name="5"></a></p>

   <h2>Error message: &quot;Invalid client version&quot;.</h2>

   <p>You use the wrong client. Please install the latest Illarion client and start
   again.</p>

   <?php navBarBottom( "us_hb-33.php", "us_hb-41.php" ); ?>

<?php include_footer(); ?>