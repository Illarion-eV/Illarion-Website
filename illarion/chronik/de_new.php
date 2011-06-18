<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::Init();

	Page::addJavaScript( 'chronik' );

	if (!IllaUser::auth('chronic_edit'))
	{
		Messages::add('Du darfst die Chronik nicht editieren', 'error');
		includeWrapper::includeOnce( $_SERVER['DOCUMENT_ROOT'].'/illarion/chronik/de_chronik.php' );
		exit();
	}

	$db =& Database::getMySQL();

	$old_id = ( isset( $_GET['entry'] ) ? (int)$_GET['entry'] : false );

	$text_de = '';
	$text_us = '';

	$illa_date;

	$day_rl = 0;
	$month_rl = 0;
	$year_rl = 0;
	$hour_rl = 0;

	if ($old_id)
	{
		$query = 'SELECT *'
		.PHP_EOL.' FROM `homepage_chronik`'
		.PHP_EOL.' WHERE `chronik_id` = '.$db->Quote( $old_id )
		;
		$db->setQuery( $query );
		$old_entry = $db->loadAssocRow();

		if (!count( $old_entry ))
		{
			Messages::add('Alter Eintrag nicht gefunden.', 'error');
			includeWrapper::includeOnce( $_SERVER['DOCUMENT_ROOT'].'/illarion/chronik/de_chronik.php' );
			exit();
		}

		Page::setTitle( array( 'Chronik', 'Eintrag bearbeiten' ) );
		Page::setDescription( 'Eintrag in der Chronik bearbeiten' );

		$text_de = ( is_null( $old_entry['chronik_note_de'] ) ? '' : (string)$old_entry['chronik_note_de'] );
		$text_us = ( is_null( $old_entry['chronik_note_en'] ) ? '' : (string)$old_entry['chronik_note_en'] );

		$illa_date = IllaDateTime::IllaDatestampToDate( $old_entry['chronik_date'] );
		$illa_time = IllaDateTime::mkIllaTimestamp( 0, 0, 0, $illa_date['month'], $illa_date['day'], $illa_date['year'] );
		$rl_timestamp = IllaDateTime::TimestampWithOffset( IllaDateTime::IllaTimeToRLTime( $illa_time ) );
		$day_rl = (int)date('d',$rl_timestamp);
		$month_rl = (int)date('m',$rl_timestamp);
		$year_rl = (int)date('Y',$rl_timestamp);
		$hour_rl = (int)date('H',$rl_timestamp);
	}
	else
	{
		Page::setTitle( array( 'Chronik', 'Neuen Eintrag erstellen' ) );
		Page::setDescription( 'Neuen Eintrag in die Chronik schreiben' );

		$curr_time = IllaDateTime::TimestampWithOffset();
		$day_rl = (int)date('d',$curr_time);
		$month_rl = (int)date('m',$curr_time);
		$year_rl = (int)date('Y',$curr_time);
		$hour_rl = (int)date('H',$curr_time);

		$illa_date = IllaDateTime::IllaDatestampToDate( );
	}

	$curr_date = IllaDateTime::IllaDatestampToDate( );

	Page::setFirstPage( Page::getURL().'/illarion/chronik/de_chronik.php' );
	Page::setPrevPage( Page::getURL().'/illarion/chronik/de_chronik.php' );
?>

<?php Page::NavBarTop(); ?>

<?php if ($old_id): ?>
<h1>Eintrag in der Chronik bearbeiten</h1>
<?php else: ?>
<h1>Neuen Eintrag in die Chronik schreiben</h1>
<?php endif; ?>

