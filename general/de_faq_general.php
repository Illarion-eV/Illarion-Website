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
       <li><a class="hidden" href="#1">Was sind die Systemanforderungen von Illarion?</a></li>
       <li><a class="hidden" href="#2">Wo kann ich das Spiel herunterladen?</a></li>
       <li><a class="hidden" href="#3">Der Download dauert viel zu lange!</a></li>
       <li><a class="hidden" href="#4">Das Spiel startet nicht!</a></li>
       <li><a class="hidden" href="#5">Wie logge ich mich ein?</a></li>
    </ul>

       <h2>Die ersten Schritte in Illarion</h2>

    <ul>
       <li><a class="hidden" href="#6">Ich habe gerade mit dem Spiel angefangen und weiß nicht, was ich tun soll!</a></li>
       <li><a class="hidden" href="#7">Wie kann ich jemanden angreifen und töten?</a></li>
       <li><a class="hidden" href="#8">Wie hebe ich Dinge auf?</a></li>
       <li><a class="hidden" href="#9">Wie kann ich Ausrüstung benutzen oder anlegen?</a></li>
       <li><a class="hidden" href="#10">Ich habe einen Gegenstand in die Hand genommen, aber man sieht ihn nicht an meinem Charakter!</a></li>
       <li><a class="hidden" href="#11">Gibt es im Spiel Lagerplätze?</a></li>
    </ul>

       <h2>Das Spielkonzept</h2>

    <ul>
       <li><a class="hidden" href="#12">Was ist ein Rollenspiel und was ist das Besondere an Illarion?</a></li>
       <li><a class="hidden" href="#13">Was sind CMs und GMs?</a></li>
       <li><a class="hidden" href="#14">Warum sprechen die alle so komisch?</a></li>
       <li><a class="hidden" href="#15">Wo sehe ich die Werte eines Gegenstandes?</a></li>
       <li><a class="hidden" href="#16">Woher weiß ich meine genauen Fertigkeitswerte und Eigenschaften?</a></li>
       <li><a class="hidden" href="#17">Wie kann ich anderen Spielern im Spiel eine Botschaft zukommen lassen?</a></li>
       <li><a class="hidden" href="#18">Was ist "Power Gaming" und ist es erlaubt?</a></li>
       <li><a class="hidden" href="#19">Was ist "Power Emoting" und ist es erlaubt?</a></li>
    </ul>

       <h2>Illarion unterstützen</h2>

    <ul>
       <li><a class="hidden" href="#20">Ich habe einen Fehler gefunden oder habe einen Vorschlag. Wie melde ich sowas?</a></li>
       <li><a class="hidden" href="#21">Wie kann ich Illarion helfen?</a></li>
    </ul>

<?php insert_go_to_top_link(); ?>
<BR />

<h2>Aller Anfang ist schwer</h2>


<ul>
       <li class="question"><a name="1"><b>Was sind die Systemanforderungen von Illarion?</b></a></li>
          <b>Betriebssystem:</b> <br />
       Windows 98/ME/2000/XP/Vista/7 <br />
       Linux Kernel 2.4.20 oder neuer <br />
       MacOS X 10.4 Tiger/10.5 Leopard/10.6 Snow Leopard <br />
       Solaris 8/9/10 (nur 32 bit)<br />
       <b>Grafikkarte:</b> <br />16MB Speicher, Treiber mit OpenGL-Unterstützung<br />
       <b>CPU:</b> <br />500 MHz oder mehr<br /><br />
       Eine Java 1.5 Laufzeitumgebung oder höher (am besten 1.6 da 1.7 noch nicht offiziell unterstützt wird)<br /><br />

       Windows Vista unterstützt den freien Grafikstandard OpenGL nicht. Daher läuft Illarion nicht mit den bei Vista mitgelieferten Grafiktreibern. Mit einem aktuellen Grafiktreiber inklusive OpenGL Unterstützung vom Hersteller der Grafikkarte sollten keine Probleme auftauchen.<br /><br />

       <li class="question"><a name="2"><b>Wo kann ich das Spiel herunterladen?</b></a></li>
       Auf der <a href="http://illarion.org/illarion/de_java_download.php">Download-Seite der Homepage</a>. Hier kannst du den Spielclient herunterladen und installieren. Du wirst dazu aufgefordert, ein Verzeichnis zu wählen, in dem Charakterdaten gespeichert werden. Es ist ratsam, einen Ordner zu wählen, den du auch wiederfindest.
       <br /><br />
       <li class="question"><a name="3"><b>Der Download dauert viel zu lange!</b></a></li>
       Der Spielclient umfasst 35 MB. Mit einer langsamen Internetverbindung kann es eine Weile dauern, diese Datenmenge herunterzuladen. Mitunter pausiert der Download auch, in diesem Fall habe einfach Geduld, der Download wird automatisch fortgesetzt. Nutze die Zeit um dir die Informationen im Forum oder auf der Homepage durchzulesen.
       <br /><br />
       <li class="question"><a name="4"><b>Das Spiel startet nicht!</b></a></li>
       Wenn das Spiel installiert ist und korrekt aufgerufen wurde, dennoch aber nicht startet, schau doch bitte auf dem <a href="http://illarion.org/community/forums/viewforum.php?f=3" >Support-Forum</a> nach, ob es bereits eine Lösung für dein Problem gibt. Stelle in jedem Fall sicher, dass du die .jnlp Datei mit Java Webstart startest.
       <br /><br />
       <li class="question"><a name="5"><b>Wie logge ich mich ein?</b></a></li>
       Nachdem du <a href="http://illarion.org/community/account/de_charlist.php" >einen Charakter erstellt hast</a>, logge dich mit dem Client in das Spiel ein. Gib hierzu den Charakternamen (Groß- und Kleinschreibung beachten) und dein Accountpasswort ein.
    </ul>

