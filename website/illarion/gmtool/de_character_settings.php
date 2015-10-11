<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_topmenu.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_charactermenu.php' );

	Page::Init();

	if (!IllaUser::auth('gmtool_chars'))
	{
		Messages::add( (Page::isGerman() ? 'Zugriff verweigert' : 'Access denied'), 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_character.php' );

	Page::setTitle( array( 'GM-Tool', 'Charakter' ) );
    Page::setDescription( 'Hier befindet sich eine Übersicht die Daten des Charakters' );
    Page::setKeywords( array( 'GM-Tool', 'Charakter', 'Informationen' ) );

    Page::addCSS( array( 'lightwindow', 'lightwindow_de' ) );
    Page::addCSS( array( 'menu', 'gmtool' ) );
    Page::addJavaScript( array( 'prototype', 'effects', 'lightwindow') );

    Page::setXHTML();
    Page::Init();


	$server = ( isset( $_GET['server'] ) && $_GET['server'] == '1' ? 'devserver' : 'illarionserver');
	$charid = ( isset( $_GET['charid'] )  && is_numeric($_GET['charid']) ? (int)$_GET['charid'] : false );

	if (!$charid)
	{
		Messages::add( (Page::isGerman() ? 'Charakter ID wurde nicht richtig übergeben' : 'Character ID was not transferred correctly'), 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$char_data = getCharData( $charid, $server );
	$char_pic =	getPictureData($charid);

	if (!$char_data || !count($char_data))
	{
		Messages::add( (Page::isGerman() ? 'Charakter wurde nicht gefunden' : 'Character not found'), 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

?>
<h1>Charakterdetails - <?php echo $char_data['chr_name']; ?></h1>

<?php include_menu(); ?>

<div class="spacer"></div>

<?php include_character_menu( $charid, 1, $_GET['server'] ); ?>

<div class="spacer"></div>

<div style='height:200px;margin-top:30px;display:block;'>
	<div style="float:left; height:200px; width:255px;vertical-align:middle;text-align:center;">
	    <img src="<?php echo $char_pic['file']; ?>" height="<?php echo $char_pic['height']; ?>" width="<?php echo $char_pic['width']; ?>" alt="Bild von <?php echo $char_data['chr_name']; ?>" />
	</div>

	<div>
		<?php if ($server == "illarionserver") : ?>
        <dl>
            <dd>
                <a href="<?php echo Page::getURL(); ?>/illarion/gmtool/de_char_settings.php?charid=<?php echo $charid; ?>&amp;server=<?php echo $_GET['server']; ?>" onclick="myLightWindow.activateWindow({href:this.href,height:300,width:350,title:'Einstellungen von <?php echo str_replace("'", "\\'", $char_data['chr_name'] ); ?>'});return false;">
                        Einstellungen des Charakters bearbeiten
                </a>
            </dd>
            <dt>&nbsp;</dt>
            <dd>
			<?php if ($server == "illarionserver") : ?>
                <a href="<?php echo Page::getURL(); ?>/illarion/gmtool/de_char_picture.php?charid=<?php echo $charid; ?>&amp;server=<?php echo $_GET['server']; ?>" onclick="myLightWindow.activateWindow({href:this.href,height:410,width:400,title:'Bild von <?php echo str_replace("'", "\\'", $char_data['chr_name'] ); ?>'});return false;">
                        Bild des Charakters bearbeiten
                </a>
			<?php endif ?>
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
	<?php endif ?>
    </div>
</div>

