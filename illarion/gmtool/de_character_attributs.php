<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_topmenu.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_charactermenu.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_character_attributs.php' );

	Page::Init();

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

	$count = ($char_data['ply_strength']+$char_data['ply_dexterity']+$char_data['ply_constitution']+$char_data['ply_agility']+$char_data['ply_intelligence']+$char_data['ply_perception']+$char_data['ply_willpower']+$char_data['ply_essence']);

	Page::setTitle( array( 'GM-Tool', 'Charakter', $char_data['chr_name'] ) );
	Page::setDescription( 'Hier befindet sich eine Übersicht die Daten des Charakters "'.$char_data['chr_name'].'"' );
	Page::setKeywords( array( 'GM-Tool', 'Charakter', 'Informationen', $char_data['chr_name'] ) );

	Page::addCSS( array( 'lightwindow', 'lightwindow_de' ) );
	Page::addCSS( array( 'menu', 'gmtool' ) );
	Page::addJavaScript( array( 'prototype', 'effects', 'lightwindow') );

	Page::setXHTML();
	Page::Init();

?>

<h1>Charakter - <?php echo $char_data['chr_name']; ?></h1>

<?php include_menu(); ?>

<div class="spacer"></div>

<?php include_character_menu( $charid, 1, $_GET['server'] ); ?>

<div class="spacer"></div>

<form action="<?php echo Page::getURL(); ?>/illarion/gmtool/de_character_attributs.php?charid=<?php echo $charid; ?>&amp;server=<?php echo $_GET['server']; ?>" method="post">
	<div>
		<dl class="gmtool">
			<dt>Stärke</dt>
			<dd><input type="text" name="name" value="<?php echo $char_data['ply_strength']; ?>" /></dd>
			<dt>Geschicklichkeit</dt>
			<dd><input type="text" name="name" value="<?php echo $char_data['ply_dexterity']; ?>" /></dd>
			<dt>Ausdauer</dt>
			<dd><input type="text" name="name" value="<?php echo $char_data['ply_constitution']; ?>" /></dd>
			<dt>Schnelligkeit</dt>
			<dd><input type="text" name="name" value="<?php echo $char_data['ply_agility']; ?>" /></dd>
			<dt>Intelligenz</dt>
			<dd><input type="text" name="name" value="<?php echo $char_data['ply_intelligence']; ?>" /></dd>
			<dt>Wahrnehmung</dt>
			<dd><input type="text" name="name" value="<?php echo $char_data['ply_perception']; ?>" /></dd>
			<dt>Willenskraft</dt>
			<dd><input type="text" name="name" value="<?php echo $char_data['ply_willpower']; ?>" /></dd>
			<dt>Essenz</dt>
			<dd><input type="text" name="name" value="<?php echo $char_data['ply_essence']; ?>" /></dd>
			<dt>&nbsp;</dt>
			<dd>&nbsp;</dd>
			<dt>Gesamt</dt>
			<dd><input type="text" name="name" value="<?php echo $count; ?>" /></dd>

		</dl>
		<div class="spacer" />
		<input type="submit" name="submit" value="Änderungen speichern" />
		<input type="hidden" name="action" value="character_attributs" />
	</div>
</form>