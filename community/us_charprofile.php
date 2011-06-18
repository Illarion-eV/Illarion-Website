<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::Init();
	Page::setXHTML();

	Page::setKeywords( array( 'online', 'players', 'statistics' ) );

    if (!isset($_GET['id']))
	{
        Page::setTitle( 'Character profiles' );
		Page::setDescription( 'This page shows character profiles, but the searched character profile was not found or a other error occured.' );

		echo '<h1>Character profile</h1>';
		echo '<h2>An error occured</h2>';
		echo '<p>The selected character profile was not found. Eigther the player disabled ';
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
		Page::redirect( Page::getURL().'/community/us_charprofile.php', 'Charakterprofil wurde nicht gefunden', 'error' );
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

	$online_state = ( $settings['show_online'] ? getOnlineState( $charid ) : 2 );
	$description = prepareTexts( $my_profil['description_de'], $my_profil['description_us'] );
	$story = ( $settings['show_story'] ? prepareTexts( $my_profil['story_de'], $my_profil['story_us'] ) : false );
	$picture = preparePicture( $charid, $my_profil['picture'], $pg_profil['chr_race'], $pg_profil['chr_sex'], $my_profil['picture_width'], $my_profil['picture_height'] );
	$ownrating = getOwnRating( $pg_profil['chr_playerid'] );
?>

<h1>Character profile</h1>

<h2><?php echo $pg_profil['chr_prefix'],' "',$pg_profil['chr_name'],'" ',$pg_profil['chr_suffix']; ?></h2>

<?php if (is_array($picture)): ?>
<div class="charprofil_picture" style="height:<? echo $picture['height']; ?>px;width:<? echo $picture['width']; ?>px;">
	<?php if ( isset( $picture['file'] ) ): ?>
	<a href="<?php echo $picture['file']; ?>" onclick="return false;" class="lightwindow" title="<? echo $pg_profil['chr_prefix'],' &quot;',$pg_profil['chr_name'],'&quot; ',$pg_profil['chr_suffix']; ?>">
	<?php endif; ?>
		<img height="<? echo $picture['height']; ?>" width="<? echo $picture['width']; ?>" src="<? echo $picture['preview']; ?>" alt="Charakterbild" />
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
<p class="char_online_2">Onlinestate hidden</p>
<?php endif; ?>

<div class="rating">
	<div class="title">Profile rating:</div>
	<?php if ($my_profil['votes_count'] == 0): ?>
	<div class="description">No rating avaiable</div>
	<?php else: ?>
	<?php showRatingPictures($my_profil['votes_result']); ?>
	<div class="description"><?php echo $my_profil['votes_result']; ?>/10 with <?php echo $my_profil['votes_count'],($my_profil['votes_count'] == 1 ? ' vote' : ' votes'); ?></div>
	<?php endif; ?>
	<?php if (IllaUser::loggedIn() && IllaUser::$ID != $pg_profil['chr_accid']): ?>
	<div>
		<a href="<?php echo Page::getURL(); ?>/community/us_rate_profile.php?profile=<?php echo dechex($charid); ?>" onclick="myLightWindow.activateWindow({href:this.href,height:150,width:400,title:'Rate the profile of <?php echo str_replace('\'','\\\'',$pg_profil['chr_name']); ?>'});return false;">
			Own rating<?php echo ( is_int( $ownrating ) ? ' ('.$ownrating.'/10)' : '' ); ?>
		</a>
	</div>
	<?php endif; ?>
</div>
<div class="clr"></div>

<?php Page::insert_go_to_top_link(); ?>

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