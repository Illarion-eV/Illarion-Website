<?php
/*
 * User handler for Illarion
 *
 * Written by Martin Karing
 * 17.07.2008
 */
class IllaUser {
	public static $ID = - 1;
	public static $username = 'guest';
	public static $name = 'guest';
	public static $email = '';
	public static $lastseen = '';
	public static $registerdate = '';
	public static $lastip = '';
	public static $passwd = '';
	public static $state = 3;
	public static $charlimit = 0;
	public static $paid = false;
	public static $length = 0;
	public static $weight = 0;
	public static $time_offset = 1;
	public static $dst = true;
	public static $allowed_races = array(0, 1, 2, 3, 4, 5);
	public static $allowed_applies = array(6, 7, 8);
	public static $clean_pw = '';
	public static $lang = 'de';
	private static $key = '';
	//private static $found_rights = null;
	//private static $found_groups = null;
	public static $found_rights = null;
    public static $found_groups = null;
	public static $moep1 = null;
	public static $moep2 = null;

	private static $original_values = array();

	public static final function login($username, $plain_pw, $remember_me) {
		self::$clean_pw = $plain_pw;
		self::$passwd = crypt(stripslashes($plain_pw), '$1$illarion1');
		self::$username = $username;

		if ($username == "devserver") {
			self::logout();
			return false;
		}
		
		if (!self::IPfine()) {
			self::logout();
			return false;
		}

		$pgSQL = &Database::getPostgreSQL();
        $query = 'SELECT acc_id, acc_login, acc_email, acc_registerdate, acc_lastip, acc_state, acc_maxchars, acc_lang, acc_racepermission,acc_applypermission,acc_name,acc_weight,acc_length,acc_timeoffset,acc_dst,acc_lastseen'
             . PHP_EOL . ' FROM accounts.account'
             . PHP_EOL . ' WHERE acc_login = ' . $pgSQL->Quote(self::$username)
             . PHP_EOL . ' AND acc_passwd = ' . $pgSQL->Quote(self::$passwd) ;
            $pgSQL->setQuery($query);
            $user = $pgSQL->loadAssocRow();
            if (!is_null($user)) 
			{
                self::$ID = $user['acc_id'];
                self::$name = ($user['acc_name'] ? $user['acc_name'] : $user['acc_login']);
                self::$email = $user['acc_email'];
                self::$lastseen = $user['acc_lastseen'];
				self::$registerdate = $user['acc_registerdate'];
                self::$lastip = $user['acc_lastip'];
                self::$state = $user['acc_state'];
                self::$charlimit = $user['acc_maxchars'];
                self::$lang = ($user['acc_lang'] == 0 ? 'de' : 'us');
                self::$length = self::getKeyFromMeasuresystemString($user['acc_length']);
            	self::$weight = self::getKeyFromMeasuresystemString($user['acc_weight']);
            	self::$allowed_races = explode(',', $user['acc_racepermission']);
            	self::$allowed_applies = explode(',', $user['acc_applypermission']);
            	self::$time_offset = ($user['acc_timeoffset'] / 100);
            	self::$dst = ($user['acc_dst'] == 1);
				self::$paid = false;
				self::StoreToPostgreSQL();
                self::writeOriginalValues();
            }
			else 
			{
                return false;
            }
		
		if (self::$state != 3) {
			self::logout();
			return false;
		}
		self::start_session($remember_me);
		return true;
	}

