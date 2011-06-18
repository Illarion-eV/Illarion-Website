<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	IllaUser::requireLogin();

	$server = ( isset( $_GET['server'] ) && $_GET['server'] == '1' ? 'testserver' : 'illarionserver');
	$charid = ( isset( $_GET['charid'] ) && is_numeric($_GET['charid']) ? (int)$_GET['charid'] : 0 );

	if (!$charid)
	{
		Messages::add('Charakter ID wurde nicht richtig übertragen.', 'error' );
		include_once('de_charlist.php');
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
		Messages::add('Charakter wurde nicht gefunden.', 'error' );
		include_once('de_charlist.php');
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
		$mySQL =& Database::getMySQL();
		$query = 'SELECT `description_de`, `description_us`'
		.PHP_EOL.' FROM `homepage_character_details`'
		.PHP_EOL.' WHERE `char_id` = '.$mySQL->Quote( $charid )
		;
		$mySQL->setQuery( $query );
		list($descriptions['long_de'], $descriptions['long_us']) = $mySQL->loadRow();
	}

	$descriptions['short_de'] = ( $descriptions['short_de'] ? htmlspecialchars($descriptions['short_de']) : '' );
	$descriptions['short_us'] = ( $descriptions['short_us'] ? htmlspecialchars($descriptions['short_us']) : '' );
	$descriptions['long_de']  = ( $descriptions['long_de']  ? htmlspecialchars($descriptions['long_de'])  : '' );
	$descriptions['long_us']  = ( $descriptions['long_us']  ? htmlspecialchars($descriptions['long_us'])  : '' );

	Page::setTitle( array( 'Account', 'Charakterbeschreibung', $charname ) );
	Page::setDescription( 'Auf dieser Seite kann die Beschreibung des Charakters geändert werden.' );
	Page::setKeywords( array( 'Charakter', 'Account', 'Details', $charname ) );

	Page::setXHTML();

?>

<h1>Charakterbeschreibung</h1>

<h2>Kurzbeschreibung (maximal 255 Zeichen)</h2>

<form method="post" action="<?php echo Page::getURL(); ?>/community/account/de_char_description.php?charid=<?php echo $charid; ?>&amp;server=<?php echo ($_GET['server']==1 ? 1 : 0); ?>" id="mainForm">
	<p>
		Deutsch<br />
		<input style="width:100%;" maxlength="255" type="text" name="short_de" value="<?php echo $descriptions['short_de']; ?>" />
	</p>

	<p>
		Englisch<br />
		<input style="width:100%;" maxlength="255" type="text" name="short_us" value="<?php echo $descriptions['short_us']; ?>" />
	</p>

	<?php if ($server == 'illarionserver'): ?>

	<h2>Ausführliche Beschreibung für das Charakter Webprofil</h2>

	<p>
		Deutsch<br />
		<textarea rows="8" cols="40" style="width:100%;" name="long_de"><?php echo $descriptions['long_de']; ?></textarea>
	</p>

	<p>
		Englisch<br />
		<textarea rows="8" cols="40" style="width:100%;" name="long_us"><?php echo $descriptions['long_us']; ?></textarea>
	</p>

	<?php endif; ?>

	<p style="text-align:center;">
		<button onclick="document.forms.mainForm.submit()" style="margin-right:10px;">Speichern</button>
		<button onclick="document.forms.mainForm.reset()" style="margin-left:10px;">Zurücksetzen</button>
		<br /><br />
		<a href="<?php echo Page::getURL(); ?>/community/account/de_char_details.php?charid=<?php echo $charid; ?>&amp;server=<?php echo ($_GET['server']==1 ? 1 : 0); ?>">
			Zurück zu den Details
		</a>
		<input type="hidden" name="action" value="char_description" />
	</p>
</form>