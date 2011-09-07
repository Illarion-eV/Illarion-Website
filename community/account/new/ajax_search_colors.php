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

	if (is_numeric($_POST['color']))
	{
		$status = ( array_search( (int)$_POST['color'], char_create::getHairValues()) === false ? false : (int)$_POST['color'] );




?>

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