<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_topmenu.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_accountmenu.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_account.php' );

	if (!IllaUser::auth('gmtool_accounts'))
	{
		Messages::add('Zugriff verweigert', 'error');
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$accid = ( is_numeric($_GET['id']) ? (int)$_GET['id'] : 0 );

	if (!$accid)
	{
		Messages::add('Account ID wurde nicht richtig übergeben', 'error');
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$account_data = getAccountData( $accid );

	if (!$account_data || !count($account_data))
	{
		Messages::add('Account wurde nicht gefunden', 'error');
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	Page::setTitle( array( 'GM-Tool', 'Account', $account_data['username'] ) );
	Page::setDescription( 'Hier befindet sich eine Übersicht die Einstellungen des Accounts "'.$account_data['username'].'"' );
	Page::setKeywords( array( 'GM-Tool', 'Account', 'Einstellungen', $account_data['username'] ) );

	Page::addCSS( array( 'menu', 'gmtool' ) );

	Page::setXHTML();
	Page::Init();
?>

<h1>Account - <?php echo $account_data['username']; ?></h1>

<?php include_menu(); ?>

<div class="spacer"></div>

<?php include_account_menu( $account_data['id'], 1 ); ?>

<form action="<?php echo Page::getURL(); ?>/illarion/gmtool/de_account.php?id=<?php echo $account_data['id']; ?>" method="post">
	<div>
		<dl class="gmtool">
			<dt>Account ID</dt>
			<dd><?php echo $account_data['id']; ?></dd>
			<dt>Benutzername</dt>
			<dd><?php echo $account_data['username']; ?></dd>
			<dt>Name</dt>
			<dd><input type="text" name="name" value="<?php echo ( $account_data['name'] ? $account_data['name'] : '' ); ?>" /></dd>
			<dd class="spacer">&nbsp;</dd>
			<dt>E-Mail Adresse</dt>
			<dd><input type="text" name="email" value="<?php echo $account_data['email']; ?>" /></dd>
			<dd class="spacer">&nbsp;</dd>
			<dt>Passwort</dt>
			<dd><input type="text" name="passwd" value="<?php echo $account_data['passwd']; ?>" /></dd>
			<dd class="spacer">&nbsp;</dd>
			<dt>Zuletzt gesehen</dt>
			<dd><?php echo $account_data['lastseen']; ?></dd>
			<dt>Letzte IP</dt>
			<dd><?php echo decode_ip($account_data['lastip']); ?></dd>
			<dd class="spacer">&nbsp;</dd>
			<dt>Charakterlimit</dt>
			<dd><input type="text" name="charlimit" value="<?php echo $account_data['charlimit']; ?>" /></dd>
			<dt>Sprache</dt>
			<dd>
				<select name="lang">
					<option value="0"<?php echo ($account_data['lang'] ? '' : ' selected="selected"'); ?>>deutsch</option>
					<option value="1"<?php echo ($account_data['lang'] ? ' selected="selected"' : ''); ?>>englisch</option>
				</select>
			</dd>
			<dt>Längeneinheit</dt>
			<dd>
				<select name="length">
					<option value="0"<?php echo ($account_data['length'] ? '' : ' selected="selected"'); ?>>Metrisch (cm, m)</option>
					<option value="1"<?php echo ($account_data['length'] ? ' selected="selected"' : ''); ?>>Imperial (inch, ft)</option>
				</select>
			</dd>
			<dt>Gewichtseinheit</dt>
			<dd>
				<select name="weight">
					<option value="0"<?php echo ($account_data['weight'] ? '' : ' selected="selected"'); ?>>Metrisch (g, kg)</option>
					<option value="1"<?php echo ($account_data['weight'] ? ' selected="selected"' : ''); ?>>Imperial (lb, st)</option>
				</select>
			</dd>
			<dt>Zeitzone</dt>
			<dd>
				<select name="timezone">
					<option value="-12"<?php if ($account_data['time_offset'] == -12) { echo ' selected="selected"'; } ?>>(UTC -12:00) Internationale westliche Datumsgrenze</option>
					<option value="-11"<?php if ($account_data['time_offset'] == -11) { echo ' selected="selected"'; } ?>>(UTC -11:00) Midwayinseln, Samoa</option>
					<option value="-10"<?php if ($account_data['time_offset'] == -10) { echo ' selected="selected"'; } ?>>(UTC -10:00) Hawaii</option>
					<option value="-9.5"<?php if ($account_data['time_offset'] == -9.5) { echo ' selected="selected"'; } ?>>(UTC -09:30) Taiohae, Marquesas</option>
					<option value="-9"<?php if ($account_data['time_offset'] == -9) { echo ' selected="selected"'; } ?>>(UTC -09:00) Alaska</option>
					<option value="-8"<?php if ($account_data['time_offset'] == -8) { echo ' selected="selected"'; } ?>>(UTC -08:00) Pacific (US &amp; Kanada)</option>
					<option value="-7"<?php if ($account_data['time_offset'] == -7) { echo ' selected="selected"'; } ?>>(UTC -07:00) Mountain Time (US &amp; Kanada)</option>
					<option value="-6"<?php if ($account_data['time_offset'] == -6) { echo ' selected="selected"'; } ?>>(UTC -06:00) Central Time (US &amp; Kanada), Mexico City</option>
					<option value="-5"<?php if ($account_data['time_offset'] == -5) { echo ' selected="selected"'; } ?>>(UTC -05:00) Eastern Time (US &amp; Kanada), Bogota, Lima</option>
					<option value="-4"<?php if ($account_data['time_offset'] == -4) { echo ' selected="selected"'; } ?>>(UTC -04:00) Atlantic Time (Kanada), Caracas, La Paz</option>
					<option value="-3.5"<?php if ($account_data['time_offset'] == -3.5) { echo ' selected="selected"'; } ?>>(UTC -03:30) St. John's, Neufundland, Labrador</option>
					<option value="-3"<?php if ($account_data['time_offset'] == -3) { echo ' selected="selected"'; } ?>>(UTC -03:00) Brasilien, Buenos Aires, Georgetown</option>
					<option value="-2"<?php if ($account_data['time_offset'] == -2) { echo ' selected="selected"'; } ?>>(UTC -02:00) Mittel-Atlantik</option>
					<option value="-1"<?php if ($account_data['time_offset'] == -1) { echo ' selected="selected"'; } ?>>(UTC -01:00) Azores, Kap Verde Inseln</option>
					<option value="0"<?php if ($account_data['time_offset'] == 0) { echo ' selected="selected"'; } ?>>(UTC 00:00) Westeuropäische Zeit, London, Lissabon, Casablanca</option>
					<option value="1"<?php if ($account_data['time_offset'] == 1) { echo ' selected="selected"'; } ?>>(UTC +01:00) Amsterdam, Berlin, Brüssel, Kopenhagen, Madrid, Paris</option>
					<option value="2"<?php if ($account_data['time_offset'] == 2) { echo ' selected="selected"'; } ?>>(UTC +02:00) Istanbul, Jerusalem, Kaliningrad, Südafrika</option>
					<option value="3"<?php if ($account_data['time_offset'] == 3) { echo ' selected="selected"'; } ?>>(UTC +03:00) Baghdad, Riyadh, Moskau, St. Petersburg</option>
					<option value="3.5"<?php if ($account_data['time_offset'] == 3.5) { echo ' selected="selected"'; } ?>>(UTC +03:30) Tehran</option>
					<option value="4"<?php if ($account_data['time_offset'] == 4) { echo ' selected="selected"'; } ?>>(UTC +04:00) Abu Dhabi, Muscat, Baku, Tbilisi</option>
					<option value="4.5"<?php if ($account_data['time_offset'] == 4.5) { echo ' selected="selected"'; } ?>>(UTC +04:30) Kabul</option>
					<option value="5"<?php if ($account_data['time_offset'] == 5) { echo ' selected="selected"'; } ?>>(UTC +05:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option>
					<option value="5.5"<?php if ($account_data['time_offset'] == 5.5) { echo ' selected="selected"'; } ?>>(UTC +05:30) Bombay, Kolkata, Madras, Neu Delhi</option>
					<option value="5.75"<?php if ($account_data['time_offset'] == 5.75) { echo ' selected="selected"'; } ?>>(UTC +05:45) Kathmandu</option>
					<option value="6"<?php if ($account_data['time_offset'] == 6) { echo ' selected="selected"'; } ?>>(UTC +06:00) Almaty, Dhaka, Colombo</option>
					<option value="6.5"<?php if ($account_data['time_offset'] == 6.5) { echo ' selected="selected"'; } ?>>(UTC +06:30) Yagoon</option>
					<option value="7"<?php if ($account_data['time_offset'] == 7) { echo ' selected="selected"'; } ?>>(UTC +07:00) Bangkok, Hanoi, Jakarta</option>
					<option value="8"<?php if ($account_data['time_offset'] == 8) { echo ' selected="selected"'; } ?>>(UTC +08:00) Beijing, Perth, Singapore, Hong Kong</option>
					<option value="8.75"<?php if ($account_data['time_offset'] == 8.75) { echo ' selected="selected"'; } ?>>(UTC +08:45) West Australien</option>
					<option value="9"<?php if ($account_data['time_offset'] == 9) { echo ' selected="selected"'; } ?>>(UTC +09:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option>
					<option value="9.5"<?php if ($account_data['time_offset'] == 9.5) { echo ' selected="selected"'; } ?>>(UTC +09:30) Adelaide, Darwin, Yakutsk</option>
					<option value="10"<?php if ($account_data['time_offset'] == 10) { echo ' selected="selected"'; } ?>>(UTC +10:00) Ost Australien, Guam, Vladivostok</option>
					<option value="10.5"<?php if ($account_data['time_offset'] == 10.5) { echo ' selected="selected"'; } ?>>(UTC +10:30) Lord-Howe-Insel (Australien)</option>
					<option value="11"<?php if ($account_data['time_offset'] == 11) { echo ' selected="selected"'; } ?>>(UTC +11:00) Magadan, Salomon-Inseln, Neukaledonien</option>
					<option value="11.5"<?php if ($account_data['time_offset'] == 11.5) { echo ' selected="selected"'; } ?>>(UTC +11:30) Norfolkinsel</option>
					<option value="12"<?php if ($account_data['time_offset'] == 12) { echo ' selected="selected"'; } ?>>(UTC +12:00) Auckland, Wellington, Fiji, Kamchatka</option>
					<option value="12.75"<?php if ($account_data['time_offset'] == 12.75) { echo ' selected="selected"'; } ?>>(UTC +12:45) Chatham-Inseln</option>
					<option value="13"<?php if ($account_data['time_offset'] == 13) { echo ' selected="selected"'; } ?>>(UTC +13:00) Tonga</option>
					<option value="14"<?php if ($account_data['time_offset'] == 14) { echo ' selected="selected"'; } ?>>(UTC +14:00) Kiribati</option>
				</select>
			</dd>
			<dt>Sommerzeit</dt>
			<dd>
				<input type="checkbox" name="dst" class="checkbox" value="1" id="dst"<?php echo ($account_data['dst'] ? ' checked="checked"' : ''); ?> />
				<label for="dst">Sommerzeit benutzen</label>
			</dd>
		</dl>
		<div class="spacer" />
		<input type="submit" name="submit" value="Änderungen speichern" />
		<input type="hidden" name="action" value="account" />
	</div>
</form>