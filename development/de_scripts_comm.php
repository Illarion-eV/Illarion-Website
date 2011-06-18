<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - Scripteditor Befehle",
                  "Diese Seite enh&auml;lt alle Befehle die der Scriptparser f&uuml;r".
                  " NPC-Scripte versteht.",
                  "Scripte, NPCs, eigene Quests, npc, programmieren" );
   include_header();
?>

<h1>NPC - Scriptbefehle</h1>

<h2>&Uuml;bersicht</h2>

<ul>
   <li><a href="#1">Generelle Befehle</a></li>
   <li><a href="#2">Bedingungen</a></li>
   <li><a href="#3">Folgen</a></li>
   <li><a href="#4">Zus&auml;tzliches</a></li>
</ul>

<?php insert_go_to_top_link(); ?>
<a id="1"></a>

<h2>Generelle Befehle</h2>

<ul>
   <li>
      <u><b>Name</b></u>
      <ul>
         <b>Syntax:</b> name="&lt;Name des NPCs&gt;"<br />
         <b>Funktion:</b> Legt den Namen des NPCs fest<br />
         <b>Beispiel:</b> name="Augham"
      </ul>
   </li>
   <li>
      <u><b>Position</b></u>
      <ul>
         <b>Syntax:</b> position=&lt;x&gt;, &lt;y&gt;, &lt;z&gt;<br />
         <b>Funktion:</b> Legt die Position auf der der NPC steht fest<br />
         <b>Beispiel:</b> position=-81,-151,0
      </ul>
   </li>
   <li>
      <u><b>Geschlecht</b></u>
      <ul>
         <b>Syntax:</b> sex=&lt;Geschlecht&gt;<br />
         <b>Funktion:</b> Legt das Geschlecht des NPCs fest ( male, female )<br />
         <b>Beispiel:</b> sex=male
      </ul>
   </li>
   <li>
      <u><b>Rasse</b></u>
      <ul>
         <b>Syntax:</b> race=&lt;Rasse&gt;<br />
         <b>Funktion:</b> Legt die Rasse des NPCs fest ( human, dwarf, ... )<br />
         <b>Beispiel:</b> race=human
      </ul>
   </li>
   <li>
      <u><b>Richtung</b></u>
      <ul>
         <b>Syntax:</b> direction=&lt;Richtung&gt;<br />
         <b>Funktion:</b> Legt die Richtung fest in die der NPC am Anfang blickt ( north, east, ... )<br />
         <b>Beispiel:</b> direction=west
      </ul>
   </li>
   <li>
      <u><b>Bewegungsradius</b></u>
      <ul>
         <b>Syntax:</b> radius=&lt;Bewegungsratius&gt;<br />
         <b>Funktion:</b> Legt die Gr&ouml;&szlig;e des Bewegungsradius eines NPCs fest<br />
         <b>Beispiel:</b> radius=4
      </ul>
   </li>
   <li>
      <u><b>Automatischer Text</b></u>
      <ul>
         <b>Syntax:</b> cycletext "&lt;deutscher Text&gt;","&lt;englischer Text&gt;"<br />
         <b>Funktion:</b> Legt den Text fest den der NPC in gewissen Abst&auml;nden automatisch sagt<br />
         <b>Beispiel:</b> cycletext "#me sieht sich um","#me looks around"
      </ul>
   </li>
   <li>
      <u><b>Quest ID</b></u>
      <ul>
         <b>Syntax:</b> questid=&lt;Quest ID&gt;<br />
         <b>Funktion:</b> Legt die Quest ID fest die der NPC verwendet ( Bitte einen Entwickler fragen welche ID verwendet werden kann )<br />
         <b>Beispiel:</b> questid=558
      </ul>
   </li>
   <li>
      <u><b>Kommentar</b></u>
      <ul>
         <b>Syntax:</b> --&lt;Kommentartext&gt;<br />
         <b>Funktion:</b> F&uuml;gt einen Kommentar in das Script ein<br />
         <b>Beispiel:</b> -- Hier f&auml;ngt ein tolles NPC Script an
      </ul>
   </li>
</ul>

<?php insert_go_to_top_link(); ?>
<a id="2"></a>

<h2>Bedingungen</h2>

