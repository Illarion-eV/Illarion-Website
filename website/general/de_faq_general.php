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
	<li><a class="hidden" href="#gs9">Ich habe ein technisches Problem. Wo kann ich Hilfe bekommen?</a></li>
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

		<p>Illarion ist ein kostenloses Indie-Rollenspiel, welches seinen Schwerpunkt auf echtes Rollenspiel legt. Alle Charaktere um dich herum werden sich wie lebendige, atmende Wesen dieser eigenständigen, geheimnisvollen Welt verhalten. Jeder Charakter hat eine eigene Vergangenheit, Ziele, Stärken und Schwächen. Rollenspiel ist nicht einfach nur eine Nebensache sondern der Kern des gesamten Spieles. Es wird von Freiwilligen entwickelt, welche das Ziel vereint, ein wirklich kostenloses Rollenspiel für Spieler aus der ganzen Welt zu schaffen. Bei Illarion geht es nicht um das Erarbeiten von Leveln oder Goldstücken sondern um das Eintauchen in eine fremde Welt, Freundschaften und Legenden, welche mit der Feder der Charaktere des Spiels geschrieben werden.</p>
		
	<li class="question"><a id="gs2"></a><strong>Wieviel kostet Illarion? Gibt es eine Monatsgebühr oder einen Itemshop?</strong></li>
		
		<p>Illarion ist vollständig kostenlos. Du wirst garantiert niemals einen Cent für Illarion zahlen müssen. Es gibt keine Premiumitems und keinen Itemshop. Illarion wird von dem nicht gewinnorientierten Verein <a href="<?php echo Page::getURL(); ?>/community/de_society.php">Illarion e.V.</a> betrieben. Wenn du möchtest, kannst du die Arbeit des Vereins mit einer freiwilligen <a href="<?php echo Page::getURL(); ?>/community/de_society.php">Spende</a> unterstützen oder indem du ein Fördermitglied wirst.</p>
		
	<li class="question"><a id="gs3"></a><strong>Was sind die Systemanforderungen von Illarion?</strong></li>

	    <p>Illarion ist ein plattformübergreifendes Spiel, welches auf Windows, Linux und MacOS läuft. Du kannst die Systemanforderungen auf der <a href="<?php echo Page::getURL(); ?>/illarion/de_java_download.php">Downloadseite der Homepage</a> einsehen. Du brauchst vor allem einen Computer mit einer Grafikkarte, die Shaders 2.0 und OpenGL unterstützt. Einige Betriebssysteme wie Windows Vista unterstützen den freien Grafikstandard OpenGL nicht ohne zusätzliche Treiber. Installiere stets den aktuellen Grafikkartentreiber vom Hersteller der Grafikkarte.</p>

	<li class="question"><a id="gs4"></a><strong>Was brauche ich, um spielen zu können?</strong></li>
		
		<p>Um Illarion spielen zu können musst du zuerst einen <a href="<?php echo Page::getURL(); ?>/community/account/de_register.php">Account registrieren</a> und einen Charakter erstellen. Wenn das erledigt ist, lade den <a href="<?php echo Page::getURL(); ?>/illarion/de_java_download.php">Spielclient</a> herunter. Dann bist du bereit in die Welt von Illarion einzutauchen!</p>
					
	<li class="question"><a id="gs5"></a><strong>Wo kann ich das Spiel herunterladen?</strong></li>
		
		<p>Illarion kann für viele Betriebssysteme auf der <a href="<?php echo Page::getURL(); ?>/illarion/de_java_download.php">Download-Seite der Homepage</a> heruntergeladen werden. Während des Setups wirst dazu aufgefordert, ein Verzeichnis zu wählen, in dem Charakterdaten gespeichert werden. Es ist ratsam, einen Ordner zu wählen, den du auch wiederfindest.</p>
		
	<li class="question"><a id="gs6"></a><strong>Wie logge ich mich ein?</strong></li>
	
		<p>Das Setup installiert den Illarion Launcher, der die aktuellsten Nachrichten und Spielereignisse anzeigt. Klicke auf "Spielen!" um das Spiel zu starten. Dann musst du den Namen deines Accounts eingeben (NICHT den deines Charakters!) und dein Passwort. Anschließend kannst du einen von deinen Charaktern auswählen. Du kannst bis zu fünf Charaktere erstellen.</p>
		
	<li class="question"><a id="gs7"></a><strong>Aus welchen Völkern und Klassen kann ich wählen?</strong></li>
	
		<p>In Illarion gibt es sechs spielbare <a href="<?php echo Page::getURL(); ?>/illarion/races/de_races.php">Völker</a>: Menschen, Halblinge, Zwerge, Elfen, Orks und Echsenmenschen. Du kannst jede davon auswählen, alle Völker haben ihre Vorzüge.</p>
		
		<p>Es gibt keine Klassen auf Illarion. Du kannst jeden Beruf ausüben, den du möchtest und bist auch nicht auf einen beschränkt. Du kannst ein echter Meister in einem einzelnen Handwerk werden oder ein Alleskönner.
