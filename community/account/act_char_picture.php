<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	if (!is_numeric($_GET['charid']))
	{
		exit();
	}
	else
	{
		$charid = (int)$_GET['charid'];
	}

	$pgSQL =& Database::getPostgreSQL( 'illarionserver' );

	$query = "SELECT COUNT(*)"
	. "\n FROM chars"
	. "\n WHERE chr_accid = ".$pgSQL->Quote( IllaUser::$ID )
	. "\n AND chr_playerid = ".$pgSQL->Quote( $charid )
	;
	$pgSQL->setQuery( $query );

	if (!$pgSQL->loadResult())
	{
		exit();
	}
	$query = false;

	$cancel = false;
	$path = Page::getMediaRootPath().'/characterpictures/';
	$mySQL =& Database::getMySQL();
	if (isset($_POST['picture']) || isset($_FILES['picture']))
	{
		$query = 'SELECT `picture`'
		.PHP_EOL.' FROM `homepage_character_details`'
		.PHP_EOL.' WHERE `char_id` = '.$mySQL->Quote( $charid );
		$mySQL->setQuery( $query );
		$picture = $mySQL->loadResult();
		$query = false;
		if ($picture)
		{
			if (!is_file($path.$picture))
			{
				$cancel = true;
				Messages::add( (Page::isGerman() ? 'Das Bild wurde nicht gefunden und konnte daher nicht gelöscht werden.' : 'It wasn\'t possible to find the picture. So it couldn\'t be deleted.'), 'error' );
			}
			elseif (!unlink($path.$picture))
			{
				$cancel = true;
				Messages::add( (Page::isGerman() ? 'Das Bild wurde gefunden, konnte aber nicht gelöscht werden.' : 'Picture was found but couldn\'t be deleted.'), 'error' );
			}
			else
			{
				@unlink($path.'preview/'.$picture);
				$query = 'UPDATE `homepage_character_details`'
				.PHP_EOL.' SET `picture` = NULL'
				.PHP_EOL.' WHERE `char_id` = '.$mySQL->Quote( $charid );
				$message = (Page::isGerman() ? 'Das Bild wurde gelöscht.' : 'The picture was deleted.');
			}
		}
	}

	if (!$cancel && isset($_FILES['picture']))
	{
		$picture_data = @getimagesize($_FILES['picture']['tmp_name']);
		if (!$picture_data)
		{
			Messages::add( (Page::isGerman() ? 'Datei scheint kein Bild zu sein.' : 'This file doesn\'t appear to be a picture.'), 'error' );
		}
		elseif ($picture_data[2]<1 || $picture_data[2]>3)
		{
			Messages::add( (Page::isGerman() ? 'Dieses Bild hat ein falsches Format und wird nicht unterstützt.' : 'This picture has an invalid format and is not supported.'), 'error' );
		}
		elseif ($_FILES['picture']['size'] > 204800)
		{
			Messages::add( (Page::isGerman() ? 'Dieses Bild ist zu groß.' : 'This picture is too large.'), 'error' );
		}
		else
		{
			do
			{
				$filename = md5(rand(0,10000000).microtime());
				switch($picture_data[2])
				{
					case 1: $filename.='.gif'; break;
					case 2: $filename.='.jpg'; break;
					case 3: $filename.='.png'; break;
				}
			} while (is_file($path.$filename));

			if(!move_uploaded_file($_FILES['picture']['tmp_name'],$path.$filename))
			{
				Messages::add( (Page::isGerman() ? 'Beim Speichern der Bilddatei ist ein Fehler aufgetreten.' : 'While storing the file an error occured.'), 'error' );
			}
			else
			{
				$image = false;
				switch($picture_data[2])
				{
					case 1: $image = imagecreatefromgif($path.$filename); break;
					case 2: $image = imagecreatefromjpeg($path.$filename); break;
					case 3: $image = imagecreatefrompng($path.$filename); break;
				}
				list($pic_width,$pic_height) = $picture_data;

				if ( $pic_height > 200 )
				{
					$pic_width = floor( ( 200 / $pic_height ) * $pic_width );
					$pic_height = 200;
				}
				if ( $pic_width > 400 )
				{
					$pic_height = floor( ( 400 / $pic_width ) * $pic_height );
					$pic_width = 400;
				}
				$new_image = imagecreatetruecolor($pic_width, $pic_height);
				imagecopyresampled($new_image, $image, 0, 0, 0, 0, $pic_width, $pic_height, $picture_data[0], $picture_data[1]);
				switch($picture_data[2])
				{
					case 1:
						imagetruecolortopalette($new_image,true,imagecolorstotal($image));
						imagegif($new_image, $path.'preview/'.$filename);
						break;
					case 2:
						imagejpeg($new_image, $path.'preview/'.$filename, 90);
						break;
					case 3:
						imagepng($new_image, $path.'preview/'.$filename, 9);
						break;
				}
				imagedestroy($image);
				imagedestroy($new_image);

				$query = 'UPDATE `homepage_character_details`'
				.PHP_EOL.' SET `picture` = '.$mySQL->Quote( $filename )
				. ', `picture_height` = '.$mySQL->Quote( $pic_height )
				. ', `picture_width` = '.$mySQL->Quote( $pic_width )
				.PHP_EOL.' WHERE `char_id` = '.$mySQL->Quote( $charid )
				;

				$message = (Page::isGerman() ? 'Das Bild wurde erfolgreich hochgeladen.' : 'The picture was successfully uploaded.');
			}
		}
	}

	if ($query)
	{
		$mySQL->setQuery( $query );
		$mySQL->query();
		Messages::add( $message, 'info' );
	}
?>