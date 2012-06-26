<?php
include ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
Page::setTitle( 'Illarion - Chat' );
Page::setDescription( 'This webchat client allows access to the Illarion IRC channel without an additional IRC client needed.' );
Page::setKeywords( array( 'Chat, IRC' ) );
Page::setXHTML();
Page::Init();
?>

<h1>Illarion IRC Chat</h1>


<p>This page establishes a connection to the Quakenet IRC
Server network and enters the Illarion Chatroom. <br />
In this chatroom the
<a href="<?php echo $url; ?>/illarion/us_rules.php">rules of Illarion</a> AND
the rules of <a href="http://www.quakenet.org/">Quakenet</a> apply.</p>

<p>In case you want to use a dedicated IRC client you may connect with the following information</p>
<dl>
	<dt>Server:</dt>
	<dd>irc.quakenet.org</dd>
	<dt>Channel:</dt>
	<dd>#illarion</dd>
</dl>

<p><span style="color:#F00;font-weight:bold;">Important:</span> Javascript must be enabled to use this chat client.</p>

<h2>Chat</h2>

<iframe src="http://webchat.quakenet.org/?channels=illarion&amp;uio=OT10cnVlJjExPTI0Ng32" width="700" height="500"></iframe>

<?php include_footer(); ?>