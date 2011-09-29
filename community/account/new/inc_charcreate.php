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
			case RACE_ELF:
				$hair_colors = getElfHairColorArray();
				break;
			case RACE_HALFLING:
				$hair_colors = getHumanHairColorArray();
				break;
			case RACE_ORC:
				$hair_colors = getOrcHairColorArray();
				break;
			case RACE_LIZARD:
				$hair_colors = getLizardHairColorArray();
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
			case RACE_ELF:
				$skin_colors = getElfSkinColorArray();
				break;
			case RACE_HALFLING:
				$skin_colors = getHumanSkinColorArray();
				break;
			case RACE_ORC:
				$skin_colors = getOrcSkinColorArray();
				break;
			case RACE_LIZARD:
				$skin_colors = getLizardSkinColorArray();
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
					$hair_values = getDwarfMaleHairArray();
				}
				else
				{
					$hair_values = getDwarfFemaleHairArray();
				}
				break;
			case RACE_ELF:
				if ($gender == GENDER_MALE) {
					$hair_values = getElfMaleHairArray();
				}
				else
				{
					$hair_values = getElfFemaleHairArray();
				}
				break;
			case RACE_HALFLING:
				if ($gender == GENDER_MALE) {
					$hair_values = getHalflingMaleHairArray();
				}
				else
				{
					$hair_values = getHalflingFemaleHairArray();
				}
				break;
			case RACE_ORC:
				$hair_values = getOrcMaleHairArray();
				break;
			case RACE_LIZARD:
				$hair_values = getLizardMaleHairArray();
				break;
			default:
				$hair_values = array();
		}
		return $hair_values;
	}

	public function getBeardValues($race)
	{
		switch($race){
			case RACE_HUMAN:
				$beard_values = getHumanBeardArray();
				break;
			case RACE_DWARF:
				$beard_values = getDwarfBeardArray();
				break;
			case RACE_HALFLING:
				$beard_values = getHalflingBeardArray();
				break;
			case RACE_ORC:
				$beard_values = getOrcBeardArray();
				break;
			default:
				$beard_values = array();
		}

		return $beard_values;
	}

 	public function getImageName($race, $gender)
	{
		switch($race){
			case RACE_HUMAN:
				if ($gender == GENDER_MALE) {
					$name = "hum_m";
				}
				else
				{
					$name = "hum_f";
				}
				break;
			case RACE_DWARF:
				if ($gender == GENDER_MALE) {
					$name = "dwa_m";
				}
				else
				{
					$name = "dwa_f";
				}
				break;
			case RACE_HALFLING:
				if ($gender == GENDER_MALE) {
					$name = "hal_m";
				}
				else
				{
					$name = "hal_f";
				}
				break;
			case RACE_ELF:
				if ($gender == GENDER_MALE) {
					$name = "elf_m";
				}
				else
				{
					$name = "elf_f";
				}
				break;
			case RACE_ORC:
				if ($gender == GENDER_MALE) {
					$name = "orc_m";
				}
				else
				{
					$name = "orc_f";
				}
				break;
			case RACE_LIZARD:
					$name = "liz_m";
				break;
			default:
				$name = "";
		}
		return $name;
	}

 	public function getStartSkinColor($race)
	{
 		//$color_array = self::getSkinColors($race);
 		//$skin_color = '#'.$color_array[mt_rand(0,41)];

 		$skin_color='#efgccc';

		return $skin_color;
	}

	public function getStartHairColor($race)
	{
		$hair_color='#efgccc';

		return $hair_color;
	}


	public function getConvertedImageUrl($image_name, $farbcode)
	{
		/*
		   $farbcode = "990000";
		   $image_name = "hum_m_stand_w";
		*/
		$script = Page::getRootPath()."/shared/scripts/img_convert.sh";
		$base_img = Page::getRootPath()."/shared/pics/chars/".$image_name.".png";
		$new_img = Page::getRootPath()."/media/charcreate/".$image_name."_".$farbcode.".png";
		$new_img_url = Page::getMediaURL()."/charcreate/".$image_name."_".$farbcode.".png";

		if (! file_exists($new_img))
		{
			$cmd = 'bash '.$script.' '.$farbcode.' '.$base_img.' '.$new_img;
			$sdtout = "";
			$rc = 0;

			exec($cmd, $stdout, $rc);
		}
		return $new_img_url;

	}

 }

?>