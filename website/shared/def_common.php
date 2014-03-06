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
 * Char-Race: sonstige
 */
define ('RACE_OTHER',					-2 );

/**
 * Char-Race: Alle
 */
define ('RACE_ALL',						-1 );
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

/**
 * Rasse: Oger
 */
define ('RACE_OGRE',                	9 );

/**
 * Rasse: Mumie
 */
define ('RACE_MUMMIE',                	10 );

/**
 * Rasse: Skelett
 */
define ('RACE_SKELETON',            	11 );

/**
 * Rasse: Beholder
 */
define ('RACE_BEHOLDER',               	12 );

/**
 * Rasse: Geist
 */
define ('RACE_GHOST',                	13 );

/**
 * Rasse: Unsichtbar
 */
define ('RACE_INVISIBLE',            	14 );

/**
 * Rasse: Insekten
 */
define ('RACE_INSECTS',             	17 );

/**
 * Rasse: Schaf
 */
define ('RACE_SHEEP',    	        	18 );

/**
 * Rasse: Spinne
 */
define ('RACE_SPIDER',             		19 );

/**
 * Rasse: Dämonenskelett
 */
define ('RACE_DEMONSKELETON',            20 );

/**
 * Rasse: Rotwurm
 */
define ('RACE_ROTWORM',          	  	21 );

/**
 * Rasse:  Dämon
 */
define ('RACE_DEMON',            		22 );

/**
 * Rasse: Skorpion
 */
define ('RACE_SCORPION',            	23 );

/**
 * Rasse: Schwein
 */
define ('RACE_PIG',					 	24);

/**
 * Rasse: Schädel
 */
define ('RACE_SKULL',					26 );

/**
 * Rasse: Wespe
 */
define ('RACE_WASP',					27 );

/**
 * Rasse: Troll
 */
define ('RACE_TROLL',					28 );

/**
 * Rasse: Schattenskelett
 */
define ('RACE_SHADOWSKELETON',			29 );

/**
 * Rasse: STEINGOLEM
 */
define ('RACE_STONEGOLEM',				30 );

/**
 * Rasse: Gnoll
 */
define ('RACE_GNOLL',					32 );

/**
 * Rasse: Drache
 */
define ('RACE_DRAGON',					33 );

/**
 * Rasse: Drow (männlich)
 */
define ('RACE_MALE_DROW',				34	 );

/**
 * Rasse: Drow (weiblich)
 */
define ('RACE_FEMALE_DROW',				35	 );

/**
 * Rasse: Niederer Dämon
 */
define ('RACE_LESSER_DEMON',			36	 );

/**
 * Rasse: Kuh
 */
define ('RACE_COW',						37 );

/**
 * Rasse: Reh
 */
define ('RACE_DEER',					38 );

/**
 * Rasse: Wolf
 */
define ('RACE_WOLF',					39 );

/**
 * Rasse: Panther
 */
define ('RACE_PANTHER',					40 );

/**
 * Rasse: Hase
 */
define ('RACE_RABBIT',					41 );

/**
 * Rasse: Gefallener
 */
define ('RACE_FALLEN',					46 );


/**
 * Rasse: Gefallener
 */
define ('RACE_ICEDRAGON',					53 );

// Online Status

/**
 * Online-Status: online
 */
define ('ONLINE_STATUS_OFFLINE',				0 );

/**
 * Online Status: offline
 */
define ('ONLINE_STATUS_ONLINE',					1 );


// Charakter Status
/**
 * Char-Status: unbekannt
 */
define ('CHAR_STATUS_UNKNOWN',					-2 );
/**
 * Char-Status: Alle
 */
define ('CHAR_STATUS_ALL',						-1 );
/**
* Char-Status: Spielbar
*/
define ('CHAR_STATUS_PLAYABLE',					0 );

/**
 * Char-Status: Inaktiv
 */
define ('CHAR_STATUS_INAKTIVE',					1 );


/**
 * Char-Status: Erstellung nicht fertig
 */
define ('CHAR_STATUS_CREATION_NOT_DONE_X',		3 );

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
define ('CHAR_STATUS_CREATION_NOT_DONE_Y',		7 );

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

// Logtype fuer account_log
/**
 * Logtype: Statusaenderung account
 */
