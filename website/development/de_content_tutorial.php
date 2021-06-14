<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';
	
	Page::setTitle(array('Einführung in die Inhaltsentwicklung', 'Tutorial'));
	Page::setDescription('Diese Seite beinhaltet eine Einführung in die Inhaltsentwicklung für Illarion.');
	Page::setKeywords( array( 'Open Source', 'Source', 'Git', 'GitHub', 'Inhalt', 'Entwicklung', 'Lua' ) );
	Page::setXHTML();
	Page::Init();
?>

<h1>Einführung in die Inhaltsentwicklung</h1>

<p>
Bist du schon einmal über einen offensichtlichen Fehler im Spiel gestolpert wie z.B.
einen Rechtschreibfehler? Hast du überlegt diesen einem Entwickler zu melden aber es
dann doch gelassen? Hättest du ihn selber behoben, wenn du die Mittel dazu gehabt
hättest? Wenn ja lies weiter, dieses Tutorial ist für <u>dich</u>.</p>

<p>Dieses Tutorial beschreibt einen einfachen Weg etwas zur Entwicklung Illarions
beizusteuern indem man einfache Fehler, wie z.B. Rechtschreibfehler, selber
behebt. Es gibt eine grundlegende Einführung in unseren Entwicklungsprozess und
unsere Entwicklungsrichtlinien. Das bedeutet in alles das, was du wissen musst,
um etwas zur Entwicklung Illarions beizutragen.</p>

<p>Illarion verwendet zur Versionsverwaltung die freie Software Git, die ursprünglich für die Quellcode-Verwaltung des Linux-Kernels entwickelt wurde. 
Git ermöglicht es mehreren Entwicklern gleichzeitig an einem Projekt zu arbeiten, ohne dass es zu Konflikten zwischen den Beiträgen der einzelnen Entwicklern kommt.
Auch können verschiedenen Entwicklungszweige definiert werden, so dass das laufende Spiel nicht von der Entwicklung beeinträchtigt wird.
Der Umgang mit Git ist für Einsteiger eine kleine Herausforderung. Wenn du dich einmal daran gewöhnt hast, ist es sehr einfach. Versprochen!</p>

<h2>Setup</h2>

<h4>Vorraussetzungen</h4>
<ul>
<li>Link zum Repository für Spielinhalte: <a href="https://github.com/Illarion-eV/Illarion-Content">https://github.com/Illarion-eV/Illarion-Content</a></li>
<li>Einen kostenlosen Account auf <a href="https://github.com">github.com</a></li>
<li>Einen modernen, guten Texteditor wie <a href="https://notepad-plus-plus.org">Notepad++</a> oder <a href="https://code.visualstudio.com">Visual Studio Code</a></li>
<li>Einen einfach zu benutzenden Git-Client wie <a href="https://sourcetreeapp.com">SourceTree</a> unter Windows und Mac, oder den Konsolenclient unter Linux</li>
</ul>
	
<h4>Bemerkungen</h4>
<ul>
<li>GitHub steht in keinerlei Beziehung zum Illarion e.V.</li>
<li>Du kannst natürlich andere Editoren benutzen, aber in diesem Fall bist du auf dich gestellt, falls sie die nötigen Voraussetzungen nicht erfüllen.</li>
<li>Für jeden Schritt mit Git ist auch der Konsolenbefehl angegeben.</li>
<li>Die Entwicklungssprache Illarions ist Englisch. Daher macht es Sinn, die englische Version der Werkzeuge zu benutzen, um bei Rückfragen keine Übersetzungsprobleme zu haben.</li>
</ul>

<h4>Einmalige Vorbereitungen</h4>
<ul>
<li>Rufe mit deinem Internetbrowser folgende Seite auf: <a href="https://github.com/Illarion-eV/Illarion-Content">https://github.com/Illarion-eV/Illarion-Content</a></li>
<li>Klicke auf "Fork", um auf GitHub dieses Repository in deinen eigenen Account zu kopieren ("fork").</li>
<li>Die URL zu deiner Kopie (Fork) des Repositorys für Spielinhalte wird dann so aussehen: https://github.com/&lt;dein_account_name&gt;/Illarion-Content</li>
</ul>

<h4>Windows/Mac</h4>
<ul>
<li>Starte SourceTree und folge den Bildschirmanweisungen.</li>
<li>Öffne die "Options" im "Tools"-Menü und setze "Default text encoding" auf iso-8859-1. Klicke OK.</li>
<li>Klicke auf "Clone / New".</li>
<li>Gebe die "HTTPS clone URL" aus deinem GitHub-Fork als "Source Path / URL" ein.</li>
<li>Wähle als "Destination Path" einen Pfad auf deiner Festplatte wo eine weitere, diesmal lokale Kopie des Repositorys gespeichert werden soll.</li>
<li>Klicke auf "Clone". (Du hast jetzt die gesamten Spielinhalte bereits zweimal kopiert!)</li>
<li>Im "Repository"-Menü klicke auf "Add Remote..." und füge mittels "Add" eine Remote mit dem Namen "upstream" und der URL https://github.com/Illarion-eV/Illarion-Content hinzu.</li>
</ul>
<h4>Linux/Konsole</h4>
<ul>
<li>git clone [Deine GitHub-Fork-URL]</li>
<li>git remote add upstream https://github.com/Illarion-eV/Illarion-Content</li>
</ul>

<h2>Lokaler Server</h2>

