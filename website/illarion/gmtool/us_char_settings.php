<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_character.php' );

	$server = ( isset( $_GET['server'] ) && $_GET['server'] == '1' ? false : true );

	if (!$server)
	{
		exit('Abgeschaltet für Devserver-Charaktere');
	}

    Page::setXML();
    Page::Init();


	if ( !isset( $_GET['charid'] ) || !is_numeric( $_GET['charid'] ) )
	{
		exit('Error - character ID was not passed properly.');
	}
	else
	{
		$charid = (int)$_GET['charid'];
	}

	$char_settings = getCharSettings($charid);
?>
<div>
	<h2>Customise Settings</h2>

	<form action="<?php echo Page::getURL(); ?>/illarion/gmtool/de_character_settings.php?charid=<?php echo $charid; ?>&amp;server=<?php echo $_GET['server']; ?>" method="post" name="settingsForm">
		<table style="width:100%;">
			<tbody>
				<tr>
					<td style="width:40%;">
						<a title="" class="tooltip" onmouseover="Tip('This option determines whether the profile of the character is visible to others.',TITLE,'View Profile',WIDTH,-300);" onmouseout="UnTip();">View Profile</a>
					</td>
					<td style="width:30%;">
						<input type="radio" value="0" id="show_profil0" name="show_profil"<?php echo ( $char_settings['show_profil'] ? '' : ' checked="checked"' ); ?> />
						<label for="show_profil0">Hide</label>
					</td>
					<td>
						<input type="radio" value="1" id="show_profil1" name="show_profil"<?php echo ( $char_settings['show_profil'] ? ' checked="checked"' : '' ); ?> />
						<label for="show_profil1">Show</label>
					</td>
				</tr>

				<tr>
					<td>
						<a title="" class="tooltip" onmouseover="Tip('This option determines whether the history of the character in the profile is visible or not.',TITLE,'Show History',WIDTH,-300);" onmouseout="UnTip();">Show History</a>
					</td>
					<td>
						<input type="radio" value="0" id="show_story0" name="show_story"<?php echo ( $char_settings['show_story'] ? '' : ' checked="checked"' ); ?> />
						<label for="show_story0">Hide</label>
					</td>
					<td>
						<input type="radio" value="1" id="show_story1" name="show_story"<?php echo ( $char_settings['show_story'] ? ' checked="checked"' : '' ); ?> />
						<label for="show_story1">Show</label>
					</td>
				</tr>

				<tr>
					<td>
						<a title="" class="tooltip" onmouseover="Tip('This option determines whether the character is displayed in the birthday calendar of Illarion and in the profile or not.',TITLE,'Show Birthday',WIDTH,-300);" onmouseout="UnTip();">Show Birthday</a>
					</td>
					<td class="paramlist_value">
						<input type="radio" value="0" id="show_birthday0" name="show_birthday"<?php echo ( $char_settings['show_birthday'] ? '' : ' checked="checked"' ); ?> />
						<label for="show_birthday0">Hide</label>
					</td>
					<td>
						<input type="radio" value="1" id="show_birthday1" name="show_birthday"<?php echo ( $char_settings['show_birthday'] ? ' checked="checked"' : '' ); ?> />
						<label for="show_birthday1">Show</label>
					</td>
				</tr>

				<tr>
					<td style="height:10px;" />
				</tr>

				<tr>
					<td colspan="3" style="text-align:center;">
						<button onclick="document.forms.settingsForm.submit();" style="margin-right:10px;">Save</button>
						<button onclick="myLightWindow.deactivate();return false;" style="margin-left:10px;">Abort</button>
						<input type="hidden" name="action" value="char_settings" />
					</td>
				</tr>
			</tbody>
		</table>
	</form>
</div>
