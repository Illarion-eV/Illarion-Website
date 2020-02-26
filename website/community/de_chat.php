<?php
include ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
Page::setTitle( 'Illarion - Chat' );
Page::setDescription( 'Diese Seite ermöglicht den Zugriff auf den Illarion-Chat ohne einen zusätzlichen Client.' );
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

<?php include_footer(); ?>