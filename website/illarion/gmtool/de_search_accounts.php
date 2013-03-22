<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';
	includeWrapper::includeOnce( Page::getRootPath(). '/illarion/gmtool/inc_topmenu.php' );

	if (!IllaUser::auth('gmtool_accounts'))
	{
		Messages::add('Zugriff verweigert', 'error');
		includeWrapper::includeOnce( Page::getRootPath(). '/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	Page::setTitle( array( 'GM-Tool', 'Suche', 'Accounts' ) );
	Page::setDescription( 'Auf dieser Seite kannst du nach Account suchen.' );
	Page::setKeywords( array( 'GM-Tool', 'Accounts', 'Suche' ) );

	Page::addCSS( 'menu' );
	Page::addJavaScript( array( 'prototype', 'gmtool_search_account' ) );

	Page::setXHTML();
	Page::Init();
?>
<h1>Suche nach Accounts</h1>

<?php include_menu(); ?>

<h2>Suchparameter für die Suche nach einem Account</h2>

<fieldset>
	<legend>Suche nach</legend>
	<input type="checkbox" name="limit_to_state" id="limit_to_state" onclick="performSearch();" />
	<label for="limit_to_state">Suche auf Accounts mit folgendem Status begrenzen:</label>
	<select name="status" id="status" onchange="performSearch();">
		<?php foreach( array(0,3,7,8) as $status ): ?>
		<option value="<?php echo $status; ?>"><?php echo $status,' - ',IllarionData::getAccountStatusName($status); ?></option>
		<?php endforeach; ?>
	</select>
	<div style="height:10px;"></div>
	Suchbegriff:
	<input type="text" name="search" id="search" style="width:300px" value="" onkeyup="performSearch();" />
</fieldset>

<div style="height:15px;"></div>

<fieldset>
	<legend>Suche in</legend>
	<input type="checkbox" name="search_in_account" id="search_in_account" checked="checked" onclick="performSearch();" />
	<label for="search_in_account">Durchsuche Accounts (Namen, ID)</label>
	<br />
	<input type="checkbox" name="search_in_email" id="search_in_email" checked="checked" onclick="performSearch();" />
	<label for="search_in_email">Durchsuche E-Mail Adressen</label>
	<br />
	<input type="checkbox" name="search_in_char" id="search_in_char" onclick="performSearch();" />
	<label for="search_in_char">Durchsuche Charaktere (Namen, ID)</label>
</fieldset>

<div style="height:16px;"></div>

<h2 id="search_title">
	<div style="width:23px;height:23px;display:block;float:left;"></div>
	<span>Suchergebnisse</span>
</h2>

<div id="output_area"></div>
