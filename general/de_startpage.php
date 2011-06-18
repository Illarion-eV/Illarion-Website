<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( 'Ein kostenloses Online Rollenspiel' );
	Page::setDescription( 'Illarion ist ein kostenloses Online-Rollenspiel in einer mittelalterlichen Fantasy Umgebung mit dem Schwerpunkt auf echtes Rollenspiel.' );
	Page::setKeywords( array( 'Startseite', 'Neuigkeiten' ) );
	Page::setXHTML();
	Page::Init();
?>

<h1>Willkommen auf Illarion!</h1>

<?php Page::cap('I'); ?>
<p>llarion ist ein kostenloses, grafisches Fantasy-Spiel, welches seinen Schwerpunkt auf
echtes Rollenspiel legt. Komm und tauch in die Welt Illarions ein! Du interagierst mit
anderen Spielern und Deiner Umgebung als ob Du mitten in dieser Welt lebtest. Alle
Charaktere um Dich herum werden sich wie echte Wesen dieser eigenständigen,
geheimnisvollen Welt verhalten. Sie werden Dir von Zauberern, Geistern, Fabelwesen und
den unglaublichsten Geschichten und Gerüchten berichten. Entscheide Dich für eine
Rasse, die du spielen möchtest: Mensch, Zwerg, Halbling, Elf. Vielleicht ein Ork? Oder
gar ein Echsenwesen?</p>

<p>Bitte erwarte keine Erfahrungspunkte oder andere Zahlen im Spiel, die Dir verraten,
wie gut Deine Fähigkeiten sind. Folge einfach der Rolle die Du spielen möchtest,
dann wirst Du merken, ob du als Kämpfer gegen die Kreaturen Illarions immer furchtloser
und geschickter wirst, der angesehenste Meisterschmied der Stadt oder gar der
beliebteste Barkeeper - denn Übung macht den Meister. Druiden und Zauberer wird eine
geheimnisvolle Magie, basierend auf Kräutern, anderen Pflanzen und Runen erwarten.
Darüber hinaus spricht jede Rasse ihre eigene Sprache, aber alle beherrschen auch die
gemeinsame Sprache Illarions, um sich über Rassengrenzen hinweg verständigen zu
können.</p>

<p>Wir bieten unseren eigenen Server, einen Java-Client, der unter Windows und Linux
läuft und die Garantie, dass Du nie etwas für dieses Spiel bezahlen musst. Um
dies sicher zu stellen, haben wir einen Verein gegründet, der dies in seiner
Satzung festschreibt. Illarion ist seit Februar 2000 online und wird ständig von
freiwilligen Programmierern und Helfern weiterentwickelt und so den Wünschen der
Spielerschaft angepasst.</p>

<p>Auch Du wirst Dich dem Zauber dieser Welt nicht entziehen können!</p>

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
