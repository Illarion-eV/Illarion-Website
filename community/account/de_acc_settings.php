<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	IllaUser::requireLogin();

	includeWrapper::includeOnce( Page::getRootPath().'/shared/rights_groups.php' );

	Page::setTitle( array( 'Account', 'Einstellungen bearbeiten' ) );
	Page::setDescription( 'Auf dieser Seite kann man die Einstellungen des persönlichen Accounts anpassen.' );
	Page::setKeywords( array( 'Account', 'Einstellungen', 'bearbeiten' ) );

	Page::addJavaScript( array( 'jquery', 'wz_tooltip', 'acc_settings' ) );
	Page::setXHTML();
	Page::Init();
?>

<h1>Account-Einstellungen bearbeiten</h1>

<h2>Persönliche Informationen</h2>

<form action="<?php echo Page::getURL(); ?>/community/account/de_acc_settings.php" method="post">
	<table style="width:100%">
		<tr>
			<td style="width:130px;"><a title="" class="tooltip" onmouseover="Tip('Dieser Name muss auf dem Server einzigartig sein, und dient dazu, Dich auf der Homepage (Dein Account) einzuloggen. Er besteht aus mindestens 5 und maximal 32 Zeichen. Groß- und Kleinbuchstaben, sowie Zahlen, Binde- und Unterstriche sind erlaubt.',TITLE,'Login-Name',WIDTH,-300);" onmouseout="UnTip();">Login-Name:</a></td>
			<td style="width:10px;">&nbsp;</td>
			<td style="width:162px;"><?php echo IllaUser::$username; ?></td>
		</tr>
		<tr>
			<td><a title="" class="tooltip" onmouseover="Tip('Nur diesen Namen werden die anderen Spieler sehen. Weiterhin wird dieser Name für Deinen ersten Forenaccount verwendet. Wenn Du den Namen nicht festlegst, wird Dein Login-Name genommen. Sobald Du explizit einen Namen angeben hast, ist dieser nicht mehr änderbar.',TITLE,'Angezeigter Name',WIDTH,-300);" onmouseout="UnTip();">Angezeigter Name:</a></td>
			<td>&nbsp;</td>
			<td>
				<?php if (IllaUser::$name == IllaUser::$username): ?>
				<input style="width:100%;" type="text" name="name" value="" />
				<?php else:
					echo IllaUser::$name;
				endif; ?>
			</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td><a title="" class="tooltip" onmouseover="Tip('Diese E-Mail-Adresse wird verwendet, wenn es für das Team von Illarion nötig ist, mit Dir Kontakt aufzunehmen. Sie wird gespeichert, ist aber für niemanden außerhalb des Teams in irgendeiner Form sichtbar, es sei denn, Du erlaubst es explizit. Außerdem wird an diese Adresse eine E-Mail geschrieben, um den Account zu aktivieren.',TITLE,'E-Mail-Adresse',WIDTH,-300);" onmouseout="UnTip();">E-Mail-Adresse:</a></td>
			<td style="width:10px;">&nbsp;</td>
			<td><input style="width:100%;" type="text" name="email" id="email" value="<?php echo IllaUser::$email; ?>" /></td>
			<td id="check_email" style="text-indent:15px;"></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td><a title="" class="tooltip" onmouseover="Tip('Mit diesem Passwort kannst Du Dich in Zukunft auf der Homepage und im Spiel einloggen. Das Passwort muss mindestens 5 Zeichen lang sein, maximal 15. Einschränkungen bezüglich der Zeichen gibt es nicht, allerdings ist zu empfehlen, Groß- und Kleinbuchstaben, Zahlen und Sonderzeichen zu verwenden, damit das Passwort möglichst sicher ist.',TITLE,'Passwort',WIDTH,-300);" onmouseout="UnTip();">Passwort:</a></td>
			<td>&nbsp;</td>
			<td><input style="width:100%;" type="password" name="passwd" id="passwd" value="" autocomplete="off" /></td>
		</tr>
		<tr>
			<td><a title="" class="tooltip" onmouseover="Tip('Hier musst Du das selbe Passwort noch einmal eingeben, um sicherzustellen, dass Du Dich bei der ersten Eingabe nicht vertippt hast.',TITLE,'Passwort wiederholen',WIDTH,-300);" onmouseout="UnTip();">Passwort wiederholen:</a></td>
			<td>&nbsp;</td>
			<td><input style="width:100%;" type="password" name="passwd2" id="passwd2" value="" autocomplete="off" /></td>
			<td id="check_passwd" style="text-indent:15px;"></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td colspan="3" class="center">
				<input type="submit" value="Abschicken" name="submit" id="submit" disabled="disabled" class="disabled" />
				<input type="hidden" name="action" value="acc_settings" />
				<input type="hidden" name="type" value="personal" />
			</td>
		</tr>
	</table>