<?php insert_go_to_top_link(); ?>
<BR />

<h2>Die ersten Schritte in Illarion</h2>

<ul>
       <li class="question"><a name="6"><b>Ich habe gerade mit dem Spiel angefangen und weiß nicht, was ich tun soll!</b></a></li>
       Ein Tutorium wird dich in den ersten Minuten des Spiels begleiten, anschließend hast du die freie Wahl, was du tun möchtest - werde ein stolzer Ritter, ein frommer Priester, ein fleißiger Handwerker oder ein geheimnisvoller Magier.
       <br /><br />
       <li class="question"><a name="7"><b>Wie kann ich jemanden angreifen und töten?</b></a></li>
       Entweder, du klickst rechts auf einen Charakter und wählst "Angreifen" oder du klickst links auf ihn bei gehaltener STRG-Taste. Bitte beachte, dass es nur zulässig ist, einen anderen Charakter anzugreifen, wenn dies im Sinne des Rollenspiels geschieht. Es ist allgemein üblich, seinem Gegenüber die Chance zur Interaktion vor und während eines Kampfes zu geben. Emotes die zeigen, wie dein Charakter eine Waffe zieht und bedrohlich auf seinen Gegner zustürmt, sind sehr gerne gesehen.
       <br /><br />
       <li class="question"><a name="8"><b>Wie hebe ich Dinge auf?</b></a></li>
       Klicke rechts auf einen Gegenstand und wähle "Aufheben". Alternativ kannst du Gegenstände auch wie Icons auf dem Windows/Linux/MacOS-Desktop per "drag and drop" auf einen freien Platz in deinem Inventar ziehen. Dein Inventar besteht aus der Kleidunge deines Charakters (die Slots auf dem Menschenbild), dem Gürtel (die sechs Slots unter der Kleidung/Rüstung) und einer Tasche. Wenn du eine Tasche verwenden willst muss sie angelegt sein und geöffnet werden. Wenn du die Tasche deines Charakters öffnen willst, klicke rechts auf sie und wähle "Öffnen" oder klicke mit der dritten Maustaste, soweit deine Maus eine hat, auf die Tasche.
       <br /><br />
       <li class="question"><a name="9"><b>Wie kann ich Ausrüstung benutzen oder anlegen?</b></a></li>
       Ziehe Gegenstände, die du anlegen willst, mit der Maus in einen freien Slot im Inventar (der 'Mann' am rechten Bildschirmrand). Wenn du mit dem Mauszeiger über dem Slot verweilst, wird angezeigt, was man hier ablegen kann. Ein Slot muss frei sein, um etwas neues reinzulegen. Ziehe hierzu den Gegenstand, der sich im Slot befindet, z.B. in die Tasche deines Charakters. Verfahre so mit Waffen, Rüstungen oder was auch immer dein Charakter anhat. Wenn du einen Gegenstand benutzen möchtest (z.B. einen Apfel essen), klicke mit der rechten Maustaste auf ihn und wähle "Benutzen". Als Alternative kannst du auch Shift gedrückt halten, den Gegenstand anklicken und dann Shift loslassen.
       <br /><br />
       <li class="question"><a name="10"><b>Ich habe einen Gegenstand in die Hand genommen, aber man sieht ihn nicht an meinem Charakter!</b></a></li>
       
       Paperdolling ist zur Zeit nicht implementiert, es wird mit dem nächsten größeren Update veröffentlicht. Um zu sehen, wie jemand anderes aussieht, klicke auf den Charakter um eine Kurzbeschreibung aufzurufen und um zu sehen, welche Gegenstände er ausgerüstet hat. Über einen Rechtsklick kannst du aus dem Kontextmenü auswählen, dass du den Charakter genauer untersuchen willst. Dies wird dem anderen Spieler mitgeteilt, also mach es nicht zu häufig. Auf diese Weise werden dir die meisten getragenen Gegenstände angezeigt.
       <br /><br />
       <li class="question"><a name="11"><b>Gibt es im Spiel Lagerplätze?</b></a></li>
       Ja. Das Spiel hat ein "Depotsystem". Diese gelben Lagerkisten stehen an wichtigen Plätzen, z.B. in Städten. Um sie zu verwenden stelle dich neben sie und "öffne" sie wie eine Tasche. Per "Drag and Drop" kannst du Gegenstände im Depot ablegen.
    </ul>

