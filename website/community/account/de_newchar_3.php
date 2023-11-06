<?php
include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

IllaUser::requireLogin();

Page::addJavaScript( 'prototype' );
Page::addJavaScript( 'effects' );
Page::addJavaScript( 'slider' );

Page::addCSS( 'slider' );

Page::setXHTML();
Page::Init();

includeWrapper::includeOnce( Page::getRootPath().'/community/account/inc_editinfos.php' );

$server = ( isset( $_GET['server'] ) && $_GET['server'] == '1' ? 'devserver' : 'illarionserver');
$charid = ( isset( $_GET['charid'] )  && is_numeric($_GET['charid']) ? (int)$_GET['charid'] : false );
if (!$charid)
{
	exit('Fehler - Charakter ID wurde nicht richtig übergeben.');
}

$pgSQL =& Database::getPostgreSQL( $server );

$query = 'SELECT chr_race, chr_sex'
	.PHP_EOL.' FROM chars'
	.PHP_EOL.' WHERE chr_playerid = '.$pgSQL->Quote( $charid )
	.PHP_EOL.' AND chr_accid = '.$pgSQL->Quote( IllaUser::$ID )
	;
$pgSQL->setQuery( $query );
list( $race, $sex ) = $pgSQL->loadRow();

if ($race === null || $race === false)
{
	Messages::add( 'Charakter wurde nicht gefunden.', 'error' );
	includeWrapper::includeOnce( Page::getRootPath().'/community/account/de_charlist.php' );
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

$query = 'SELECT *'
.PHP_EOL.' FROM "'.$server.'"."raceattr"'
.PHP_EOL.' WHERE "id" IN ( -1, '.$pgSQL->Quote($race).' )'
.PHP_EOL.' ORDER BY "id" DESC'
;
$pgSQL->setQuery( $query, 0, 1 );
$limits = $pgSQL->loadAssocRow();


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

calculateLimits( $limits );
$limit_text = generateLimitTexts( $limits );

$db =& Database::getPostgreSQL( 'accounts' );
$query = 'SELECT attr_name_de AS name, attr_str AS str, attr_agi AS agi, attr_dex AS dex, attr_con AS con, attr_int AS int, attr_per AS per, attr_wil AS wil, attr_ess AS ess'
.PHP_EOL.' FROM attribtemp'
.PHP_EOL.' ORDER BY attr_id'
;
$db->setQuery( $query );
$templates = $db->loadAssocList();

?>
<h1>Neuen Charakter erstellen</h1>

<h2>Schritt 3</h2>

<p>Hier kannst du die Attribute deines Charakters festlegen.</p>
<p>Die Attributpakete geben einen Überblick über die Anforderungen der verschiedenen Rollen. Bitte ändere die bestehenden Pakete bei Bedarf um sie deiner gewünschten Charakterrolle anzupassen. Druiden benötigen derzeit 30 Punkte aufgeteilt auf Wahrnehmung, Essenz und Intelligenz. Magier benötigen derzeit 30 Punkte aufgeteilt auf Intelligenz, Essenz und Willensstärke.</p>
<p>Bewege deine Maus über ein Attribut, um einen Hilfetext anzuzeigen.</p>
<div>
	<form action="<?php echo Page::getURL(); ?>/community/account/de_newchar.php?charid=<?php echo $charid,($_GET['server'] == '1' ? '&amp;server=1' : ''); ?>" method="post" name="create_char" id="create_char">
		<div>
			<h2>Attribute</h2>

			<table style="width:100%">
				<tbody>
					<tr>
						<td>
							Attributpaket
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
							<a title="Die körperliche Kraft deines Charakters. Sie bestimmt den Schaden, den du im Kampf anrichtest, und das Gewicht, welches du tragen kannst. Dieses Attribut ist für Kämpfer, die Schaden austeilen wollen, wichtig und hilft auch Sammlern. Stärke beeinflusst die Lerngeschwindigkeit folgender Fertigkeiten: Schlagwaffen, Stichwaffen, Hiebwaffen und Ringen.">Stärke</a> (<?php echo $limits['minstrength'],' - ',$limits['maxstrength']; ?>)
						</td>
						<td style="width:423px;">
							<?php include_slider( $limits, 'strength' ); ?>
						</td>
					</tr>
					<tr>
						<td>
							<a title="Die Handlungsgeschwindigkeit deines Charakters. Sie bestimmt die Lauf- und Angriffsgeschwindigkeit. Dieses Attribut ist für Kämpfer wichtig, die Schaden vermeiden wollen. Schnelligkeit beeinflusst die Lerngeschwindigkeit folgender Fertigkeiten: Parieren, Leichte Rüstungen, Mittlere Rüstungen und Schwere Rüstungen.">Schnelligkeit</a> (<?php echo $limits['minagility'],' - ',$limits['maxagility']; ?>)
						</td>
						<td>
							<?php include_slider( $limits, 'agility' ); ?>
						</td>
					</tr>
					<tr>
						<td>
							<a title="Die körperliche Widerstandsfähigkeit deines Charakters. Sie bestimmt die Erholungsgeschwindigkeit der Trefferpunkte. Dieses Attribut ist für alle Sammler wichtig und hilft auch Kämpfern, Schaden abzuwenden. Ausdauer beeinflusst die Lerngeschwindigkeit folgender Fertigkeiten: Kräuterkunde, Bergbau, Fischen, Holzfällen, Graben, Gerben und Weben, Ackerbau und Landwirtschaft.">Ausdauer</a> (<?php echo $limits['minconstitution'],' - ',$limits['maxconstitution']; ?>)
						</td>
						<td>
							<?php include_slider( $limits, 'constitution' ); ?>
						</td>
					</tr>
					<tr>
						<td>
							<a title="Die Koordinationsfähigkeit deines Charakters. Dieses Attribut ist für alle Handwerker wichtig, da es die Qualität der Endprodukte erhöht. Es hilft auch Kämpfern ihr Ziel schwerer zu treffen. Geschicklichkeit beeinflusst die Lerngeschwindigkeit folgender Fertigkeiten: Schreinern, Kochen und Backen, Brauen, Töpfern, Edelsteinschleifen, Glasblasen, Rüstschmied, Feinschmieden, Schmieden und Schneidern.">Geschicklichkeit</a> (<?php echo $limits['mindexterity'],' - ',$limits['maxdexterity']; ?>)
						</td>
						<td>
							<?php include_slider( $limits, 'dexterity' ); ?>
						</td>
					</tr>
					<tr>
						<td>
							<a title="Das kognitive Verständnis deines Charakters. Dieses Attribut wird zukünftig für Magier wichtig sein und gewährt einen kleinen Bonus auf das Lernen aller Fertigkeiten. Intelligenz beeinflusst die Lerngeschwindigkeit folgender Fertigkeiten: Stabmagie und Juwelenverzauberung.">Intelligenz</a> (<?php echo $limits['minintelligence'],' - ',$limits['maxintelligence']; ?>)
						</td>
						<td>
							<?php include_slider( $limits, 'intelligence' ); ?>
						</td>
					</tr>
					<tr>
						<td>
							<a title="Die Fähigkeit deines Charakters, seine Sinne einzusetzen. Sie erhöht die Trefferchance im Kampf. Dieses Attribut ist für Bogenschützen wichtig und hilft auch Nahkämpfern, ihr Ziel zu treffen. Wahrnehmung beeinflusst die Lerngeschwindigkeit folgender Fertigkeiten: Distanzwaffen.">Wahrnehmung</a> (<?php echo $limits['minperception'],' - ',$limits['maxperception']; ?>)
						</td>
						<td>
							<?php include_slider( $limits, 'perception' ); ?>
						</td>
					</tr>
					<tr>
						<td>
							<a title="Die geistige Widerstandsfähigkeit deines Charakters. Dieses Attribut wird zukünftig für Priester wichtig sein und die Auswirkungen magischer Angriffe abschwächen. Willenskraft beeinflusst die Lerngeschwindigkeit folgender Fertigkeiten: -">Willenskraft</a> (<?php echo $limits['minwillpower'],' - ',$limits['maxwillpower']; ?>)
						</td>
						<td>
							<?php include_slider( $limits, 'willpower' ); ?>
						</td>
					</tr>
					<tr>
						<td>
							<a title="Die Verbundenheit deines Charakters mit der mystischen Welt. Sie steuert die Regeneration von Mana sowie zukünftig der Macht der Götter und hilft Alchemisten, magische Tränke zu erzeugen. Essenz beeinflusst die Lerngeschwindigkeit folgender Fertigkeiten: Alchemie.">Essenz</a> (<?php echo $limits['minessence'],' - ',$limits['maxessence']; ?>)
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
				<input type="submit" name="submit" value="Daten speichern" />
			</p>
		</div>
	</form>
</div>
