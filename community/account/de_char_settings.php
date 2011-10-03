<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	$server = ( isset( $_GET['server'] ) && $_GET['server'] == '1' ? false : true );
	$source = ( isset( $_GET['source'] ) && $_GET['source'] == '1' ? true : false );

	if (!$server)
	{
		exit('Abgeschalten für Testserver-Charaktere');
	}

	if ( !isset( $_GET['charid'] ) || !is_numeric( $_GET['charid'] ) )
	{
		exit('Fehler - Charakter ID wurde nicht richtig übergeben.');
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
		exit('Charakter wurde nicht gefunden');
	}
	$mySQL =& Database::getMySQL();
	$query = 'SELECT `settings`'
	.PHP_EOL.' FROM `homepage_character_details`'
	.PHP_EOL.' WHERE `char_id` = '.$mySQL->Quote( $charid );
	$mySQL->setQuery( $query );
	$settings = $mySQL->loadResult();

	$show_profil   = ( (int)($settings&1) > 0 );
	$show_online   = ( (int)($settings&2) == 0 );
	$show_story    = ( (int)($settings&4) > 0 );
	$show_birthday = ( (int)($settings&8) > 0 );

	Page::setXML();
	Page::Init();
?>
<div>
	<h2>Einstellungen anpassen</h2>

	<?php if ($source) : ?>
		<form action="<?php echo Page::getURL(); ?>/illarion/gmtool/de_character_settings.php?id=<?php echo $charid; ?>&amp;server=<?php echo $_GET['server']; ?>" method="post" name="settingsForm">
	<?php else : ?>
		<form action="<?php echo Page::getURL(); ?>/community/account/de_char_details.php?charid=<?php echo $charid; ?>" method="post" name="settingsForm">
	<?php endif ?>
		<table style="width:100%;">
			<tbody>
				<tr>
					<td style="width:40%;">
						<a title="" class="tooltip" onmouseover="Tip('Diese Option legt fest, ob das Profil des Charakters für andere sichtbar ist.',TITLE,'Profil anzeigen',WIDTH,-300);" onmouseout="UnTip();">Profil anzeigen</a>
					</td>
					<td style="width:30%;">
						<input type="radio" value="0" id="show_profil0" name="show_profil"<?php echo ( $show_profil ? '' : ' checked="checked"' ); ?> />
						<label for="show_profil0">verbergen</label>
					</td>
					<td>
						<input type="radio" value="1" id="show_profil1" name="show_profil"<?php echo ( $show_profil ? ' checked="checked"' : '' ); ?> />
						<label for="show_profil1">anzeigen</label>
					</td>
				</tr>

				<tr>
					<td>
						<a title="" class="tooltip" onmouseover="Tip('Diese Option legt fest, ob dieser Charakter auf der Onlineliste erscheint oder nicht.',TITLE,'Onlinestatus anzeigen',WIDTH,-300);" onmouseout="UnTip();">Onlinestatus anzeigen</a>
					</td>
					<td>
						<input type="radio" value="0" id="show_online0" name="show_online"<?php echo ( $show_online ? '' : ' checked="checked"' ); ?> />
						<label for="show_online0">verbergen</label>
					</td>
					<td>
						<input type="radio" value="1" id="show_online1" name="show_online"<?php echo ( $show_online ? ' checked="checked"' : '' ); ?> />
						<label for="show_online1">anzeigen</label>
					</td>
				</tr>

				<tr>
					<td>
						<a title="" class="tooltip" onmouseover="Tip('Diese Option legt fest, ob die Geschichte des Charakters im Profil sichtbar ist oder nicht.',TITLE,'Geschichte anzeigen',WIDTH,-300);" onmouseout="UnTip();">Geschichte anzeigen</a>
					</td>
					<td>
						<input type="radio" value="0" id="show_story0" name="show_story"<?php echo ( $show_story ? '' : ' checked="checked"' ); ?> />
						<label for="show_story0">verbergen</label>
					</td>
					<td>
						<input type="radio" value="1" id="show_story1" name="show_story"<?php echo ( $show_story ? ' checked="checked"' : '' ); ?> />
						<label for="show_story1">anzeigen</label>
					</td>
				</tr>

				<tr>
					<td>
						<a title="" class="tooltip" onmouseover="Tip('Diese Option legt fest, ob der Geburtstag das Charakters im Kalender von Illarion und im Profil angezeigt wird oder nicht.',TITLE,'Geburtstag anzeigen',WIDTH,-300);" onmouseout="UnTip();">Geburtstag anzeigen</a>
					</td>
					<td class="paramlist_value">
						<input type="radio" value="0" id="show_birthday0" name="show_birthday"<?php echo ( $show_birthday ? '' : ' checked="checked"' ); ?> />
						<label for="show_birthday0">verbergen</label>
					</td>
					<td>
						<input type="radio" value="1" id="show_birthday1" name="show_birthday"<?php echo ( $show_birthday ? ' checked="checked"' : '' ); ?> />
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