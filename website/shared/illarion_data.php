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
			case 0: return (Page::isGerman() ? 'Mensch' : 'Human');
				break;
			case 1: return (Page::isGerman() ? 'Zwerg' : 'Dwarf');
				break;
			case 2: return (Page::isGerman() ? 'Halbling' : 'Halfling');
				break;
			case 3: return (Page::isGerman() ? 'Elf' : 'Elf');
				break;
			case 4: return (Page::isGerman() ? 'Ork' : 'Orc');
				break;
			case 5: return (Page::isGerman() ? 'Echsenmensch' : 'Lizardman');
				break;
			case 6: return (Page::isGerman() ? 'Gnom' : 'Gnome');
				break;
			case 9: return (Page::isGerman() ? 'Troll' : 'Troll');
				break;
			case 10: return (Page::isGerman() ? 'Mumie' : 'Mummy');
				break;
			case 11: return (Page::isGerman() ? 'Skelett' : 'Skeleton');
				break;
			case 12: return (Page::isGerman() ? 'Beholder' : 'Beholder');
				break;
			case 13: return (Page::isGerman() ? 'Schwarzbeholder' : 'Blackbeholder');
				break;
			case 14: return (Page::isGerman() ? 'Transparentbeholder' : 'Transparentbeholder');
				break;
			case 15: return (Page::isGerman() ? 'Braunmumie' : 'Brownmummy');
				break;
			case 17: return (Page::isGerman() ? 'Blaumumie' : 'Bluemummy');
				break;
			case 18: return (Page::isGerman() ? 'Schaf' : 'Sheep');
				break;
			case 19: return (Page::isGerman() ? 'Spinne' : 'Spider');
				break;
			case 20: return (Page::isGerman() ? 'Dämonenskelett' : 'Demonskeleton');
				break;
			case 21: return (Page::isGerman() ? 'Rotspinne' : 'Redspider');
				break;
			case 22: return (Page::isGerman() ? 'Grünspinne' : 'Greenspider');
				break;
			case 23: return (Page::isGerman() ? 'Blauspinne' : 'Bluespider');
				break;
			case 24: return (Page::isGerman() ? 'Schwein' : 'Pig');
				break;
			case 25: return (Page::isGerman() ? 'Wildschwein' : 'Boar');
				break;
			case 26: return (Page::isGerman() ? 'Transparentspinne' : 'Transparentspider');
				break;
			case 27: return (Page::isGerman() ? 'Wespe' : 'Wasp');
				break;
			case 28: return (Page::isGerman() ? 'Rotwespe' : 'Redwasp');
				break;
			case 30: return (Page::isGerman() ? 'Steingolem' : 'Stonegolem');
				break;
			case 31: return (Page::isGerman() ? 'Braunsteingolem' : 'Brownstonegolem');
				break;
			case 32: return (Page::isGerman() ? 'Rotsteingolem' : 'Redstonegolem');
				break;
			case 33: return (Page::isGerman() ? 'Silbersteingolem' : 'Silverstonegolem');
				break;
			case 34: return (Page::isGerman() ? 'Transparentsteingolem' : 'Transparentstonegolem');
				break;
			case 37: return (Page::isGerman() ? 'Kuh' : 'Cow');
				break;
			case 38: return (Page::isGerman() ? 'Stier' : 'Bull');
				break;
			case 39: return (Page::isGerman() ? 'Wolf' : 'Wolf');
				break;
			case 40: return (Page::isGerman() ? 'Transparentwolf' : 'Transparentwolf');
				break;
			case 41: return (Page::isGerman() ? 'Schwarzwolf' : 'Blackwolf');
				break;
			case 42: return (Page::isGerman() ? 'Grauwolf' : 'Greywolf');
				break;
			case 43: return (Page::isGerman() ? 'Rotwolf' : 'Redwolf');
				break;
			case 48: return (Page::isGerman() ? 'Rotraptor' : 'Redraptor');
				break;
			case 49: return (Page::isGerman() ? 'Silberbär' : 'Silverbear');
				break;
			case 50: return (Page::isGerman() ? 'Schwarzbär' : 'Blackbear');
				break;
			case 51: return (Page::isGerman() ? 'Bär' : 'Bear');
				break;
			case 52: return (Page::isGerman() ? 'Raptor' : 'Raptor');
				break;
			case 53: return (Page::isGerman() ? 'Zombie' : 'Zombie');
				break;
			case 54: return (Page::isGerman() ? 'Höllenhund' : 'Hellhound');
				break;
			case 55: return (Page::isGerman() ? 'Imp' : 'Imp');
				break;
			case 56: return (Page::isGerman() ? 'Eisengolem' : 'Irongolem');
				break;
			case 57: return (Page::isGerman() ? 'Rattenmann' : 'Ratman');
				break;
			case 58: return (Page::isGerman() ? 'Hund' : 'Dog');
				break;
			case 59: return (Page::isGerman() ? 'Käfer' : 'Beetle');
				break;
			case 60: return (Page::isGerman() ? 'Fuchs' : 'Fox');
				break;
			case 61: return (Page::isGerman() ? 'Schleim' : 'Slime');
				break;
			case 62: return (Page::isGerman() ? 'Huhn' : 'Chicken');
				break;
			case 63: return (Page::isGerman() ? 'Knochendrachen' : 'Bonedragon');
				break;
			case 64: return (Page::isGerman() ? 'Schwarzknochendrachen' : 'Blackbonedragon');
				break;
			case 65: return (Page::isGerman() ? 'Rotknochendrachen' : 'Redbonedragon');
				break;
			case 66: return (Page::isGerman() ? 'Transparentknochendrachen' : 'Transparentbonedragon');
				break;
			case 67: return (Page::isGerman() ? 'Grünknochendrachen' : 'Greenbonedragon');
				break;
			case 68: return (Page::isGerman() ? 'Blauknochendrachen' : 'Bluebonedragon');
				break;
			case 69: return (Page::isGerman() ? 'Goldknochendrachen' : 'Goldbonedragon');
				break;
			case 70: return (Page::isGerman() ? 'Rotmumie' : 'Redmummy');
				break;
			case 71: return (Page::isGerman() ? 'Graumumie' : 'Greymummy');
				break;
			case 72: return (Page::isGerman() ? 'Schwarzmumie' : 'Blackmummy');
				break;
			case 73: return (Page::isGerman() ? 'Goldmumie' : 'Goldmummy');
				break;
			case 74: return (Page::isGerman() ? 'Transparentskelett' : 'Transparentskeleton');
				break;
			case 75: return (Page::isGerman() ? 'Blauskelett' : 'Blueskeleton');
				break;
			case 76: return (Page::isGerman() ? 'Grünskelett' : 'Greenskeleton');
				break;
			case 77: return (Page::isGerman() ? 'Goldgolem' : 'Goldgolem');
				break;
			case 78: return (Page::isGerman() ? 'Goldskelett' : 'Goldskeleton');
				break;
			case 79: return (Page::isGerman() ? 'Blautroll' : 'Bluetroll');
				break;
			case 80: return (Page::isGerman() ? 'Schwarztroll' : 'Blacktroll');
				break;
			case 81: return (Page::isGerman() ? 'Redtroll' : 'Rottroll');
				break;
			case 82: return (Page::isGerman() ? 'Schwarzzombie' : 'Blackzombie');
				break;
			case 83: return (Page::isGerman() ? 'Transparentzombie' : 'Transparentzombie');
				break;
			case 84: return (Page::isGerman() ? 'Rotzombie' : 'Redzombie');
				break;
			case 85: return (Page::isGerman() ? 'Schwarzhöllenhund' : 'Blackhellhound');
				break;
			case 86: return (Page::isGerman() ? 'Transparenthöllenhund' : 'Transparenthellhound');
				break;
			case 87: return (Page::isGerman() ? 'Grünhöllenhund' : 'Greenhellhound');
				break;
			case 88: return (Page::isGerman() ? 'Rothöllenhund' : 'Redhellhound');
				break;
			case 89: return (Page::isGerman() ? 'Rotimp' : 'Redimp');
				break;
			case 90: return (Page::isGerman() ? 'Schwarzimp' : 'Blackimp');
				break;
			case 91: return (Page::isGerman() ? 'Blaueisengolem' : 'Blueirongolem');
				break;
			case 92: return (Page::isGerman() ? 'Rotrattenmann' : 'Redratman');
				break;
			case 93: return (Page::isGerman() ? 'Grünrattenmann' : 'Greenratman');
				break;
			case 94: return (Page::isGerman() ? 'Blaurattenmann' : 'Blueratman');
				break;
			case 95: return (Page::isGerman() ? 'Rothund' : 'Reddog');
				break;
			case 96: return (Page::isGerman() ? 'Grauhund' : 'Greydog');
				break;
			case 97: return (Page::isGerman() ? 'Schwarzhund' : 'Blackdog');
				break;
			case 98: return (Page::isGerman() ? 'Grünkäfer' : 'Greenbeetle');
				break;
			case 99: return (Page::isGerman() ? 'Kupferkäfer' : 'Copperbeetle');
				break;
			case 100: return (Page::isGerman() ? 'Rotkäfer' : 'Redbeetle');
				break;
			case 101: return (Page::isGerman() ? 'Goldkäfer' : 'Goldbeetle');
				break;
			case 102: return (Page::isGerman() ? 'Graufuchs' : 'Greyfox');
				break;
			case 103: return (Page::isGerman() ? 'Rotschleim' : 'Redslime');
				break;
			case 104: return (Page::isGerman() ? 'Schwarzschleim' : 'Blackslime');
				break;
			case 105: return (Page::isGerman() ? 'Transparentschleim' : 'Transparentslime');
				break;
			case 106: return (Page::isGerman() ? 'Braunhuhn' : 'Brownchicken');
				break;
			case 107: return (Page::isGerman() ? 'Rothuhn' : 'Redchicken');
				break;
			case 108: return (Page::isGerman() ? 'Schwarzhuhn' : 'Blackchicken');
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
			case 4: return (Page::isGerman() ? 'Namensprüfung' : 'Name check pending');
				break;
			case 6: return (Page::isGerman() ? 'Name abgelehnt' : 'Name rejected');
				break;
			case 20: return (Page::isGerman() ? 'eingesperrt' : 'jailed');
				break;
			case 21: return (Page::isGerman() ? 'vorrübergehend eingesperrt' : 'temporary jailed');
				break;
			case 30: return (Page::isGerman() ? 'gebannt' : 'banned');
				break;
			case 31: return (Page::isGerman() ? 'vorrübergehend gebannt' : 'temporary ban');
				break;
			case 40: return (Page::isGerman() ? 'Informationen unvollständig' : 'Information incomplete');
				break;
			default: return (Page::isGerman() ? 'unbekannt' : 'unknown');
				break;
		}
		   */
	}

	public static function getAccountStatusName($status) {
		switch ($status) {
			case 0: return (Page::isGerman() ? 'registriert' : 'registered');
				break;
			case 3: return (Page::isGerman() ? 'aktiv' : 'active');
				break;
			case 7: return (Page::isGerman() ? 'vorrübergehend gesperrt' : 'temporary ban');
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
		$query = "SELECT raceattr.id, raceattr.name FROM illarionserver.raceattr ORDER BY raceattr.id";
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

		// alte ID's aussortieren, die sollen eh nicht mehr benutzt werden
		$bad_ids = array(-1, 15, 16, 25, 31, 42, 43 ,44, 45, 51);

		foreach ($bad_ids as $id)
		{
			unset($race_array[$id]);
		}

		return $race_array;

	}
}

?>
