<?php

/*
 * Database System for the Illarion Homepage
 * Combines MySQL and PostGreSQL access
 *
 * Written by Martin Karing
 * 16th of July 2008
 */

class Database {
	private static $mysql;
	private static $postgre;
	private static $postgre_accounts;
	private static $postgre_illarionserver;
    private static $postgre_testserver;
	private static $postgre_devserver;
	private static $postgre_homepage;
	private static $disabled = false;

	public function Database() {
	}

	public final static function &getMySQL() {
		if (self::$disabled) {
			return null;
		}
		if (!is_object(self::$mysql)) {
			self::$mysql = new DatabaseMySQL();
		}
		$pointer = &self::$mysql;
		return $pointer;
	}

	public final static function &getPostgreSQL($server = null) {
		if (self::$disabled) {
			return null;
		}
		
		if ($server == null) {
			if (!is_object(self::$postgre)) {
				self::$postgre = new DatabasePostgreSQL();
			}
			$pointer = &self::$postgre;
			return $pointer;
		} elseif ($server == 'accounts') {
			if (!is_object(self::$postgre_accounts)) {
				self::$postgre_accounts = new DatabasePostgreSQL('accounts');
			}
			$pointer = &self::$postgre_accounts;
			return $pointer;
		} elseif ($server == 'illarionserver') {
			if (!is_object(self::$postgre_illarionserver)) {
				self::$postgre_illarionserver = new DatabasePostgreSQL('illarionserver');
			}
			$pointer = &self::$postgre_illarionserver;
			return $pointer;
        } elseif ($server == 'testserver') {
            if (!is_object(self::$postgre_testserver)) {
                self::$postgre_testserver = new DatabasePostgreSQL('testserver');
            }
            $pointer = &self::$postgre_testserver;
            return $pointer;        
        } elseif ($server == 'devserver') {
			if (!is_object(self::$postgre_devserver)) {
				self::$postgre_devserver = new DatabasePostgreSQL('devserver');
			}
			$pointer = &self::$postgre_devserver;
			return $pointer;
		} elseif ($server == 'homepage') {
			if (!is_object(self::$postgre_homepage)) {
				self::$postgre_homepage = new DatabasePostgreSQL('homepage');
			}
			$pointer = &self::$postgre_homepage;
			return $pointer;
		}
	}

	public final static function Shutdown() {
		if (self::$disabled) {
			return null;
		}
		if (is_object(self::$mysql)) {
			self::$mysql = null;
		}
		if (is_object(self::$postgre_accounts)) {
			self::$postgre_accounts = null;
		}
		if (is_object(self::$postgre_illarionserver)) {
			self::$postgre_illarionserver = null;
		}
        if (is_object(self::$postgre_testserver)) {
            self::$postgre_testserver = null;
        }
		if (is_object(self::$postgre_devserver)) {
			self::$postgre_devserver = null;
		}
		if (is_object(self::$postgre_homepage)) {
			self::$postgre_homepage = null;
		}
		self::$disabled = true;
	}

