<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	if (!IllaUser::loggedIn())
	{
		header('HTTP/1.0 401 Unauthorized');
		exit();
	}

	includeWrapper::includeOnce( Page::getRootPath().'/community/account/inc_editinfos.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/community/account/inc_charcreate.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/community/account/def_charcreate.php' );

	$server = ( isset( $_GET['server'] ) && $_GET['server'] == '1' ? 'testserver' : 'illarionserver');

	if ( !isset( $_GET['charid'] ) || !is_numeric( $_GET['charid'] ) )
	{
		exit('Error - Character ID got not transferred correctly.');
	}

	$pgSQL & Database::getPostgreSQL( $server );

	$query = 'SELECT chr_name, chr_race, chr_sex, chr_status, ply_body_height, ply_weight, ply_dob, ply_age, ply_hair, ply_beard, ply_skinred, ply_skingreen, ply_skinblue, ply_hairred, ply_hairgreen, ply_hairblue'
	.PHP_EOL.' FROM player'
	.PHP_EOL.' INNER JOIN chars ON chr_playerid = ply_playerid'
	.PHP_EOL.' WHERE ply_playerid = '.$pgSQL->Quote( (int)$_GET['charid'] )
	.PHP_EOL.' AND chr_accid = '.$pgSQL->Quote( IllaUser::$ID )
	;
	$pgSQL->setQuery( $query );
	$char_data = $pgSQL->loadAssocRow();

	if ( $char_data == null || ($char_data['ply_dob'] > 0 && $char_data['chr_status'] != 40))
	{
		header('HTTP/1.0 401 Unauthorized');
		exit();
	}
	
	$race = $char_data['chr_race'];
	$sex = $char_data['chr_sex'];

	$query = 'SELECT "minage", "maxage", "minweight", "maxweight", "minbodyheight", "maxbodyheight"'
	.PHP_EOL.' FROM "'.$server.'"."raceattr"'
	.PHP_EOL.' WHERE "id" IN ( -1, '.$pgSQL->Quote( $race ).' )'
	.PHP_EOL.' ORDER BY "id" DESC'
	;
	$pgSQL->setQuery( $query, 0, 1 );
	$limits = $pgSQL->loadAssocRow();

	$limits['curr_weight'] = $char_data['ply_weight'];
	$limits['curr_bodyheight'] = $char_data['ply_body_height'];
	if ($char_data['ply_dob'] > 0)
	{
		$limits['curr_age'] = calculateAge($char_data['ply_dob']);
		$dob = IllaDateTime::IllaDatestampToDate( $char_data['ply_dob'] );
	}
	else
	{
		$limits['curr_age'] = $char_data['ply_age'];
		$dob= array( 'day' => 1, 'month' => 1 );
	}

	calculateLimits( $limits );
	if ($char_data['chr_status'] == 40 )
	{
		$limit_text = generateLimitTexts( $limits );
	}

	$enable_lightwindow = false;

	if ($enable_lightwindow)
	{
		Page::setXML();
	}
	else
	{
		Page::setXHTML();
		Page::addJavaScript( array( 'prototype', 'effects' ) );
		Page::addCSS( 'slider' );
		Page::addJavaScript( 'slider' );
		Page::addJavaScript( 'charcreate_search_color' );
	}
	Page::Init();
	
	$haircolors = char_create::getHairColors($race);
	$skincolors = char_create::getSkinColors($race);
	$hairvalues = char_create::getHairValues($race, $sex, IllaUser::$lang);
	$beardvalues = char_create::getBeardValues($race, IllaUser::$lang);
	$start_hair_value  = "_hair_".$char_data["ply_hair"];
	$start_beard_value = "_beard_".$char_data["ply_beard"];
	if ($char_data["ply_skinred"] == "0") {
		$start_skin_color  = $skincolors[mt_rand(0,41)];
		$start_hair_color  = $haircolors[mt_rand(0,41)];
	} else {
		$start_skin_color  = "#".strtoupper(dechex($char_data["ply_skinred"]).dechex($char_data["ply_skingreen"]).dechex($char_data["ply_skinblue"]));
		$start_hair_color  = "#".strtoupper(dechex($char_data["ply_hairred"]).dechex($char_data["ply_hairgreen"]).dechex($char_data["ply_hairblue"]));
	}
