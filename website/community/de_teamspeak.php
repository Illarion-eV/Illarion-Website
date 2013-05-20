<?php
include ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
Page::setTitle( 'Illarion - TeamSpeak' );
Page::setDescription( 'Informationen über die Verbindung zum Illarion TeamSpeak-Server.' );
Page::setKeywords( array( 'Chat, TeamSpeak' ) );
Page::setXHTML();
Page::Init();
?>

<h1>Illarion TeamSpeak Chat</h1>


<p>Der Illarion TeamSpeak-Server ermöglicht Sprach- und Text-Chat für Spieler und den Staff.<br/>
Auf dem TeamSpeak-Server gelten die <a href="<?php echo $url; ?>/illarion/de_rules.php">Regeln von Illarion</a>.</p>

<p>Der <a href="http://teamspeak.com/?page=downloads" target="_blank">TeamSpeak 3 Client</a> ist erforderlich, um sich mit dem Chat-Server zu verbinden.</p>

<dl>
	<dt>Server-Adresse:</dt>
	<dd><a href="ts3server://illarion.org">illarion.org</a></dd>
</dl>

<?php include_footer(); ?>