	public final static function getDiagnosticData() {
		$mySQL_cnt = 0;
		$mySQL_time = 0;
		$mySQL_parse = 0;
		$mySQL_queries = '';
		$pgSQL_cnt = 0;
		$pgSQL_time = 0;
		$pgSQL_parse = 0;
		$pgSQL_queries = '';
		if (is_object(self::$mysql)) {
			$mySQL_cnt = self::$mysql->_query_cnt;
			$mySQL_time = self::$mysql->_query_time;
			$mySQL_parse = self::$mysql->_parse_time;
			$mySQL_queries = self::$mysql->_query_list;
		}
		if (is_object(self::$postgre_accounts)) {
			$pgSQL_cnt += self::$postgre_accounts->_query_cnt;
			$pgSQL_time += self::$postgre_accounts->_query_time;
			$pgSQL_parse += self::$postgre_accounts->_parse_time;
			$pgSQL_queries .= self::$postgre_accounts->_query_list;
		}
		if (is_object(self::$postgre_illarionserver)) {
			$pgSQL_cnt += self::$postgre_illarionserver->_query_cnt;
			$pgSQL_time += self::$postgre_illarionserver->_query_time;
			$pgSQL_parse += self::$postgre_illarionserver->_parse_time;
			$pgSQL_queries .= self::$postgre_illarionserver->_query_list;
		}
        if (is_object(self::$postgre_testserver)) {
            $pgSQL_cnt += self::$postgre_testserver->_query_cnt;
            $pgSQL_time += self::$postgre_testserver->_query_time;
            $pgSQL_parse += self::$postgre_testserver->_parse_time;
            $pgSQL_queries .= self::$postgre_testserver->_query_list;
        }
		if (is_object(self::$postgre_devserver)) {
			$pgSQL_cnt += self::$postgre_devserver->_query_cnt;
			$pgSQL_time += self::$postgre_devserver->_query_time;
			$pgSQL_parse += self::$postgre_devserver->_parse_time;
			$pgSQL_queries .= self::$postgre_devserver->_query_list;
		}
		if (is_object(self::$postgre_homepage)) {
			$pgSQL_cnt += self::$postgre_homepage->_query_cnt;
			$pgSQL_time += self::$postgre_homepage->_query_time;
			$pgSQL_parse += self::$postgre_homepage->_parse_time;
			$pgSQL_queries .= self::$postgre_homepage->_query_list;
		}
		return array(
			'mysql_queries' => $mySQL_cnt,
			'mysql_query_time' => $mySQL_time,
			'mysql_parse_time' => $mySQL_parse,
			'mysql_query_list' => $mySQL_queries,
			'pgsql_queries' => $pgSQL_cnt,
			'pgsql_query_time' => $pgSQL_time,
			'pgsql_parse_time' => $pgSQL_parse,
			'pgsql_query_list' => $pgSQL_queries
			);
	}
}

abstract class DatabaseMain {
	public $_sql = '';
	public $_resource = '';
	public $_cursor = null;
	public $_debug = false;
	public $_limit = 0;
	public $_offset = 0;
	public $_ticker = 0;
	public $_errorNum = 0;
	public $_errorMsg = '';
	public $_log = null;
	public $_query_cnt = 0;
	public $_query_time = 0.0;
	public $_query_list = '';
	public $_parse_time = 0.0;
	public $_utf_conv = false;
	private $_nameQuote = '';

	public function __construct() {
		if (class_exists('User') && IllaUser::auth('errors')) {
			$this->debug(true);
		}
	}

	public abstract function getEscaped($text);

	public final function Quote($text) {
		if (is_null($text)) {
			return 'NULL';
		}

		if (is_bool($text)) {
			return ($text ? '\'t\'' : '\'f\'');
		}
		// quotieren, falls kein integer
		if (!ctype_digit($text)) {
			$text = '\'' . $this->getEscaped($text) . '\'';
		}

		if ($this->_utf_conv) {
			$text = mb_convert_encoding($text, 'ASCII', mb_detect_encoding($text, 'UTF-8, ISO-8859-1, ISO-8859-15, ASCII'));
		}

		return $text;
	}

	public final function debug($debugging) {
		$this->_debug = $debugging;
	}

	public final function getErrorNum() {
		return $this->_errorNum;
	}

	public final function setQuery($sql, $offset = 0, $limit = 0) {
		if ($sql != null && strlen($sql) > 0 && $sql[strlen($sql) - 1] == ';') {
			$sql = substr($sql, 0, - 1);
		}
		$this->_sql = $sql;
		$this->_limit = intval($limit);
		$this->_offset = intval($offset);
		$this->freeResult();
	}

	protected final function defaultQuery($command) {
		$temp_sql = $this->_sql;
		$temp_limit = $this->_limit;
		$temp_offset = $this->_offset;
		$this->setQuery($command, 0, 0);
		$this->query();
		$this->setQuery($temp_sql, $temp_limit, $temp_offset);
	}

	protected final function updateCursor() {
		if ($this->_cursor == null) {
			if (!$this->query()) {
				return false;
			}
		} elseif (!is_object($this->_cursor)) {
			return false;
		}
		return true;
	}

