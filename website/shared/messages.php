<?php
class Messages {
	/**
	* Contains all information messages that shall be shown
	*
	* @access private
	* @var array
	*/
	static private $informations = array();

	/**
	* Contains all notice messages that shall be shown
	*
	* @access private
	* @var array
	*/
	static private $notice = array();

	/**
	* Contains all error messages that shall be shown
	*
	* @access private
	* @var array
	*/
	static private $error = array();

	/**
	* Add a message to the storage that shall be shown later
	*
	* @access public
	* @param string $ The message that shall be shown
	* @param string $ The type of the message (info, note, error)
	* @return boolean
	*/
	static public final function add($message, $type = 'info') {
		if ($type == 'info') {
			self::$informations[] = $message;
		} elseif ($type == 'note') {
			self::$notice[] = $message;
		} elseif ($type == 'error') {
			self::$error[] = $message;
		}else {
			return false;
		}
		return true;
	}

	/**
	* Parse the messages into a html description list
	*
	* @access public
	* @return string
	*/
	static public function parse() {
		$output = '';
		if (!self::any_msgs()) {
			return;
		}
		$output .= '<dl class="messages">';
		if (count(self::$error) > 0) {
			$output .= '<dt class="error">Error</dt>';
			$output .= '<dd class="error"><ul>';
			foreach(self::$error as $msg) {
				$output .= '<li>' . $msg . '</li>';
			}
			$output .= '</ul></dd>';
		}
		if (count(self::$informations) > 0) {
			$output .= '<dt class="info">Informations</dt>';
			$output .= '<dd class="info"><ul>';
			foreach(self::$informations as $msg) {
				$output .= '<li>' . $msg . '</li>';
			}
			$output .= '</ul></dd>';
		}
		if (count(self::$notice) > 0) {
			$output .= '<dt class="note">Notice</dt>';
			$output .= '<dd class="note"><ul>';
			foreach(self::$notice as $msg) {
				$output .= '<li>' . $msg . '</li>';
			}
			$output .= '</ul></dd>';
		}
		$output .= '</dl>';
		return $output;
	}

	/**
	* Checks if there are any messages stored
	*
	* @access public
	* @return boolean
	*/
	static public function any_msgs() {
		return (count(self::$informations) || count(self::$notice) || count(self::$error));
	}
}

?>