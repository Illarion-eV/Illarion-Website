<?php

/**
 * Klasse mit Funktionen fuer die Charaktererschaffung
 *
 * @version $Id$
 * @copyright 2011
 * @author Kadiya
 */


 /**
  *
  *
  */
 class char_create {

	public function getHairColors($race)
	{
		switch($race){
			case RACE_HUMAN:
				$hair_colors = getHumanHairColorArray();
				break;
			case RACE_DWARF:
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
			case RACE_HUMAN:
				$skin_colors = getHumanSkinColorArray();
				break;
			case RACE_DWARF:
				$skin_colors = getHumanSkinColorArray();
				break;
			default:
				$skin_colors = array();
		}
		return $skin_colors;
	}

 	public function getHairValues($race, $gender)
	{
		switch($race){
			case RACE_HUMAN:
				if ($gender == GENDER_MALE) {
					$hair_values = getHumanMaleHairArray();
				}
				else
				{
					$hair_values = getHumanFemaleHairArray();
				}
				break;
			case RACE_DWARF:
				if ($gender == GENDER_MALE) {
					$hair_values = getHumanMaleHairArray();
				}
				else
				{
					$hair_values = getHumanFemaleHairArray();
				}
				break;
			default:
				$hair_values = array();
		}
		return $hair_values;
	}

	public function getBeardValues($race)
	{
		return getHumanBeardArray();
	}


 }

?>