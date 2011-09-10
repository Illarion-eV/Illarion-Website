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
define ('HUMAN_HAIR_COLOR_1',			"#FFF2DF");
define ('HUMAN_HAIR_COLOR_2',			"#FDE1B9");
define ('HUMAN_HAIR_COLOR_3',			"#F8D093");
define ('HUMAN_HAIR_COLOR_4',			"#F5D4B4");
define ('HUMAN_HAIR_COLOR_5',			"#F2C59E");
define ('HUMAN_HAIR_COLOR_6',			"#C98D77");
define ('HUMAN_HAIR_COLOR_7',			"#D9AB84");
define ('HUMAN_HAIR_COLOR_8',			"#C69B75");
define ('HUMAN_HAIR_COLOR_9',			"#C98C54");
define ('HUMAN_HAIR_COLOR_10',			"#E57B50");
define ('HUMAN_HAIR_COLOR_11',			"#F0965A");
define ('HUMAN_HAIR_COLOR_12',			"#B7623E");
define ('HUMAN_HAIR_COLOR_13',			"#A56F31");
define ('HUMAN_HAIR_COLOR_14',			"#BD582E");
define ('HUMAN_HAIR_COLOR_15',			"#AA502F");
define ('HUMAN_HAIR_COLOR_16',			"#C98049");
define ('HUMAN_HAIR_COLOR_17',			"#8B562C");
define ('HUMAN_HAIR_COLOR_18',			"#9C3215");
define ('HUMAN_HAIR_COLOR_19',			"#9F3F21");
define ('HUMAN_HAIR_COLOR_20',			"#683B24");
define ('HUMAN_HAIR_COLOR_21',			"#630002");
define ('HUMAN_HAIR_COLOR_22',			"#E8BB80");
define ('HUMAN_HAIR_COLOR_23',			"#F8D3AB");
define ('HUMAN_HAIR_COLOR_24',			"#F9C397");
define ('HUMAN_HAIR_COLOR_25',			"#EAD5C4");
define ('HUMAN_HAIR_COLOR_26',			"#F5BBA7");
define ('HUMAN_HAIR_COLOR_27',			"#F2DEBD");
define ('HUMAN_HAIR_COLOR_28',			"#EFABA2");
define ('HUMAN_HAIR_COLOR_29',			"#CDA17B");
define ('HUMAN_HAIR_COLOR_30',			"#AC8360");
define ('HUMAN_HAIR_COLOR_31',			"#D9A35B");
define ('HUMAN_HAIR_COLOR_32',			"#B67E41");
define ('HUMAN_HAIR_COLOR_33',			"#78573A");
define ('HUMAN_HAIR_COLOR_34',			"#5B3A2B");
define ('HUMAN_HAIR_COLOR_35',			"#4C2903");
define ('HUMAN_HAIR_COLOR_36',			"#421605");
define ('HUMAN_HAIR_COLOR_37',			"#6A2311");
define ('HUMAN_HAIR_COLOR_38',			"#4F2A1A");
define ('HUMAN_HAIR_COLOR_39',			"#562A07");
define ('HUMAN_HAIR_COLOR_40',			"#421B1C");
define ('HUMAN_HAIR_COLOR_41',			"#2F0F02");
define ('HUMAN_HAIR_COLOR_42',			"#412728");

/*
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
*/