	public static final function init() {
		session_start();
		$sessiondata = $_SESSION['data'];
		if (is_null($sessiondata)) {
			$sessiondata = $_COOKIE['illarion_hp'];
		}
		if (is_null($sessiondata)) {
			self::$ID = - 1;
			self::$username = 'guest';
			self::$name = 'guest';
			self::$email = '';
			self::$lastseen = '';
			self::$lastip = '';;
			self::$passwd = '';
			self::$state = 3;
			self::$charlimit = 0;
			self::$paid = false;
			self::$clean_pw = '';
			self::$key = '';
			return null;
		}

		$sessiondata = unserialize(stripslashes($sessiondata));

		$pgSQL = &Database::getPostgreSQL();

        $pgSQL->setQuery('SELECT COUNT(*) FROM homepage.session_keys WHERE ses_key_id = ' . $pgSQL->Quote($sessiondata['key']) . ' AND ses_user_id = ' . $pgSQL->Quote($sessiondata['id']));
        if ($pgSQL->loadResult() != 1) {
			setcookie('illarion_hp', '', time() - 3600, '/');
			session_unset();
			session_destroy();
			return null;
		}
//		$pgSQL = &Database::getPostgreSQL('accounts');
        $query = 'SELECT acc_login, acc_email, acc_registerdate, acc_lastip, acc_state, acc_maxchars, acc_lang,acc_racepermission,acc_applypermission,acc_name,acc_weight,acc_length,acc_timeoffset,acc_dst,acc_lastseen'
             . PHP_EOL . ' FROM accounts.account'
             . PHP_EOL . ' WHERE acc_id = ' . $pgSQL->Quote($sessiondata['id']);
        $pgSQL->setQuery($query);
        $user = $pgSQL->loadAssocRow();
        if (!is_null($user))
        {
            self::$ID = $sessiondata['id'];
			self::$username = $user['acc_login'];
            self::$name = ($user['acc_name'] ? $user['acc_name'] : $user['acc_login']);
            self::$email = $user['acc_email'];
            self::$lastseen = $user['acc_lastseen'];
            self::$registerdate = $user['acc_registerdate'];
            self::$lastip = $user['acc_lastip'];
            self::$state = $user['acc_state'];
            self::$charlimit = $user['acc_maxchars'];
            self::$lang = ($user['acc_lang'] == 0 ? 'de' : 'us');
            self::$length = self::getKeyFromMeasuresystemString($user['acc_length']);
            self::$weight = self::getKeyFromMeasuresystemString($user['acc_weight']);
            self::$allowed_races = explode(',', $user['acc_racepermission']);
            self::$allowed_applies = explode(',', $user['acc_applypermission']);
            self::$time_offset = ($user['acc_timeoffset'] / 100);
            self::$dst = ($user['acc_dst'] == 1);
            self::$paid = false;
            self::StoreToPostgreSQL();
            self::writeOriginalValues();
         }


		if (!self::IPfine() || self::$state != 3) {
			self::logout();
			return false;
		}
		$_SESSION['data'] = serialize($sessiondata);
		if ($sessiondata['autolog']) {
			setcookie('illarion_hp', serialize($sessiondata), time() + 31536000, '/');
		}else {
			setcookie('illarion_hp', serialize($sessiondata), 0, '/');
		}
	}

	public static final function logout() {
		if (self::$ID == - 1) {
			return false;
		}
		$pgSQL =& Database::getPostgreSQL();
		$pgSQL->setQuery('DELETE FROM homepage.session_keys WHERE ses_user_id = ' . $pgSQL->Quote(self::$ID));
        $pgSQL->query();

		setcookie('illarion_hp', '', time() - 3600, '/');
		session_destroy();
		self::$ID = - 1;
		self::$username = 'guest';
		self::$name = 'guest';
		self::$email = '';
		self::$lastseen = '';
		self::$lastip = '';
		self::$passwd = '';
		self::$state = 3;
		self::$charlimit = 0;
		self::$paid = false;
		self::$length = 0;
		self::$weight = 0;
		self::$time_offset = 1;
		self::$dst = true;
		self::$allowed_races = array(0, 1, 2, 3, 4, 5);
		self::$allowed_applies = array(6, 7, 8);
		self::$clean_pw = '';
		self::$lang = 'de';
		self::$key = '';
		self::$found_rights = array();
		return true;
	}

