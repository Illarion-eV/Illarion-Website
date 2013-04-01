<?php
include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

Page::setTitle( 'NPCs erstellen' );
Page::setDescription( 'Diese Seite enthält Informationen wie man NPCs für Illarion erstellt.' );
Page::setKeywords( array( 'Entwicklung', 'NPCs' ) );
Page::setXHTML();
Page::Init();
?>

<h1>NPCs für Illarion erstellen</h1>

<p>
Da das VBU (Very Big Update) noch ein Haufen Arbeit ist und wir noch immer auf der Suche nach Mitarbeitern sind, haben wir eine weitere Möglichkeit geschaffen, möglichst direkt und schnell in die Entwicklung von NPCs einzusteigen. Damit kann jeder sofort einen NPC testen, den er gerade erschafft. Und das geht so:
</p>
<p>
Ihr kennt alle den NPC-Editor, den Nitram erschaffen hat. Darin gibt es eine Option "Skript hochladen", die dazu führt, dass das entsprechende Skript an den Server geschickt wird (dh. dazu ist Internetanbindung erforderlich). Der entsprechende NPC steht auf dem Devserver und wir stellen euch nun sowohl den aktuellen Testclient als auch ein öffentliches Account mit 2 freigeschalteten Charakteren zur Verfügung, sodass ihr immer sofort die aktuelle Version eures NPCs testen könnt.
</p>
<p>
Alles, was ihr dazu braucht, befindet sich im <a href="http://illarion.org/~nitram/downloads/illarion_download.jnlp">Illarion Loader</a>.
Dahinter verstecken sich 3 Programme:
<ul>
<li>Der jeweils aktuelle Testclient</li>
<li>Der NPC-Editor</li>
<li>Der Map-Editor (momentan nicht funktionstüchtig)</li>
</ul>
</p>
<p>
Hier eine kleine Schritt-für-Schritt-Anleitung, wie man sofort einsteigen kann:
<ol>
<li>Oben angegebene Datei ausführen</li>
<li>Den easyNPC-Editor starten</li>
<li>Gebt ein sehr einfaches Skript ein, z.B.: "Hi" -> "Hallo, Fremder!"</li>
<li>Auf "Skript neu bauen" klicken (dadurch wird das Skript automatisch Vervollständigt)</li>
<li>Es ist ratsam, aber nicht notwendig, das Skript zu speichern.</li>
<li>Durch klick auf den Hauptbutton (links oben) und Auswahl von "Lua Skript hochladen" wird das Skript auf den Server übertragen.</li>
<li>Um den Client zu starten, muss man noch einmal den <a href="http://illarion.org/~nitram/downloads/illarion_download.jnlp">Illarion Loader</a> starten und diesmal den Client auswählen.</li>
<li>Als Accountname UND Passwort gebt ihr "devserver" an. Dadurch werden euch zwei Charaktere zur Auswahl angeboten ("Devserver" und "Devserver One"). Wählt einen davon und startet den Client.</li>
<li>Sobald ihr den Charakter auf der Karte seht, drückt Enter, um in den Sprechmodus zu kommen und gebt "!fr" ein.</li>
<li>Sobald der Server die Skripte neu geladen hat, informiert er euch darüber. Ihr könnt euch nun neben den NPC stellen, "Hi" sagen und er wird dem Skript entsprechend antworten.</li>
</ol>
</p>

<?php Page::insert_go_to_top_link(); ?>
