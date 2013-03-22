<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - Handbook - Client",
                  "Installation",
                  "handbook, tutorial" );
   include_header();
?>

   <?php navBarTop( "us_hb-21.php", "us_hb-02.php", "us_hb-32.php" ); ?>

   <h1>3. Installation</h1>

   <h2>3.1 System Requirements</h2>

   <p>The minimum hard- and software requirements are:</p>

   <ul>
      <li>Microsoft Windows 98, ME or Windows 2000 and higher</li>
   </ul>

   <ul>
      <li>Video card with a resolution 1024x768 pixel and color depth 16 bit</li>
   </ul>

   <ul>
      <li><a rel="external" href="<?php echo $url ?>/illarion/us_java_download.php">Microsoft
      DirectX</a> 7.0 or higher</li>
   </ul>

   <ul>
      <li>Online connection</li>
   </ul>

   <ul>
      <li>The latest <a rel="external" href=
      "<?php echo $url ?>/illarion/us_java_download.php">Illarion Client</a></li>
   </ul>

   <ul>
      <li>A windows compatible sound card to hear the music and the sound effects</li>
   </ul>

   <ul>
      <li>Windows 95 will need <a rel="external" href=
      "<?php echo $url ?>/illarion/us_java_download.php">WinSock2</a> to run the game</li>
   </ul>

   <ul>
      <li>Windows NT is not supported.</li>
   </ul>

   <?php navBarBottom( "us_hb-21.php", "us_hb-32.php" ); ?>

<?php include_footer(); ?>