<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_character.php' );

	$server = ( isset( $_GET['server'] ) && $_GET['server'] == '1' ? false : true );

	if (!$server)
	{
		exit('Abgeschaltet für Testserver-Charaktere');
	}

    Page::setXML();
    Page::Init();


	if ( !isset( $_GET['charid'] ) || !is_numeric( $_GET['charid'] ) )
	{
		exit('Fehler - Charakter ID wurde nicht richtig übergeben.');
	}
	else
	{
		$charid = (int)$_GET['charid'];
	}

	$char_settings = getCharSettings($charid);
?>
<div>
	<h2>Einstellungen anpassen</h2>

	<form action="<?php echo Page::getURL(); ?>/illarion/gmtool/de_character_settings.php?charid=<?php echo $charid; ?>&amp;server=<?php echo $_GET['server']; ?>" method="post" name="settingsForm">
		<table style="width:100%;">
			<tbody>
				<tr>
					<td style="width:40%;">
						<a title="" class="tooltip" onmouseover="Tip('Diese Option legt fest, ob das Profil des Charakters für andere sichtbar ist.',TITLE,'Profil anzeigen',WIDTH,-300);" onmouseout="UnTip();">Profil anzeigen</a>
					</td>
					<td style="width:30%;">
						<input type="radio" value="0" id="show_profil0" name="show_profil"<?php echo ( $char_settings['show_profil'] ? '' : ' checked="checked"' ); ?> />
						<label for="show_profil0">verbergen</label>
					</td>
					<td>
						<input type="radio" value="1" id="show_profil1" name="show_profil"<?php echo ( $char_settings['show_profil'] ? ' checked="checked"' : '' ); ?> />
						<label for="show_profil1">anzeigen</label>
					</td>
				</tr>

				<tr>
					<td>
						<a title="" class="tooltip" onmouseover="Tip('Diese Option legt fest, ob die Geschichte des Charakters im Profil sichtbar ist oder nicht.',TITLE,'Geschichte anzeigen',WIDTH,-300);" onmouseout="UnTip();">Geschichte anzeigen</a>
					</td>
					<td>
						<input type="radio" value="0" id="show_story0" name="show_story"<?php echo ( $char_settings['show_story'] ? '' : ' checked="checked"' ); ?> />
						<label for="show_story0">verbergen</label>
					</td>
					<td>
						<input type="radio" value="1" id="show_story1" name="show_story"<?php echo ( $char_settings['show_story'] ? ' checked="checked"' : '' ); ?> />
						<label for="show_story1">anzeigen</label>
					</td>
				</tr>

				<tr>
					<td>
						<a title="" class="tooltip" onmouseover="Tip('Diese Option legt fest, ob der Geburtstag das Charakters im Kalender von Illarion und im Profil angezeigt wird oder nicht.',TITLE,'Geburtstag anzeigen',WIDTH,-300);" onmouseout="UnTip();">Geburtstag anzeigen</a>
					</td>
					<td class="paramlist_value">
						<input type="radio" value="0" id="show_birthday0" name="show_birthday"<?php echo ( $char_settings['show_birthday'] ? '' : ' checked="checked"' ); ?> />
						<label for="show_birthday0">verbergen</label>
					</td>
					<td>
						<input type="radio" value="1" id="show_birthday1" name="show_birthday"<?php echo ( $char_settings['show_birthday'] ? ' checked="checked"' : '' ); ?> />
						<label for="show_birthday1">anzeigen</label>
					</td>
				</tr>

				<tr>
					<td style="height:10px;" />
				</tr>

				<tr>
					<td colspan="3" style="text-align:center;">
						<button onclick="document.forms.settingsForm.submit();" style="margin-right:10px;">Speichern</button>
						<button onclick="myLightWindow.deactivate();return false;" style="margin-left:10px;">Abbrechen</button>
						<input type="hidden" name="action" value="char_settings" />
					</td>
				</tr>
			</tbody>
		</table>
	</form>
</div>
