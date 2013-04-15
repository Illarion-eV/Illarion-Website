<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	IllaUser::requireLogin();

	$server = ( isset( $_GET['server'] ) && $_GET['server'] == '1' ? 'devserver' : 'illarionserver');
	$charid = ( isset( $_GET['charid'] ) && is_numeric($_GET['charid']) ? (int)$_GET['charid'] : 0 );

	if (!$charid)
	{
		Messages::add( (Page::isGerman() ? 'Charakter ID wurde nicht richtig übergeben' : 'Character ID was not transferred correctly'), 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_charlist.php' );
		exit();
	}

	Page::Init();	

	$pgSQL =& Database::getPostgreSQL( $server );

	$query = 'SELECT COUNT(*)'
	.PHP_EOL.' FROM chars'
	.PHP_EOL.' WHERE chr_playerid = '.$pgSQL->Quote( $charid )
	;
	$pgSQL->setQuery( $query );

	if (!$pgSQL->loadResult())
	{
		Messages::add( (Page::isGerman() ? 'Charakter wurde nicht gefunden' : 'Character not found'), 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_charlist.php' );
		exit();
	}

	$descriptions = array();
	$query = 'SELECT chr_name, chr_shortdesc_de, chr_shortdesc_us'
	.PHP_EOL.' FROM chars'
	.PHP_EOL.' WHERE chr_playerid = '.$pgSQL->Quote( $charid )
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
	
	// value from post overwrite
	$descriptions['short_de'] = ( isset($_POST['short_de']) ? htmlspecialchars($_POST['short_de']) : ( $descriptions['short_de'] ? htmlspecialchars($descriptions['short_de']) : '' ) );
    $descriptions['short_us'] = ( isset($_POST['short_us']) ? htmlspecialchars($_POST['short_us']) : ( $descriptions['short_us'] ? htmlspecialchars($descriptions['short_us']) : '' ) );
    $descriptions['long_de']  = ( isset($_POST['long_de'])  ? htmlspecialchars($_POST['long_de'])  : ( $descriptions['long_de']  ? htmlspecialchars($descriptions['long_de'])  : '' ) );
    $descriptions['long_us']  = ( isset($_POST['long_us'])  ? htmlspecialchars($_POST['long_us'])  : ( $descriptions['long_us']  ? htmlspecialchars($descriptions['long_us'])  : '' ) );

	Page::setTitle( array( 'Account', 'Character Description', $charname ) );
	Page::setDescription( 'Character Description' );
	Page::setKeywords( array( 'Character', 'Account', 'Details', $charname ) );

	Page::setXHTML();

?>

<h1>Character Description</h1>

<h2>Short Description (Max 255 characters)</h2>

<form method="post" action="<?php echo Page::getURL(); ?>/illarion/gmtool/de_char_description.php?charid=<?php echo $charid; ?>&amp;server=<?php echo ($_GET['server']==1 ? 1 : 0); ?>" id="mainForm">
	<p>
		German<br />
		<input style="width:100%;" maxlength="255" type="text" name="short_de" value="<?php echo $descriptions['short_de']; ?>" />
	</p>

	<p>
		English<br />
		<input style="width:100%;" maxlength="255" type="text" name="short_us" value="<?php echo $descriptions['short_us']; ?>" />
	</p>

	<?php if ($server == 'illarionserver'): ?>

	<h2>Detailed Character Description</h2>

	<p>
		German<br />
		<textarea rows="8" cols="40" style="width:100%;" name="long_de"><?php echo $descriptions['long_de']; ?></textarea>
	</p>

	<p>
		English<br />
		<textarea rows="8" cols="40" style="width:100%;" name="long_us"><?php echo $descriptions['long_us']; ?></textarea>
	</p>

	<?php endif; ?>

	<p style="text-align:center;">
		<button onclick="document.forms.mainForm.submit()" style="margin-right:10px;">Save</button>
		<button onclick="document.forms.mainForm.reset()" style="margin-left:10px;">Back</button>
		<br /><br />
		<a href="<?php echo Page::getURL(); ?>/illarion/gmtool/de_character_settings.php?charid=<?php echo $charid; ?>&amp;server=<?php echo ($_GET['server']==1 ? 1 : 0); ?>">
			Back to Settings
		</a>
		<input type="hidden" name="action" value="char_description" />
	</p>
</form>
