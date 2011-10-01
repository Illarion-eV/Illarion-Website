<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_topmenu.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_charactermenu.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_character.php' );

	if (!IllaUser::auth('gmtool_chars'))
	{
		Messages::add('Zugriff verweigert', 'error');
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$server = ( isset( $_GET['server'] ) && $_GET['server'] == '1' ? 'testserver' : 'illarionserver');
	$charid = ( isset( $_GET['charid'] )  && is_numeric($_GET['charid']) ? (int)$_GET['charid'] : false );

	if (!$charid)
	{
		Messages::add('Charakter ID wurde nicht richtig übergeben', 'error');
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$char_data = getCharData( $charid, $server );

	if (!$char_data || !count($char_data))
	{
		Messages::add('Charakter wurde nicht gefunden', 'error');
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	Page::setTitle( array( 'GM-Tool', 'Charakter', $char_data['charname'] ) );
	Page::setDescription( 'Hier befindet sich eine Übersicht die Daten des Charakters "'.$char_data['charname'].'"' );
	Page::setKeywords( array( 'GM-Tool', 'Charakter', 'Informationen', $char_data['charname'] ) );

	Page::addCSS( array( 'menu', 'gmtool' ) );

	Page::setXHTML();
	Page::Init();
?>

<h1>Charakter - <?php echo $char_data['charname']; ?></h1>

<?php include_menu(); ?>

<div class="spacer"></div>

<?php include_character_menu( $char_data['id'], 1 ); ?>

<h1>moep</h1>

<div>
<pre>
<?php print_r($char_data); ?>
</pre>
</div>