<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	if (!IllaUser::loggedIn())
	{
		header('HTTP/1.0 401 Unauthorized');
		exit();
	}

	includeWrapper::includeOnce( Page::getRootPath().'/community/account/inc_editinfos.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/community/account/new/inc_charcreate.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/community/account/new/def_charcreate.php' );

	$server = ( isset( $_GET['server'] ) && $_GET['server'] == '1' ? 'testserver' : 'illarionserver');
	$charid = ( isset( $_GET['charid'] )  && is_numeric($_GET['charid']) ? (int)$_GET['charid'] : false );
	if (!$charid)
	{
		exit('Fehler - Charakter ID wurde nicht richtig übergeben.');
	}

	$pgSQL =& Database::getPostgreSQL( $server );

	$query = 'SELECT chr_race, chr_sex'
	.PHP_EOL.' FROM chars'
	.PHP_EOL.' WHERE chr_playerid = '.$pgSQL->Quote( $charid )
	.PHP_EOL.' AND chr_accid = '.$pgSQL->Quote( IllaUser::$ID )
	;
	$pgSQL->setQuery( $query );
	list( $race, $sex ) = $pgSQL->loadRow();

	if ($race === null || $race === false)
	{
		header('HTTP/1.0 401 Unauthorized');
		exit();
	}

	$query = 'SELECT COUNT(*)'
	.PHP_EOL.' FROM player'
	.PHP_EOL.'WHERE ply_playerid = '.$pgSQL->Quote( $charid )
	;
	$pgSQL->setQuery( $query );
	if ($pgSQL->loadResult())
	{
		exit('Fehler - Werte wurden bereits gesetzt');
	}

	$account =& Database::getPostgreSQL( 'accounts' );

	$query = 'SELECT *'
	.PHP_EOL.' FROM raceattr'
	.PHP_EOL.' WHERE id IN ( -1, '.$account->Quote( $race ).' )'
	.PHP_EOL.' ORDER BY id DESC'
	;
	$account->setQuery( $query, 0, 1 );
	$limits = $account->loadAssocRow();

	$limits['curr_weight'] = 0;
	$limits['curr_bodyheight'] = 0;
	$limits['curr_age'] = 0;
	$dob= array( 'day' => 1, 'month' => 1 );

	calculateLimits( &$limits );
	$limit_text = generateLimitTexts( $limits );

	$enable_lightwindow = !( Page::getBrowserName() == 'msie' && Page::getBrowserVersion() <= 6 );

	if ($enable_lightwindow)
	{
		Page::setXML();
	}
	else
	{
		Page::setXHTML();
		Page::addJavaScript( 'prototype' );
		Page::addJavaScript( 'effects' );
		Page::addCSS( 'slider' );
		Page::addJavaScript( 'slider' );
		Page::addJavaScript( 'charcreate_search_color' );
	}

	Page::Init();
?>