Abgesehen von Magie kannst du alle Fähigkeiten kombinieren wie du möchtest, nur deine Vorstellungskraft beschränkt was deine Charaktere werden können.</p>
		
	<li class="question"><a id="gs8"></a><strong>Welche Attribute sollte ich wählen?</strong></li>
	
		<p>Wir haben ein paar Sets von Attributen vorbereitet, die typisch sind für die am häufigsten gespielten Arten von Charaktern. Da es keine strikten Klassen gibt bist du allerdings nicht an eines davon gebunden. Jedes Attribut hat seinen Nutzen, fahre einfach mit dem Mauszeiger darüber, um eine Beschreibung zu bekommen. Wähle einfach die Attribute aus, die deinen Charakter am besten beschreiben. Ingame gibt es die Option die Attribute gegen einige Goldstücke zu verändern.</p>
		
	<li class="question"><a id="gs9"></a><strong>Ich habe ein technisches Problem. Wo kann ich Hilfe bekommen?</strong></li>
		
		<p>Es gibt ein genau dafür vorgesehenes <a href="<?php echo Page::getURL(); ?>/community/forums/index.php">Forum</a> für Illarion. Erstelle dir einen kostenlosen Account und poste deine Fragen oder einfach nur deine Grüße an die Spielerschaft. Außerdem kannst du dem <a href="<?php echo Page::getURL(); ?>/community/de_chat.php">Discord-Chat</a> beitreten um mit Gamemastern, Entwicklern und anderen Spielern in Kontakt zu kommen.</p>
		
</ul>

<?php insert_go_to_top_link(); ?>

<br />

	<h2>Die ersten Schritte in Illarion</h2>

