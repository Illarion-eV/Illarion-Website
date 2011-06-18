<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	if (!IllaUser::loggedIn())
	{
		header('HTTP/1.0 401 Unauthorized');
		exit();
	}

	includeWrapper::includeOnce( Page::getRootPath().'/community/account/inc_editinfos.php' );

	$server = ( isset( $_GET['server'] ) && $_GET['server'] == '1' ? 'testserver' : 'illarionserver');
	$charid = ( isset( $_GET['charid'] )  && is_numeric($_GET['charid']) ? (int)$_GET['charid'] : false );
	if (!$charid)
	{
		exit('Fehler - Charakter ID wurde nicht richtig übergeben.');
	}

	$pgSQL =& Database::getPostgreSQL( $server );

	$query = 'SELECT chr_race'
	.PHP_EOL.' FROM chars'
	.PHP_EOL.' WHERE chr_playerid = '.$pgSQL->Quote( $charid )
	.PHP_EOL.' AND chr_accid = '.$pgSQL->Quote( IllaUser::$ID )
	;
	$pgSQL->setQuery( $query );
	$race = $pgSQL->loadResult();

	if ($race === null || $race === false)
	{
		header('HTTP/1.0 401 Unauthorized');
		exit();
	}

	$query = 'SELECT COUNT(*)'
	.PHP_EOL.' FROM player'
	.PHP_EOL.'WHERE ply_playerid = '.$pgSQL->Quote( $charid )
	.PHP_EOL.' AND ply_strength != 0'
	;
	$pgSQL->setQuery( $query );
	if ($pgSQL->loadResult())
	{
		exit('Fehler - Werte wurden bereits gesetzt');
	}

	$account =& Database::getPostgreSQL( 'accounts' );

	$query = 'SELECT *'
	.PHP_EOL.' FROM raceattr'
	.PHP_EOL.' WHERE id IN ( -1, '.$account->Quote( $race ).' )'
	.PHP_EOL.' ORDER BY id DESC'
	;
	$account->setQuery( $query, 0, 1 );
	$limits = $account->loadAssocRow();

	$limits['curr_agility'] = $limits['minagility'];
	$limits['curr_strength'] = $limits['minstrength'];
	$limits['curr_constitution'] = $limits['minconstitution'];
	$limits['curr_dexterity'] = $limits['mindexterity'];
	$limits['curr_perception'] = $limits['minperception'];
	$limits['curr_willpower'] = $limits['minwillpower'];
	$limits['curr_intelligence'] = $limits['minintelligence'];
	$limits['curr_essence'] = $limits['minessence'];
	$limits['curr_remaining'] = $limits['maxattribs'] - ( $limits['curr_agility']+$limits['curr_strength']+$limits['curr_constitution']+$limits['curr_dexterity']+$limits['curr_perception']+$limits['curr_willpower']+$limits['curr_intelligence']+$limits['curr_essence'] );
	$limits['minremaining'] = 0;
	$limits['maxremaining'] = $limits['maxattribs'];

	calculateLimits( &$limits );
	$limit_text = generateLimitTexts( $limits );

	$mySQL =& Database::getMySQL();
	$query = 'SELECT `name_de` AS `name`, `str`, `agi`, `dex`, `con`, `int`, `per`, `wil`, `ess`'
	.PHP_EOL.' FROM `homepage_attribtemp`'
	.PHP_EOL.' ORDER BY `id`'
	;
	$mySQL->setQuery( $query );
	$templates = $mySQL->loadAssocList();

	$enable_lightwindow = !( Page::getBrowserName() == 'msie' && Page::getBrowserVersion() <= 6 );

	if ($enable_lightwindow)
	{
		Page::setXML();
	}
	else
	{
		Page::setXHTML();
		Page::addJavaScript( 'prototype' );
		Page::addJavaScript( 'effects' );
		Page::addCSS( 'slider' );
		Page::addJavaScript( 'slider' );
	}
	Page::Init();
?>

<div>
	<h1>Schritt 3</h1>

	<form action="<?php echo Page::getURL(); ?>/community/account/new/de_newchar.php?charid=<?php echo $charid,($_GET['server'] == '1' ? '&amp;server=1' : ''); ?>" method="post" name="create_char" id="create_char">
		<div>
			<h2>Attribute</h2>

			<table style="width:100%">
				<tbody>
					<tr>
						<td>
							Attributpakete
						</td>
						<td style="width:423px;">
							<select id="attrib_pack">
								<option>Keins</option>
								<?php foreach($templates as $template): ?>
								<option value="<?php echo $template['str'],'|',$template['agi'],'|',$template['dex'],'|',$template['con'],'|',$template['int'],'|',$template['per'],'|',$template['wil'],'|',$template['ess']; ?>"><?php echo $template['name']; ?></option>
								<?php endforeach; ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							Stärke (<?php echo $limits['minstrength'],' - ',$limits['maxstrength']; ?>)
						</td>
						<td style="width:423px;">
							<?php include_slider( $limits, 'strength' ); ?>
						</td>
					</tr>
					<tr>
						<td>
							Schnelligkeit (<?php echo $limits['minagility'],' - ',$limits['maxagility']; ?>)
						</td>
						<td>
							<?php include_slider( $limits, 'agility' ); ?>
						</td>
					</tr>
					<tr>
						<td>
							Ausdauer (<?php echo $limits['minconstitution'],' - ',$limits['maxconstitution']; ?>)
						</td>
						<td>
							<?php include_slider( $limits, 'constitution' ); ?>
						</td>
					</tr>
					<tr>
						<td>
							Geschicklichkeit (<?php echo $limits['mindexterity'],' - ',$limits['maxdexterity']; ?>)
						</td>
						<td>
							<?php include_slider( $limits, 'dexterity' ); ?>
						</td>
					</tr>
					<tr>
						<td>
							Intelligenz (<?php echo $limits['minintelligence'],' - ',$limits['maxintelligence']; ?>)
						</td>
						<td>
							<?php include_slider( $limits, 'intelligence' ); ?>
						</td>
					</tr>
					<tr>
						<td>
							Wahrnehmung (<?php echo $limits['minperception'],' - ',$limits['maxperception']; ?>)
						</td>
						<td>
							<?php include_slider( $limits, 'perception' ); ?>
						</td>
					</tr>
					<tr>
						<td>
							Willenskraft (<?php echo $limits['minwillpower'],' - ',$limits['maxwillpower']; ?>)
						</td>
						<td>
							<?php include_slider( $limits, 'willpower' ); ?>
						</td>
					</tr>
					<tr>
						<td>
							Essenz (<?php echo $limits['minessence'],' - ',$limits['maxessence']; ?>)
						</td>
						<td>
							<?php include_slider( $limits, 'essence' ); ?>
						</td>
					</tr>
					<tr>
						<td>
							Restliche Punkte
						</td>
						<td>
							<?php include_slider( $limits, 'remaining' ); ?>
						</td>
					</tr>
				</tbody>
			</table>
			<?php include_attribute_js( $limits ); ?>
			<p style="text-align:center;padding-bottom:10px;">
				<input type="hidden" name="action" value="newchar_3" />
				<button onclick="document.forms.create_char.submit();" style="margin-right:10px;">Daten speichern</button>
				<?php if($enable_lightwindow): ?><button onclick="myLightWindow.deactivate();return false;" style="margin-left:10px;">Abbrechen</button><?php endif; ?>
			</p>
		</div>
	</form>
</div>