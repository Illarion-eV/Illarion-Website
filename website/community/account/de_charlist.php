<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	IllaUser::requireLogin();

	includeWrapper::includeOnce( Page::getRootPath().'/community/account/inc_charlist.php' );

	define( 'ILLARIONSERVER', 'Spielserver' );
	define( 'DEVSERVER', 'Devserver' );

	Page::setTitle( array( 'Account', 'Charakterliste' ) );
	Page::setDescription( 'Auf dieser Seite bekommst du eine Übersicht über alle Charaktere die du hast' );
	Page::setKeywords( array( 'Charaktere', 'Account', 'Übersicht' ) );

	Page::setXHTML();
	Page::Init();

	$need_slider = false;
	$char_list = getCharacterList( $need_slider );
	if ( $need_slider )
	{
		Page::addCSS( 'slider' );
		Page::addJavaScript( 'slider' );
	}

	$enable_lightwindow = false;
?>

<h1>Charakterliste</h1>

<table style="width:100%">
	<thead>
		<tr>
			<th>Charaktername</th>
			<th style="width:180px;">Rasse</th>
			<th style="width:90px;">Geschlecht</th>
			<th style="width:190px;">Status</th>
			<th style="width:110px;">&nbsp;</th>
			<th style="width:7%;">Server</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="6" style="text-align:center;vertical-align:middle;height:60px;">
				<?php if (IllaUser::$charlimit <= getCharacterCount() && IllaUser::$charlimit > 0): ?>
				&nbsp;
				<?php else: ?>
				<a href="<?php echo Page::getURL(); ?>/community/account/de_newchar.php">Neuen Charakter erstellen</a>
				<?php endif; ?>
			</td>
		</tr>
	</tfoot>
	<tbody>
		<?php if (!count($char_list)): ?>
		<tr>
			<td colspan="6">Es wurden keine Charaktere gefunden</td>
		</tr>
	</tbody>
</table>
<?php
	exit();
	endif;
?>
		<?php foreach( $char_list as $key=>$character ):
			$character['ident'] = "?charid=".$character['chr_playerid'].($character['chr_server']==DEVSERVER ? '&amp;server=1' : '');
		?>
		<tr>
			<td>
            <?php echo viewCharName( $character ); ?>
			</td>
			<?php if ($race_pic = IllarionData::getRacePicture( $character['chr_race'], $character['chr_sex'] )): ?>
			<td style="text-align:center;">
				<img src="<?php echo $race_pic; ?>" alt="<?php echo IllarionData::getRaceName( $character['chr_race'] ),'/',IllarionData::getSexName( $character['chr_sex'] ); ?>" />
			</td>
			<?php else: ?>
			<td>
				<?php echo IllarionData::getRaceName( $character['chr_race'] ); ?>
			</td>
			<?php endif; ?>
			<td>
				<?php echo IllarionData::getSexName( $character['chr_sex'] ); ?>
			</td>
			<td>
				<?php echo viewCharStatus( $character ); ?>
			</td>
			<td>
				<a href="<?php echo Page::getURL(); ?>/community/account/de_char_delsecure.php<?php echo $character['ident']; ?>"<?php if ($enable_lightwindow): ?> onclick="<?php JSBuilder::Lightwindow_activate( null, $character['chr_name'].' wirklich löschen?', 400, 150 ); ?>"<?php endif; ?>>
					Charakter löschen
				</a>
			</td>
			<td>
				<?php echo $character['chr_server']; ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
