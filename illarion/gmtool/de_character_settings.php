<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_topmenu.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_charactermenu.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_character_settings.php' );

	Page::Init();

	if (!IllaUser::auth('gmtool_chars'))
	{
		Messages::add('Zugriff verweigert', 'error');
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$server = ( isset( $_GET['server'] ) && $_GET['server'] == '1' ? 'testserver' : 'illarionserver');
	$charid = ( isset( $_GET['id'] )  && is_numeric($_GET['id']) ? (int)$_GET['id'] : false );

	if (!$charid)
	{
		Messages::add('Charakter ID wurde nicht richtig übergeben', 'error');
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$char_data = getCharData( $charid,$server );

	if (!$char_data || !count($char_data))
	{
		Messages::add('Charakter wurde nicht gefunden', 'error');
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	Page::setTitle( array( 'GM-Tool', 'Charakter', $char_data['chr_name'] ) );
	Page::setDescription( 'Hier befindet sich eine Übersicht die Daten des Charakters "'.$char_data['chr_name'].'"' );
	Page::setKeywords( array( 'GM-Tool', 'Charakter', 'Informationen', $char_data['chr_name'] ) );

	Page::addCSS( array( 'menu', 'gmtool' ) );

	Page::setXHTML();
	Page::Init();

	echo "<pre>";
	print_r($char_data);
	echo "</pre>";
?>

<h1>Charakter - <?php echo $char_data['chr_name']; ?></h1>

<?php include_menu(); ?>

<div class="spacer"></div>

<?php include_character_menu( $char_data['chr_playerid'], 1, $_GET['server'] ); ?>

<div style="float:left; height:200px; width:255px;vertical-align:middle;text-align:center;">
	<img src="<?php echo $chardata['picture']['file']; ?>" height="<?php echo $chardata['picture']['height']; ?>" width="<?php echo $chardata['picture']['width']; ?>" alt="Bild von <?php echo $chardata['chr_name']; ?>" />
</div>

<form action="<?php echo Page::getURL(); ?>/illarion/gmtool/de_character_settings.php?id=<?php echo $char_data['chr_playerid']; ?>&amp;server=<?php echo $_GET['server']; ?>" method="post">
	<div>
		<dl class="gmtool">
			<dt>Geburtstag</dt>
			<dd>moep</dd>
			<dt>Alter</dt>
			<dd>moep</dd>
			<dt>Größe</dt>
			<dd>moep</dd>
			<dt>Gewicht</dt>
			<dd><input type="text" name="name" value="<?php echo $char_data['chr_name']; ?>" /></dd>
		</dl>
		<div class="spacer" />
		<input type="submit" name="submit" value="Änderungen speichern" />
		<input type="hidden" name="action" value="character_settings" />
	</div>
</form>
