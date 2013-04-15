<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_topmenu.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_charactermenu.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_character.php' );

	if (!IllaUser::auth('gmtool_chars'))
	{
		Messages::add( (Page::isGerman() ? 'Zugriff verweigert' : 'Access denied'), 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	Page::setTitle( array( 'GM-Tool', 'Charakter' ) );
    Page::setDescription( 'Character Data Overview' );
    Page::setKeywords( array( 'GM-Tool', 'Character', 'Information' ) );

    Page::addCSS( array( 'menu', 'gmtool' ) );

    Page::setXHTML();
    Page::Init();

	$server = ( isset( $_GET['server'] ) && $_GET['server'] == '1' ? 'devserver' : 'illarionserver');
	$charid = ( isset( $_GET['charid'] )  && is_numeric($_GET['charid']) ? (int)$_GET['charid'] : false );

	if (!$charid)
	{
		Messages::add( (Page::isGerman() ? 'Charakter ID wurde nicht richtig übergeben' : 'Character ID was not transferred correctly'), 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$char_data = getCharData( $charid,$server );

	if (!$char_data || !count($char_data))
	{
		Messages::add( (Page::isGerman() ? 'Charakter wurde nicht gefunden' : 'Character not found'), 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

?>

<h1>Charakter - <?php echo $char_data['chr_name']; ?></h1>

<?php include_menu(); ?>

<div class="spacer"></div>

<?php include_character_menu( $char_data['chr_playerid'], 1, $_GET['server'] ); ?>

<div class="spacer"></div>

<form action="<?php echo Page::getURL(); ?>/illarion/gmtool/de_character.php?charid=<?php echo $char_data['chr_playerid']; ?>&amp;server=<?php echo $_GET['server']; ?>" method="post">
	<div>
		<dl class="gmtool">
			<dt>Server</dt>
			<dd><?php echo $server; ?></dd>
			<dt>Character ID</dt>
			<dd><?php echo $char_data['chr_playerid']; ?></dd>
			<dt>Account ID</dt>
			<dd><?php echo $char_data['chr_accid']; ?></dd>
			<dt>Account Name</dt>
			<dd><a href="<?php echo Page::getURL(); ?>/illarion/gmtool/de_account.php?accid=<?php echo $char_data['chr_accid']; ?>">
				<?php echo htmlentities($char_data['acc_name'], ENT_COMPAT | ENT_XHTML); ?>
				</a>
				(<?php echo $char_data['acc_email']; ?>)
				
			</dd>
			<dd class="spacer">&nbsp;</dd>
			<dt>Online Status</dt>
			<dd><?php echo IllarionData::getOnlineStatus($char_data['online']); ?></dd>
			<dt>Character Status</dt>
			<dd>
				<?php echo getCharacterStatusName($char_data['chr_status']); ?>
				<?php echo (in_array($char_data['chr_status'], array(CHAR_STATUS_TEMP_BANNED,CHAR_STATUS_TEMP_JAILED)) ? " to " : " since "); ?>
				<?php echo date('d.m.Y h:i:s',$char_data['chr_statustime']); ?>
			</dd>
			<dt>Last Logged In</dt>
			<dd><?php echo date("d.m.Y h:i:s",$char_data['chr_lastsavetime'])." (via IP: ".$char_data['chr_lastip'].")"; ?></dd>
			<dd class="spacer">&nbsp;</dd>
			<dt>Character Name</dt>
			<dd><input type="text" name="name" value="<?php echo htmlentities($char_data['chr_name'], ENT_COMPAT | ENT_XHTML); ?>" /></dd>
			<dt>Race</dt>
			<dd>
				<select name="race">
					<option value="-1">--Other--</option>
					<?php foreach( getRaceArray(IllaUser::$lang) as $key => $race ): ?>
						<option value="<?php echo $key; ?>"
						<?php if ($key == $char_data['chr_race']) { echo ' selected="selected"'; } ?>
						>
						<?php echo $race; ?>
						</option>
					<?php endforeach; ?>
				</select>
			</dd>
			<dt>Gender</dt>
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
		<input type="submit" name="submit" value="Save Changes" />
		<input type="hidden" name="action" value="character" />
		<input type="hidden" name="char_id" value="<?php echo $char_data['chr_playerid']; ?>" />
	</div>
</form>