<ul>
   <li>
      <u><b>Textausl&ouml;ser</b></u>
      <ul>
         <b>Syntax:</b> "&lt;Text&gt;"<br />
         <b>Funktion:</b> Legt den Text fest, den der Spieler sagen muss um eine Reaktion von dem NPC zu bewirken ( mehrere m&ouml;glich )<br />
         <b>Beispiel:</b> "hallo"
      </ul>
   </li>
   <li>
      <u><b>NPC Status</b></u>
      <ul>
         <b>Syntax:</b> state &lt;Vergleichsoperator&gt; &lt;Wert&gt;<br />
         <b>Funktion:</b> &Uuml;berpr&uuml;ft den NPC Status auf einen bestimmten Wert<br />
         <b>Beispiel:</b> state&gt;=5
      </ul>
   </li>
   <li>
      <u><b>Skill</b></u>
      <ul>
         <b>Syntax:</b> skill(&lt;Skillname&gt;) &lt;Vergleichsoperator&gt; &lt;Wert&gt;<br />
         <b>Funktion:</b> &Uuml;berpr&uuml;ft den angegebenen Skill auf einen bestimmten Wert<br />
         <b>Beispiel:</b> skill(slashing weapons)=&lt;40
      </ul>
   </li>
   <li>
      <u><b>Attribute</b></u>
      <ul>
         <b>Syntax:</b> attrib(&lt;Name des Attributs&gt;) &lt;Vergleichsoperator&gt; &lt;Wert&gt;<br />
         <b>Funktion:</b> &Uuml;berpr&uuml;ft das angegebene Attribut auf einen bestimmten Wert<br />
         <b>Beispiel:</b> attrib(essence)&lt;&gt;10
      </ul>
   </li>
   <li>
      <u><b>Runen</b></u>
      <ul>
         <b>Syntax:</b> rune(&lt;Magieklasse&gt;, &lt;Nummer der Rune&gt;)<br />
         <b>Funktion:</b> &Uuml;berpr&uuml;ft ob der Charakter eine bestimmte Rune einer bestimmten Magieklasse hat<br />
         <b>Beispiel:</b> rune(mage, 8)
      </ul>
   </li>
   <li>
      <u><b>Geld</b></u>
      <ul>
         <b>Syntax:</b> money &lt;Vergleichsoperator&gt; &lt;Wert&gt;<br />
         <b>Funktion:</b> &Uuml;berpr&uuml;ft ob ein Charakter genug Geld hat ( in Kupferm&uuml;nzen )<br />
         <b>Beispiel:</b> money&lt;8
      </ul>
   </li>
   <li>
      <u><b>Rasse</b></u>
      <ul>
         <b>Syntax:</b> race = &lt;Name der Rasse&gt;<br />
         <b>Funktion:</b> &Uuml;berpr&uuml;ft ob der Charakter einer bestimmten Rasse angeh&ouml;rt<br />
         <b>Beispiel:</b> race=human
      </ul>
   </li>
   <li>
      <u><b>Queststatus</b></u>
      <ul>
         <b>Syntax:</b> queststatus &lt;Vergleichsoperator&gt; &lt;Wert&gt;<br />
         <b>Funktion:</b> &Uuml;berpr&uuml;ft welchen Wert der Queststatus hat ( funktioniert nur wenn Quest ID gesetzt wurde )<br />
         <b>Beispiel:</b> queststatus&gt;20
      </ul>
   </li>
   <li>
      <u><b>Items</b></u>
      <ul>
         <b>Syntax:</b> item( &lt;ID des Items&gt;, &lt;Position des Items&gt; ) &lt;Vergleichsoperator&gt; &lt;Wert&gt;<br />
         <b>Funktion:</b> &Uuml;berpr&uuml;ft ob der Charakter eine bestimmte Anzahl eines Items hat<br />
         <b>Beispiel:</b> item(4,belt)=10
      </ul>
   </li>
   <li>
      <u><b>Spielersprache</b></u>
      <ul>
         <b>Syntax:</b> &lt;Name der Sprache&gt;<br />
         <b>Funktion:</b> &Uuml;berpr&uuml;ft welche Sprache der Spieler, der mit dem NPC unterh&auml;lt, spricht<br />
         <b>Beispiel:</b> german
      </ul>
   </li>
   <li>
      <u><b>Zufallsgenerator</b></u>
      <ul>
         <b>Syntax:</b> chance( &lt;Wert&gt; )<br />
         <b>Funktion:</b> F&uuml;hrt einen Zufallswurf dessen Erfolg in % mit &lt;Wert&gt; festgelegt wird<br />
         <b>Beispiel:</b> chance(40)
      </ul>
   </li>
   <li>
      <u><b>Charaktergeschlecht</b></u>
      <ul>
         <b>Syntax:</b> &lt;Name des Geschlechts&gt;<br />
         <b>Funktion:</b> &Uuml;berpr&uuml;ft ob der Charakter das angegebene Geschlecht hat<br />
         <b>Beispiel:</b> male
      </ul>
   </li>
   <li>
      <u><b>Charakter Gespr&auml;chsstatus</b></u>
      <ul>
         <b>Syntax:</b> &lt;Name des Gespr&auml;chsstatus&gt;<br />
         <b>Funktion:</b> &Uuml;berpr&uuml;ft ob der Charakter in einem Gespr&auml;ch mit einem anderen Charakter ist oder nicht ( Funktioniert nur wenn Radius &gt; 0 )<br />
         <b>Beispiel:</b> idle
      </ul>
   </li>
   <li>
      <u><b>NPC Gildenstatus</b></u>
      <ul>
         <b>Syntax:</b> fraction( &lt;Name der Gilde&gt; ) &lt;Vergleichsoperator&gt; &lt;Wert&gt;<br />
         <b>Funktion:</b> &Uuml;berpr&uuml;ft welchen Wert der Spieler bei einer bestimmten NPC Gilde hat<br />
         <b>Beispiel:</b> fraction(albar)=9
      </ul>
   </li>
   <li>
      <u><b>Vom Spieler gesagte Zahl</b></u>
      <ul>
         <b>Syntax:</b> %NUMBER &lt;Vergleichsoperator&gt; &lt;Wert&gt;<br />
         <b>Funktion:</b> &Uuml;berpr&uuml;ft welche Zahl ein Spieler zu dem NPC gesagt hat<br />
         <b>Beispiel:</b> %NUMBER&lt;&gt;9
      </ul>
   </li>