<h4>Generelles</h4>
<ul>
<li>Die Verwendung eines lokalen Servers ist optional.</li>
<li>Der lokale Server ermöglicht es dir, deine Änderungen im Spiel zu überprüfen, bevor du sie dem Team zur Verfügung stellst.</li>
<li>Am lokalen Server, welcher in einer virtuellen Umgebung auf deinem Rechner läuft, hast du volle Entwicklerrechte. Sage mit dem Testcharakter "!?", um eine Liste der Kommandos zu erhalten.</li>
<li>Spielserver und lokaler Server stehen nicht in Verbindung miteinander. Du kannst nicht mit anderen Spielern auf deinem lokalen Server spielen - du kannst aber auch nichts am Spielserver kaputt machen.</li>
</ul>

<h4>Download und Setup</h4>
<ul>
<li><a href="https://github.com/Illarion-eV/Illarion-Dev">Lade dir deinen lokalen Illarion-Server hier runter.</a></li>
<li>Setup und alle weiteren Schritte sind in der Readme-Datei beschrieben.</li>
</ul>

<h2>Generelle Arbeitsschritte</h2>

<h4>Fehler finden und korrigieren</h4>
<ul>
<li>Schreibe dir den genauen Text des Fehlers auf. Fasse dich so kurz wie möglich, um vielleicht den selben Fehler auch noch anderswo zu finden.</li>
<li>In Notepad++ wähle "Find in Files..." im "Search"-Menü.</li>
<li>Gib deinen Fehlertext unter "Find what" ein und wähle deine lokale Kopie des Repositorys unter "Directory" aus.</li>
<li>Klicke "Find All" um alle Vorkommnisse des Fehlers aufzulisten.</li>
<li>Betrachte diese um dann <u>entweder</u> "Replace with" und "Replace All" zu benutzen um alles zu beheben, <u>oder</u> um die einzelnen Dateien mittels Doppelklick auf die gefundenen Zeilen zu öffnen und die Fehler von Hand zu bereinigen und zu speichern.</li>
</ul>

<h4>Teilen deiner Arbeit unter Windows/Mac</h4>
<ul>
<li>Um deine lokale Kopie mit der Entwicklungsversion zu aktualisieren, wähle in SourceTree mittels Rechtsklick die "upstream"-Remote aus der Liste auf der linken Seite, wähle "Pull from upstream" und dann "develop" als "Remote branch to pull". Die Version, die gerade im Spiel vorhanden ist, ist im Branch "master".</li>
<li>Falls "develop" oder "master" nicht aufgelistet sind, musst du erst auf "Refresh" klicken. Für die Website wird nur der Branch "master" gepflegt.</li>
<li>Drücke den "Commit"-Knopf in der oberen Leiste um einen Satz von Änderungen zum Versenden vorzubereiten.</li>
<li>Überprüfe deine Änderung durch Anwählen jeder einzelnen Datei. Füge sie deinem "Commit" mit dem Aufwärtspfeil hinzu oder füge alle Dateien mit dem doppelten Aufwärtspfeil hinzu.</li>
<li>Gebe eine aussagekräftige "commit message" im Imperativ ein (wie ich hier). Beachte, dass die Nachricht in Englisch geschrieben werden muss. Sie sollte in etwa lauten: "Fix spelling error in NPC John Doe". Falls du mehr als eine kurze Zeile benötigst, benutze einen prägnanten Titel und lass die zweite Zeile leer.</li>
<li>Schließlich drücke den "Commit"-Knopf um deinen Satz von Änderungen lokal zu speichern.</li>
<li>Klicke den "Push"-Knopf in der oberen Leiste und bestätige mit "OK" um den Satz deiner Änderungen an deinen GitHub-Account zu schicken. Zumindest beim ersten Mal wirst du dein GitHub-Login eingeben müssen.</li>
</ul>
<h4>Teilen deiner Arbeit unter Linux oder der Konsole</h4>
<ul>
<li>git pull upstream develop</li>
<li>git add [Geänderte Dateien]</li>
<li>git commit</li>
<li>git push</li>
</ul>
<h4>In beiden Fällen</h4>
<ul>
<li>In deinem Illarion-Content Fork in deinem GitHub-Account siehst du nun (nach Neuladen) den Titel der letzten Commit-Nachricht.</li>
<li>Klicke auf "Pull Request" rechts über der Nachricht und kontrolliere zum letzten Mal deine Änderungen bevor du mittels "Click to create a pull request for this comparison" bestätigst.</li>
<li>Falls der automatische Titel nicht aussagekräftig genug ist, gebe einen (englischen) Kommentar ein.</li>
<li>Zu guter Letzt drücke den "Send pull request"-Knopf. Du wirst via e-Mail benachrichtigt wenn deine Änderungen eingebaut werden. Kurz darauf werden sie im Spiel erscheinen.</li>
<li>Gut gemacht! Vielen Dank, dass du Illarion verbessert hast!</li>
</ul>

<h2>Weitere Schritte und Möglichkeiten</h2>
<ul>
<li>Schreibe deine eigenen NPCs mit easyNPC.</li>
<li>Gestalte Dungeons mit dem Mapeditor.</li>
<li>Schreibe Quests oder wirke an Kampf- und Magiesystem mit.</li>
<li>Illarion benutzt Lua 5.2, ein <a href="https://www.lua.org/pil/contents.html">Buch, das Lua 5.0 behandelt</a> ist online verfügbar.</li>
<li>Schau dir die <a href="https://raw.github.com/Illarion-eV/Illarion-Server/master/doc/luadoc.pdf">Illarion-Erweiterung zu Lua</a> an.</li>
<li>Lerne mehr über <a href="https://git-scm.com/book">Git</a>, das schnelle verteilte Versionierungssystem.</li>
<li>Sprich mit unseren Inhaltsentwicklern auf <a href="<?php echo Page::getURL(); ?>/community/de_chat.php">Discord</a>.</li>
</ul>
