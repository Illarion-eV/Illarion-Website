<?php
include ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
Page::setTitle( 'Illarion - Chat' );
Page::setDescription( 'Dieser Webchat-Client ermöglicht den Zugriff auf den Illarion IRC Channel ohne einen zusätzlichen IRC-Clients.' );
Page::setKeywords( array( 'Chat, IRC' ) );
Page::setXHTML();
Page::Init();
?>

<h1>Illarion IRC-Chat</h1>


<p>Auf dieser Seite wird eine Verbindung zum Quakenet IRC-Servernetzwerk hergestellt um dem Illarion-Chat beizutreten.<br />
In diesem Chat gelten sowohl die <a href="<?php echo $url; ?>/illarion/de_rules.php">Regeln von Illarion</a> als auch die <a href="http://www.quakenet.org/">Regeln von Quakenet</a>.</p>
<p>Solltest du einen anderen IRC-Client verwenden wollen sind dies die nötigen Zugangsdaten:</p>
<dl>
	<dt>Server:</dt>
	<dd>irc.quakenet.org</dd>
	<dt>Channel:</dt>
	<dd>#illarion</dd>
</dl>

<p><span style="color:#F00;font-weight:bold;">Wichtig:</span> Javascript muss in deinem Browser aktiviert sein um den Chat-Client zu verwenden.</p>

<h2>Chat</h2>

<iframe src="http://webchat.quakenet.org/?randomnick=1&channels=illarion&amp;prompt=1&amp;uio=OT10cnVlJjExPTEzMw1a" width="700" height="500"></iframe>

<?php include_footer(); ?>