<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	IllaUser::requireLogin();

	Page::Init();

	$pgSQL =& Database::getPostgreSQL( 'illarionserver' );
	$query = 'SELECT COUNT(*)'
	.PHP_EOL.' FROM chars'
	.PHP_EOL.' WHERE chr_accid = '.$pgSQL->Quote( IllaUser::$ID )
	;
	$pgSQL->setQuery( $query );
	$charcount = $pgSQL->loadResult();

	$servers = array();
	if ($charcount < IllaUser::$charlimit || IllaUser::$charlimit == 0)
	{
		$servers[] = 'rs';
	}

	if (IllaUser::auth('testserver'))
	{
		$servers[] = 'ts';
	}

	if (!count($servers))
	{
		exit('Error - Character limit reached.');
	}

	Page::setTitle( array( 'Account', 'Create new character' ) );
	Page::setDescription( 'On this page you can create a new character for Illarion' );
	Page::setKeywords( array( 'Character', 'new', 'create' ) );

   Page::addJavaScript( array( 'prototype', 'effects'));
   Page::addJavaScript( 'newchar_1');

   Page::setXHTML();

?>

<h1>Create a new character</h1>

<h2>Step 1</h2>

<p>Please select a Name, Race and Gender for your character. 
The <a href="<?php echo Page::getURL(); ?>/general/us_rpg_guide.php">RPG-Guide</a> could be useful.</p>

<form method="post" name="char_form" id="char_form" action="<?php echo Page::getURL(); ?>/community/account/us_newchar_1.php">
		<table style="width:100%;">
			<tbody>
				<tr>
					<td style="width:45%;vertical-align:top;" rowspan="2">
						Name:<br />check the <a href="<?php echo Page::getURL(); ?>/illarion/us_name_rules.php">name rules</a>
					</td>
					<td>
						<input type="text" name="charname" id="charname" value="" style="width:98%;" onkeyup="checkCharname();return true;" />
					</td>
				</tr>
				<tr>
					<td id="charname_result" style="height:70px;vertical-align:top;"></td>
				</tr>
				<tr>
					<td>Race:</td>
					<td>
						<select name="race" style="width:100%;">
							<?php foreach( IllaUser::$allowed_races as $race ): ?>
							<option value="<?php echo $race; ?>"><?php echo IllarionData::getRaceName($race); ?></option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Gender:</td>
					<td>
						<select name="sex" style="width:100%;">
							<option value="0">Male</option>
							<option value="1">Female</option>
						</select>
					</td>
				</tr>
				<?php if (count($servers) == 2): ?>
				<tr>
					<td style="height:20px;" />
				</tr>
				<tr>
					<td>Server:</td>
					<td>
						<select name="server" id="server" style="width:100%;" onchange="checkCharname();return true;">
							<option value="0">Gameserver</option>
							<option value="1">Testserver</option>
						</select>
					</td>
				</tr>
				<tr>
					<td style="height:20px;" />
				</tr>
				<?php elseif ($servers[0] == 'ts' ): ?>
				<tr>
					<td style="height:20px;" />
				</tr>
				<tr>
					<td>
						Testserver
						<input type="hidden" name="server" value="1" />
					</td>
				</tr>
				<tr>
					<td style="height:20px;" />
				</tr>
				<?php else: ?>
				<tr>
					<td style="height:20px;"><input type="hidden" name="server" value="0" /></td>
				</tr>
				<?php endif; ?>
			</tbody>
		</table>
	<p style="text-align:center;">
		<input type="hidden" name="action" value="newchar_1" />
		<input type="submit" name="submit" id="submit" value="Send" />
	</p>
	</form>