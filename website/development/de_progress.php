<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( 'Entwicklungsfortschritt' );
	Page::setDescription( 'Diese Seite zeigt an, wie es um die Entwicklung von Illarion steht.' );

	Page::addCSS( 'dev_progress' );

	Page::Init();
?>

<h1>Entwicklungsfortschritt</h1>

<p>Die Entwicklung Illarions folgt klar definierten Arbeitspaketen, welche darauf abzielen, für die existierenden Spielbereiche einen Zustand zu erreichen, der keine zukünftige Überarbeitung mehr erfordert. Somit soll das Spiel anschließend nur noch durch Verbesserungen und zusätzliche Inhalte verbessert werden, wobei keine grundlegenden Probleme oder Fehler mehr auftreten. Die Arbeitspakete werden nicht in einer Reihenfolge nach abgeschlossen sondern parallel bearbeitet. Die Aufzählung auf dieser Seite entspricht der prognostizierten Fertigstellungsreihenfolge.</p>

<p>Wenn du bei der Entwicklung Illarions mithelfen willst, wende dich an einen der <a href="http://illarion.org/community/de_contact.php#4">Entwickler</a> oder schau einfach mal im <a href="http://illarion.org/community/de_chat.php">Chat</a> vorbei. Klicke auf Titel der Arbeitspakete, um auf die entsprechende Zusammenstellung der Entwicklungspunkte im Mantis-Bugtracker zu gelangen.</p>

<h2><a href="http://illarion.org/mantis/view.php?id=9659" target="_blank">Arbeitspaket Stabiler Zustand für Reviewer und Werbung</a></h2>

<p>Dieses Arbeitspaket zielt darauf ab, das Spiel von Fehlern zu befreien und den Eindruck während der ersten Spielstunde und den Weg dorthin zu verbessern. Der gesamte Weg vom Auffinden des Spiels, seiner Installation und dem Start ins Spiel ist enthalten. Inhalte, die sich nicht in der ersten Spielstunde bemerkbar machen, sind nicht Inhalt des Arbeitspakets, seien sie noch so wichtig für das Spiel.</p>

<h3>Highlights</h3>

<ul>
    <li>Verbesserung der Charaktererstellung</li>
    <li>Optische Verbesserungen des Clients und seiner Bedienbarkeit</li>
    <li>Aktualisierung der Homepage</li>
</ul>

<h2><a href="http://illarion.org/mantis/view.php?id=9822" target="_blank">Arbeitspaket Neue Gegenstände und verbessertes Handwerk</a></h2>

<p>Mit diesem Arbeitspaket werden dem Spiel eine sinnvolle Anzahl von Gegenständen hinzugefügt, insbesondere Waffen und Rüstungen. Ihr Nutzen und ihre Herstellung werden in Hinblick auf die Handwerke, deren Verteilung über die Städte, Ressourcen, Verbrauchsmaterialien und Preise gestaltet.</p>

<h3>Highlights</h3>

<ul>
    <li>Über 100 neue Waffen und Rüstungen</li>
    <li>Neugestaltung der Handwerksrezepte</li>
    <li>Verbesserung des Sammelns von Ressourcen</li>
</ul>

<h2><a href="http://illarion.org/mantis/view.php?id=9823" target="_blank">Arbeitspaket Magie</a></h2>

<p>Magie ist ein notwendiges Features eines Fantasyspiels. Mit diesem Arbeitspaket werden wir die arkane Magie wieder einführen und ebenso die heilige Magie der Götter. Entsprechende Anpassungen an handwerksähnliche Systeme wie Alchemie werden erfolgen.</p>

<h3>Highlights</h3>

<ul>
    <li>Arkane Magie mit dutzenden Zaubersprüchen</li>
    <li>Magie der Götter für Templer und Priester</li>
    <li>Handwerksähnliche Verzauberungen und Alchemieverbesserungen</li>
</ul>

<h2><a href="http://illarion.org/mantis/view.php?id=9914" target="_blank">Arbeitspaket Überarbeitung des Kampfsystems</a></h2>

<p>Das derzeitige Kampfsystem bedarf einer Überarbeitung, um fairer, klarer und verlässlicher zu werden. Dieses Arbeitspaket wird für die Spieler nur wenige sichtbare Veränderungen bringen, jedoch zu einem deutlich verbesserten und flexibleren Kampfsystem führen.</p>

<h3>Highlights</h3>

<ul>
    <li>Klarere Verwendung der Attribute</li>
    <li>Fehlerfreier Fertigkeitenzuwachs</li>
    <li>Der Nutzen der verschiedenen Waffen und Rüstungen wird fairer verteilt</li>
</ul>

<h2><a href="http://illarion.org/mantis/view.php?id=9825" target="_blank">Arbeitspaket Sandkasten und Immersion</a></h2>

<p>Illarion steht im Wettbewerb mit anderen Spielen. Um sich als Indie-Spiel abzuheben, bedarf es Features, die kein anderes Spiel aufweisen kann. Mit diesem Arbeitspaket wollen wir solche Features einführen, die der Immersion dienen und dem Spieler zusätzliche Freiräume ermöglichen, seinen Charakter auszuspielen.</p>

<h3>Highlights</h3>

<ul>
    <li>Bau eigener Häuser</li>
    <li>Dynamische Ereignisse</li>
    <li>Erhöhung der Atmosphäre im Spiel</li>
</ul>

<h2><a href="http://illarion.org/mantis/view.php?id=9824" target="_blank">Arbeitspaket Inhalte, Quests und Dungeons</a></h2>

<p>Durch das Hinzufügen weiterer Quests und Dungeons soll in diesem Arbeitspaket die Attraktivität des Spiels erhöht werden. Mit ihnen soll der Hintergrund des Spiels ("Lore") dem Spieler nähergebracht werden. Bücher, NPCs, Inschriften und Ereignisse sollen an jedem wichtigen Ort den Hintergrund präsent machen.</p>

<h3>Highlights</h3>

<ul>
    <li>Neugestaltung der Geschichte und Beschreibung Illarions</li>
    <li>Veröffentlichung von dutzenden neuen Büchern</li>
    <li>Hinzufügen von neuen, komplexen und herausfordernden Quests</li>
</ul>

<?php Page::insert_go_to_top_link(); ?>
