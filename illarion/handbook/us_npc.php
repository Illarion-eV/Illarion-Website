<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - Handbook - Client",
                  "Introduction",
                  "Illarion, RPG, online, MPORPG, graphical, free, grafic, Role-Playing Game, handbook, tutorial" );
   include_header();
?>

   <?php navBarTop( "us_monsters.php", "us_hb.php", "us_fight.php" ); ?>

   <h1>NPC's</h1>


   <?php cap(T); ?>
<p>hroughout the game, there are many NPCs (Not Player Controlled). These are designed
 to help you buy things, sell things, as well as learn things. 
You know if it is an NPC or not by simply pressing F12 (View Names).
 You will see that NPCs do not have numbers or names above them. </p>

<p>To communicate with the NPC, you will talk to it as if it is a normal person. 
"Greetings" is the best way to begin with speaking to an NPC. There are many key phrases you should learn 
before trying to buy/sell with an NPC.</p>

<p>When you first begin, you will find yourself on an island with a human NPC.
 If you walk up to him and say, "Greetings!" he will reply with some 
instructions. To begin in the game, you must tell him what you want to be.
 "I want to be a [pick either magician, craftsman, or fighter]!"</p>

<p>If ever you need help, or don't know how to communicate with the NPC, simply type
 the word 'help', and they will direct you. </p>

<p>To buy from Sam or Eliza, simply say, "Please list your wares." or you can also say,
 "What do you sell?" They will then reply with their list of what they sell. In order
  to buy what they are currently selling, simply say, "I want to buy a [insert item here]."
   You will then be given the item, if you have enough money.</p> 

<p>Selling is similar. Simply say, "I want to sell 10 buckets." or "I want to sell a fish." 
Both of these will sell. If you are selling more than one, 
Be sure to include an 's' at the end of the item. </p>

<p>Other NPC's are placed around the map to help you learn about the past history, how to
 learn new languages, and some will help you with skillsa and crafts. These NPC's you should
  try talking to, and see if you can figure out how to gain their knowledge. </p>

   <?php navBarBottom( "us_hb.php", "us_fight.php" ); ?>

<?php include_footer(); ?>