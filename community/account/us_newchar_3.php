<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	if (!IllaUser::loggedIn())
	{
		header('HTTP/1.0 401 Unauthorized');
		exit();
	}

	$server = ( isset( $_GET['server'] ) && $_GET['server'] == '1' ? 'testserver' : 'illarionserver');
	$charid = ( isset( $_GET['charid'] )  && is_numeric($_GET['charid']) ? (int)$_GET['charid'] : false );
	if (!$charid)
	{
		exit('Error - Character ID was not transfered correctly.');
	}

	$pgSQL =& Database::getPostgreSQL( $server );

	$query = 'SELECT chr_race, chr_status'
	.PHP_EOL.' FROM chars'
	.PHP_EOL.' WHERE chr_playerid = '.$pgSQL->Quote( $charid )
	.PHP_EOL.' AND chr_accid = '.$pgSQL->Quote( IllaUser::$ID )
	;
	$pgSQL->setQuery( $query );
	list( $race, $status ) = $pgSQL->loadRow();

	if ($race === null || $race === false)
	{
		header('HTTP/1.0 401 Unauthorized');
		exit();
	}

	if ($status != 3 && $status != 5 && $status != 7 && $status != 8)
	{
		exit('Error - Wrong character state');
	}

	$query = 'SELECT COUNT(*)'
	.PHP_EOL.' FROM player'
	.PHP_EOL.' WHERE ply_playerid = '.$pgSQL->Quote( $charid )
	;
	$pgSQL->setQuery( $query );
	if (!$pgSQL->loadResult())
	{
		exit("Error - Data not set");
	}

	if ($server == 'testserver')
	{
		$newbieOnly = false;
	}
	else
	{
		$query = 'SELECT COUNT(*)'
		.PHP_EOL.' FROM chars'
		.PHP_EOL.' WHERE chr_accid = '.$pgSQL->Quote( IllaUser::$ID )
		.PHP_EOL.' AND chr_status NOT IN (3,5,7,8)'
		;
		$pgSQL->setQuery( $query );
		$char_count = $pgSQL->loadResult();
		if (!$char_count)
		{
			$newbieOnly = true;
		}
		else
		{
			$query = 'SELECT COUNT(*)'
			.PHP_EOL.' FROM chars'
			.PHP_EOL.' INNER JOIN questprogress ON qpg_userid = chr_playerid'
			.PHP_EOL.' WHERE chr_accid = '.$pgSQL->Quote( IllaUser::$ID )
			.PHP_EOL.' AND qpg_questid = 2'
			.PHP_EOL.' AND qpg_progress > 0'
			.PHP_EOL.' AND chr_status NOT IN (3,5,7,8)'
			;
			$pgSQL->setQuery( $query );
			if ($char_count>$pgSQL->loadResult())
			{
				$newbieOnly = false;
			}
			else
			{
				$newbieOnly = true;
			}
		}
	}


    $query = 'SELECT spl_id, spl_name_us AS name'
    .PHP_EOL.' FROM accounts.startplace'
    .( $newbieOnly ? PHP_EOL.' WHERE spl_newbie = 1' : '')
    .PHP_EOL.' ORDER BY spl_id ASC'
    ;
    $pgSQL->setQuery( $query );
    $start_places = $pgSQL->loadAssocList();

    $query = 'SELECT spa_id, spa_name_us AS name'
    .PHP_EOL.' FROM accounts.startpack'
    .PHP_EOL.' WHERE spa_race IN (-1,'.$pgSQL->Quote( $race ).')'
    ;
    $pgSQL->setQuery( $query );
    $start_packs = $pgSQL->loadAssocList();

	$enable_lightwindow = !( Page::getBrowserName() == 'msie' && Page::getBrowserVersion() <= 6 );

	if ($enable_lightwindow)
	{
		Page::setXML();
	}
	else
	{
		Page::setXHTML();
		Page::addJavaScript( 'prototype' );
		Page::addJavaScript( 'newchar_3' );
	}
	Page::Init();
?>
<div>
	<h1>Step 3</h1>

	<h2>Start position</h2>

	<form action="<?php echo Page::getURL(); ?>/community/account/us_newchar.php?charid=<?php echo $charid,($_GET['server'] == '1' ? '&amp;server=1' : ''); ?>" method="post" name="package" id="package">
		<p>
			<?php if (count($start_places)>1): ?>
			<select name="location" id="location">
				<?php foreach($start_places as $place): ?>
				<option value="<?php echo $place['spl_id']; ?>"><?php echo $place['name']; ?></option>
				<?php endforeach; ?>
			</select>
			<?php else: ?>
			<input type="hidden" name="location" value="<?php echo $start_places[0]['spl_id']; ?>" />
			<?php echo $start_places[0]['name']; ?>
			<?php endif; ?>
		</p>

		<h2>Start equipment</h2>

		<select name="startpack" id="startpack">
			<?php foreach($start_packs as $pack): ?>
			<option value="<?php echo $pack['spa_id']; ?>"><?php echo $pack['name']; ?></option>
			<?php endforeach; ?>
		</select>
		<button onclick="selectStartpack();return false;" style="margin-right:20px">Show</button>
		<span id="loading" style="display:none;">
			<img src="<?php echo Page::getImageURL(); ?>/ajax-loading-small.gif" style="height:16px;width:16px;margin-right:10px;" alt="Loading..." />
			Downloading package...
		</span>

		<div id="startpack_area"></div>

		<p style="text-align:center;padding:10px;">
			<input type="hidden" name="sel_pack" id="sel_pack" value="" />
			<input type="hidden" name="action" value="newchar_3" />
			<button onclick="document.forms.package.submit();" disabled="disabled" class="disabled" id="submit_button" style="margin-right:10px;">Send information</button>
			<?php if($enable_lightwindow): ?><button onclick="myLightWindow.deactivate();return false;" style="margin-left:10px;">Cancel</button><?php endif; ?>
		</p>
	</form>
</div>
