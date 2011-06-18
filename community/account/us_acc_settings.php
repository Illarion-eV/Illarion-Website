<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	IllaUser::requireLogin();

	includeWrapper::includeOnce( Page::getRootPath().'/shared/rights_groups.php' );

	Page::setTitle( array( 'Account', 'Edit account settings' ) );
	Page::setDescription( 'On this page you can edit the settings of your account' );
	Page::setKeywords( array( 'account', 'settings', 'edit' ) );

	Page::addJavaScript( array( 'jquery', 'wz_tooltip', 'acc_settings' ) );

	Page::setXHTML();
	Page::Init();
?>
<h1>Edit account settings</h1>

<h2>Personal informations</h2>

<form action="<?php echo Page::getURL(); ?>/community/account/us_acc_settings.php" method="post">
	<table style="width:100%">
		<tr>
			<td style="width:130px;"><a title="" class="tooltip" onmouseover="Tip('This name needs to be unique on the server and it\'s used to login to your account. The name contains at least 5 and maximal 32 characters. Capital and non-capital letters, as well as digits, underlines and hyphens are possible.',TITLE,'Login name',WIDTH,-300);" onmouseout="UnTip();">Login name:</a></td>
			<td style="width:10px;" />
			<td style="width:162px;"><?php echo IllaUser::$username; ?></td>
		</tr>
		<tr>
			<td><a title="" class="tooltip" onmouseover="Tip('Only this name would be displayed for all other players. Furthermore this name is taken for your first board account. If you don't enter a name then your login name will be taken. As soon as you state a name it's not changeable anymore.',TITLE,'Displayed Name',WIDTH,-300);" onmouseout="UnTip();">Displayed Name:</a></td>
			<td />
			<td><?php if (IllaUser::$name == IllaUser::$username) {
				?><input style="width:100%;" type="text" name="name" value="" /><?php
			} else {
				echo IllaUser::$name;
			} ?></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td><a title="" class="tooltip" onmouseover="Tip('This email address will be used in case the Illarion staff needs to contact you. The address will be stored hidden for everyone except the staff.',TITLE,'Email address',WIDTH,-300);" onmouseout="UnTip();">Email address:</a></td>
			<td style="width:10px;" />
			<td><input style="width:100%;" type="text" name="email" id="email" value="<?php echo IllaUser::$email; ?>" /></td>
			<td id="check_email" style="text-indent:15px;"></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td><a title="" class="tooltip" onmouseover="Tip('With this password you will be able to login at the homepage and into the game. The password contains at least 5 and at maximum 15 characters. There are no limits for the characters you can use. But its recommended to use capital and non-capital letters, as well as digits and special characters to make your password safe.',TITLE,'Password',WIDTH,-300);" onmouseout="UnTip();">Password:</a></td>
			<td />
			<td><input style="width:100%;" type="password" name="passwd" id="passwd" value="" autocomplete="off" /></td>
		</tr>
		<tr>
			<td><a title="" class="tooltip" onmouseover="Tip('Here you have to type in your password again, just to take care that you made no typing mistake.',TITLE,'Repeat password',WIDTH,-300);" onmouseout="UnTip();">Repeat password:</a></td>
			<td />
			<td><input style="width:100%;" type="password" name="passwd2" id="passwd2" value="" autocomplete="off" /></td>
			<td id="check_passwd" style="text-indent:15px;"></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td colspan="3" class="center">
				<input type="submit" value="Send" name="submit" id="submit" disabled="disabled" class="disabled" />
				<input type="hidden" name="action" value="acc_settings" />
				<input type="hidden" name="type" value="personal" />
			</td>
		</tr>
	</table>
</form>

<h2>General settings</h2>

