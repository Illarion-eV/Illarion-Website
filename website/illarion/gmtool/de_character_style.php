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
    includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_character_slider.php' );

	Page::setTitle( array( 'GM-Tool', 'Charakter' ) );
    Page::setDescription( 'Hier befindet sich eine Übersicht die Daten des Charakters' );
    Page::setKeywords( array( 'GM-Tool', 'Charakter', 'Informationen' ) );

    //Page::addCSS( array( 'lightwindow', 'lightwindow_de' ) );
    Page::addCSS( array( 'menu', 'gmtool' ) );
	Page::addCSS( 'slider' );
    Page::addJavaScript( array( 'prototype', 'effects', 'slider' ) );

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


</div>

	<form action="<?php echo Page::getURL(); ?>/illarion/gmtool/de_character_style.php?charid=<?php echo $charid; ?>&amp;server=<?php echo $_GET['server']; ?>" method="post">

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
                        </td>
                    </tr>
					<tr>
						<td>Geburtsdatum:</td>
						<td>
							 <p>
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
        <input type="hidden" name="action" value="character_style" />
		</div>
	</form>
