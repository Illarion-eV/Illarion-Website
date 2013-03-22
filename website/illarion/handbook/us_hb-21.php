<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - Handbook - Client",
                  "Forum",
                  "handbook, tutorial" );
   include_header();
?>

   <?php navBarTop( "us_hb-14.php", "us_hb-02.php", "us_hb-31.php" ); ?>

   <h1>2. The Forum</h1>

   <h2>2.1 What do i find at the forum?</h2>

   <?php cap(B); ?>

   <p>eside the game rules, many useful hints and explanations will find in the forum some topics,
   which are sometimes directly associated with the story line in the game. The RPG-Board and the
   Guilds-Board are only reserved for in game postings. On the other boards you can post requests,
   game hints or suggestions.</p>

   <p>You will find the forum here: <a href="<?php echo "$url/community/forums/" ?>"><?php echo "$url/community/forums/" ?></a>.</p>

   <?php navBarBottom( "us_hb-14.php", "us_hb-31.php" ); ?>

<?php include_footer(); ?></p>