<?php insert_go_to_top_link(); ?>
<BR />

<h2>Das Spielkonzept</h2>

    <ul>
       <li class="question"><a name="12"><b>Was ist ein Rollenspiel und was ist das Besondere an Illarion?</b></a></li>
       Rollenspiele (RPG) sind recht beliebte Spiele, bei denen Spieler die Rolle eines erdachten Charakters übernehmen und Taten vollbringen, die ihnen im wahren Leben vielleicht gar nicht möglich wären. Illarion treibt das Konzept Rollenspiel, verglichen mit anderen Spielen, auf die Spitze. Die Spieler sind angehalten, sich in das Leben ihrer Charaktere hineinzuversetzen. Im Spiel bist du nicht Max Mustermann aus Dingenskirchen sondern übernimmst die Rolle eines erdachten Charakters, inklusive seiner Gefühle, Sprache und Gedanken. Illarion ist eine mittelalterliche Fantasy-Welt ohne Strom, Autos, Fernseher oder Akkuschrauber. Im Spiel solltest du davon absehen, außerhalb deiner Rolle (Out of Character, OOC) zu spielen.
       <br /><br />
       <li class="question"><a name="13"><b>Was sind CMs und GMs?</b></a></li>
       Die Abkürzung CM bedeutet "Community Manager". Ihre Rolle ist es, neuen Spielern zu helfen und Streitfälle bzw. Konflikte zwischen Spielern zu klären. Sie sind die ersten, an die man sich wenden sollte, wenn es nicht gerade um technische Probleme geht. GM steht für Gamemaster. Die Gamemaster erstellen dynamische Inhalte (Quests, Events etc.) und wachen über die Einhaltung der Regeln Illarions.
       <br /><br />
       <li class="question"><a name="14"><b>Warum sprechen die alle so komisch?</b></a></li>
       Zunächst einmal wird Illarion von Spielern aus der ganzen Welt gespielt. Es ist somit naheliegend, dass sie nicht alle die gleiche Sprache sprechen. Englisch und Deutsch sind die am häufigsten anzutreffenden Sprachen und es ist ein Gebot der Höflichkeit, gegenüber anderen Spielern eine Sprache zu verwenden, die sie verstehen. Es können auch Mundarten verwendet werden. Viele Spieler versuchen, ihren Charakter mittelalterlich klingen zu lassen ohne dabei aber Altdeutsch zu verwenden, was eh niemand verstehen würde. Abkürzungen und "Chat Slang" sind gegen die Regeln. Nimm dir die Zeit und verwende Großbuchstaben und korrekte Zeichensetzung. <BR> Schlechtes Beispiel: "ok hi wills du schwert kaufn !!!111"<BR> Gutes Beispiel: "Seid gegrüßt, edler Herr. Dürfte ich eure Aufmerksamkeit auf dieses bestens gefertigte Schwert ziehen, welches ich zu einem angemessenen Preis veräußern würde?"
       <br /><br />
       <li class="question"><a name="15"><b>Wo sehe ich die Werte eines Gegenstandes?</b></a></li>
       Überhaupt nicht. Illarion soll so "realistisch" wie möglich sein. Im Mittelalter hörte man auch nicht von einem Schmied "Dieses Schwert hat einen Angriffswert von 20". Stattdessen probierten die Leute verschiedene Schwerter aus und wählten das, was ihnen am besten gefiel. Waffen haben zwar bestimmte Werte, jedoch hängen die von einer Reihe von Variablen (z.B. der Fertigkeit des Schmieds) ab, so dass numerische Werte nicht bestimmbar sind.
       <br /><br />
       <li class="question"><a name="16"><b>Woher weiß ich meine genauen Fertigkeitswerte und Eigenschaften?</b></a></li>
       Eine Person kann man nicht einfach auf ein paar Zahlen reduzieren. Stell dir vor, du sitzt auf einer Bank und lauschst einem Gespräch. Einer sagt: "Ich habe meine Lauffertigkeit gestern auf 40 gesteigert und bin in Level 43 aufgestiegen.". Diese Person würdest du wohl auslachen. Für Illarion gilt das selbe; man kann nur grob anhand eines Balkens in der Fertigkeitenliste abschätzen, wie gut man ist, insbesondere im Vergleich zu anderen. Sicherlich wäre es einfacher, genaue Werte anzugeben, aber dieses Spiel wurde einzig und alleine für das Rollenspiel entwickelt.
       <br /><br />
       <li class="question"><a name="17"><b>Wie kann ich anderen Spielern im Spiel eine Botschaft zukommen lassen?</b></a></li>
       Gar nicht. Wie sollte sowas in einer mittelalterlichen Welt gehen? Es gab keine Lautsprecheranlagen, Funkgeräte oder Handys. Es war schlichtweg nicht möglich. Mächtige Magier können vielleicht eines Tages die Kraft der Telepathie nutzen, aber sowas ist derzeit noch nicht geplant. Wenn du Neuigkeiten verbreiten willst, bezahle doch einen anderen Spieler als Boten oder benutze das <a href="http://illarion.org/community/forums/index.php" >Forum</a> um einen Anschlag an der Stadtmauer zu verfassen.
       <br /><br />
       <li class="question"><a name="18"><b>Was ist "Power Gaming" und ist es erlaubt?</b></a></li>
       "Power Gaming" (PG) beschreibt Aktionen von Spielcharakteren, die keinem realistischem Verhaltensmuster folgen. Ein Beispiel hierfür wäre es, seinen Charakter vor anderen zu verstecken, nur um sich auf eine einzelne Tätigkeit zu konzentrieren (Handwerk oder meist das Trainieren von Kampffertigkeiten) und um diese Fertigkeit so schnell es geht zu steigern.<br />
       "Power Gaming" ist grundsätzlich nicht verboten, wird aber ungerne gesehen.
       <br /><br />
       <li class="question"><a name="19"><b>Was ist "Power Emoting" und ist es erlaubt?</b></a></li>
       "Power Emoting" meint Emotes, die anderen Spielern keine Wahl lassen und ihnen eine Reaktion aufzwingen. <br />
       Ein Beispiel hierfür wäre *Spieler A trifft Spieler B auf die Brust, so dass dieser zu Boden geht*.<br />
       Die Spielregeln verbieten "Power Emoting".
    </ul>


<?php insert_go_to_top_link(); ?>
<BR />

<h2>Illarion unterstützen</h2>

<ul>
       <li class="question"><a name="20"><b>Ich habe einen Fehler gefunden oder habe einen Vorschlag. Wie melde ich sowas?</b></a></li>
       Am besten benutzt du zum Melden von Fehlern oder Vorschlägen <a href="http://illarion.org/mantis/index.php" >Mantis</a>. Dies ist das Fehlerverwaltungssystem der Entwickler. Fehler und Vorschläge werden am Forum gerne übersehen, daher verwende nicht das Forum für solche Zwecke.
       <br /><br />
       <li class="question"><a name="21"><b>Wie kann ich Illarion helfen?</b></a></li>
       Illarion kann man auf vielerlei Arten unterstützen. Von finanzieller Unterstützung über Hilfe bei der Entwicklung des Spiels oder einfach nur Werbung auf anderen Seiten machen ist vieles möglich.
    </ul>

<?php insert_go_to_top_link(); ?>
<BR />
<?php include_footer(); ?>