	public abstract function Begin();

	public abstract function Commit();

	public abstract function Rollback();

	public abstract function getQuery();

	public abstract function query();

	public final function insert($table, $fields) {
		$keys = '';
		$values = '';
		$added_something = false;
		foreach ($fields as $key => $value) {
			if ($added_something) {
				$keys .= ', ';
				$values .= ', ';
			}else {
				$added_something = true;
			}
			$keys .= $this->_nameQuote . $key . $this->_nameQuote;
			$values .= $this->Quote($value);
		}

		if (!$added_something) {
			return false;
		}

		$query = 'INSERT INTO ' . $this->_nameQuote . $table . $this->_nameQuote . '(' . $keys . ')'
		 . PHP_EOL . ' VALUES (' . $values . ')' ;

		$this->setQuery($query);
		if ($this->query()) {
			return true;
		}else {
			return false;
		}
	}

	public final function update($table, $fields, $where) {
		$update = '';
		$added_something = false;
		foreach ($fields as $key => $value) {
			if ($added_something) {
				$update .= ', ';
			}else {
				$added_something = true;
			}
			$update .= $this->_nameQuote . $key . $this->_nameQuote . ' = ' . $this->Quote($value);
		}

		if (!$added_something) {
			return false;
		}

		$query = 'UPDATE ' . $this->_nameQuote . $table . $this->_nameQuote
		 . PHP_EOL . ' SET ' . $update
		 . PHP_EOL . ' WHERE ' . $where ;

		$this->setQuery($query);
		if ($this->query()) {
			return true;
		}else {
			return false;
		}
	}

	public abstract function getAffectedRows();

	public abstract function query_batch($abort_on_error = true, $p_transaction_safe = false);

	public abstract function explain();

	public abstract function getNumRows();

	public abstract function loadResult();

	public abstract function loadResultArray($numinarray = 0);

	public abstract function loadAssocList($key = '');

	public abstract function loadObjectList($key = '');

	public abstract function loadRow();

	public abstract function loadAssocRow();

	public abstract function loadRowList($key = '');

	public final function stderr($showSQL = false) {
		return "DB function failed with error number $this->_errorNum"
		 . "<br /><font color=\"red\">$this->_errorMsg</font>"
		 . ($showSQL ? "<br />SQL = <pre>$this->_sql</pre>" : '');
	}

	public abstract function insertid();

	public abstract function freeResult();

	public abstract function getVersion();

	public abstract function getTableList();

	public abstract function getTableCreate($tables);

	public abstract function getTableFields($tables);

	protected final function utf8encode(&$data) {
		if (!$this->_utf_conv)
			return;

		if (is_array($data)) {
			foreach($data as &$value) {
				$this->utf8encode($value);
			}
		} elseif (is_object($data)) {
			foreach(get_object_vars($data) as $key => $value) {
				$this->utf8encode($data->$key);
			}
		} elseif (is_string($data)) {
			$data = mb_convert_encoding($data, 'UTF-8', mb_detect_encoding($data, 'UTF-8, ISO-8859-1, ISO-8859-15, ASCII'));
		}
	}

	public abstract function __destruct();
}

class DatabaseMySQL extends DatabaseMain {
	const username = 'homepage';
	const password = '9RmtQ6htLNRU';
	private $_nameQuote = '`';

	public final function __construct() {
		$this->_resource = new mysqli('localhost', DatabaseMySQL::username, DatabaseMySQL::password, 'website');

		if ($this->_resource->connect_error) {
			trigger_error('Connection to MySQL Database failed: ' . $this->_resource->connect_error, E_USER_ERROR);
			return;
		}
		$this->_resource->set_charset('utf8');
		$this->_resource->autocommit(true);
		parent::__construct();
	}

	public final function getEscaped($text) {
		return $this->_resource->real_escape_string($text);
	}

	public final function Begin() {
		$this->_resource->autocommit(false);
	}

	public final function Commit() {
		$this->_resource->commit();
		$this->_resource->autocommit(true);
	}