	public static final function auth($name) 
	{
		if (!self::loggedIn()) {
            return false;
        }
		
		if ($name == 'devserver') { return true; }

		$pgSQL = &Database::getPostgreSQL();

		// rechte_id aus der DN
		$query = "SELECT r_id FROM rights WHERE r_key_name = ".$pgSQL->Quote($name);
		$pgSQL->setQuery($query);
        $r_id = $pgSQL->loadResult();

		// Rechtestring aus den Gruppen des Anwenders
		$query = "SELECT g_rights FROM groups, account_groups WHERE g_id = ag_group_id AND ag_acc_id = ".$pgSQL->Quote(self::$ID);
		$pgSQL->setQuery($query);
        $right_strings = $pgSQL->loadAssocList();

		foreach ($right_strings as $right_string)
		{
			$expl_r_array[] = explode(",", $right_string['g_rights']);
		}
		$acc_rights = array();
		foreach ($expl_r_array as $r_array)
		{
			foreach ($r_array as $right)
			{
				$acc_rights[$right] = $right;
			}
		}

		if (in_array($r_id, $acc_rights))
		{
			return true;
		}
		else
		{
			return false;
		}

		return false;
	}

	public static final function requireLogin() {
		if (!self::loggedIn()) {
			ob_clean();
			define('LOGIN_TARGET_URL', $_SERVER['REQUEST_URI']);
			include Page::getRootPath() . '/community/account/' . Page::getLanguage() . '_login.php';
			exit();
		}
	}
	
	public static final function requireGmStatus() {
		self::requireLogin();
		if (!(self::auth('gmtool_chars') || self::auth('gmtool_accounts') || self::auth('gmtool_raceapplys') || self::auth('gmtool_namecheck') || self::auth('gmtool_gms') || self::auth('gmtool_pages')))
		{	
			ob_clean();
			define('LOGIN_TARGET_URL', $_SERVER['REQUEST_URI']);
			include Page::getRootPath() . '/general/' . Page::getLanguage() . '_startpage.php';
			exit();
		}
	}

	private static final function encrypt_pw() {
		self::$clean_pw = trim(self::$clean_pw);
		if (strlen(self::$clean_pw) > 0) {
			self::$passwd = crypt(stripslashes(self::$clean_pw), '$1$illarion1');
			self::$clean_pw = '';
		}
	}

