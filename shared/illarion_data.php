<?php
class IllarionData {
	public static function getRacePicture($raceid, $sex, $detailed = false) {
		$filename_hardware = Page::getImageRootPath() . '/races/';
		$filename_software = Page::getImageURL() . '/races/';
		switch ($raceid) {
			case 0: $filename = (0 == $sex ? 'human_m.png' : 'human_f.png');
				break;
			case 1: $filename = (0 == $sex ? 'dwarf_m.png' : 'dwarf_f.png');
				break;
			case 2: $filename = (0 == $sex ? 'halfling_m.png' : 'halfling_f.png');
				break;
			case 3: $filename = (0 == $sex ? 'elf_m.png' : 'elf_f.png');
				break;
			case 4: $filename = (0 == $sex ? 'orc_m.png' : 'orc_f.png');
				break;
			case 5: $filename = 'lizard.png';
				break;
			case 6: $filename = (0 == $sex ? 'gnome_m.png' : 'gnome_f.png');
				break;
			case 7: $filename = 'fairy.png';
				break;
			case 8: $filename = (0 == $sex ? 'goblin_m.png' : 'goblin_f.png');
				break;
			case 9: $filename = 'cavetroll.png';
				break;
			case 10: $filename = 'zombie.png';
				break;
			case 11: $filename = 'skeleton.png';
				break;
			case 12: $filename = 'beholder.png';
				break;
			case 13: $filename = 'ghost.png';
				break;
			case 14: $filename = 'invisible.png';
				break;
			case 15: $filename = 'human_m.png';
				break;
			case 16: $filename = 'lizard.png';
				break;
			case 17: $filename = 'insects.png';
				break;
			case 18: $filename = 'sheep.png';
				break;
			case 19: $filename = 'spider.png';
				break;
			case 20: $filename = 'dskeleton.png';
				break;
			case 21: $filename = 'rotworm.png';
				break;
			case 22: $filename = 'demon.png';
				break;
			case 23: $filename = 'skorpion.png';
				break;
			case 24: $filename = 'pig.png';
				break;
			case 25: $filename = 'invisible.png';
				break;
			case 26: $filename = 'schaedel.png';
				break;
			case 27: $filename = 'wasp.png';
				break;
			case 28: $filename = 'forresttroll.png';
				break;
			case 29: $filename = 'schatten.png';
				break;
			case 30: $filename = 'golem.png';
				break;
			case 31: $filename = 'goblin_m.png';
				break;
			case 32: $filename = 'gnoll.png';
				break;
			case 33: $filename = 'drache.png';
				break;
			case 34: $filename = 'drow_m.png';
				break;
			case 35: $filename = 'drow_f.png';
				break;
			case 36: $filename = 'ldemon.png';
				break;
			case 37: $filename = 'cow.png';
				break;
			case 38: $filename = 'hirsch.png';
				break;
			case 39: $filename = 'wolf.png';
				break;
			case 40: $filename = 'panther.png';
				break;
			case 41: $filename = 'hase.png';
				break;
			case 42: $filename = 'goblin_f.png';
				break;
			case 43: $filename = 'fairy.png';
				break;
			case 44: $filename = 'gnome_m.png';
				break;
			case 45: $filename = 'gnome_f.png';
				break;
			case 46: $filename = 'fallen.png';
				break;
			case 50: $filename = 'packesel.png';
				break;
			case 53: $filename = 'eisdrache.png';
				break;
		}

		if (is_file($filename_hardware . $filename)) {
			if ($detailed) {
				list($width, $height) = getimagesize($filename_hardware . $filename);
				return array('file' => $filename_software . $filename, 'width' => $width, 'height' => $height);
			}else {
				return $filename_software . $filename;
			}
		}else {
			return false;
		}
	}

	public static function getItemPicture($id, $detailed = false) {
		$filename_hardware = Page::getImageRootPath() . '/items/' . $id . '.png';
		$filename_software = Page::getImageURL() . '/items/' . $id . '.png';
		if (is_file($filename_hardware)) {
			if ($detailed) {
				list($width, $height) = getimagesize($filename_hardware);
				return array('file' => $filename_software, 'width' => $width, 'height' => $height);
			}else {
				return $filename_software;
			}
		}else {
			return false;
		}
	}

