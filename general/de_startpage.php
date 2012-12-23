<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( 'Ein kostenloses Online Rollenspiel' );
	Page::setDescription( 'Illarion ist ein kostenloses Online-Rollenspiel in einer mittelalterlichen Fantasy Umgebung mit dem Schwerpunkt auf echtes Rollenspiel.' );
	Page::setKeywords( array( 'Startseite', 'Neuigkeiten' ) );
	Page::setXHTML();
	Page::Init();
?>

<h1>Willkommen auf Illarion!</h1>

<p style="font-weight:bold">Illarion wird aktuell auf eine neue Version aktualisiert.
Bitte achte auf die Neuigkeiten um den aktuellen Status zu erfahren.</p>

<?php Page::cap('I'); ?>
<p>llarion ist ein kostenloses Online-Rollenspiel in einer klassischen Fantasy-Welt.
Das Spiel wird von einer Gruppe von Freiwilligen entwickelt und betreut um 
der Spielerschaft ein unvergleichliches Rollenspielerlebnis zu ermöglichen. In 
der Welt sind Charaktere mehr als ein Abbild deiner Selbst, sie sind echte Wesen 
mit einem eigenen Leben. Als Spieler Illarions ist es deine Aufgabe, den 
Charakteren genau dieses Leben einzuhauchen.</p>

<p>Die Entscheidungen, die du 
während des Spiels triffst, haben einen echten Einfluss auf die Welt um dich 
herum und prägen diese. Deine Taten bestimmen die Ereignisse, die einmal die 
Seiten der Geschichtsbücher Illarions füllen werden. Alle Charaktere, denen du 
begegnen wirst, werden sich genauso verhalten: Sie sind lebendige, atmende Wesen 
einer geheimnisvollen Welt. Jeder Charakter hat seine eigene Vergangenheit, 
Ziele, Persönlichkeit, Stärken und Schwächen. Du wirst viele einzigartige Leute 
treffen: Krieger, Händler, Elfen und Echsenwesen. Welche Rolle wirst du spielen? 
Dein Charakter ist nur den Grenzen deiner Vorstellungskraft 
unterworfen.</p>

<p>Vielleicht wirst du die Diebesgilde unterwandern, dich in 
der Hierarchieleiter hinaufarbeiten nur, um die gesamte Organisation wie ein 
Kartenhaus zusammenfallen zu lassen. Oder du wirst ein frommer Priester, der 
neue Jünger für einen der vielen Götter aus Illarions Pantheon konvertiert. Du 
kannst auch den Weg eines gefürchteten Kriegers einschlagen, der für Ruhm und 
Ehre oder auch einfach aus Profitgier kämpft.</p>

<p>Illarion nähert sich 
derzeit der Veröffentlichung des so genannten "Very Big Updates" (VBU). Dieses 
Update wird alle Spielbereiche betreffen, die Karte deutlich erweitern und 
unzählige neue Features einführen oder bestehende Systeme gründlich 
überarbeiten. Ebenso werden viele lange bestehende Spielfehler ausgemerzt. Damit 
das VBU noch in diesem Jahr veröffentlicht werden kann wird ein Großteil der 
Entwicklungskapazitäten auf dieses Ziel verwandt. Für die derzeitige 
Spielversion werden zwingend nötige Patches erstellt aber es ist möglich, dass 
im Spiel noch Fehler verbleiben. Bei Problemen bist du gerne im offiziellen 
Illarion-Chat willkommen in dem sofortige Hilfe verfügbar ist.</p>
    
<p class="center">
	<a href="<?php echo Page::getURL(); ?>/general/map_of_illarion.jpg" style="margin-right:20px;">
		<img src="<?php echo Page::getCurrentURL(); ?>/general/t_map_of_illarion.jpg" width="120" height="85" alt="Karte von Illarion" />
	</a>
	<a href="<?php echo Page::getURL(); ?>/general/map_of_gobaith.jpg" style="margin-left:20px;">
		<img src="<?php echo Page::getCurrentURL(); ?>/general/t_map_of_gobaith.jpg" width="120" height="85" alt="Karte von Gobaith" />
	</a>
	<br />
	<span style="margin-right:20px;">Karte von Illarion</span>
	<span style="margin-left:20px;">Karte von Gobaith</span>
</p>

<?php Page::insert_go_to_top_link(); ?>

<h1>Aktuelle News</h1>

<?php News::show( News::load_from_db( 'DESC', 3, 0 ), 'html' ); ?>
