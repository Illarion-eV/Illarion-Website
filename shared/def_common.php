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
 * Rasse: Mensch
 */
define ('RACE_HUMAN',                	0 );

/**
 * Rasse: Zwerg
 */
define ('RACE_DWARF',                	1 );

/**
 * Rasse: Halbling
 */
define ('RACE_HALFLING',                2 );

/**
 * Rasse: Elf
 */
define ('RACE_ELF',                		3 );

/**
 * Rasse: Ork
 */
define ('RACE_ORC',                		4 );

/**
 * Rasse: Echsenwesen
 */
define ('RACE_LIZARD',                	5 );

/**
 * Rasse: Gnom
 */
define ('RACE_GNOME',                	6 );

/**
 * Rasse: Fee
 */
define ('RACE_FAIRY',                	7 );

/**
 * Rasse: Goblin
 */
define ('RACE_GOBLIN',                	8 );

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
		    RACE_LIZARD => "Echsenwesen",
		    RACE_GNOME => "Gnom",
		    RACE_FAIRY => "Fee",
		    RACE_GOBLIN => "Goblin"
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
		    RACE_LIZARD => "Lizard",
			RACE_GNOME => "Gnome",
			RACE_FAIRY => "Fairy",
			RACE_GOBLIN => "Goblin"
		);
	}
}