	public static function getRaceName($raceid) {
		switch ($raceid) {
			case 0:
			case 15: return (Page::isGerman() ? 'Mensch' : 'Human');
				break;
			case 1: return (Page::isGerman() ? 'Zwerg' : 'Dwarf');
				break;
			case 2: return (Page::isGerman() ? 'Halbling' : 'Halfling');
				break;
			case 3: return (Page::isGerman() ? 'Elf' : 'Elf');
				break;
			case 4: return (Page::isGerman() ? 'Ork' : 'Orc');
				break;
			case 5:
			case 16: return (Page::isGerman() ? 'Echsenmensch' : 'Lizardman');
				break;
			case 6:
			case 44:
			case 45: return (Page::isGerman() ? 'Gnom' : 'Gnome');
				break;
			case 7:
			case 43: return (Page::isGerman() ? 'Fee' : 'Fairy');
				break;
			case 8:
			case 31:
			case 42: return (Page::isGerman() ? 'Goblin' : 'Goblin');
				break;
			case 9: return (Page::isGerman() ? 'Oger' : 'Ogre');
				break;
			case 10: return (Page::isGerman() ? 'Mumie' : 'Mummie');
				break;
			case 11: return (Page::isGerman() ? 'Skelett' : 'Skeleton');
				break;
			case 12: return (Page::isGerman() ? 'Beholder' : 'Beholder');
				break;
			case 13: return (Page::isGerman() ? 'Geist' : 'Ghost');
				break;
			case 14:
			case 25: return (Page::isGerman() ? 'Unsichtbar' : 'Invisible');
				break;
			case 17: return (Page::isGerman() ? 'Insekten' : 'Insects');
				break;
			case 18: return (Page::isGerman() ? 'Schaf' : 'Sheep');
				break;
			case 19: return (Page::isGerman() ? 'Spinne' : 'Spider');
				break;
			case 20: return (Page::isGerman() ? 'Dämonenskelett' : 'Demonskeleton');
				break;
			case 21: return (Page::isGerman() ? 'Faulwurm' : 'Rotworm');
				break;
			case 22: return (Page::isGerman() ? 'Dämon' : 'Demon');
				break;
			case 23: return (Page::isGerman() ? 'Skorpion' : 'Scorpion');
				break;
			case 24: return (Page::isGerman() ? 'Schwein' : 'Pig');
				break;
			case 26: return (Page::isGerman() ? 'Schädel' : 'Scull');
				break;
			case 27: return (Page::isGerman() ? 'Wespe' : 'Wasp');
				break;
			case 28: return (Page::isGerman() ? 'Waldtroll' : 'Foresttroll');
				break;
			case 29: return (Page::isGerman() ? 'Schattenskelett' : 'Shadowskeleton');
				break;
			case 30: return (Page::isGerman() ? 'Steingolem' : 'Stonegolem');
				break;
			case 32: return (Page::isGerman() ? 'Gnoll' : 'Gnoll');
				break;
			case 33: return (Page::isGerman() ? 'Drache' : 'Dragon');
				break;
			case 34:
			case 35: return (Page::isGerman() ? 'Dunkelelf' : 'Drow');
				break;
			case 36: return (Page::isGerman() ? 'niederer Dämon' : 'Lesser demon');
				break;
			case 37: return (Page::isGerman() ? 'Kuh' : 'Cow');
				break;
			case 38: return (Page::isGerman() ? 'Hirsch' : 'Deer');
				break;
			case 39: return (Page::isGerman() ? 'Wolf' : 'Wolf');
				break;
			case 40: return (Page::isGerman() ? 'Panther' : 'Panther');
				break;
			case 41: return (Page::isGerman() ? 'Hase' : 'Rabbit');
				break;
			case 46: return (Page::isGerman() ? 'Gefallener' : 'Fallen');
				break;
			case 50: return (Page::isGerman() ? 'Packesel' : 'Pack mule');
				break;
			case 53: return (Page::isGerman() ? 'Eisdrache' : 'Icedragon');
				break;
			default: return (Page::isGerman() ? 'Unbekannt' : 'Unknown');
		}
	}

	public static function getSexName($sex) {
		switch ($sex) {
			case 0: return (Page::isGerman() ? 'männlich' : 'male');
				break;
			case 1: return (Page::isGerman() ? 'weiblich' : 'female');
				break;
			default: return (Page::isGerman() ? 'unbekannt': 'unknown');
		}
	}

	public static function getCharacterStatusName($status)
	{
		if (Page::isGerman()) { $lang = "de"; } else { $lang = "us"; }

		$charStatusArray = getCharStatusArray($lang);

		return $charStatusArray[$status];
		/*
		switch ($status) {
			case 0: return (Page::isGerman() ? 'spielbar' : 'playable');
				break;
			case 1: return (Page::isGerman() ? 'inaktiv' : 'inactive');
				break;
			case 3:
			case 5:
			case 7:
			case 8: return (Page::isGerman() ? 'Erstellung nicht fertig' : 'Creation not done');
				break;
			case 4: return (Page::isGerman() ? 'Namensprüfung' : 'Namecheck pending');
				break;
			case 6: return (Page::isGerman() ? 'Name abgelehnt' : 'Name rejected');
				break;
			case 20: return (Page::isGerman() ? 'eingesperrt' : 'jailed');
				break;
			case 21: return (Page::isGerman() ? 'vorrübergehend eingesperrt' : 'temporary jailed');
				break;
			case 30: return (Page::isGerman() ? 'gebannt' : 'banned');
				break;
			case 31: return (Page::isGerman() ? 'vorrübergehend gebannt' : 'temporary banned');
				break;
			case 40: return (Page::isGerman() ? 'Informationen unvollständig' : 'Informations imcpmplete');
				break;
			default: return (Page::isGerman() ? 'unbekannt' : 'unknown');
				break;
		}
		   */
	}

	public static function getAccountStatusName($status) {
		switch ($status) {
			case 0: return (Page::isGerman() ? 'registriert' : 'registred');
				break;
			case 3: return (Page::isGerman() ? 'aktiv' : 'active');
				break;
			case 7: return (Page::isGerman() ? 'vorrübergehend gesperrt' : 'temporary banned');
				break;
			case 8: return (Page::isGerman() ? 'gesperrt' : 'banned');
				break;
			default: return (Page::isGerman() ? 'unbekannt' : 'unknown');
				break;
		}
	}

	public static function getOnlineStatus($status)
	{
		$online_array = getOnlineArray();

		return $online_array[$status];
	}

	public static function getRaceArray($lang)
	{
		$race_array=array();

		$pgSQL =& Database::getPostgreSQL();
		$query = "SELECT raceattr.id, raceattr.name FROM accounts.raceattr ORDER BY raceattr.id";
		$pgSQL->setQuery( $query );
		$result = $pgSQL->loadAssocList();


		$race_list = getRaceArray($lang);
		foreach ($result as $key => $value)
		{
			if (array_key_exists ( $value['id'], $race_list) )
			{
				$race_array[$value['id']] = $race_list[$value['id']];
			}
			else
			{
				$race_array[$value['id']] = $value['name'];
			}
		}

		return $race_array;

	}
}

?>