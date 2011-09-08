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

// Haarfarbe

// Menschen
define ('HUMAN_HAIR_COLOR_1',			"#292C31");
define ('HUMAN_HAIR_COLOR_2',			"#342626");
define ('HUMAN_HAIR_COLOR_3',			"#443532");
define ('HUMAN_HAIR_COLOR_4',			"#5F4536");
define ('HUMAN_HAIR_COLOR_5',			"#7F6449");
define ('HUMAN_HAIR_COLOR_6',			"#5B402B");
define ('HUMAN_HAIR_COLOR_7',			"#84613B");
define ('HUMAN_HAIR_COLOR_8',			"#84542E");
define ('HUMAN_HAIR_COLOR_9',			"#D3C499");
define ('HUMAN_HAIR_COLOR_10',			"#C18D54");
define ('HUMAN_HAIR_COLOR_11',			"#AF6F3F");
define ('HUMAN_HAIR_COLOR_12',			"#A15229");
define ('HUMAN_HAIR_COLOR_13',			"#613F3E");
define ('HUMAN_HAIR_COLOR_14',			"#85594C");
define ('HUMAN_HAIR_COLOR_15',			"#633E2E");
define ('HUMAN_HAIR_COLOR_16',			"#843629");
define ('HUMAN_HAIR_COLOR_17',			"#6D2C32");
define ('HUMAN_HAIR_COLOR_18',			"#984229");
define ('HUMAN_HAIR_COLOR_19',			"#E9CE92");
define ('HUMAN_HAIR_COLOR_20',			"#E0BD79");
define ('HUMAN_HAIR_COLOR_21',			"#B6A88C");


define ('HUMAN_SKIN_COLOR_1',			"#FFF2DF");
define ('HUMAN_SKIN_COLOR_2',			"#FDE1B9");
define ('HUMAN_SKIN_COLOR_3',			"#F8D093");
define ('HUMAN_SKIN_COLOR_4',			"#F5D4B4");
define ('HUMAN_SKIN_COLOR_5',			"#F2C59E");
define ('HUMAN_SKIN_COLOR_6',			"#C98D77");
define ('HUMAN_SKIN_COLOR_7',			"#D9AB84");
define ('HUMAN_SKIN_COLOR_8',			"#C69B75");
define ('HUMAN_SKIN_COLOR_9',			"#C98C54");
define ('HUMAN_SKIN_COLOR_10',			"#E57B50");
define ('HUMAN_SKIN_COLOR_11',			"#F0965A");
define ('HUMAN_SKIN_COLOR_12',			"#B7623E");
define ('HUMAN_SKIN_COLOR_13',			"#A56F31");
define ('HUMAN_SKIN_COLOR_14',			"#BD582E");
define ('HUMAN_SKIN_COLOR_15',			"#AA502F");
define ('HUMAN_SKIN_COLOR_16',			"#C98049");
define ('HUMAN_SKIN_COLOR_17',			"#8B562C");
define ('HUMAN_SKIN_COLOR_18',			"#9C3215");
define ('HUMAN_SKIN_COLOR_19',			"#9F3F21");
define ('HUMAN_SKIN_COLOR_20',			"#683B24");
define ('HUMAN_SKIN_COLOR_21',			"#630002");
define ('HUMAN_SKIN_COLOR_22',			"#E8BB80");
define ('HUMAN_SKIN_COLOR_23',			"#F8D3AB");
define ('HUMAN_SKIN_COLOR_24',			"#F9C397");
define ('HUMAN_SKIN_COLOR_25',			"#EAD5C4");
define ('HUMAN_SKIN_COLOR_26',			"#F5BBA7");
define ('HUMAN_SKIN_COLOR_27',			"#F2DEBD");
define ('HUMAN_SKIN_COLOR_28',			"#EFABA2");
define ('HUMAN_SKIN_COLOR_29',			"#CDA17B");
define ('HUMAN_SKIN_COLOR_30',			"#AC8360");
define ('HUMAN_SKIN_COLOR_31',			"#D9A35B");
define ('HUMAN_SKIN_COLOR_32',			"#B67E41");
define ('HUMAN_SKIN_COLOR_33',			"#78573A");
define ('HUMAN_SKIN_COLOR_34',			"#5B3A2B");
define ('HUMAN_SKIN_COLOR_35',			"#4C2903");
define ('HUMAN_SKIN_COLOR_36',			"#421605");
define ('HUMAN_SKIN_COLOR_37',			"#6A2311");
define ('HUMAN_SKIN_COLOR_38',			"#4F2A1A");
define ('HUMAN_SKIN_COLOR_39',			"#562A07");
define ('HUMAN_SKIN_COLOR_40',			"#421B1C");
define ('HUMAN_SKIN_COLOR_41',			"#2F0F02");
define ('HUMAN_SKIN_COLOR_42',			"#412728");

define ('HUMAN_FEMALE_HAIR_NO',			0);
define ('HUMAN_FEMALE_HAIR_1',			"hum_f_hairlong2_stand");
define ('HUMAN_FEMALE_HAIR_2',			"hum_f_stand_hair_hairlong");
define ('HUMAN_FEMALE_HAIR_3',			"hum_f_stand_hair_hair1");

define ('HUMAN_MALE_HAIR_NO',			0);
define ('HUMAN_MALE_HAIR_1',			"hum_m_hair1_stand");
define ('HUMAN_MALE_HAIR_2',			"hum_m_stand_hair_hair2");
define ('HUMAN_MALE_HAIR_3',			"hum_m_stand_hair_hair3");

