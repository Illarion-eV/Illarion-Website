<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - Scripteditor Commands",
                  "This document contains all commands the script parser for".
                  " NPC Scripts knows",
                  "Scripte, NPCs, own quests, npc, developing" );
   include_header();
?>

<h1>NPC - Scriptcommands</h1>

<h2>Overview</h2>

<ul>
   <li><a href="#1">General commands</a></li>
   <li><a href="#2">Conditions</a></li>
   <li><a href="#3">Consequences</a></li>
   <li><a href="#4">Additional</a></li>
</ul>

<?php insert_go_to_top_link(); ?>
<a id="1"></a>

<h2>General commands</h2>

<ul>
   <li>
      <u><b>Name</b></u>
      <ul>
         <b>Syntax:</b> name="&lt;Name of the NPC&gt;"<br />
         <b>Use:</b> Sets the name of the NPC<br />
         <b>Example:</b> name="Augham"
      </ul>
   </li>
   <li>
      <u><b>Position</b></u>
      <ul>
         <b>Syntax:</b> position=&lt;x&gt;, &lt;y&gt;, &lt;z&gt;<br />
         <b>Use:</b> Sets the position the NPC is standing in<br />
         <b>Example:</b> position=-81,-151,0
      </ul>
   </li>
   <li>
      <u><b>Gender</b></u>
      <ul>
         <b>Syntax:</b> sex=&lt;gender&gt;<br />
         <b>Use:</b> Sets the gender of the NPC ( male, female )<br />
         <b>Example:</b> sex=male
      </ul>
   </li>
   <li>
      <u><b>Race</b></u>
      <ul>
         <b>Syntax:</b> race=&lt;race&gt;<br />
         <b>Use:</b> Sets the race of a NPC ( human, dwarf, ... )<br />
         <b>Example:</b> race=human
      </ul>
   </li>
   <li>
      <u><b>direction</b></u>
      <ul>
         <b>Syntax:</b> direction=&lt;Richtung&gt;<br />
         <b>Use:</b> Sets the direction the NPC is looking in ( north, east, ... )<br />
         <b>Example:</b> direction=west
      </ul>
   </li>
   <li>
      <u><b>Moving radius</b></u>
      <ul>
         <b>Syntax:</b> radius=&lt;moving radius&gt;<br />
         <b>Use:</b> Sets the size of the radius the NPC is moving in<br />
         <b>Example:</b> radius=4
      </ul>
   </li>
   <li>
      <u><b>Cycled text</b></u>
      <ul>
         <b>Syntax:</b> cycletext "&lt;german text&gt;","&lt;english text&gt;" <br />
         <b>Use:</b> Sets the text the NPC says from time to time on its own<br />
         <b>Example:</b> cycletext "#me sieht sich um","#me looks around"
      </ul>
   </li>
   <li>
      <u><b>Quest ID</b></u>
      <ul>
         <b>Syntax:</b> questid=&lt;Quest ID&gt;<br />
         <b>Use:</b> Sets the quest ID the NPC uses. ( Please ask a developer to get such a ID )<br />
         <b>Example:</b> questid=558
      </ul>
   </li>
   <li>
      <u><b>comment</b></u>
      <ul>
         <b>Syntax:</b> --&lt;comment text&gt;<br />
         <b>Use:</b> Adds a comment to the script<br />
         <b>Example:</b> -- here starts a cool npc script
      </ul>
   </li>
</ul>

<?php insert_go_to_top_link(); ?>
<a id="2"></a>

<h2>Conditions</h2>