<ul>
	<li class="question"><a id="fs1"></a><strong>Ich habe gerade mit dem Spiel angefangen und weiß nicht, was ich tun soll!</strong></li>
		
		<p>Ein Tutorial wird dich in den ersten Minuten des Spiels begleiten, anschließend hast du die freie Wahl, was du tun möchtest - werde ein stolzer Ritter, ein frommer Priester, ein fleißiger Handwerker oder ein einfacher Bauer.</p>

	<li class="question"><a id="fs2"></a><strong>Wie kann ich jemanden angreifen und töten?</strong></li>
	
		<p>Du kannst jeden Charakter oder Monster mit einem Rechtsklick angreifen. Bitte beachte, dass obwohl Illarion komplett "Spieler gegen Spieler" (PvP) ist, es nur zulässig ist, einen anderen Charakter anzugreifen, wenn dies im Sinne des Rollenspiels geschieht. Es ist allgemein üblich, seinem Gegenüber die Chance zur Interaktion vor und während eines Kampfes zu geben. Emotes die zeigen, wie dein Charakter eine Waffe zieht und bedrohlich auf seinen Gegner zustürmt, sind sehr gerne gesehen.</p>
		

	<li class="question"><a id="fs3"></a><strong>Wie hebe ich Dinge auf?</strong></li>
		
		<p>Drücke 'P', um alle Gegenstände in der Nähe aufzuheben. Alternativ kannst du Gegenstände auch wie Icons auf dem Windows/Linux/MacOS-Desktop per "drag and drop" auf einen freien Platz in deinem Inventar ziehen. Dein Inventar besteht aus der Kleidung deines Charakters, dem Gürtel (die sechs Slots unter der Kleidung/Rüstung) und einer Tasche. Wenn du eine Tasche verwenden willst muss sie angelegt sein und geöffnet werden. Wenn du die Tasche deines Charakters öffnen willst, so kannst du dies per Doppelklick oder mit der Taste 'B' tun.</p>

		
	<li class="question"><a id="fs4"></a><strong>Wie kann ich Ausrüstung benutzen oder anlegen?</strong></li>
		
		<p>Um einen Gegenstand anzulegen, drücke 'I' um das Inventar zu öffnen und ziehe den Gegenstand in einen freien Slot im Inventar. Wenn du mit dem Mauszeiger über dem Slot verweilst, wird angezeigt, was man hier ablegen kann. Ein Slot muss frei sein, um etwas neues reinzulegen. Ziehe hierzu den Gegenstand, der sich im Slot befindet, z.B. in die Tasche deines Charakters. Verfahre so mit Waffen, Rüstungen oder was auch immer dein Charakter anhat. Wenn du einen Gegenstand benutzen möchtest (z.B. einen Apfel essen), so kannst du dies per Doppelklick tun.</p>

	<li class="question"><a id="fs5"></a><strong>Wie funktionieren Handwerke in diesem Spiel? Wie kann ich Gegenstände reparieren?</strong></li>
		
		<p>Die Ausübung eines Handwerks besteht generell aus drei Schritten: Dem Sammeln von Rohmaterialien, wie zum Beispiel Erze, dem Produzieren von Zwischenprodukten wie Barren und dem Herstellen der eigentlichen Gegenstände, die dann auch benutzt werden kann, z.B. ein Schwert. Für jeden Schritt brauchst du geeignete Werkzeuge und Orte. Um ein Schwert zu schmieden, musst du zum Beispiel zuerst mit einer Spitzhacke in eine Mine gehen und dort Eisenerze abbauen oder einen Hammer an einem Amboss um ein Schwert aus Eisenbarren herzustellen. Beinahe jeder Gegenstand in diesem Spiel kann von Spielern hergestellt werden und ein Handwerk auszuüben  kann sehr viel Spaß machen, wenn man die enorme Vielfalt an Handwerken, Rohstoffen und Produkten bedenkt.</p>

		<p>Für die Reparatur eines Gegenstands sind dagegen spezielle NPCs zuständig. Davon gibt es einen in jeder größeren Stadt. Sie verlangen einen Entgelt für die Reparatur, doch einen Gegenstand zu reparieren ist im Normalfall billiger als einen neuen von einem NPC zu kaufen.</p>

	<li class="question"><a id="fs6"></a><strong>Und was ist mit Magie? Wie zaubere ich?</strong></li>
		
		<p>Im Moment steht den Spielern die Alchemie offen. Durch das Brauen starker Tränke kannst du dich und deine Freunde stärken. Um ein Alchemist zu werden musst du einen magischen Ort in der Wildnis finden. Später werden wir arkane und göttliche Magie zum Spiel hinzufügen.</p>
		
	<li class="question"><a id="fs7"></a><strong>Welches Reich sollte ich wählen?</strong></li>
		
		<p>Auf Illarion gibt es drei Fraktionen, die das Land unter sich aufgeteilt haben: das <a href="<?php echo Page::getURL(); ?>/illarion/de_factions.php#2">reiche Galmair</a>, das <a href="<?php echo Page::getURL(); ?>/illarion/de_factions.php#1">edle Cadomyr</a> und das <a href="<?php echo Page::getURL(); ?>/illarion/de_factions.php#3">weise Runewick</a>. Wähle einfach das Reich aus, dessen Motive am besten zu deinem Charakter passen. Du kannst dich auch später im Spiel noch umentscheiden oder sogar ein Vogelfreier werden.</p>
		
	<li class="question"><a id="fs8"></a><strong>Gibt es im Spiel Lagerplätze?</strong></li>
		
		<p>Ja. Das Spiel hat ein "Depotsystem". Diese gelben Lagerkisten stehen an wichtigen Plätzen der Städte. Um sie zu verwenden, stelle dich neben sie und "öffne" sie mit einem Doppelklick. Per "Drag and Drop" kannst du Gegenstände im Depot ablegen. Beachte, dass das Depotsystem einer Stadt nur in dieser Stadt verfügbar ist.</p>
		
	<li class="question"><a id="fs9"></a><strong>Ich bin gestorben! Wie kann ich mich wiederbeleben? Gibt es eine Bestrafung für den Tod?</strong></li>
		
		<p>Ein toter Charakter wird automatisch nach einer Minute in der Stadt seines Reich wiederbelebt. Der Charakter verliert beim Tod keine Gegenstände oder Fähigkeiten, nur die Ausüstung nimmt Schaden. Allerdings leidet der Charakter unter der "Wiederbelebungskrankheit". Sie schwächt sehr und macht es schwierig, sich sofort wieder in den Kampf zu stürzen. Dies ist nur ein temporärer Effekt und kann geheilt werden, indem man solange von Kampf fernbleibt, bis sich der Charakter wieder erholt hat.</p>
		