</ul>

<?php insert_go_to_top_link(); ?>
<a id="3"></a>

<h2>Folgen</h2>

<ul>
   <li>
      <u><b>Textantwort</b></u>
      <ul>
         <b>Syntax:</b> "&lt;Text&gt;"<br />
         <b>Funktion:</b> L&auml;sst den NPC einen bestimmten Text sagen ( wenn mehrere gesetzt sind wird ein zuf&auml;lliger ausgew&auml;hlt )<br />
         <b>Beispiel:</b> "Gr&uuml;&szlig;e euch"
      </ul>
   </li>
   <li>
      <u><b>NPC Status</b></u>
      <ul>
         <b>Syntax:</b> state &lt;Rechenoperator&gt; &lt;Wert&gt;<br />
         <b>Funktion:</b> Setzt den NPC Status auf einen bestimmten Wert<br />
         <b>Beispiel:</b> state+9
      </ul>
   </li>
   <li>
      <u><b>Skill</b></u>
      <ul>
         <b>Syntax:</b> skill( &lt;Name der Skillgruppe&gt;, &lt;Name des Skills&gt; ) &lt;Rechenoperator&gt; &lt;Wert&gt;<br />
         <b>Funktion:</b> Setzt einen Skill auf einen bestimmten Wert<br />
         <b>Beispiel:</b> skill(language,common language)-40
      </ul>
   </li>
   <li>
      <u><b>Attribute</b></u>
      <ul>
         <b>Syntax:</b> attrib( &lt;Name des Attributs&gt; ) &lt;Rechenoperator&gt; &lt;Wert&gt;<br />
         <b>Funktion:</b> Setzt ein Attribut auf einen bestimmten Wert<br />
         <b>Beispiel:</b> attrib(strength)=2
      </ul>
   </li>
   <li>
      <u><b>Runen</b></u>
      <ul>
         <b>Syntax:</b> rune( &lt;Name der Magieklasse&gt;, &lt;Nummer der Rune&gt; )<br />
         <b>Funktion:</b> Bringt dem Spieler eine bestimmte Rune bei<br />
         <b>Beispiel:</b> rune(druid,3)
      </ul>
   </li>
   <li>
      <u><b>Geld</b></u>
      <ul>
         <b>Syntax:</b> money &lt;Rechenoperator&gt; &lt;Wert&gt;<br />
         <b>Funktion:</b> Gibt oder nimmt dem Spieler Geld ( in Kupfer )<br />
         <b>Beispiel:</b> money+300
      </ul>
   </li>
   <li>
      <u><b>Items l&ouml;schen</b></u>
      <ul>
         <b>Syntax:</b> deleteitem( &lt;ID des Items&gt;, &lt;Anzahl&gt; )<br />
         <b>Funktion:</b> L&ouml;scht eine bestimmte Anzahl von Items aus dem Spielerinventar<br />
         <b>Beispiel:</b> deleteitem(20,10)
      </ul>
   </li>
   <li>
      <u><b>Items erstellen</b></u>
      <ul>
         <b>Syntax:</b> item( &lt;ID des Items&gt;, &lt;Anzahl&gt;, &lt;Qualit&auml;t&gt;, &lt;Datawert&gt; )<br />
         <b>Funktion:</b> Erstellt eine festgelegte Anzahl Items im Spielerinventar<br />
         <b>Beispiel:</b> item(20,10,333,0)
      </ul>
   </li>
   <li>
      <u><b>Queststatus</b></u>
      <ul>
         <b>Syntax:</b> queststatus &lt;Rechenoperator&gt; &lt;Wert&gt;<br />
         <b>Funktion:</b> Setzt den Queststatus auf einen bestimmten Wert ( funktioniert nur wenn QuestID gesetzt ist )<br />
         <b>Beispiel:</b> queststatus-30
      </ul>
   </li>
   <li>
      <u><b>NPC Gilden</b></u>
      <ul>
         <b>Syntax:</b> fraction( &lt;Name der Gilde&gt; ) &lt;Rechenoperator&gt; &lt;Wert&gt;<br />
         <b>Funktion:</b> Setzt den Status des Spielers bei einer bestimmten Gilde auf einen festgelegten Wert<br />
         <b>Beispiel:</b> fraction(salkamar)+90
      </ul>
   </li>
   <li>
      <u><b>NPC Gespr&auml;chsstatus</b></u>
      <ul>
         <b>Syntax:</b> &lt;Name des Gespr&auml;chsstatus&gt;<br />
         <b>Funktion:</b> Bewirkt das ein NPC ein Gespr&auml;ch beginnt oder beendet ( hat nur einen Effekt wenn Radius &gt; 0 )<br />
         <b>Beispiel:</b> begin
      </ul>
   </li>
