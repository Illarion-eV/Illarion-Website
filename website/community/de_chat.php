<?php
include ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
Page::setTitle( 'Illarion - Chat' );
Page::setDescription( 'Dieser Webchat-Client ermöglicht den Zugriff auf den Illarion IRC Channel ohne einen zusätzlichen IRC-Clients.' );
Page::setKeywords( array( 'Chat, IRC' ) );
Page::setXHTML();
Page::Init();
?>

<h1>Illarion Chat</h1>

<h2>Illarion Discord-Server</h2>

<iframe src="https://discordapp.com/widget?id=401855954272124940&amp;theme=dark" width="700" height="500" allowtransparency="true" frameborder="0"></iframe>

<h3>Information über Discord</h3>

<p>Auf dieser Seite wird eine Verbindung zu Discord hergestellt um dem Illarion-Chat beizutreten. In diesem Chat gelten sowohl die <a href="<?php echo $url; ?>/illarion/de_rules.php">Regeln von Illarion</a> als auch die <a href="https://discordapp.com/guidelines">Regeln von Discord</a>.</p>

<p>Solltest du dich direkt mit Discord verbinden wollen, hier der nötige Einladungslink: <a href="https://discord.gg/yj3htPN">https://discord.gg/yj3htPN</a></p>

<h2>Illarion IRC-Chat</h2>

<iframe src="https://webchat.quakenet.org/?channels=illarion&amp;uio=OT10cnVlJjExPTEzMw1a" width="700" height="500"></iframe>

<h3>Information über IRC</h3>

<p>Auf dieser Seite wird eine Verbindung zum Quakenet IRC-Servernetzwerk hergestellt um dem Illarion-Chat beizutreten. In diesem Chat gelten sowohl die <a href="<?php echo $url; ?>/illarion/de_rules.php">Regeln von Illarion</a> als auch die <a href="https://www.quakenet.org/">Regeln von Quakenet</a>.</p>

<p>Solltest du einen anderen IRC-Client verwenden wollen sind dies die nötigen Zugangsdaten:</p>
<dl>
	<dt>Server: irc.quakenet.org</dt>
	<dt>Channel: #illarion</dt>
</dl>

<p><span style="font-weight:bold;">Wichtig:</span> Javascript muss in deinem Browser aktiviert sein um den Chat-Client zu verwenden.</p>

<?php include_footer(); ?>