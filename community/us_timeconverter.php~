<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';

	Page::setTitle( 'Timeconverter' );
	Page::setDescription( 'The page is used to calculate the reallife time to the illarion time' );
	Page::setKeywords( array( 'time', 'convert', 'converter' ) );

	Page::setXHTML();
	Page::Init();

	$timekey = (isset( $_GET['timekey'] ) && ctype_xdigit($_GET['timekey']) ? hexdec( $_GET['timekey'] ) : false);

	$show_result = false;
	$show_input = true;

	if ($timekey)
	{
		$server_timestamp = $timekey;
		$local_timestamp = IllaDateTime::TimestampWithOffset( $server_timestamp );
		$illa_timestamp = IllaDateTime::RLTimeToIllaTime( $server_timestamp );

		$show_result = true;
		$show_input = false;
	}
	elseif ( isset($_POST['type']) && $_POST['type'] === 'rl' )
	{
		$local_timestamp = mktime( (int)$_POST['hour'], (int)$_POST['minute'], (int)$_POST['second'], (int)$_POST['month'], (int)$_POST['day'], (int)$_POST['year'] );
		$server_timestamp = IllaDateTime::TimestampWithoutOffset( $local_timestamp );
		$illa_timestamp = IllaDateTime::RLTimeToIllaTime( $server_timestamp );

		$show_result = true;
		$show_input = true;
	}
	elseif ( isset($_POST['type']) && $_POST['type'] === 'server' )
	{
		$server_timestamp = mktime( (int)$_POST['hour'], (int)$_POST['minute'], (int)$_POST['second'], (int)$_POST['month'], (int)$_POST['day'], (int)$_POST['year'] );
		$local_timestamp = IllaDateTime::TimestampWithOffset( $server_timestamp );
		$illa_timestamp = IllaDateTime::RLTimeToIllaTime( $server_timestamp );

		$show_result = true;
		$show_input = true;
	}
	elseif ( isset($_POST['type']) && $_POST['type'] === 'illa' )
	{
		$illa_timestamp = IllaDateTime::mkIllaTimestamp( (int)$_POST['hour'], (int)$_POST['minute'], (int)$_POST['second'], (int)$_POST['month'], (int)$_POST['day'], (int)$_POST['year'] );
		$server_timestamp = IllaDateTime::IllaTimeToRLTime( $illa_timestamp );
		$local_timestamp = IllaDateTime::TimestampWithOffset( $server_timestamp );

		$show_result = true;
		$show_input = true;
	}
	else
	{
		$server_timestamp = time();
		$local_timestamp = IllaDateTime::TimestampWithOffset( $server_timestamp );
		$illa_timestamp = IllaDateTime::RLTimeToIllaTime( $server_timestamp );

		$show_result = false;
		$show_input = true;
	}
?>

<h1>Timeconverter</h1>

<?php if ($show_result): ?>
<h2>Result of the time convertion</h2>

<table>
	<colgroup>
		<col style="width:210px;" />
		<col style="width:15px;" />
		<col style="width:150px;" />
		<col style="width:15px;" />
		<col style="width:100px;" />
	</colgroup>
	<tr>
		<th />
		<th />
		<th>Date</th>
		<th />
		<th>Time</th>
	</tr>
	<tr>
		<td colspan="5" style="height:10px" />
	</tr>
	<tr>
		<th style="text-align:right;">Local time:</th>
		<td />
		<td style="text-align:center;font-weight:bold;"><?php echo strftime('%d. %B %Y', $local_timestamp); ?></td>
		<td />
		<td style="text-align:center;font-weight:bold;"><?php echo strftime('%T', $local_timestamp); ?></td>
	</tr>
	<tr>
		<td colspan="5" style="height:10px" />
	</tr>
	<tr>
		<th style="text-align:right;">Server time:</th>
		<td />
		<td style="text-align:center;font-weight:bold;"><?php echo strftime('%d. %B %Y', $server_timestamp); ?></td>
		<td />
		<td style="text-align:center;font-weight:bold;"><?php echo strftime('%T', $server_timestamp); ?></td>
	</tr>
	<tr>
		<td colspan="5" style="height:10px" />
	</tr>
	<tr>
		<th style="text-align:right;">Illarion time:</th>
		<td />
		<td style="text-align:center;font-weight:bold;"><?php echo IllaDateTime::IllaTimestampToTime('d. F Y', $illa_timestamp); ?></td>
		<td />
		<td style="text-align:center;font-weight:bold;"><?php echo IllaDateTime::IllaTimestampToTime('H:i:s', $illa_timestamp) ?></td>
	</tr>
