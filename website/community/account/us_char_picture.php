<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	$server = ( isset( $_GET['server'] ) && $_GET['server'] == '1' ? false : true );

	if ( !$server )
	{
		exit('Abgeschalten für Testserver Charaktere.');
	}

	if ( !isset( $_GET['charid'] ) || !is_numeric ($_GET['charid'] ) )
	{
		exit('Error - Character ID was not transfered correctly');
	}
	else
	{
		$charid = (int)$_GET['charid'];
	}

	$pgSQL =& Database::getPostgreSQL( 'illarionserver' );

	$query = 'SELECT COUNT(*)'
	.PHP_EOL.' FROM chars'
	.PHP_EOL.' WHERE chr_accid = '.$pgSQL->Quote( IllaUser::$ID )
	.PHP_EOL.' AND chr_playerid = '.$pgSQL->Quote( $charid )
	;
	$pgSQL->setQuery( $query );

	if (!$pgSQL->loadResult())
	{
		exit('Character not found');
	}
	$db_hp =& Database::getPostgreSQL( 'homepage' );
	$query = 'SELECT picture'
	.PHP_EOL.' FROM character_details'
	.PHP_EOL.' WHERE char_id = '.$db_hp->Quote( $charid )
	;
	$db_hp->setQuery( $query );
	$picture = $db_hp->loadResult();
	if (!$picture)
	{
		$picture = false;
	}
	else
	{
		$filename_hardware = Page::getMediaRootPath().'/characterpictures/preview/'.$picture;
		if (!is_file($filename_hardware))
		{
			$picture = false;
		}
		else
		{
			$pic_link = Page::getMediaURL().'/characterpictures/preview/'.$picture;

			list($pic_width,$pic_height) = getimagesize( $filename_hardware );

			if ( $pic_height > 200 )
			{
				$pic_width = floor( ( 200 / $pic_height ) * $pic_width );
				$pic_height = 200;
			}
			if ( $pic_width > 240 )
			{
				$pic_height = floor( ( 240 / $pic_width ) * $pic_height );
				$pic_width = 240;
			}
		}
	}

	Page::setXML();
	Page::Init();
?>

<div>
	<h2>Character picture</h2>

	<?php if ($picture): ?>
	<h3>Current picture</h3>

	<table style="width:100%">
		<tbody>
			<tr>
				<td style="width:240px;text-align:center;">
					<img src="<?php echo $pic_link; ?>" style="width:<?php echo $pic_width; ?>px;height:<?php echo $pic_height; ?>px;" alt="Character picture" />
				</td>
				<td style="vertical-align:middle;text-align:center;">
					<form method="post" action="<?php echo Page::getURL(); ?>/community/account/us_char_details.php?charid=<?php echo $charid; ?>" name="deleteForm">
						<button onclick="document.forms.deleteForm.submit();">Delete picture</button>
						<input type="hidden" name="action" value="char_picture" />
						<input type="hidden" name="picture" value="delete" />
					</form>
				</td>
			</tr>
		</tbody>
	</table>
	<?php endif; ?>

	<h3>Neues Bild hochladen</h3>

	<form method="post" action="<?php echo Page::getURL(); ?>/community/account/us_char_details.php?charid=<?php echo $charid; ?>" name="pictureForm" enctype="multipart/form-data">
		<p>
			<input type="file" name="picture" class="file" accept="image/*" style="margin-left:20px;" />
			<input type="hidden" name="action" value="char_picture" />
			<button onclick="document.forms.pictureForm.submit();">Upload picture</button>
		</p>
	</form>
</div>
