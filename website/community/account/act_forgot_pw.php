<?php
	if (isset($_POST['email']))
	{
		$db =& Database::getPostgreSQL( 'homepage' );

		$query = 'SELECT acc_id, acc_login, acc_email'
		.PHP_EOL.' FROM account'
		.PHP_EOL.' WHERE acc_email = '.$db->Quote( $_POST['email'] )
		;
		$db->setQuery( $query );

		list($id,$name,$email) = $db->loadRow();

		if ((int)$id)
		{
		    $db->setQuery( 'SELECT COUNT(*) FROM mail_cert WHERE id = '.$db->Quote((int)$id).' AND type = 0' );
		    if ($db->loadResult())
		    {
		        Messages::add( (Page::isGerman() ? 'Der Account wurde noch nicht aktiviert.' : 'The account was not activated yet.'), 'error' );
		    }
		    else
		    {
				$db->setQuery('DELETE FROM mail_cert WHERE id = '.$db->Quote($id).' AND type = 1');
				$db->query();
				
		        $valid_key = '';
    			do
    			{
    				$valid_key = md5( rand( 0,100000000 ) . microtime() );
    				$db->setQuery( 'SELECT COUNT(*) FROM mail_cert WHERE key = '.$db->Quote($valid_key).' AND type = 1' );
    			} while ($db->loadResult());

    			$db->setQuery( 'INSERT INTO mail_cert VALUES ('.$db->Quote($id).','.$db->Quote($valid_key).',1)');
    			$db->query();

    			$mail = new PHPMailer();
    			$mail->IsMail();
    			$mail->IsHTML(true);
    			$mail->WordWrap = 80;
    			$mail->CharSet = 'utf-8';
    			$mail->SetLanguage( Page::getLanguage(), '' );
    			$mail->AddAddress( $email, $name );
				$mail->Sender = 'accounts@illarion.org';
    			$mail->From = 'accounts@illarion.org';
    			$mail->FromName = 'Illarion';
    			$mail->AddReplyTo( 'accounts@illarion.org', 'Illarion' );

    			if (Page::isGerman())
    			{
    				$mail->Subject = 'Neues Passwort';
    				$mail->Body = "<html><body><h3>Grüße ".$name.",</h3><p>auf der Illarion-Homepage wurde ein neues Passwort für Dich angefordert. Du kannst "
    				. "jetzt ein neues Passwort eingeben, indem <a href='". Page::getURL()."/community/account/de_forgot_pw.php?id=".$valid_key."'>Du hier klickst</a>.</p>"
    				. "<p>Wenn Du kein neues Passwort eingeben willst, dann ignoriere diese E-Mail einfach. Dein altes Passwort bleibt dann "
    				. "weiterhin gültig.</p><p>Das Team von <a href='https://illarion.org'>Illarion</a></p>";
					$mail->AltBody = "Grüße ".$name.",\n\nauf der Illarion-Homepage wurde ein neues Passwort für Dich angefordert. Du kannst "
						. "jetzt ein neues Passwort eingeben, indem Du auf den folgenden Link klickst:\n\n"
						. Page::getURL()."/community/account/de_forgot_pw.php?id=".$valid_key."\n\n"
						. "Wenn Du kein neues Passwort eingeben willst, dann ignoriere diese E-Mail einfach. Dein altes Passwort bleibt dann "
						. "weiterhin gültig.\n\nDas Team von Illarion\nhttps://illarion.org";
    			}
    			else
    			{
    				$mail->Subject = 'New password';
					$mail->Body = "<html><body><h3>Greetings ".$name.",</h3><p>there was a request for a new password for your account on the Illarion homepage."
						. " You are now able to enter a new password by <a href='". Page::getURL()."/community/account/de_forgot_pw.php?id=".$valid_key."'>following this link</a>.</p>"
						. "<p>In case you don't want to enter a new password please just ignore this email. Your old password remains valid.</p>"
						. "<p>The team of <a href='https://illarion.org'>Illarion</a></p>";
					$mail->AltBody = "Greetings ".$name.",\n\nthere was a request for a new password for your account on the Illarion homepage."
						. " You are now able to enter a new password after following this link:\n\n"
						. Page::getURL()."/community/account/us_forgot_pw.php?id=".$valid_key."\n\n"
						. "In case you don't want to enter a new password please just ignore this email. Your old password remains valid."
						. "\n\nThe team of Illarion\nhttps://illarion.org";
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
		$db =& Database::getPostgreSQL( 'homepage' );

		$query = 'SELECT id'
		.PHP_EOL.' FROM mail_cert'
		.PHP_EOL.' WHERE key = '.$db->Quote( $_POST['id'] )
		.PHP_EOL.' AND type = 1'
		;
		$db->setQuery( $query );

		$accid = (int)$db->loadResult();
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

				$db->setQuery( 'DELETE FROM mail_cert WHERE key = '.$db->Quote($_POST['id']).' AND type = 1' );
				$db->query();

				$query = 'UPDATE account'
				.PHP_EOL.' SET acc_passwd = '.$db->Quote( $pass )
				.PHP_EOL.' WHERE acc_id = '.$db->Quote( $accid )
				;
				$db->setQuery( $query );
				$db->query();
				Messages::add( (Page::isGerman() ? 'Das Passwort wurde geändert.' : 'The password was changed.'), 'info' );
			}
			else
			{
				Messages::add( (Page::isGerman() ? 'Passwort ungültig.' : 'Password invalid.'), 'error' );
			}
		}
	}
?>