</table>

<?php if ($show_input): ?>
<table style="width:100%;">
	<tr>
		<td style="width:150px;">Link to this page:</td>
		<td><input type="text" name="pagelink" readonly="readonly" onclick="this.select();" style="width:100%;" value="<?php echo Page::getURL(); ?>/community/un_timeconverter.php?timekey=<?php echo dechex( $server_timestamp ); ?>" /></td>
	</tr>
	<tr>
		<td style="width:150px;">BBCode:</td>
		<td><input type="text" name="pagelink" readonly="readonly" onclick="this.select();" style="width:100%;" value="[url=<?php echo Page::getURL(); ?>/community/un_timeconverter.php?timekey=<?php echo dechex( $server_timestamp ); ?>]<?php echo IllaDateTime::IllaTimestampToTime('d. F Y H:i', $illa_timestamp); ?>[/url]" /></td>
	</tr>
</table>
<?php endif; ?>
<?php Page::insert_go_to_top_link(); ?>
<?php endif; ?>

<?php if ($show_input): ?>
<h2>Convert based on the local time</h2>

<p>The convertion from the local time requires the correct setting of the local timezone
in your account. If this setting was not set correctly this function can't work. If you
are unsure about your correct timezone set it as you think it fits and look at this page
without any time recalculation done. If your setting is correct your current local time
should be shown in the input fields below.</p>

<form action="<?php echo Page::getURL(); ?>/community/us_timeconverter.php" method="post">
	<table style="width:100%;">
		<colgroup>
			<col style="width:90px;" />
			<col style="width:90px;" />
			<col style="width:90px;" />
			<col />
			<col style="width:90px;" />
			<col style="width:90px;" />
			<col style="width:90px;" />
		</colgroup>
		<thead>
			<tr>
				<th>Day</th>
				<th>Month</th>
				<th>Year</th>
				<th />
				<th>Hour</th>
				<th>Minute</th>
				<th>Second</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="3" style="text-align:right;">
					<input type="reset" name="reset" value="Reset" style="width:120px;" />
				</td>
				<td />
				<td colspan="3">
					<input type="submit" name="submit" value="Convert" style="width:120px;" />
					<input type="hidden" name="type" value="rl" />
				</td>
			</tr>
		</tfoot>
		<tbody>
		<tr>
			<td>
				<input style="width:100%" type="text" name="day" value="<?php echo date('d', $local_timestamp); ?>" />
			</td>
			<td>
				<select name="month" style="background-color:black;width:100%;">
				<?php $rl_month = date('m', $local_timestamp);
					for ( $i=1;$i<=12;$i++ ): ?>
					<option value="<?php echo $i; ?>"<?php echo ( (int)$rl_month == $i ? ' selected="selected"' : '' ); ?>><?php echo nl_langinfo( constant( 'MON_'.$i ) ) ?></option>
				<?php endfor; ?>
				</select>
			</td>
			<td>
				<input style="width:100%" type="text" name="year" value="<?php echo date('Y', $local_timestamp); ?>" />
			</td>
			<td />
			<td>
				<input style="width:100%" type="text" name="hour" value="<?php echo date('H', $local_timestamp); ?>" />
			</td>
			<td>
				<input style="width:100%" type="text" name="minute" value="<?php echo date('i', $local_timestamp); ?>" />
			</td>
			<td>
				<input style="width:100%" type="text" name="second" value="<?php echo date('s', $local_timestamp); ?>" />
			</td>
		</tr>
         <tr>
            <td colspan="7" style="height:10px" />
         </tr>
      </tbody>
   </table>
</form>

<?php Page::insert_go_to_top_link(); ?>

<h2>Convert based on the server time</h2>

<p>The current timezone of the server is: GMT+<?php echo ((int)date( 'O', time() ))/100; ?></p>

