<?php
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/shared/illarion_data.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_topmenu.php' );
    includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_charactermenu.php' );
    includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_character.php' );

	if (!IllaUser::auth('gmtool_chars'))
	{
		Messages::add( (Page::isGerman() ? 'Zugriff verweigert' : 'Access denied'), 'error' );
		include_once( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	Page::setTitle( array( 'GM-Tool', 'Charakter' ) );
    Page::setDescription( 'Hier befindet sich eine Übersicht den Status des Charakters' );
    Page::setKeywords( array( 'GM-Tool', 'Charakter', 'Status' ) );

    Page::addCSS( array( 'menu', 'gmtool' ) );
	Page::addJavaScript( array('prototype','gmtool_common') );

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

	$state_data = getCharStatusData($charid,$server);
	$char_state = $state_data['chr_status'];
	$char_name = $state_data['chr_name'];

	$temp_time = $state_data['chr_statustime'];
	
	$day_rl 	= date('j');
	$month_rl 	= date('n');
	$year_rl	= date('Y');
	$hour_rl	= date('H')+1;

	if ($temp_time > time() && in_array($char_state, array(CHAR_STATUS_TEMP_BANNED,CHAR_STATUS_TEMP_JAILED)))
	{
		$day_rl     = date('j', $temp_time);
	    $month_rl   = date('n', $temp_time);
	    $year_rl    = date('Y', $temp_time);
	    $hour_rl    = date('H', $temp_time);
	}

	if (Page::isGerman()) { $lang = "de"; } else { $lang = "us"; }
    $state_array = getCharStatusArray($lang);

?>

<h1>Status - <?php echo $char_name; ?></h1>

<?php include_menu(); ?>

<div class="spacer"></div>

<?php include_character_menu( $charid, 2, $_GET['server'] ); ?>

<div class="spacer"></div>

<form action="<?php echo $url; ?>/illarion/gmtool/de_character_status.php?charid=<?php echo $charid; ?>&amp;server=<?php echo $_GET['server']; ?>" method="post" id="statusForm">
	<h3>Charakterstatus</h3>
	<table>
		<?php foreach( $state_array as $status => $name): ?>
		<tr>
			<td style='width:45%;'>
				<?php
				echo "<input type='radio' name='status' ";
				echo ($status == $char_state ? " checked='checked'" : "");
				echo " id='status".$status."' value='".$status."' ";
				echo "onchange='check_stat_visibility($status,".CHAR_STATUS_TEMP_BANNED.",".CHAR_STATUS_TEMP_JAILED.");'/>";
                echo "<label for='status".$status."'>".$name."</label>";

				?>
			</td>
			<td>
				<div id='time_settings_<?php echo $status; ?>' style='<?php echo ($status == $char_state ? "display:block" : "display:none"); ?>;'>
					<?php if( in_array($status, array(CHAR_STATUS_TEMP_BANNED,CHAR_STATUS_TEMP_JAILED)) ): ?>
					<?php echo "bis "; ?>
					<select name="time_rl_day_<?php echo $status; ?>" id="time_rl_day" style="width:50px">
						<?php for( $i=1;$i<=31;++$i ): ?>
						<option value="<?php echo $i; ?>"<?php echo ($day_rl == $i ? ' selected="selected"' : ''); ?>><?php echo $i; ?>.</option>
						<?php endfor; ?>
					</select>
					<select name="time_rl_month_<?php echo $status; ?>" id="time_rl_month" style="width:100px;margin-left:8px;">
						<?php for( $i=1;$i<=12;++$i ): ?>
						<option value="<?php echo $i; ?>"<?php echo ($month_rl == $i ? ' selected="selected"' : ''); ?>><?php echo strftime('%B',mktime(1,1,1,$i,1,2000)); ?></option>
						<?php endfor; ?>
					</select>
					<select name="time_rl_year_<?php echo $status; ?>" id="time_rl_year" style="width:60px;margin-left:8px;">
						<?php for( $i=(int)date('Y');$i<=date('Y')+1;$i++ ): ?>
						<option value="<?php echo $i; ?>"<?php echo ($year_rl == $i ? ' selected="selected"' : ''); ?>><?php echo $i; ?></option>
						<?php endfor; ?>
					</select>
					<select name="time_rl_hour_<?php echo $status; ?>" id="time_rl_hour" style="width:80px;margin-left:18px;">
						<?php for( $i=0;$i<=23;++$i ): ?>
						<option value="<?php echo $i; ?>"<?php echo ($hour_rl == $i ? ' selected="selected"' : ''); ?>><?php echo $i; ?> Uhr</option>
						<?php endfor; ?>
					</select>
					<?php endif ?>
				</div>
			</td>
		</tr>
		<?php endforeach; ?>
		<tr><td colspan='2'><h3>Grund für die Statusänderung</h3></td></tr>
		<tr><td colspan='2'><textarea cols="60" rows="6" name="reason"></textarea></td></tr>
		<tr>
			<td colspan='2'>
				<input type="submit" name="submit" value="Status ändern" />
		        <input type="hidden" name="action" value="character_status" />
			</td>
		</tr>
	</table>
</form>

