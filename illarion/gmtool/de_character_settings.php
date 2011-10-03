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

	Page::setTitle( array( 'GM-Tool', 'Charakter', $char_data['chr_name'] ) );
	Page::setDescription( 'Hier befindet sich eine Übersicht die Daten des Charakters "'.$char_data['chr_name'].'"' );
	Page::setKeywords( array( 'GM-Tool', 'Charakter', 'Informationen', $char_data['chr_name'] ) );

	Page::addCSS( array( 'lightwindow', 'lightwindow_de' ) );
	Page::addCSS( array( 'menu', 'gmtool' ) );
	Page::addJavaScript( array( 'prototype', 'effects', 'lightwindow') );

	Page::setXHTML();
	Page::Init();

	echo "<pre>";
	print_r($char_data);
	echo "</pre>";
?>

<h1>Charakter - <?php echo $char_data['chr_name']; ?></h1>

<?php include_menu(); ?>

<div class="spacer"></div>

<?php include_character_menu( $charid, 1, $_GET['server'] ); ?>

<div class="spacer"></div>

<form action="<?php echo Page::getURL(); ?>/illarion/gmtool/de_character_settings.php?charid=<?php echo $charid; ?>&amp;server=<?php echo $_GET['server']; ?>" method="post">
	<div>
		<dl class="gmtool">
			<dt>Geburtstag</dt>
			<dd><?php echo $char_data['ply_dob']['day'],'. ',IllaDateTime::getMonthName( $char_data['ply_dob']['month'] ),' ',($char_data['ply_dob']['year']>0 ? $char_data['ply_dob']['year'].' n.VdH' : (-$char_data['ply_dob']['year']).' v.VdH' ); ?></dd>
			<dt>Alter</dt>
			<dd><?php echo $char_data['ply_dob']['age']; ?> Jahre</dd>
			<dt>Größe</dt>
			<dd><?php echo $char_data['ply_body_height']; ?></dd>
			<dt>Gewicht</dt>
			<dd><?php echo $char_data['ply_weight']; ?></dd>
			<dt>&nbsp;</dt>
			<dd>
				<a href="<?php echo Page::getURL(); ?>/illarion/gmtool/de_char_settings.php?charid=<?php echo $charid; ?>&amp;server=<?php echo $_GET['server']; ?>" onclick="myLightWindow.activateWindow({href:this.href,height:300,width:350,title:'Einstellungen von <?php echo str_replace("'", "\\'", $char_data['chr_name'] ); ?>'});return false;">
						Einstellungen des Charakters bearbeiten
				</a>
			</dd>
			<dt>&nbsp;</dt>
			<dd>
				<a href="<?php echo Page::getURL(); ?>/illarion/gmtool/de_char_picture.php?charid=<?php echo $charid; ?>&amp;server=<?php echo $_GET['server']; ?>" onclick="myLightWindow.activateWindow({href:this.href,height:410,width:400,title:'Bild von <?php echo str_replace("'", "\\'", $chardata['chr_name'] ); ?>'});return false;">
						Bild des Charakters bearbeiten
				</a>
			</dd>
			<dt>&nbsp;</dt>
			<dd>
				<a href="<?php echo Page::getURL(); ?>/illarion/gmtool/de_char_description.php?charid=<?php echo $charid; ?>&amp;server=<?php echo $_GET['server']; ?>">
						Beschreibung des Charakters bearbeiten
				</a>
			</dd>
			<dt>&nbsp;</dt>
			<dd>
				<a href="<?php echo Page::getURL(); ?>/illarion/gmtool/de_char_story.php?charid=<?php echo $charid; ?>&amp;server=<?php echo $_GET['server']; ?>">
						Geschichte des Charakters bearbeiten
				</a>
			</dd>
		</dl>
		<div class="spacer" />
		<input type="submit" name="submit" value="Änderungen speichern" />
		<input type="hidden" name="action" value="character_settings" />
	</div>
</form>