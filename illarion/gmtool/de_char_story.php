<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	IllaUser::requireLogin();

	$server = ( isset( $_GET['server'] ) && $_GET['server'] == '1' ? false : true );
	$charid = ( isset( $_GET['charid'] ) && is_numeric($_GET['charid']) ? (int)$_GET['charid'] : 0 );

	if (!$charid)
	{
		Messages::add('Charakter ID wurde nicht richtig übertragen.', 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/community/account/de_charlist.php' );
		exit();
	}

	if (!$server)
	{
		Messages::add('Nur für Spielserver Charaktere', 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/community/account/de_char_details.php' );
		exit();
	}

	$pgSQL =& Database::getPostgreSQL( );

	$query = 'SELECT chr_name'
	.PHP_EOL.' FROM illarionserver.chars'
	.PHP_EOL.' WHERE chr_playerid = '.$pgSQL->Quote( $charid )
	;
	$pgSQL->setQuery( $query );

	if (!$charname = $pgSQL->loadResult())
	{
		Messages::add('Charakter wurde nicht gefunden.', 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/community/account/de_charlist.php' );
		exit();
	}

	Page::setTitle( array( 'Account', 'Charaktergeschichte', $charname ) );
    Page::setDescription( 'Auf dieser Seite kann die Geschichte des Charakters geändert werden' );
    Page::setKeywords( 'Charakter', 'Account', 'Details', $charname );

    Page::setXHTML();
    Page::Init();


	$query = 'SELECT story_de, story_us'
	.PHP_EOL.' FROM homepage.character_details'
	.PHP_EOL.' WHERE char_id = '.$pgSQL->Quote( $charid )
	;
	$pgSQL->setQuery( $query );
	list($story_de, $story_us) = $pgSQL->loadRow();

	$story_de = ( isset($_POST['story_de']) ? htmlspecialchars($_POST['story_de']) : ( $story_de ? htmlspecialchars($story_de) : '' ) );
    $story_us = ( isset($_POST['story_us']) ? htmlspecialchars($_POST['story_us']) : ( $story_us ? htmlspecialchars($story_us) : '' ) );

?>

<h1>Charaktergeschichte</h1>

<form method="post" action="<?php echo Page::getURL(); ?>/illarion/gmtool/de_char_story.php?charid=<?php echo $charid; ?>&amp;server=<?php echo ($_GET['server']==1 ? 1 : 0); ?>" id="mainForm">
	<h2>Charaktergeschichte für das Webprofil</h2>

	<p>
		Deutsch<br />
		<textarea rows="8" cols="40" style="width:100%;" name="story_de"><?php echo $story_de; ?></textarea>
	</p>

	<p>
		Englisch<br />
		<textarea rows="8" cols="40" style="width:100%;" name="story_us"><?php echo $story_us; ?></textarea>
	</p>

	<p style="text-align:center;">
		<button onclick="document.forms.mainForm.submit()" style="margin-right:10px;">Speichern</button>
		<button onclick="document.forms.mainForm.reset()" style="margin-left:10px;">Zurücksetzen</button>
		<br /><br />
		<a href="<?php echo Page::getURL(); ?>/illarion/gmtool/de_character_settings.php?charid=<?php echo $charid; ?>&amp;server=<?php echo ($_GET['server']==1 ? 1 : 0); ?>">
			Zurück zu den Einstellungen
		</a>
		<input type="hidden" name="action" value="char_story" />
	</p>
</form>