define ('ACC_LOG_TYPE_STATUS',      		0 );

/**
 * Logtype: Notiz zu Account
 */
define ('ACC_LOG_TYPE_NOTE',      			1 );

/**
 * Logtype: Verwarnung zu Account
 */
define ('ACC_LOG_TYPE_ADMONISHMENT',      	2 );

/**
 * Logtype: Statusaenderung Charakter
 */
define ('CHAR_LOG_TYPE_STATUS',        		0 );

/**
 * Logtype: Notiz zu Charakter
 */
define ('CHAR_LOG_TYPE_NOTE',             	1 );

/**
 * Logtype: Verwarnung zu Charakter
 */
define ('CHAR_LOG_TYPE_ADMONISHMENT',  		2 );

/**
 * Logtype: Attributaenderung zu Charakter
 */
define ('CHAR_LOG_TYPE_CHANGE_ATTRIB',       4 );

/**
 * Logtype: Skillaenderung zu Charakter
 */
define ('CHAR_LOG_TYPE_CHANGE_SKILL',       5 );

// Skillclasses
/**
 * Skillclass: language
 */
define ('SKILL_CLASS_LANGUAGE',       		1 );

/**
 * Skillclass: crafting
 */
define ('SKILL_CLASS_CRAFTING',             2 );

/**
 * Skillclass: magic
 */
define ('SKILL_CLASS_MAGIC',             	3 );

/**
 * Skillclass: misc
 */
define ('SKILL_CLASS_MISC',                4 );

/**
 * Skillclass: fighting
 */
define ('SKILL_CLASS_FIGHTING',             5 );

/**
 * Skillclass: druid
 */
define ('SKILL_CLASS_DRUID',             	6 );

/**
 * Skillclass: priest
 */
define ('SKILL_CLASS_PRIEST',             	7 );

/**
 * Skillclass: bard
 */
define ('SKILL_CLASS_BARD',             	8 );

// Magietypen
/**
 * Typ: Magier
 */
define ('CAST_TYPE_MAGE',             	0 );

/**
 * Magietyp: Priester
 */
define ('CAST_TYPE_PRIEST',               1 );

/**
 * Typ: Barden
 */
define ('CAST_TYPE_BARD',               2 );

/**
 * Typ: Druiden
 */
define ('CAST_TYPE_DRUID',               4 );


function getGenderArray($lang="")
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

function getCastTypeArray($lang="")
{
	if ($lang == "de")
    {
        return array(
            CAST_TYPE_MAGE => "Magier",
            CAST_TYPE_PRIEST => "Priester",
			CAST_TYPE_BARD => "Barden",
            CAST_TYPE_DRUID => "Druiden"
        );
    }
    else
    {
        return array(
			CAST_TYPE_MAGE => "Mage",
            CAST_TYPE_PRIEST => "Priest",
            CAST_TYPE_BARD => "Bard",
            CAST_TYPE_DRUID => "Druid"
        );
    }

}