	public final function Rollback() {
		$this->_resource->rollback();
		$this->_resource->autocommit(true);
	}

	public final function getQuery() {
		if ($this->_limit > 0 || $this->_offset > 0) {
			$ret = '<pre>' . htmlspecialchars($this->_sql . PHP_EOL . ' LIMIT ' . $this->_offset . ', ' . $this->_limit) . ';</pre>';
		}else {
			$ret = '<pre>' . htmlspecialchars($this->_sql) . ';</pre>';
		}
		$this->utf8encode($ret);
		return $ret;
	}

	public final function query() {
		if (!defined('NO_DEBUG')) $start_time = microtime(true);

		if ($this->_limit > 0 || $this->_offset > 0) {
			$this->_sql .= PHP_EOL . 'LIMIT ' . $this->_offset . ', ' . $this->_limit;
		}

		if ($this->_debug) {
			$this->_ticker++;
			$this->_log[] = $this->_sql;
		}
		$this->_errorNum = 0;
		$this->_errorMsg = '';
		$this->_cursor = $this->_resource->query($this->_sql . ';');

		if (!defined('NO_DEBUG')) {
			$this->_query_time += (microtime(true) - $start_time);
			++$this->_query_cnt;
			$this->_query_list .= $this->_sql . ';' . PHP_EOL;
		}

		if (!$this->_cursor) {
			$this->_errorNum = $this->_resource->errno;
			$this->_errorMsg = $this->_resource->error . ' SQL=' . $this->_sql;
			if ($this->_debug) {
				trigger_error('MySQLi Error: ' . $this->_errorMsg, E_USER_NOTICE);
				if (function_exists('debug_backtrace')) {
					foreach(debug_backtrace() as $back) {
						if (@$back['file']) {
							echo '<pre>', htmlspecialchars($this->_sql), ';</pre>';
						}
					}
				}
			}
			return false;
		}
		return $this->_cursor;
	}

	public final function getAffectedRows() {
		return $this->_resource->affected_rows;
	}

	public final function query_batch($abort_on_error = true, $p_transaction_safe = false) {
		if (!defined('NO_DEBUG')) $start_time = microtime(true);
		$this->_errorNum = 0;
		$this->_errorMsg = '';
		if ($p_transaction_safe) {
			$this->Begin();
		}
		$query_split = preg_split ("/[;]+/", $this->_sql);
		$error = 0;
		foreach ($query_split as $command_line) {
			$command_line = trim($command_line);
			if ($command_line != '') {
				if (!defined('NO_DEBUG')) {
					++$this->_query_cnt;
					$this->_query_list .= $command_line . ';' . PHP_EOL;
				}
				$this->_cursor = $this->_resource->query($command_line);
				if (!$this->_cursor) {
					$error = 1;
					$this->_errorNum .= $this->_resource->errno . ' ';
					$this->_errorMsg .= $this->_resource->error . ' SQL=' . $command_line . '<br />';
					if ($abort_on_error) {
						if ($p_transaction_safe) {
							$this->Rollback();
						}
						if (!defined('NO_DEBUG')) $this->_query_time += (microtime(true) - $start_time);
						return $this->_cursor;
					}
				}
			}
		}
		if ($p_transaction_safe) {
			$this->Commit();
		}
		if (!defined('NO_DEBUG')) $this->_query_time += (microtime(true) - $start_time);
		return $error ? false : true;
	}

	public final function explain() {
		$temp = $this->_sql;
		$this->_sql = 'EXPLAIN ' . $this->_sql;
		$this->query();

		if (!($cur = $this->query())) {
			return null;
		}
		$first = true;

		$buf = '<div style="background-color:#FFFFCC" align="left"><table cellspacing="1" cellpadding="2" border="0" bgcolor="#000000" align="center">';
		$buf .= $this->getQuery();
		while ($row = $cur->fetch_assoc()) {
			if ($first) {
				$buf .= '<tr>';
				foreach ($row as $k => $v) {
					$buf .= '<th bgcolor="#ffffff">' . $k . '</th>';
				}
				$buf .= '</tr>';
				$first = false;
			}
			$buf .= '<tr>';
			foreach ($row as $k => $v) {
				$buf .= '<th bgcolor="#ffffff">' . $v . '</th>';
			}
			$buf .= '</tr>';
		}
		$buf .= '</table></div><br />';
		$cur->free();
		$this->_sql = $temp;
		$this->utf8encode($buf);
		return $buf;
	}

