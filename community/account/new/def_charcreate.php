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

define ('HUMAN_SKIN_COLOR_1',			"#F2C59E");
define ('HUMAN_SKIN_COLOR_2',			"#EFC096");
define ('HUMAN_SKIN_COLOR_3',			"#EABB92");
define ('HUMAN_SKIN_COLOR_4',			"#E2B38A");
define ('HUMAN_SKIN_COLOR_5',			"#DEAF87");
define ('HUMAN_SKIN_COLOR_6',			"#D9AB84");
define ('HUMAN_SKIN_COLOR_7',			"#D2A680");
define ('HUMAN_SKIN_COLOR_8',			"#CDA17B");
define ('HUMAN_SKIN_COLOR_9',			"#CA9E78");
define ('HUMAN_SKIN_COLOR_10',			"#C69B75");
define ('HUMAN_SKIN_COLOR_11',			"#BD9571");
define ('HUMAN_SKIN_COLOR_12',			"#B8906C");
define ('HUMAN_SKIN_COLOR_13',			"#B38B68");
define ('HUMAN_SKIN_COLOR_14',			"#AC8360");
define ('HUMAN_SKIN_COLOR_15',			"#A77F5C");
define ('HUMAN_SKIN_COLOR_16',			"#9A7453");
define ('HUMAN_SKIN_COLOR_17',			"#936E4E");
define ('HUMAN_SKIN_COLOR_18',			"#8F6B4C");
define ('HUMAN_SKIN_COLOR_19',			"#8A6749");
define ('HUMAN_SKIN_COLOR_20',			"#856345");
define ('HUMAN_SKIN_COLOR_21',			"#78573A");

function getGenderArray()
{
	return array(
	    GENDER_MALE => "Männlich",
	    GENDER_FEMALE => "Weiblich",
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
	    HUMAN_SKIN_COLOR_21
	);
}

?>