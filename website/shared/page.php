<?php
/**
* Static main class for building the default page framework of the Illarion Homepage
*
* @version $Id: page.php 3820 2008-11-02 16:23:39Z nitram $
* @copyright Copyright (C) 1997 - 2008 Illarion e.V. All rights reserved.
* @author Martin Karing <nitram@illarion.org>
*/

class Page {
	/**
	* The non-ssl default url of the page
	*
	* @const string
	*/
	static private $url;

	/**
	* The non-ssl default url of the images
	*
	* @const string
	*/
	static private $image_url;

	/**
	* The non-ssl default url of the images
	*
	* @const string
	*/
	static private $ssl_image_url;

	/**
	* The non-ssl default url of the static media
	*
	* @const string
	*/
	static private $media_url;

	/**
	* The ssl default url of the static media
	*
	* @const string
	*/
	static private $ssl_media_url;

	/**
	* The default non-ssl port of the page
	*
	* @const int
	*/
	const port = 80;

	/**
	* The ssl default url of the page
	*
	* @const string
	*/
	static private $ssl_url;

	/**
	* The default ssl port of the page
	*
	* @const int
	*/
	const ssl_port = 443;

	/**
	* The non-ssl default hardware path of the page
	*/
	static private $base_path;

	/**
	* The non-ssl default hardware path of the images
	*/
	static private $base_images_path;

	/**
	* The non-ssl default hardware path of the static media
	*/
	static private $base_media_path;

	/**
	* The ssl default hardware path of the page
	*/
	static private $base_ssl_path;

    static function initPaths() {
		Page::$url = 'https://' . $_SERVER['SERVER_NAME'];
		Page::$image_url = Page::$url . '/shared/pics';
		Page::$media_url = Page::$url . '/media';
		
		Page::$ssl_url = 'https://' . $_SERVER['SERVER_NAME'];
		Page::$ssl_image_url = Page::$ssl_url . '/shared/pics';
		Page::$ssl_media_url = Page::$ssl_url . '/media';
		
        Page::$base_path = '/var/www/illarion/website';
        Page::$base_images_path = Page::$base_path . '/shared/pics';
        Page::$base_media_path = Page::$base_path . '/media';
        Page::$base_ssl_path = Page::$base_path . '/ssl';
    }
	/**
	* Status of the Illarion Server
	* 0 = online
	* 1 = offline
	*
	* @access private
	* @var int
	*/
	static private $serverstatus = 0;
	
	/**
	* Status of the Illarion Testserver
	* 0 = online
	* 1 = offline
	*
	* @access private
	* @var int
	*/
	static private $testserverstatus = 0;

	/**
	* Debugger usage
	* 0 = no debugger
	* 1 = GDB debugger
	* 2 = Valgrind debugger
	*
	* @access private
	* @var int
	*/
	static private $debugger = 0;

	/**
	* Language of the viewed page
	*
	* @access private
	* @var string
	*/
	static private $language = 'us';

	/**
	* Amount of currently logged in characters
	*
	* @access private
	* @var int
	*/
	static private $playercount = 0;

	/**
	* The generated buffered page HTML Code
	*
	* @access private
	* @var string
	*/
	static private $html = '';

	/**
	* The title of the generated page
	*
	* @access private
	* @var string
	*/
	static private $page_title = 'Illarion';

	/**
	* The description of the generated page
	*
	* @access private
	* @var string
	*/
	static private $page_description = '';

	/**
	* Additional keywords for the page
	*
	* @access private
	* @var array
	*/
	static private $page_keywords = array();

	/**
	* The used CSS Stylesheets
	*
	* @access private
	* @var array
	*/
	static private $css = array();

	/**
	* The used JavaScript files
	*
	* @access private
	* @var array
	*/
	static private $js = array();

	/**
	* The used additional headers
	*
	* @access private
	* @var array
	*/
	static private $additional_headers = array();

	/**
	* Type of the page
	* 0 = HTML
	* 1 = XHTML
	* 2 = XML
	*
	* @access private
	* @var int
	*/
	static private $page_type = 0;

	/**
	* In case its a XML file this variable holds null or the content type
	*
	* @access private
	* @var string
	*/
	static private $xml_content_type = null;

	/**
	* The browser of the user accessing the page
	*
	* @access private
	* @var string
	*/
	static private $browser_name = '';

	/**
	* The version of the browser of the user accessing the page
	*
	* @access private
	* @var float
	*/
	static private $browser_version = 0.0;

	/**
	* Debug Errormessages
	*
	* @access private
	* @var array
	*/
	static private $errors = array();

	/**
	* Start time of the page parsing
	*
	* @access private
	* @var int
	*/
	static private $debug_time = 0;

	/**
	* The first page of a guided tour page list
	*
	* @access private
	* @var string
	*/
	static private $first_page = '';

	/**
	* The previous page of a guided tour page list
	*
	* @access private
	* @var string
	*/
	static private $prev_page = '';

	/**
	* The next page of a guided tour page list
	*
	* @access private
	* @var string
	*/
	static private $next_page = '';

	/**
	* The last page of a guided tour page list
	*
	* @access private
	* @var string
	*/
	static private $last_page = '';

	/**
	* Array of the headers the page was requested with
	*
	* @access private
	* @var array
	*/
	static private $request_headers = array();
	
	/**
	* Array of the piwik goals that should be tracked once this page is done loading.
	*
	* @access private
	* @var array
	*/
	static private $track_goals = array();

	/**
	* Returns the normal URL of the page
	*
	* @access public
	* @return string
	*/
	static public function getURL() {
		return self::$url;
	}
	
	/**
	* Return the current URL based on the protocol used. In case the current
	* page is in the https space, its return the secure URL, else it returns
	* the normal URL.
	*
	* @access public
	* @return string
	*/
	static public function getCurrentURL() {
		if (self::checkSSL()) {
			return self::getSecureURL();
		} else {
			return self::getURL();
		}
	}

	/**
	* Returns the image URL of the page
	*
	* @access public
	* @return string
	*/
	static public function getImageURL() {
		return self::$image_url;
	}
	
	/**
	* Return the current image URL based on the protocol used. In case the
	* current page is in the https space, its return the secure image URL, else
	* it returns the normal image URL.
	*
	* @access public
	* @return string
	*/
	static public function getCurrentImageURL() {
		if (self::checkSSL()) {
			return self::getSecureImageURL();
		} else {
			return self::getImageURL();
		}
	}

	/**
	* Returns the static media URL of the page
	*
	* @access public
	* @return string
	*/
	static public function getMediaURL() {
		if (self::checkSSL()) {
			return self::$media_url;
		} else {
			return self::$ssl_media_url;
		}
	}

	/**
	* Returns to ssl URL of the page
	*
	* @access public
	* @return string
	*/
	static public function getSecureURL() {
		return self::$ssl_url;
	}
	
	/**
	* Returns the ssl image URL of the page
	*
	* @access public
	* @return string
	*/
	static public function getSecureImageURL() {
		return self::$ssl_image_url;
	}

	/**
	* Returns the normal port of the page
	*
	* @access public
	* @return int
	*/
	static public function getPort() {
		return self::port;
	}

	/**
	* Returns the ssl port of the page
	*
	* @access public
	* @return iint
	*/
	static public function getSecurePort() {
		return self::ssl_port;
	}

	/**
	* Returns the root path to the page
	*
	* @access public
	* @return string
	*/
	static public function getRootPath() {
		return Page::$base_path;
	}

	/**
	* Returns the root path to the images
	*
	* @access public
	* @return string
	*/
	static public function getImageRootPath() {
		return Page::$base_images_path;
	}

