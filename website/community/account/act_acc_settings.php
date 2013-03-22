<?php
	performUpdate();

	function performUpdate()
	{
		if (!IllaUser::loggedIn())
		{
			return;
		}

		$type = (isset($_POST['type']) ? $_POST['type'] : false);
		if (!$type)
		{
			return;
		}

		if ($type == 'personal')
		{
			$new_name = ( isset($_POST['name']) ? $_POST['name'] : '' );
			if (strlen($new_name)>0 && IllaUser::$name == IllaUser::$username)
			{
				IllaUser::$name = $new_name;
				Messages::add( (Page::isGerman()?'Dein Name wurde geändert.':'Your name was changed.'), 'info' );
			}
			elseif( IllaUser::$name != IllaUser::$username )
			{
				Messages::add( (Page::isGerman()?'Du darfst Deinen Namen nicht mehr ändern.':'You are not allowed to change your name anymore.'), 'error' );
			}

			$new_mail = ( isset($_POST['email']) ? $_POST['email'] : '' );
			if (strlen($new_mail)>0 && $new_mail != IllaUser::$email)
			{
				if (!preg_match( '/^([a-z0-9]+([-_\.]?[a-z0-9])+)@[a-z0-9äöü]+([-_\.]?[a-z0-9äöü])+\.[a-z]{2,4}$/i', $new_mail))
				{
					Messages::add( (Page::isGerman()?'Die E-Mail-Adresse ist ungültig.':'The email address is invalid.'), 'error' );
				}
				else
				{
					$pgSQL =& Database::getPostgreSQL( 'accounts' );
					$query = 'SELECT COUNT(*)'
					.PHP_EOL.' FROM account'
					.PHP_EOL.' WHERE acc_email = '.$pgSQL->Quote( $new_mail )
					;
					$pgSQL->setQuery( $query );
					if ($pgSQL->loadResult())
					{
						Messages::add( (Page::isGerman()?'Diese E-Mail-Adresse wird schon verwendet.':'This email address is already in use.'), 'error' );
					}
					else
					{
						IllaUser::$email = $new_mail;
						Messages::add( (Page::isGerman()?'Deine E-Mail-Adresse wurde geändert.':'Your email address was changed.'), 'info' );
					}
				}
			}

			$new_passwd = ( isset($_POST['passwd']) ? trim($_POST['passwd']) : '' );
			$new_passwd2 = ( isset($_POST['passwd2']) ? trim($_POST['passwd2']) : '' );
			if (strlen($new_passwd)>0 && strlen($new_passwd2)>0)
			{
				if ($new_passwd != $new_passwd2)
				{
					Messages::add( (Page::isGerman()?'Die eingegebenen Passwörter sind nicht identisch.':'Your entered passwords are not identical.'), 'error' );
				}
				else
				{
					IllaUser::$clean_pw = $new_passwd;
					Messages::add( (Page::isGerman()?'Dein Passwort wurde geändert.':'Your password was changed.'), 'info' );
				}
			}
		}
		elseif ($type == 'general')
		{
			IllaUser::$length = ( $_POST['length'] == 1 ? 1 : 0 );
			IllaUser::$weight = ( $_POST['weight'] == 1 ? 1 : 0 );
			IllaUser::$time_offset = ( isset($_POST['timezone']) ? (float)$_POST['timezone'] : IllaUser::$time_offset );
			IllaUser::$dst = ( $_POST['use_dst'] == 1 );
			IllaUser::$lang = ( $_POST['lang'] == 0 ? 'de' : 'us' );
			Messages::add( (Page::isGerman()?'Die Einstellungen wurden übernommen.':'All settings were saved.'), 'info' );
		}
		IllaUser::save();
	}