define ('HUMAN_SKIN_COLOR_1',			"#F6DAB5");
define ('HUMAN_SKIN_COLOR_2',			"#F7CF9C");
define ('HUMAN_SKIN_COLOR_3',			"#F8C689");
define ('HUMAN_SKIN_COLOR_4',			"#F3B96F");
define ('HUMAN_SKIN_COLOR_5',			"#FAC7A8");
define ('HUMAN_SKIN_COLOR_6',			"#F5B68B");
define ('HUMAN_SKIN_COLOR_7',			"#F3A36E");
define ('HUMAN_SKIN_COLOR_8',			"#F0D0C3");
define ('HUMAN_SKIN_COLOR_9',			"#E1AD95");
define ('HUMAN_SKIN_COLOR_10',			"#D9997D");
define ('HUMAN_SKIN_COLOR_11',			"#D2926E");
define ('HUMAN_SKIN_COLOR_12',			"#CB774B");
define ('HUMAN_SKIN_COLOR_13',			"#F5E68B");
define ('HUMAN_SKIN_COLOR_14',			"#F3D479");
define ('HUMAN_SKIN_COLOR_15',			"#F3CC65");
define ('HUMAN_SKIN_COLOR_16',			"#DDB591");
define ('HUMAN_SKIN_COLOR_17',			"#D1A173");
define ('HUMAN_SKIN_COLOR_18',			"#C6935E");
define ('HUMAN_SKIN_COLOR_19',			"#C28043");
define ('HUMAN_SKIN_COLOR_20',			"#AC743B");
define ('HUMAN_SKIN_COLOR_21',			"#C9874A");
define ('HUMAN_SKIN_COLOR_22',			"#B07435");
define ('HUMAN_SKIN_COLOR_23',			"#8A5A2C");
define ('HUMAN_SKIN_COLOR_24',			"#764C24");
define ('HUMAN_SKIN_COLOR_25',			"#734923");
define ('HUMAN_SKIN_COLOR_26',			"#A36333");
define ('HUMAN_SKIN_COLOR_27',			"#6C4023");
define ('HUMAN_SKIN_COLOR_28',			"#5D381D");
define ('HUMAN_SKIN_COLOR_29',			"#452A15");
define ('HUMAN_SKIN_COLOR_30',			"#9B6944");
define ('HUMAN_SKIN_COLOR_31',			"#7D5639");
define ('HUMAN_SKIN_COLOR_32',			"#63432C");
define ('HUMAN_SKIN_COLOR_33',			"#523724");
define ('HUMAN_SKIN_COLOR_34',			"#C3A08A");
define ('HUMAN_SKIN_COLOR_35',			"#B38A6E");
define ('HUMAN_SKIN_COLOR_36',			"#A17656");
define ('HUMAN_SKIN_COLOR_37',			"#92694D");
define ('HUMAN_SKIN_COLOR_38',			"#876247");
define ('HUMAN_SKIN_COLOR_39',			"#9F3F21");
define ('HUMAN_SKIN_COLOR_40',			"#9C3215");
define ('HUMAN_SKIN_COLOR_41',			"#6A2311");
define ('HUMAN_SKIN_COLOR_42',			"#562A07");

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


define ('LIZARD_HAIR_COLOR_1',			"#FFF594");
define ('LIZARD_HAIR_COLOR_2',			"#FFF050");
define ('LIZARD_HAIR_COLOR_3',			"#FFD34F");
define ('LIZARD_HAIR_COLOR_4',			"#FFA6E1");
define ('LIZARD_HAIR_COLOR_5',			"#CF66FF");
define ('LIZARD_HAIR_COLOR_6',			"#FF41FE");
define ('LIZARD_HAIR_COLOR_7',			"#AE00FE");
define ('LIZARD_HAIR_COLOR_8',			"#FFF678");
define ('LIZARD_HAIR_COLOR_9',			"#F39900");
define ('LIZARD_HAIR_COLOR_10',			"#C26100");
define ('LIZARD_HAIR_COLOR_11',			"#B39437");
define ('LIZARD_HAIR_COLOR_12',			"#654566");
define ('LIZARD_HAIR_COLOR_13',			"#B32DB3");
define ('LIZARD_HAIR_COLOR_14',			"#B3749E");
define ('LIZARD_HAIR_COLOR_15',			"#8585A6");
define ('LIZARD_HAIR_COLOR_16',			"#579294");
define ('LIZARD_HAIR_COLOR_17',			"#8F4A6D");
define ('LIZARD_HAIR_COLOR_18',			"#64457C");
define ('LIZARD_HAIR_COLOR_19',			"#1D4344");
define ('LIZARD_HAIR_COLOR_20',			"#786000");
define ('LIZARD_HAIR_COLOR_21',			"#6B2C60");
define ('LIZARD_HAIR_COLOR_22',			"#AAFF00");
define ('LIZARD_HAIR_COLOR_23',			"#00FF00");
define ('LIZARD_HAIR_COLOR_24',			"#00FF68");
define ('LIZARD_HAIR_COLOR_25',			"#4100FE");
define ('LIZARD_HAIR_COLOR_26',			"#ADFF85");
define ('LIZARD_HAIR_COLOR_27',			"#61FFFF");
define ('LIZARD_HAIR_COLOR_28',			"#61C1FF");
define ('LIZARD_HAIR_COLOR_29',			"#81D0F4");
define ('LIZARD_HAIR_COLOR_30',			"#6161F2");
define ('LIZARD_HAIR_COLOR_31',			"#7091B8");
define ('LIZARD_HAIR_COLOR_32',			"#52B58A");
define ('LIZARD_HAIR_COLOR_33',			"#79B35D");
define ('LIZARD_HAIR_COLOR_34',			"#00B278");
define ('LIZARD_HAIR_COLOR_35',			"#00B347");
define ('LIZARD_HAIR_COLOR_36',			"#44B3B3");
define ('LIZARD_HAIR_COLOR_37',			"#4486B3");
define ('LIZARD_HAIR_COLOR_38',			"#73A58C");
define ('LIZARD_HAIR_COLOR_39',			"#007252");
define ('LIZARD_HAIR_COLOR_40',			"#009B70");
define ('LIZARD_HAIR_COLOR_41',			"#60967C");
define ('LIZARD_HAIR_COLOR_42',			"#507F28");

