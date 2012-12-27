<?php
	function isTorRequest()
	{
		$reverse_client_ip = implode('.', array_reverse(explode('.', $_SERVER['REMOTE_ADDR'])));
		$reverse_server_ip = implode('.', array_reverse(explode('.', $_SERVER['SERVER_ADDR'])));
		$hostname = $reverse_client_ip . "." . $_SERVER['SERVER_PORT'] . "." . $reverse_server_ip . ".ip-port.exitlist.torproject.org";
		return gethostbyname($hostname) == "127.0.0.2";
	}
	
	function applyUserData()
	{
		IllaUser::$username = trim(stripslashes($_POST['username']));
		if (isset($_POST['name']))
		{
			IllaUser::$name = trim(stripslashes($_POST['name']));
		}
		else
		{
			IllaUser::$name = IllaUser::$username;
		}
		if ($_POST['passwd'] == $_POST['passwd2'])
		{
			IllaUser::$clean_pw = trim($_POST['passwd']);
		}
		IllaUser::$email = $_POST['email'];
		IllaUser::$lang = ( isset( $_POST['language'] ) && (int)$_POST['language'] == 1 ? 'us' : 'de' );
	}
?>