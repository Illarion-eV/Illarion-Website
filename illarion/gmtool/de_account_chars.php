<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';
	includeWrapper::includeOnce( $_SERVER['DOCUMENT_ROOT'].'/illarion/gmtool/inc_topmenu.php' );
	includeWrapper::includeOnce( $_SERVER['DOCUMENT_ROOT'].'/illarion/gmtool/inc_accountmenu.php' );
	includeWrapper::includeOnce( $_SERVER['DOCUMENT_ROOT'].'/illarion/gmtool/inc_account.php' );

	if (!IllaUser::auth('gmtool_accounts'))
	{
		Messages::add('Zugriff verweigert', 'error');
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

    Page::setTitle( array( 'GM-Tool', 'Charakterliste' ) );
    Page::setDescription( 'Hier befindet sich eine Übersicht über alle Charaktere die im Account eingetragen sind.' );
    Page::setKeywords( array( 'GM-Tool', 'Account', 'Charaktere', 'Übersicht') );

    Page::addCSS( array( 'menu', 'gmtool' ) );

    Page::setXHTML();
    Page::Init();

	$accid = ( is_numeric($_GET['id']) ? (int)$_GET['id'] : 0 );
	if (!$accid)
	{
		Messages::add('Account ID wurde nicht richtig übergeben', 'error');
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}
	$account_login = getAccountLogin( $accid );
	if (!$account_login || !strlen($account_login))
	{
		Messages::add('Account wurde nicht gefunden', 'error');
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$charlist = getChars( $accid );

	
?>

<h1>Charakterliste - <?php echo $account_login; ?></h1>

<?php include_menu(); ?>

<div class="spacer"></div>

<?php include_account_menu( $accid, 2 ); ?>

<div class="spacer"></div>

<table style="width:100%;">
	<thead>
		<tr>
			<th style="width:90px;">ID</th>
			<th>Name</th>
			<th style="width:100px;">Rasse</th>
			<th style="width:70px;">Geschlecht</th>
			<th style="width:150px;">Status</th>
			<th style="width:80px;">Server</th>
		</tr>
	</thead>
	<tbody>
		<?php if (count($charlist) == 0)
        { ?>
            <tr><td style='height:50px;text-align:center;' colspan='6'>Es wurden keine Charaktere gefunden.</td></tr>
	    <?php } else { ?>
			<?php foreach ($charlist as $key=>$char): ?>
			<tr class="row<?php echo (($key+1)%2); ?>">
				<td><?php echo $char['chr_playerid']; ?></td>
				<td><a href="<?php echo Page::getURL(); ?>/illarion/gmtool/de_character.php?charid=<?php echo $char['chr_playerid']; ?>"><?php echo $char['chr_name']; ?></a></td>
				<td><?php echo IllarionData::getRaceName($char['chr_race']); ?></td>
				<td><?php echo IllarionData::getSexName($char['chr_sex']); ?></td>
				<td><?php echo IllarionData::getCharacterStatusName($char['chr_status']); ?></td>
				<td><?php echo $char['chr_server']; ?></td>
			</tr>
			<?php endforeach; ?>
		<?php } ?>
	</tbody>
</table>