define('HUMAN_BEARD_NO',				0);
define('HUMAN_BEARD_1',					"hum_m_beardfull_stand");
define('HUMAN_BEARD_2',					"hum_m_stand_beard_beard2");
define('HUMAN_BEARD_3',					"hum_m_stand_beard_beard3");
define('HUMAN_BEARD_4',					"hum_m_stand_beard_beard4");
define('HUMAN_BEARD_5',					"hum_m_stand_beard_beard5");

function getGenderArray()
{
	return array(
	    GENDER_MALE => "Männlich",
	    GENDER_FEMALE => "Weiblich",
	);
}

function getRaceArray()
{
	return array(
	    RACE_HUMAN => "Mensch",
	    RACE_DWARF => "Zwerg",
	    RACE_HALFLING => "Halbling",
	    RACE_ELF => "Elf",
	    RACE_ORC => "Orc",
	    RACE_LIZARD => "Echsenwesen"
	);
}

function getHumanHairColorArray()
{
	return array(
	    HUMAN_HAIR_COLOR_1,
	    HUMAN_HAIR_COLOR_2,
	    HUMAN_HAIR_COLOR_3,
	    HUMAN_HAIR_COLOR_4,
	    HUMAN_HAIR_COLOR_5,
	    HUMAN_HAIR_COLOR_6,
	    HUMAN_HAIR_COLOR_7,
	    HUMAN_HAIR_COLOR_8,
	    HUMAN_HAIR_COLOR_9,
	    HUMAN_HAIR_COLOR_10,
	    HUMAN_HAIR_COLOR_11,
	    HUMAN_HAIR_COLOR_12,
	    HUMAN_HAIR_COLOR_13,
	    HUMAN_HAIR_COLOR_14,
	    HUMAN_HAIR_COLOR_15,
	    HUMAN_HAIR_COLOR_16,
	    HUMAN_HAIR_COLOR_17,
	    HUMAN_HAIR_COLOR_18,
	    HUMAN_HAIR_COLOR_19,
	    HUMAN_HAIR_COLOR_20,
	    HUMAN_HAIR_COLOR_21
	);
}

function getHumanSkinColorArray()
{
	return array(
	    HUMAN_SKIN_COLOR_1,
	    HUMAN_SKIN_COLOR_2,
	    HUMAN_SKIN_COLOR_3,
	    HUMAN_SKIN_COLOR_4,
	    HUMAN_SKIN_COLOR_5,
	    HUMAN_SKIN_COLOR_6,
	    HUMAN_SKIN_COLOR_7,
	    HUMAN_SKIN_COLOR_8,
	    HUMAN_SKIN_COLOR_9,
	    HUMAN_SKIN_COLOR_10,
	    HUMAN_SKIN_COLOR_11,
	    HUMAN_SKIN_COLOR_12,
	    HUMAN_SKIN_COLOR_13,
	    HUMAN_SKIN_COLOR_14,
	    HUMAN_SKIN_COLOR_15,
	    HUMAN_SKIN_COLOR_16,
	    HUMAN_SKIN_COLOR_17,
	    HUMAN_SKIN_COLOR_18,
	    HUMAN_SKIN_COLOR_19,
	    HUMAN_SKIN_COLOR_20,
	    HUMAN_SKIN_COLOR_21,
	    HUMAN_SKIN_COLOR_22,
		HUMAN_SKIN_COLOR_23,
		HUMAN_SKIN_COLOR_24,
		HUMAN_SKIN_COLOR_25,
		HUMAN_SKIN_COLOR_26,
		HUMAN_SKIN_COLOR_27,
		HUMAN_SKIN_COLOR_28,
		HUMAN_SKIN_COLOR_29,
		HUMAN_SKIN_COLOR_30,
		HUMAN_SKIN_COLOR_31,
		HUMAN_SKIN_COLOR_32,
		HUMAN_SKIN_COLOR_33,
		HUMAN_SKIN_COLOR_34,
		HUMAN_SKIN_COLOR_35,
		HUMAN_SKIN_COLOR_36,
		HUMAN_SKIN_COLOR_37,
		HUMAN_SKIN_COLOR_38,
		HUMAN_SKIN_COLOR_39,
		HUMAN_SKIN_COLOR_40,
		HUMAN_SKIN_COLOR_41,
		HUMAN_SKIN_COLOR_42
	);
}

function getHumanFemaleHairArray()
{
	return array(
		HUMAN_FEMALE_HAIR_NO => "--Keine Haare--",
	    HUMAN_FEMALE_HAIR_1 => "Kurze Haare",
	    HUMAN_FEMALE_HAIR_2 => "Lange, geflochtene Haare",
	    HUMAN_FEMALE_HAIR_3 => "Lange, offene Haare"
	);
}

function getHumanMaleHairArray()
{
	return array(
		HUMAN_MALE_HAIR_NO => "--Keine Haare--",
	    HUMAN_MALE_HAIR_1 => "Kurze Haare",
	    HUMAN_MALE_HAIR_2 => "Mittellange Haare",
	    HUMAN_MALE_HAIR_3 => "Lange Haare"
	);
}

function getHumanBeardArray()
{
	return array(
		HUMAN_BEARD_NO => "--Kein Bart--",
	    HUMAN_BEARD_1 => "Vollbart",
	    HUMAN_BEARD_2 => "Ziegenbart",
	    HUMAN_BEARD_3 => "Bauschebart",
	    HUMAN_BEARD_4 => "Backenbart",
	    HUMAN_BEARD_5 => "Rauschebart"
	);
}

?>