<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';
	if (!isset($_GET['action']))
	{
		header('Location: https://illarion.org');
		exit();
	}
	$cnt = ( is_numeric($_GET['cnt']) ? (int)$_GET['cnt'] : 0 );
	if ($cnt)
	{
		echo $cnt,'|';
	}

	$db =& Database::getPostgreSQL( 'accounts' );
	$value = (string)$_GET['value'];
	$value = trim($value);
	if ($_GET['action'] == 'check_user')
	{
		$db->setQuery("SELECT COUNT(*) FROM account WHERE acc_login = ".$db->Quote($value));
		if ($db->loadResult())
		{
			echo 0;
		}
		else
		{
			echo 1;
		}
	}
	elseif ($_GET['action'] == 'check_email')
	{
		$db->setQuery("SELECT COUNT(*) FROM account WHERE acc_email = ".$db->Quote( $value ));
		if ($db->loadResult())
		{
			echo 0;
		}
		else
		{
			echo 1;
		}
	}
	Database::Shutdown();
	exit();
?>