?>
<div>
	<h1>Missing Information</h1>

	<p>The account system detected that some information about your character are
	missing or have to be to set. As far as the values are known and
	valid the old values were preset.</p>

	<form action="<?php echo Page::getURL(); ?>/community/account/us_charlist.php" method="post" name="missing_form" id="missing_form">
		<?php if ($char_data['chr_status'] == 40 ): ?>
		<h2>Weight: <?php echo $limit_text['weight']; ?></h2>

		<?php include_slider( $limits, 'weight' ); ?>

		<h2>Height: <?php echo $limit_text['height']; ?></h2>

		<?php include_slider( $limits, 'bodyheight' ); ?>

		<?php include_heightweight_js( $limits ); ?>

		<?php endif; ?>
		<?php if ($char_data['chr_status'] == 40 || $char_data['ply_dob'] == 0): ?>
		<h2>Age: <?php echo $limits['minage']; ?> years to <?php echo $limits['maxage']; ?> years</h2>

		<?php include_slider( $limits, 'age' ); ?>

		<p>
			Birthday:
			<select name="day" id="day" style="width:50px;margin-right:10px;">
				<?php for ($i = 1;$i <= ( $dob['month'] == 16 ? 5 : 24 );$i++): ?>
				<option value="<?php echo $i; ?>"<?php echo ($dob['day'] == $i ? ' selected="selected"' : '' ); ?>><?php echo $i; ?>.</option>
				<?php endfor; ?>
			</select>
			&#160;&#160;&#160;
			<select name="month" id="month" style="margin-left:10px;">
				<?php for ($i = 1;$i <= 16;$i++): ?>
				<option value="<?php echo $i; ?>"<?php echo ($dob['month'] == $i ? ' selected="selected"' : '' ); ?>><?php echo IllaDateTime::getMonthName( $i ); ?></option>
				<?php endfor; ?>
			</select>
		</p>
		<?php include_age_js( $limits ); ?>
		<?php endif; ?>
		
		<h2>Style</h2>
		<div style="background-image: url(<?php echo $url; ?>/shared/pics/char_screen.jpg);float:left;border:2px groove #000;width:300px;height:250px;">
		<div id="ajax_works" style='display:block;position:relative;left:5px;top:5px;width:32px;height:32px;margin-bottom:-32px;'></div>
		<img id="char_image" src="<?php echo char_create::getConvertedImageUrl(char_create::getImageName($race, $sex),substr($start_skin_color, 1)); ?>" style="position:relative;left:133px; top:73px;display:block;margin-bottom:-100px;" />
		<img src="/shared/pics/chars/<?php echo char_create::getImageName($race, $sex); ?>_cloth.png" style="display:block;position:relative;left:133px; top:73px;margin-bottom:-100px;" />
		<img id="hair_image" src="<?php echo char_create::getConvertedImageUrl(char_create::getImageName($race, $sex).$start_hair_value,substr($start_hair_color, 1)); ?>" style="display:block;position:relative;left:133px; top:73px;margin-bottom:-100px;" />
		<img id="beard_image" src="<?php echo char_create::getConvertedImageUrl(substr(char_create::getImageName($race, $sex), 0, -1)."m".$start_beard_value,substr($start_hair_color, 1)); ?>" style="position:relative;left:133px; top:73px;" />
		</div>

		<div style="height:250px;padding-left:320px;padding-right:70px;">
			Skin color:
			<span id="skin_color" style="width:251px;height:30px;display:block;background-color:<?php echo $start_skin_color; ?>;"></span>
			<input type="hidden" id="skincolor" value="<?php echo $start_skin_color; ?>" name="skincolor" />
				<?php foreach ( $skincolors as $color ):?>
                <a onclick="skinColorChange('<?php echo char_create::getImageName($race, $sex) ?>', '<?php echo substr($color, 1); ?>')" style="display: block;height: 10px;width: 10px;float: left;background-color: <?php echo $color; ?>;border: 1px solid black;"></a>
                <?php endforeach; ?>

			Hair color:
			<span id="hair_color" style="width:251px;height:30px;display:block;background-color:<?php echo $start_hair_color; ?>;"></span>
			<input type="hidden" id="haircolor" value="<?php echo $start_hair_color; ?>" name="haircolor" />
                <?php foreach ( $haircolors as $color ):?>
                <a onclick="hairChange('<?php echo char_create::getImageName($race, $sex) ?>', '<?php echo substr($color, 1); ?>')" style="display: block;height: 10px;width: 10px;float: left;background-color: <?php echo $color; ?>;border: 1px solid black;"></a>
                <?php endforeach; ?>
			Hair:
			<input type="hidden" id="hairvalue" value="<?php echo $start_hair_value; ?>" name="hairvalue" />
			<select name="hair" id="hair" onchange="hairChange('<?php echo char_create::getImageName($race, $sex); ?>', h_color)" style="width:100%;">
				<?php foreach( $hairvalues as $key => $hair ): ?>
					<option value="<?php echo $key; ?>"
					<?php if ($key == $start_hair_value) { echo ' selected="selected"'; } ?>
					><?php echo $hair; ?></option>
				<?php endforeach; ?>
			</select>

			<input type="hidden" id="beardvalue" value="<?php echo $start_beard_value; ?>" name="beardvalue" />
			<?php if (( $sex == GENDER_MALE) && ($race != RACE_ELF) && ($race != RACE_LIZARD) ): ?>
				Beard:
				<select name="beard" id="beard" onchange="hairChange('<?php echo char_create::getImageName($race, $sex); ?>', h_color)" style="width:100%;">
					<?php foreach( $beardvalues as $key => $beard ): ?>
						<option value="<?php echo $key; ?>"
						<?php if ($key == $start_beard_value) { echo ' selected="selected"'; } ?>
						><?php echo $beard; ?></option>
					<?php endforeach; ?>
				</select>
			<?php endif; ?>
		</div>
		
		<p style="text-align:center;">
			<input type="hidden" name="charid" value="<?php echo $_GET['charid']; ?>" />
			<input type="hidden" name="action" value="char_savemissing" />
			<input type="hidden" name="server" value="<?php echo $_GET['server']; ?>" />
			<button onclick="document.forms.missing_form.submit();" style="margin-right:10px;">Save Information</button>
			<?php if($enable_lightwindow): ?><button onclick="window.parent.myLightWindow.deactivate();return false;" style="margin-left:10px;">Cancel</button><?php endif; ?>
		</p>
	</form>
</div>

<?php include_short_footer(); ?>
