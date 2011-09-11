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


			<div style="background-image: url(<?php echo $url; ?>/shared/pics/char_screen.jpg);float:left;border:2px groove #000;width:300px;height:250px;">
			<div id="ajax_works" style='display:block;position:relative;left:5px;top:5px;width:32px;height:32px;margin-bottom:-32px;'></div>
			<img id="char_image" src="<?php echo char_create::getConvertedImageUrl(char_create::getImageName($race, $sex),"CA9E78"); ?>" style="position:relative;left:133px; top:73px;display:block;margin-bottom:-80px;" />
			<img src="/shared/pics/chars/<?php echo char_create::getImageName($race, $sex); ?>_cloth.png" style="position:relative;left:133px; top:73px;" />
			</div>

			<div style="background-color:#990000;height:250px;padding-left:320px;padding-right:20px;">
				<?php $skincolors = char_create::getSkinColors($race); ?>
				Hautfarbe:
				<span id="skin_color" style="width:97%;height:30px;display:block;background-color:#CA9E78;"></span>
				<input type="hidden" id="skincolor" value="" name="skincolor" />
                <?php foreach ( $skincolors as $color ):?>
                <a onclick="colorChange('<?php echo substr($color, 1); ?>', '<?php echo char_create::getImageName($race, $sex) ?>')" style="display: block;height: 10px;width: 10px;float: left;background-color: <?php echo $color; ?>;border: 1px solid black;"></a>
                <?php endforeach; ?>


				<?php $skincolors = char_create::getSkinColors($race); ?>
				Haarfarbe:
				<span id="hair_color" style="width:97%;height:30px;display:block;background-color:#CA9E78;"></span>
				<input type="hidden" id="haircolor" value="" name="skincolor" />
                <?php foreach ( $skincolors as $color ):?>
                <a onclick="colorChange('<?php echo substr($color, 1); ?>', '<?php echo char_create::getImageName($race, $sex) ?>')" style="display: block;height: 10px;width: 10px;float: left;background-color: <?php echo $color; ?>;border: 1px solid black;"></a>
                <?php endforeach; ?>

				Haare:
				<select name="hair" style="width:100%;">
					<?php foreach( char_create::getHairvalues($race, $sex) as $hair ): ?>
						<option value="<?php echo $hair; ?>"><?php echo $hair; ?></option>
					<?php endforeach; ?>
				</select>

				<?php
				echo $sex."-".GENDER_MALE."<br/>";
				echo $race."-".RACE_ELF."-".RACE_LIZARD."<br/>";
				?>
				<?php //if (($sex == GENDER_MALE) && ($race != RACE_ELF) && ($race != RACE_LIZARD))
				if ($sex == 300)?>
				<?php { ?>
					Bart:
					<select name="beard" style="width:100%;">
						<option value="1">Eins</option>
						<option value="2">Zwei</option>
					</select>
				<?php } ?>
			</div>
			<div style="background-color:#009900;">
				<p style="text-align:center;padding-bottom:10px;">
					<input type="hidden" name="action" value="newchar_2" />
					<button onclick="document.forms.create_char.submit();" style="margin-right:10px;">Daten speichern</button>
					<?php if($enable_lightwindow): ?><button onclick="myLightWindow.deactivate();return false;" style="margin-left:10px;">Abbrechen</button><?php endif; ?>
				</p>
			</div>
		</div>
	</form>
</div>