<form action="<?php echo Page::getURL(); ?>/community/account/us_acc_settings.php" method="post">
	<table style="width:100%">
		<colgroup>
			<col style="width:130px;" />
			<col style="width:10px;" />
			<col style="width:162px;" />
			<col />
		</colgroup>
		<tr>
			<td><a title="" class="tooltip" onmouseover="Tip('This setting determines the displayed language in the game.',TITLE,'Language',WIDTH,-300);" onmouseout="UnTip();">Language:</a></td>
			<td />
			<td>
				<select name="lang" style="width:100%;">
					<option value="0"<?php if (IllaUser::german()) { echo ' selected="selected"'; } ?>>german</option>
					<option value="1"<?php if (IllaUser::english()) { echo ' selected="selected"'; } ?>>english</option>
				</select>
			</td>
			<td />
		</tr>
		<tr>
			<td><a title="" class="tooltip" onmouseover="Tip('This setting determines the unit system all lengths are shown in.',TITLE,'Lengths',WIDTH,-300);" onmouseout="UnTip();">Lengths:</a></td>
			<td />
			<td>
				<select name="length" style="width:100%;">
					<option value="0"<?php if (IllaUser::usesMeter()) { echo ' selected="selected"'; } ?>>Metric (cm, m)</option>
					<option value="1"<?php if (IllaUser::usesFoot()) { echo ' selected="selected"'; } ?>>Imperial (inch, ft)</option>
				</select>
			</td>
			<td />
		</tr>
		<tr>
			<td><a title="" class="tooltip" onmouseover="Tip('This setting determines the unit system all weights are shown in.',TITLE,'Weights',WIDTH,-300);" onmouseout="UnTip();">Weights:</a></td>
			<td />
			<td>
				<select name="weight" style="width:100%;">
					<option value="0"<?php if (IllaUser::usesGram()) { echo ' selected="selected"'; } ?>>Metric (g, kg)</option>
					<option value="1"<?php if (IllaUser::usesPound()) { echo ' selected="selected"'; } ?>>Imperial (lb, st)</option>
				</select>
			</td>
			<td />
		</tr>
		<tr>
			<td><a title="" class="tooltip" onmouseover="Tip('All times on the homepage are viewed for this timezone',TITLE,'Timezone',WIDTH,-300);" onmouseout="UnTip();">Timezone:</a></td>
			<td style="width:10px;" />
			<td colspan="2">
				<select name="timezone">
					<option value="-11"<?php if (IllaUser::$time_offset == -11) { echo ' selected="selected"'; } ?>>(UTC -11:00) Midway Island, Samoa</option>
					<option value="-10"<?php if (IllaUser::$time_offset == -10) { echo ' selected="selected"'; } ?>>(UTC -10:00) Hawaii</option>
					<option value="-9.5"<?php if (IllaUser::$time_offset == -9.5) { echo ' selected="selected"'; } ?>>(UTC -09:30) Taiohae, Marquesas Islands</option>
					<option value="-9"<?php if (IllaUser::$time_offset == -9) { echo ' selected="selected"'; } ?>>(UTC -09:00) Alaska</option>
					<option value="-8"<?php if (IllaUser::$time_offset == -8) { echo ' selected="selected"'; } ?>>(UTC -08:00) Pacific Time (US &amp; Canada)</option>
					<option value="-7"<?php if (IllaUser::$time_offset == -7) { echo ' selected="selected"'; } ?>>(UTC -07:00) Mountain Time (US &amp; Canada)</option>
					<option value="-6"<?php if (IllaUser::$time_offset == -6) { echo ' selected="selected"'; } ?>>(UTC -06:00) Central Time (US &amp; Canada), Mexico City</option>
					<option value="-5"<?php if (IllaUser::$time_offset == -5) { echo ' selected="selected"'; } ?>>(UTC -05:00) Eastern Time (US &amp; Canada), Bogota, Lima</option>
					<option value="-4"<?php if (IllaUser::$time_offset == -4) { echo ' selected="selected"'; } ?>>(UTC -04:00) Atlantic Time (Canada), Caracas, La Paz</option>
					<option value="-3.5"<?php if (IllaUser::$time_offset == -3.5) { echo ' selected="selected"'; } ?>>(UTC -03:30) St. John's, Newfoundland, Labrador</option>
					<option value="-3"<?php if (IllaUser::$time_offset == -3) { echo ' selected="selected"'; } ?>>(UTC -03:00) Brazil, Buenos Aires, Georgetown</option>
					<option value="-2"<?php if (IllaUser::$time_offset == -2) { echo ' selected="selected"'; } ?>>(UTC -02:00) Mid-Atlantic</option>
					<option value="-1"<?php if (IllaUser::$time_offset == -1) { echo ' selected="selected"'; } ?>>(UTC -01:00) Azores, Cape Verde Islands</option>
					<option value="0"<?php if (IllaUser::$time_offset == 0) { echo ' selected="selected"'; } ?>>(UTC 00:00) Western Europe Time, London, Lisbon, Casablanca</option>
					<option value="1"<?php if (IllaUser::$time_offset == 1) { echo ' selected="selected"'; } ?>>(UTC +01:00) Amsterdam, Berlin, Brussels, Copenhagen, Madrid, Paris</option>
					<option value="2"<?php if (IllaUser::$time_offset == 2) { echo ' selected="selected"'; } ?>>(UTC +02:00) Istanbul, Jerusalem, Kaliningrad, South Africa</option>
					<option value="3"<?php if (IllaUser::$time_offset == 3) { echo ' selected="selected"'; } ?>>(UTC +03:00) Baghdad, Riyadh, Moscow, St. Petersburg</option>
					<option value="3.5"<?php if (IllaUser::$time_offset == 3.5) { echo ' selected="selected"'; } ?>>(UTC +03:30) Tehran</option>
					<option value="4"<?php if (IllaUser::$time_offset == 4) { echo ' selected="selected"'; } ?>>(UTC +04:00) Abu Dhabi, Muscat, Baku, Tbilisi</option>
					<option value="4.5"<?php if (IllaUser::$time_offset == 4.5) { echo ' selected="selected"'; } ?>>(UTC +04:30) Kabul</option>
					<option value="5"<?php if (IllaUser::$time_offset == 5) { echo ' selected="selected"'; } ?>>(UTC +05:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option>
					<option value="5.5"<?php if (IllaUser::$time_offset == 5.5) { echo ' selected="selected"'; } ?>>(UTC +05:30) Bombay, Calcutta, Madras, New Delhi</option>
					<option value="5.75"<?php if (IllaUser::$time_offset == 5.75) { echo ' selected="selected"'; } ?>>(UTC +05:45) Kathmandu</option>
					<option value="6"<?php if (IllaUser::$time_offset == 6) { echo ' selected="selected"'; } ?>>(UTC +06:00) Almaty, Dhaka, Colombo</option>
					<option value="6.5"<?php if (IllaUser::$time_offset == 6.5) { echo ' selected="selected"'; } ?>>(UTC +06:30) Yagoon</option>
					<option value="7"<?php if (IllaUser::$time_offset == 7) { echo ' selected="selected"'; } ?>>(UTC +07:00) Bangkok, Hanoi, Jakarta</option>
					<option value="8"<?php if (IllaUser::$time_offset == 8) { echo ' selected="selected"'; } ?>>(UTC +08:00) Beijing, Perth, Singapore, Hong Kong</option>
					<option value="8.75"<?php if (IllaUser::$time_offset == 8.75) { echo ' selected="selected"'; } ?>>(UTC +08:45) Western Australia</option>
					<option value="9"<?php if (IllaUser::$time_offset == 9) { echo ' selected="selected"'; } ?>>(UTC +09:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option>
					<option value="9.5"<?php if (IllaUser::$time_offset == 9.5) { echo ' selected="selected"'; } ?>>(UTC +09:30) Adelaide, Darwin, Yakutsk</option>
					<option value="10"<?php if (IllaUser::$time_offset == 10) { echo ' selected="selected"'; } ?>>(UTC +10:00) Eastern Australia, Guam, Vladivostok</option>
					<option value="10.5"<?php if (IllaUser::$time_offset == 10.5) { echo ' selected="selected"'; } ?>>(UTC +10:30) Lord Howe Island (Australia)</option>
					<option value="11"<?php if (IllaUser::$time_offset == 11) { echo ' selected="selected"'; } ?>>(UTC +11:00) Magadan, Solomon Islands, New Caledonia</option>
					<option value="11.5"<?php if (IllaUser::$time_offset == 11.5) { echo ' selected="selected"'; } ?>>(UTC +11:30) Norfolk Island</option>
					<option value="12"<?php if (IllaUser::$time_offset == 12) { echo ' selected="selected"'; } ?>>(UTC +12:00) Auckland, Wellington, Fiji, Kamchatka</option>
					<option value="12.75"<?php if (IllaUser::$time_offset == 12.75) { echo ' selected="selected"'; } ?>>(UTC +12:45) Chatham Island</option>
					<option value="13"<?php if (IllaUser::$time_offset == 13) { echo ' selected="selected"'; } ?>>(UTC +13:00) Tonga</option>
					<option value="14"<?php if (IllaUser::$time_offset == 14) { echo ' selected="selected"'; } ?>>(UTC +14:00) Kiribati</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><a title="" class="tooltip" onmouseover="Tip('This setting determines if the times on the homepage shall be effected by daylight saving time.',TITLE,'Use daylight saving time',WIDTH,-300);" onmouseout="UnTip();">Daylight saving time:</a></td>
			<td />
			<td colspan="2">
				<input type="radio" value="0" id="use_dst0" name="use_dst"<?php echo ( IllaUser::$dst ? '' : ' checked="checked"' ); ?> />
				<label for="use_dst0">don't use</label>
				&nbsp;&nbsp;&nbsp;
				<input type="radio" value="1" id="use_dst1" name="use_dst"<?php echo ( IllaUser::$dst ? ' checked="checked"' : '' ); ?> />
				<label for="use_dst1">use</label>
			</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td colspan="3" class="center">
				<input type="submit" value="Send" name="submit" />
				<input type="hidden" name="action" value="acc_settings" />
				<input type="hidden" name="type" value="general" />
			</td>
		</tr>
	</table>
</form>

<h2>Informations</h2>

<table style="width:100%">
	<tr>
		<td style="width:130px;"><a title="" class="tooltip" onmouseover="Tip('You are allowed to play this races.',TITLE,'Playable races',WIDTH,-300);" onmouseout="UnTip();">Playable races:</a></td>
		<td style="width:10px;" />
		<td><?php $races = array();
		foreach( IllaUser::$allowed_races as $race ) {
			$races[] = IllarionData::getRaceName( $race );
		}
		echo implode(', ',$races);
		?></td>
	</tr>
	<tr>
		<td><a title="" class="tooltip" onmouseover="Tip('The maximum amount of characters you are allowed to administer in your account.',TITLE,'Characterlimit',WIDTH,-300);" onmouseout="UnTip();">Characterlimit:</a></td>
		<td />
		<td><?php echo (IllaUser::$charlimit == 0 ? 'unfinity' : IllaUser::$charlimit ); ?></td>
	</tr>
	<?php
		$rights = array();
		foreach ($_RIGHTS as $id=>$right)
		{
			if (IllaUser::auth($id))
			{
				$rights[] = $right[1];
			}
		}
		if (count($rights)):
	?><tr>
		<td style="vertical-align:top;"><a title="" class="tooltip" onmouseover="Tip('This is a list of all your additional rights at the homepage.',TITLE,'Accessrights',WIDTH,-300);" onmouseout="UnTip();">Accessrights:</a></td>
		<td />
		<td><?php echo implode('<br />',$rights); ?></td>
	</tr>
	<?php endif; ?>
</table>