<ul>
   <li>
      <u><b>Text triggers</b></u>
      <ul>
         <b>Syntax:</b> "&lt;text&gt;"<br />
         <b>Use:</b> Sets the text that triggers an action of the NPC ( more then one is possible )<br />
         <b>Example:</b> "hello"
      </ul>
   </li>
   <li>
      <u><b>NPC state</b></u>
      <ul>
         <b>Syntax:</b> state &lt;compare operator&gt; &lt;value&gt;<br />
         <b>Use:</b> Checks the NPC State for a setted value<br />
         <b>Example:</b> state&gt;=5
      </ul>
   </li>
   <li>
      <u><b>Skill</b></u>
      <ul>
         <b>Syntax:</b> skill(&lt;skillname&gt;) &lt;compare operator&gt; &lt;value&gt;<br />
         <b>Use:</b> Checks the skill of the player for the value<br />
         <b>Example:</b> skill(slashing weapons)=&lt;40
      </ul>
   </li>
   <li>
      <u><b>Attributes</b></u>
      <ul>
         <b>Syntax:</b> attrib(&lt;name of the attribut&gt;) &lt;compare operator&gt; &lt;value&gt;<br />
         <b>Use:</b> Checks the attribute of the player for the value<br />
         <b>Example:</b> attrib(essence)&lt;&gt;10
      </ul>
   </li>
   <li>
      <u><b>Runes</b></u>
      <ul>
         <b>Syntax:</b> rune(&lt;mage class&gt;, &lt;number of the rune&gt;)<br />
         <b>Use:</b> Checks if the character has the rune in the mage class<br />
         <b>Example:</b> rune(mage, 8)
      </ul>
   </li>
   <li>
      <u><b>Money</b></u>
      <ul>
         <b>Syntax:</b> money &lt;compare operator&gt; &lt;value&gt;<br />
         <b>Use:</b> Checks if the character has enough money<br />
         <b>Example:</b> money&lt;8
      </ul>
   </li>
   <li>
      <u><b>Race</b></u>
      <ul>
         <b>Syntax:</b> race = &lt;name of the race&gt;<br />
         <b>Use:</b> Checks if the character is of the race<br />
         <b>Example:</b> race=human
      </ul>
   </li>
   <li>
      <u><b>Queststatus</b></u>
      <ul>
         <b>Syntax:</b> queststatus &lt;compare operator&gt; &lt;value&gt;<br />
         <b>Use:</b> Checks the value of the queststatus ( works only of Quest ID is setted )<br />
         <b>Example:</b> queststatus&gt;20
      </ul>
   </li>
   <li>
      <u><b>Items</b></u>
      <ul>
         <b>Syntax:</b> item( &lt;Item ID&gt;, &lt;position of the item&gt; ) &lt;compare operator&gt; &lt;value&gt;<br />
         <b>Use:</b> Checks if the character has the amount of Items<br />
         <b>Example:</b> item(4,belt)=10
      </ul>
   </li>
   <li>
      <u><b>Player language</b></u>
      <ul>
         <b>Syntax:</b> &lt;name of the language&gt;<br />
         <b>Use:</b> Checks what language the player speaks<br />
         <b>Example:</b> german
      </ul>
   </li>
   <li>
      <u><b>Random value generator</b></u>
      <ul>
         <b>Syntax:</b> chance( &lt;value&gt; )<br />
         <b>Use:</b> Causes a random try that succeeds with a &lt;value&gt;% chance<br />
         <b>Example:</b> chance(40)
      </ul>
   </li>
   <li>
      <u><b>character gender</b></u>
      <ul>
         <b>Syntax:</b> &lt;name of the gender&gt;<br />
         <b>Use:</b> Checks the gender of a character<br />
         <b>Example:</b> male
      </ul>
   </li>
   <li>
      <u><b>Character talkingstate</b></u>
      <ul>
         <b>Syntax:</b> &lt;name of the talking state&gt;<br />
         <b>Use:</b> Checks if the character speaks with another character or not. ( works only for radius above 0 )<br />
         <b>Example:</b> idle
      </ul>
   </li>
   <li>
      <u><b>NPC guild state</b></u>
      <ul>
         <b>Syntax:</b> fraction( &lt;name of the guild&gt; ) &lt;compare operator&gt; &lt;value&gt;<br />
         <b>Use:</b> Checks the value of the character at a NPC Guild<br />
         <b>Example:</b> fraction(albar)=9
      </ul>
   </li>
   <li>
      <u><b>Player said value</b></u>
      <ul>
         <b>Syntax:</b> %NUMBER &lt;compare operator&gt; &lt;value&gt;<br />
         <b>Use:</b> Checks the number the character said to the npc<br />
         <b>Example:</b> %NUMBER&lt;&gt;9
      </ul>
   </li>
</ul>

<?php insert_go_to_top_link(); ?>
<a id="3"></a>

<h2>Consequences</h2>

