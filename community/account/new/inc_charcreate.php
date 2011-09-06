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


 	private static $human_f_hair = array("hum_f_hairlong2_stand" => "Lange geflochtene Haare", "hum_f_stand_hair_hair1" => "Kurze Haare", "hum_f_stand_hair_hairlong" => "Lange offene Haare");
	private static $human_m_hair = array("hum_m_hair1_stand" => "Kurze Haare", "hum_m_stand_hair_hair2" => "Mittellange Haare", "hum_m_stand_hair_hair3" => "Lange Haare");
 	private static $human_beard = array("hum_m_beardfull_stand" => "Vollbart", "hum_m_stand_beard_beard2" => "Ziegenbart", "hum_m_stand_beard_beard3"=>"Bauschebart", "hum_m_stand_beard_beard4" => "Backenbart", "hum_m_stand_beard_beard5" => "Rauschebart");

	public function getHairColors($race)
	{
		switch($race){
			case 0:
				$hair_colors = getHumanHairColorArray();
				break;
			case 1:
				$hair_colors = getHumanHairColorArray();
				break;
			default:
				$hair_colors = array();
		}
		return $hair_colors;
	}

	public function getSkinColors($race)
	{
		switch($race){
			case 0:
				$skin_colors = getHumanSkinColorArray();
				break;
			case 1:
				$skin_colors = getHumanSkinColorArray();
				break;
			default:
				$skin_colors = getHumanSkinColorArray();
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