<form method="post" action="<?php echo Page::getURL(); ?>/illarion/chronik/de_chronik.php">
	<h2>Zeiteinstellungen</h2>

	<p>
		<input type="radio" name="time" value="illa" id="time_illa" checked="checked" onchange="check_visibility();" />
		<label for="time_illa">Zeiteinstellung in Illarion Zeit</label>
		<br />
		<input type="radio" name="time" value="rl" id="time_rl" onchange="check_visibility();" />
		<label for="time_rl">Zeiteinstellung in echter Zeit</label>
	</p>

	<p id="time_select_illa" style="display:block;">
		<select name="time_illa_day" id="time_illa_day" style="width:50px">
			<?php for( $i=1;$i<=24;++$i ): ?>
			<option value="<?php echo $i; ?>"<?php echo ($illa_date['day'] == $i ? ' selected="selected"' : ''); ?>><?php echo $i; ?>.</option>
			<?php endfor; ?>
		</select>
		<select name="time_illa_month" id="time_illa_month" style="width:100px;margin-left:8px;" onchange="change_month_illa()">
			<?php for( $i=1;$i<=16;++$i ): ?>
			<option value="<?php echo $i; ?>"<?php echo ($illa_date['month'] == $i ? ' selected="selected"' : ''); ?>><?php echo IllaDateTime::getMonthName( $i ); ?></option>
			<?php endfor; ?>
		</select>
		<select name="time_illa_year" id="time_illa_year" style="width:120px;margin-left:8px;">
			<?php for( $i=$curr_date['year'];$i>=1;--$i ): ?>
			<option value="<?php echo $i; ?>"<?php echo ($illa_date['year'] == $i ? ' selected="selected"' : ''); ?>>im Jahr <?php echo $i; ?></option>
			<?php endfor; ?>
		</select>
	</p>

	<p id="time_select_rl" style="display:none;">
		<select name="time_rl_day" id="time_rl_day" style="width:50px">
			<?php for( $i=1;$i<=31;++$i ): ?>
			<option value="<?php echo $i; ?>"<?php echo ($day_rl == $i ? ' selected="selected"' : ''); ?>><?php echo $i; ?>.</option>
			<?php endfor; ?>
		</select>
		<select name="time_rl_month" id="time_rl_month" style="width:100px;margin-left:8px;" onchange="change_date_rl();">
			<?php for( $i=1;$i<=12;++$i ): ?>
			<option value="<?php echo $i; ?>"<?php echo ($month_rl == $i ? ' selected="selected"' : ''); ?>><?php echo strftime('%B',mktime(1,1,1,$i,1,2000)); ?></option>
			<?php endfor; ?>
		</select>
		<select name="time_rl_year" id="time_rl_year" style="width:120px;margin-left:8px;" onchange="change_date_rl();">
			<?php for( $i=(int)date('Y');$i>=2000;--$i ): ?>
			<option value="<?php echo $i; ?>"<?php echo ($year_rl == $i ? ' selected="selected"' : ''); ?>><?php echo $i; ?></option>
			<?php endfor; ?>
		</select>
		<select name="time_rl_hour" id="time_rl_hour" style="width:80px;margin-left:20px;">
			<?php for( $i=0;$i<=23;++$i ): ?>
			<option value="<?php echo $i; ?>"<?php echo ($hour_rl == $i ? ' selected="selected"' : ''); ?>><?php echo $i; ?> Uhr</option>
			<?php endfor; ?>
		</select>
	</p>

	<h2>Deutschen Eintrag verfassen</h2>

	<p><textarea name="text_de" cols="80" rows="5" style="width:100%"><?php echo $text_de; ?></textarea></p>

	<h2>Englischen Eintrag verfassen</h2>

	<p><textarea name="text_us" cols="80" rows="5" style="width:100%"><?php echo $text_us; ?></textarea></p>

	<p class="center">
		<input type="submit" name="submit" value="Eintragen" />
		<input type="reset" name="reset" value="Zurücksetzen" />
		<input type="hidden" name="action" value="new" />
		<?php if ($old_id): ?>
		<input type="hidden" name="id" value="<?php echo $old_id; ?>" />
		<?php endif; ?>
	</p>
</form>

<?php Page::NavBarBottom(); ?>