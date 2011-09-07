<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';

	if (!IllaUser::loggedIn())
	{
		header('HTTP/1.0 401 Unauthorized');
		exit();
	}

	includeWrapper::includeOnce( Page::getRootPath().'/community/account/new/inc_charcreate.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/community/account/new/def_charcreate.php' );

	Page::setXML();
	Page::Init();
/*
	if (strlen($_POST['color']) == 6)
	{
		$color = ( array_search( "#".$_POST['color'], char_create::getHairValues()) === false ? false : $_POST['color'] );
	}
*/
	$color = $_POST['color'];
	$image_n = $_POST['image'];


	//if (substr($_POST['base_image']-4) != ".png")



?>

<image>
 <newimage><?php echo char_create::getConvertedImageUrl($image, $color); ?></newimage>
</image>

