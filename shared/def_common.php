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

// Charakter Status

/**
* Char-Status: Spielbar
*/
define ('CHAR_STATUS_PLAYABLE',					0 );

/**
 * Char-Status: Inaktiv
 */
define ('CHAR_STATUS_INAKTIVE',					1 );

/**
 * Char-Status: Namen wird gecheckt
 */
define ('CHAR_STATUS_NAME_CHECK',				4 );

/**
 * Char-Status: Name akzeptiert
 */
define ('CHAR_STATUS_NAME_ACCEPTED',			5 );

/**
 * Char-Status: Name abgelehnt
 */
define ('CHAR_STATUS_NAME_REJECTED',			6 );

/**
 * Char-Status: Erstellung nicht fertig
 */
define ('CHAR_STATUS_CREATION_NOT_DONE',		8 );

/**
 * Char-Status: eingesperrt
 */
define ('CHAR_STATUS_JAILED',					20 );

/**
 * Char-Status: temp eingesperrt
 */
define ('CHAR_STATUS_TEMP_JAILED',				21 );

/**
 * Char-Status: gebannt
 */
define ('CHAR_STATUS_BANNED',					30 );

/**
 * Char-Status: temporaer gebannt
 */
define ('CHAR_STATUS_TEMP_BANNED',				31 );

/**
 * Char-Status: information unvollstaendig
 */
define ('CHAR_STATUS_INFORMATION_INCOMPLETE',	40 );

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
			100 => "--Sonstiges--",
		    RACE_HUMAN => "Mensch",
		    RACE_DWARF => "Zwerg",
		    RACE_HALFLING => "Halbling",
		    RACE_ELF => "Elf",
		    RACE_ORC => "Ork",
		    RACE_LIZARD => "Echsenwesen",

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
			RACE_GOBLIN => "Goblin",
			"--Other--"
		);
	}
}

function getCharStatusArray($lang)
{
	if ($lang == "de")
	{
		return array(
		    CHAR_STATUS_PLAYABLE => "Spielbar",
		    CHAR_STATUS_INAKTIVE => "Inaktiv",
		    CHAR_STATUS_NAME_CHECK => "Namensprüfung",
		    CHAR_STATUS_NAME_ACCEPTED => "Name akzeptiert",
		    CHAR_STATUS_NAME_REJECTED => "Name abgelehnt",
		    CHAR_STATUS_CREATION_NOT_DONE => "Erstellung nicht fertig",
		    CHAR_STATUS_JAILED => "Eingesperrt",
		    CHAR_STATUS_TEMP_JAILED => "Temporär eingesperrt",
		    CHAR_STATUS_BANNED => "Gebannt",
		    CHAR_STATUS_TEMP_BANNED => "Tempprär gebannt",
		    CHAR_STATUS_INFORMATION_INCOMPLETE => "Informationen unvollständig"
		);
	}
	else
	{
		return array(
			CHAR_STATUS_PLAYABLE => "Playable",
			CHAR_STATUS_INAKTIVE => "Inaktiv",
			CHAR_STATUS_NAME_CHECK => "Namecheck",
			CHAR_STATUS_NAME_ACCEPTED => "Name accepted",
			CHAR_STATUS_NAME_REJECTED => "Name rejected",
			CHAR_STATUS_CREATION_NOT_DONE => "Creation not done",
			CHAR_STATUS_JAILED => "Jailed",
			CHAR_STATUS_TEMP_JAILED => "Temporary jailed",
			CHAR_STATUS_BANNED => "Banned",
			CHAR_STATUS_TEMP_BANNED => "Temporary banned",
			CHAR_STATUS_INFORMATION_INCOMPLETE => "Information incomplete"
		);
	}
}