<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';

	Page::setTitle( 'Zeit Umrechnung' );
	Page::setDescription( 'Mit dieser Seite ist es möglich die Illarion Zeit in die echte Zeit umzurechnen' );
	Page::setKeywords( array( 'Zeit', 'umrechnen', 'Zeitumrechner', 'Umrechner' ) );

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

<h1>Zeitumrechner</h1>

<?php if ($show_result): ?>
<h2>Resultat der Zeitumrechnung</h2>

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
		<th>Datum</th>
		<th />
		<th>Uhrzeit</th>
	</tr>
	<tr>
		<td colspan="5" style="height:10px" />
	</tr>
	<tr>
		<th style="text-align:right;">Lokale Zeit:</th>
		<td />
		<td style="text-align:center;font-weight:bold;"><?php echo strftime('%d. %B %Y', $local_timestamp); ?></td>
		<td />
		<td style="text-align:center;font-weight:bold;"><?php echo strftime('%T', $local_timestamp); ?></td>
	</tr>
	<tr>
		<td colspan="5" style="height:10px" />
	</tr>
	<tr>
		<th style="text-align:right;">Server Zeit:</th>
		<td />
		<td style="text-align:center;font-weight:bold;"><?php echo strftime('%d. %B %Y', $server_timestamp); ?></td>
		<td />
		<td style="text-align:center;font-weight:bold;"><?php echo strftime('%T', $server_timestamp); ?></td>
	</tr>
	<tr>
		<td colspan="5" style="height:10px" />
	</tr>
	<tr>
		<th style="text-align:right;">Illarion Zeit:</th>
		<td />
		<td style="text-align:center;font-weight:bold;"><?php echo IllaDateTime::IllaTimestampToTime('d. F Y', $illa_timestamp); ?></td>
		<td />
		<td style="text-align:center;font-weight:bold;"><?php echo IllaDateTime::IllaTimestampToTime('H:i:s', $illa_timestamp) ?></td>
	</tr>
</table>

<?php if ($show_input): ?>
<table style="width:100%;">
	<tr>
		<td style="width:150px;">Link zu dieser Seite:</td>
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
<h2>Aus der Lokalen Zeit umrechnen</h2>

<p>Die richtige Funktionalität dieser Umrechnung ist davon abhängig das die Einstellungen
in deinem Account richtig auf deine Zeitzone eingestellt sind. Wenn keine Umrechnung
vorgenommen zeigt diese Seite die aktuelle Zeit. Dies kann als Überprüfung dienen ob
deine lokale Zeitzone richtig eingestellt ist.</p>

<form action="<?php echo Page::getURL(); ?>/community/de_timeconverter.php" method="post">
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
				<th>Tag</th>
				<th>Monat</th>
				<th>Jahr</th>
				<th />
				<th>Stunde</th>
				<th>Minute</th>
				<th>Sekunde</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="3" style="text-align:right;">
					<input type="reset" name="reset" value="Zurücksetzen" style="width:120px;" />
				</td>
				<td />
				<td colspan="3">
					<input type="submit" name="submit" value="Umrechnen" style="width:120px;" />
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

<h2>Aus der Server Zeit umrechnen</h2>

<p>Die aktuelle Zeit des Servers ist im Augenblick in der Zeitzone: GMT+<?php echo ((int)date( 'O', time() ))/100; ?></p>

<form action="<?php echo Page::getURL(); ?>/community/de_timeconverter.php" method="post">
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
				<th>Tag</th>
				<th>Monat</th>
				<th>Jahr</th>
				<th />
				<th>Stunde</th>
				<th>Minute</th>
				<th>Sekunde</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="3" style="text-align:right;">
					<input type="reset" name="reset" value="Zurücksetzen" style="width:120px;" />
				</td>
				<td />
				<td colspan="3">
					<input type="submit" name="submit" value="Umrechnen" style="width:120px;" />
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

<h2>Aus Illarionzeit umrechnen</h2>

<form action="<?php echo $url; ?>/community/de_timeconverter.php" method="post">
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
				<th>Tag</th>
				<th>Monat</th>
				<th>Jahr</th>
				<th />
				<th>Stunde</th>
				<th>Minute</th>
				<th>Sekunde</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="3" style="text-align:right;">
					<input type="reset" name="reset" value="Zurücksetzen" style="width:120px;" />
				</td>
				<td />
				<td colspan="3">
					<input type="submit" name="submit" value="Umrechnen" style="width:120px;" />
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