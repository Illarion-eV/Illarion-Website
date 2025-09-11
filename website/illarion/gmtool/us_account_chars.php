<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_topmenu.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_accountmenu.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_account_chars.php' );

	if (!IllaUser::auth('gmtool_accounts'))
	{
		Messages::add('Access denied', 'error');
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/us_gmtool.php' );
		exit();
	}

	$accid = ( is_numeric($_GET['id']) ? (int)$_GET['id'] : 0 );
	if (!$accid)
	{
		Messages::add('Account ID was not found', 'error');
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/us_gmtool.php' );
		exit();
	}

	$account_name = getAccountName( $accid );
	if (!$account_name || !strlen($account_name))
	{
		Messages::add('Account not found', 'error');
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/us_gmtool.php' );
		exit();
	}

	$charlist = getChars( $accid );

	Page::setTitle( array( 'GM-Tool', 'Character List', $account_name ) );
	Page::setDescription( 'An overview of all characters that were created in the account "'.$account_name.'"' );
	Page::setKeywords( array( 'GM-Tool', 'Account', 'Characters', 'Overview', $account_name ) );

	Page::addCSS( array( 'menu', 'gmtool' ) );

	Page::setXHTML();
	Page::Init();
?>

<h1>Character List - <?php echo $account_name; ?></h1>

<?php include_menu(); ?>

<div class="spacer"></div>

<?php include_account_menu( $accid, 2 ); ?>

<div class="spacer"></div>

<table style="width:100%;">
	<thead>
		<tr>
			<th style="width:90px;">ID</th>
			<th>Name</th>
			<th style="width:100px;">Race</th>
			<th style="width:70px;">Sex</th>
			<th style="width:150px;">Status</th>
			<th style="width:80px;">Server</th>
		</tr>
	</thead>
	<tbody>
		<?php if (count($charlist) == 0) { ?>
			<tr>
				<td style='height:50px;text-align:center;' colspan='6'>
					No characters were found.
				</td>
			</tr>
		<?php } else { ?>
			<?php foreach ($charlist as $key=>$char): ?>
			<?php 
				$class = ( in_array($char['chr_status'], array(CHAR_STATUS_BANNED, CHAR_STATUS_TEMP_BANNED, CHAR_STATUS_JAILED, CHAR_STATUS_TEMP_JAILED)) ) 
					? "rowerror" 
					: "row".(($key+1)%2); 
			?>
			<tr class="<?php echo $class; ?>">
				<td><?php echo $char['chr_playerid']; ?></td>
				<td>
					<a href="<?php echo Page::getURL(); ?>/illarion/gmtool/us_character.php?id=<?php echo $char['chr_playerid']; ?>">
						<?php echo $char['chr_name']; ?>
					</a>
				</td>
				<td><?php echo IllarionData::getRaceName($char['chr_race']); ?></td>
				<td><?php echo IllarionData::getSexName($char['chr_sex']); ?></td>
				<td><?php echo IllarionData::getCharacterStatusName($char['chr_status']); ?></td>
				<td><?php echo $char['chr_server']; ?></td>
			</tr>
			<?php endforeach; ?>
		<?php } ?>
	</tbody>
</table>