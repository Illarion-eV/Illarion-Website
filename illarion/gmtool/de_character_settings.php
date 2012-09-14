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

	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_character_settings.php' );
    includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_character_slider.php' );

	Page::setTitle( array( 'GM-Tool', 'Charakter' ) );
    Page::setDescription( 'Hier befindet sich eine Übersicht die Daten des Charakters' );
    Page::setKeywords( array( 'GM-Tool', 'Charakter', 'Informationen' ) );

    Page::addCSS( array( 'lightwindow', 'lightwindow_de' ) );
    Page::addCSS( array( 'menu', 'gmtool' ) );
	Page::addCSS( 'slider' );
    Page::addJavaScript( array( 'prototype', 'effects', 'slider', 'lightwindow') );

    Page::setXHTML();
    Page::Init();


	$server = ( isset( $_GET['server'] ) && $_GET['server'] == '1' ? 'testserver' : 'illarionserver');
	$charid = ( isset( $_GET['charid'] )  && is_numeric($_GET['charid']) ? (int)$_GET['charid'] : false );

	if (!$charid)
	{
		Messages::add( (Page::isGerman() ? 'Charakter ID wurde nicht richtig übergeben' : 'Character ID was not transfered correctly'), 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$char_data = getCharData( $charid, $server );
	$char_pic =	getPictureData($charid);
	$slider_info = getCharSilderInfos($charid, $server);

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

	<form action="<?php echo Page::getURL(); ?>/illarion/gmtool/de_character_settings.php?charid=<?php echo $charid; ?>&amp;server=<?php echo $_GET['server']; ?>" method="post">

            <table style="width:100%;">
                <tbody>
                    <tr>
                        <td>
                            Gewicht: <?php echo $slider_info['limit_text']['weight']; ?>
                        </td>
                        <td style="width:423px;">
                            <?php include_slider( $slider_info['limits'], 'weight' ); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Größe: <?php echo $slider_info['limit_text']['height']; ?>
                        </td>
                        <td>
                            <?php include_slider( $slider_info['limits'], 'bodyheight' ); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Alter: <?php echo $slider_info['limits']['minage']; ?> Jahre bis <?php echo $slider_info['limits']['maxage']; ?> Jahre
                        </td>
                        <td>
                            <?php include_slider( $slider_info['limits'], 'age' ); ?>
                            <p>
                                Geburtsdatum:
                                <select name="day" id="day" style="width:50px;margin-right:10px;">
                                    <?php for ($i = 1;$i <= 24;++$i): ?>
                                    <option value="<?php echo $i; ?>"<?php echo ($slider_info['dob']['day'] == $i ? ' selected="selected"' : '' ); ?>><?php echo $i; ?>.</option>
                                    <?php endfor; ?>
                                </select>
                                <select name="month" id="month" style="margin-left:10px;">
                                    <?php for ($i = 1;$i <= 16;++$i): ?>
                                    <option value="<?php echo $i; ?>"<?php echo ($slider_info['dob']['month'] == $i ? ' selected="selected"' : '' ); ?>><?php echo IllaDateTime::getMonthName( $i ); ?></option>
                                    <?php endfor; ?>
                                </select>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php include_heightweight_js( $slider_info['limits'] ); ?>
            <?php include_age_js( $slider_info['limits'] ); ?>

		<div class="spacer" />
		<div style='text-align:center;'>
        <input type="submit" name="submit" value="Änderungen speichern" />
        <input type="hidden" name="action" value="character_settings" />
		</div>
	</form>