	public static final function register() {
		if (self::$ID != - 1) {
			return false;
		}
		if (self::$username == 'guest') {
			return false;
		}
		if (strlen(self::$username) < 5) {
			return false;
		}
		if (strlen(self::$username) > 32) {
			return false;
		}
		preg_match('/[A-Za-z0-9-_]+/', self::$username, $check);
		if ($check[0] != self::$username) {
			return false;
		}
		if (self::$name == 'guest') {
			self::$name == self::$username;
		}
		if (!strlen(self::$clean_pw)) {
			return false;
		}
		if (self::$email == '') {
			return false;
		}
		if (!preg_match('/^([a-z0-9]+([-_\.]*[a-z0-9])+)@[a-z0-9äöü]+([-_\.]*[a-z0-9äöü])+\.[a-z]{2,4}$/i', self::$email)) {
			return false;
		}
		$pgSQL = &Database::getPostgreSQL();

		$query = 'SELECT COUNT(*)'
		 . PHP_EOL . ' FROM "accounts"."account"'
		 . PHP_EOL . ' WHERE lower("acc_login") = ' . $pgSQL->Quote(strtolower(self::$username))
		 . PHP_EOL . ' OR "acc_email" = ' . $pgSQL->Quote(self::$email) ;
		$pgSQL->setQuery($query);
		
		if ($pgSQL->loadResult()) {
			return false;
		}
		if (!self::IPfine()) {
			return false;
		}
		
		self::$state = 0;
		self::$charlimit = 5;
		self::$paid = false;
		self::$lastseen = time();
		self::$lastip = $_SERVER['REMOTE_ADDR'];
		self::$lang = $language;

		self::$ID = -1;
		$query = 'SELECT nextval((\'"accounts"."account_seq"\'::text)::regclass);';
		while (self::$ID <= 0 || self::$ID === NUlL) {
			$pgSQL->setQuery($query);
			self::$ID = $pgSQL->loadResult();
		}
		self::StoreToPostgreSQL();

		do {
			$valid_key = md5(rand(0, 100000000) . microtime());
			$pgSQL->setQuery('SELECT COUNT(*) FROM mail_cert WHERE key = ' . $pgSQL->Quote($valid_key) . ' AND type = 0');
		} while ($pgSQL->loadResult());

		$pgSQL->setQuery('INSERT INTO mail_cert VALUES (' . $pgSQL->Quote(self::$ID) . ',' . $pgSQL->Quote($valid_key) . ',0)');
		$pgSQL->query();
		$mail = new PHPMailer();
		$mail->IsMail();
		$mail->IsHTML(false);
		$mail->WordWrap = 80;
		$mail->CharSet = 'utf-8';
		$mail->SetLanguage(Page::getLanguage());
		$mail->AddAddress(self::$email, self::$name);
		$mail->From = 'accounts@illarion.org';
		$mail->FromName = 'Illarion';
		$mail->AddReplyTo('accounts@illarion.org', 'Illarion');

		if (self::german()) {
			$mail->Subject = 'Registrierung bei Illarion';
			$mail->Body = "Grüße " . self::$name . ",\n\nmit dieser E-Mail Adresse wurde eine Registrierung beim Online Rollenspiel "
			 . "Illarion (" . Page::getURL() . ") vorgenommen, die mit folgendem Link nun vervollständigt werden kann:\n\n"
			 . Page::getURL() . "/community/account/de_register.php?activate={$valid_key}\n\nSolltest Du Dich nicht bei Illarion "
			 . "registriert haben, ignoriere diese Mail bitte einfach.\n\nDas Team von Illarion\n" . Page::getURL()
			 . "\n\n\nP.S.: Wir freuen uns über jedes Feedback über Deine ersten Eindrücke im Spiel!";
		}else {
			$mail->Subject = 'Registration at Illarion';
			$mail->Body = "Greetings " . self::$name . ",\n\nwith this email adress a registration at the online RPG Illarion "
			 . "(" . Page::getURL() . ") was done. The registration process can be completed by clicking the following link:\n\n"
			 . Page::getURL() . "/community/account/us_register.php?activate={$valid_key}\n\nIn case you are not the one who "
			 . "registered at Illarion, please ignore this email.\n\nThe team of Illarion\n" . Page::getURL()
			 . "\n\n\nP.S.: We appreciate any feedback concerning your first impressions about the game!";
		}

		if (!$mail->Send()) {
			Messages::add($mail->ErrorInfo, 'error');
		}

		return true;
	}

	public static function activate($key) {
		$key = trim($key);
		if (strlen($key) != 32) {
			return false;
		}

		$db = &Database::getPostgreSQL();
		$db->setQuery('SELECT id FROM mail_cert WHERE key = ' . $db->Quote($key) . ' AND type = 0');
		$id = $db->loadResult();
		if ($id) {
			$db->setQuery('UPDATE account SET acc_state = 3 WHERE acc_id = ' . $db->Quote($id));
			$db->query();
			$db->setQuery('DELETE FROM mail_cert WHERE key = ' . $db->Quote($key) . ' AND type = 0');
			$db->query();
			return true;
		}
		return false;
	}

	private static final function start_session($remember_me) {
		$sessiondata = array();
		$pgSQL =& Database::getPostgreSQL();
        $pgSQL->setQuery('DELETE FROM homepage.session_keys WHERE ses_user_id = ' . $pgSQL->Quote(self::$ID));
        $pgSQL->query();
		do 
		{
            self::$key = md5(rand(0, 100000000) . microtime());
            $pgSQL->setQuery('SELECT COUNT(*) FROM homepage.session_keys WHERE ses_key_id = ' . $pgSQL->Quote(self::$key));
        } 
		while ($pgSQL->loadResult());
        $pgSQL->setQuery('INSERT INTO homepage.session_keys VALUES (' . $pgSQL->Quote(self::$key) . ',' . $pgSQL->Quote(self::$ID) . ',' . $pgSQL->Quote($_SERVER['REMOTE_ADDR']) . ',' . $pgSQL->Quote(time()) . ')');
        $pgSQL->query();
		
		$sessiondata['id'] = self::$ID;
		$sessiondata['key'] = self::$key;
		$sessiondata['autolog'] = $remember_me;
		$_SESSION['data'] = serialize($sessiondata);
		setcookie('illarion_hp', '', time() - 3600, '/');
		if ($remember_me) {
			setcookie('illarion_hp', serialize($sessiondata), time() + 31536000, '/');
		}else {
			setcookie('illarion_hp', serialize($sessiondata), 0, '/');
		}
		$_COOKIE['illarion_hp'] = serialize($sessiondata);
	}

