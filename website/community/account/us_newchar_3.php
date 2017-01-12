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
	exit('Error - Character ID was not transferred correctly.');
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
	Messages::add( 'Character not found', 'error' );
	includeWrapper::includeOnce( Page::getRootPath().'/community/account/us_charlist.php' );
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
	exit('Error - Values already set');
}

$query = 'SELECT *'
.PHP_EOL.' FROM "'.$server.'"."raceattr"'
.PHP_EOL.' WHERE "id" IN ( -1, '.$pgSQL->Quote( $race ).' )'
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
$query = 'SELECT attr_name_us AS name, attr_str AS str, attr_agi AS agi, attr_dex AS dex, attr_con AS con, attr_int AS int, attr_per AS per, attr_wil AS wil, attr_ess AS ess'
.PHP_EOL.' FROM attribtemp'
.PHP_EOL.' ORDER BY attr_id'
;
$db->setQuery( $query );
$templates = $db->loadAssocList();

?>
<h1>Create a new character</h1>

<h2>Step 3</h2>

<p>You have to put in the attributes of your character here.</p>
<p>The attribute packages should give your a general idea of what attributes go towards a certain role. Make changes to existing packages to adjust them to the role you'd like to play. Druids need a pool of 30 points shared between perception, essence, and intelligence.</p> 
<p>Hover your mouse of an attribute to get a tool tip.</p>
<div>
	<form action="<?php echo Page::getURL(); ?>/community/account/us_newchar_4.php?charid=<?php echo $charid,($_GET['server'] == '1' ? '&amp;server=1' : ''); ?>" method="post" name="create_char" id="create_char">
		<div>
			<h2>Attributes</h2>

			<table style="width:100%">
				<tbody>
					<tr>
						<td>
							Package
						</td>
						<td style="width:423px;">
							<select id="attrib_pack">
								<option>none</option>
								<?php foreach($templates as $template): ?>
								<option value="<?php echo $template['str'],'|',$template['agi'],'|',$template['dex'],'|',$template['con'],'|',$template['int'],'|',$template['per'],'|',$template['wil'],'|',$template['ess']; ?>"><?php echo $template['name']; ?></option>
								<?php endforeach; ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<a title="The physical force of your character. It directly influences the damage you deal in combat and the weight you can carry. This attribute is important for all kinds of fighters but also gatherers. Strength affects the learning speed of the following skills: Blunt weapons, stabbing weapons, slashing weapons, and wrestling.">Strength</a> (<?php echo $limits['minstrength'],' - ',$limits['maxstrength']; ?>)
						</td>
						<td style="width:423px;">
							<?php include_slider( $limits, 'strength' ); ?>
						</td>
					</tr>
					<tr>
						<td>
							<a title="Your character's speed of actions. It determines running pace and attack speed. This attribute matters for fighters that want to avoid damage. Agility affects the learning speed of the following skills: Parry, Light Armour, Medium Armour, and Heavy Armour.">Agility</a> (<?php echo $limits['minagility'],' - ',$limits['maxagility']; ?>)
						</td>
						<td>
							<?php include_slider( $limits, 'agility' ); ?>
						</td>
					</tr>
					<tr>
						<td>
							<a title="The physical resilience of your character. It governs the regneration. This attribute if of importance to all gatherers and also assists fighters to withstand damage. Constitution affects the learning speed of the following skills: Digging, Farming, Fishing, Herblore, Husbandry, Mining, Tanning and Weaving, and Woodcutting.">Constitution</a> (<?php echo $limits['minconstitution'],' - ',$limits['maxconstitution']; ?>)
						</td>
						<td>
							<?php include_slider( $limits, 'constitution' ); ?>
						</td>
					</tr>
					<tr>
						<td>
							<a title="The coordination skills of your character. It increases the chance to hit in combat. This attribute is vital for all crafters and helps fighters to hit their target. Dexterity affects the learning speed of the following skills: Armourer, Blacksmithing, Carpentry, Baking/Cooking, Brewing, Gemcutting, Glass Blowing, Finesmithing, Pottery, and Tailoring.">Dexterity</a> (<?php echo $limits['mindexterity'],' - ',$limits['maxdexterity']; ?>)
						</td>
						<td>
							<?php include_slider( $limits, 'dexterity' ); ?>
						</td>
					</tr>
					<tr>
						<td>
							<a title="The cognitive insight of your character. This attribute will be of importance for magicians in future and helps alchemists to brew potions. The attribute grants a small bonus on learning all skills. Intelligence affects the learning speed of the following skills: Wand magic.">Intelligence</a> (<?php echo $limits['minintelligence'],' - ',$limits['maxintelligence']; ?>)
						</td>
						<td>
							<?php include_slider( $limits, 'intelligence' ); ?>
						</td>
					</tr>
					<tr>
						<td>
							<a title="The ability of your character to use the six senses. It increases the chance to hit in combat and helps alchemists to brew potions. This attribute is important for archers and also helps melee fighters to hit their target. Perception affects the learning speed of the following skills: Alchemy, Distance Weapons.">Perception</a> (<?php echo $limits['minperception'],' - ',$limits['maxperception']; ?>)
						</td>
						<td>
							<?php include_slider( $limits, 'perception' ); ?>
						</td>
					</tr>
					<tr>
						<td>
							<a title="The mental resistance of your character. This attribute will be of importance to priests in future and will also reduce the effect of magical attacks. Willpower affects the learning speed of the following skills: -">Willpower</a> (<?php echo $limits['minwillpower'],' - ',$limits['maxwillpower']; ?>)
						</td>
						<td>
							<?php include_slider( $limits, 'willpower' ); ?>
						</td>
					</tr>
					<tr>
						<td>
							<a title="The affinity of your character to the mystical world. It matters most for alchemists and will control the regneration of mana and divine power. Essence affects the learning speed of the following skills: -">Essence</a> (<?php echo $limits['minessence'],' - ',$limits['maxessence']; ?>)
						</td>
						<td>
							<?php include_slider( $limits, 'essence' ); ?>
						</td>
					</tr>
					<tr>
						<td>
							Remaining points
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
				<input type="submit" name="submit" value="Save data" />
			</p>
		</div>
	</form>
</div>
