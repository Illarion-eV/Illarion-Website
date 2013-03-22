<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	IllaUser::requireLogin();

	$server = ( isset( $_GET['server'] ) && $_GET['server'] == '1' ? false : true );
	$charid = ( isset( $_GET['charid'] ) && is_numeric($_GET['charid']) ? (int)$_GET['charid'] : 0 );

	if (!$charid)
	{
		Messages::add('Character ID was not transfered successfully.', 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/community/account/us_charlist.php' );
		exit();
	}

	if (!$server)
	{
		Messages::add('Only for gameserver characters', 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/community/account/us_char_details.php' );
		exit();
	}

	$pgSQL =& Database::getPostgreSQL( 'illarionserver' );

	$query = 'SELECT chr_name'
	.PHP_EOL.' FROM chars'
	.PHP_EOL.' WHERE chr_accid = '.$pgSQL->Quote( IllaUser::$ID )
	.PHP_EOL.' AND chr_playerid = '.$pgSQL->Quote( $charid )
	;
	$pgSQL->setQuery( $query );

	if (!$charname = $pgSQL->loadResult())
	{
		Messages::add('Character was not found.', 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/community/account/us_charlist.php' );
		exit();
	}

	$db_hp =& Database::getPostgreSQL( 'homepage' );
	$query = 'SELECT story_de, story_us'
	.PHP_EOL.' FROM character_details'
	.PHP_EOL.' WHERE char_id = '.$db_hp->Quote( $charid )
	;
	$db_hp->setQuery( $query );
	list($story_de, $story_us) = $db_hp->loadRow();

	$story_de = ( $story_de ? htmlspecialchars($story_de) : '' );
	$story_us = ( $story_us ? htmlspecialchars($story_us) : '' );

	Page::setTitle( array( 'Account', 'Characterstory', $charname ) );
	Page::setDescription( 'On this page you can edit the story of a character' );
	Page::setKeywords( 'Character', 'Account', 'Details', $charname );

	Page::setXHTML();
	Page::Init();
?>

<h1>Characterstory</h1>

<form method="post" action="<?php echo Page::getURL(); ?>/community/account/us_char_story.php?charid=<?php echo $charid; ?>" id="mainForm">
	<h2>Charaktergeschichte für das Webprofil</h2>

	<p>
		English<br />
		<textarea rows="8" cols="40" style="width:100%;" name="story_us"><?php echo $story_us; ?></textarea>
	</p>

	<p>
		German<br />
		<textarea rows="8" cols="40" style="width:100%;" name="story_de"><?php echo $story_de; ?></textarea>
	</p>

	<p style="text-align:center;">
		<button onclick="document.forms.mainForm.submit()" style="margin-right:10px;">Save</button>
		<button onclick="document.forms.mainForm.reset()" style="margin-left:10px;">Reset</button>
		<br /><br />
		<a href="<?php echo Page::getURL(); ?>/community/account/us_char_details.php?charid=<?php echo $charid; ?>">
			Back to details
		</a>
		<input type="hidden" name="action" value="char_story" />
	</p>
</form>
