<?php
if(!isset($_POST['prehistory']) || strlen($_POST['prehistory'])<200) {
	$errmessage= (Page::isGerman() ? "Vorgeschichte ist zu kurz" : "Prehistory is too short" );
	Messages::add($errmessage, 'error');
	}
elseif(!isset($_POST['characteristics']) || strlen($_POST['characteristics'])<200) {
	$errmessage= (Page::isGerman() ? "Beschreibung der Merkmale ist zu kurz" : "Description of characteristics is too short" );
	Messages::add($errmessage, 'error');
	}
?>