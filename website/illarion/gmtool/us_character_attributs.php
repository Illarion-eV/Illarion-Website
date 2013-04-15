<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_topmenu.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_charactermenu.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_character.php' );

	if (!IllaUser::auth('gmtool_chars'))
	{	
		Messages::add( (Page::isGerman() ? 'Zugriff verweigert' : 'Access denied'), 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$server = ( isset( $_GET['server'] ) && $_GET['server'] == '1' ? 'devserver' : 'illarionserver');
	$charid = ( isset( $_GET['charid'] )  && is_numeric($_GET['charid']) ? (int)$_GET['charid'] : false );

	if (!$charid)
	{
		Messages::add( (Page::isGerman() ? 'Charakter ID wurde nicht richtig übergeben' : 'Character ID was not transferred correctly'), 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

    Page::setTitle( array( 'GM-Tool', 'Charakter') );
    Page::setDescription( 'Character Skills Overview' );
    Page::setKeywords( array( 'GM Tool', 'Character', 'Information' ) );

    Page::addCSS( array( 'menu', 'gmtool' ) );

    Page::setXHTML();
    Page::Init();


	$char_data = getCharAttrib( $charid, $server );

	if (!$char_data || !count($char_data))
	{
		Messages::add( (Page::isGerman() ? 'Charakter wurde nicht gefunden' : 'Character not found'), 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$count = ($char_data['ply_strength']+$char_data['ply_dexterity']+$char_data['ply_constitution']+$char_data['ply_agility']+$char_data['ply_intelligence']+$char_data['ply_perception']+$char_data['ply_willpower']+$char_data['ply_essence']);

?>

<h1>Character - <?php echo $char_data['chr_name']; ?></h1>

<?php include_menu(); ?>

<div class="spacer"></div>

<?php include_character_menu( $charid, 3, $_GET['server'] ); ?>

<div class="spacer"></div>

<form action="<?php echo Page::getURL(); ?>/illarion/gmtool/de_character_attributs.php?charid=<?php echo $charid; ?>&amp;server=<?php echo $_GET['server']; ?>" method="post">
	<div>
		<dl class="gmtool">
			<dt>Strength</dt>
			<dd><input type="text" name="strength" value="<?php echo $char_data['ply_strength']; ?>" /></dd>
			<dt>Dexterity</dt>
			<dd><input type="text" name="dexterity" value="<?php echo $char_data['ply_dexterity']; ?>" /></dd>
			<dt>Constitution</dt>
			<dd><input type="text" name="constitution" value="<?php echo $char_data['ply_constitution']; ?>" /></dd>
			<dt>Agility</dt>
			<dd><input type="text" name="agility" value="<?php echo $char_data['ply_agility']; ?>" /></dd>
			<dt>Intelligence</dt>
			<dd><input type="text" name="intelligence" value="<?php echo $char_data['ply_intelligence']; ?>" /></dd>
			<dt>Perception</dt>
			<dd><input type="text" name="perception" value="<?php echo $char_data['ply_perception']; ?>" /></dd>
			<dt>Willpower</dt>
			<dd><input type="text" name="willpower" value="<?php echo $char_data['ply_willpower']; ?>" /></dd>
			<dt>Essence</dt>
			<dd><input type="text" name="essence" value="<?php echo $char_data['ply_essence']; ?>" /></dd>
			<dt>&nbsp;</dt>
			<dd>&nbsp;</dd>
			<dt>Total</dt>
			<dd><input type="text" name="count" value="<?php echo $count; ?>" /></dd>

		</dl>
		<div class="spacer" />
		<input type="submit" name="submit" value="Save Changes" />
		<input type="hidden" name="action" value="character_attributs" />
	</div>
</form>
