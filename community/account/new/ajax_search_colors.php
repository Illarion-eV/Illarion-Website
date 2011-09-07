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

	if (strlen($_POST['color']) == 6)
	{
		$color = ( array_search( "#".$_POST['color'], char_create::getHairValues()) === false ? false : $_POST['color'] );
	}

	$image_n = $_POST['image']."_n";
	$image_w = $_POST['image']."_w";


	//if (substr($_POST['base_image']-4) != ".png")



?>

<image>
 <north><?php echo getConvertedImageUrl($image_n, $color); ?></north>
 <west><?php echo getConvertedImageUrl($image_w, $color); ?></west>
</image>

<?php /*

<?php if ($count > 30): ?>
<manyHits>
	<found><?php echo $count; ?></found>
	<max><?php echo $max; ?></max>
</manyHits>
<?php else: ?>
<accounts>
	<?php foreach($result_list as $result): ?>
	<account>
		<id><?php echo $result['id']; ?></id>
		<name><?php echo $result['username'],' (',$result['name'],')'; ?></name>
	</account>
	<?php endforeach; ?>
</accounts>
<?php endif; ?>

   */ ?>