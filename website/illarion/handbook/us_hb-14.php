<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - Handbook - Client",
                  "Rules",
                  "handbook, tutorial" );
   include_header();
?>

   <?php navBarTop( "us_hb-13.php", "us_hb-02.php", "us_hb-21.php" ); ?>

   <h2>1.4 The Seven Golden Rules</h2>

   <p>Unfortunately it occurs again and again that players (humans, none characters) try to disturb
   the game extremely. A consequence of ignoring one of the following rules could be that your
   character will be deleted, even without warning.<br />
   In serious cases the entire account will be closed, i.e. you as well as all players applied on
   your connection will be blocked.<br />
   You will find further rules under: <a href=
   "<?php echo "$url/illarion/rules/" ?>"><?php echo "$url/illarion/rules/" ?></a>.</p>

   <ul>
      <li>Don&#39;t kill other character of players if there is no RP reason that the others also
      know. [PLAYERKILLING, PK]</li>

      <li>Don&#39;t kill a character several times briefly one behind the other.</li>

      <li>Don&#39;t kill a character as long as it&#39;s standing at the cross</li>

      <li>Don&#39;t write senseless character strings. [SPAMMING]</li>

      <li>Don&#39;t disturb the role-play of the others by redundant talking out of character. If
      it&#39;s needed you have to whisper your talk out of character and set it in double brackets
      #w: ((I am a newbie, how can I do this?))</li>

      <li>Don&#39;t use char names that doesn&#39;t fit into the ambiance of Illarion. Illarion
      plays in a medieval fantasy-world. Don&#39;t use names that are only designations like e.g.
      &quot;the avenger&quot;. For such designations there is the additional field
      &quot;title&quot;.</li>

      <li>Illarion is a private program in a constant development (alpha stage) and doesn&#39;t
      claim to be free of errors. Therefore it&#39;s a irregularity when obvious programming errors
      are used for the improvement of skills.</li>
   </ul>

   <?php navBarBottom( "us_hb-13.php", "us_hb-21.php" ); ?>

<?php include_footer(); ?>