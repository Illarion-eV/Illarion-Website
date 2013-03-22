<?php
class includeWrapper {
	public static $paths = array();

	public static function includeOnce($path_file) {
		if (!isset(self::$paths[ $path_file ])) {
			include $path_file;
			self::$paths[ $path_file ] = true;
		}
	}

	public static function requireOnce($path_file) {
		if (!isset(self::$paths[ $path_file ])) {
			require $path_file;
			self::$paths[ $path_file ] = true;
		}
	}

	public static function getPaths() {
		return self::$paths;
	}
}

?>