	/**
	* Returns the root path to the static media
	*
	* @access public
	* @return string
	*/
	static public function getMediaRootPath() {
		return Page::$base_media_path;
	}

	/**
	* Returns the ssl root path to the page
	*
	* @access public
	* @return string
	*/
	static public function getSecureRootPath() {
		return Page::$base_ssl_path;
	}
	
	static public function isLocalServer() {
		return self::getURL() == "http://127.0.0.1" || self::getURL() == "http://localhost" || self::getURL() == "http://illarion.local";
	}

	/**
	* Returns a indicator for the page language
	*
	* @access public
	* @return string
	*/
	static public function getLanguage() {
		return self::$language;
	}

	/**
	* Changes the language forcefully
	*
	* @access public
	* @param string $new_lang the new language (us or de)
	*/
	static public function setLanguage($new_lang) {
		self::$language = ($new_lang == 'de' ? 'de' : 'us');
	}

	/**
	* Returns true if the page is german
	*
	* @access public
	* @return boolean
	*/
	static public function isGerman() {
		return (self::$language === 'de');
	}

	/**
	* Returns true if the page is english
	*
	* @access public
	* @return boolean
	*/
	static public function isEnglish() {
		return (self::$language === 'us');
	}

	/**
	* returns the name of the browser the user uses
	*
	* @access public
	* @return string
	*/
	static public function getBrowserName() {
		return (string)self::$browser_name;
	}

	/**
	* returns the version of the browser the user uses or null
	*
	* @access public
	* @return float
	*/
	static public function getBrowserVersion() {
		return (is_null(self::$browser_version) ? null : (float)self::$browser_version);
	}

	/**
	* Set the title of the page
	*
	* @access public
	* @param mixed $new_title The new title or a arry of new titles
	*/
	static public function setTitle($new_title) {
		if (is_array($new_title)) {
			$new_title = implode(' • ', $new_title);
		}
		self::$page_title = 'Illarion • ' . $new_title;
	}

	/**
	* Returns the title of the page
	*
	* @access public
	* @return string
	*/
	static public function getTitle() {
		return self::$page_title;
	}

	/**
	* Set the description of the page
	*
	* @access public
	* @param string $new_description The new description
	*/
	static public function setDescription($new_description) {
		self::$page_description = (string)$new_description;
	}

	/**
	* Returns the description of the page
	*
	* @access public
	* @return string
	*/
	static public function getDescription() {
		return self::$page_description;
	}

	/**
	* Set the additional keywords of the page
	*
	* @access public
	* @param mixed $new_keywords The new keywords as array or csv
	*/
	static public function setKeywords($new_keywords) {
		if (is_string($new_keywords)) {
			$new_keywords = explode(',', $new_keywords);
			foreach($new_keywords as &$keyword) {
				$keyword = trim($keyword);
			}
		}
		self::$page_keywords = (array)$new_keywords;
	}

	/**
	* Add a additional keyword to the page
	*
	* @access public
	* @param string $new_keyword The keyword that shall be added
	*/
	static public function addKeyword($new_keyword) {
		self::$page_keywords[] = (string)trim($new_keyword);
	}

	/**
	* Returns the keywords of the page
	*
	* @access public
	* @return array
	*/
	static public function getKeywords() {
		return self::$page_keywords;
	}
	
	/**
	* Add a goal that is supposed to be tracked with piwik.
	*
	* @access public
	* @param int $goal the goal that is supposed to be tracked
	*/
	static public function addPiwikGoal($goal) {
		self::$track_goals[] = (int)$goal;
	}
	
	/**
	* Check if the connection is currently using the secured port.
	*
	* @access public
	* @return boolean
	*/
	static public function checkSSL() {
		return ($_SERVER['SERVER_PORT'] == self::ssl_port);
	}

	/**
	* Set the additional css files of the page
	*
	* @access public
	* @param mixed $new_css The new css files as array or csv
	*/
	static public function setCSS($new_css) {
		if (is_string($new_css)) {
			$new_css = explode(',', $new_css);
			foreach($new_css as &$css) {
				$css = trim($css);
			}
		}
		self::$css = (array)$new_css;
	}

	/**
	* Add a additional css file to the page
	*
	* @access public
	* @param mixed $new_css The css file that shall be added
	*/
	static public function addCSS($new_css) {
		if (is_array($new_css)) {
			self::$css = array_merge(self::$css, $new_css);
			return null;
		}
		self::$css[] = (string)trim($new_css);
	}

	/**
	* Returns the used css files of the page
	*
	* @access public
	* @return array
	*/
	static public function getCSS() {
		return self::$css;
	}

	/**
	* Set the additional js files of the page
	*
	* @access public
	* @param mixed $new_js The new js files as array or csv
	*/
	static public function setJavaScript($new_js) {
		if (is_string($new_js)) {
			$new_js = explode(',', $new_js);
			foreach($new_js as &$js) {
				$js = trim($js);
			}
		}
		self::$js = (array)$new_js;
	}

	/**
	* Add a additional js file to the page
	*
	* @access public
	* @param string|array $new_js The js file that shall be added
	*/
	static public function addJavaScript($new_js) {
		if (is_array($new_js)) {
            self::$js = array_merge(self::$js, $new_js);
        } else {
            self::$js[] = (string)trim($new_js);
        }
	}

	/**
	* Returns the used js files of the page
	*
	* @access public
	* @return array
	*/
	static public function getJavaScript() {
		return self::$js;
	}

	/**
	* Set the additional headers of the page
	*
	* @access public
	* @param mixed $new_header The new aditional headers as array or string
	*/
	static public function setAdditionalHeader($new_header) {
		if (is_string($new_header)) {
			self::$additional_headers = array($new_header);
		}
		self::$additional_headers = (array)$new_header;
	}

	/**
	* Add a additional headers to the page
	*
	* @access public
	* @param string $new_header The aditional header that shall be added
	*/
	static public function addAdditionalHeader($new_header) {
		if (is_array($new_header)) {
			self::$additional_headers = array_merge(self::$additional_headers, $new_header);
		} else {
            self::$additional_headers[] = (string)trim($new_header);
        }
	}

	/**
	* Returns the used aditional headers of the page
	*
	* @access public
	* @return array
	*/
	static public function getAdditionalHeader() {
		return self::$additional_headers;
	}

	/**
	* Set the first page of a guided page list
	* Used for the navigations
	*
	* @access public
	* @param string $new_page The full link of the first page in the list
	*/
	static public function setFirstPage($new_page) {
		self::$first_page = (string)$new_page;
	}

	/**
	* Get the first page of a guided page list
	* Used for the navigations
	*
	* @access public
	* @return string
	*/
	static public function getFirstPage() {
		return self::$first_page;
	}

	/**
	* Set the previous page of a guided page list
	* Used for the navigations
	*
	* @access public
	* @param string $new_page The full link of the previous page in the list
	*/
	static public function setPrevPage($new_page) {
		self::$prev_page = (string)$new_page;
	}

	/**
	* Get the previous page of a guided page list
	* Used for the navigations
	*
	* @access public
	* @return string
	*/
	static public function getPrevPage() {
		return self::$prev_page;
	}

	/**
	* Set the next page of a guided page list
	* Used for the navigations
	*
	* @access public
	* @param string $new_page The full link of the next page in the list
	*/
	static public function setNextPage($new_page) {
		self::$next_page = (string)$new_page;
	}

	/**
	* Get the next page of a guided page list
	* Used for the navigations
	*
	* @access public
	* @return string
	*/
	static public function getNextPage() {
		return self::$next_page;
	}

