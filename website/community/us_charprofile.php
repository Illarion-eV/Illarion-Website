<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::Init();
	Page::setXHTML();

	Page::setKeywords( array( 'online', 'players', 'statistics' ) );

    if (!isset($_GET['id']))
	{
        Page::setTitle( 'Character profiles' );
		Page::setDescription( 'This page shows character profiles, but the searched character profile was not found or a other error occurred.' );

		echo '<h1>Character profile</h1>';
		echo '<h2>An error occurred</h2>';
		echo '<p>The selected character profile was not found. Either the player disabled ';
		echo 'the profile or the page was called with a invalid link.</p>';
		exit();
	}

	includeWrapper::includeOnce( Page::getRootPath().'/community/inc_charprofile.php' );

	$charid = hexdec( ( isset($_GET['id'])  && ctype_xdigit( $_GET['id'] ) ? $_GET['id'] : 0 ) );
	$settings = array();
	if (!$charid)
	{
		$settings['show_profil'] = false;
	}
	else
	{
		if (!($pg_profil = loadPostgreProfile( $charid )))
		{
			$settings['show_profil'] = false;
		}
		elseif (!($my_profil = loadMySQLProfile( $charid )))
		{
			$settings['show_profil'] = false;
		}
		else
		{
			$settings = parseSettings( $my_profil['settings'] );
		}
	}

	if (!$settings['show_profil'])
	{
		Page::redirect( Page::getURL().'/community/us_charprofile.php', 'Character profile not found', 'error' );
	}

	if ( handleVote( $charid ) )
	{
		$my_profil = loadMySQLProfile( $charid );
	}

	Page::setTitle( array( 'Character profile', $pg_profil['chr_name'] ) );
	Page::setDescription( 'This page shows the Character profile of '.$pg_profil['chr_name'] );
	Page::addKeyword( $pg_profil['chr_name'] );

	Page::addCSS( array( 'lightwindow', 'lightwindow_us', 'slider', 'charprofil' ) );
	Page::addJavaScript( array( 'prototype', 'effects', 'lightwindow', 'slider' ) );

	prepareBirthday( $pg_profil['ply_dob'] );

	$online_state = getOnlineState( $charid );
	$description = prepareTexts( $my_profil['description_de'], $my_profil['description_us'] );
	$story = ( $settings['show_story'] ? prepareTexts( $my_profil['story_de'], $my_profil['story_us'] ) : false );
	$picture = preparePicture( $charid, $my_profil['picture'], $pg_profil['chr_race'], $pg_profil['chr_sex'], $my_profil['picture_width'], $my_profil['picture_height'] );
	$ownrating = getOwnRating( $pg_profil['chr_playerid'] );
?>

<h1>Character profile</h1>

<h2><?php echo $pg_profil['chr_name']; ?></h2>

<?php if (is_array($picture)): ?>
<div class="charprofil_picture" style="height:<?php echo $picture['height']; ?>px;width:<?php echo $picture['width']; ?>px;">
	<?php if ( isset( $picture['file'] ) ): ?>
	<a href="<?php echo $picture['file']; ?>" onclick="return false;" class="lightwindow" title="<?php echo $pg_profil['chr_name']; ?>">
	<?php endif; ?>
		<img height="<?php echo $picture['height']; ?>" width="<?php echo $picture['width']; ?>" src="<?php echo $picture['preview']; ?>" alt="Character Picture" />
	<?php if ( isset( $picture['file'] ) ): ?>
	</a>
	<?php endif; ?>
</div>
<?php endif; ?>

<dl class="charprofil">
	<dt>Race:</dt>
	<dd><?php echo IllarionData::getRaceName($pg_profil['chr_race']); ?></dd>
	<dt>Gender:</dt>
	<dd><?php echo IllarionData::getSexName($pg_profil['chr_sex']); ?></dd>
	<?php if ($settings['show_birthday']): ?>
	<dt>Age:</dt>
	<dd<?php echo ($settings['overwrite_birthday'] ? ' style="font-style:italic;"' : ''); ?>><?php echo $pg_profil['ply_dob']['age']; ?> years</dd>
	<dt>Birthday:</dt>
	<dd<?php echo ($settings['overwrite_birthday'] ? ' style="font-style:italic;"' : ''); ?>><?php echo $pg_profil['ply_dob']['day'], '. ', $month_names[$pg_profil['ply_dob']['month']-1], ' ',($pg_profil['ply_dob']['year']>0 ? $pg_profil['ply_dob']['year'].' AW' : (-$pg_profil['ply_dob']['year']).' BW' ); ?></dd>
	<?php elseif ($pg_profil['chr_race'] < 9): ?>
	<dt>Age:</dt>
	<dd><?php echo ageIdentifier($pg_profil['ply_dob']['age'], $pg_profil['chr_race']); ?></dd>
	<?php endif; ?>
</dl>

<?php if ($online_state == 0): ?>
<p class="char_online_0"<?php echo ($settings['overwrite_online'] ? ' style="font-style:italic;"' : ''); ?>>Currently offline</p>
<?php elseif ($online_state == 1): ?>
<p class="char_online_1"<?php echo ($settings['overwrite_online'] ? ' style="font-style:italic;"' : ''); ?>>Currently online</p>
<?php else: ?>
<p class="char_online_2">Online State hidden</p>
<?php endif; ?>

<div class="clr"></div>

<?php if ($description): ?>
<h2>Description of the character</h2>

<?php echo $description; ?>

<?php Page::insert_go_to_top_link(); ?>
<?php endif; ?>

<?php if ($story): ?>
<h2<?php echo ($settings['overwrite_story'] ? ' style="font-style:italic;"' : ''); ?>>Story of the character</h2>

<?php echo $story; ?>

<?php Page::insert_go_to_top_link(); ?>
<?php endif; ?>
