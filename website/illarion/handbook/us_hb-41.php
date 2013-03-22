<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - Handbook - Client",
                  "Create a charakter",
                  "handbook, tutorial" );
   include_header();
?>

   <?php navBarTop( "us_hb-34.php", "us_hb-02.php", "us_hb-42.php" ); ?>

   <h1>4. Create a charakter</h1>

   <h2>4.1 &quot;Create new&quot;</h2>

   <p>To create a new character press &quot;Create new&quot; at the login dialog. After that will
   see this screen:</p>

   <div class="center">
      <img src="create_character_dialog.png" alt="create character dialog" width="702" height="534" border="0" />
   </div>

   <p>Here you choose the attributes of your hero. Some of them can be written with text. Now a
   description of the fields:</p>

   <ul>
      <li><strong>Name:</strong> The name of your character. Please use a mediaeval/fantasy name.
      Names like &quot;Karl50&quot; or &quot;a sorcerer&quot; won&#39;t be tolerated.</li>
   </ul>

   <ul>
      <li><strong>Title:</strong> A title or name affix like &quot;Sir&quot;, &quot;Lord&quot; or
      &quot;the mysterious&quot;</li>
   </ul>

   <ul>
      <li><strong>Sex:</strong> The gender of your character.</li>
   </ul>

   <ul>
      <li><strong>Race:</strong> The race of your character. It will have an effect on the amount
      of your attribute points and general abilities.</li>
   </ul>

   <ul>
      <li><strong>Agility:</strong> Has an effect to your hero&#39;s speed and his ability to
      defend.</li>
   </ul>

   <ul>
      <li><strong>Constitution:</strong> The higher your constitution, the fewer will be the damage
      if an enemy hits you.</li>
   </ul>

   <ul>
      <li><strong>Dexterity:</strong> Has an effect on your chance to hit and parry an enemy.</li>
   </ul>

   <ul>
      <li><strong>Essence:</strong> The higher your magic ability, the fewer is the damage you will
      get from a spell.</li>
   </ul>

   <ul>
      <li><strong>Intelligence:</strong> The more intelligent your hero is, the less mana you need
      to cast a spell.</li>
   </ul>

   <ul>
      <li><strong>Perception:</strong> Unused at the moment.</li>
   </ul>

   <ul>
      <li><strong>Strength:</strong> an effect on the damage you can cause on your enemy and your
      load capacity.</li>
   </ul>

   <ul>
      <li><strong>Willpower:</strong> Unused at the moment.</li>
   </ul>

   <ul>
      <li><strong>Age:</strong> Unused at the moment.</li>
   </ul>

   <ul>
      <li><strong>Weight:</strong> Unused at the moment.</li>
   </ul>

   <ul>
      <li><strong>Height:</strong> Unused at the moment.</li>
   </ul>

   <ul>
      <li><strong>Real name*):</strong> Your real name (you can read it e.g. on your identity
      card).</li>
   </ul>

   <ul>
      <li><strong>Location*):</strong> Your place of residence and the country you are really
      living in.</li>
   </ul>

   <ul>
      <li><strong>Language:</strong> The language in which you will get system messages and the
      names of the items will be displayed.</li>
   </ul>

   <ul>
      <li><strong>E-Mail*):</strong> Your Email address. We will send your password to this
      address, if you lost your password.</li>
   </ul>

   <ul>
      <li><strong>Password</strong>: A password to save your character against abuse. To avoid
      typing errors you have to type it again in the field &quot;Retype password&quot;</li>
   </ul>

   <ul>
      <li><strong>Description:</strong> A description of the general behaviour of your character
      and his appearance.</li>
   </ul>

   <p>*) These informations are only accessible for Game masters.</p>

   <?php navBarBottom( "us_hb-34.php", "us_hb-42.php" ); ?>

<?php include_footer(); ?>