<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	if (!IllaUser::loggedIn())
	{
		header('HTTP/1.0 401 Unauthorized');
		exit();
	}

	includeWrapper::includeOnce( Page::getRootPath().'/community/account/inc_editinfos.php' );

	$server = ( isset( $_GET['server'] ) && $_GET['server'] == '1' ? 'testserver' : 'illarionserver');

	if ( !isset( $_GET['charid'] ) || !is_numeric( $_GET['charid'] ) )
	{
		exit('Error - Character ID got not transferred correctly.');
	}

	$pgSQL =& Database::getPostgreSQL( $server );

	$query = 'SELECT chr_name, chr_race, chr_status, ply_body_height, ply_weight, ply_dob, ply_age'
	.PHP_EOL.' FROM player'
	.PHP_EOL.' INNER JOIN chars ON chr_playerid = ply_playerid'
	.PHP_EOL.' WHERE ply_playerid = '.$pgSQL->Quote( (int)$_GET['charid'] )
	.PHP_EOL.' AND chr_accid = '.$pgSQL->Quote( IllaUser::$ID )
	;
	$pgSQL->setQuery( $query );
	$char_data = $pgSQL->loadAssocRow();

	if ( $char_data['ply_dob'] > 0 && $char_data['chr_status'] != 40 )
	{
		header('HTTP/1.0 401 Unauthorized');
		exit();
	}

	$account =& Database::getPostgreSQL( 'accounts' );

	$query = 'SELECT minage, maxage, minweight, maxweight, minbodyheight, maxbodyheight'
	.PHP_EOL.' FROM raceattr'
	.PHP_EOL.' WHERE id IN ( -1, '.$account->Quote( $char_data['chr_race'] ).' )'
	.PHP_EOL.' ORDER BY id DESC'
	;
	$account->setQuery( $query, 0, 1 );
	$limits = $account->loadAssocRow();

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

	calculateLimits( &$limits );
	if ($char_data['chr_status'] == 40 )
	{
		$limit_text = generateLimitTexts( $limits );
	}

	$enable_lightwindow = !( Page::getBrowserName() == 'msie' && Page::getBrowserVersion() <= 6 );

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
	}
	Page::Init();
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
			&nbsp;&nbsp;&nbsp;
			<select name="month" id="month" style="margin-left:10px;">
				<?php for ($i = 1;$i <= 16;$i++): ?>
				<option value="<?php echo $i; ?>"<?php echo ($dob['month'] == $i ? ' selected="selected"' : '' ); ?>><?php echo IllaDateTime::getMonthName( $i ); ?></option>
				<?php endfor; ?>
			</select>
		</p>
		<?php include_age_js( $limits ); ?>
		<?php endif; ?>
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