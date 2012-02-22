<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::Init();
	Page::setXHTML();

	Page::setKeywords( array( 'online', 'Spieler', 'Statistiken' ) );

	if (!isset($_GET['id']))
	{
		Page::setTitle( 'Charakterprofile' );
		Page::setDescription( 'Diese Seite zeigt Charakterprofile an, aber das gesuchte Profil konnte nicht gefunden werden oder ein anderer Fehler ist aufgetreten.' );

		echo '<h1>Charakterprofil</h1>';
		echo '<h2>Ein Fehler ist aufgetreten</h2>';
		echo '<p>Das angegebene Charakterprofil konnte nicht gefunden werden. Entweder ';
		echo 'hat der betroffene Charakter sein Profil deaktiviert oder die Seite wurde ';
		echo 'mit einem ungültigen Link aufgerufen.</p>';
		exit();
	}

	includeWrapper::includeOnce( Page::getRootPath().'/community/inc_charprofile.php' );

	$charid = hexdec( ( isset($_GET['id']) && ctype_xdigit( $_GET['id'] ) ? $_GET['id'] : 0 ) );
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
        Page::redirect( Page::getURL().'/community/de_charprofile.php', 'Charakterprofil wurde nicht gefunden', 'error' );
	}

	if ( handleVote( $charid ) )
	{
		$my_profil = loadMySQLProfile( $charid );
	}

	Page::setTitle( array( 'Charakterprofil', $pg_profil['chr_name'] ) );
	Page::setDescription( 'Diese Seite zeigt das Charakter Profil von '.$pg_profil['chr_name'] );
	Page::addKeyword( $pg_profil['chr_name'] );

	Page::addCSS( array( 'lightwindow', 'lightwindow_de', 'slider', 'charprofil' ) );
	Page::addJavaScript( array( 'prototype', 'effects', 'lightwindow', 'slider' ) );

	prepareBirthday( $pg_profil['ply_dob'] );

	$online_state = getOnlineState( $charid );
	$description = prepareTexts( $my_profil['description_de'], $my_profil['description_us'] );
	$story = ( $settings['show_story'] ? prepareTexts( $my_profil['story_de'], $my_profil['story_us'] ) : false );
	$picture = preparePicture( $charid, $my_profil['picture'], $pg_profil['chr_race'], $pg_profil['chr_sex'], $my_profil['picture_width'], $my_profil['picture_height'] );
	$ownrating = getOwnRating( $pg_profil['chr_playerid'] );
?>

<h1>Charakter Profil</h1>

<h2><?php echo $pg_profil['chr_prefix'],' "',$pg_profil['chr_name'],'" ',$pg_profil['chr_suffix']; ?></h2>

<?php if (is_array($picture)): ?>
<div class="charprofil_picture" style="height:<?php echo $picture['height']; ?>px;width:<?php echo $picture['width']; ?>px;">
	<?php if ( isset( $picture['file'] ) ): ?>
	<a href="<?php echo $picture['file']; ?>" onclick="return false;" class="lightwindow" title="<?php echo $pg_profil['chr_prefix'],' &quot;',$pg_profil['chr_name'],'&quot; ',$pg_profil['chr_suffix']; ?>">
	<?php endif; ?>
		<img height="<?php echo $picture['height']; ?>" width="<?php echo $picture['width']; ?>" src="<?php echo $picture['preview']; ?>" alt="Charakterbild" />
	<?php if ( isset( $picture['file'] ) ): ?>
	</a>
	<?php endif; ?>
</div>
<?php endif; ?>

<dl class="charprofil">
	<dt>Rasse:</dt>
	<dd><?php echo IllarionData::getRaceName($pg_profil['chr_race']); ?></dd>
	<dt>Geschlecht:</dt>
	<dd><?php echo IllarionData::getSexName($pg_profil['chr_sex']); ?></dd>
	<?php if ($settings['show_birthday']): ?>
	<dt>Alter:</dt>
	<dd<?php echo ($settings['overwrite_birthday'] ? ' style="font-style:italic;"' : ''); ?>><?php echo $pg_profil['ply_dob']['age']; ?> Jahre</dd>
	<dt>Geburtstag:</dt>
	<dd<?php echo ($settings['overwrite_birthday'] ? ' style="font-style:italic;"' : ''); ?>><?php echo $pg_profil['ply_dob']['day'], '. ', IllaDateTime::getMonthName( $pg_profil['ply_dob']['month'] ), ' ',($pg_profil['ply_dob']['year']>0 ? $pg_profil['ply_dob']['year'].' n.VdH' : (-$pg_profil['ply_dob']['year']).' v.VdH' ); ?></dd>
	<?php elseif ($pg_profil['chr_race'] < 9): ?>
	<dt>Alter:</dt>
	<dd><?php echo ageIdentifier($pg_profil['ply_dob']['age'], $pg_profil['chr_race']); ?></dd>
	<?php endif; ?>
</dl>

<?php if ($online_state == 0): ?>
<p class="char_online_0"<?php echo ($settings['overwrite_online'] ? ' style="font-style:italic;"' : ''); ?>>Ist zur Zeit offline</p>
<?php elseif ($online_state == 1): ?>
<p class="char_online_1"<?php echo ($settings['overwrite_online'] ? ' style="font-style:italic;"' : ''); ?>>Ist zur Zeit online</p>
<?php else: ?>
<p class="char_online_2">Onlinestatus verborgen</p>
<?php endif; ?>

<div class="rating">
	<div class="title">Profilbewertung:</div>
	<?php if ($my_profil['votes_count'] == 0): ?>
	<div class="description">Noch keine Bewertung vorhanden</div>
	<?php else: ?>
	<?php showRatingPictures($my_profil['votes_result']); ?>
	<div class="description"><?php echo $my_profil['votes_result']; ?>/10 mit <?php echo $my_profil['votes_count'],($my_profil['votes_count'] == 1 ? ' Stimme' : ' Stimmen'); ?></div>
	<?php endif; ?>
	<?php if (IllaUser::loggedIn() && IllaUser::$ID != $pg_profil['chr_accid']): ?>
	<div>
		<a href="<?php echo Page::getURL(); ?>/community/de_rate_profile.php?profile=<?php echo dechex($charid); ?>" onclick="myLightWindow.activateWindow({href:this.href,height:150,width:400,title:'Profil von <?php echo str_replace("'","\\'",$pg_profil['chr_name']); ?> bewerten'});return false;">
			Eigene Bewertung<?php echo ( is_int( $ownrating ) ? ' ('.$ownrating.'/10)' : '' ); ?>
		</a>
	</div>
	<?php endif; ?>
</div>

<div class="clr"></div>

<?php Page::insert_go_to_top_link(); ?>

<?php if ($description): ?>
<h2>Beschreibung des Charakters</h2>

<?php echo $description; ?>

<?php Page::insert_go_to_top_link(); ?>
<?php endif; ?>

<?php if ($story): ?>
<h2<?php echo ($settings['overwrite_story'] ? ' style="font-style:italic;"' : ''); ?>>Geschichte des Charakters</h2>

<?php echo $story; ?>

<?php Page::insert_go_to_top_link(); ?>
<?php endif; ?>