define ('LIZARD_SKIN_COLOR_1',			"#FFF594");
define ('LIZARD_SKIN_COLOR_2',			"#FFF050");
define ('LIZARD_SKIN_COLOR_3',			"#FFD34F");
define ('LIZARD_SKIN_COLOR_4',			"#FFA6E1");
define ('LIZARD_SKIN_COLOR_5',			"#CF66FF");
define ('LIZARD_SKIN_COLOR_6',			"#FF41FE");
define ('LIZARD_SKIN_COLOR_7',			"#AE00FE");
define ('LIZARD_SKIN_COLOR_8',			"#FFF678");
define ('LIZARD_SKIN_COLOR_9',			"#F39900");
define ('LIZARD_SKIN_COLOR_10',			"#C26100");
define ('LIZARD_SKIN_COLOR_11',			"#B39437");
define ('LIZARD_SKIN_COLOR_12',			"#654566");
define ('LIZARD_SKIN_COLOR_13',			"#B32DB3");
define ('LIZARD_SKIN_COLOR_14',			"#B3749E");
define ('LIZARD_SKIN_COLOR_15',			"#8585A6");
define ('LIZARD_SKIN_COLOR_16',			"#579294");
define ('LIZARD_SKIN_COLOR_17',			"#8F4A6D");
define ('LIZARD_SKIN_COLOR_18',			"#64457C");
define ('LIZARD_SKIN_COLOR_19',			"#1D4344");
define ('LIZARD_SKIN_COLOR_20',			"#786000");
define ('LIZARD_SKIN_COLOR_21',			"#6B2C60");
define ('LIZARD_SKIN_COLOR_22',			"#AAFF00");
define ('LIZARD_SKIN_COLOR_23',			"#00FF00");
define ('LIZARD_SKIN_COLOR_24',			"#00FF68");
define ('LIZARD_SKIN_COLOR_25',			"#4100FE");
define ('LIZARD_SKIN_COLOR_26',			"#ADFF85");
define ('LIZARD_SKIN_COLOR_27',			"#61FFFF");
define ('LIZARD_SKIN_COLOR_28',			"#61C1FF");
define ('LIZARD_SKIN_COLOR_29',			"#81D0F4");
define ('LIZARD_SKIN_COLOR_30',			"#6161F2");
define ('LIZARD_SKIN_COLOR_31',			"#7091B8");
define ('LIZARD_SKIN_COLOR_32',			"#52B58A");
define ('LIZARD_SKIN_COLOR_33',			"#79B35D");
define ('LIZARD_SKIN_COLOR_34',			"#00B278");
define ('LIZARD_SKIN_COLOR_35',			"#00B347");
define ('LIZARD_SKIN_COLOR_36',			"#44B3B3");
define ('LIZARD_SKIN_COLOR_37',			"#4486B3");
define ('LIZARD_SKIN_COLOR_38',			"#73A58C");
define ('LIZARD_SKIN_COLOR_39',			"#007252");
define ('LIZARD_SKIN_COLOR_40',			"#009B70");
define ('LIZARD_SKIN_COLOR_41',			"#60967C");
define ('LIZARD_SKIN_COLOR_42',			"#507F28");


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
		HUMAN_HAIR_COLOR_21,
		HUMAN_HAIR_COLOR_22,
		HUMAN_HAIR_COLOR_23,
		HUMAN_HAIR_COLOR_24,
		HUMAN_HAIR_COLOR_25,
		HUMAN_HAIR_COLOR_26,
		HUMAN_HAIR_COLOR_27,
		HUMAN_HAIR_COLOR_28,
		HUMAN_HAIR_COLOR_29,
		HUMAN_HAIR_COLOR_30,
		HUMAN_HAIR_COLOR_31,
		HUMAN_HAIR_COLOR_32,
		HUMAN_HAIR_COLOR_33,
		HUMAN_HAIR_COLOR_34,
		HUMAN_HAIR_COLOR_35,
		HUMAN_HAIR_COLOR_36,
		HUMAN_HAIR_COLOR_37,
		HUMAN_HAIR_COLOR_38,
		HUMAN_HAIR_COLOR_39,
		HUMAN_HAIR_COLOR_40,
		HUMAN_HAIR_COLOR_41,
		HUMAN_HAIR_COLOR_42
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