</ul>

<?php insert_go_to_top_link(); ?>
<br />

	<h2>Das Spielkonzept</h2>

<ul>
	<li class="question"><a id="gc1"></a><strong>Was ist ein Rollenspiel und was ist das Besondere an Illarion?</strong></li>
	
		<p>Rollenspiele (RPG) sind recht beliebte Spiele, bei denen Spieler die Rolle eines erdachten Charakters übernehmen und Taten vollbringen, die ihnen im wahren Leben vielleicht gar nicht möglich wären. Illarion treibt das Konzept Rollenspiel, verglichen mit anderen Spielen, auf die Spitze. Die Spieler sind angehalten, sich in das Leben ihrer Charaktere hineinzuversetzen. Im Spiel bist du nicht Max Mustermann aus Dingenskirchen sondern übernimmst die Rolle eines erdachten Charakters, inklusive seiner Gefühle, Sprache und Gedanken. Illarion ist eine mittelalterliche Fantasy-Welt ohne Strom, Autos, Fernseher oder Akkuschrauber. Im Spiel solltest du davon absehen, außerhalb deiner Rolle (Out of Character, OOC) zu spielen.</p>
		

	<li class="question"><a id="gc2"></a><strong>Was sind CMs und GMs?</strong></li>
	
		<p>Ein CM ist ein <a href="<?php echo Page::getURL(); ?>/community/de_contact.php#2">Community-Manager</a>. Ihr Aufgabe ist es, neuen Spielern zu helfen und mögliche Konflikte zwischen Spielern zu schlichten. Sind die ersten, an die du dich wenden solltest, wenn es sich nicht um ein technisches Problem handelt. GM steht für <a href="<?php echo Page::getURL(); ?>/community/de_contact.php#3">Gamemaster</a>. Die GMs tragen dynamische Inhalte (Quests, Events usw.) zum Spiel bei und wachen auch über die Einhaltung der Regeln.</p>
		

	<li class="question"><a id="gc3"></a><strong>Warum sprechen die alle so komisch?</strong></li>
		
		<p>Illarion wird von Spielern aus der ganzen Welt gespielt. Es ist somit naheliegend, dass sie nicht alle die gleiche Sprache sprechen. Englisch und Deutsch sind die am häufigsten anzutreffenden Sprachen und es ist ein Gebot der Höflichkeit, gegenüber anderen Spielern eine Sprache zu verwenden, die sie verstehen. Es können auch Mundarten verwendet werden. Viele Spieler versuchen, ihren Charakter mittelalterlich klingen zu lassen ohne dabei aber Altdeutsch zu verwenden, was eh niemand verstehen würde. Abkürzungen und "Chat Slang" sind ungerne gesehen. Nimm dir die Zeit und verwende Großbuchstaben und korrekte Zeichensetzung. Gutes Beispiel: "Seid gegrüßt, edler Herr. Dürfte ich eure Aufmerksamkeit auf dieses von kundiger Hand gefertigte Schwert ziehen, welches ich zu einem angemessenen Preis zu veräußern suche?"</p>
		

	<li class="question"><a id="gc4"></a><strong>Wo sehe ich die Werte eines Gegenstandes?</strong></li>

		<p>Wenn du mit dem Mauszeiger über dem Gegenstand schwebst, werden Details über das Item angezeigt wie der Name, Level oder Fähigkeiten, die man für das Item benötigt, der Wert, das Gewicht und die Haltbarkeit. Weil Illarion kein Spiel ist, bei dem es um Zahlen geht, sondern primär um das Eintauchen in die Spielwelt und erzählte Geschichten werden keine technischen Details angezeigt. Bei Waffen und Rüstung kann man den Nutzen direkt aus dem angezeigten Level erschließen.</p>	

	<li class="question"><a id="gc5"></a><strong>Woher weiß ich meine genauen Fertigkeitswerte?</strong></li>

		<p>Drücke "C", um die Fähigkeiten deines Charakters anzuzeigen. Die Balken neben jeder Fähigkeit zeigen an, wie weit du noch vom nächsten Level entfernt bist. Die Fähigkeitslevel gehen von 1 bis 100, vom blutigen Anfänger bis zum echten Meister.</p>	

	<li class="question"><a id="gc6"></a><strong>Wie kann ich anderen Spielern im Spiel eine Botschaft zukommen lassen?</strong></li>
	
		 <p>Um vom eigentlichen Spiel nicht allzusehr abzulenken, befindet sich der <a href="<?php echo Page::getURL(); ?>/community/de_chat.php">globale Chat</a> auf Discord. Mächtige Magier können eines Tages die Kraft der Telepathie nutzen. Wenn du Neuigkeiten verbreiten willst, bezahle doch einen anderen Spieler als Boten oder benutze das <a href="<?php echo Page::getURL(); ?>/community/forums/index.php">Forum</a> um einen Anschlag an der Stadtmauer zu verfassen.</p>
		
	<li class="question"><a id="gc7"></a><strong>Das Spiel hat Steuern von mir eingetrieben! Was soll das?</strong></li>
	
		<p>Jeder Charakter, der Bürger von einer der drei Reiche Illarions ist, muss Steuern zahlen. Sie betragen 1% von der Gesamtmenge an Geld eines Charakters und werden einmal pro ingame Monat eingesammelt. Die Steuern werden für Dienstleistungen der Stadt verwendet, wie Schutz, Erhalt der Infrastruktur etc. Außerdem sind großzügige Anführer der Fraktionen dafür bekannt, loyale Steuerzahler mit magischen Edelsteinen zu belohnen.</p>	
		
	<li class="question"><a id="gc8"></a><strong>Wie finde ich meinen Rang in meiner Fraktion heraus?</strong></li>
	
		<p>In jeder Stadt gibt es einen NPC, der dir deinen Rang sagen kann. Je höher dein Rang ist, desto bekannter bist du dem Anführer deiner Fraktion und desto
		höher in seiner oder ihrer Gunst.</p>	
		
	<li class="question"><a id="gc9"></a><strong>Ich habe davon gelesen, dass Illarion ein besonderes Fertigkeitensystem mit 'mentaler Kapazität' hat. Was ist das alles?</strong></li>
	
		<p>Das Fähigkeitensystem Illarions basiert auf dem Motto "Learning by doing", Deutsch "Lernen durch Handeln". Es gibt keine Fähigkeitspunkte, die man verteilen muss. Stattdessen verbessern sich die Fähigkeiten für eine Handlung während dein Charakter sie übt. Zum Beispiel kann dein Charakter mit der Zeit von einem Anfänger im Schmiedehandwerk zu einem Meister werden, wodurch er dann eine größere Vielfalt von Gegenständen besserer Qualität herstellen kann. Ein Charakter kann auch Kampffähigkeiten entwickeln und dadurch lernen, bessere Waffen zu halten oder exotische Rüstung zu tragen.</p>

		<p>"Mentale Kapazität" bezieht sich auf die Fähigkeit deines Charakters, sich während des Verbesserns auf das Gelernte zu konzentrieren. Je öfter du Handlung hintereinander ausführst desto weniger lernst du von jeder Handlung. Deswegen ist es an dir, wie viel Zeit du investieren willst um die Fähigkeiten deines Charakters zu trainieren, das Resultat nach einer bestimmten Zeit wird das selbe sein. Ein Charakter kann einen hohen Erschöpfungsgrad senken indem er/sie Handlungen ausführt, die nicht von Fähigkeiten abhänging sind, wie mit anderen Charaktern zu reden oder die Spielwelt zu erforschen. Wir haben dieses System so konstruiert, um den Spielern die Möglichkeit zu geben, so viel Zeit in Rollenspiel oder Training zu stecken wie sie möchten, ohne dass eine Art Illarion zu spielen vom Spiel bevorzugt wird.</p>
		
