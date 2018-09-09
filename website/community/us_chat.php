<?php
include ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
Page::setTitle( 'Illarion - Chat' );
Page::setDescription( 'This page allows access to the Illarion chat without an additional client needed.' );
Page::setKeywords( array( 'Chat, IRC' ) );
Page::setXHTML();
Page::Init();
?>

<h1>Illarion Chat</h1>

<h2>Illarion Discord Server</h2>

<iframe src="https://discordapp.com/widget?id=401855954272124940&amp;theme=dark" width="700" height="500" allowtransparency="true" frameborder="0"></iframe>

<h3>Information about Discord</h3>

<p>This page establishes a connection to Discord to join the Illarion server. On this server, the <a href="<?php echo $url; ?>/illarion/us_rules.php">rules of Illarion</a> and the <a href="https://discordapp.com/guidelines">rules of Discord</a> apply.</p>

<p>If you want to connect directly to Discord, here is the invitation link: <a href="https://discord.gg/yj3htPN">https://discord.gg/yj3htPN</a></p>

<h2>Illarion IRC Chat</h2>

<iframe src="https://webchat.quakenet.org/?channels=illarion&amp;uio=OT10cnVlJjExPTEzMw1a" width="700" height="500"></iframe>

<h3>Information about IRC</h3>

<p>This applet establishes a connection to the Quakenet IRC
Server network and enters the Illarion Chat room. In this chat room the
<a href="<?php echo $url; ?>/illarion/us_rules.php">rules of Illarion</a> and
the rules of <a href="http://www.quakenet.org/">Quakenet</a> apply.</p>

<p>In case you want to use a dedicated IRC client you may connect with the following information</p>
<dl>
	<dt>Server: irc.quakenet.org</dt>
	<dt>Channel: #illarion</dt>
</dl>

<p><span style="font-weight:bold;">Important:</span> Javascript must be enabled to use this chat client.</p>

<?php include_footer(); ?>