<div>
	<h1>Schritt 2</h1>

	<form action="<?php echo Page::getURL(); ?>/community/account/new/de_newchar.php?charid=<?php echo $charid,($_GET['server'] == '1' ? '&amp;server=1' : ''); ?>" method="post" name="create_char" id="create_char">
		<div>
			<h2>Informationen</h2>
			<table style="width:100%;">
				<tbody>
					<tr>
						<td>
							Gewicht: <?php echo $limit_text['weight']; ?>
						</td>
						<td style="width:423px;">
							<?php include_slider( $limits, 'weight' ); ?>
						</td>
					</tr>
					<tr>
						<td>
							Größe: <?php echo $limit_text['height']; ?>
						</td>
						<td>
							<?php include_slider( $limits, 'bodyheight' ); ?>
						</td>
					</tr>
					<tr>
						<td>
							Alter: <?php echo $limits['minage']; ?> Jahre bis <?php echo $limits['maxage']; ?> Jahre
						</td>
						<td>
							<?php include_slider( $limits, 'age' ); ?>
							<p>
								Geburtsdatum:
								<select name="day" id="day" style="width:50px;margin-right:10px;">
									<?php for ($i = 1;$i <= 24;++$i): ?>
									<option value="<?php echo $i; ?>"<?php echo ($dob['day'] == $i ? ' selected="selected"' : '' ); ?>><?php echo $i; ?>.</option>
									<?php endfor; ?>
								</select>
								<select name="month" id="month" style="margin-left:10px;">
									<?php for ($i = 1;$i <= 16;++$i): ?>
									<option value="<?php echo $i; ?>"<?php echo ($dob['month'] == $i ? ' selected="selected"' : '' ); ?>><?php echo IllaDateTime::getMonthName( $i ); ?></option>
									<?php endfor; ?>
								</select>
							</p>
						</td>
					</tr>

				</tbody>
			</table>
			<?php include_heightweight_js( $limits ); ?>
            <?php include_age_js( $limits ); ?>

			<h2>Aussehen</h2>

			<?php $haircolors = char_create::getHairColors($race); ?>
			<?php $skincolors = char_create::getSkinColors($race); ?>
			<?php $hairvalues = char_create::getHairValues($race, $sex); ?>
			<?php $beardvalues = char_create::getBeardValues($race, $sex); ?>

			<?php $start_hair_value  = "_hair_1"; ?>
			<?php $start_beard_value = "_beard_0"; ?>
			<?php $start_skin_color  = $skincolors[mt_rand(0,41)]; ?>
			<?php $start_hair_color  = $haircolors[mt_rand(0,41)]; ?>

			<div style="background-image: url(<?php echo $url; ?>/shared/pics/char_screen.jpg);float:left;border:2px groove #000;width:300px;height:250px;">
			<div id="ajax_works" style='display:block;position:relative;left:5px;top:5px;width:32px;height:32px;margin-bottom:-32px;'></div>
			<img id="char_image" src="<?php echo char_create::getConvertedImageUrl(char_create::getImageName($race, $sex),substr($start_skin_color, 1)); ?>" style="position:relative;left:133px; top:73px;display:block;margin-bottom:-100px;" />
			<img src="/shared/pics/chars/<?php echo char_create::getImageName($race, $sex); ?>_cloth.png" style="display:block;position:relative;left:133px; top:73px;margin-bottom:-100px;" />
			<img id="hair_image" src="<?php echo char_create::getConvertedImageUrl(char_create::getImageName($race, $sex).$start_hair_value,substr($start_hair_color, 1)); ?>" style="display:block;position:relative;left:133px; top:73px;margin-bottom:-100px;" />
			<img id="beard_image" src="<?php echo char_create::getConvertedImageUrl(substr(char_create::getImageName($race, $sex), 0, -1)."m".$start_beard_value,substr($start_hair_color, 1)); ?>" style="position:relative;left:133px; top:73px;" />
			</div>

			<div style="height:250px;padding-left:320px;padding-right:20px;">

				Hautfarbe:
				<span id="skin_color" style="width:251px;height:30px;display:block;background-color:#<?php echo $start_skin_color; ?>;"></span>
				<input type="hidden" id="skincolor" value="<?php echo $start_skin_color; ?>" name="skincolor" />
                <?php foreach ( $skincolors as $color ):?>
                <a onclick="skinColorChange('<?php echo char_create::getImageName($race, $sex) ?>', '<?php echo substr($color, 1); ?>')" style="display: block;height: 10px;width: 10px;float: left;background-color: <?php echo $color; ?>;border: 1px solid black;"></a>
                <?php endforeach; ?>

				Haarfarbe:
				<span id="hair_color" style="width:251px;height:30px;display:block;background-color:#<?php echo $start_hair_color; ?>;"></span>
				<input type="hidden" id="haircolor" value="<?php echo $start_hair_color; ?>" name="haircolor" />
                <?php foreach ( $haircolors as $color ):?>
                <a onclick="hairChange('<?php echo char_create::getImageName($race, $sex) ?>', '<?php echo substr($color, 1); ?>')" style="display: block;height: 10px;width: 10px;float: left;background-color: <?php echo $color; ?>;border: 1px solid black;"></a>
                <?php endforeach; ?>
				Haare:
				<input type="hidden" id="hairvalue" value="<?php echo $start_hair_value; ?>" name="hairvalue" />
				<select name="hair" id="hair" onchange="hairChange('<?php echo char_create::getImageName($race, $sex); ?>', h_color)" style="width:100%;">
					<?php foreach( $hairvalues as $key => $hair ): ?>
						<option value="<?php echo $key; ?>"
						<?php if ($key == $start_hair_value) { echo ' selected="selected"'; } ?>
						><?php echo $hair; ?></option>
					<?php endforeach; ?>
				</select>

				<input type="hidden" id="beardvalue" value="<?php echo $start_beard_value; ?>" name="beardvalue" />
				<?php if (( $sex == GENDER_MALE) && ($race != RACE_ELF) && ($race != RACE_LIZARD) )
				{ ?>
					Bart:
					<select name="beard" id="beard" onchange="hairChange('<?php echo char_create::getImageName($race, $sex); ?>', h_color)" style="width:100%;">
						<?php foreach( $beardvalues as $key => $beard ): ?>
							<option value="<?php echo $key; ?>"
							<?php if ($key == $start_beard_value) { echo ' selected="selected"'; } ?>
							><?php echo $beard; ?></option>
						<?php endforeach; ?>
					</select>

				<?php } ?>
			</div>
			<div>
				<p style="text-align:center;padding-bottom:10px;">
					<input type="hidden" name="action" value="newchar_2" />
					<button onclick="document.forms.create_char.submit();" style="margin-right:10px;">Daten speichern</button>
					<?php if($enable_lightwindow): ?><button onclick="myLightWindow.deactivate();return false;" style="margin-left:10px;">Abbrechen</button><?php endif; ?>
				</p>
			</div>
		</div>
	</form>
</div>