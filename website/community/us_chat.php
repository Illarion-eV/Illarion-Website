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

<?php include_footer(); ?>