<?php
global $_RIGHTS;
global $_GROUPS;

$_RIGHTS = array(
	'chronic_edit' => array(1, 'User is allowed to edit the chronicle', 'Nutzer darf die Chronik bearbeiten', array(1, 2, 4)),
	'news' => array(2, 'User is allowed to create and edit news', 'Nutzer darf News erstellen und ändern', array(1, 2, 3, 4)),
	'testserver' => array(3, 'User is allowed to access the testserver', 'Nutzer darf auf den Testserver zugreifen', array(1, 3)),
	'hidden_chars' => array(4, 'User is able to see hidden characters on the online list', 'Nutzer kann versteckte Charaktere auf der Onlineliste sehen', array(1, 2, 4)),
	'gmtool_chars' => array(5, 'User is allowed to search and edit characters with the GM tool', 'Nutzer darf Charaktere mit dem GM-Tool suchen und editieren', array(1, 2)),
	'gmtool_accounts' => array(6, 'User is allowed to search and edit accounts with the GM tool', 'Nutzer darf Accounts mit dem GM-Tool suchen und editieren', array(1, 2)),
	'gmtool_raceapplys' => array(7, 'User is allowed to answer race applies', 'Nutzer darf Rassenbewerbungen bearbeiten', array(1, 2)),
	'gmtool_namecheck' => array(8, 'User is allowed to answer name applies', 'Nutzer darf Namen kontrollieren und diese zulassen oder ablehnen', array(1, 2)),
	'gmtool_gms' => array(9, 'User is allowed to create, edit and delete GM characters', 'Nutzer darf GM-Charaktere erstellen, bearbeiten und löschen', array(1)),
	'gmtool_pages' => array(10, 'User is allowed to handle GM pages', 'Nutzer darf GM-Pages bearbeiten', array(1, 2)),
	'quests' => array(11, 'User is allowed to create and edit quests', 'Nutzer darf Quests anlegen und ändern', array(1, 2, 4)),
	'errors' => array(12, 'User is allowed to view extended error output', 'Nutzer darf zusätzliche Fehlerausgaben einsehen', array(1)),
	'build_edit' => array(13, 'User is allowed to edit the building rules', 'Nutzer darf die Bauregeln bearbeiten', array(1))
	);

$_GROUPS = array(1 => array('admin', 'admin'),
	2 => array('Gamemaster', 'Gamemaster'),
	3 => array('Scripters', 'Scripters'),
	4 => array('Community Manager', 'Community Manager')
	);