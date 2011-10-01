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

	$char_data = getCharData( $charid, $server );

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

<?php include_character_menu( $char_data['chr_playerid'], 1 ); ?>

<form action="<?php echo Page::getURL(); ?>/illarion/gmtool/de_character.php?id=<?php echo $account_data['id']; ?>" method="post">
	<div>
		<dl class="gmtool">
			<dt>Account ID</dt>
			<dd><?php echo $char_data['chr_accid']; ?></dd>
			<dt>Charakter ID</dt>
			<dd><?php echo $char_data['chr_playerid']; ?></dd>
			<dt>Charaktername</dt>
			<dd><input type="text" name="name" value="<?php echo $char_data['chr_name']; ?>" /></dd>
			<dt></dt>
			<dd>
				Prefix<input type="text" name="prefix" size="20" value="<?php echo $char_data['chr_prefix']; ?>" />
				Suffix<input type="text" name="suffix" size="20" value="<?php echo $char_data['chr_suffix']; ?>" />
			</dd>
			<dt>Rasse</dt>
			<dd>
				<select name="race">
					<option value="0"<?php echo ($char_data['chr_race'] ? '' : ' selected="selected"'); ?>>Mensch</option>
					<option value="1"<?php echo ($char_data['chr_race'] ? ' selected="selected"' : ''); ?>>Zwerg</option>
					<option value="6"<?php echo ($char_data['chr_race'] ? ' selected="selected"' : ''); ?>>Gnom</option>
					<option value="7"<?php echo ($char_data['chr_race'] ? ' selected="selected"' : ''); ?>>Fee</option>
				</select>
			</dd>
		</dl>
		<div class="spacer" />
		<input type="submit" name="submit" value="Änderungen speichern" />
		<input type="hidden" name="action" value="character" />
	</div>
</form>

<div style=width:400px;>
<pre>
<?php print_r($char_data); ?>
</pre>
</div>