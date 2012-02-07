<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	$server = ( isset( $_GET['server'] ) && $_GET['server'] == '1' ? false : true );

	if (!$server)
	{
		exit('Disabled for testserver characters');
	}

	if ( !isset( $_GET['charid'] ) || !is_numeric( $_GET['charid'] ) )
	{
		exit('Error - Character ID not correctly transfered.');
	}
	else
	{
		$charid = (int)$_GET['charid'];
	}

	$pgSQL =& Database::getPostgreSQL( 'illarionserver' );

	$query = 'SELECT COUNT(*)'
	.PHP_EOL.' FROM chars'
	.PHP_EOL.' WHERE chr_accid = '.$pgSQL->Quote( IllaUser::$ID )
	.PHP_EOL.' AND chr_playerid = '.$pgSQL->Quote( $charid )
	;
	$pgSQL->setQuery( $query );

	if (!$pgSQL->loadResult())
	{
		exit('Character was not found');
	}
	$db_hp =& Database::getPostgreSQL( 'homepage' );
	$query = 'SELECT settings'
	.PHP_EOL.' FROM character_details'
	.PHP_EOL.' WHERE char_id = '.$db_hp->Quote( $charid );
	$db_hp->setQuery( $query );
	$settings = $db_hp->loadResult();

	$show_profil   = ( (int)($settings&1) > 0 );
	$show_online   = ( (int)($settings&2) == 0 );
	$show_story    = ( (int)($settings&4) > 0 );
	$show_birthday = ( (int)($settings&8) > 0 );

	Page::setXML();
	Page::Init();
?>

<div>
	<h2>Change settings</h2>

	<form action="<?php echo Page::getURL(); ?>/community/account/us_char_details.php?charid=<?php echo $charid; ?>" method="post" name="settingsForm">
		<table style="width:100%;">
			<tbody>
				<tr>
					<td style="width:40%;">
						<a title='' class="tooltip" onmouseover="Tip('Enable this option to make your character profile visible for others.',TITLE,'Show profile',WIDTH,-300);" onmouseout="UnTip();">Show profile</a>
					</td>
					<td style="width:30%;">
						<input type="radio" value="0" id="show_profil0" name="show_profil"<?php echo ( $show_profil ? '' : ' checked="checked"' ); ?> />
						<label for="show_profil0">hide</label>
					</td>
					<td>
						<input type="radio" value="1" id="show_profil1" name="show_profil"<?php echo ( $show_profil ? ' checked="checked"' : '' ); ?> />
						<label for="show_profil1">show</label>
					</td>
				</tr>
<!-- always show chars on online list
				<tr>
					<td>
						<a title='' class="tooltip" onmouseover="Tip('This option selects if the character is shown at the online list or not',TITLE,'Show onlinestate',WIDTH,-300);" onmouseout="UnTip();">Show onlinestate</a>
					</td>
					<td>
						<input type="radio" value="0" id="show_online0" name="show_online"<?php echo ( $show_online ? '' : ' checked="checked"' ); ?> />
						<label for="show_online0">hide</label>
					</td>
					<td>
						<input type="radio" value="1" id="show_online1" name="show_online"<?php echo ( $show_online ? ' checked="checked"' : '' ); ?> />
						<label for="show_online1">show</label>
					</td>
				</tr>
-->
				<tr>
					<td>
						<a title='' class="tooltip" onmouseover="Tip('This option selects if the character story is visible or not.',TITLE,'Show story',WIDTH,-300);" onmouseout="UnTip();">Show story</a>
					</td>
					<td>
						<input type="radio" value="0" id="show_story0" name="show_story"<?php echo ( $show_story ? '' : ' checked="checked"' ); ?> />
						<label for="show_story0">hide</label>
					</td>
					<td>
						<input type="radio" value="1" id="show_story1" name="show_story"<?php echo ( $show_story ? ' checked="checked"' : '' ); ?> />
						<label for="show_story1">show</label>
					</td>
				</tr>

				<tr>
					<td>
						<a title='' class="tooltip" onmouseover="Tip('This option selects if the birthday of the character is shown in the Illarion calendar and in the character profile',TITLE,'Show birthday',WIDTH,-300);" onmouseout="UnTip();">Show birthday</a>
					</td>
					<td class="paramlist_value">
						<input type="radio" value="0" id="show_birthday0" name="show_birthday"<?php echo ( $show_birthday ? '' : ' checked="checked"' ); ?> />
						<label for="show_birthday0">hide</label>
					</td>
					<td>
						<input type="radio" value="1" id="show_birthday1" name="show_birthday"<?php echo ( $show_birthday ? ' checked="checked"' : '' ); ?> />
						<label for="show_birthday1">show</label>
					</td>
				</tr>

				<tr>
					<td style="height:10px;" />
				</tr>

				<tr>
					<td colspan="3" style="text-align:center;">
						<button onclick="document.forms.settingsForm.submit();" style="margin-right:10px;">Save</button>
						<button onclick="myLightWindow.deactivate();return false;" style="margin-left:10px;">Cancel</button>
						<input type="hidden" name="action" value="char_settings" />
					</td>
				</tr>
			</tbody>
		</table>
	</form>
</div>
