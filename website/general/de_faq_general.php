<?php
include ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
Page::setTitle( 'FAQ' );
Page::setDescription( 'Frequently asked questions and answers relevant to the game of Illarion.' );
Page::setKeywords( array( 'FAQ, Questions, General' ) );
Page::Init();
?>

<h1>Allgemeine FAQ</h1>

	<h2>Aller Anfang ist schwer</h2>

<ul>
    <li><a class="hidden" href="#gs1">Was für eine Art Spiel ist Illarion?</a></li>
	<li><a class="hidden" href="#gs2">Wieviel kostet Illarion? Gibt es eine Monatsgebühr oder einen Itemshop?</a></li>
	<li><a class="hidden" href="#gs3">Was sind die Systemanforderungen von Illarion?</a></li>
	<li><a class="hidden" href="#gs4">Was brauche ich, um spielen zu können?</a></li>
	<li><a class="hidden" href="#gs5">Wo kann ich das Spiel herunterladen?</a></li>
	<li><a class="hidden" href="#gs6">Wie logge ich mich ein?</a></li>
    <li><a class="hidden" href="#gs7">Aus welchen Völkern und Klassen kann ich wählen?</a></li>
	<li><a class="hidden" href="#gs8">Welche Attribute sollte ich wählen?</a></li>
	<li><a class="hidden" href="#gs9">Ich habe eine technisches Problem. Wo kann ich Hilfe bekommen?</a></li>
</ul>

	<h2>Die ersten Schritte in Illarion</h2>

<ul>
	<li><a class="hidden" href="#fs1">Ich habe gerade mit dem Spiel angefangen und weiß nicht, was ich tun soll!</a></li>
	<li><a class="hidden" href="#fs2">Wie kann ich jemanden angreifen und töten?</a></li>
	<li><a class="hidden" href="#fs3">Wie hebe ich Dinge auf?</a></li>
	<li><a class="hidden" href="#fs4">Wie kann ich Ausrüstung benutzen oder anlegen?</a></li>
	<li><a class="hidden" href="#fs5">Wie funktionieren Handwerke in diesem Spiel? Wie kann ich Gegenstände reparieren?</a></li>
	<li><a class="hidden" href="#fs6">Und was ist mit Magie? Wie zaubere ich?</a></li>
	<li><a class="hidden" href="#fs7">Welches Reich sollte ich wählen?</a></li>
	<li><a class="hidden" href="#fs8">Gibt es im Spiel Lagerplätze?</a></li>
	<li><a class="hidden" href="#fs9">Ich bin gestorben! Wie kann ich mich wiederbeleben? Gibt es eine Bestrafung für den Tod?</a></li>
</ul>

	<h2>Das Spielkonzept</h2>

<ul>
	<li><a class="hidden" href="#gc1">Was ist ein Rollenspiel und was ist das Besondere an Illarion?</a></li>
	<li><a class="hidden" href="#gc2">Was sind CMs und GMs?</a></li>
	<li><a class="hidden" href="#gc3">Warum sprechen die alle so komisch?</a></li>
	<li><a class="hidden" href="#gc4">Wo sehe ich die Werte eines Gegenstandes?</a></li>
	<li><a class="hidden" href="#gc5">Woher weiß ich meine genauen Fertigkeitswerte?</a></li>
	<li><a class="hidden" href="#gc6">Wie kann ich anderen Spielern im Spiel eine Botschaft zukommen lassen?</a></li>
	<li><a class="hidden" href="#gc7">Das Spiel hat Steuern von mir eingetrieben! Was soll das?</a></li>
	<li><a class="hidden" href="#gc8">Wie finde ich meinen Rang in meiner Fraktion heraus?</a></li>
	<li><a class="hidden" href="#gc9">Ich habe davon gelesen, dass Illarion ein besonderes Fertigkeitensystem mit 'mentaler Kapazität' hat. Was ist das alles?</a></li>	
</ul>
	
	<h2>Illarion unterstützen</h2>

