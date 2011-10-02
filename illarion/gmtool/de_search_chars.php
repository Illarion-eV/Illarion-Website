<?php
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php' );
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/shared/illarion_data.php' );
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/inc_topmenu.php' );

	if (!IllaUser::auth('gmtool_chars'))
	{
		Messages::add('Zugriff verweigert', 'error');
		include_once( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	create_header( 'Illarion - GM-Tool - Suche - Charaktere',
	'Auf dieser Seite kannst du nach Charakteren suchen',
	'GM-Tool, Charaktere, Suche', '', 'menu', 'prototype,gmtool_search_chars', true );
	include_header();
?>

<h1>Suche nach Charakteren</h1>

<?php include_menu(); ?>

<h2>Suchparameter für die Suche nach einem Charakter</h2>

<fieldset>
	<legend>Suche nach</legend>
	<div style="display:block;float:left;width:450px;margin-bottom:10px;">
		<span style="width:100px;display:block;float:left;">Suchbegriff:</span>
		<input type="text" name="search" id="search" style="width:300px" value="" onkeyup="performSearch();" />
		<div style="height:10px;"></div>
		<span style="width:100px;display:block;float:left;">Status:</span>
		<select name="status" id="status" onchange="performSearch();" style="width:150px">
		<?php foreach (getCharStatusArray(IllaUser::$lang) as $key => $status) : ?>
			<option value="<?php echo $key; ?>"><?php echo $status; ?></option>
		<?php endforeach; ?>

		</select>
	</div>
	<div style="display:block;float:left;width:300px;margin-bottom:10px;">
		<span style="width:100px;display:block;float:left;">Rasse:</span>
		<select name="race" id="race" onchange="performSearch();" style="width:150px">
		<option value="-1">Alle</option>
		<?php foreach (IllarionData::getRaceArray(IllaUser::$lang) as $key => $race) : ?>
			<option value="<?php echo $key; ?>"><?php echo $key ."-". $race; ?> </option>
		<?php endforeach ?>
		</select>
		<div style="height:10px;"></div>
		<span style="width:100px;display:block;float:left;">Geschlecht:</span>
		<select name="sex" id="sex" onchange="performSearch();" style="width:150px">
			<option value="-1">beide</option>
			<option value="0"><?php echo getSexName(0); ?></option>
			<option value="1"><?php echo getSexName(1); ?></option>
		</select>
	</div>
	<div style="display:block;float:left;width:300px;margin-bottom:10px;">
		<span style="width:100px;display:block;float:left;">Onlinestatus:</span>
		<select name="online" id="online" onchange="performSearch();" style="width:150px">
			<option value="-1">egal</option>
			<option value="0">offline</option>
			<option value="1">online</option>
		</select>
	</div>
	<div class="clr"></div>
</fieldset>

<div style="height:15px;"></div>

<fieldset>
	<legend>Suche in</legend>
	<select name="server" id="server" onchange="performSearch();">
		<option value="-1">Spielserver und Testserver</option>
		<option value="0" selected="selected">Spielserver</option>
		<option value="1">Testserver</option>
	</select>
	<br />
	<input type="checkbox" name="search_in_account" id="search_in_account" onclick="performSearch();" />
	<label for="search_in_account">Durchsuche Accounts (Namen, ID)</label>
	<br />
	<input type="checkbox" name="search_in_email" id="search_in_email" onclick="performSearch();" />
	<label for="search_in_email">Durchsuche E-Mail Adressen</label>
	<br />
	<input type="checkbox" name="search_in_char" id="search_in_char" checked="checked" onclick="performSearch();" />
	<label for="search_in_char">Durchsuche Charaktere (Namen, ID)</label>
</fieldset>

<div style="height:16px;"></div>

<h2 id="search_title" style="text-indent:16px;">Suchergebnisse</h2>

<div id="output_area"></div>

<?php include_footer(); ?>