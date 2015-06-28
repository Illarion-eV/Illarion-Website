<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	IllaUser::requireLogin();

	Page::Init();

	Page::setTitle( array( 'Account', 'Copy character to testserver' ) );
	Page::setDescription( 'On this page you can copy one of your gameserver characters to the testserver' );
	Page::setKeywords( array( 'Character', 'copy', 'create' ) );

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

<h1>Copy character to testserver</h1>

<h2>General information</h2>

<p>A previous copy of the selected character
	will be overwritten. Note, that there is no support for testserver
	characters. Also these characters may be deleted at any time without
	prior notice.
</p><p>
	Once logged into the testserver, a limited number of admin commands are
	available to help you with testing. You can list those commands with the
	!? command.
</p><p><b>
	Testserver characters are for testing only. E.g. you may not use testserver
	characters to roleplay (i.e. the testserver is ooc-only) or to backup your
	gameserver characters. Testserver characters will never be transferred back
	to the game server.
</b></p>

<h2>Select character</h2>
<p>Please select a character to be copied to the testserver.</p>

<form method="post" name="char_form" id="char_form" action="<?php echo Page::getURL(); ?>/community/account/us_charlist.php">
		<table style="width:100%;">
			<tbody>
				<tr>
					<td style="width:45%;vertical-align:top;" rowspan="2">
						Gameserver character:
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
		<input type="submit" name="submit" id="submit" value="Copy" />
	</p>
	
	<input type="hidden" name="action" value="char_copy" />
</form>