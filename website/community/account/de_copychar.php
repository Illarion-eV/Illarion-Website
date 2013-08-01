<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	IllaUser::requireLogin();

	Page::Init();

	Page::setTitle( array( 'Account', 'Kopiere Charakter auf Testserver' ) );
	Page::setDescription( 'Auf dieser Seite kannst du einen deiner Spielserver-Charaktere auf den Testserver kopieren.' );
	Page::setKeywords( array( 'Charakter', 'Kopie', 'Erstellen' ) );

	Page::setXHTML();
	
	$illarionserver =& Database::getPostgreSQL('illarionserver');

	$query = 'SELECT chr_playerid, chr_name'
	.PHP_EOL.' FROM chars'
	.PHP_EOL.' WHERE chr_accid = '.$illarionserver->Quote( IllaUser::$ID )
	.PHP_EOL.' ORDER BY chr_name ASC'
	;
	$illarionserver->setQuery( $query );
	$char_list = $illarionserver->loadAssocList();

?>

<h1>Charakter auf Testserver kopieren</h1>

<h2>Allgemeine Informationen</h2>

<p>Eine frühere Kopie des gewählten Charakters wird überschrieben werden.
	Bitte nehme zur Kenntnis, dass es keine Unterstützung für
	Testserver-Charaktere gibt. Außerdem können diese Charaktere jederzeit
	und ohne Vorwarnung gelöscht werden.
</p><p>
	Einmal im Testserver eingeloggt, steht dir eine begrenzte Anzahl GM-Befehle
	zur Verfügung um dich beim Testen zu unterstützen. Diese Befehle können
	mit dem !? Befehl aufgelistet werden.
</p><p><b>
	Testserver-Charaktere sind ausschließlich zum Testen gedacht. Das bedeutet
	z.B., dass du mit diesen Charakteren kein Rollenspiel betreiben darfst
	(der Testserver ist OOC-Zone) und sie auch nicht dazu mißbrauchen darfst
	Sicherheitskopien von deinen Spielserver-Charakteren anzulegen.
	Testserver-Charaktere werden unter keinen Umständen auf den Spielserver
	zurückkopiert werden.
</b></p>

<h2>Charakter auswählen</h2>
<p>Bitte wähle den Charakter, welcher auf den Testserver kopiert werden soll.</p>

<form method="post" name="char_form" id="char_form" action="<?php echo Page::getURL(); ?>/community/account/de_charlist.php">
		<table style="width:100%;">
			<tbody>
				<tr>
					<td style="width:45%;vertical-align:top;" rowspan="2">
						Spielserver-Character:
					</td>
					<td>
						<select name="charid" style="width:100%;">
							<?php foreach( $char_list as $char ): ?>
							<option value="<?php echo $char["chr_playerid"]; ?>"><?php echo $char["chr_name"]; ?></option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
			</tbody>
		</table>
	<p style="text-align:center;">
		<input type="submit" name="submit" id="submit" value="Kopieren" />
	</p>
	
	<input type="hidden" name="action" value="char_copy" />
</form>