<form action="<?php echo Page::getURL(); ?>/community/us_timeconverter.php" method="post">
	<table style="width:100%;">
		<colgroup>
			<col style="width:90px;" />
			<col style="width:90px;" />
			<col style="width:90px;" />
			<col />
			<col style="width:90px;" />
			<col style="width:90px;" />
			<col style="width:90px;" />
		</colgroup>
		<thead>
			<tr>
				<th>Day</th>
				<th>Month</th>
				<th>Year</th>
				<th />
				<th>Hour</th>
				<th>Minute</th>
				<th>Second</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="3" style="text-align:right;">
					<input type="reset" name="reset" value="Reset" style="width:120px;" />
				</td>
				<td />
				<td colspan="3">
					<input type="submit" name="submit" value="Convert" style="width:120px;" />
					<input type="hidden" name="type" value="server" />
				</td>
			</tr>
		</tfoot>
		<tbody>
		<tr>
			<td>
				<input style="width:100%" type="text" name="day" value="<?php echo date('d', $server_timestamp); ?>" />
			</td>
			<td>
				<select name="month" style="background-color:black;width:100%;">
				<?php $rl_month = date('m', $server_timestamp);
					for ( $i=1;$i<=12;$i++ ): ?>
					<option value="<?php echo $i; ?>"<?php echo ( (int)$rl_month == $i ? ' selected="selected"' : '' ); ?>><?php echo nl_langinfo( constant( 'MON_'.$i ) ) ?></option>
				<?php endfor; ?>
				</select>
			</td>
			<td>
				<input style="width:100%" type="text" name="year" value="<?php echo date('Y', $server_timestamp); ?>" />
			</td>
			<td />
			<td>
				<input style="width:100%" type="text" name="hour" value="<?php echo date('H', $server_timestamp); ?>" />
			</td>
			<td>
				<input style="width:100%" type="text" name="minute" value="<?php echo date('i', $server_timestamp); ?>" />
			</td>
			<td>
				<input style="width:100%" type="text" name="second" value="<?php echo date('s', $server_timestamp); ?>" />
			</td>
		</tr>
         <tr>
            <td colspan="7" style="height:10px" />
         </tr>
      </tbody>
   </table>
</form>

<?php Page::insert_go_to_top_link(); ?>

<h2>Convert based on the Illarion time</h2>

<form action="<?php echo $url; ?>/community/us_timeconverter.php" method="post">
	<table style="width:100%;">
		<colgroup>
			<col style="width:90px;" />
			<col style="width:90px;" />
			<col style="width:90px;" />
			<col />
			<col style="width:90px;" />
			<col style="width:90px;" />
			<col style="width:90px;" />
		</colgroup>
		<thead>
			<tr>
				<th>Day</th>
				<th>Month</th>
				<th>Year</th>
				<th />
				<th>Hour</th>
				<th>Minute</th>
				<th>Second</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="3" style="text-align:right;">
					<input type="reset" name="reset" value="Reset" style="width:120px;" />
				</td>
				<td />
				<td colspan="3">
					<input type="submit" name="submit" value="Convert" style="width:120px;" />
					<input type="hidden" name="type" value="illa" />
				</td>
			</tr>
		</tfoot>
		<tbody>
		<tr> <?php $illa_time = IllaDateTime::IllaTimestampToTime('array', $illa_timestamp); ?>
			<td>
				<input style="width:100%" type="text" name="day" value="<?php echo $illa_time['day']; ?>" />
			</td>
			<td>
				<select name="month" style="background-color:black;width:100%;">
				<?php for ( $i=1;$i<=16;$i++ ): ?>
					<option value="<?php echo $i; ?>"<?php echo ( (int)$illa_time['month'] == $i ? ' selected="selected"' : '' ); ?>><?php echo IllaDateTime::getMonthName( $i ); ?></option>
				<?php endfor; ?>
				</select>
			</td>
			<td>
				<input style="width:100%" type="text" name="year" value="<?php echo $illa_time['year']; ?>" />
			</td>
			<td />
			<td>
				<input style="width:100%" type="text" name="hour" value="<?php echo $illa_time['hour']; ?>" />
			</td>
			<td>
				<input style="width:100%" type="text" name="minute" value="<?php echo $illa_time['min']; ?>" />
			</td>
			<td>
				<input style="width:100%" type="text" name="second" value="<?php echo $illa_time['sec']; ?>" />
			</td>
		</tr>
         <tr>
            <td colspan="7" style="height:10px" />
         </tr>
      </tbody>
   </table>
</form>

<?php Page::insert_go_to_top_link(); ?>
<?php endif; ?>