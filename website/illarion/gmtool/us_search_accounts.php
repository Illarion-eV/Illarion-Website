<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';
	includeWrapper::includeOnce( Page::getRootPath(). '/illarion/gmtool/inc_topmenu.php' );

	if (!IllaUser::auth('gmtool_accounts'))
	{
		Messages::add('Access denieded', 'error');
		includeWrapper::includeOnce( Page::getRootPath(). '/illarion/gmtool/us_gmtool.php' );
		exit();
	}

	Page::setTitle( array( 'GM-Tool', 'Search', 'Accounts' ) );
	Page::setDescription( 'On this page you can search for accounts.' );
	Page::setKeywords( array( 'GM-Tool', 'Accounts', 'search' ) );

	Page::addCSS( 'menu' );
	Page::addJavaScript( array( 'prototype', 'gmtool_search_account' ) );

	Page::setXHTML();
	Page::Init();
?>
<h1>Search for accounts</h1>

<?php include_menu(); ?>

<h2>Searching parameters</h2>

<fieldset>
	<legend>Search for</legend>
	<input type="checkbox" name="limit_to_state" id="limit_to_state" onclick="performSearch();" />
	<label for="limit_to_state">Limit search to accounts with status:</label>
	<select name="status" id="status" onchange="performSearch();">
		<?php foreach( array(0,3,7,8) as $status ): ?>
		<option value="<?php echo $status; ?>"><?php echo $status,' - ',IllarionData::getAccountStatusName($status); ?></option>
		<?php endforeach; ?>
	</select>
	<div style="height:10px;"></div>
	search keyword:
	<input type="text" name="search" id="search" style="width:300px" value="" onkeyup="performSearch();" />
</fieldset>

<div style="height:15px;"></div>

<fieldset>
	<legend>Search in</legend>
	<input type="checkbox" name="search_in_account" id="search_in_account" checked="checked" onclick="performSearch();" />
	<label for="search_in_account">Search in accounts (ID, name)</label>
	<br />
	<input type="checkbox" name="search_in_email" id="search_in_email" checked="checked" onclick="performSearch();" />
	<label for="search_in_email">Search in e-mail addresses</label>
	<br />
	<input type="checkbox" name="search_in_char" id="search_in_char" onclick="performSearch();" />
	<label for="search_in_char">Search in characters (ID, name)</label>
</fieldset>

<div style="height:16px;"></div>

<h2 id="search_title" style="text-indent:16px;">Searching results</h2>

<div id="output_area"></div>