function getLizardHairColorArray()
{
	return array(
	    LIZARD_HAIR_COLOR_1,
	    LIZARD_HAIR_COLOR_2,
	    LIZARD_HAIR_COLOR_3,
	    LIZARD_HAIR_COLOR_4,
	    LIZARD_HAIR_COLOR_5,
	    LIZARD_HAIR_COLOR_6,
	    LIZARD_HAIR_COLOR_7,
	    LIZARD_HAIR_COLOR_8,
	    LIZARD_HAIR_COLOR_9,
	    LIZARD_HAIR_COLOR_10,
	    LIZARD_HAIR_COLOR_11,
	    LIZARD_HAIR_COLOR_12,
	    LIZARD_HAIR_COLOR_13,
	    LIZARD_HAIR_COLOR_14,
	    LIZARD_HAIR_COLOR_15,
	    LIZARD_HAIR_COLOR_16,
	    LIZARD_HAIR_COLOR_17,
	    LIZARD_HAIR_COLOR_18,
	    LIZARD_HAIR_COLOR_19,
	    LIZARD_HAIR_COLOR_20,
	    LIZARD_HAIR_COLOR_21,
	    LIZARD_HAIR_COLOR_22,
		LIZARD_HAIR_COLOR_23,
		LIZARD_HAIR_COLOR_24,
		LIZARD_HAIR_COLOR_25,
		LIZARD_HAIR_COLOR_26,
		LIZARD_HAIR_COLOR_27,
		LIZARD_HAIR_COLOR_28,
		LIZARD_HAIR_COLOR_29,
		LIZARD_HAIR_COLOR_30,
		LIZARD_HAIR_COLOR_31,
		LIZARD_HAIR_COLOR_32,
		LIZARD_HAIR_COLOR_33,
		LIZARD_HAIR_COLOR_34,
		LIZARD_HAIR_COLOR_35,
		LIZARD_HAIR_COLOR_36,
		LIZARD_HAIR_COLOR_37,
		LIZARD_HAIR_COLOR_38,
		LIZARD_HAIR_COLOR_39,
		LIZARD_HAIR_COLOR_40,
		LIZARD_HAIR_COLOR_41,
		LIZARD_HAIR_COLOR_42
	);
}

function getLizardSkinColorArray()
{
	return array(
	    LIZARD_SKIN_COLOR_1,
	    LIZARD_SKIN_COLOR_2,
	    LIZARD_SKIN_COLOR_3,
	    LIZARD_SKIN_COLOR_4,
	    LIZARD_SKIN_COLOR_5,
	    LIZARD_SKIN_COLOR_6,
	    LIZARD_SKIN_COLOR_7,
	    LIZARD_SKIN_COLOR_8,
	    LIZARD_SKIN_COLOR_9,
	    LIZARD_SKIN_COLOR_10,
	    LIZARD_SKIN_COLOR_11,
	    LIZARD_SKIN_COLOR_12,
	    LIZARD_SKIN_COLOR_13,
	    LIZARD_SKIN_COLOR_14,
	    LIZARD_SKIN_COLOR_15,
	    LIZARD_SKIN_COLOR_16,
	    LIZARD_SKIN_COLOR_17,
	    LIZARD_SKIN_COLOR_18,
	    LIZARD_SKIN_COLOR_19,
	    LIZARD_SKIN_COLOR_20,
	    LIZARD_SKIN_COLOR_21,
	    LIZARD_SKIN_COLOR_22,
		LIZARD_SKIN_COLOR_23,
		LIZARD_SKIN_COLOR_24,
		LIZARD_SKIN_COLOR_25,
		LIZARD_SKIN_COLOR_26,
		LIZARD_SKIN_COLOR_27,
		LIZARD_SKIN_COLOR_28,
		LIZARD_SKIN_COLOR_29,
		LIZARD_SKIN_COLOR_30,
		LIZARD_SKIN_COLOR_31,
		LIZARD_SKIN_COLOR_32,
		LIZARD_SKIN_COLOR_33,
		LIZARD_SKIN_COLOR_34,
		LIZARD_SKIN_COLOR_35,
		LIZARD_SKIN_COLOR_36,
		LIZARD_SKIN_COLOR_37,
		LIZARD_SKIN_COLOR_38,
		LIZARD_SKIN_COLOR_39,
		LIZARD_SKIN_COLOR_40,
		LIZARD_SKIN_COLOR_41,
		LIZARD_SKIN_COLOR_42
	);
}


?>