</ul>

<?php insert_go_to_top_link(); ?>

<br />

	<h2>Illarion unterstützen</h2>
	
<ul>
	
	<li class="question"><a id="co1"></a><strong>Ich habe gelesen, dass Illarion 'Open Source' ist. Was bedeutet das?</strong></li>
	
		<p>Illarion ist ein freies Spiel, nicht nur kostenfrei sondern auch der Spielcode ist frei verwendbar. Der Sourcecode der Java-Software (Client und Entwicklungstools) ist unter der <a href="https://www.gnu.org/licenses/gpl-3.0">GPLv3</a> veröffentlicht. Der Sourcecode des Servers, der Skripte und der Karten ist unter der <a href="https://www.gnu.org/licenses/agpl-3.0">AGPLv3</a> veröffentlicht.
		Somit kann jeder den <a href="<?php echo Page::getURL(); ?>/development/de_opensource.php">Quellcode einsehen</a> und auch verwenden.</p>
		
	<li class="question"><a id="co2"></a><strong>Ich habe einen Fehler gefunden oder habe einen Vorschlag. Wie melde ich sowas?</strong></li>
		
		<p>Am besten benutzt du zum Melden von Fehlern oder Vorschlägen <a href="<?php echo Page::getURL(); ?>https://github.com/Illarion-eV/Illarion-Content/discussions">GitHub</a>. Du kannst ebenso Fehler und Vorschläge am <a href="<?php echo Page::getURL(); ?>/community/forums/index.php">Forum</a> schreiben.<p>

	<li class="question"><a id="co3"></a><strong>Können Spieler Bücher, NPCs oder sogar Quests selber schreiben?</strong></li>
	
		<p>Jawohl! Illarion schätzt alle Inhalte, die von Spielern erstellt wurden, und gibt ihnen die Möglichkeit, die Welt mitzugestalten. <a href="<?php echo Page::getURL(); ?>/community/de_contact.php#4">Wende dich an einen Entwickler</a> und lies das <a href="https://lua.illarion.org">Entwicklungstutorial</a>, um erste Informationen zu erhalten.</p>
		
	<li class="question"><a id="co4"></a><strong>Wie kann ich Illarion helfen? Was muss ich können?</strong></li>
	
		<p>Illarion kann man auf vielerlei Arten unterstützen. Du könntest dem Verein <a href="<?php echo Page::getURL(); ?>/community/de_society.php">Illarion e.V.</a> beitreten, die <a href="https://lua.illarion.org">Entwicklung des Spieles</a> unterstützen oder dabei helfen, das Spiel <a href="<?php echo Page::getURL(); ?>/community/forums/viewforum.php?f=77">bekannter zu machen</a>. Erzähl auch deinen Freunden von Illarion!</p>
		
		<p>Wenn du fortgeschrittene Fähigkeiten in Java, C++, LUA, PHP oder mit 3D-Grafiken hast, wende dich doch an einen der <a href="<?php echo Page::getURL(); ?>/community/de_contact.php#4">Entwickler</a>, um deinen Beitrag zur Entwicklung beizusteuern. Beachte hierbei, dass Illarion kein gewinnorientierte Projekt ist und somit auch keine Vergütung gezahlt werden kann.</p>
		
	<li class="question"><a id="co5"></a><strong>Welche Features sind für die Zukunft noch geplant?</strong></li>
	
		<p>Die Entwicklung Illarions folgt sechs klar definierten <a href="<?php echo Page::getURL(); ?>/development/de_progress.php">Meilensteinen</a>. Diese Meilensteine stehen für einen Zustand des Spieles, der keine weitere Nacharbeit von bestehenden Features mehr erfordert. Handwerk und Kampf werden überarbeitet werden und weitere Magiearten werden dem Spiel hinzugefügt. Ebenso werden wir weitere Features hinzufügen, die kein anderes Spiel zu bieten hat, um die Besonderheit der Welt Illarion zu betonen.</p>
	
</ul>

<?php insert_go_to_top_link(); ?>
<BR />
<?php include_footer(); ?>