<ul>
	<li><a class="hidden" href="#co1">Ich habe gelesen, dass Illarion 'Open Source' ist. Was bedeutet das?</a></li>
	<li><a class="hidden" href="#co2">Ich habe einen Fehler gefunden oder habe einen Vorschlag. Wie melde ich sowas?</a></li>
	<li><a class="hidden" href="#co3">Können Spieler Bücher, NPCs oder sogar Quests selber schreiben?</a></li>
	<li><a class="hidden" href="#co4">Wie kann ich Illarion helfen? Was muss ich können?</a></li>
	<li><a class="hidden" href="#co5">Welche Features sind für die Zukunft noch geplant?</a></li>
</ul>

<?php insert_go_to_top_link(); ?>
<br />

	<h2>Aller Anfang ist schwer</h2>

<ul>
	<li class="question"><a id="gs1"></a><strong>Was für eine Art Spiel ist Illarion?</strong></li>

		<p>Illarion is a free online roleplaying game. It features a high fantasy setting of dragons, elves and magic. Roleplaying is not optional but the very core of this game. It is independently developed ("indie game") by volunteers who share the passion to provide a truly free roleplaying game for players from all around the world. Illarion is not about grinding for levels or gold coins but about immersion, friendship and epic tales, to be written by the deeds of the characters of the game.</p>
		
	<li class="question"><a id="gs2"></a><strong>Wieviel kostet Illarion? Gibt es eine Monatsgebühr oder einen Itemshop?</strong></li>
		
		<p>Illarion is completely free. You have the guarantee that you will never have to pay a cent for this game. There are no premium items nor an item shop. Illarion is run a non profit organisation called <a href="http://illarion.org/community/us_society.php">Illarion e.V.</a>. If you want, you can support the work of the <a href="http://illarion.org/community/us_society.php">society</a> by a voluntary <a href="http://illarion.org/community/us_society.php">donation</a> or by becoming a supporting member.</p>
		
	<li class="question"><a id="gs3"></a><strong>Was sind die Systemanforderungen von Illarion?</strong></li>

	    <p>Illarion is a cross platform game that runs on Windows, Linux and MacOS. You can review the system requirements on the <a href="http://illarion.org/illarion/us_java_download.php">download page of the website</a>. You will need a computer with a graphics adapter that supports Shaders 2.0 and OpenGL. Einige Betriebssysteme wie Windows Vista unterstützt den freien Grafikstandard OpenGL nicht ohne zusätzliche Treiber. Installiere stets den aktuellen Grafikkartentreiber vom Hersteller der Grafikkarte.</p>

	<li class="question"><a id="gs4"></a><strong>Was brauche ich, um spielen zu können?</strong></li>
		
		<p>To play Illarion, you must first <a href="http://illarion.org/community/account/us_register.php">register an account</a> and create a character. Once these are complete, <a href="http://illarion.org/illarion/us_java_download.php">download</a> the game client. You are then ready to immerse yourself in the world of Illarion!</p>
					
	<li class="question"><a id="gs5"></a><strong>Wo kann ich das Spiel herunterladen?</strong></li>
		
		<p>Illarion kann für viele Betriebssysteme auf der <a href="http://illarion.org/illarion/de_java_download.php">Download-Seite der Homepage</a> heruntergeladen werden. Während des Setups wirst dazu aufgefordert, ein Verzeichnis zu wählen, in dem Charakterdaten gespeichert werden. Es ist ratsam, einen Ordner zu wählen, den du auch wiederfindest.</p>
		
	<li class="question"><a id="gs6"></a><strong>Wie logge ich mich ein?</strong></li>
	
		<p>The setup installs the Illarion launcher that shows the latest news and ingame events. Click on "Play!" to start the game. You have to enter your account name (NOT your character's name) along with your password. Chose one of your characters, you may create up to five characters.</p>
		
	<li class="question"><a id="gs7"></a><strong>Aus welchen Völkern und Klassen kann ich wählen?</strong></li>
	
		<p>Illarion features six playable <a href="http://illarion.org/illarion/races/us_story.php">races</a>: Humans, halflings, dwarves, elves, orcs and lizardmen. You may pick any of them, all come with their traits.</p>
		
		<p>There are no classes in Illarion. You may perform any profession you like and are not limited to one; you can become a true master of a single craft or jack of all trades. Except for magic, you can combine as many skills as you like, only your imagination limits what your characters may become.
		
	<li class="question"><a id="gs8"></a><strong>Welche Attribute sollte ich wählen?</strong></li>
	
		<p>We have prepared typical attribute sets for common playing styles in the account system. As there are no strict classes, you are not bond to them. Each attribute has its use, just hover over the attribute names to get a description. In the end, just pick the attributes that represent your character best. You have the option to change your attributes in the game for a fee.</p>
		
	<li class="question"><a id="gs9"></a><strong>Ich habe eine technisches Problem. Wo kann ich Hilfe bekommen?</strong></li>
		
		<p>There is a dedicated <a href="http://illarion.org/community/forums/index.php">support forum</a> for Illarion. Create a free account and post your questions or just greetings to the other players. Also, you can join the Illarion <a href="http://illarion.org/community/us_chat.php">chat</a> to get in contact with the gamemasters, developers and other players.</p>
		
</ul>

<?php insert_go_to_top_link(); ?>

<br />

	<h2>First Steps Into Illarion</h2>

<ul>
	<li class="question"><a id="fs1"></a><strong>Ich habe gerade mit dem Spiel angefangen und weiß nicht, was ich tun soll!</strong></li>
		
		<p>Ein Tutorium wird dich in den ersten Minuten des Spiels begleiten, anschließend hast du die freie Wahl, was du tun möchtest - werde ein stolzer Ritter, ein frommer Priester, ein fleißiger Handwerker oder ein einfacher Bauer.</p>

	<li class="question"><a id="fs2"></a><strong>Wie kann ich jemanden angreifen und töten?</strong></li>
	
		<p>Du kannst jeden Charakter oder Monster mit einem Rechtsklick angreifen. Bitte beachte, dass obwohl Illarion komplett "Spieler gegen Spieler" (PvP) ist, es nur zulässig ist, einen anderen Charakter anzugreifen, wenn dies im Sinne des Rollenspiels geschieht. Es ist allgemein üblich, seinem Gegenüber die Chance zur Interaktion vor und während eines Kampfes zu geben. Emotes die zeigen, wie dein Charakter eine Waffe zieht und bedrohlich auf seinen Gegner zustürmt, sind sehr gerne gesehen.</p>
		

	<li class="question"><a id="fs3"></a><strong>Wie hebe ich Dinge auf?</strong></li>
		
		<p>Drücke 'P', um alle Gegenstände in der Nähe aufzuheben. Alternativ kannst du Gegenstände auch wie Icons auf dem Windows/Linux/MacOS-Desktop per "drag and drop" auf einen freien Platz in deinem Inventar ziehen. Dein Inventar besteht aus der Kleidung deines Charakters, dem Gürtel (die sechs Slots unter der Kleidung/Rüstung) und einer Tasche. Wenn du eine Tasche verwenden willst muss sie angelegt sein und geöffnet werden. Wenn du die Tasche deines Charakters öffnen willst, so kannst du dies per Doppelklick oder mit der Taste 'B' tun.</p>

		
	<li class="question"><a id="fs4"></a><strong>Wie kann ich Ausrüstung benutzen oder anlegen?</strong></li>
		
		<p>Um einen Gegenstand anzulegen, drücke 'I' um das Inventar zu öffnen und ziehe den Gegenstand in einen freien Slot im Inventar. Wenn du mit dem Mauszeiger über dem Slot verweilst, wird angezeigt, was man hier ablegen kann. Ein Slot muss frei sein, um etwas neues reinzulegen. Ziehe hierzu den Gegenstand, der sich im Slot befindet, z.B. in die Tasche deines Charakters. Verfahre so mit Waffen, Rüstungen oder was auch immer dein Charakter anhat. Wenn du einen Gegenstand benutzen möchtest (z.B. einen Apfel essen), so kannst du dies per Doppelklick tun.</p>

	<li class="question"><a id="fs5"></a><strong>Wie funktionieren Handwerke in diesem Spiel? Wie kann ich Gegenstände reparieren?</strong></li>
		
		<p>Crafting generally consists of three steps: Gathering of raw materials such as ores, producing intermediate items such as ingots and crafting final items that can be used such as swords. For each step, you need dedicated tools and locations, e.g. you will need to use a pick axe in a mine to mine ores and a hammer and anvil to forge a sword. Almost every item in this game can be crafted by players and crafting can be a lot of fun, taking into account the vast variety of crafts, resources and products.</p>
		
		<p>Repairing items is done by dedicated NPCs, though. You can find one in each major city. They charge a fee for their services, but repairing is usually more cheap than buying a new item from a NPC.</p>

	<li class="question"><a id="fs6"></a><strong>Und was ist mit Magie? Wie zaubere ich?</strong></li>
		
		<p>As of now, alchemy is available to players. By brewing powerful potions, you can strengthen yourself and your comrades. To become an alchemist, you need to find a magical place in the wilderness. Later, we will add arcane magic and divine magic to the game.</p>
		
	<li class="question"><a id="fs7"></a><strong>Welches Reich sollte ich wählen?</strong></li>
		
		<p>The land Illarion is divided between three factions: <a href="http://illarion.org/illarion/us_factions.php#2">Wealthy Galmair</a>, <a href="http://illarion.org/illarion/us_factions.php#1">noble Cadomyr</a> and <a href="http://illarion.org/illarion/us_factions.php#3">wise Runewick</a>. Just pick the faction that fits the motives of your character best. You can revise your decisions later in the game or even become an outlaw.</p>
		
	<li class="question"><a id="fs8"></a><strong>Gibt es im Spiel Lagerplätze?</strong></li>
		
		<p>Ja. Das Spiel hat ein "Depotsystem". Diese gelben Lagerkisten stehen an wichtigen Plätzen der Städte. Um sie zu verwenden stelle dich neben sie und "öffne" sie mit einem Doppelklick. Per "Drag and Drop" kannst du Gegenstände im Depot ablegen. Beachte, dass das Depotsystem einer Stadt nur in dieser Stadt verfügbar ist.</p>
		
	<li class="question"><a id="fs9"></a><strong>Ich bin gestorben! Wie kann ich mich wiederbeleben? Gibt es eine Bestrafung für den Tod?</strong></li>
		
		<p>A dead character is automatically revived at the city of their chosen faction after one minute. No skills or items are lost but the equipment takes damage. However, a recently revived character suffers from 'resurrection sickness'. This severely weakens them, making it difficult to immediately return to combat. Resurrection sickness is temporary, and will be cured by refraining from combat until a character is healthy again.</p>
		
</ul>

<?php insert_go_to_top_link(); ?>
<br />

	<h2>Game Concepts</h2>

<ul>
	<li class="question"><a id="gc1"></a><strong>Was ist ein Rollenspiel und was ist das Besondere an Illarion?</strong></li>
	
		<p>Rollenspiele (RPG) sind recht beliebte Spiele, bei denen Spieler die Rolle eines erdachten Charakters übernehmen und Taten vollbringen, die ihnen im wahren Leben vielleicht gar nicht möglich wären. Illarion treibt das Konzept Rollenspiel, verglichen mit anderen Spielen, auf die Spitze. Die Spieler sind angehalten, sich in das Leben ihrer Charaktere hineinzuversetzen. Im Spiel bist du nicht Max Mustermann aus Dingenskirchen sondern übernimmst die Rolle eines erdachten Charakters, inklusive seiner Gefühle, Sprache und Gedanken. Illarion ist eine mittelalterliche Fantasy-Welt ohne Strom, Autos, Fernseher oder Akkuschrauber. Im Spiel solltest du davon absehen, außerhalb deiner Rolle (Out of Character, OOC) zu spielen.</p>
		

	<li class="question"><a id="gc2"></a><strong>Was sind CMs und GMs?</strong></li>
	
		<p>A CM is a Community Manager. Their role is to assist new players and help resolve issues or conflicts between players. They should be the first people to turn to in the event of a non-technical issue. A GM is a Game Master. The GMs provide dynamic content (quests, events, etc) as well as upholding the rules of Illarion.</p>
		

	<li class="question"><a id="gc3"></a><strong>Warum sprechen die alle so komisch?</strong></li>
		
		<p>Illarion wird von Spielern aus der ganzen Welt gespielt. Es ist somit naheliegend, dass sie nicht alle die gleiche Sprache sprechen. Englisch und Deutsch sind die am häufigsten anzutreffenden Sprachen und es ist ein Gebot der Höflichkeit, gegenüber anderen Spielern eine Sprache zu verwenden, die sie verstehen. Es können auch Mundarten verwendet werden. Viele Spieler versuchen, ihren Charakter mittelalterlich klingen zu lassen ohne dabei aber Altdeutsch zu verwenden, was eh niemand verstehen würde. Abkürzungen und "Chat Slang" sind ungerne gesehen. Nimm dir die Zeit und verwende Großbuchstaben und korrekte Zeichensetzung. Gutes Beispiel: "Seid gegrüßt, edler Herr. Dürfte ich eure Aufmerksamkeit auf dieses bestens gefertigte Schwert ziehen, welches ich zu einem angemessenen Preis veräußern würde?"</p>
		

	<li class="question"><a id="gc4"></a><strong>Wo sehe ich die Werte eines Gegenstandes?</strong></li>

		<p>Hovering your mouse over the item will provide details on an item name, its level and skill requirement, value, weight, quality and durability. As Illarion is not a game about numbers but about immersion and stories told, detailled technical stats are not shown. For weapons and armours, you can derive the use directly from the shown level.</p>	

	<li class="question"><a id="gc5"></a><strong>Woher weiß ich meine genauen Fertigkeitswerte?</strong></li>

		<p>Press 'C' to review your character's skills. The bars for each skill represent how far you are away from the next level up. Skills range from 1-100, from a novice to a true grandmaster.</p>	

	<li class="question"><a id="gc6"></a><strong>Wie kann ich anderen Spielern im Spiel eine Botschaft zukommen lassen?</strong></li>
	
		 <p>Um vom eigentlichen Spiel nicht allzusehr abzulenken, befindet sicher der <a href="http://illarion.org/community/de_chat.php">globale Chat</a> auf der Homepage. Mächtige Magier können eines Tages die Kraft der Telepathie nutzen. Wenn du Neuigkeiten verbreiten willst, bezahle doch einen anderen Spieler als Boten oder benutze das <a href="http://illarion.org/community/forums/index.php">Forum</a> um einen Anschlag an der Stadtmauer zu verfassen.</p>
		
	<li class="question"><a id="gc7"></a><strong>Das Spiel hat Steuern von mir eingetrieben! Was soll das?</strong></li>
	
		<p>Every citizen from one of the three major factions is charged taxes. These are 1% of a character's total currency, collected once an ingame month. These are used to pay for town services such as protection, infrastructure upkeep, etc. In addition, generous faction leaders have also been known to reward loyal tax-payers with magical gemstones.</p>	
		
	<li class="question"><a id="gc8"></a><strong>Wie finde ich meinen Rang in meiner Fraktion heraus?</strong></li>
	
		<p>In each city, there is a notary NPC who can tell you your rank. The higher your rank, the more well known you are to your faction leader and also, the more advanced your are in his or her favour.</p>	
		
	<li class="question"><a id="gc9"></a><strong>Ich habe davon gelesen, dass Illarion ein besonderes Fertigkeitensystem mit 'mentaler Kapazität' hat. Was ist das alles?</strong></li>
	
		<p>Illarion's skill system is based on "learning by doing", there are no skills points you have to allocate. As your character practices certain actions, they begin to improve. For example, over time your character may develop from an apprentice smith to a master, allowing them to create a larger variety of items at a higher quality. A character may also develop combat skills, improving their ability to weild more advanced weapons or wear exotic armor. </p>	
		
		<p>The Mental Capacity refers to a character's ability to focus while improving. The more actions you do over time, the less you learn from each action. This way, it is on you how much time you want to invest on training your skills, the result after a given time will be the same. A character can reverse a 'high' degree of mental fatigue by performing tasks which are not skill-dependant such as talking to other characters and exploring. We have designed the skill system in this way to give players the opportunity to roleplay or train as much as they want without one style of playing being favoured by the game.</p>
		
</ul>
<?php insert_go_to_top_link(); ?>
<br />

<ul>
	
	<li class="question"><a id="co1"></a><strong>Ich habe gelesen, dass Illarion 'Open Source' ist. Was bedeutet das?</strong></li>
	
		<p>Illarion is a free game, not just in terms of cost, but also in terms of free code. The sources of the Java software (client and development tools) are released
		under <a href="http://www.gnu.org/licenses/gpl-3.0">GPLv3</a>. The sources of server, scripts and maps are released under <a href="http://www.gnu.org/licenses/agpl-3.0">AGPLv3</a>.
		These sources are thus <a href="http://illarion.org/development/us_opensource.php">available for public review</a> and usage.</p>
		
	<li class="question"><a id="co2"></a><strong>Ich habe einen Fehler gefunden oder habe einen Vorschlag. Wie melde ich sowas?</strong></li>
		
		<p>Am besten benutzt du zum Melden von Fehlern oder Vorschlägen den <a href="http://illarion.org/mantis/index.php">Mantis Bugtracker</a>. Dies ist das Fehlerverwaltungssystem der Entwickler. Du kannst ebenso Fehler und Vorschläge am <a href="http://illarion.org/community/forums/index.php">Forums</a> schreiben, allerdings besteht die Chance, dass sie dort von den Entwicklern nicht sofort gesehen werden.<p>

	<li class="question"><a id="co3"></a><strong>Können Spieler Bücher, NPCs oder sogar Quests selber schreiben?</strong></li>
	
		<p>Yes. Illarion appreciated all player made content and gives the players the opportunity to shape the world. <a href="http://illarion.org/community/us_contact.php#4">Contact a developer</a> and read the <a href="http://illarion.org/development/us_content_tutorial.php">development tutorial</a> for starters.</p>
		
	<li class="question"><a id="co4"></a><strong>Wie kann ich Illarion helfen? Was muss ich können?</strong></li>
	
		<p>Illarion kann man auf vielerlei Arten unterstützen. You could support the <a href="http://illarion.org/community/us_society.php">Illarion e.V. society</a>, assist with the <a href="http://illarion.org/development/de_content_tutorial.php">Entwicklung des Spieles</a> or help to <a href="http://illarion.org/community/forums/viewforum.php?f=77">promote the game</a> on external sites. Also tell your friends about Illarion!</p>
		
		<p>If you have advanced skills in Java, C++, LUA, PHP or creating 3D graphics, you might want to contact one of the <a href="http://illarion.org/community/us_contact.php#4">lead developers</a> to get involved in the development of Illarion. Please note that Illarion is a non profit project and hence, no compensation can be paid for your work.
		
	<li class="question"><a id="co5"></a><strong>Welche Features sind für die Zukunft noch geplant?</strong></li>
	
		<p>Illarion's development follows six clearly specified <a href="http://illarion.org/development/de_progress.php">Meilensteinen</a>. Those milestones stand for a state of the game that does not require any future reworking on existing features. Crafting and fighting shall be reworked and more types of magic will be added to the game. Also, we'll add unique features to the game no other game can offer to enhance the immersion.</p>
	
</ul>

<?php insert_go_to_top_link(); ?>
<BR />
<?php include_footer(); ?>
