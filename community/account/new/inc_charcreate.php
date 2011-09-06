<?php

/**
 * Klasse mit Funktionen fuer die Charaktererschaffung
 *
 * @version $Id$
 * @copyright 2011
 */


 /**
  *
  *
  */
 class char_create {

 	private static $human_hair_colors = array("292C31","342626", "443532", "5F4536", "7F6449","5B402B","84613B","84542E","D3C499","C18D54","AF6F3F","A15229","613F3E","85594C","633E2E","843629","6D2C32","984229","E9CE92","E0BD79","B6A88C");
 	private static $human_skin_colors = array("F2C59E", "EFC096", "EABB92", "E2B38A", "DEAF87","D9AB84","D2A680","CDA17B","CA9E78","C69B75","BD9571","B8906C","B38B68","AC8360","A77F5C","9A7453","936E4E","8F6B4C","8A6749","856345","78573A");
 	private static $human_f_hair = array("hum_f_hairlong2_stand" => "Lange geflochtene Haare", "hum_f_stand_hair_hair1" => "Kurze Haare", "hum_f_stand_hair_hairlong" => "Lange offene Haare");
	private static $human_m_hair = array("hum_m_hair1_stand" => "Kurze Haare", "hum_m_stand_hair_hair2" => "Mittellange Haare", "hum_m_stand_hair_hair3" => "Lange Haare");
 	private static $human_beard = array("hum_m_beardfull_stand" => "Vollbart", "hum_m_stand_beard_beard2" => "Ziegenbart", "hum_m_stand_beard_beard3"=>"Bauschebart", "hum_m_stand_beard_beard4" => "Backenbart", "hum_m_stand_beard_beard5" => "Rauschebart");

	public function getHairColors($race)
	{
		switch($race){
			case 0:
				$hair_colors = self::$human_hair_colors;
				break;
			case 1:
				$hair_colors = self::$human_hair_colors;
				break;
			default:
				$hair_colors = self::$human_hair_colors;
		}
		return $hair_colors;
	}

	public function getSkinColors($race)
	{
		switch($race){
			case 0:
				$skin_colors = self::$human_skin_colors;
				break;
			case 1:
				$skin_colors = self::$human_skin_colors;
				break;
			default:
				$skin_colors = self::$human_skin_colors;
		}
		return $skin_colors;
	}

 	public function getHairValues($race, $gender)
	{
		switch($race){
			case 0:
				if ($gender == 0) {
					$hair_values = self::$human_m_hair_values;
				}
				else
				{
					$hair_values = self::$human_f_hair_values;
				}
				break;
			case 1:
				if ($gender == 0) {
					$hair_values = self::$dwarf_m_hair_values;
				}
				else
				{
					$hair_values = self::$dwarf_f_hair_values;
				}
				break;
			default:
				$hair_values = self::$human_m_hair_values;
		}
		return $hair_values;
	}

	public function getBeardValues($race)
	{
		return self::$human_beard;
	}


 }

?>