	public final function getNumRows() {
		if (!$this->updateCursor()) {
			return 0;
		}

		return (int)$this->_cursor->num_rows;
	}

	public final function loadResult() {
		if (!$this->updateCursor()) {
			return null;
		}

		if (!defined('NO_DEBUG')) $start_time = microtime(true);

		if ($row = $this->_cursor->fetch_row()) {
			$this->utf8encode($row[0]);
			if (!defined('NO_DEBUG')) $this->_parse_time += (microtime(true) - $start_time);
			return $row[0];
		}
		if (!defined('NO_DEBUG')) $this->_parse_time += (microtime(true) - $start_time);
		return null;
	}

	public final function loadResultArray($numinarray = 0) {
		if (!$this->updateCursor()) {
			return null;
		}

		if (!defined('NO_DEBUG')) $start_time = microtime(true);

		$array = array();
		while ($row = $this->_cursor->fetch_row()) {
			$array[] = $row[$numinarray];
		}
		$this->utf8encode($array);
		if (!defined('NO_DEBUG')) $this->_parse_time += (microtime(true) - $start_time);
		return $array;
	}

	public final function loadAssocList($key = '') {
		if (!$this->updateCursor()) {
			return null;
		}

		if (!defined('NO_DEBUG')) $start_time = microtime(true);

		$array = array();
		while ($row = $this->_cursor->fetch_assoc()) {
			if ($key) {
				$array[$row[$key]] = $row;
			}else {
				$array[] = $row;
			}
		}
		$this->utf8encode($array);
		if (!defined('NO_DEBUG')) $this->_parse_time += (microtime(true) - $start_time);
		return $array;
	}

	public final function loadObjectList($key = '') {
		if (!$this->updateCursor()) {
			return null;
		}

		if (!defined('NO_DEBUG')) $start_time = microtime(true);

		$array = array();
		while ($row = $this->_cursor->fetch_object()) {
			if ($key) {
				$array[$row->$key] = $row;
			}else {
				$array[] = $row;
			}
		}
		$this->utf8encode($array);
		if (!defined('NO_DEBUG')) $this->_parse_time += (microtime(true) - $start_time);
		return $array;
	}

	public final function loadRow() {
		if (!$this->updateCursor()) {
			return null;
		}

		if (!defined('NO_DEBUG')) $start_time = microtime(true);

		$ret = null;
		if ($row = $this->_cursor->fetch_row()) {
			$ret = $row;
		}
		$this->utf8encode($ret);
		if (!defined('NO_DEBUG')) $this->_parse_time += (microtime(true) - $start_time);
		return $ret;
	}

	public final function loadAssocRow() {
		if (!$this->updateCursor()) {
			return null;
		}

		if (!defined('NO_DEBUG')) $start_time = microtime(true);

		$ret = null;
		if ($row = $this->_cursor->fetch_assoc()) {
			$ret = $row;
		}
		$this->utf8encode($ret);
		if (!defined('NO_DEBUG')) $this->_parse_time += (microtime(true) - $start_time);
		return $ret;
	}

	public final function loadRowList($key = '') {
		if (!$this->updateCursor()) {
			return null;
		}

		if (!defined('NO_DEBUG')) $start_time = microtime(true);

		$array = array();
		while ($row = $this->_cursor->fetch_row()) {
			if ($key) {
				$array[$row[$key]] = $row;
			}else {
				$array[] = $row;
			}
		}
		$this->utf8encode($array);
		if (!defined('NO_DEBUG')) $this->_parse_time += (microtime(true) - $start_time);
		return $array;
	}

	public final function insertid() {
		return (int)$this->_resource->insert_id;
	}

