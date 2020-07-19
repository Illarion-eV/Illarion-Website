<?php
	include_once $_SERVER['DOCUMENT_ROOT'] . '/shared/database.php';
	include_once $_SERVER['DOCUMENT_ROOT'] . '/shared/email/class.phpmailer.php';

	if (!defined( 'TODAY_TIME' ))
	{
		define( 'TODAY_TIME', date('Y-m-d') );
		define( 'TODAY_TIMESTAMP', mktime(0,0,0,date('m'),date('d'),date('Y') ) );
	}

	// Messages
	$de_inactive = <<<TXT
Lieber Spieler,

du hast dich vor einer Weile beim Online-Rollenspiel Illarion (https://illarion.org) angemeldet, jedoch schon länger nicht mehr eingeloggt bzw. mit deinem Charakter nicht weiter gespielt.

Da wir Illarion ständig weiterentwickeln und daher immer an Verbesserungsvorschlägen und Kritik interessiert sind, würden wir dich bitten, auf diese E-Mail kurz zu antworten und uns die Gründe dafür zu nennen, warum du nicht weiter gespielt hast.

Herzlichen Dank schon im Voraus,
Das Team von Illarion

https://illarion.org
TXT;

	$us_inactive = <<<TXT
Dear player,

Some time ago, you created an account for the online roleplaying game Illarion (https://illarion.org), but you have either not logged in recently or you did not really start playing the game.

Since we are actively developing the game and are looking for suggestions and criticism, we would kindly ask you to send a short reply to this e-mail, telling us the reasons why you ceased playing.

Thank you very much in advance,
The Illarion Staff

https://illarion.org
TXT;

	$de_notactivated = <<<TXT
Lieber Spieler,

vor einigen Tagen hast du dich beim Online-Rollenspiel Illarion (https://illarion.org) angemeldet. Allerdings hast du deinen neuen Account niemals aktiviert.

Sollte es ein Problem bei der Aktivierung deines Accounts gegeben haben, wende dich bitte an den Support von Illarion. Dazu kannst du auf diese E-Mail einfach antworten oder im Forum von Illarion nach Hilfe fragen.

Dein Aktivierungslink war:
https://illarion.org/community/account/de_register.php?activate=%s

Wenn du nicht daran interessiert bist, deinen Illarion-Account zu aktivieren, ignoriere diese E-Mail bitte. Es werden dann keine weiteren E-Mails von Illarion an dich geschickt.

Mit freundlichen Grüßen,
Das Team von Illarion

https://illarion.org
TXT;

	$us_notactivated = <<<TXT
Dear player,

some days ago you registered at the online roleplaying game Illarion (https://illarion.org), but you never activated your account.

In case there was a problem with the activation of your account, please contact the technical support of Illarion. To do this, you can just answer to this e-mail or write a help request at the board of Illarion.

Your activation link was:
https://illarion.org/community/account/us_register.php?activate=%s

If you are not interested in activating your Illarion account, please just ignore this e-mail. There wont be further e-mails sent to you.

Yours sincerely,
The Illarion Staff

https://illarion.org
TXT;

	$de_veryinactive = <<<TXT
Lieber Spieler,

das Online-Rollenspiel Illarion (https://illarion.org) vermisst dich! Es ist einige Zeit vergangen, seitdem du mit deinen Charakteren das Land Illarion besucht hast und seitdem ist sicherlich eine Menge passiert. Dein Account ist weiterhin spielbar und wir würden uns freuen, dich wieder als Spieler begrüßen zu können.

Solltest du allerdings entschieden haben, nie wieder Illarion spielen zu wollen, so sind wir sehr an den Gründen dafür interessiert. Jeder Spieler, der Illarion verlässt, ist ein Verlust für die Community und zeigt uns, dass wir das Spiel verbessern können. Bitte teile uns als Antwort auf diese E-Mail mit, warum du dich dazu entschlossen hast, Illarion zu verlassen.

Herzlichen Dank und hoffentlich bis bald,
Das Team von Illarion 

https://illarion.org
TXT;

	$us_veryinactive = <<<TXT
Dear player,

the online roleplaying game Illarion (https://illarion.org) misses you! It has been a while since you visited the world Illarion with your characters. In the meantime, many events have taken place in the game. Your account remains active and we are looking forward to welcoming you once again as a player.

If you decided not to play Illarion anymore, we would kindly ask you to tell us the reasons for this decision. Every player who leaves Illarion is a loss for the community and encourages us to improve the game. Please give us the reasons for your decision to abandon Illarion as answer to this e-mail.

Thank you very much and see you soon,
The Illarion Staff 

https://illarion.org
TXT;

	$pgsql =& Database::getPostgreSQL();

	// Collect and send a mail to every player that was not online the last time 28 days ago
	$query = 'SELECT DISTINCT "chr1"."chr_accid"'
	.PHP_EOL.' FROM "illarionserver"."chars" AS "chr1"'
	.PHP_EOL.' WHERE "chr1"."chr_lastsavetime" < '.$pgsql->Quote( TODAY_TIMESTAMP-(60*60*24*27) )
	.PHP_EOL.' AND "chr1"."chr_lastsavetime" >= '.$pgsql->Quote( TODAY_TIMESTAMP-(60*60*24*28) )
	.PHP_EOL.' AND ((SELECT COUNT(*) FROM "illarionserver"."chars" AS "chr2" WHERE "chr1"."chr_accid" = "chr2"."chr_accid" AND "chr2"."chr_lastsavetime" >= '.$pgsql->Quote( TODAY_TIMESTAMP-(60*60*24*27) ).') = 0)'
	;
	$pgsql->setQuery( $query );
	$last_played_accs = $pgsql->loadResultArray();

	$query = 'SELECT acc_id, acc_login, acc_name, acc_email'
	.PHP_EOL.' FROM account'
	.PHP_EOL.' WHERE acc_id IN('.implode(',',$last_played_accs).')'
	;
	$pgsql->setQuery( $query );
	$email_targets = $pgsql->loadAssocList();
	
	// Collect and send a mail to every player that was not online the last time 28 days ago
	$query = 'SELECT DISTINCT "chr1"."chr_accid"'
	.PHP_EOL.' FROM "illarionserver"."chars" AS "chr1"'
	.PHP_EOL.' WHERE "chr1"."chr_lastsavetime" <= '.$pgsql->Quote( TODAY_TIMESTAMP-(60*60*24*90) )
	.PHP_EOL.' AND "chr1"."chr_lastsavetime" >= '.$pgsql->Quote( TODAY_TIMESTAMP-(60*60*24*91) )
	.PHP_EOL.' AND ((SELECT COUNT(*) FROM "illarionserver"."chars" AS "chr2" WHERE "chr1"."chr_accid" = "chr2"."chr_accid" AND "chr2"."chr_accid" > '.$pgsql->Quote( TODAY_TIMESTAMP-(60*60*24*90) ).') = 0)'
	;
	$pgsql->setQuery( $query );
	$very_old_accs = $pgsql->loadResultArray();

	$query = 'SELECT acc_id, acc_login, acc_name, acc_email'
	.PHP_EOL.' FROM account'
	.PHP_EOL.' WHERE acc_id IN('.implode(',',$very_old_accs).')'
	;
	$pgsql->setQuery( $query );
	$email_targets_very_old = $pgsql->loadAssocList();

	$query = 'SELECT acc_id, acc_login, acc_name, acc_email, mail_cert.key'
	.PHP_EOL.' FROM account'
	.PHP_EOL.' INNER JOIN mail_cert ON mail_cert.id = acc_id'
	.PHP_EOL.' WHERE acc_lastseen >= '.$pgsql->Quote( date( 'Y-m-d', TODAY_TIMESTAMP-(60*60*24*4) ) )
	.PHP_EOL.' AND acc_lastseen < '.$pgsql->Quote( date( 'Y-m-d', TODAY_TIMESTAMP-(60*60*24*3) ) )
	.PHP_EOL.' AND mail_cert.type = 0'
	.PHP_EOL.' AND acc_recv_inact_mails = 0'
	;
	$pgsql->setQuery( $query );
	$email_targets_notactive = $pgsql->loadAssocList();

	$accounts_overall = array_merge($last_played_accs, $very_old_accs);
	
	foreach ($email_targets_notactive as $acc)
	{
		$accounts_overall[] = $acc['acc_id'];
	}
	$accounts_overall = array_unique($accounts_overall);
	
	$query = 'UPDATE account'
	.PHP_EOL.' SET acc_recv_inact_mails = acc_recv_inact_mails + 1'
	.PHP_EOL.' WHERE acc_id IN ('.implode(',',$accounts_overall).')'
	;
	$pgsql->setQuery( $query );
	$pgsql->query();

	$query = 'SELECT "acc_id", "acc_lang"'
	.PHP_EOL.' FROM "accounts"."account"'
	.PHP_EOL.' WHERE "acc_id" IN ('.implode(',',$accounts_overall).')'
	;
	$pgsql->setQuery( $query );
	$languages = $pgsql->loadAssocList( 'acc_id' );

    $real_mail_targets = array();
    
    if (count($email_targets) > 0)
    {	
		foreach($email_targets as $poss_target)
		{
			$mail_data = explode('@',strtolower($poss_target['acc_email']));
			$real_mail_targets[] = $poss_target;
		}
    }

    $real_mail_targets_very_old = array();
    	
	if (count($email_targets_very_old) > 0)
	{
		foreach($email_targets_very_old as $poss_target)
		{
			$mail_data = explode('@',strtolower($poss_target['acc_email']));
			$real_mail_targets_very_old[] = $poss_target;
		}
	}

    $real_mail_targets_inactive = array();
    
    if (count($email_targets_notactive) > 0) 
    {	
		foreach($email_targets_notactive as $poss_target)
		{
			$mail_data = explode('@',strtolower($poss_target['acc_email']));
			$real_mail_targets_inactive[] = $poss_target;
		}
    }

	$targets_inactive = '';
	$targets_veryinactive = '';
	$targets_activation = '';
	$error = '';

	$mail = new PHPMailer();
	$mail->IsMail();
	$mail->IsHTML(false);
	$mail->WordWrap = 80;
	$mail->CharSet = 'utf-8';
	$mail->From = 'nitram@illarion.org';
	$mail->FromName = 'Illarion';
	$mail->AddReplyTo( 'nitram@illarion.org', 'Illarion' );
	$mail->SetLanguage( 'de', '' );
	$mail->SingleTo = false;

	$send = false;

	$send_mail_cnt = 0;
	
	foreach($real_mail_targets as $target)
	{
		if ($send_mail_cnt > 100) {
			break;
		} else {
			$send_mail_cnt++;
		}
		
	    $mail->ClearAddresses();
	    $mail->AddAddress( $target['acc_email'], ($target['acc_name'] ? $target['acc_name'] : $target['acc_login']) );
		if ($languages[$target['acc_id']]['acc_lang'] == 0)
		{
		    $mail->Subject = '[Illarion] Inaktiver Account';
		    $mail->Body = $de_inactive;
			$targets_inactive.= '<li>'.$target['acc_email'].'(g)';
		}
		else
		{
		    $mail->Subject = '[Illarion] Inactive account';
	        $mail->Body = $us_inactive;
			$targets_inactive.= '<li>'.$target['acc_email'].'(e)';
		}
		if (defined( 'SEND_MAILS' ))
		{
		    $mail->Send();
		    if ($mail->isError())
    		{
    			$targets_inactive.= ' - Error: '.$mail->ErrorInfo;
    		}
	    }
	    $targets_inactive.= '</li>';
	}

	$send_mail_cnt = 0;
	
	foreach($real_mail_targets_very_old as $target)
	{
		if ($send_mail_cnt > 100) {
			break;
		} else {
			$send_mail_cnt++;
		}
		
	    $mail->ClearAddresses();
	    $mail->AddAddress( $target['acc_email'], ($target['acc_name'] ? $target['acc_name'] : $target['acc_login']) );
		if ($languages[$target['acc_id']]['acc_lang'] == 0)
		{
		    $mail->Subject = '[Illarion] Illarion vermisst dich!';
		    $mail->Body = $de_veryinactive;
			$targets_veryinactive.= '<li>'.$target['acc_email'].'(g)';
		}
		else
		{
		    $mail->Subject = '[Illarion] Illarion misses you!';
	        $mail->Body = $us_veryinactive;
			$targets_veryinactive.= '<li>'.$target['acc_email'].'(e)';
		}
		if (defined( 'SEND_MAILS' ))
		{
		    $mail->Send();
		    if ($mail->isError())
    		{
    			$targets_veryinactive.= ' - Error: '.$mail->ErrorInfo;
    		}
	    }
	    $targets_veryinactive.= '</li>';
	}

	$send_mail_cnt = 0;
	foreach($real_mail_targets_inactive as $target)
	{
		if ($send_mail_cnt > 100) {
			break;
		} else {
			$send_mail_cnt++;
		}
		
        $mail->ClearAddresses();
	    $mail->AddAddress( $target['acc_email'], ($target['acc_name'] ? $target['acc_name'] : $target['acc_login']) );
		if ($languages[$target['acc_id']]['acc_lang'] == 0)
		{
		    $mail->Subject = '[Illarion] Nicht aktivierter Account';
	        $mail->Body = sprintf( $de_notactivated, $target['key'] );
			$targets_activation.= '<li>'.$target['acc_email'].'(g)';
		}
		else
		{
		    $mail->Subject = '[Illarion] Unactivated account';
		    $mail->Body = sprintf( $us_notactivated, $target['key'] );
			$targets_activation.= '<li>'.$target['acc_email'].'(e)';
		}
		if (defined( 'SEND_MAILS' ))
		{
		    $mail->Send();
		    if ($mail->isError())
    		{
    			$targets_activation.= ' - Error: '.$mail->ErrorInfo;
    		}
	    }
	    $targets_activation.= '</li>';
	}

	echo '<h1>Sended Mails to players</h1>';
	echo '<ul>';
	if (!defined( 'SEND_MAILS' ))
	{
		echo '<li>No mails were send</li>';
	}
	echo '<li>Leaving players: ',count($last_played_accs);
	if (count($last_played_accs) > 100)
	{
		echo ' (limited to 100 mails)';
	}
	echo '</li>';
	
	echo '<li>Very inactive players: ',count($very_old_accs);
	if (count($very_old_accs) > 100)
	{
		echo ' (limited to 100 mails)';
	}
	echo '</li>';
	
	echo '<li>Not activated accounts: ',count($email_targets_notactive);
	if (count($email_targets_notactive) > 100)
	{
		echo ' (limited to 100 mails)';
	}
	echo '</li>';
	
	echo '<li>Date: ',TODAY_TIME,'</li>';
	echo '<li>Targets that got inactive<ul>';
	echo $targets_inactive;
	echo '</ul></li>';
	echo '<li>Targets that got inactive long ago<ul>';
	echo $targets_veryinactive;
	echo '</ul></li>';
	echo '<li>Targets did not activate their accounts<ul>';
	echo $targets_activation;
	echo '</ul></li>';
	echo '</ul>';
?>