function getRaceArray($lang="")
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
		    RACE_GOBLIN => "Goblin",
		    RACE_OGRE => "Oger",
		    RACE_MUMMIE => "Mumie",
		    RACE_SKELETON => "Skelett",
		    RACE_BEHOLDER => "Beholder",
		    RACE_GHOST => "Geist",
		    RACE_INVISIBLE => "Unsichtbar",
		    RACE_INSECTS => "Insekten",
		    RACE_SHEEP => "Schaf",
		    RACE_SPIDER => "Spinne",
		    RACE_DEMONSKELETON => "Dämonenskelett",
		    RACE_ROTWORM => "Rotwurm",
		    RACE_DEMON => "Dämon",
		    RACE_SCORPION => "Skorpion",
		    RACE_PIG => "Schwein",
		    RACE_SKULL => "Schädel",
		    RACE_WASP => "Wespe",
		    RACE_TROLL => "Troll",
		    RACE_SHADOWSKELETON => "Schattenskelett",
		    RACE_STONEGOLEM => "Steingolem",
		    RACE_GNOLL => "Gnoll",
		    RACE_DRAGON => "Drache",
		    RACE_MALE_DROW => "Drow (männlich)",
		    RACE_FEMALE_DROW => "Drow (weiblich)",
		    RACE_LESSER_DEMON => "Niederer Dämon",
		    RACE_COW => "Kuh",
		    RACE_DEER => "Reh",
		    RACE_WOLF => "Wolf",
		    RACE_PANTHER => "Panther",
		    RACE_RABBIT => "Hase",
		    RACE_FALLEN => "Gefallener",
		    RACE_ICEDRAGON => "Eisdrache"

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
			RACE_OGRE => "Ogre",
			RACE_MUMMIE => "Mummy",
			RACE_SKELETON => "Skeleton",
			RACE_BEHOLDER => "Beholder",
			RACE_GHOST => "Ghost",
			RACE_INVISIBLE => "Invisible",
			RACE_INSECTS => "Insects",
			RACE_SHEEP => "Sheep",
			RACE_SPIDER => "Spider",
			RACE_DEMONSKELETON => "Demonskeleton",
			RACE_ROTWORM => "Rotworm",
			RACE_DEMON => "Demon",
			RACE_SCORPION => "Scorpion",
			RACE_PIG => "Pig",
			RACE_SKULL => "Skull",
			RACE_WASP => "Wasp",
			RACE_TROLL => "Troll",
			RACE_SHADOWSKELETON => "Shadowskeleton",
			RACE_STONEGOLEM => "Stonegolem",
			RACE_GNOLL => "Gnoll",
			RACE_DRAGON => "Dragon",
			RACE_MALE_DROW => "Drow (male)",
			RACE_FEMALE_DROW => "Drow (female)",
			RACE_LESSER_DEMON => "Lesser Demon",
			RACE_COW => "Cow",
			RACE_DEER => "Deer",
			RACE_WOLF => "Wolf",
			RACE_PANTHER => "Panther",
			RACE_RABBIT => "Rabbit",
			RACE_FALLEN => "Fallen",
			RACE_ICEDRAGON => "Icedragon"

		);
	}
}

function getOnlineArray()
{
		return array(
		    ONLINE_STATUS_OFFLINE => "Offline",
		    ONLINE_STATUS_ONLINE => "Online",
		);
}

function getCharStatusArray($lang="")
{
	if ($lang == "de")
	{
		return array(
		    CHAR_STATUS_PLAYABLE => "Spielbar",
		    CHAR_STATUS_INAKTIVE => "Inaktiv",
		    CHAR_STATUS_CREATION_NOT_DONE_X => "Erstellung nicht fertig",
		    CHAR_STATUS_NAME_CHECK => "Namensprüfung",
		    CHAR_STATUS_NAME_ACCEPTED => "Name akzeptiert",
		    CHAR_STATUS_NAME_REJECTED => "Name abgelehnt",
		    CHAR_STATUS_CREATION_NOT_DONE_Y => "Erstellung nicht fertig",
		    CHAR_STATUS_CREATION_NOT_DONE => "Erstellung nicht fertig",
		    CHAR_STATUS_JAILED => "Eingesperrt",
		    CHAR_STATUS_TEMP_JAILED => "Temporär eingesperrt",
		    CHAR_STATUS_BANNED => "Gebannt",
		    CHAR_STATUS_TEMP_BANNED => "Temporär gebannt",
		    CHAR_STATUS_INFORMATION_INCOMPLETE => "Informationen unvollständig"
		);
	}
	else
	{
		return array(
			CHAR_STATUS_PLAYABLE => "Playable",
			CHAR_STATUS_INAKTIVE => "Inactive",
			CHAR_STATUS_NAME_CHECK => "Name Check",
			CHAR_STATUS_NAME_ACCEPTED => "Name Accepted",
			CHAR_STATUS_NAME_REJECTED => "Name Rejected",
			CHAR_STATUS_CREATION_NOT_DONE => "Creation Not Done",
			CHAR_STATUS_JAILED => "Jailed",
			CHAR_STATUS_TEMP_JAILED => "Temporarily Jailed",
			CHAR_STATUS_BANNED => "Banned",
			CHAR_STATUS_TEMP_BANNED => "Temporarily Banned",
			CHAR_STATUS_INFORMATION_INCOMPLETE => "Information Incomplete"
		);
	}
}
