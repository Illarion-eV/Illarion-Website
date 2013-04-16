<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';
	includeWrapper::includeOnce(  Page::getRootPath().'/illarion/gmtool/inc_character.php' );

	$server = ( isset( $_GET['server'] ) && $_GET['server'] == '1' ? false : true );

	if ( !$server )
	{
		exit('Abgeschalten für Devserver Charaktere.');
		
	}

	Page::setXML();
    Page::Init();

	if ( !isset( $_GET['charid'] ) || !is_numeric ($_GET['charid'] ) )
	{
		exit('Error - character ID was not transferred correctly.');
	}
	else
	{
		$charid = (int)$_GET['charid'];
	}

	$picture = getPicture($charid);

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
?>

<div>
	<h2>Character Image</h2>

	<?php if ($picture): ?>
	<h3>Current Picture</h3>

	<table style="width:100%">
		<tbody>
			<tr>
				<td style="width:240px;text-align:center;">
					<img src="<?php echo $pic_link; ?>" style="width:<?php echo $pic_width; ?>px;height:<?php echo $pic_height; ?>px;" alt="Character Picture" />
				</td>
				<td style="vertical-align:middle;text-align:center;">
					<form method="post" action="<?php echo Page::getURL(); ?>/illarion/gmtool/de_character_settings.php?charid=<?php echo $charid; ?>&amp;server=<?php echo $_GET['server']; ?>" name="deleteForm">
						<button onclick="document.forms.deleteForm.submit();">Delete Image</button>
						<input type="hidden" name="action" value="char_picture" />
						<input type="hidden" name="picture" value="delete" />
					</form>
				</td>
			</tr>
		</tbody>
	</table>
	<?php endif; ?>

	<h3>Upload New Picture</h3>

	<form method="post" action="<?php echo Page::getURL(); ?>/illarion/gmtool/de_character_settings.php?charid=<?php echo $charid; ?>&amp;server=<?php echo $_GET['server']; ?>" name="pictureForm" enctype="multipart/form-data">
		<p>
			<input type="file" name="picture" class="file" accept="image/*" style="margin-left:20px;" />
			<input type="hidden" name="action" value="char_picture" />
			<button onclick="document.forms.pictureForm.submit();">Upload Picture</button>
		</p>
	</form>
</div>
