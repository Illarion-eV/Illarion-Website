<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - Handbook - Client",
                  "Communication",
                  "handbook, tutorial" );
   include_header();
?>

   <?php navBarTop( "us_hb-522.php", "us_hb-02.php", "us_hb-54.php" ); ?>

   <h2>5.3 Communication</h2> 

   <?php cap(T); ?>

   <p>o talk to others you only have to type the text and press &quot;RETURN&quot;. Everyone in
   your vicinity can read this text. You can correct mistakes with &quot;BACKSPACE&quot;.<br />
   If other persons talk you can read it on the screen too. You can whisper, if you don&#39;t like
   that everyone can hear you. Whispered texts can only heard by persons which stand very close to
   you. To whisper you have to prepend the command &quot;#whisper&quot; or &quot;#w&quot; to the
   text you want to write. If you type &quot;#whisper I don&#39;t like him&quot;, it will display
   the text &quot;I don&#39;t like him&quot; only to the person that stands very close to
   you.</p>

   <?php cap(Y); ?>

   <p>ou can shout, if you like to be heard over a wide range. To shout you only have to type
   &quot;#shout&quot; or &quot;#s&quot; in front of your text. Now you can be heard over more than
   one screen. If you want to introduce to other persons, you can do that with
   &quot;#introduce&quot; or &quot;#i&quot;. These persons have to stand very close to you. (You
   can&#39;t shake hands with someone that stands 5 meters away). To see the names of the others
   you have to press &quot;F12&quot;. You will see all the names of the people that have introduced
   to you already. By all the others you can see the text &quot;Someone&quot; and a unique number
   (e.g. &quot;Someone 7601&quot;).</p>

   <?php cap(T); ?>

   <p>o describe acts of your character you have to use the command &quot;#me&quot;. This command
   will be replaced by your name (resp. with &quot;Someone 3456&quot; if the others doesn&#39;t
   know you). If a player named &quot;Trendor&quot; types the text &quot;#me eats an apple&quot;,
   you will read on the screen &quot;Trendor eats an
   apple.&quot;.</p>

   <?php navBarBottom( "us_hb-522.php", "us_hb-54.php" ); ?>

<?php include_footer(); ?>