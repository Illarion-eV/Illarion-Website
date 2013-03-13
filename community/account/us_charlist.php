<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	IllaUser::requireLogin();

	includeWrapper::includeOnce( Page::getRootPath().'/community/account/inc_charlist.php' );

	define( 'ILLARIONSERVER', 'Gameserver' );
	define( 'TESTSERVER', 'Testserver' );

	Page::setTitle( array( 'Account', 'Characterlist' ) );
	Page::setDescription( 'On this page you get a overview of all characters you have.' );
	Page::setKeywords( array( 'characters', 'account', 'overview' ) );

	Page::addCSS( array( 'lightwindow', 'lightwindow_us' ) );
	Page::addJavaScript( array( 'prototype', 'effects', 'lightwindow' ) );
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

<h1>Character list</h1>

<table style="width:100%">
	<thead>
		<tr>
			<th>Character Name</th>
			<th style="width:180px;">Race</th>
			<th style="width:90px;">Gender</th>
			<th style="width:190px;">Status</th>
			<th style="width:110px;">&nbsp;</th>
			<?php if ( IllaUser::auth('testserver') ): ?><th style="width:7%;">Server</th><?php endif; ?>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="<?php echo ( IllaUser::auth('testserver') ? '5' : '6' ); ?>" style="text-align:center;vertical-align:middle;height:60px;">
				<?php if (IllaUser::$charlimit <= getCharacterCount() && IllaUser::$charlimit > 0): ?>
				&nbsp;
				<?php else: ?>
				<a href="<?php echo Page::getURL(); ?>/community/account/us_newchar.php">Create a new character</a>
				<?php endif; ?>
			</td>
		</tr>
	</tfoot>
	<tbody>
		<?php if (!count($char_list)): ?>
		<tr>
			<td colspan="<?php echo ( IllaUser::auth('testserver') ? '5' : '6' ); ?>">No characters were found</td>
		</tr>
	</tbody>
</table>
<?php
	exit();
	endif;
?>
		<?php foreach( $char_list as $key=>$character ):
			$character['ident'] = "?charid=".$character['chr_playerid'].($character['chr_server']==TESTSERVER ? '&amp;server=1' : '');
		?>
		<tr>
			<td>
            <?php echo viewCharName( $character ); ?>
			</td>
			<?php if ($race_pic = IllarionData::getRacePicture( $character['chr_race'], $character['chr_sex'] )): ?>
			<td style="text-align:center;">
				<img src="<?php echo $race_pic; ?>" alt="<?php echo IllarionData::getRaceName( $character['chr_race'] ).'/'.IllarionData::getSexName( $character['chr_sex'] ); ?>" />
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
				<a href="<?php echo Page::getURL(); ?>/community/account/us_char_delsecure.php<?php echo $character['ident']; ?>"<?php if ($enable_lightwindow): ?> onclick="<?php JSBuilder::Lightwindow_activate( null, 'Really delete '.$character['chr_name'].'?', 400, 150 ); ?>"<?php endif; ?>>
					Delete character
				</a>
			</td>
			<?php if ( IllaUser::auth('testserver') ): ?>
			<td>
				<?php echo $character['chr_server']; ?>
			</td>
			<?php endif; ?>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