<ul>
   <li>
      <u><b>Text answer</b></u>
      <ul>
         <b>Syntax:</b> "&lt;text&gt;"<br />
         <b>Use:</b> Makes the NPC say a text. ( more than one is possible, in that case the spoken one is chosen randomly )<br />
         <b>Example:</b> "Greetings"
      </ul>
   </li>
   <li>
      <u><b>NPC state</b></u>
      <ul>
         <b>Syntax:</b> state &lt;calculation operator&gt; &lt;value&gt;<br />
         <b>Use:</b> Sets the NPC state to a value<br />
         <b>Example:</b> state+9
      </ul>
   </li>
   <li>
      <u><b>Skill</b></u>
      <ul>
         <b>Syntax:</b> skill( &lt;name of the skillgroup&gt;, &lt;name of the skill&gt; ) &lt;calculation operator&gt; &lt;value&gt;<br />
         <b>Use:</b> Sets a skill of the player to the value<br />
         <b>Example:</b> skill(language,common language)-40
      </ul>
   </li>
   <li>
      <u><b>Attributs</b></u>
      <ul>
         <b>Syntax:</b> attrib( &lt;name of the attribut&gt; ) &lt;calculation operator&gt; &lt;value&gt;<br />
         <b>Use:</b> Sets the attribut to the value<br />
         <b>Example:</b> attrib(strength)=2
      </ul>
   </li>
   <li>
      <u><b>Runes</b></u>
      <ul>
         <b>Syntax:</b> rune( &lt;name of the magic class&gt;, &lt;value of the rune&gt; )<br />
         <b>Use:</b> Teaches the player a rune at the magic class<br />
         <b>Example:</b> rune(druid,3)
      </ul>
   </li>
   <li>
      <u><b>Money</b></u>
      <ul>
         <b>Syntax:</b> money &lt;calculation operator&gt; &lt;value&gt;<br />
         <b>Use:</b> Hands or takes money to or from the player ( in copper coins )<br />
         <b>Example:</b> money+300
      </ul>
   </li>
   <li>
      <u><b>Delete items</b></u>
      <ul>
         <b>Syntax:</b> deleteitem( &lt;ID of the item&gt;, &lt;amount&gt; )<br />
         <b>Use:</b> Deletes the amount of items from the player inventory<br />
         <b>Example:</b> deleteitem(20,10)
      </ul>
   </li>
   <li>
      <u><b>Create items</b></u>
      <ul>
         <b>Syntax:</b> item( &lt;Id of the item&gt;, &lt;amount&gt;, &lt;quality&gt;, &lt;datavalue&gt; )<br />
         <b>Use:</b> Creates the set amount of items.<br />
         <b>Example:</b> item(20,10,333,0)
      </ul>
   </li>
   <li>
      <u><b>Quest state</b></u>
      <ul>
         <b>Syntax:</b> queststatus &lt;calculation operator&gt; &lt;value&gt;<br />
         <b>Use:</b> Sets the quest status to the value ( works only in case the Quest ID is setted )<br />
         <b>Example:</b> queststatus-30
      </ul>
   </li>
   <li>
      <u><b>NPC guilds</b></u>
      <ul>
         <b>Syntax:</b> fraction( &lt;name of the guild&gt; ) &lt;calculation operator&gt; &lt;value&gt;<br />
         <b>Use:</b> Sets the value of a player at an NPC guild to the value<br />
         <b>Example:</b> fraction(salkamar)+90
      </ul>
   </li>
   <li>
      <u><b>NPC talking state</b></u>
      <ul>
         <b>Syntax:</b> &lt;name of the talking state&gt;<br />
         <b>Use:</b> Makes the character start or stop a conversation. ( works only in case radius is above 0 )<br />
         <b>Example:</b> begin
      </ul>
   </li>
</ul>

<?php insert_go_to_top_link(); ?>
<a id="4"></a>

<h2>Additional</h2>

<ul>
   <li>
      <u><b>%NUMBER</b></u>
      <ul>
         %NUMBER can be written in text triggers, in answers and in consequences
         and conditions with number values ( but Item IDs and rune numbers ).
         %NUMBER in text triggers makes the NPC wait for a number at this
         position in the trigger. %NUMBER in all other conditions and
         consequences is replaced with the number the player said.
      </ul>
   </li>
   <li>
      <u><b>Expressions</b></u>
      <ul>
         expr( expression ) offers the possibility to do calculations. It can
         be used everywhere where %NUMBER can be used as well, but in texts.
         In the expressions %NUMBER can be used as well.
      </ul>
   </li>
</ul>

<?php insert_go_to_top_link(); ?>

<?php include_footer(); ?>