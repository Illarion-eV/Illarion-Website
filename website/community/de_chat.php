<?php
include ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
Page::setTitle( 'Illarion - Chat' );
Page::setDescription( 'Dieser Webchat-Client ermöglicht den Zugriff auf den Illarion IRC Channel ohne einen zusätzlichen IRC-Clients.' );
Page::setKeywords( array( 'Chat, IRC' ) );
Page::setXHTML();
Page::Init();
?>

<h1>Illarion IRC-Chat</h1>

<h2>Chat</h2>

<iframe src="https://webchat.quakenet.org/?channels=illarion&amp;uio=OT10cnVlJjExPTEzMw1a" width="700" height="500"></iframe>

<h2>Information</h2>

<p>Auf dieser Seite wird eine Verbindung zum Quakenet IRC-Servernetzwerk hergestellt um dem Illarion-Chat beizutreten. In diesem Chat gelten sowohl die <a href="<?php echo $url; ?>/illarion/de_rules.php">Regeln von Illarion</a> als auch die <a href="https://www.quakenet.org/">Regeln von Quakenet</a>.</p>
<p>Solltest du einen anderen IRC-Client verwenden wollen sind dies die nötigen Zugangsdaten:</p>
<dl>
	<dt>Server: irc.quakenet.org</dt>
	<dt>Channel: #illarion</dt>
</dl>

<p><span style="font-weight:bold;">Wichtig:</span> Javascript muss in deinem Browser aktiviert sein um den Chat-Client zu verwenden.</p>

<?php include_footer(); ?>