<?php
	if( preg_match( '/de/', $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? '' ) )
	{
		include $_SERVER['DOCUMENT_ROOT'].'/community/account/de_charlist.php';
	}
	else
	{
		include $_SERVER['DOCUMENT_ROOT'].'/community/account/us_charlist.php';
	}