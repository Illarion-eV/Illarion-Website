<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	IllaUser::requireLogin();

	$server = ( isset( $_GET['server'] ) && $_GET['server'] == '1' ? 'devserver' : 'illarionserver');
	$charid = ( isset( $_GET['charid'] ) && is_numeric($_GET['charid']) ? (int)$_GET['charid'] : false );

	if (!$charid)
	{
		Messages::add('Character ID was not transfered correctly.', 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/community/account/us_charlist.php' );
		exit();
	}

	$pgSQL =& Database::getPostgreSQL( $server );

	$query = 'SELECT COUNT(*)'
	.PHP_EOL.' FROM chars'
	.PHP_EOL.' WHERE chr_accid = '.$pgSQL->Quote( IllaUser::$ID )
	.PHP_EOL.' AND chr_playerid = '.$pgSQL->Quote( $charid )
	;
	$pgSQL->setQuery( $query );

	if (!$pgSQL->loadResult())
	{
		Messages::add('Character was not found.', 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/community/account/us_charlist.php' );
		exit();
	}

	Page::Init();

	$descriptions = array();
	$query = 'SELECT chr_name, chr_shortdesc_de, chr_shortdesc_us'
	.PHP_EOL.' FROM chars'
	.PHP_EOL.' WHERE chr_accid = '.$pgSQL->Quote( IllaUser::$ID )
	.PHP_EOL.' AND chr_playerid = '.$pgSQL->Quote( $charid )
	;
	$pgSQL->setQuery( $query );
	list($charname, $descriptions['short_de'], $descriptions['short_us']) = $pgSQL->loadRow();

	if ($server == 'illarionserver')
	{
		$db_hp =& Database::getPostgreSQL( 'homepage' );
		$query = 'SELECT description_de, description_us'
		.PHP_EOL.' FROM character_details'
		.PHP_EOL.' WHERE char_id = '.$db_hp->Quote( $charid )
		;
		$db_hp->setQuery( $query );
		list($descriptions['long_de'], $descriptions['long_us']) = $db_hp->loadRow();
	}

	$descriptions['short_de'] = ( $descriptions['short_de'] ? htmlspecialchars($descriptions['short_de']) : '' );
	$descriptions['short_us'] = ( $descriptions['short_us'] ? htmlspecialchars($descriptions['short_us']) : '' );
	$descriptions['long_de']  = ( $descriptions['long_de']  ? htmlspecialchars($descriptions['long_de'])  : '' );
	$descriptions['long_us']  = ( $descriptions['long_us']  ? htmlspecialchars($descriptions['long_us'])  : '' );

	Page::setTitle( array( 'Account', 'Character description', $charname ) );
	Page::setDescription( 'On this page you can edit the description of a character.' );
	Page::setKeywords( array( 'Character', 'Account', 'Details', $charname ) );

	Page::setXHTML();
?>
<h1>Character Description</h1>

<h2>Short description (not more then 255 characters)</h2>

<form method="post" action="<?php echo Page::getURL(); ?>/community/account/us_char_description.php?charid=<?php echo $charid,($server == 'devserver' ? '&amp;server=1' : ''); ?>" id="mainForm">
	<p>
		English<br />
		<input style="width:100%;" maxlength="255" type="text" name="short_us" value="<?php echo $descriptions['short_us']; ?>" />
	</p>

	<p>
		German<br />
		<input style="width:100%;" maxlength="255" type="text" name="short_de" value="<?php echo $descriptions['short_de']; ?>" />
	</p>

	<?php if ($server == 'illarionserver'): ?>
	<h2>Detailed description for the web profil</h2>

	<p>
		English<br />
		<textarea rows="8" cols="40" style="width:100%;" name="long_us"><?php echo $descriptions['long_us']; ?></textarea>
	</p>

	<p>
		German<br />
		<textarea rows="8" cols="40" style="width:100%;" name="long_de"><?php echo $descriptions['long_de']; ?></textarea>
	</p>
	<?php endif; ?>

	<p style="text-align:center;">
		<button onclick="document.forms.mainForm.submit()" style="margin-right:10px;">Save</button>
		<button onclick="document.forms.mainForm.reset()" style="margin-left:10px;">Reset</button>
		<br /><br />
		<a href="<?php echo Page::getURL(); ?>/community/account/us_char_details.php?charid=<?php echo $charid,($server == 'devserver' ? '&amp;server=1' : ''); ?>">
			Back to the details
		</a>
		<input type="hidden" name="action" value="char_description" />
	</p>
</form>
