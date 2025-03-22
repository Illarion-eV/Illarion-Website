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

$query = 'SELECT attr_name_de AS name, attr_str AS str, attr_agi AS agi, attr_dex AS dex, attr_con AS con, attr_int AS int, attr_per AS per, attr_wil AS wil, attr_ess AS ess'
.PHP_EOL.' FROM attribute_packages'
.PHP_EOL.' ORDER BY attr_id'
;
$pgSQL->setQuery( $query );
$templates = $pgSQL->loadAssocList();

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
							<a title="Die physische Kraft deines Charakters. Sie beeinflusst direkt den Schaden, den du im Kampf verursachst, sowie das Gewicht, das du tragen kannst. Dieses Attribut ist wichtig für Rüstungsmacher sowie für alle Arten von Kämpfern und Sammlern, insbesondere beim Graben und Bergbau. Stärke beeinflusst die Lerngeschwindigkeit der folgenden Fähigkeiten: Schlagwaffen, Stichwaffen, Hiebwaffen, Ringen, Rüstungsmacher, Bergbau und Graben.">Stärke</a> (<?php echo $limits['minstrength'],' - ',$limits['maxstrength']; ?>)
						</td>
						<td style="width:423px;">
							<?php include_slider( $limits, 'strength' ); ?>
						</td>
					</tr>
					<tr>
						<td>
							<a title="Die Geschwindigkeit der Aktionen deines Charakters. Sie bestimmt das Lauftempo und die Angriffsgeschwindigkeit. Dieses Attribut ist wichtig für Kämpfer, die Schaden vermeiden wollen, aber es hilft auch beim Schwingen einer Axt zum Bäumefällen und ermöglicht die geschickten Bewegungen, die nötig sind, um mit dem rotierenden Ton als Töpfer Schritt zu halten. Beweglichkeit beeinflusst die Lerngeschwindigkeit der folgenden Fähigkeiten: Parieren, Leichte Rüstung, Mittlere Rüstung, Schwere Rüstung, Holzfällerei und Töpferei.">Schnelligkeit</a> (<?php echo $limits['minagility'],' - ',$limits['maxagility']; ?>)
						</td>
						<td>
							<?php include_slider( $limits, 'agility' ); ?>
						</td>
					</tr>
					<tr>
						<td>
							<a title="Die physische Widerstandskraft deines Charakters. Sie bestimmt die Regeneration der Lebenspunkte. Dieses Attribut ist für alle Sammler wichtig, hilft dir, das endlose Hämmern als Schmied zu ertragen, und unterstützt Kämpfer dabei, Schaden standzuhalten. Konstitution beeinflusst die Lerngeschwindigkeit der folgenden Fähigkeiten: Graben, Landwirtschaft, Fischerei, Kräuterkunde, Viehzucht, Bergbau, Gerberei, Weberei, Holzfällerei und Schmiedekunst.">Ausdauer</a> (<?php echo $limits['minconstitution'],' - ',$limits['maxconstitution']; ?>)
						</td>
						<td>
							<?php include_slider( $limits, 'constitution' ); ?>
						</td>
					</tr>
					<tr>
						<td>
							<a title="Die Koordinationsfähigkeiten deines Charakters. Dieses Attribut ist für alle Handwerker essenziell, da es die Qualität hergestellter Waren erhöht. Es hilft auch Kämpfern, ihr Ziel härter zu treffen, und unterstützt Bauern dabei, Sicheln und Sensen effizienter zu nutzen. Geschicklichkeit beeinflusst die Lerngeschwindigkeit der folgenden Fähigkeiten: Rüstungsmacher, Schmiedekunst, Tischlerei, Backen/Kochen, Brauen, Edelsteinschleifen, Glasbläserei, Feinmechanik, Töpferei, Schneiderei und Landwirtschaft.">Geschicklichkeit</a> (<?php echo $limits['mindexterity'],' - ',$limits['maxdexterity']; ?>)
						</td>
						<td>
							<?php include_slider( $limits, 'dexterity' ); ?>
						</td>
					</tr>
					<tr>
						<td>
							<a title="Die kognitive Einsicht deines Charakters. Dieses Attribut erhöht die Kraft der Zauber eines Magiers und gewährt einen kleinen Bonus auf das Lernen aller Fähigkeiten. Es verleiht außerdem die Kreativität, die ein guter Schneider benötigt, sowie die Geduld und den Scharfsinn, um Fische als Fischer auszutricksen. Intelligenz beeinflusst die Lerngeschwindigkeit der folgenden Fähigkeiten: Feuermagie, Wassermagie, Erdmagie, Geistesmagie, Windmagie, Verzauberung,Raum-Magie, Schneiderei und Fischerei.">Intelligenz</a> (<?php echo $limits['minintelligence'],' - ',$limits['maxintelligence']; ?>)
						</td>
						<td>
							<?php include_slider( $limits, 'intelligence' ); ?>
						</td>
					</tr>
					<tr>
						<td>
							<a title="Die Fähigkeit deines Charakters, die sechs Sinne zu nutzen. Sie erhöht die Trefferchance im Kampf. Dieses Attribut ist wichtig für Bogenschützen, hilft Nahkämpfern, ihr Ziel zu treffen, und unterstützt Magier beim Zielen. Außerdem verleiht es den Geschmackssinn, der für einen guten Koch, Bäcker und Brauer nötig ist, sowie die scharfe Sicht, um besser zu erkennen, welche Kräuter reif für die Ernte sind. Zudem erleichtert es das Auffinden von Zielen auf Schatzkarten und wird in Zukunft für Druiden wichtig sein. Wahrnehmung beeinflusst die Lerngeschwindigkeit der folgenden Fähigkeiten: Distanzwaffen, Kochen und Backen, Brauen, Kräuterkunde.">Wahrnehmung</a> (<?php echo $limits['minperception'],' - ',$limits['maxperception']; ?>)
						</td>
						<td>
							<?php include_slider( $limits, 'perception' ); ?>
						</td>
					</tr>
					<tr>
						<td>
							<a title="Die mentale Widerstandskraft deines Charakters. Dieses Attribut erhöht sowohl deine Fähigkeit, Magie zu widerstehen, als auch die Durchschlagskraft der Zauber eines Magiers – ein Wettkampf des stärkeren Willens. Es verleiht dir außerdem die Ausdauer, der Hitze eines Glasbläserofens zu trotzen, sowie dem ständigen Sägestaub, Splittern und Schleifen in der Tischlerei standzuhalten. Zudem hilft es dir, sturer als ein Schaf zu sein, was das Scheren erleichtert. In Zukunft wird es auch für Priester von Bedeutung sein. Willenskraft beeinflusst die Lerngeschwindigkeit der folgenden Fähigkeiten: Magieresistenz, Glasbläserei, Tischlerei, Gerberei und Weberei.">Willenskraft</a> (<?php echo $limits['minwillpower'],' - ',$limits['maxwillpower']; ?>)
						</td>
						<td>
							<?php include_slider( $limits, 'willpower' ); ?>
						</td>
					</tr>
					<tr>
						<td>
							<a title="Die Affinität deines Charakters zur mystischen Welt. Sie beeinflusst die Regeneration von Mana und göttlicher Kraft sowie deine Fähigkeit, Tränke zu brauen. Zudem erleichtert sie den Umgang mit Tieren, was für die Viehzucht wichtig sein kann, und verleiht den künstlerischen Geist und die Leidenschaft, die nötig sind, um meisterhafte Edelsteine zu schleifen und kunstvollen Schmuck herzustellen. Essenz beeinflusst die Lerngeschwindigkeit der folgenden Fähigkeiten: Alchemie, Viehzucht, Edelsteinschleifen, Feinmechanik.">Essenz</a> (<?php echo $limits['minessence'],' - ',$limits['maxessence']; ?>)
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