	private static final function writeOriginalValues() {
		self::$original_values = array(
			'ID' => self::$ID,
			'username' => self::$username,
			'name' => self::$name,
			'email' => self::$email,
			'lastseen' => self::$lastseen,
			'lastip' => self::$lastip,
			'passwd' => self::$passwd,
			'state' => self::$state,
			'charlimit' => self::$charlimit,
			'paid' => self::$paid,
			'length' => self::$length,
			'weight' => self::$weight,
			'time_offset' => self::$time_offset,
			'dst' => self::$dst,
			'allowed_races' => implode(',', self::$allowed_races),
			'allowed_applies' => implode(',', self::$allowed_applies),
			'lang' => self::$lang
			);
	}

	public static function save() {
		if (self::$ID == - 1) {
			return false;
		}
		self::StoreToPostgreSQL();
	}

	private static function StoreToPostgreSQL() {
		self::encrypt_pw();
		$db = &Database::getPostgreSQL();
		$db->setQuery('SELECT COUNT(*) FROM "accounts"."account" WHERE "acc_id" = ' . $db->Quote(self::$ID));
		if ($db->loadResult() != 0) {
			$allowed_races = implode(',', array_unique(self::$allowed_races));
            $allowed_applies = implode(',', array_unique(self::$allowed_applies));
			$update_parts = array();
			if (self::$original_values['username'] != self::$username) {
                $update_parts[] = "\"acc_login\" = " . $db->Quote(self::$username);
			} ;
			if (self::$original_values['passwd'] != self::$passwd) {
                $update_parts[] = "\"acc_passwd\" = " . $db->Quote(self::$passwd);
            } ;
			if (self::$original_values['email'] != self::$email) {
                $update_parts[] = "\"acc_email\" = " . $db->Quote(self::$email);
            } ;
			if (self::$original_values['lastip'] != $_SERVER['REMOTE_ADDR']) {
                $update_parts[] = "\"acc_lastip\" = " . $db->Quote($_SERVER['REMOTE_ADDR']);
            } ;
			if (self::$original_values['state'] != self::$state) {
				$update_parts[] = "\"acc_state\" = " . $db->Quote(self::$state);
			} ;
			if (self::$original_values['charlimit'] != self::$charlimit) {
                $update_parts[] = "\"acc_maxchars\" = " . $db->Quote(self::$charlimit);
            } ;
			if (self::$original_values['lang'] != self::$lang) {
                $update_parts[] = "\"acc_lang\" = " . $db->Quote((self::$lang == 'de' ? 0 : 1));
            } ;
			if (self::$original_values['allowed_races'] != $allowed_races) {
				$update_parts[] = "\"acc_racepermission\" = " . $db->Quote($allowed_races);
			} ;
            if (self::$original_values['allowed_applies'] != $allowed_applies) {
                $update_parts[] = "\"acc_applypermission\" = " . $db->Quote($allowed_applies);
            } ;
			if (self::$original_values['name'] != self::$name) {
                $update_parts[] = "\"acc_name\" = " . $db->Quote(self::$name);
            } ;
			if (self::$original_values['length'] != self::$length) {
                $update_parts[] = "\"acc_length\" = " . $db->Quote(self::getMeasuresystemStringFromKey(self::$length));
            } ;
            if (self::$original_values['weight'] != self::$weight) {
                $update_parts[] = "\"acc_weight\" = " . $db->Quote(self::getMeasuresystemStringFromKey(self::$weight));
            } ;
			if (self::$original_values['time_offset'] != self::$time_offset) {
                $update_parts[] = "\"acc_timeoffset\" = " . $db->Quote(self::$time_offset * 100);
            } ;
            if (self::$original_values['dst'] != self::$dst) {
                $update_parts[] = "\"acc_dst\" = " . $db->Quote((self::$dst ? 1 : 0));
            } ;
			if (!count($update_parts)) {
				return;
			}
			$update_parts = implode("\n , ", $update_parts);
			$query = 'UPDATE "accounts"."account"'
			 . PHP_EOL . ' SET ' . $update_parts
			 . PHP_EOL . ' WHERE "acc_id"  = ' . $db->Quote(self::$ID) ;
		}else {
			$query = 'INSERT INTO "accounts"."account"("acc_id","acc_login","acc_passwd","acc_email","acc_registerdate","acc_lastip","acc_state","acc_maxchars","acc_lang","acc_name","acc_length","acc_weight","acc_timeoffset","acc_dst")'
			 . PHP_EOL . ' VALUES(' . $db->Quote(self::$ID) . ',' . $db->Quote(self::$username) . ',' . $db->Quote(self::$passwd) . ',' . $db->Quote(self::$email) . ',\'now()\',' . $db->Quote($_SERVER['REMOTE_ADDR'])
			 . ',' . $db->Quote(self::$state) . ',' . $db->Quote(self::$charlimit) . ',' . $db->Quote((self::$lang == 'de' ? 0 : 1)) . ',' . $db->Quote(self::$name) . ',' . $db->Quote(self::getMeasuresystemStringFromKey(self::$length)) . ',' . $db->Quote(self::getMeasuresystemStringFromKey(self::$weight)) . ',' . $db->Quote(self::$time_offset * 100) . ',' . $db->Quote((self::$dst ? 1 : 0)) . ')' ;
		}
		$db->setQuery($query);
		if (!$db->query()) {
			echo $db->stderr(true);
		}
	}