</form>

<h2>Allgemeine Einstellungen</h2>

<form action="<?php echo Page::getURL(); ?>/community/account/de_acc_settings.php" method="post">
	<table style="width:100%">
		<colgroup>
			<col style="width:130px;" />
			<col style="width:10px;" />
			<col style="width:162px;" />
			<col />
		</colgroup>
		<tr>
			<td><a title="" class="tooltip" onmouseover="Tip('Diese Einstellung legt fest, in welche Sprache im Spiel angezeigt wird.',TITLE,'Sprache',WIDTH,-300);" onmouseout="UnTip();">Sprache:</a></td>
			<td>&nbsp;</td>
			<td>
				<select name="lang" style="width:100%;">
					<option value="0"<?php if (IllaUser::german()) { echo ' selected="selected"'; } ?>>deutsch</option>
					<option value="1"<?php if (IllaUser::english()) { echo ' selected="selected"'; } ?>>englisch</option>
				</select>
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td><a title="" class="tooltip" onmouseover="Tip('Diese Einstellung gibt an, mit welchem Einheitensystem alle Längenangaben dargestellt werden.',TITLE,'Längen',WIDTH,-300);" onmouseout="UnTip();">Längen:</a></td>
			<td>&nbsp;</td>
			<td>
				<select name="length" style="width:100%;">
					<option value="0"<?php if (IllaUser::usesMeter()) { echo ' selected="selected"'; } ?>>Metrisch (cm, m)</option>
					<option value="1"<?php if (IllaUser::usesFoot()) { echo ' selected="selected"'; } ?>>Imperial (inch, ft)</option>
				</select>
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td><a title="" class="tooltip" onmouseover="Tip('Diese Einstellung gibt an, mit welchem Einheitensystem alle Gewichtsangaben dargestellt werden.',TITLE,'Gewichte',WIDTH,-300);" onmouseout="UnTip();">Gewichte:</a></td>
			<td>&nbsp;</td>
			<td>
				<select name="weight" style="width:100%;">
					<option value="0"<?php if (IllaUser::usesGram()) { echo ' selected="selected"'; } ?>>Metrisch (g, kg)</option>
					<option value="1"<?php if (IllaUser::usesPound()) { echo ' selected="selected"'; } ?>>Imperial (lb, st)</option>
				</select>
			</td>
			<td />
		</tr>
		<tr>
			<td><a title="" class="tooltip" onmouseover="Tip('Alle Zeiten auf der Homepage werden für diese Zeitzone angezeigt.',TITLE,'Zeitzone',WIDTH,-300);" onmouseout="UnTip();">Zeitzone:</a></td>
			<td style="width:10px;">&nbsp;</td>
			<td colspan="2">
				<select name="timezone">
					<option value="-12"<?php if (IllaUser::$time_offset == -12) { echo ' selected="selected"'; } ?>>(UTC -12:00) Internationale westliche Datumsgrenze</option>
					<option value="-11"<?php if (IllaUser::$time_offset == -11) { echo ' selected="selected"'; } ?>>(UTC -11:00) Midwayinseln, Samoa</option>
					<option value="-10"<?php if (IllaUser::$time_offset == -10) { echo ' selected="selected"'; } ?>>(UTC -10:00) Hawaii</option>
					<option value="-9.5"<?php if (IllaUser::$time_offset == -9.5) { echo ' selected="selected"'; } ?>>(UTC -09:30) Taiohae, Marquesas</option>
					<option value="-9"<?php if (IllaUser::$time_offset == -9) { echo ' selected="selected"'; } ?>>(UTC -09:00) Alaska</option>
					<option value="-8"<?php if (IllaUser::$time_offset == -8) { echo ' selected="selected"'; } ?>>(UTC -08:00) Pacific (US &amp; Kanada)</option>
					<option value="-7"<?php if (IllaUser::$time_offset == -7) { echo ' selected="selected"'; } ?>>(UTC -07:00) Mountain Time (US &amp; Kanada)</option>
					<option value="-6"<?php if (IllaUser::$time_offset == -6) { echo ' selected="selected"'; } ?>>(UTC -06:00) Central Time (US &amp; Kanada), Mexico City</option>
					<option value="-5"<?php if (IllaUser::$time_offset == -5) { echo ' selected="selected"'; } ?>>(UTC -05:00) Eastern Time (US &amp; Kanada), Bogota, Lima</option>
					<option value="-4"<?php if (IllaUser::$time_offset == -4) { echo ' selected="selected"'; } ?>>(UTC -04:00) Atlantic Time (Kanada), Caracas, La Paz</option>
					<option value="-3.5"<?php if (IllaUser::$time_offset == -3.5) { echo ' selected="selected"'; } ?>>(UTC -03:30) St. John's, Neufundland, Labrador</option>
					<option value="-3"<?php if (IllaUser::$time_offset == -3) { echo ' selected="selected"'; } ?>>(UTC -03:00) Brasilien, Buenos Aires, Georgetown</option>
					<option value="-2"<?php if (IllaUser::$time_offset == -2) { echo ' selected="selected"'; } ?>>(UTC -02:00) Mittel-Atlantik</option>
					<option value="-1"<?php if (IllaUser::$time_offset == -1) { echo ' selected="selected"'; } ?>>(UTC -01:00) Azores, Kap Verde Inseln</option>
					<option value="0"<?php if (IllaUser::$time_offset == 0) { echo ' selected="selected"'; } ?>>(UTC 00:00) Westeuropäische Zeit, London, Lissabon, Casablanca</option>
					<option value="1"<?php if (IllaUser::$time_offset == 1) { echo ' selected="selected"'; } ?>>(UTC +01:00) Amsterdam, Berlin, Brüssel, Kopenhagen, Madrid, Paris</option>
					<option value="2"<?php if (IllaUser::$time_offset == 2) { echo ' selected="selected"'; } ?>>(UTC +02:00) Istanbul, Jerusalem, Kaliningrad, Südafrika</option>
					<option value="3"<?php if (IllaUser::$time_offset == 3) { echo ' selected="selected"'; } ?>>(UTC +03:00) Baghdad, Riyadh, Moskau, St. Petersburg</option>
					<option value="3.5"<?php if (IllaUser::$time_offset == 3.5) { echo ' selected="selected"'; } ?>>(UTC +03:30) Tehran</option>
					<option value="4"<?php if (IllaUser::$time_offset == 4) { echo ' selected="selected"'; } ?>>(UTC +04:00) Abu Dhabi, Muscat, Baku, Tbilisi</option>
					<option value="4.5"<?php if (IllaUser::$time_offset == 4.5) { echo ' selected="selected"'; } ?>>(UTC +04:30) Kabul</option>
					<option value="5"<?php if (IllaUser::$time_offset == 5) { echo ' selected="selected"'; } ?>>(UTC +05:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option>
					<option value="5.5"<?php if (IllaUser::$time_offset == 5.5) { echo ' selected="selected"'; } ?>>(UTC +05:30) Bombay, Kolkata, Madras, Neu Delhi</option>
					<option value="5.75"<?php if (IllaUser::$time_offset == 5.75) { echo ' selected="selected"'; } ?>>(UTC +05:45) Kathmandu</option>
					<option value="6"<?php if (IllaUser::$time_offset == 6) { echo ' selected="selected"'; } ?>>(UTC +06:00) Almaty, Dhaka, Colombo</option>
					<option value="6.5"<?php if (IllaUser::$time_offset == 6.5) { echo ' selected="selected"'; } ?>>(UTC +06:30) Yagoon</option>
					<option value="7"<?php if (IllaUser::$time_offset == 7) { echo ' selected="selected"'; } ?>>(UTC +07:00) Bangkok, Hanoi, Jakarta</option>
					<option value="8"<?php if (IllaUser::$time_offset == 8) { echo ' selected="selected"'; } ?>>(UTC +08:00) Beijing, Perth, Singapore, Hong Kong</option>
					<option value="8.75"<?php if (IllaUser::$time_offset == 8.75) { echo ' selected="selected"'; } ?>>(UTC +08:45) West Australien</option>
					<option value="9"<?php if (IllaUser::$time_offset == 9) { echo ' selected="selected"'; } ?>>(UTC +09:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option>
					<option value="9.5"<?php if (IllaUser::$time_offset == 9.5) { echo ' selected="selected"'; } ?>>(UTC +09:30) Adelaide, Darwin, Yakutsk</option>
					<option value="10"<?php if (IllaUser::$time_offset == 10) { echo ' selected="selected"'; } ?>>(UTC +10:00) Ost Australien, Guam, Vladivostok</option>
					<option value="10.5"<?php if (IllaUser::$time_offset == 10.5) { echo ' selected="selected"'; } ?>>(UTC +10:30) Lord-Howe-Insel (Australien)</option>
					<option value="11"<?php if (IllaUser::$time_offset == 11) { echo ' selected="selected"'; } ?>>(UTC +11:00) Magadan, Salomon-Inseln, Neukaledonien</option>
					<option value="11.5"<?php if (IllaUser::$time_offset == 11.5) { echo ' selected="selected"'; } ?>>(UTC +11:30) Norfolkinsel</option>
					<option value="12"<?php if (IllaUser::$time_offset == 12) { echo ' selected="selected"'; } ?>>(UTC +12:00) Auckland, Wellington, Fiji, Kamchatka</option>
					<option value="12.75"<?php if (IllaUser::$time_offset == 12.75) { echo ' selected="selected"'; } ?>>(UTC +12:45) Chatham-Inseln</option>
					<option value="13"<?php if (IllaUser::$time_offset == 13) { echo ' selected="selected"'; } ?>>(UTC +13:00) Tonga</option>
					<option value="14"<?php if (IllaUser::$time_offset == 14) { echo ' selected="selected"'; } ?>>(UTC +14:00) Kiribati</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><a title="" class="tooltip" onmouseover="Tip('Diese Einstellung legt fest, ob die Zeiten auf der Homepage für Dich nach Sommer- und Winterzeit korrigiert werden sollen.',TITLE,'Sommerzeit verwenden',WIDTH,-300);" onmouseout="UnTip();">Sommerzeit:</a></td>
			<td>&nbsp;</td>
			<td colspan="2">
				<input type="radio" value="0" id="use_dst0" name="use_dst"<?php echo ( IllaUser::$dst ? '' : ' checked="checked"' ); ?> />
				<label for="use_dst0">nicht verwenden</label>
				&nbsp;&nbsp;&nbsp;
				<input type="radio" value="1" id="use_dst1" name="use_dst"<?php echo ( IllaUser::$dst ? ' checked="checked"' : '' ); ?> />
				<label for="use_dst1">verwenden</label>
			</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td colspan="3" class="center">
				<input type="submit" value="Abschicken" name="submit" />
				<input type="hidden" name="action" value="acc_settings" />
				<input type="hidden" name="type" value="general" />
			</td>
		</tr>
	</table>
</form>

<h2>Informationen</h2>

<table style="width:100%">
	<tr>
		<td style="width:130px;"><a title="" class="tooltip" onmouseover="Tip('Diese Rassen darfst du spielen.',TITLE,'Spielbare Rassen',WIDTH,-300);" onmouseout="UnTip();">Spielbare Rassen:</a></td>
		<td style="width:10px;">&nbsp;</td>
		<td><?php $races = array();
		foreach( IllaUser::$allowed_races as $race ) {
			$races[] = IllarionData::getRaceName( $race );
		}
		echo implode(', ',$races);
		?></td>
	</tr>
	<tr>
		<td><a title="" class="tooltip" onmouseover="Tip('Die Anzahl der Charaktere, die Du maximal mit Deinem Account verwalten darfst.',TITLE,'Charakterlimit',WIDTH,-300);" onmouseout="UnTip();">Charakterlimit:</a></td>
		<td>&nbsp;</td>
		<td><?php echo (IllaUser::$charlimit == 0 ? 'grenzenlos' : IllaUser::$charlimit ); ?></td>
	</tr>
	<?php
		$rights = array();
		foreach ($_RIGHTS as $id=>$right)
		{
			if (IllaUser::auth($id))
			{
				$rights[] = $right[2];
			}
		}
		if (count($rights)):
	?><tr>
		<td style="vertical-align:top;"><a title="" class="tooltip" onmouseover="Tip('Hier steht eine Liste aller gesonderten Zugriffsrechte die Du auf der Homepage hast.',TITLE,'Zugriffsrechte',WIDTH,-300);" onmouseout="UnTip();">Zugriffsrechte:</a></td>
		<td>&nbsp;</td>
		<td><?php echo implode('<br />',$rights); ?></td>
	</tr>
	<?php endif; ?>
</table>