	/**
	* Set the last page of a guided page list
	* Used for the navigations
	*
	* @access public
	* @param string $new_page The full link of the last page in the list
	*/
	static public function setLastPage($new_page) {
		self::$last_page = (string)$new_page;
	}

	/**
	* Get the last page of a guided page list
	* Used for the navigations
	*
	* @access public
	* @return string
	*/
	static public function getLastPage() {
		return self::$last_page;
	}

	/**
	* Set the page to HTML mode
	*
	* @access public
	*/
	static public function setHTML() {
		self::$page_type = 0;
	}

	/**
	* Returns if the page is a HTML page or not
	*
	* @access public
	* @return boolean
	*/
	static public function isHTML() {
		return (self::$page_type === 0);
	}

	/**
	* Set the page to xHTML mode
	*
	* @access public
	*/
	static public function setXHTML() {
		self::$page_type = 0;
		
		if (!self::canXHTML()) {
			return null;
		}
		
		self::$page_type = 1;
	}
	
	/**
	* Check if the browser supports the xHTML mode of the homepage
	*
	* @return true in case the the xHTML mode can be activated
	* @access public
	*/
	static public function canXHTML() {
		if (isset($_SERVER['HTTP_ACCEPT']) && !stristr($_SERVER['HTTP_ACCEPT'], 'application/xhtml+xml')) {
			return false;
		}
		
		if (self::getBrowserName() == 'msie' && self::getBrowserVersion() <= 7) {
			return false;
		}
		
		if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] != $_SERVER['REMOTE_ADDR']) {
			return false;
		}
		
		return true;
	}

	/**
	* Returns if the page is a xHTML page or not
	*
	* @access public
	* @return boolean
	*/
	static public function isXHTML() {
		return (self::$page_type === 1);
	}

	/**
	* Set the page to XML mode
	*
	* @access public
	* @param string $content_type the content type of the XML document
	*/
	static public function setXML($content_type = null) {
		self::$page_type = 2;
		if (!is_null($content_type)) {
			self::$xml_content_type = $content_type;
		}
	}

	/**
	* Returns if the page is a XML page or not
	*
	* @access public
	* @return boolean
	*/
	static public function isXML() {
		return (self::$page_type === 2);
	}

	/**
	* Returns the current state of the debugger
	* 0 = no debugger
	* 1 = GDB
	* 2 = Valgrind
	*
	* @access public
	* @return int
	*/
	static public function getDebugger() {
		return (int)self::$debugger;
	}

	/**
	* Returns the current state of the server
	* 1 = Server offline
	* 0 = Server online
	*
	* @access public
	* @return int
	*/
	static public function getServerStatus() {
		return (int)self::$serverstatus;
	}

	/**
	* Return the count of currently online players
	*
	* @access public
	* @return int
	*/
	static public function getPlayerCount() {
		return (int)self::$playercount;
	}

	/**
	* Sets up the very first values for the homepage enviroment. This function is
	* called automatically at startup
	*
	* @access public
	*/
	static public function Boot() {
		// Get the time of the start of page parsing
		// Required for Debug reasons
		// Replaced by xdebug functions
		// self::$debug_time = microtime( true );
		// Setting up the error handler - first thing to do
		set_error_handler(array('Page', 'errorHandler'));

		self::CheckCorrectHost();
		self::$request_headers = apache_request_headers();
		self::DetectLanguage();
		self::DetectBrowser();
		mb_internal_encoding('UTF-8');
		if (self::isGerman()) {
			setlocale(LC_ALL, 'de_DE.UTF-8');
		}else {
			setlocale(LC_ALL, 'en_US.UTF-8');
		}

		IllaUser::init();

		if ((defined('NO_DEBUG') || !IllaUser::auth('errors')) && !isset($_GET['FORCE_ERROR_OUTPUT'])) {
			if (function_exists('xdebug_disable')) {
				xdebug_disable();
			}
		} else {
			ini_set('xdebug.collect_params', '4');
			ini_set('xdebug.collect_vars', 'on');
			ini_set('xdebug.collect_params', '4');
			ini_set('xdebug.dump_globals', 'on');
			ini_set('xdebug.dump.SERVER', 'REQUEST_URI,REQUEST_METHOD');
			ini_set('xdebug.show_local_vars', 'on');
		}
	}

	/**
	* Prepares the main page and loads up everything related to the given values
	*
	* @access public
	*/
	static public function Init() {
		if (defined('PAGE_INIT_DONE')) {
			return null;
		}
		define('PAGE_INIT_DONE', true);
		self::ServerState();
		self::PlayerCount();

		ob_start();
		register_shutdown_function(array('Page', 'Output'));

		self::CreateLanguageMessage();
		self::CreateBrowserMessage();
		self::CreateHeaderMessage();

		self::PerformAction();
	}

	/**
	* Detects the server and the debugger state.
	*
	* @access private
	*/
	static private function ServerState() {
        $status = exec('sudo systemctl status illarion');
        if (strpos($status, 'active (running)') === FALSE) {
			self::$serverstatus = 1;
		} else {
			self::$serverstatus = 0;
		}

        $status = exec('testctl status');
		if (strpos($status, 'ONLINE') === FALSE) {
			self::$testserverstatus = 1;
		} else {
			self::$testserverstatus = 0;
		}

		self::$debugger = 0;
	}

	/**
	* Read the current amount of players from the database
	*
	* @access private
	*/
	static public function PlayerCount() {
		if (self::$serverstatus == 1) {
			self::$playercount = 0;
			return null;
		}

		$db = &Database::getPostgreSQL('illarionserver');
		$db->setQuery('SELECT COUNT(*) FROM onlineplayer', 0, 1);
		self::$playercount = $db->loadResult();
		return null;
	}
	
	static private function getOpenTestserverIssues() {
		$db = Database::getPostgreSQL();
		$query = 'SELECT COUNT(*)'
		.PHP_EOL.'FROM "mantis"."mantis_bug_table"'
		.PHP_EOL.'INNER JOIN "mantis"."mantis_bug_tag_table" ON "mantis_bug_table"."id" = "mantis_bug_tag_table"."bug_id"'
		.PHP_EOL.'WHERE "mantis_bug_table"."status" < 80 AND "mantis_bug_tag_table"."tag_id" = 31';
		$db->setQuery($query, 0, 1);
		return $db->loadResult();
	}

	/**
	* Detects the language of the current page
	*
	* @access private
	*/
	static private function DetectLanguage() {
		self::$language = substr(basename($_SERVER['REQUEST_URI']), 0, 2);
		if (self::$language != 'de' && self::$language != 'us') {
			self::$language = 'us';
		}
	}

	/**
	* Detects the browser accessing the page
	*
	* @access private
	*/
	static private function DetectBrowser() {
		$userAgent = strtolower(self::$request_headers['User-Agent']);
		// Identify the browser. Check Opera and Safari first in case of spoof. Let Google Chrome be identified as Safari.
		if (stripos($userAgent, 'opera') !== false) {
			self::$browser_name = 'opera';
		} elseif (stripos($userAgent, 'webkit') !== false) {
			self::$browser_name = 'safari';
		} elseif (stripos($userAgent, 'msie') !== false) {
			self::$browser_name = 'msie';
		} elseif (stripos($userAgent, 'mozilla') !== false && strpos($userAgent, 'compatible') === false) {
			self::$browser_name = 'mozilla';
		}else {
			self::$browser_name = 'unrecognized';
		}
		// What version?
		if (preg_match('/.+(?:rv|it|ra|ie)[\/: ]([\d.]+)/', $userAgent, $matches)) {
			self::$browser_version = (float)$matches[1];
		}else {
			self::$browser_version = null;
		}
	}

	/**
	* Detects of the used host is correct and changes it if needed
	*
	* @access private
	*/
	static private function CheckCorrectHost() {
		if (count($_POST) > 0) {
			return;
		}
		$correct_host = str_replace('https://', '', self::getURL());

		if ($_SERVER["SERVER_NAME"] !== $correct_host) {
			self::redirect(self::getCurrentURL() . $_SERVER["REQUEST_URI"]);
		}
	}

	/**
	* Perform action requests
	*
	* @access private
	*/
	static private function PerformAction() {
		if (!isset($_POST['action'])) {
			return null;
		}
		switch ($_POST['action']) {
			case 'login':
				if (!IllaUser::login($_POST['login_name'], $_POST['login_pw'], ($_POST['login_remember'] == 'remember'))) {
					self::redirect(self::getURL() . '/community/account/' . self::$language . '_login.php?error=1&target=' . rawurlencode($_SERVER['REQUEST_URI']));
				} else {
					if (defined("LOGIN_TARGET_URL")) {
						self::redirect(LOGIN_TARGET_URL);
					} else {
						self::redirect(self::getURL() . '/community/account/' . self::$language . '_charlist.php');
					}
                }
				break;
			case 'logout': IllaUser::logout();
				break;
			default:
				if (is_file('act_' . $_POST['action'] . '.php')) {
					includeWrapper::includeOnce('act_' . $_POST['action'] . '.php');
				}
		}
	}

	/**
	* Creates a message in case the user language and the current page language do not fit
	*
	* @access private
	*/
	static private function CreateLanguageMessage() {
		if (!IllaUser::loggedIn()) {
			$german_browser = (preg_match('/de/', $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? '') ? true : false);
		}else {
			$german_browser = IllaUser::german();
		}
		if (($german_browser && self::isEnglish()) || (!$german_browser && self::isGerman())) {
			$short_filename = substr_replace(basename($_SERVER['PHP_SELF']), '', 0, 2);
			$path = str_replace($short_filename, '', $_SERVER['PHP_SELF']);
			$path = substr_replace($path, '', - 2, 2);

			if (count($_GET) > 0) {
				$getparams = array();
				foreach ($_GET as $key => $value) {
					$getparams[] = htmlentities($key) . '=' . htmlentities($value);
				}
				$getparams = '?' . implode('&amp;', $getparams);
			}else {
				$getparams = '';
			}

			if (self::isEnglish() && file_exists('de' . $short_filename)) {
				Messages::add('<a href="' . $path . 'de' . $short_filename . $getparams . '" hreflang="de">Deine bevorzugte Sprache scheint Deutsch zu sein. Klick hier um zur deutschen Fassung dieser Seite zu wechseln.</a>', 'note');
				Messages::add('<a href="' . $path . 'de' . $short_filename . $getparams . '" hreflang="de">Your favoured language seems to be German. Click here to view the German version of this page.</a>', 'note');
			} elseif (self::isGerman() && file_exists('us' . $short_filename)) {
				Messages::add('<a href="' . $path . 'us' . $short_filename . $getparams . '" hreflang="us">Deine bevorzugte Sprache scheint Englisch zu sein. Klick hier um zur englischen Fassung dieser Seite zu wechseln.</a>', 'note');
				Messages::add('<a href="' . $path . 'us' . $short_filename . $getparams . '" hreflang="us">Your favoured language seems to be English. Click here to view the English version of this page.</a>', 'note');
			}
		}
	}

	/**
	* Creates a message in case the user uses a browser that is not supported
	*
	* @access private
	*/
	static private function CreateBrowserMessage() {
		if (self::$browser_name === 'msie' && self::$browser_version <= 6) {
			if (self::isGerman()) {
				Messages::add('Der von dir verwendete Browser ist sehr alt und wird vermutlich nicht alle Seiten dieser Homepage problemlos anzeigen können.', 'note');
			}else {
				Messages::add('The browser used by you is very old and is maybe not able to show all pages of this homepage.', 'note');
			}
		}
	}

	/**
	* Creates a message depending on some special headers send
	*
	* @access private
	*/
	static private function CreateHeaderMessage() {
		if (isset($_SESSION['message'])) {
			$type = (string)$_SESSION['message-type'];
			if ($type == 'note' || $type == 'error' || $type == 'info') {
				Messages::add((string)$_SESSION['message'], $type);
			}
            unset($_SESSION['message']);
            unset($_SESSION['message-type']);
		}
	}

	/**
	* Create a default go to top link
	*
	* @access public
	* @return string
	*/
	static public function go_to_top_link() {
		$text = (self::$language === 'de' ? 'nach oben' : 'top');
		return '<p class="center">' . PHP_EOL
		 . '	<a href="#top"><img alt="' . $text . '" title="' . $text . '" class="arrow_up {PNGCSS}" src="{IMAGE_URL}/arrow_up.png" width="15" height="22" /></a>' . PHP_EOL
		 . '</p>' . PHP_EOL ;
	}

	/**
	* Echo a default go to top link
	*
	* @access public
	*/
	static public function insert_go_to_top_link() {
		echo self::go_to_top_link();
	}

	/**
	* Return or echo a link for a graphical first letter
	*
	* @access public
	* @param string $org_cap the letter
	* @param boolean $return return the letter or echo it
	* @return mixed
	*/
	static public function cap($org_cap, $return = false) {
		$cap = strtolower($org_cap);
		if (!preg_match('/[a-z]{1}/', $cap)) {
			return $org_cap;
		}

		$hardware_path = Page::$base_images_path . '/caps/' . $cap . '.png';
		$software_path = '{IMAGE_URL}/caps/' . $cap . '.png';
		if (!is_file($hardware_path)) {
			return $org_cap;
		}
		$img_size = getimagesize($hardware_path);
		$padding_top = 9;
		$padding_bottom = 0;

		$padding_left = ceil((69 - $img_size[0]) / 2);
		$padding_right = floor((69 - $img_size[0]) / 2);

		$output = '<img class="float_left {PNGCSS}" src="' . $software_path . '" title="' . $org_cap . '" style="padding:' . $padding_top . 'px ' . $padding_right . 'px ' . $padding_bottom . 'px ' . $padding_left . 'px;" ' . $img_size[3] . ' alt="' . $org_cap . '" />';
		if ($return) {
			return $output;
		}
		echo $output;
	}

    /**
     * Redirect the user to another page and shut the script execution down
     *
     * @param string $target the url of the target page
     * @param string $message the message that is supposed to be displayed
     * @param string $message_type The type of the message that shall show up (info, error, note)
     * @access public
     */
	static public function redirect($target, $message = null, $message_type = 'info') {
        ob_clean();

		if (!defined('NO_OUTPUT')) {
			define('NO_OUTPUT', 1);
		}
		if (!is_null($message)) {
			if ($message_type === 'info' || $message_type === 'error' || $message_type === 'note') {
                $_SESSION['message'] = $message;
                $_SESSION['message-type'] = $message_type;
			}
		}
		header('Location: ' . $target);
		exit();
	}

    /**
     * Get the URL to a file that is inside the document root.
     *
     * @param string $file the file
     * @return string the URL to the file
     * @throws InvalidArgumentException in case the file is outside of the document root
     */
    static public function getUrlToFile($file) {
        $docRoot = realpath($_SERVER['DOCUMENT_ROOT']);
        $docRootLen = strlen($docRoot);
        if (strncmp($file, $docRoot, $docRootLen)) {
            throw new InvalidArgumentException("The file $file is not inside the document root {$_SERVER['DOCUMENT_ROOT']}.");
        }

        $relativePath = substr($file, $docRootLen);
        if (strncmp($file, '/ssl', 4)) {
            return Page::getCurrentURL() . $relativePath;
        }
        return Page::getSecureURL() . substr($relativePath, 4);
    }

	/**
	* Creates the page template and put all received data out
	*
	* @access private
	*/
	static public function Output() {
		if (defined('NO_OUTPUT')) {
			ob_end_clean();
			exit();
		}
		$content = ob_get_clean();

		if (self::$page_type === 2) {
			$output = '<?xml version="1.0" encoding="utf-8"?>';
			if (self::$xml_content_type == 'application/rss+xml') {
				/* Replace the hard html spaces with text ones. Those work better in RSS. */
				$content = str_replace('&nbsp;', ' ', $content);
			}
			$output .= $content;

			self::optimizeOutput($output);
		}else {
			$output = file_get_contents(Page::$base_path . '/shared/template.xhtml');
			$search_keywords = array();
			$search_replace = array();
			$search_cnt = - 1;

			preg_match_all('/{AUTH\|([a-z_]+)}(.+){\/AUTH}/', $output, $auth_matches);
			$cnt_matches = count($auth_matches[0]);
			if ($cnt_matches > 0) {
				for($i = 0; $i < $cnt_matches; ++$i) {
					$search_keywords[++$search_cnt] = $auth_matches[0][$i];
					if (IllaUser::auth($auth_matches[1][$i])) {
						$search_replace[$search_cnt] = $auth_matches[2][$i];
					}else {
						$search_replace[$search_cnt] = '';
					}
				}
			}
			
			preg_match_all('/{HTTP_ONLY}(.+){\/HTTP_ONLY}/', $output, $http_only_matches);
			$cnt_matches = count($http_only_matches[0]);
			if ($cnt_matches > 0) {
				for($i = 0; $i < $cnt_matches; ++$i) {
					$search_keywords[++$search_cnt] = $http_only_matches[0][$i];
					if (self::checkSSL()) {
						$search_replace[$search_cnt] = '';
					} else {
						$search_replace[$search_cnt] = $http_only_matches[1][$i];
					}
				}
			}
			
			preg_match_all('/{HTTPS_ONLY}(.+){\/HTTPS_ONLY}/', $output, $https_only_matches);
			$cnt_matches = count($https_only_matches[0]);
			if ($cnt_matches > 0) {
				for($i = 0; $i < $cnt_matches; ++$i) {
					$search_keywords[++$search_cnt] = $https_only_matches[0][$i];
					if (self::checkSSL()) {
						$search_replace[$search_cnt] = $https_only_matches[1][$i];
					} else {
						$search_replace[$search_cnt] = '';
					}
				}
			}

			$search_keywords[++$search_cnt] = '{CONTENT}';
			$search_replace[$search_cnt] = $content;
			$search_keywords[++$search_cnt] = '{PAGE_TITLE}';
			$search_replace[$search_cnt] = str_replace('"', '&quot;', self::$page_title);
			$search_keywords[++$search_cnt] = '{DESCRIPTION}';
			$search_replace[$search_cnt] = str_replace('"', '&quot;', self::$page_description);
			if (self::$language === 'de') {
				$keywords = array_merge(self::$page_keywords, array('Rollenspiel', 'echtes Rollenspiel', 'kostenloses MUD', 'kostenloses Rollenspiel', 'kostenloses RPG'));
			}else {
				$keywords = array_merge(self::$page_keywords, array('Roleplay game', 'real roleplay game', 'free mud', 'free roleplay game', 'free RPG'));
			}
			$search_keywords[++$search_cnt] = '{KEYWORDS}';
			$search_replace[$search_cnt] = str_replace('"', '&quot;', implode(',', array_unique($keywords)));

			$filelist = get_included_files();
			$last_mod = array(filemtime(Page::$base_path . '/shared/template.xhtml'));
			foreach($filelist as $file) {
				if (is_file($file)) {
					$last_mod[] = filemtime($file);
				}
			}
			rsort($last_mod);
			$search_keywords[++$search_cnt] = '{LAST_MODIFIED}';
			$search_replace[$search_cnt] = date('Y-m-d', $last_mod[0]);
			$search_keywords[++$search_cnt] = '{META_RIGHTS}';
			$search_replace[$search_cnt] = (self::$language === 'de' ? 'Copyright bei illarion.org' : 'Copyright by illarion.org');
			$search_keywords[++$search_cnt] = '{CONTENT_TYPE}';
			$search_replace[$search_cnt] = (self::$page_type === 1 ? 'application/xhtml+xml' : 'text/html');
			$search_keywords[++$search_cnt] = '{META_DC_LANGUAGE_FREETEXT}';
			$search_replace[$search_cnt] = '(Scheme=Freetext) ' . (self::isGerman() ? 'Deutsch' : 'English');
			$search_keywords[++$search_cnt] = '{META_DC_LANGUAGE_ISO}';
			$search_replace[$search_cnt] = '(Scheme=ISO.639) ' . (self::isGerman() ? 'de' : 'en');
			$search_keywords[++$search_cnt] = '{META_DC_LAND}';
			$search_replace[$search_cnt] = (self::$language === 'de' ? 'Deutschland' : 'Germany');
			$search_keywords[++$search_cnt] = '{META_DC_TIME}';
			$search_replace[$search_cnt] = (self::$language === 'de' ? 'Gegenwart' : 'present');
			$search_keywords[++$search_cnt] = '{CURRENT_YEAR}';
			$search_replace[$search_cnt] = date('Y');
			$search_keywords[++$search_cnt] = '{CURRENT_URI}';
			$search_replace[$search_cnt] = str_replace('&', '&amp;', htmlentities($_SERVER['REQUEST_URI']));
			
			$search_keywords[++$search_cnt] = '{GOOGLE}';
			if (self::isHTML() || (self::$browser_name === 'msie' && self::$browser_version == 8)) {
				$search_replace[$search_cnt] = '<div class="g-plusone"></div>';
			} else {
				$search_replace[$search_cnt] = '<object data="'.self::getURL().'/shared/'.self::$language.'_google.html" type="text/html" width="68px" height="24px">Google +1 button</object>';
			}

			$css = &self::$css;

			if (self::$browser_name === 'msie' && self::$browser_version <= 6) {
				array_unshift($css, 'ieonly');
			} elseif (self::$browser_name === 'mozilla') {
				array_unshift($css, 'ffonly');
			}
			if (self::isGerman()) {
				array_unshift($css, 'main_de');
			}else {
				array_unshift($css, 'main_us');
			}
			if (Messages::any_msgs()) {
				array_unshift($css, 'messages');
			}
			if (!defined('NO_DEBUG')) {
				array_unshift($css, 'debug');
			}
			array_unshift($css, 'main');
			$css = array_unique($css);
			$search_keywords[++$search_cnt] = '{CSS}';
			$search_replace[$search_cnt] = implode(',', $css);

			if (!isset($_GET['INLINE_IMAGES']) || (self::$browser_name === 'msie' && self::$browser_version < 8)) {
				define('NO_INLINE_IMAGES', 1);
			}

			if (!defined('NO_INLINE_IMAGES')) {
				$search_replace[$search_cnt] .= '&amp;inline_images=1';
			}

			$js = &self::$js;
			if (!self::checkSSL()) {
				array_unshift($js, 'bookmarks');
				if (self::isHTML() || (self::$browser_name === 'msie' && self::$browser_version == 8)) {
					array_unshift($js, 'google');
				}
			}
			if (!IllaUser::loggedIn() && !self::isLocalServer()) {
				array_unshift($js, 'proxy_killer');
			}
			array_push($js, 'hyphenator');
			if (self::isGerman()) {
				array_push($js, 'hyphenator-de');
			} else {
				array_push($js, 'hyphenator-en-gb');
			}
			if (self::$browser_name === 'msie' && self::$browser_version <= 6) {
				array_unshift($js, 'iepngfix');
			}
			$js = array_unique($js);
			$search_keywords[++$search_cnt] = '{JS}';
			$search_replace[$search_cnt] = implode(',', $js);
			
			$search_keywords[++$search_cnt] = '{PAGE_META_HEAD}';
			$search_replace[$search_cnt] = '';
			if (self::$browser_name === 'msie' && self::$browser_version == 9) {
				if (array_search('lightwindow', $js) !== false) {
					$search_replace[$search_cnt] = '<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />';
				}
			}
			
			$search_keywords[++$search_cnt] = '{NO_OPTI}';
			if (isset($_GET['no_opti'])) {
				$search_replace[$search_cnt] = '&amp;no_opti=1';
			} else {
				$search_replace[$search_cnt] = '';
			}

			$search_keywords[++$search_cnt] = '{ADDITIONAL_HEADERS}';
			$search_replace[$search_cnt] = implode(PHP_EOL, self::$additional_headers);
			if (strlen(self::$first_page) > 0) {
				$search_replace[$search_cnt] .= '<link rel="first" href="' . self::$first_page . '" />' . PHP_EOL;
			}
			if (strlen(self::$prev_page) > 0) {
				$search_replace[$search_cnt] .= '<link rel="prev" href="' . self::$prev_page . '" />' . PHP_EOL;
			}
			if (strlen(self::$next_page) > 0) {
				$search_replace[$search_cnt] .= '<link rel="next" href="' . self::$next_page . '" />' . PHP_EOL;
			}
			if (strlen(self::$last_page) > 0) {
				$search_replace[$search_cnt] .= '<link rel="last" href="' . self::$last_page . '" />' . PHP_EOL;
			}
			if (!defined('NO_INLINE_IMAGES')) {
				$search_replace[$search_cnt] .= '<link rel="stylesheet" type="text/css" href="' . self::getURL() . '/shared/pics/' . self::$language . '_image_bundle.css" />' . PHP_EOL;
			}
			$trackingGoals = array_unique(self::$track_goals);
			foreach($trackingGoals as $goal) {
				$search_replace[$search_cnt] .= '<script type="text/javascript">piwikTracker.trackGoal('.$goal.');</script>';
			}
            $search_keywords[++$search_cnt] = '{PIWIK_USER_ID}';
            if (IllaUser::loggedIn()) {
                $search_replace[$search_cnt] .= 'piwikTracker.setUserId(\''.IllaUser::$username.'\');';
            } else {
                $search_replace[$search_cnt] = '';
            }
			$search_keywords[++$search_cnt] = '{NEWS_TEXT}';
			$search_replace[$search_cnt] = (self::isGerman() ? 'News von Illarion' : 'News of Illarion');

			if (!self::$serverstatus) {
				// $search_keywords[++$search_cnt] = '{SERVER_STATUS}'; $search_replace[$search_cnt] = ( self::$language === 'de' ? 'Server ist online' : 'Server is online' );
				switch (self::$playercount) {
					case 0: $search_keywords[++$search_cnt] = '{ONLINE_PLAYERS}';
						$search_replace[$search_cnt] = (self::isGerman() ? 'Niemand spielt' : 'Nobody plays');
						break;
					case 1: $search_keywords[++$search_cnt] = '{ONLINE_PLAYERS}';
						$search_replace[$search_cnt] = (self::isGerman() ? 'Ein Char online' : 'One char online');
						break;
					default: $search_keywords[++$search_cnt] = '{ONLINE_PLAYERS}';
						$search_replace[$search_cnt] = self::$playercount . (self::isGerman() ? ' Chars online' : ' chars online');
				}
			}else {
				// $search_keywords[++$search_cnt] = '{SERVER_STATUS}'; $search_replace[$search_cnt] = ( self::$language === 'de' ? 'Server ist offline' : 'Server is offline' );
				$search_keywords[++$search_cnt] = '{ONLINE_PLAYERS}';
				$search_replace[$search_cnt] = (self::isGerman() ? 'Server ist offline' : 'Server is offline');
			}
			
			$search_keywords[++$search_cnt] = '{TESTSERVER_STATUS}';
			if (!self::$testserverstatus) {
				$search_replace[$search_cnt] = (self::isGerman() ? 'Testserver&#8239;online' : 'Testserver&#8239;online');
			}else {
				$search_replace[$search_cnt] = (self::isGerman() ? 'Testserver&#8239;offline' : 'Testserver&#8239;offline');
			}
			
			$mantisIssues = self::getOpenTestserverIssues();
			$search_keywords[++$search_cnt] = '{MANTIS_ISSUES}';
			if ($mantisIssues == 0) {
				$search_replace[$search_cnt] = (self::isGerman() ? 'Keine Tests' : 'No tests');
			} elseif ($mantisIssues == 1) {
				$search_replace[$search_cnt] = (self::isGerman() ? 'Ein Test' : 'One test');
			} else {
				$search_replace[$search_cnt] = (self::isGerman() ? "$mantisIssues Tests" : "$mantisIssues tests");
			}

			if (!Messages::any_msgs()) {
				$search_keywords[++$search_cnt] = '{SYSTEM_MESSAGES}';
				$search_replace[$search_cnt] = '';
			}else {
				$search_keywords[++$search_cnt] = '{SYSTEM_MESSAGES}';
				$search_replace[$search_cnt] = file_get_contents(Page::$base_path . '/shared/msg_template.xhtml');
				$search_keywords[++$search_cnt] = '{MESSAGES}';
				$search_replace[$search_cnt] = Messages::parse();
			}

			if (IllaUser::loggedIn()) {
				$name = IllaUser::$name;
				if (strlen($name) > 9) {
					$name = substr($name, 0, 8) . '...';
				}
				$search_keywords[++$search_cnt] = '{ACCOUNT_NAVIGATION_FRAME}';
				$search_replace[$search_cnt] = '		<li class="seperator">' . (self::isGerman() ? 'Hallo ' : 'Hello ') . $name . '</li>' . PHP_EOL
				 . '		<li><a href="' . self::getURL() . '/community/account/' . self::$language . '_charlist.php" class="importaint">' . (self::isGerman() ? 'Charaktere' : 'Characters') . '</a></li>' . PHP_EOL
				 . '		<li class="seperator"><a href="' . self::getURL() . '/community/account/' . self::$language . '_acc_settings.php" class="importaint">Account</a></li>' . PHP_EOL
				 . '		<li>' . PHP_EOL
				 . '			<input type="hidden" name="action" value="logout" />' . PHP_EOL
				 . '			<input type="submit" name="logout" value="' . (self::$language === 'de' ? 'Ausloggen' : 'Logout') . '" style="width:100%;" />' . PHP_EOL
				 . '		</li>' . PHP_EOL ;
			}else {
				$search_keywords[++$search_cnt] = '{ACCOUNT_NAVIGATION_FRAME}';
				$search_replace[$search_cnt] = '		<li>' . (self::$language === 'de' ? 'Benutzername' : 'Username') . '</li>' . PHP_EOL
				 . '		<li class="seperator"><input type="text" name="login_name" style="width:100%;" /></li>' . PHP_EOL
				 . '		<li>' . (self::$language === 'de' ? 'Passwort' : 'Password') . '</li>' . PHP_EOL
				 . '		<li class="seperator"><input type="password" name="login_pw" style="width:100%;" /></li>' . PHP_EOL
				 . '		<li class="seperator"><input type="checkbox" name="login_remember" value="remember" id="remember_me" /><label for="remember_me">' . (self::isGerman() ? 'immer einloggen' : 'remember me') . '</label></li>' . PHP_EOL
				 . '		<li>' . PHP_EOL
				 . '			<input type="hidden" name="action" value="login" />' . PHP_EOL
				 . '			<input type="submit" name="login" value="' . (self::$language === 'de' ? 'Einloggen' : 'Login') . '" style="width:100%;" />' . PHP_EOL
				 . '		</li>' . PHP_EOL
				 . '		<li><a href="' . self::getURL() . '/community/account/' . self::$language . '_register.php">' . (self::$language === 'de' ? 'Registrieren' : 'Register') . '</a></li>' . PHP_EOL
				 . '		<li><a href="' . self::getURL() . '/community/account/' . self::$language . '_forgot_pw.php">' . (self::$language === 'de' ? 'Passwort weg?' : 'Lost password?') . '</a></li>' . PHP_EOL ;
			}

			$xml = simplexml_load_file(self::getRootPath() . '/illarion/screenshots.xml');
			$selected_pic = rand(0, count($xml->group[0]->screenshot) - 1);

			$search_keywords[++$search_cnt] = '{SCREENSHOT_FILE}';
			$search_replace[$search_cnt] = self::getMediaURL() . '/screenshots/preview/' . $xml->group[0]->screenshot[$selected_pic]->attributes()->filename;
			$search_keywords[++$search_cnt] = '{SCREENSHOT_NAME}';
			$search_replace[$search_cnt] = 'Screenshot';

			if (self::$language === 'de') {
				$output = preg_replace('/{LANG\|([^\}^\|]*)\|[^\}^\|]*}/', '\1', $output);
			}else {
				$output = preg_replace('/{LANG\|[^\}^\|]*\|([^\}^\|]*)}/', '\1', $output);
			}

			$search_keywords[++$search_cnt] = '{PNGCSS}';
			if (self::$browser_name === 'msie' && self::$browser_version <= 6) {
				$search_replace[$search_cnt] = 'pngfix';
			}else {
				$search_replace[$search_cnt] = '';
			}

			$search_keywords[++$search_cnt] = '{LANGUAGE}';
			$search_replace[$search_cnt] = &self::$language;
			
			$search_keywords[++$search_cnt] = '{IMAGE_URL}';
			$search_replace[$search_cnt] = self::getCurrentImageURL();
			
			$search_keywords[++$search_cnt] = '{URL}';
			$search_replace[$search_cnt] = self::getCurrentURL();
			
			$search_keywords[++$search_cnt] = '{SHARED_URL}';
			$search_replace[$search_cnt] = self::getCurrentURL() . '/shared';
			
			$search_keywords[++$search_cnt] = '{HTTP_URL}';
			$search_replace[$search_cnt] = self::getURL();
			
			$search_keywords[++$search_cnt] = '{HTTPS_URL}';
			$search_replace[$search_cnt] = self::getSecureURL();
			

			$output = str_replace($search_keywords, $search_replace, $output);

			unset($search_keywords);
			unset($search_replace);
			unset($search_cnt);

			self::optimizeOutput($output);

			if (defined('NO_DEBUG') && !isset($_GET['FORCE_ERROR_OUTPUT'])) {
				$output = str_replace('{DEBUG}', '', $output);
			} else {
				$database_debug = Database::getDiagnosticData();

				$enablexdebug = function_exists('xdebug_time_index');
				$output = str_replace('{DEBUG}',
					'<div class="debug" id="debug">'
					 . ($enablexdebug ? 'Page processing time: <b>' . number_format(xdebug_time_index(), 6) . ' seconds</b>' : '<b style="color:red">XDebug not activated</b>' ) .'<br />'
					 . 'MySQL activity: <b>' . $database_debug['mysql_queries'] . ' queries</b> within <b>' . number_format($database_debug['mysql_query_time'], 6) . ' seconds</b> to get and <b>' . number_format($database_debug['mysql_parse_time'], 6) . ' seconds</b> to parse<br />'
					 . 'PostgreSQL activity: <b>' . $database_debug['pgsql_queries'] . ' queries</b> within <b>' . number_format($database_debug['pgsql_query_time'], 6) . ' seconds</b> to get and <b>' . number_format($database_debug['pgsql_parse_time'], 6) . ' seconds</b> to parse<br />'
					 . ($enablexdebug ? 'Memory Usage: <b>' . number_format(xdebug_peak_memory_usage(), 0, '', '.') . ' Byte</b><br />' : '')
					 . implode('<br />', self::$errors)
					 . '</div>', $output);
			}
		}

		header("HTTP/1.0 200 OK");
		if (self::isXHTML()) {
			header('Content-type: application/xhtml+xml; charset=utf-8');
		} elseif (self::isHTML()) {
			header('Content-type: text/html; charset=utf-8');
		} elseif (self::isXML()) {
			if (is_null(self::$xml_content_type)) {
				header('Content-type: text/xml; charset=utf-8');
			}else {
				header('Content-type: ' . self::$xml_content_type . '; charset=utf-8');
			}
		}

		Database::Shutdown();

		echo $output;

		if (isset($_GET['XDEBUG_TRACE'])) {
			if (function_exists('xdebug_stop_trace')) {
				xdebug_stop_trace();
			}
		}
	}

	/**
	* Optimize a xhtml string to the minimal length
	*
	* @access private
	* @param string $output the pointer to string that shall be optimized
	*/
	static private function optimizeOutput(&$output) {
		if (!isset($_GET['no_opti'])) {
			$preserved_tags = array('textarea', 'pre', 'script', 'style', 'code');
			$preserved_blocks = array();
			$preserved_boundry = '@@PRESERVEDTAG@@';
			$cdata_blocks = array();
			$cdata_boundry = '@@CDATA@@';
			$conditional_boundries = array('@@IECOND-OPEN@@', '@@IECOND-CLOSE@@');

			$output = str_replace(array('<!--[if', '<!--<![endif]-->'), $conditional_boundries, $output);
			$output = preg_replace('/<!--(.|\s)*?-->/', '', $output);
			$output = str_replace($conditional_boundries, array('<!--[if', '<!--<![endif]-->'), $output);

			$tag_string = implode('|', $preserved_tags);
			preg_match_all('!<(' . $tag_string . ')[^>]*>.*?</(' . $tag_string . ')>!is', $output, $preserved_blocks);
			$preserved_blocks = $preserved_blocks[0];
			$output = preg_replace('!<(' . $tag_string . ')[^>]*>.*?</(' . $tag_string . ')>!is', $preserved_boundry, $output);

			preg_match_all('/<!\[CDATA\[.*?\]\]>/is', $output, $cdata_blocks);
			$cdata_blocks = $cdata_blocks[0];
			$output = preg_replace('/<!\[CDATA\[.*?\]\]>/is', $cdata_boundry, $output);

			$output = preg_replace('/[\t\s\n\r]+/m', ' ', $output);
			$output = str_replace('> <', '><', $output);

			foreach($preserved_blocks as $curr_block) {
				$output = preg_replace('!' . $preserved_boundry . '!', $curr_block, $output, 1);
			}

			foreach($cdata_blocks as $curr_block) {
				$output = preg_replace('!' . $cdata_boundry . '!', $curr_block, $output, 1);
			}

			$output = trim($output);
		}
	}

	/**
	* Creates at the position it is called at a small navigation bar that leads back,
	* forward and back to the beginning. This navigation bar uses the previous, the
	* first and the next page setted up in the homepage enviroment
	*
	* @access public
	*/
	static public function NavBarTop() {
		$show_back = (strlen(self::$prev_page) > 0);
		$show_home = (strlen(self::$first_page) > 0);
		$show_next = (strlen(self::$next_page) > 0);

		if (!$show_back && !$show_home && !$show_next) {
			return null;
		}

		echo '<div class="center" style="margin-top:-12px;margin-bottom:-18px;height:30px;">';
		if ($show_back) {
			echo '<a href="', self::$prev_page, '">';
			echo '<img alt="', (self::isGerman() ? 'Zurück' : 'Back'), '" title="', (self::isGerman() ? 'Zurück' : 'Back'), '" class="arrow_left {PNGCSS}" src="', self::getImageURL(), '/arrow_left.png" width="30" height="15" />';
			echo '</a>';
		}else {
			echo '<img alt="dummy" title="" src="', self::getImageURL(), '/blank.gif" width="30" height="30" />';
		}
		if ($show_home) {
			echo '<a href="', self::$first_page, '">';
			echo '<img alt="', (self::isGerman() ? 'Inhalt' : 'Content'), '" title="', (self::isGerman() ? 'Inhalt' : 'Content'), '" class="arrow_content {PNGCSS}" src="', self::getImageURL(), '/arrow_info.png" width="30" height="26" />';
			echo '</a>';
		}else {
			echo '<img alt="dummy" title="" src="', self::getImageURL(), '/blank.gif" width="30" height="30" />';
		}
		if ($show_next) {
			echo '<a href="', self::$next_page, '">';
			echo '<img alt="', (self::isGerman() ? 'Weiter' : 'Next'), '" title="', (self::isGerman() ? 'Weiter' : 'Next'), '" class="arrow_right {PNGCSS}" src="', self::getImageURL(), '/arrow_right.png" width="30" height="15" />';
			echo '</a>';
		}else {
			echo '<img alt="dummy" title="" src="', self::getImageURL(), '/blank.gif" width="30" height="30" />';
		}
		echo '</div>';
	}

	/**
	* Creates at the position it is called at a small navigation bar that leads back,
	* forward and to the top of the page. This navigation bar uses the previous and the
	* next page setted up in the homepage enviroment
	*
	* @access public
	*/
	static public function NavBarBottom() {
		$show_back = (strlen(self::$prev_page) > 0);
		$show_next = (strlen(self::$next_page) > 0);

		echo '<p class="center">';
		if ($show_back) {
			echo '<a href="', self::$prev_page, '">';
			echo '<img alt="', (self::isGerman() ? 'Zurück' : 'Back'), '" title="', (self::isGerman() ? 'Zurück' : 'Back'), '" class="arrow_left {PNGCSS}" src="', self::getImageURL(), '/arrow_left.png" width="30" height="15" />';
			echo '</a>';
		}else {
			echo '<img alt="dummy" title="" src="', self::getImageURL(), '/blank.gif" width="30" height="22" />';
		}
		echo '<a href="#top">';
		echo '<img alt="', (self::isGerman() ? 'nach oben' : 'top'), '" title="', (self::isGerman() ? 'nach oben' : 'top'), '" class="arrow_up {PNGCSS}" src="', self::getImageURL(), '/arrow_up.png" width="15" height="22" />';
		echo '</a>';
		if ($show_next) {
			echo '<a href="', self::$next_page, '">';
			echo '<img alt="', (self::isGerman() ? 'Weiter' : 'Next'), '" title="', (self::isGerman() ? 'Weiter' : 'Next'), '" class="arrow_right {PNGCSS}" src="', self::getImageURL(), '/arrow_right.png" width="30" height="15" />';
			echo '</a>';
		}else {
			echo '<img alt="dummy" title="" src="', self::getImageURL(), '/blank.gif" width="30" height="22" />';
		}
		echo '</p>';
	}

	/**
	* Handles the error messages shown by the page. The messages are hidden for common users
	*
	* @access public
	* @param int $errno number of the type of error that occured
	* @param string $errstr error message
	* @param string $errfile filename of the file the error happend in
	* @param int $errline line in the file the error occured at
	* @param string $errcontext context of the error
	*/
	public static function errorHandler($errno, $errstr, $errfile, $errline, $errcontext) {
		if ((defined('NO_DEBUG') || !@IllaUser::auth('errors')) && !isset($_GET['FORCE_ERROR_OUTPUT'])) {
			return true;
		}
		switch ($errno) {
			case E_USER_WARNING: $error_typ = 'User Warning';
				break;
			case E_USER_NOTICE: $error_typ = 'User Notice';
				break;
			case E_WARNING: $error_typ = 'Warning';
				break;
			case E_NOTICE: $error_typ = 'Notice';
				break;
			case E_CORE_WARNING: $error_typ = 'Core Warning';
				break;
			case E_COMPILE_WARNING: $error_typ = 'Compile Warning';
				break;
			case E_USER_ERROR: $error_typ = 'User Error';
				break;
			case E_ERROR: $error_typ = 'Error';
				break;
			case E_PARSE: $error_typ = 'Parse Error';
				break;
			case E_CORE_ERROR: $error_typ = 'Core Error';
				break;
			case E_COMPILE_ERROR: $error_typ = 'Compile Error';
				break;
			case E_STRICT: $error_typ = 'Strict Error';
				break;
			case E_RECOVERABLE_ERROR: $error_typ = 'Recoverable Error';
				break;
			default: $error_typ = 'Other Error';
				break;
		}
		$error_id = count(self::$errors) + 1;
		$error = '<b>' . $error_typ . '</b> - <i>' . str_replace(self::getRootPath(), '', $errfile) . ':' . $errline . '</i>: ' . $errstr;
		
		if (function_exists('xdebug_get_function_stack')) {
			$backtrace = xdebug_get_function_stack();
			if (count($backtrace) > 0) {
				$error .= ' - <a href="#debug" onclick="document.getElementById(\'backtrace' . $error_id . '\').style.display = \'block\';">Show Backtrace</a><div class="backtrace" id="backtrace' . $error_id . '">';
				for($i = count($backtrace) - 1;$i >= 0;--$i) {
					if (isset($backtrace[$i]['function']) && $backtrace[$i]['function'] != 'trigger_error' && $backtrace[$i]['function'] != 'errorHandler') {
						$error .= '<i>' . str_replace(self::getRootPath(), '', $backtrace[$i]['file']) . ':' . $backtrace[$i]['line'] . '</i>: ' . (isset($backtrace[$i]['class']) ? $backtrace[$i]['class'] . '::' : '') . $backtrace[$i]['function'] . '()';
						if (count($backtrace[$i]['params']) > 0) {
							$error .= ' - <a href="#debug" onclick="document.getElementById(\'backtrace_params' . $error_id . '_' . $i . '\').style.display = \'block\';">Show Parameters</a><div class="backtrace_params" id="backtrace_params' . $error_id . '_' . $i . '">';
							foreach ($backtrace[$i]['params'] as $param_name => $param_value) {
								$error .= '$' . $param_name . ' = \'' . htmlspecialchars($param_value) . '\'<br />';
							}
							$error .= '</div>';
						}
						$error .= '<br />';
					}
				}
				$error .= '</div>';
			}
		}
		self::$errors[] = $error;
	}
}

Page::initPaths();