	private static function IPfine() {
		$db = &Database::getPostgreSQL();
		$query = 'SELECT COUNT(*)'
		 . PHP_EOL . ' FROM bans'
		 . PHP_EOL . ' WHERE ip = ' . $db->Quote(self::encode_ip($_SERVER['REMOTE_ADDR']))
		 . PHP_EOL . ' AND until IS NULL' ;
		$db->setQuery($query);
		if ($db->loadResult()) {
			return false;
		}
		return true;
	}

	public static function loggedIn() {
		return (self::$ID != - 1);
	}

	public static function usesMeter() {
		return (self::$length == 0);
	}

	public static function usesFoot() {
		return (self::$length == 1);
	}

	public static function usesGram() {
		return (self::$weight == 0);
	}

	public static function usesPound() {
		return (self::$weight == 1);
	}

	public static function german() {
		return (self::$lang == 'de');
	}

	public static function english() {
		return (self::$lang == 'us');
	}

	private static function encode_ip($dotquad_ip) {
		$ip_sep = explode('.', $dotquad_ip);
		return sprintf('%02x%02x%02x%02x', $ip_sep[0], $ip_sep[1], $ip_sep[2], $ip_sep[3]);
	}

	private static function decode_ip($int_ip) {
		$hexipbang = explode('.', chunk_split($int_ip, 2, '.'));
		return hexdec($hexipbang[0]) . '.' . hexdec($hexipbang[1]) . '.' . hexdec($hexipbang[2]) . '.' . hexdec($hexipbang[3]);
	}

	private static function getMeasuresystemStringFromKey($key)
	{
		if ($key == 1)
		{
			return "imperial";
		}
		return "metric";
	}

	private static function getKeyFromMeasuresystemString($string)
    {
        if ($string == "imperial")
        {
            return "1";
        }
        return "0";
    }

}

?>
