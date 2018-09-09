<?php
include ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
Page::setTitle( 'Illarion - Chat' );
Page::setDescription( 'This webchat client allows access to the Illarion IRC channel without an additional IRC client needed.' );
Page::setKeywords( array( 'Chat, IRC' ) );
Page::setXHTML();
Page::Init();
?>

<h1>Illarion IRC Chat</h1>

<h2>Chat</h2>

<iframe src="https://webchat.quakenet.org/?channels=illarion&uio=OT10cnVlJjExPTEzMw1a" width="700" height="500"></iframe>

<h2>Information</h2>

<p>This page establishes a connection to the Quakenet IRC
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