	public final function freeResult() {
		if (is_object($this->_cursor)) {
			$this->_cursor->free();
		}
		if (!is_null($this->_cursor)) {
			$this->_cursor = null;
		}
	}

	public final function getVersion() {
		return (int)$this->_resource->server_version;
	}

	public final function getTableList() {
		$this->setQuery('SHOW TABLES');
		return $this->loadResultArray();
	}

	public final function getTableCreate($tables) {
		$result = array();

		foreach ($tables as $tblval) {
			$this->setQuery('SHOW CREATE table ' . $this->getEscaped($tblval));
			$rows = $this->loadRowList();
			foreach ($rows as $row) {
				$result[$tblval] = $row[1];
			}
		}

		return $result;
	}

	public final function getTableFields($tables) {
		$result = array();

		foreach ($tables as $tblval) {
			$this->setQuery('SHOW FIELDS FROM ' . $tblval);
			$fields = $this->loadObjectList();
			foreach ($fields as $field) {
				$result[$tblval][$field->Field] = preg_replace("/[(0-9)]/", '', $field->Type);
			}
		}

		return $result;
	}

	public final function __destruct() {
		$this->freeResult();
		return $this->_resource->close();
	}
}

class DatabasePostgreSQL extends DatabaseMain {
	public $_nameQuote = '"';

	const username = 'homepage';
	const password = '';

	public final function __construct($database = null) {
		if ((!$this->_resource = pg_connect('dbname=\'illarion\' user=\'' . DatabasePostgreSQL::username . '\' password=\'' . DatabasePostgreSQL::password . '\'', PGSQL_CONNECT_FORCE_NEW))) {
			echo '<b>Database Error</b> - Connection to PostGreSQL Database failed.';
			return;
		}
		
		$this->_utf_conv = false;
		parent::__construct();
		
		if ($database != null) {
			pg_query($this->_resource, 'SET search_path TO ' . $database . ', accounts');
		} else {
			pg_query($this->_resource, 'SET search_path TO homepage, accounts');
		}
	}

	public final function getEscaped($text) {
		return pg_escape_string($this->_resource, $text);
	}

	public final function Begin() {
		$this->defaultQuery('BEGIN;');
	}

	public final function Commit() {
		$this->defaultQuery('COMMIT;');
	}

	public final function Rollback() {
		$this->defaultQuery('ROLLBACK;');
	}

	public final function getQuery() {
		if ($this->_limit > 0 || $this->_offset > 0) {
			$ret = '<pre>' . htmlspecialchars($this->_sql . PHP_EOL . ' LIMIT ' . ($this->_limit > 0 ? $this->_limit : 'ALL') . ' OFFSET ' . $this->_offset) . ';</pre>';
		}else {
			$ret = '<pre>' . htmlspecialchars($this->_sql) . '</pre>';
		}
		$this->utf8encode($ret);
		return $ret;
	}

	public final function query() {
		if (!defined('NO_DEBUG')) $start_time = microtime(true);

		if ($this->_limit > 0 || $this->_offset > 0) {
			$this->_sql .= PHP_EOL . ' LIMIT ' . ($this->_limit > 0 ? $this->_limit : 'ALL') . ' OFFSET ' . $this->_offset;
		}
		if ($this->_debug) {
			$this->_ticker++;
			$this->_log[] = $this->_sql;
		}
		$this->_errorNum = 0;
		$this->_errorMsg = '';
		$this->_cursor = pg_query($this->_resource, $this->_sql);

		if (!defined('NO_DEBUG')) {
			$this->_query_time += (microtime(true) - $start_time);
			++$this->_query_cnt;
			$this->_query_list .= $this->_sql . ';' . PHP_EOL;
		}

		if (!$this->_cursor) {
			$this->_errorNum = '4 ';
			$this->_errorMsg = pg_last_error($this->_resource) . ' SQL= ' . $this->_sql;
			if ($this->_debug) {
				trigger_error('pgSQL Error: ' . pg_last_error($this->_resource), E_USER_NOTICE);
				if (function_exists('debug_backtrace')) {
					foreach(debug_backtrace() as $back) {
						if (@$back['file']) {
							echo '<br />', $back['file'], ':', $back['line'];
						}
					}
				}
			}
			return false;
		}
		return $this->_cursor;
	}

