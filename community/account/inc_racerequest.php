<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';
	include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/illarion_data.php" );
	
	function getRacerequestList () {
		$mySQL =& Database::getMySQL();
		$query = "SELECT `id`, `raceid`, `status`"
			. "\n FROM `homepage_raceapplies`"
			. "\n WHERE `userid` = ".$mySQL->Quote( IllaUser::$ID )
			;
		$mySQL->setQuery( $query );
		return $mySQL->loadAssocList();
		}
	function getRacerequested () {
		$mySQL =& Database::getMySQL();
		$query = "SELECT `raceid`"
			. "\n FROM `homepage_raceapplies`"
			. "\n WHERE `userid` = ".$mySQL->Quote( IllaUser::$ID )
			;
		$mySQL->setQuery( $query );
		return $mySQL->loadResultArray();
		}
	function getOldrequest($oldrequestid) {
		$mySQL =& Database::getMySQL();
		$query = "SELECT `raceid`,`prehistory`,`characteristics`"
			. "\n FROM `homepage_raceapplies`"
			. "\n WHERE `id` = ".$mySQL->Quote( $oldrequestid )
			;
		$mySQL->setQuery( $query );
		return $mySQL->loadAssocRow();
		}
?>