<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';
	
	includeWrapper::includeOnce(Page::getRootPath().'/community/account/inc_register.php');

	if (isset($_GET['activate']))
	{
		if (IllaUser::activate( $_GET['activate'] ))
		{
			Messages::add('Account wurde aktiviert.', 'info');
			Page::addPiwikGoal(2);
			includeWrapper::includeOnce( Page::getRootPath().'/community/account/de_newchar.php' );
			exit();
		}
		else
		{
			Messages::add('Aktivierungsschlüssel ist ungültig.', 'error');
			Messages::add('Es passiert manchmal, dass die Anfrage zur Aktivierung vom Browser doppelt gesendet wird, weil die Website nicht schnell genug reagierte. In dem Fall erscheint diese Fehlermeldung, aber der Account wird trotzdem aktiviert. Versuch dich in deinen Account einzuloggen.', 'note');
		}
	}

	if (isset($_POST['submit']))
	{
		if (isTorRequest())
		{
			Messages::add('TOR-Proxynetzwerk erkannt! Registrierung nicht gestattet.', 'error');
		}
		else
		{
			applyUserData();

			if ( IllaUser::register() )
			{
				Messages::add('Registrierung war erfolgreich. Du bekommst jetzt eine E-Mail, mit der Du den Account aktivieren kannst.', 'info');
				Page::addPiwikGoal(1);
				includeWrapper::includeOnce( Page::getRootPath().'/general/de_startpage.php' );
				exit();
			}
			else
			{
				Messages::add('Registrierung fehlgeschlagen. Überprüfe den verwendeten Loginnamen. Sonderzeichen sind nicht erlaubt.', 'error');
			}
		}
	}

	Page::setTitle( array( 'Account', 'Registrieren' ) );
	Page::setDescription( 'Auf dieser Seite kannst Du Dich bei Illarion registrieren' );
	Page::setKeywords( array( 'Account', 'registrieren', 'einsteigen', 'mitspielen' ) );

	Page::addJavaScript( array( 'jquery', 'wz_tooltip', 'register' ) );

	Page::setXHTML();
	Page::Init();
?>
<h1>Neuen Account anlegen</h1>

<h2>Wichtige Informationen</h2>

<p>Auf dieser Seite kannst Du einen Account bei Illarion anlegen. Dieser Account
versetzt Dich aber noch <b>nicht</b> in die Lage, Illarion zu spielen. Dazu musst Du im
Anschluss noch einen Charakter anlegen den Du spielen willst.</p>

<p>Spieler, die schon einen Account haben, möchten wir darauf hinweisen, dass es verboten
ist, mehr als einen Account zu erstellen.</p>

<p>Informationen mit einem * dahinter müssen eingetragen werden. Alle anderen sind
optional. Die E-Mail-Adresse muss gültig sein, da zu dieser eine E-Mail geschickt wird, um den
Account zu aktivieren.</p>

<p>Damit dieses Formular benutzt werden kann, muss der Browser JavaScript unterstützen.
</p>

<?php if (isTorRequest()): ?>
<p style="font-weight:bold;">Die Homepage hat erkannt, dass du das
TOR-Proxynetzwerk verwendest. Eine Registrierung bei Illarion ist nur dann
möglich, wenn du diesen Proxy ausschaltest.</p>
<?php endif; ?>

<h2>Accountinformationen</h2>

<form action="<?php echo Page::getURL(); ?>/community/account/de_register.php" method="post">
	<table style="width:100%">
		<tr>
			<td style="width:130px;"><a title="" class="tooltip" onmouseover="Tip('Dieser Name muss auf dem Server einzigartig sein, und dient dazu, Dich auf der Homepage (Dein Account) einzuloggen. Er besteht aus mindestens 5 und maximal 32 Zeichen. Groß- und Kleinbuchstaben, sowie Zahlen, Binde- und Unterstriche sind erlaubt. Andere Sonderzeichen inklusive Leerzeichen sind nicht erlaubt.',TITLE,'Loginname',WIDTH,-300);" onmouseout="UnTip();">Loginname:</a></td>
			<td style="width:10px;"></td>
			<td style="width:162px;"><input type="text" name="username" id="username" value="" /> *</td>
			<td style="text-indent:15px;" id="check_username"></td>
		</tr>
		<tr>
			<td><a title="" class="tooltip" onmouseover="Tip('Nur diesen Namen werden die anderen Spieler sehen. Weiterhin wird dieser Name für Deinen ersten Forenaccount verwendet. Wenn Du den Namen nicht festlegst, wird Dein Login-Name genommen. Sobald Du explizit einen Namen angeben hast, ist dieser nicht mehr änderbar.',TITLE,'Angezeigter Name',WIDTH,-300);" onmouseout="UnTip();">Angezeigter Name:</a></td>
			<td></td>
			<td><input type="text" name="name" value="" /></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td><a title="" class="tooltip" onmouseover="Tip('Diese E-Mail-Adresse wird verwendet, wenn es für das Team von Illarion nötig ist, mit Dir Kontakt aufzunehmen. Sie wird gespeichert, ist aber für niemanden außerhalb des Teams in irgendeiner Form sichtbar, es sei denn, Du erlaubst es explizit. Außerdem wird an diese Adresse eine E-Mail geschrieben, um den Account zu aktivieren.',TITLE,'E-Mail-Adresse',WIDTH,-300);" onmouseout="UnTip();">E-Mail-Adresse:</a></td>
			<td></td>
			<td><input type="text" name="email" id="email" value="" /> *</td>
			<td id="check_email" style="text-indent:15px;"></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td><a title="" class="tooltip" onmouseover="Tip('Mit diesem Passwort kannst Du Dich in Zukunft auf der Homepage und im Spiel einloggen. Das Passwort muss mindestens 5 Zeichen lang sein, maximal 15. Einschränkungen bezüglich der Zeichen gibt es nicht, allerdings ist zu empfehlen, Groß- und Kleinbuchstaben, Zahlen und Sonderzeichen zu verwenden, damit das Passwort möglichst sicher ist.',TITLE,'Passwort',WIDTH,-300);" onmouseout="UnTip();">Passwort:</a></td>
			<td></td>
			<td><input type="password" name="passwd" id="passwd" value="" onkeyup="checkPasswd();return true;" /> *</td>
		</tr>
		<tr>
			<td><a title="" class="tooltip" onmouseover="Tip('Hier musst Du das selbe Passwort noch einmal eingeben, um sicherzustellen, dass Du Dich bei der ersten Eingabe nicht vertippt hast.',TITLE,'Passwort wiederholen',WIDTH,-300);" onmouseout="UnTip();">Passwort wiederholen:</a></td>
			<td></td>
			<td><input type="password" name="passwd2" id="passwd2" value="" /> *</td>
			<td id="check_passwd" style="text-indent:15px;"></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td><a title="" class="tooltip" onmouseover="Tip('Hier kannst du die Sprache einstellen mit der dein Account laufen soll.',TITLE,'Sprache',WIDTH,-300);" onmouseout="UnTip();">Sprache:</a></td>
			<td></td>
			<td>
				<select name="language">
					<option value="0" selected="selected">deutsch</option>
					<option value="1">englisch</option>
				</select>
			</td>
			<td></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td colspan="3" class="center"><input type="submit" value="Abschicken" name="submit" id="submit" disabled="disabled" class="disabled" /></td>
		</tr>
	</table>
</form>