	public final function getAffectedRows() {
		return (int)pg_affected_rows($this->_cursor);
	}

	public final function query_batch($abort_on_error = true, $p_transaction_safe = false) {
		if (!defined('NO_DEBUG')) $start_time = microtime(true);
		$this->_errorNum = 0;
		$this->_errorMsg = '';
		if ($p_transaction_safe) {
			$this->Begin();
		}
		$query_split = preg_split ("/[;]+/", $this->_sql);
		$error = 0;
		foreach ($query_split as $command_line) {
			$command_line = trim($command_line);
			if ($command_line != '') {
				if (!defined('NO_DEBUG')) {
					++$this->_query_cnt;	
					$this->_query_list .= $command_line . ';' . PHP_EOL;
				}
				$this->_cursor = pg_query($this->_resource, $command_line);
				if (!$this->_cursor) {
					$error = 1;
					$this->_errorNum .= '4 ';
					$this->_errorMsg .= pg_last_error($this->_resource) . ' SQL=' . $command_line . '<br />';
					if ($abort_on_error) {
						if ($p_transaction_safe) {
							$this->Rollback();
						}
						if (!defined('NO_DEBUG')) $this->_query_time += (microtime(true) - $start_time);
						return $this->_cursor;
					}
				}
			}
		}
		if ($p_transaction_safe) {
			$this->Commit();
		}
		if (!defined('NO_DEBUG')) $this->_query_time += (microtime(true) - $start_time);
		return $error ? false : true;
	}

	public final function explain() {
		$temp = $this->_sql;
		$this->_sql = 'EXPLAIN ' . $this->_sql;

		if (!$this->query()) {
			return null;
		}
		$first = true;

		$buf = '<div style="background-color:#FFFFCC" align="left"><table cellspacing="1" cellpadding="2" border="0" bgcolor="#000000" align="center">';
		$buf .= $this->getQuery();
		while ($row = pg_fetch_assoc($this->_cursor)) {
			if ($first) {
				$buf .= '<tr>';
				foreach ($row as $k => $v) {
					$buf .= '<th bgcolor="#ffffff">' . $k . '</th>';
				}
				$buf .= '</tr>';
				$first = false;
			}
			$buf .= '<tr>';
			foreach ($row as $k => $v) {
				$buf .= '<th bgcolor="#ffffff">' . $v . '</th>';
			}
			$buf .= '</tr>';
		}
		$buf .= '</table><br /></div>';
		$this->freeResult();
		$this->_sql = $temp;
		$this->utf8encode($buf);
		return $buf;
	}

	public final function getNumRows($cur = null) {
		if (!$this->updateCursor()) {
			return 0;
		}

		return (int)pg_num_rows($this->_cursor);
	}

	public final function loadResult() {
		if (!$this->updateCursor()) {
			return null;
		}

		if (!defined('NO_DEBUG')) $start_time = microtime(true);

		if ($row = pg_fetch_row($this->_cursor)) {
			$this->utf8encode($row[0]);
			$this->_parse_time += (microtime(true) - $start_time);
			return $row[0];
		}
		if (!defined('NO_DEBUG')) $this->_parse_time += (microtime(true) - $start_time);
		return null;
	}

	public final function loadResultArray($numinarray = 0) {
		if (!$this->updateCursor()) {
			return null;
		}

		if (!defined('NO_DEBUG')) $start_time = microtime(true);

		$array = array();
		while ($row = pg_fetch_row($this->_cursor)) {
			$array[] = $row[$numinarray];
		}
		$this->utf8encode($array);
		if (!defined('NO_DEBUG')) $this->_parse_time += (microtime(true) - $start_time);
		return $array;
	}

