<?php
include ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
Page::setTitle( 'Illarion - TeamSpeak' );
Page::setDescription( 'Information about connecting to the Illarion TeamSpeak server.' );
Page::setKeywords( array( 'Chat, TeamSpeak' ) );
Page::setXHTML();
Page::Init();
?>

<h1>Illarion TeamSpeak chat</h1>


<p>Illarion's TeamSpeak server allows voice and text chat for the community and staff.<br />
On the TeamSpeak server the
<a href="<?php echo $url; ?>/illarion/us_rules.php">rules of Illarion</a> apply.</p>

<p>The <a href="http://teamspeak.com/?page=downloads" target="_blank">TeamSpeak 3 Client</a> is required to connect to the chat server.</p>

<dl>
	<dt>Server address:</dt>
	<dd><a href="ts3server://illarion.org">illarion.org</a></dd>
</dl>

<?php include_footer(); ?>