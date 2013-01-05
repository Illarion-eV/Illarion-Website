<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_topmenu.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_accountmenu.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_account.php' );

	if (!IllaUser::auth('gmtool_accounts'))
	{
		Messages::add( (Page::isGerman() ? 'Zugriff verweigert' : 'Access denied'), 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}


	Page::setTitle( array( 'GM-Tool', 'Account',  ) );
    Page::setDescription( 'Hier befindet sich eine Übersicht die Einstellungen des Accounts' );
    Page::setKeywords( array( 'GM-Tool', 'Account', 'Einstellungen' ) );

    Page::addCSS( array( 'menu', 'gmtool' ) );

    Page::setXHTML();
    Page::Init();

	$accid = ( is_numeric($_GET['accid']) ? (int)$_GET['accid'] : 0 );
	if (!$accid)
	{
		Messages::add( (Page::isGerman() ? 'Account ID wurde nicht richtig übergeben' : 'Account ID was not transfered correctly'), 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}


	$account_data = getAccountData( $accid );
	if (!$account_data || !count($account_data))
	{
		Messages::add( (Page::isGerman() ? 'Account wurde nicht gefunden' : 'Account not found'), 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}
?>

<h1>Account - <?php echo $account_data['acc_login']; ?></h1>

<?php include_menu(); ?>

<div class="spacer"></div>

<?php include_account_menu( $account_data['acc_id'], 1 ); ?>

<div class="spacer"></div>

<form action="<?php echo Page::getURL(); ?>/illarion/gmtool/de_account.php?accid=<?php echo $account_data['acc_id']; ?>" method="post">
	<div>
		<dl class="gmtool">
			<dt>Account ID</dt>
			<dd><?php echo $account_data['acc_id']; ?></dd>
			<dt>Benutzername</dt>
			<dd><?php echo htmlentities($account_data['acc_login'], ENT_COMPAT | ENT_XHTML); ?></dd>
			<dt>Name</dt>
			<dd><input type="text" name="acc_name" value="<?php echo htmlentities( $account_data['acc_name'] ? $account_data['acc_name'] : '' , ENT_COMPAT | ENT_XHTML); ?>" /></dd>
			<dd class="spacer">&nbsp;</dd>
			<dt>E-Mail Adresse</dt>
			<dd><input type="text" name="acc_email" value="<?php echo htmlentities($account_data['acc_email'], ENT_COMPAT | ENT_XHTML); ?>" /></dd>
			<dd class="spacer">&nbsp;</dd>
			<dt>Passwort</dt>
			<dd><input type="text" name="acc_passwd" value="<?php echo $account_data['acc_passwd']; ?>" /></dd>
			<dd class="spacer">&nbsp;</dd>
			<dt>Zuletzt gesehen</dt>
			<dd><?php echo $account_data['acc_lastseen']; ?></dd>
			<dt>Letzte IP</dt>
			<dd><?php echo decode_ip($account_data['acc_lastip']); ?></dd>
			<dd class="spacer">&nbsp;</dd>
			<dt>Charakterlimit</dt>
			<dd><input type="text" name="acc_maxchars" value="<?php echo $account_data['acc_maxchars']; ?>" /></dd>
			<dt>Sprache</dt>
			<dd>
				<select name="acc_lang">
					<option value="0"<?php echo ($account_data['acc_lang'] ? '' : ' selected="selected"'); ?>>deutsch</option>
					<option value="1"<?php echo ($account_data['acc_lang'] ? ' selected="selected"' : ''); ?>>englisch</option>
				</select>
			</dd>
			<dt>Längeneinheit</dt>
			<dd>
				<select name="acc_length">
					<option value="metric"<?php echo ($account_data['acc_length']=='metric' ? ' selected="selected"' : ''); ?>>Metrisch (cm, m)</option>
					<option value="imperial"<?php echo ($account_data['acc_length']=='imperial' ? ' selected="selected"' : ''); ?>>Imperial (inch, ft)</option>
				</select>
			</dd>
			<dt>Gewichtseinheit</dt>
			<dd>
				<select name="acc_weight">
					<option value="metric"<?php echo ($account_data['acc_weight']=='metric' ? ' selected="selected"' : ''); ?>>Metrisch (g, kg)</option>
					<option value="imperial"<?php echo ($account_data['acc_weight']=='imperial' ? ' selected="selected"' : ''); ?>>Imperial (lb, st)</option>
				</select>
			</dd>
			<dt>Zeitzone</dt>
			<dd>
				<select name="timezone">
					<option value="-12"<?php if ($account_data['acc_timeoffset'] == -12) { echo ' selected="selected"'; } ?>>(UTC -12:00) Internationale westliche Datumsgrenze</option>
					<option value="-11"<?php if ($account_data['acc_timeoffset'] == -11) { echo ' selected="selected"'; } ?>>(UTC -11:00) Midwayinseln, Samoa</option>
					<option value="-10"<?php if ($account_data['acc_timeoffset'] == -10) { echo ' selected="selected"'; } ?>>(UTC -10:00) Hawaii</option>
					<option value="-9.5"<?php if ($account_data['acc_timeoffset'] == -9.5) { echo ' selected="selected"'; } ?>>(UTC -09:30) Taiohae, Marquesas</option>
					<option value="-9"<?php if ($account_data['acc_timeoffset'] == -9) { echo ' selected="selected"'; } ?>>(UTC -09:00) Alaska</option>
					<option value="-8"<?php if ($account_data['acc_timeoffset'] == -8) { echo ' selected="selected"'; } ?>>(UTC -08:00) Pacific (US &amp; Kanada)</option>
					<option value="-7"<?php if ($account_data['acc_timeoffset'] == -7) { echo ' selected="selected"'; } ?>>(UTC -07:00) Mountain Time (US &amp; Kanada)</option>
					<option value="-6"<?php if ($account_data['acc_timeoffset'] == -6) { echo ' selected="selected"'; } ?>>(UTC -06:00) Central Time (US &amp; Kanada), Mexico City</option>
					<option value="-5"<?php if ($account_data['acc_timeoffset'] == -5) { echo ' selected="selected"'; } ?>>(UTC -05:00) Eastern Time (US &amp; Kanada), Bogota, Lima</option>
					<option value="-4"<?php if ($account_data['acc_timeoffset'] == -4) { echo ' selected="selected"'; } ?>>(UTC -04:00) Atlantic Time (Kanada), Caracas, La Paz</option>
					<option value="-3.5"<?php if ($account_data['acc_timeoffset'] == -3.5) { echo ' selected="selected"'; } ?>>(UTC -03:30) St. John's, Neufundland, Labrador</option>
					<option value="-3"<?php if ($account_data['acc_timeoffset'] == -3) { echo ' selected="selected"'; } ?>>(UTC -03:00) Brasilien, Buenos Aires, Georgetown</option>
					<option value="-2"<?php if ($account_data['acc_timeoffset'] == -2) { echo ' selected="selected"'; } ?>>(UTC -02:00) Mittel-Atlantik</option>
					<option value="-1"<?php if ($account_data['acc_timeoffset'] == -1) { echo ' selected="selected"'; } ?>>(UTC -01:00) Azores, Kap Verde Inseln</option>
					<option value="0"<?php if ($account_data['acc_timeoffset'] == 0) { echo ' selected="selected"'; } ?>>(UTC 00:00) Westeuropäische Zeit, London, Lissabon, Casablanca</option>
					<option value="1"<?php if ($account_data['acc_timeoffset'] == 1) { echo ' selected="selected"'; } ?>>(UTC +01:00) Amsterdam, Berlin, Brüssel, Kopenhagen, Madrid, Paris</option>
					<option value="2"<?php if ($account_data['acc_timeoffset'] == 2) { echo ' selected="selected"'; } ?>>(UTC +02:00) Istanbul, Jerusalem, Kaliningrad, Südafrika</option>
					<option value="3"<?php if ($account_data['acc_timeoffset'] == 3) { echo ' selected="selected"'; } ?>>(UTC +03:00) Baghdad, Riyadh, Moskau, St. Petersburg</option>
					<option value="3.5"<?php if ($account_data['acc_timeoffset'] == 3.5) { echo ' selected="selected"'; } ?>>(UTC +03:30) Tehran</option>
					<option value="4"<?php if ($account_data['acc_timeoffset'] == 4) { echo ' selected="selected"'; } ?>>(UTC +04:00) Abu Dhabi, Muscat, Baku, Tbilisi</option>
					<option value="4.5"<?php if ($account_data['acc_timeoffset'] == 4.5) { echo ' selected="selected"'; } ?>>(UTC +04:30) Kabul</option>
					<option value="5"<?php if ($account_data['acc_timeoffset'] == 5) { echo ' selected="selected"'; } ?>>(UTC +05:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option>
					<option value="5.5"<?php if ($account_data['acc_timeoffset'] == 5.5) { echo ' selected="selected"'; } ?>>(UTC +05:30) Bombay, Kolkata, Madras, Neu Delhi</option>
					<option value="5.75"<?php if ($account_data['acc_timeoffset'] == 5.75) { echo ' selected="selected"'; } ?>>(UTC +05:45) Kathmandu</option>
					<option value="6"<?php if ($account_data['acc_timeoffset'] == 6) { echo ' selected="selected"'; } ?>>(UTC +06:00) Almaty, Dhaka, Colombo</option>
					<option value="6.5"<?php if ($account_data['acc_timeoffset'] == 6.5) { echo ' selected="selected"'; } ?>>(UTC +06:30) Yagoon</option>
					<option value="7"<?php if ($account_data['acc_timeoffset'] == 7) { echo ' selected="selected"'; } ?>>(UTC +07:00) Bangkok, Hanoi, Jakarta</option>
					<option value="8"<?php if ($account_data['acc_timeoffset'] == 8) { echo ' selected="selected"'; } ?>>(UTC +08:00) Beijing, Perth, Singapore, Hong Kong</option>
					<option value="8.75"<?php if ($account_data['acc_timeoffset'] == 8.75) { echo ' selected="selected"'; } ?>>(UTC +08:45) West Australien</option>
					<option value="9"<?php if ($account_data['acc_timeoffset'] == 9) { echo ' selected="selected"'; } ?>>(UTC +09:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option>
					<option value="9.5"<?php if ($account_data['acc_timeoffset'] == 9.5) { echo ' selected="selected"'; } ?>>(UTC +09:30) Adelaide, Darwin, Yakutsk</option>
					<option value="10"<?php if ($account_data['acc_timeoffset'] == 10) { echo ' selected="selected"'; } ?>>(UTC +10:00) Ost Australien, Guam, Vladivostok</option>
					<option value="10.5"<?php if ($account_data['acc_timeoffset'] == 10.5) { echo ' selected="selected"'; } ?>>(UTC +10:30) Lord-Howe-Insel (Australien)</option>
					<option value="11"<?php if ($account_data['acc_timeoffset'] == 11) { echo ' selected="selected"'; } ?>>(UTC +11:00) Magadan, Salomon-Inseln, Neukaledonien</option>
					<option value="11.5"<?php if ($account_data['acc_timeoffset'] == 11.5) { echo ' selected="selected"'; } ?>>(UTC +11:30) Norfolkinsel</option>
					<option value="12"<?php if ($account_data['acc_timeoffset'] == 12) { echo ' selected="selected"'; } ?>>(UTC +12:00) Auckland, Wellington, Fiji, Kamchatka</option>
					<option value="12.75"<?php if ($account_data['acc_timeoffset'] == 12.75) { echo ' selected="selected"'; } ?>>(UTC +12:45) Chatham-Inseln</option>
					<option value="13"<?php if ($account_data['acc_timeoffset'] == 13) { echo ' selected="selected"'; } ?>>(UTC +13:00) Tonga</option>
					<option value="14"<?php if ($account_data['acc_timeoffset'] == 14) { echo ' selected="selected"'; } ?>>(UTC +14:00) Kiribati</option>
				</select>
			</dd>
			<dt>Sommerzeit</dt>
			<dd>
				<input type="checkbox" name="acc_dst" class="checkbox" value="1" id="dst"<?php echo ($account_data['acc_dst'] ? ' checked="checked"' : ''); ?> />
				<label for="dst">Sommerzeit benutzen</label>
			</dd>
		</dl>
		<div class="spacer" />
		<input type="submit" name="submit" value="Änderungen speichern" />
		<input type="hidden" name="action" value="account" />
	</div>
</form>
