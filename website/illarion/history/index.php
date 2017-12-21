<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php");
	header("Location: ".$url."/illarion/history/".(ereg("de", $_SERVER['HTTP_ACCEPT_LANGUAGE']) ? "de" : "us")."_overview.php");
?>