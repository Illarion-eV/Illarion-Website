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

	public function getConvertedImageUrl($image_name, $farbcode)
	{
		/*
		$farbcode = "990000";
		$image_name = "hum_m_stand_w";
		*/
		$script = Page::getRootPath()."/shared/scripts/img_convert.sh";
		$base_img = Page::getRootPath()."/shared/pics/chars/hum/".$image_name.".png";
		$new_img = Page::getRootPath()."/media/charcreate/".$image_name."_".$farbcode.".png";
		$new_img_url = Page::getMediaURL()."/charcreate/".$image_name."_".$farbcode.".png";
		$cmd = 'bash '.$script.' '.$farbcode.' '.$base_img.' '.$new_img;
		$sdtout = "";
		$rc = 0;

		exec($cmd, $stdout, $rc);

		return $new_img_url;
	}

 }

?>