	public final function loadAssocList($key = '') {
		if (!$this->updateCursor()) {
			return null;
		}

		if (!defined('NO_DEBUG')) $start_time = microtime(true);

		$array = array();
		while ($row = pg_fetch_assoc($this->_cursor)) {
			if ($key) {
				$array[$row[$key]] = $row;
			}else {
				$array[] = $row;
			}
		}
		$this->utf8encode($array);
		if (!defined('NO_DEBUG')) $this->_parse_time += (microtime(true) - $start_time);
		return $array;
	}

	public final function loadObjectList($key = '') {
		if (!$this->updateCursor()) {
			return null;
		}

		if (!defined('NO_DEBUG')) $start_time = microtime(true);

		$array = array();
		while ($row = pg_fetch_object($this->_cursor)) {
			if ($key) {
				$array[$row->$key] = $row;
			}else {
				$array[] = $row;
			}
		}
		$this->utf8encode($array);
		if (!defined('NO_DEBUG')) $this->_parse_time += (microtime(true) - $start_time);
		return $array;
	}

	public final function loadRow() {
		if (!$this->updateCursor()) {
			return null;
		}

		$start_time = microtime(true);

		$ret = null;
		if ($row = pg_fetch_row($this->_cursor)) {
			$ret = $row;
		}
		$this->utf8encode($ret);
		$this->_parse_time += (microtime(true) - $start_time);
		return $ret;
	}

	public final function loadAssocRow() {
		if (!$this->updateCursor()) {
			return null;
		}

		if (!defined('NO_DEBUG')) $start_time = microtime(true);

		$ret = null;
		if ($row = pg_fetch_assoc($this->_cursor)) {
			$ret = $row;
		}
		$this->utf8encode($ret);
		if (!defined('NO_DEBUG')) $this->_parse_time += (microtime(true) - $start_time);
		return $ret;
	}

	public final function loadRowList($key = '') {
		if (!$this->updateCursor()) {
			return null;
		}

		if (!defined('NO_DEBUG')) $start_time = microtime(true);

		$array = array();
		while ($row = pg_fetch_row($this->_cursor)) {
			if ($key) {
				$array[$row[$key]] = $row;
			}else {
				$array[] = $row;
			}
		}
		$this->utf8encode($array);
		if (!defined('NO_DEBUG')) $this->_parse_time += (microtime(true) - $start_time);
		return $array;
	}

	public final function insertid() {
		return (int)pg_last_oid($this->_cursor);
	}

	public final function freeResult() {
		if (is_object($this->_cursor)) {
			pg_free_result($this->_cursor);
		}
		if (!is_null($this->_cursor)) {
			$this->_cursor = null;
		}
	}

	public final function getVersion() {
		$version = pg_parameter_status($this->_resource, 'server_version');
		$this->utf8encode($version);
		return $version;
	}

	public final function getTableList() {
		$this->setQuery('SELECT table_name FROM information_schema.tables WHERE table_schema = \'public\'');
		return $this->loadResultArray();
	}

	public final function getTableCreate($tables) {
		$result = array();

		foreach ($tables as $tblval) {
			$result[$tblval] = 'CREATE TABLE "' . $tblval . '" (';
			$this->setQuery('SELECT ( \'"\'||column_name||\'" \'||data_type ||\'(\'||COALESCE(character_maximum_length,0)||\') \'||is_nullable||\' \'||COALESCE(column_default,\'\') ) FROM information_schema.columns WHERE table_name =\'' . $tblval . '\';');
			$rows = $this->loadResultArray();
			$result[$tblval] .= str_replace('YES', 'NULL', str_replace('NO', 'NOT NULL', str_replace('(0)', '', implode(',' . PHP_EOL, $rows))));
			$result[$tblval] .= ')';
		}

		return $result;
	}

	public final function getTableFields($tables) {
		$result = array();

		foreach ($tables as $tblval) {
			$this->setQuery('SELECT column_name, data_type  FROM information_schema.columns WHERE table_name =\'' . $tblval . '\';');
			$fields = $this->loadObjectList();
			foreach ($fields as $field) {
				$result[$tblval][$field->column_name] = $field->data_type;
			}
		}

		return $result;
	}

	public final function __destruct() {
		$this->freeResult();
		return pg_close($this->_resource);
	}
}