</ul>

<?php insert_go_to_top_link(); ?>
<a id="4"></a>

<h2>Zus&auml;tzliches</h2>

<ul>
   <li>
      <u><b>%NUMBER</b></u>
      <ul>
         %NUMBER kann sowohl in den Textausl&ouml;sern, den Antworten und auch bei
         Bedingungen und Folgen die Zahlwerte ( nicht ItemIDs oder Runennummern
         ) verwenden eingesetzt werden. %NUMBER im Textausl&ouml;ser sorgt daf&uuml;r, dass der NPC an dieser
         Stelle erwartet, dass der Spieler eine Zahl sagt. %NUMBER wird immer mit
         der Zahl ersetzt die der Spieler gesagt hat. Aber nur in der einen
         Anweisungszeile in der %NUMBER im Textausl&ouml;ser steht.
      </ul>
   </li>
   <li>
      <u><b>Rechenausdr&uuml;cke</b></u>
      <ul>
         expr( Ausdruck ) erm&ouml;glicht Rechnungen &uuml;berall da, wo auch
         %NUMBER verwendet werden kann <b>au&szlig;er</b> in Texten. Innerhalb von
         expr( ) ist die Verwendung von %NUMBER ebenso m&ouml;glich.
      </ul>
   </li>
</ul>

<?php insert_go_to_top_link(); ?>

<?php include_footer(); ?>