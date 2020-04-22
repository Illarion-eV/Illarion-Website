<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php");
	header("Location: ".$url."/illarion/history/".(preg_match("/de/", $_SERVER['HTTP_ACCEPT_LANGUAGE']) ? "de" : "us")."_overview.php");
?>