<?php
	if (isset($_POST['email']))
	{
		$mySQL =& Database::getMySQL();

		$query = 'SELECT `id`, `name`, `email`'
		.PHP_EOL.' FROM `homepage_user`'
		.PHP_EOL.' WHERE `email` = '.$mySQL->Quote( $_POST['email'] )
		;
		$mySQL->setQuery( $query );

		list($id,$name,$email) = $mySQL->loadRow();

		if ((int)$id)
		{
		    $mySQL->setQuery( 'SELECT COUNT(*) FROM `homepage_mail_cert` WHERE `id` = '.$mySQL->Quote((int)$id).' AND `type` = 0' );
		    if ($mySQL->loadResult())
		    {
		        Messages::add( (Page::isGerman() ? 'Der Account wurde noch nicht aktiviert.' : 'The account was not activated yet.'), 'error' );
		    }
		    else
		    {
				$mySQL->setQuery('DELETE FROM `homepage_mail_cert` WHERE `id` = '.$mySQL->Quote($id).' AND `type` = 1');
				$mySQL->query();
				
		        $valid_key = '';
    			do
    			{
    				$valid_key = md5( rand( 0,100000000 ) . microtime() );
    				$mySQL->setQuery( 'SELECT COUNT(*) FROM `homepage_mail_cert` WHERE `key` = '.$mySQL->Quote($valid_key).' AND `type` = 1' );
    			} while ($mySQL->loadResult());

    			$mySQL->setQuery( 'INSERT INTO `homepage_mail_cert` VALUES ('.$mySQL->Quote($id).','.$mySQL->Quote($valid_key).',1)');
    			$mySQL->query();
    			$mail = new PHPMailer();
    			$mail->IsMail();
    			$mail->IsHTML(false);
    			$mail->WordWrap = 80;
    			$mail->CharSet = 'utf-8';
    			$mail->SetLanguage( Page::getLanguage(), '' );
    			$mail->AddAddress( $email, $name );
    			$mail->From = 'accounts@illarion.org';
    			$mail->FromName = 'Illarion';
    			$mail->AddReplyTo( 'accounts@illarion.org', 'Illarion' );

    			if (Page::isGerman())
    			{
    				$mail->Subject = 'Neues Passwort';
    				$mail->Body = "Grüße ".$name.",\n\nauf der Illarion-Homepage wurde ein neues Passwort für Dich angefordert. Du kannst "
    				. "jetzt ein neues Passwort eingeben, indem Du auf den folgenden Link klickst:\n\n"
    				. Page::getURL()."/community/account/de_forgot_pw.php?id=".$valid_key."\n\n"
    				. "Wenn Du kein neues Passwort eingeben willst, dann ignoriere diese E-Mail einfach. Dein altes Passwort bleibt dann "
    				. "weiterhin gültig.\n\nDas Team von Illarion\nhttp://illarion.org";
    			}
    			else
    			{
    				$mail->Subject = 'New password';
    				$mail->Body = "Greetings ".$name.",\n\nthere was a request for a new password for your account on the Illarion homepage."
    				. " You are now able to enter a new password after following this link:\n\n"
    				. Page::getURL()."/community/account/us_forgot_pw.php?id=".$valid_key."\n\n"
    				. "In case you don't want to enter a new password please just ignore this email. Your old password remains valid."
    				. "\n\nThe team of Illarion\nhttp://illarion.org";
    			}
    			if(!$mail->Send())
    			{
    				Messages::add( $mail->ErrorInfo, 'error' );
    			}
    			else
    			{
    				Messages::add( (Page::isGerman() ? 'Die E-Mail wurde abgeschickt.' : 'The email was sent.'), 'info' );
    			}
    		}
		}
		else
		{
			Messages::add( (Page::isGerman() ? 'Es konnte kein passender Account gefunden werden.' : 'It was impossible to find a fitting account.'), 'error' );
		}

	}
	elseif (isset($_POST['passwd']))
	{
		$mySQL =& Database::getMySQL();

		$query = 'SELECT `id`'
		.PHP_EOL.' FROM `homepage_mail_cert`'
		.PHP_EOL.' WHERE `key` = '.$mySQL->Quote( $_POST['id'] )
		.PHP_EOL.' AND `type` = 1'
		;
		$mySQL->setQuery( $query );

		$accid = (int)$mySQL->loadResult();
		if (!$accid)
		{
			Messages::add( (Page::isGerman() ? 'Schlüssel ungültig!' : 'Key invalid!'), 'error' );
		}
		else
		{
			$pass = trim($_POST['passwd']);
			if ($pass == trim($_POST['passwd2']) && strlen($pass)>4)
			{
				$pass = crypt(stripslashes($pass), '$1$illarion1');

				$query = 'UPDATE `homepage_user`'
				.PHP_EOL.' SET `passwd` = '.$mySQL->Quote( $pass )
				.PHP_EOL.' WHERE `id` = '.$mySQL->Quote( $accid )
				;
				$mySQL->setQuery( $query );
				$mySQL->query();
				$mySQL->setQuery( 'DELETE FROM `homepage_mail_cert` WHERE `key` = '.$mySQL->Quote($_POST['id']).' AND `type` = 1' );
				$mySQL->query();

				$pgSQL =& Database::getPostgreSQL( 'accounts' );

				$query = 'UPDATE account'
				.PHP_EOL.' SET acc_passwd = '.$pgSQL->Quote( $pass )
				.PHP_EOL.' WHERE acc_id = '.$pgSQL->Quote( $accid )
				;
				$pgSQL->setQuery( $query );
				$pgSQL->query();
				Messages::add( (Page::isGerman() ? 'Das Passwort wurde geändert.' : 'The password was changed.'), 'info' );
			}
			else
			{
				Messages::add( (Page::isGerman() ? 'Passwort ungültig.' : 'Password invalid.'), 'error' );
			}
		}
	}
?>
