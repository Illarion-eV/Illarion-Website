<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_topmenu.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_charactermenu.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_character.php' );

	if (!IllaUser::auth('gmtool_chars'))
	{
		Messages::add('Zugriff verweigert', 'error');
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$server = ( isset( $_GET['server'] ) && $_GET['server'] == '1' ? 'testserver' : 'illarionserver');
	$charid = ( isset( $_GET['id'] )  && is_numeric($_GET['id']) ? (int)$_GET['id'] : false );

	if (!$charid)
	{
		Messages::add('Charakter ID wurde nicht richtig übergeben', 'error');
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$char_data = getCharData( $charid,$server );

	if (!$char_data || !count($char_data))
	{
		Messages::add('Charakter wurde nicht gefunden', 'error');
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	Page::setTitle( array( 'GM-Tool', 'Charakter', $char_data['chr_name'] ) );
	Page::setDescription( 'Hier befindet sich eine Übersicht die Daten des Charakters "'.$char_data['chr_name'].'"' );
	Page::setKeywords( array( 'GM-Tool', 'Charakter', 'Informationen', $char_data['chr_name'] ) );

	Page::addCSS( array( 'menu', 'gmtool' ) );

	Page::setXHTML();
	Page::Init();
?>

<h1>Charakter - <?php echo $char_data['chr_name']; ?></h1>

<?php include_menu(); ?>

<div class="spacer"></div>

<?php include_character_menu( $char_data['chr_playerid'], 1, $_GET['server'] ); ?>

<form action="<?php echo Page::getURL(); ?>/illarion/gmtool/de_character.php?id=<?php echo $char_data['id']; ?>" method="post">
	<div>
		<dl class="gmtool">
			<dt>Server</dt>
			<dd><?php echo $server; ?></dd>
			<dt>Charakter ID</dt>
			<dd><?php echo $char_data['chr_playerid']; ?></dd>
			<dt>Account ID</dt>
			<dd><?php echo $char_data['chr_accid']; ?></dd>
			<dt>Account Name</dt>
			<dd><?php echo $char_data['acc_name']; ?>
				<a href="<?php echo Page::getURL(); ?>/illarion/gmtool/de_account.php?id=<?php echo $char_data['chr_accid']; ?>">
					(<?php echo $char_data['acc_email']; ?>)
				</a>
			</dd>
			<dd class="spacer">&nbsp;</dd>
			<dt>Online Status</dt>
			<dd><?php echo IllarionData::getOnlineStatus($char_data['online']); ?></dd>
			<dt>Charakter Status</dt>
			<dd><?php echo $char_data['chr_status']; ?></dd>
			<dt>Zuletzt eingeloggt</dt>
			<dd><?php echo date("y-m-d h:i:s",$char_data['chr_lastsavetime'])." (via IP: ".$char_data['chr_lastip'].")"; ?></dd>
			<dd class="spacer">&nbsp;</dd>
			<dt>Charaktername</dt>
			<dd><input type="text" name="name" value="<?php echo $char_data['chr_name']; ?>" /></dd>
			<dt>Prefix</dt>
			<dd><input type="text" name="prefix" size="20" value="<?php echo $char_data['chr_prefix']; ?>" /></dd>
			<dt>Suffix</dt>
			<dd><input type="text" name="suffix" size="20" value="<?php echo $char_data['chr_suffix']; ?>" /></dd>
			<dt>Rasse</dt>
			<dd>
				<select name="race">
					<option value="-1">--Sonstiges--</option>
					<?php foreach( getRaceArray(IllaUser::$lang) as $key => $race ): ?>
						<option value="<?php echo $key; ?>"
						<?php if ($key == $char_data['chr_race']) { echo ' selected="selected"'; } ?>
						>
						<?php echo $race; ?>
						</option>
					<?php endforeach; ?>
				</select>
			</dd>
			<dt>Geschlecht</dt>
			<dd>
				<select name="sex">
					<?php foreach( getGenderArray(IllaUser::$lang) as $key => $gender ): ?>
						<option value="<?php echo $key; ?>"
						<?php if ($key == $char_data['chr_sex']) { echo ' selected="selected"'; } ?>
						>
						<?php echo $gender; ?>
						</option>
					<?php endforeach; ?>
				</select>
			</dd>
			<dt>Hitpoints</dt>
			<dd><input type="text" name="hitpoints" value="<?php echo $char_data['ply_hitpoints']; ?>" /></dd>
			<dt>Mana</dt>
			<dd><input type="text" name="mana" value="<?php echo $char_data['ply_mana']; ?>" /></dd>
			<dt>Position X</dt>
			<dd><input type="text" name="posx" value="<?php echo $char_data['ply_posx']; ?>" /></dd>
			<dt>Position Y</dt>
			<dd><input type="text" name="posy" value="<?php echo $char_data['ply_posy']; ?>" /></dd>
			<dt>Position Z</dt>
			<dd><input type="text" name="posz" value="<?php echo $char_data['ply_posz']; ?>" /></dd>
		</dl>
		<div class="spacer" />
		<input type="submit" name="submit" value="Änderungen speichern" />
		<input type="hidden" name="action" value="character" />
	</div>
</form>

<div style="width:400px;">
<pre>
<?php print_r($char_data); ?>
</pre>
</div>