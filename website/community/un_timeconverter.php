<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';

	if( ( IllaUser::loggedIn() && IllaUser::german() ) || preg_match( '/de/', $_SERVER['HTTP_ACCEPT_LANGUAGE'] ) )
	{
		header('Location: '.Page::getURL().'/community/de_timeconverter.php'.( isset( $_GET['timekey'] ) ? '?timekey='.$_GET['timekey'] : '' ) );
	}
	else
	{
		header('Location: '.Page::getURL().'/community/us_timeconverter.php'.( isset( $_GET['timekey'] ) ? '?timekey='.$_GET['timekey'] : '' ) );
	}
?>