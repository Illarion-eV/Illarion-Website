<?php

/**
 * konstanten fuer Charaktererschaffung
 *
 * WICHTIG: die werte werden auch in Datenbank-Eintraegen
 * genutzt, daher nachtraeglich NICHT MEHR AENDERN!!
 *
 * @author        kadiya
 */


 // Geschlecht
/**
 * Geschlecht: maennlich
 */
define ('GENDER_MALE',                0 );

/**
 * Geschlecht: weiblich
 */
define ('GENDER_FEMALE',                1 );


// Rassen
/**
 * Geschlecht: maennlich
 */
define ('RACE_HUMAN',                	0 );

/**
 * Geschlecht: maennlich
 */
define ('RACE_DWARF',                	1 );

/**
 * Geschlecht: maennlich
 */
define ('RACE_HALFLING',                2 );

/**
 * Geschlecht: maennlich
 */
define ('RACE_ELF',                		3 );

/**
 * Geschlecht: maennlich
 */
define ('RACE_ORC',                		4 );

/**
 * Geschlecht: maennlich
 */
define ('RACE_LIZARD',                	5 );


function getGenderArray($lang)
{
	if ($lang == "de")
	{
		return array(
		    GENDER_MALE => "Männlich",
		    GENDER_FEMALE => "Weiblich",
		);
	}
	else
	{
		return array(
		    GENDER_MALE => "Male",
		    GENDER_FEMALE => "Female",
		);
	}
}

function getRaceArray($lang)
{
	if ($lang == "de")
	{
		return array(
		    RACE_HUMAN => "Mensch",
		    RACE_DWARF => "Zwerg",
		    RACE_HALFLING => "Halbling",
		    RACE_ELF => "Elf",
		    RACE_ORC => "Ork",
		    RACE_LIZARD => "Echsenwesen"
		);
	}
	else
	{
		return array(
		    RACE_HUMAN => "Human",
		    RACE_DWARF => "Dwarf",
		    RACE_HALFLING => "Halfling",
		    RACE_ELF => "Elf",
		    RACE_ORC => "Orc",
		    RACE_LIZARD => "Lizard"
		);
	}
}

