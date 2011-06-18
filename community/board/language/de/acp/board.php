<?php
/**
*
* acp_board [Deutsch — Du]
*
* @package language
* @version $Id: board.php 192 2007-05-17 19:54:57Z philipp $
* @copyright (c) 2005 phpBB Group; 2006 phpBB.de
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
* Deutsche Übersetzung durch die Übersetzer-Gruppe von phpBB.de:
* (http://www.phpbb.de/go/3/uebersetzer)
* Frank Doerr, Dirk Gaffke, Christopher Gerharz, Ingo Köhler, Philipp Kordowich, Ingo Migliarina, Paul Rauch
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

// Board Settings
$lang = array_merge($lang, array(
	'ACP_BOARD_SETTINGS_EXPLAIN'	=> 'Hier kannst du einige grundlegende Einstellungen deines Boards vornehmen, ihm einen passenden Namen und eine Beschreibung geben und, neben anderen Werten, die Standard-Einstellungen für Zeitzone und Sprache anpassen.',
	'CUSTOM_DATEFORMAT'				=> 'Eigenes …',
	'DEFAULT_DATE_FORMAT'			=> 'Datumsformat',
	'DEFAULT_DATE_FORMAT_EXPLAIN'	=> 'Die Syntax entspricht der der <a href="http://www.php.net/date"><code>date()</code></a>-Funktion von PHP.',
	'DEFAULT_LANGUAGE'				=> 'Standard-Sprache',
	'DEFAULT_STYLE'					=> 'Standard-Style',
	'DISABLE_BOARD'					=> 'Board deaktivieren',
	'DISABLE_BOARD_EXPLAIN'			=> 'Hiermit sperrst du das Board für alle Benutzer. Wenn du möchtest, kannst du eine kurze Nachricht (bis zu 255 Zeichen) angeben.',
	'OVERRIDE_STYLE'				=> 'Benutzer-Style überschreiben',
	'OVERRIDE_STYLE_EXPLAIN'		=> 'Verwendet den Standard-Style statt den individuell von den Benutzern gewählten Styles.',
	'SITE_DESC'						=> 'Beschreibung des Boards',
	'SITE_NAME'						=> 'Name des Boards',
	'SYSTEM_DST'					=> 'Derzeit ist Sommerzeit',
	'SYSTEM_TIMEZONE'				=> 'Zeitzone',
	'WARNINGS_EXPIRE'				=> 'Gültigkeit von Verwarnungen',
	'WARNINGS_EXPIRE_EXPLAIN'		=> 'Die Anzahl der Tage, nach denen eine Verwarnung automatisch aus dem Benutzer-Profil gelöscht wird.',
));

// Board Features
$lang = array_merge($lang, array(
	'ACP_BOARD_FEATURES_EXPLAIN'	=> 'Hier kannst du einige Funktionen des Boards aktivieren bzw. deaktivieren.',

	'ALLOW_ATTACHMENTS'			=> 'Dateianhänge erlauben',
	'ALLOW_BIRTHDAYS'			=> 'Geburtstage aktivieren',
	'ALLOW_BIRTHDAYS_EXPLAIN'	=> 'Aktiviert die Eingabe von Geburtstagen und die Anzeige des Alters im Profil. Beachte, dass für die Geburtstagsanzeige in der Foren-Übersicht eine getrennte Option in den Einstellungen zur Serverlast existiert.',
	'ALLOW_BOOKMARKS'			=> 'Setzen von Lesezeichen für Themen erlauben',
	'ALLOW_BOOKMARKS_EXPLAIN'	=> 'Der Benutzer darf persönliche Lesezeichen speichern.',
	'ALLOW_BBCODE'				=> 'BBCode erlauben',
	'ALLOW_FORUM_NOTIFY'		=> 'Beobachten von Foren erlauben',
	'ALLOW_NAME_CHANGE'			=> 'Namenswechsel erlauben',
	'ALLOW_NO_CENSORS'			=> 'Deaktivieren der Wortzensur erlauben',
	'ALLOW_NO_CENSORS_EXPLAIN'	=> 'Benutzer können die automatische Wortzensur in Beiträgen und Privaten Nachrichten deaktivieren.',
	'ALLOW_PM_ATTACHMENTS'		=> 'Dateianhänge in Privaten Nachrichten erlauben',
	'ALLOW_SIG'					=> 'Signaturen erlauben',
	'ALLOW_SIG_BBCODE'			=> 'BBCode in Signaturen erlauben',
	'ALLOW_SIG_FLASH'			=> 'BBCode-Tag <code>flash</code> in Signaturen erlauben',
	'ALLOW_SIG_IMG'				=> 'BBCode-Tag <code>img</code> in Signaturen erlauben',
	'ALLOW_SIG_LINKS'			=> 'Links in Signaturen erlauben',
	'ALLOW_SIG_LINKS_EXPLAIN'	=> '„Nein“ deaktiviert den <code>[URL]</code> BBCode-Tag und die automatische Verlinkung von URLs.',
	'ALLOW_SIG_SMILIES'			=> 'Smilies in Signaturen erlauben',
	'ALLOW_SMILIES'				=> 'Smilies erlauben',
	'ALLOW_TOPIC_NOTIFY'		=> 'Beobachten von Themen erlauben',
	'BOARD_PM'					=> 'Private Nachrichten',
	'BOARD_PM_EXPLAIN'			=> 'Aktiviert oder deaktiviert Private Nachrichten für alle Benutzer.',
));

// Avatar Settings
$lang = array_merge($lang, array(
	'ACP_AVATAR_SETTINGS_EXPLAIN'	=> 'Avatare sind im Allgemeinen kleine, einzigartige Bilder, mit denen sich die Mitglieder identifizieren können. Abhängig vom Style werden diese Bilder normalerweise unter dem Benutzernamen angezeigt, wenn Themen betrachtet werden. Hier kannst du die Art der Avatar-Nutzung festlegen. Bitte denke daran, dass du das von dir angegebene Verzeichnis erstellen und sicherstellen musst, dass es vom Webserver beschreibbar ist, damit Avatare hochgeladen werden können. Bedenke außerdem, dass Dateigrößen-Beschränkungen nur bei hochgeladenen Avataren greifen, nicht jedoch bei von anderen Seiten verlinkten Bildern.',

	'ALLOW_LOCAL'					=> 'Galerie-Avatare erlauben',
	'ALLOW_REMOTE'					=> 'Remote-Avatare erlauben',
	'ALLOW_REMOTE_EXPLAIN'			=> 'Avatare, die von einer anderen Website verlinkt werden.',
	'ALLOW_UPLOAD'					=> 'Hochladen von Avataren erlauben',
	'AVATAR_GALLERY_PATH'			=> 'Avatar-Galeriepfad',
	'AVATAR_GALLERY_PATH_EXPLAIN'	=> 'Der Pfad von deinem phpBB-Hauptverzeichnis aus, in dem die Galerie-Avatare liegen (z.&nbsp;B. <samp>images/avatars/gallery</samp>).',
	'AVATAR_STORAGE_PATH'			=> 'Avatar Speicherpfad',
	'AVATAR_STORAGE_PATH_EXPLAIN'	=> 'Der Pfad von deinem phpBB-Hauptverzeichnis aus, in dem die Avatare gespeichert werden (z.&nbsp;B. <samp>images/avatars/upload</samp>).',
	'MAX_AVATAR_SIZE'				=> 'Maximale Abmessungen für Avatare',
	'MAX_AVATAR_SIZE_EXPLAIN'		=> 'Breite &times; Höhe in Pixel',
	'MAX_FILESIZE'					=> 'Maximale Dateigröße',
	'MAX_FILESIZE_EXPLAIN'			=> 'Für hochgeladene Avatare.',
	'MIN_AVATAR_SIZE'				=> 'Minimale Abmessungen für Avatare',
	'MIN_AVATAR_SIZE_EXPLAIN'		=> 'Breite &times; Höhe in Pixel',
));

// Message Settings
$lang = array_merge($lang, array(
	'ACP_MESSAGE_SETTINGS_EXPLAIN'		=> 'Hier kannst du alle Standard-Einstellungen für Private Nachrichten vornehmen.',

	'ALLOW_BBCODE_PM'			=> 'BBCode in Privaten Nachrichten erlauben',
	'ALLOW_FLASH_PM'			=> 'BBCode-Tag <code>[FLASH]</code> in Privaten Nachrichten erlauben',
	'ALLOW_FLASH_PM_EXPLAIN'	=> 'Die Möglichkeit, Flash in Privaten Nachrichten zu verwenden, hängt auch von den gesetzten Berechtigungen ab.',
	'ALLOW_FORWARD_PM'			=> 'Weiterleiten von Privaten Nachrichten erlauben',
	'ALLOW_IMG_PM'				=> 'BBCode-Tag <code>[IMG]</code> in Privaten Nachrichten erlauben',
	'ALLOW_MASS_PM'				=> 'Versand von Privaten Nachrichten an mehrere Mitglieder oder Gruppen erlauben',
	'ALLOW_MASS_PM_EXPLAIN'		=> 'Der Versand an Gruppen kann für jede Gruppe in den Gruppeneinstellungen angepasst werden.',
	'ALLOW_PRINT_PM'			=> 'Druckansicht in Privaten Nachrichten erlauben',
	'ALLOW_QUOTE_PM'			=> 'Zitate in Privaten Nachrichten erlauben',
	'ALLOW_SIG_PM'				=> 'Signatur in Privaten Nachrichten erlauben',
	'ALLOW_SMILIES_PM'			=> 'Smilies in Privaten Nachrichten erlauben',
	'BOXES_LIMIT'				=> 'Maximale Anzahl von Nachrichten pro Ordner',
	'BOXES_LIMIT_EXPLAIN'		=> 'Benutzer können in einem Ordner nicht mehr als die hier festgelegte Anzahl an Privaten Nachrichten ablegen. Um eine unbegrenzte Anzahl zuzulassen, stelle als Wert 0 ein.',
	'BOXES_MAX'					=> 'Maximale Anzahl an Ordnern',
	'BOXES_MAX_EXPLAIN'			=> 'Standardmäßig können Benutzer diese Anzahl an persönlichen Ordnern für Private Nachrichten erstellen.',
	'ENABLE_PM_ICONS'			=> 'Die Nutzung von Themen-Symbolen in Privaten Nachrichten aktivieren',
	'FULL_FOLDER_ACTION'		=> 'Standard-Verhalten bei vollem Ordner',
	'FULL_FOLDER_ACTION_EXPLAIN'=> 'Das standardmäßige Verhalten, wenn der Ordner eines Benutzers voll ist und die von ihm eingestellte Aktion nicht durchführbar ist bzw. diese nicht festgelegt wurde. Eine Ausnahme gilt für den Ordner „Gesendete Nachrichten“, wo das Standard-Verhalten immer so eingestellt ist, dass alte Nachrichten gelöscht werden.',
	'HOLD_NEW_MESSAGES'			=> 'Neue Nachrichten zurückhalten',
	'PM_EDIT_TIME'				=> 'Nachträgliche Bearbeitung einschränken',
	'PM_EDIT_TIME_EXPLAIN'		=> 'Limitiert die Zeit zur Bearbeitung einer gesendeten, aber noch ungelesenen Privaten Nachricht. Um dieses Verhalten abzuschalten, stelle als Wert 0 ein.',
	'PM_MAX_RECIPIENTS'			=> 'Maximale Anzahl zulässiger Empfänger',
	'PM_MAX_RECIPIENTS_EXPLAIN'	=> 'Die maximale Anzahl zulässiger Empfängern für eine Private Nachricht. Bei einem Wert von 0 sind unbegrenzt viele Empfänger zulässig. Diese Einstellung kann gruppenbezogen in den Gruppeneinstellungen angepasst werden.',
));

// Post Settings
$lang = array_merge($lang, array(
	'ACP_POST_SETTINGS_EXPLAIN'			=> 'Hier kannst du alle Standard-Einstellungen für Beiträge vornehmen.',
	'ALLOW_POST_LINKS'					=> 'Links in Beiträgen/Privaten Nachrichten erlauben',
	'ALLOW_POST_LINKS_EXPLAIN'			=> '„Nein“ deaktiviert den <code>[URL]</code> BBCode-Tag und die automatische Verlinkung von URLs.',
	'ALLOW_POST_FLASH'					=> 'BBCode-Tag <code>[FLASH]</code> in Beiträgen erlauben',
	'ALLOW_POST_FLASH_EXPLAIN'			=> 'Wenn deaktiviert, ist der <code>[FLASH]</code> BBCode-Tag in Beiträgen deaktiviert. Andernfalls wird durch das Berechtigungssystem festgelegt, welche Benutzer den <code>[FLASH]</code> BBCode-Tag benutzen können.',

	'ENABLE_QUEUE_TRIGGER'			=> 'Beitragsfreigabe aktivieren',
	'ENABLE_QUEUE_TRIGGER_EXPLAIN'	=> 'Ermöglicht, dass Beiträge registrierter Benutzer erst freigegeben werden müssen, wenn ihr Beitragszähler kleiner als der unten festgelegte Wert ist. Diese Einstellung hat keinen Einfluss auf die Berechtigungseinstellungen für die Beitrags- und Themenfreigabe.',
	'QUEUE_TRIGGER_POSTS'			=> 'Maximale Beitragszahl für die Beitragsfreigabe',
	'QUEUE_TRIGGER_POSTS_EXPLAIN'	=> 'Wenn die Beitragsfreigabe aktiviert ist, ist dies die Zahl von Beiträgen, die ein Benutzer haben muss, um Beiträge ohne Freigabe erstellen zu können. Ist der Beitragszähler des Benutzers unter diesem Wert, wird der Beitrag automatisch in die Moderations-Warteschlange gestellt.',

	'BUMP_INTERVAL'					=> 'Neu-Markierung möglich nach',
	'BUMP_INTERVAL_EXPLAIN'			=> 'Die Zahl der Minuten, Stunden oder Tage, die seit dem letzten Beitrag zu einem Thema vergangen sein müssen, damit das Thema als „Neu“ markiert werden kann.',
	'CHAR_LIMIT'					=> 'Maximale Anzahl der Zeichen pro Beitrag',
	'CHAR_LIMIT_EXPLAIN'			=> 'Die maximale Zahl von Zeichen, die in einem Beitrag zulässig sind; 0 bedeutet unbegrenzt.',
	'DISPLAY_LAST_EDITED'			=> 'Bearbeitungen anzeigen',
	'DISPLAY_LAST_EDITED_EXPLAIN'	=> 'Wähle aus, ob die Information „Zuletzt bearbeitet von“ in Beiträgen angezeigt werden soll.',
	'EDIT_TIME'						=> 'Nachträgliche Bearbeitung einschränken',
	'EDIT_TIME_EXPLAIN'				=> 'Limitiert die Zeit, in der ein neuer Beitrag bearbeitet werden kann; 0 bedeutet unbegrenzt.',
	'FLOOD_INTERVAL'				=> 'Wartezeit zwischen zwei Beiträgen',
	'FLOOD_INTERVAL_EXPLAIN'		=> 'Die Zeit in Sekunden, die ein Benutzer warten muss, bevor er einen neuen Beitrag schreiben kann. Wenn du Benutzern erlauben möchtest, die Wartezeit zu umgehen, musst du deren Befugnisse anpassen.',
	'HOT_THRESHOLD'					=> 'Grenzwert für beliebte Themen',
	'HOT_THRESHOLD_EXPLAIN'			=> 'Anzahl der Beiträge in einem Thema, bis es als „beliebtes Thema“ angezeigt wird. Um beliebte Themen zu deaktivieren, stelle als Wert 0 ein.',
	'MAX_POLL_OPTIONS'				=> 'Maximale Anzahl an Umfrage-Optionen',
	'MAX_POST_FONT_SIZE'			=> 'Maximale Schriftgröße in Beiträgen',
	'MAX_POST_FONT_SIZE_EXPLAIN'	=> 'Maximal in Beiträgen zulässige Schriftgröße. Um keine Begrenzung festzulegen, stelle als Wert 0 ein.',
	'MAX_POST_IMG_HEIGHT'			=> 'Maximale Bild-Höhe in Beiträgen',
	'MAX_POST_IMG_HEIGHT_EXPLAIN'	=> 'Die maximale Höhe eines Bildes/einer Flash-Datei in Beiträgen. Um keine Begrenzung festzulegen, stelle als Wert 0 ein.',
	'MAX_POST_IMG_WIDTH'			=> 'Maximale Bild-Breite in Beiträgen',
	'MAX_POST_IMG_WIDTH_EXPLAIN'	=> 'Die maximale Breite eines Bildes/einer Flash-Datei in Beiträgen. Um keine Begrenzung festzulegen, stelle als Wert 0 ein.',
	'MAX_POST_URLS'					=> 'Maximale Anzahl an Links pro Beitrag',
	'MAX_POST_URLS_EXPLAIN'			=> 'Maximale Anzahl von Links in einem Beitrag. Um keine Begrenzung festzulegen, stelle als Wert 0 ein.',
	'POSTING'						=> 'Beiträge schreiben',
	'POSTS_PER_PAGE'				=> 'Beiträge pro Seite',
	'QUOTE_DEPTH_LIMIT'				=> 'Maximale Anzahl verschachtelter Zitate',
	'QUOTE_DEPTH_LIMIT_EXPLAIN'		=> 'Die maximale Zahl an ineinander verschachtelten Zitaten in einem Beitrag. Um keine Begrenzung festzulegen, stelle als Wert 0 ein.',
	'SMILIES_LIMIT'					=> 'Maximale Smilies pro Beitrag',
	'SMILIES_LIMIT_EXPLAIN'			=> 'Die maximale Anzahl an Smilies in einem Beitrag. Um keine Begrenzung festzulegen, stelle als Wert 0 ein.',
	'TOPICS_PER_PAGE'				=> 'Themen pro Seite',
));

// Signature Settings
$lang = array_merge($lang, array(
	'ACP_SIGNATURE_SETTINGS_EXPLAIN'	=> 'Hier kannst du alle Standard-Einstellungen für Signaturen vornehmen.',

	'MAX_SIG_FONT_SIZE'				=> 'Maximale Schriftgröße',
	'MAX_SIG_FONT_SIZE_EXPLAIN'		=> 'Die maximal erlaubte Schriftgröße, die ein Benutzer für seine Signatur verwenden kann. Um keine Begrenzung festzulegen, stelle als Wert 0 ein.',
	'MAX_SIG_IMG_HEIGHT'			=> 'Maximale Bild-Höhe',
	'MAX_SIG_IMG_HEIGHT_EXPLAIN'	=> 'Die maximal erlaubte Höhe einer Bild- oder Flash-Datei in der Signatur. Um keine Begrenzung festzulegen, stelle als Wert 0 ein.',
	'MAX_SIG_IMG_WIDTH'				=> 'Maximale Bild-Breite',
	'MAX_SIG_IMG_WIDTH_EXPLAIN'		=> 'Die maximal erlaubte Breite einer Bild- oder Flash-Datei in der Benutzer-Signatur. Um keine Begrenzung festzulegen, stelle als Wert 0 ein.',
	'MAX_SIG_LENGTH'				=> 'Maximale Länge',
	'MAX_SIG_LENGTH_EXPLAIN'		=> 'Die maximal erlaubte Anzahl an Zeichen in der Signatur.',
	'MAX_SIG_SMILIES'				=> 'Maximale Smilies',
	'MAX_SIG_SMILIES_EXPLAIN'		=> 'Die maximal erlaubte Anzahl an Smilies in der Signatur. Um keine Begrenzung festzulegen, stelle als Wert 0 ein.',
	'MAX_SIG_URLS'					=> 'Maximale Links',
	'MAX_SIG_URLS_EXPLAIN'			=> 'Die maximal erlaubte Anzahl der Links in der Signatur. Um keine Begrenzung festzulegen, stelle als Wert 0 ein.',
));

// Registration Settings
$lang = array_merge($lang, array(
	'ACP_REGISTER_SETTINGS_EXPLAIN'		=> 'Hier kannst du Einstellungen bezüglich der Registrierung und der Mitgliederprofile vornehmen.',

	'ACC_ACTIVATION'			=> 'Benutzerkonto-Aktivierung',
	'ACC_ACTIVATION_EXPLAIN'	=> 'Diese Einstellung legt fest, ob Benutzer sofortigen Zugang zum Board haben, oder ob eine Bestätigung erforderlich ist. Du kannst neue Registrierungen auch komplett deaktivieren.',
	'ACC_ADMIN'					=> 'durch Administrator',
	'ACC_DISABLE'				=> 'Deaktiviert',
	'ACC_NONE'					=> 'Keine',
	'ACC_USER'					=> 'durch Benutzer',
//	'ACC_USER_ADMIN'			=> 'User + Admin',
	'ALLOW_EMAIL_REUSE'			=> 'Mehrfachnutzung der E-Mail-Adresse erlauben',
	'ALLOW_EMAIL_REUSE_EXPLAIN'	=> 'Mehrere Benutzer können sich mit derselben E-Mail-Adresse registrieren.',
	'COPPA'						=> 'COPPA',
	'COPPA_FAX'					=> 'COPPA-Fax-Nummer',
	'COPPA_MAIL'				=> 'COPPA-Post-Adresse',
	'COPPA_MAIL_EXPLAIN'		=> 'Dies ist die Adresse, zu der Eltern die COPPA-Registrierungsformulare senden können.',
	'ENABLE_COPPA'				=> 'COPPA aktivieren',
	'ENABLE_COPPA_EXPLAIN'		=> 'Dadurch müssen Benutzer erklären, ob sie 13 Jahre oder älter sind, um dem amerikanischen COPPA nachzukommen. Wenn diese Einstellung deaktiviert ist, werden die COPPA-spezifischen Gruppen nicht angezeigt.',
	'MAX_CHARS'					=> 'Max.',
	'MIN_CHARS'					=> 'Min.',
	'NO_AUTH_PLUGIN'			=> 'Keine passende Authentifizierungs-Methode gefunden.',
	'PASSWORD_LENGTH'			=> 'Passwortlänge',
	'PASSWORD_LENGTH_EXPLAIN'	=> 'Die minimale und maximale Anzahl an Zeichen in Passwörtern.',
	'REG_LIMIT'					=> 'Registrierungs-Versuche',
	'REG_LIMIT_EXPLAIN'			=> 'Die Zahl der Versuche, die ein Benutzer für die Eingabe des Bestätigungscodes hat, bevor er für die Session gesperrt wird.',
	'USERNAME_ALPHA_ONLY'		=> 'Nur alphanumerische Zeichen',
	'USERNAME_ALPHA_SPACERS'	=> 'Alphanumerische Zeichen und Füllzeichen',
	'USERNAME_ASCII'			=> 'ASCII (keine internationalen Unicode-Zeichen)',
	'USERNAME_LETTER_NUM'		=> 'Alle Buchstaben und Ziffern',
	'USERNAME_LETTER_NUM_SPACERS'	=> 'Alle Buchstaben, Ziffern und Füllzeichen',
	'USERNAME_CHARS'			=> 'Erlaubte Zeichen in Benutzernamen',
	'USERNAME_CHARS_ANY'		=> 'Alle Zeichen',
	'USERNAME_CHARS_EXPLAIN'	=> 'Legt fest, welche Zeichen in Benutzernamen genutzt werden können. Füllzeichen sind: Leerzeichen, -, +, _, [ und ].',
	'USERNAME_LENGTH'			=> 'Länge des Benutzernamens',
	'USERNAME_LENGTH_EXPLAIN'	=> 'Die minimale und maximale Anzahl an Zeichen in Benutzernamen.',
));

// Visual Confirmation Settings
$lang = array_merge($lang, array(
	'ACP_VC_SETTINGS_EXPLAIN'		=> 'Hier kannst du die Einstellungen zu CAPTCHA und dem visuellem Bestätigungscode vornehmen.',

	'CAPTCHA_GD'							=> 'GD CAPTCHA',
	'CAPTCHA_GD_FOREGROUND_NOISE'			=> 'GD CAPTCHA Vordergrund-Rauschen',
	'CAPTCHA_GD_EXPLAIN'					=> 'Verwendet die GD-Library, um erweiterte CAPTCHA-Codes zu erstellen.',
	'CAPTCHA_GD_FOREGROUND_NOISE_EXPLAIN'	=> 'Fügt den auf der GD-Library basierenden CAPTCHA-Codes ein Vordergrund-Rauschen hinzu, um eine automatische Erkennung zu erschweren.',
	'CAPTCHA_GD_X_GRID'						=> 'GD CAPTCHA Hintergrund-Rauschen x-Achse',
	'CAPTCHA_GD_X_GRID_EXPLAIN'				=> 'Verwende einen niedrigeren Wert, um das GD-basierte CAPTCHA schwerer zu machen. 0 deaktiviert das Hintergrund-Rauschen auf der x-Achse.',
	'CAPTCHA_GD_Y_GRID'						=> 'GD CAPTCHA Hintergrund-Rauschen Y-Achse',
	'CAPTCHA_GD_Y_GRID_EXPLAIN'				=> 'Verwende einen niedrigeren Wert, um das GD-basierte CAPTCHA schwerer zu machen. 0 deaktiviert das Hintergrund-Rauschen auf der y-Achse.',

	'CAPTCHA_PREVIEW_MSG'					=> 'Deine Änderungen an den Einstellungen des Bestätigungscodes wurden nicht gespeichert. Dies ist nur eine Vorschau.',
	'CAPTCHA_PREVIEW_EXPLAIN'				=> 'So wird der Bestätigungscode mit den aktuellen Einstellungen aussehen. Du kannst ihn mit „Vorschau“ aktualisieren. Beachte, dass der Bestätigungscode zufällig erstellt wird und von dem hier angezeigten abweichen wird.',
	'VISUAL_CONFIRM_POST'					=> 'Visuellen Bestätigungscode für Beiträge von Gästen aktivieren',
	'VISUAL_CONFIRM_POST_EXPLAIN'			=> 'Gäste müssen einen durch ein Bild vorgegebenen zufälligen Schlüssel beim Schreiben von Beiträgen eingeben. Dies soll helfen, Massenbeiträge (Spam) zu vermeiden.',
	'VISUAL_CONFIRM_REG'					=> 'Visuellen Bestätigungscode für Registrierungen aktivieren',
	'VISUAL_CONFIRM_REG_EXPLAIN'			=> 'Neue Benutzer müssen einen durch ein Bild vorgegebenen Schlüssel bei der Registrierung eingeben. Dies soll helfen, Massenregistrierungen zu vermeiden.',
));

// Cookie Settings
$lang = array_merge($lang, array(
	'ACP_COOKIE_SETTINGS_EXPLAIN'		=> 'Hier legst du die Einstellungen fest, die verwendet werden, um Cookies an die Browser deiner Benutzer zu senden. In den meisten Fällen sollten die Standardwerte ausreichend sein. Führe Änderungen mit Bedacht durch, falsche Einstellungen könnten deine Benutzer daran hindern, sich anzumelden.',

	'COOKIE_DOMAIN'				=> 'Cookie-Domain',
	'COOKIE_NAME'				=> 'Cookie-Name',
	'COOKIE_PATH'				=> 'Cookie-Pfad',
	'COOKIE_SECURE'				=> 'Sicherer Server',
	'COOKIE_SECURE_EXPLAIN'		=> 'Falls dein Server über SSL läuft, aktiviere diese Option, ansonsten lass sie deaktiviert. Wenn diese Option aktiviert ist, obwohl der Server nicht über SSL aufgerufen wird, können Fehler bei der Weiterleitung auftreten.',
	'ONLINE_LENGTH'				=> 'Zeitspanne für die Online-Anzeige',
	'ONLINE_LENGTH_EXPLAIN'		=> 'Die Zeit in Minuten, nach der inaktive Benutzer nicht mehr in der „Wer ist online“-Anzeige erscheinen. Je größer dieser Wert ist, desto größer ist die Rechenleistung, die zur Erstellung dieser Liste benötigt wird.',
	'SESSION_LENGTH'			=> 'Sitzungslänge',
	'SESSION_LENGTH_EXPLAIN'	=> 'Die Zeit in Sekunden, nach der Sitzungen ungültig werden.',
));

// Load Settings
$lang = array_merge($lang, array(
	'ACP_LOAD_SETTINGS_EXPLAIN'	=> 'Hier kannst du einige Board-Funktionen aktivieren und deaktivieren, um die beanspruchte Rechenleistung zu verringern. Auf den meisten Servern ist es allerdings nicht nötig, irgendeine Funktion zu deaktivieren. Andererseits kann es auf einigen Systemen oder auf Servern, die man sich mit anderen teilt, durchaus Vorteile bringen, wenn Funktionen abgeschaltet werden, die nicht wirklich benötigt werden. Du kannst hier auch Limits für die Systemauslastung und für die aktiven Sitzungen festlegen, bei deren Überschreitung das Board offline geht.',

	'CUSTOM_PROFILE_FIELDS'			=> 'Zusätzliche Profil-Felder',
	'LIMIT_LOAD'					=> 'Schränke Systemauslastung ein',
	'LIMIT_LOAD_EXPLAIN'			=> 'Wenn die durchschnittliche Systemauslastung der letzten Minute (load average) diesen Wert überschreitet, geht das Board automatisch offline. 1.0 steht für eine ca. 100-prozentige Auslastung eines Prozessors. Diese Einstellung steht nur auf System zur Verfügung, die auf UNIX basieren und bei denen dieser Wert zugänglich ist. Der Wert stellt sich auf 0 zurück, wenn phpBB diesen Wert nicht auslesen konnte.',
	'LIMIT_SESSIONS'				=> 'Schränke Sitzungen ein',
	'LIMIT_SESSIONS_EXPLAIN'		=> 'Wenn die Zahl der Sitzungen innerhalb einer Minute diesen Wert überschreitet, geht das Board offline. Um keine Begrenzung festzulegen, stelle als Wert 0 ein.',
	'LOAD_CPF_MEMBERLIST'			=> 'Erlaubt Styles, zusätzliche Profil-Felder in der Mitgliederliste anzuzeigen',
	'LOAD_CPF_VIEWPROFILE'			=> 'Zusätzliche Profil-Felder in Mitgliederprofilen anzeigen',
	'LOAD_CPF_VIEWTOPIC'			=> 'Zusätzliche Profil-Felder in der Themen-Ansicht anzeigen',
	'LOAD_USER_ACTIVITY'			=> 'Aktivität der Mitglieder anzeigen',
	'LOAD_USER_ACTIVITY_EXPLAIN'	=> 'Zeigt im Profil und im persönlichen Bereich an, in welchen Foren und Themen ein Mitglied am aktivsten ist. Es wird empfohlen, diese Funktion in Foren zu deaktivieren, die mehr als eine Million Beiträge haben.',
	'RECOMPILE_STYLES'				=> 'Rekompilieren veralteter Style-Komponenten',
	'RECOMPILE_STYLES_EXPLAIN'		=> 'Prüft auf neue Style-Komponenten und rekompiliert diese.',
	'YES_ANON_READ_MARKING'			=> 'Gelesen-Markierung für Gäste',
	'YES_ANON_READ_MARKING_EXPLAIN'	=> 'Speichert auch für Gäste, ob ein Thema gelesen oder ungelesen ist. Wenn diese Option deaktiviert ist, erscheinen Beiträge für Gäste immer als gelesen.',
	'YES_BIRTHDAYS'					=> 'Anzeige der Geburtstage aktivieren',
	'YES_BIRTHDAYS_EXPLAIN'			=> 'Wenn deaktiviert, wird die Liste der Geburtstage nicht länger angezeigt. Um diese Funktion zu aktivieren, muss die Geburtstagsfunktion ebenfalls aktiviert werden.',
	'YES_JUMPBOX'					=> 'Anzeige der Jumpbox aktivieren',
	'YES_MODERATORS'				=> 'Anzeige der Moderatoren aktivieren',
	'YES_ONLINE'					=> 'Online-Anzeige der Mitglieder aktivieren',
	'YES_ONLINE_EXPLAIN'			=> 'Zeigt in der Foren-Übersicht, in den Foren und den Themen an, welches Mitglied online ist.',
	'YES_ONLINE_GUESTS'				=> 'Online-Anzeige der Gäste aktivieren',
	'YES_ONLINE_GUESTS_EXPLAIN'		=> 'Zeigt Informationen zu Gästen in „Wer ist online“ an.',
	'YES_ONLINE_TRACK'				=> 'Anzeige des Online-/Offline-Symbols aktivieren',
	'YES_ONLINE_TRACK_EXPLAIN'		=> 'Zeigt im Profil und der Themen-Ansicht den Online-Status des Mitglieds an.',
	'YES_POST_MARKING'				=> 'Themen-Markierung aktivieren',
	'YES_POST_MARKING_EXPLAIN'		=> 'Zeigt an, ob ein Benutzer in einem Thema schon einen Beitrag erstellt hat.',
	'YES_READ_MARKING'				=> 'Serverseitige Gelesen-Markierung aktivieren',
	'YES_READ_MARKING_EXPLAIN'		=> 'Speichert Informationen zu gelesenen/ungelesenen Beiträgen in der Datenbank statt im Cookie.',
));

// Auth settings
$lang = array_merge($lang, array(
	'ACP_AUTH_SETTINGS_EXPLAIN'	=> 'phpBB unterstützt Authentifizierungs-Plugins oder -Module. Mit diesen kannst du festlegen, wie Benutzer authentifiziert werden, wenn sie sich im Forum anmelden. Standardmäßig gibt es drei Plugins: DB, LDAP und Apache. Nicht alle Methoden benötigen zusätzliche Angaben, fülle daher nur Felder aus, wenn sie für die gewählte Methode von Belang sind.',

	'AUTH_METHOD'				=> 'Authentifizierungs-Methode wählen',

	'APACHE_SETUP_BEFORE_USE'	=> 'Du musst die Apache-Authentifizierung konfigurieren, bevor diese Methode in phpBB eingestellt wird. Beachte, dass der Benutzername der Apache-Authentifizierung deinem phpBB-Benutzernamen entsprechen muss. Die Apache-Authentifizierung kann nur mit mod_php (nicht mit der CGI-Version) und deaktiviertem safe_mode verwendet werden.',

	'LDAP_DN'						=> 'LDAP-Basis <var>DN</var>',
	'LDAP_DN_EXPLAIN'				=> 'Distinguished Name des Verzeichnisses, in dem sich die Benutzer-Daten befinden, z.&nbsp;B. <samp>o=Meine&nbsp;Firma,c=DE</samp>.',
	'LDAP_EMAIL'					=> 'LDAP-E-Mail-Attribut',
	'LDAP_EMAIL_EXPLAIN'			=> 'Gib hier den Namen des E-Mail-Attributes (falls existent) ein, um die E-Mail-Adresse für neue Benutzer automatisch zu setzen. Wenn dieses Feld freigelassen wird, ist bei Benutzern, die sich zum ersten Mal anmelden, keine E-Mail-Adresse gesetzt.',
	'LDAP_INCORRECT_USER_PASSWORD'	=> 'Die Verbindung zum LDAP-Server mit der angegebenen Benutzernamen und Passwort ist gescheitert.',
	'LDAP_NO_EMAIL'					=> 'Das angegebene E-Mail-Attribut existiert nicht.',
	'LDAP_NO_IDENTITY'				=> 'Kann keine Anmeldekennung für %s finden.',
	'LDAP_PASSWORD'					=> 'LDAP-Passwort',
	'LDAP_PASSWORD_EXPLAIN'			=> 'Lasse das Feld für eine anonyme Verbindung frei; ansonsten gebe das Passwort für obigen Benutzer an. Erforderlich bei Active Directory-Servern. <strong>WARNUNG:</strong> Dieses Passwort wird im Klartext in der Datenbank gespeichert und ist daher für jeden einsehbar, der Zugriff auf die Datenbank oder diese Konfigurationsseite hat.',
	'LDAP_PORT'						=> 'Port des LDAP-Servers',
	'LDAP_PORT_EXPLAIN'				=> 'Du kannst optional einen Port angeben, der statt dem Standardport 389 für die Verbindung zum LDAP-Server verwendet werden soll.',
	'LDAP_SERVER'					=> 'LDAP-Server-Name',
	'LDAP_SERVER_EXPLAIN'			=> 'Wenn LDAP genutzt wird, ist dies der Servername oder die IP-Adresse des LDAP-Servers. Alternativ kannst du eine URL der Form <samp>ldap://hostname:port/</samp> angeben.',
	'LDAP_UID'						=> 'LDAP <var>uid</var>',
	'LDAP_UID_EXPLAIN'				=> 'Attribut, unter dem nach einem angegebenen Benutzernamen gesucht werden soll, z.&nbsp;B. <var>uid</var>, <var>sn</var>, usw.',
	'LDAP_USER'						=> 'LDAP-Benutzer <var>dn</var>',
	'LDAP_USER_EXPLAIN'				=> 'Lasse das Feld für eine anonyme Verbindung frei. Wenn ausgefüllt, wird phpBB den angegebenen Benutzer dazu verwenden, um sich für die Suche nach dem passenden Benutzer wie <samp>uid=Benutzername,ou=Organisationseinheit,o=Firma,c=DE</samp> anzumelden. Erforderlich bei Active Directory-Servern.',
	'LDAP_USER_FILTER'				=> 'LDAP Benutzer-Filter',
	'LDAP_USER_FILTER_EXPLAIN'		=> 'Du kannst optional die durchsuchten Objekte durch weitere Filter einschränken. Zum Beispiel führt <samp>objectClass=posixGruppe</samp> zur Benutzung von <samp>(&amp;(uid=$username)(objectClass=posixGruppe))</samp>.',
));

// Server Settings
$lang = array_merge($lang, array(
	'ACP_SERVER_SETTINGS_EXPLAIN'	=> 'Hier kannst du einige Einstellungen bezüglich Server und Domain vornehmen. Bitte stelle sicher, dass die Daten, die du eingibst, auch wirklich stimmen, denn fehlerhafte Angaben könnten zu E-Mails führen, die falsche Informationen enthalten. Wenn du den Domain-Namen eingibst, denk daran, dass http:// oder eine andere Protokoll-Bezeichnung darin enthalten ist. Ändere den Port nur, wenn du weißt, dass dein Server einen anderen Port nutzt; Port 80 ist in den allermeisten Fällen richtig.',

	'ENABLE_GZIP'				=> 'gzip-Komprimierung aktivieren',
	'ENABLE_GZIP_EXPLAIN'		=> 'Der Seiteninhalt wird vor dem Senden an den Benutzer komprimiert. Dies kann den Netzverkehr reduzieren, wird aber auch zu einer Erhöhung der CPU-Last sowohl auf Server- als auch auf Benutzerseite führen.',
	'FORCE_SERVER_VARS'			=> 'Erzwinge Server-URL-Einstellungen',
	'FORCE_SERVER_VARS_EXPLAIN'	=> 'Wenn dies auf „Ja“ gestellt wird, werden die hier vorgenommenen Server-Einstellungen anstelle der automatisch ermittelten Werte genommen.',
	'ICONS_PATH'				=> 'Speicherpfad für Themen-Symbole',
	'ICONS_PATH_EXPLAIN'		=> 'Pfad von deinem phpBB-Hauptverzeichnis aus, z.&nbsp;B. <samp>images/icons</samp>.',
	'PATH_SETTINGS'				=> 'Pfad-Einstellungen',
	'RANKS_PATH'				=> 'Speicherpfad für Rang-Bilder',
	'RANKS_PATH_EXPLAIN'		=> 'Pfad von deinem phpBB-Hauptverzeichnis aus, z.&nbsp;B. <samp>images/ranks</samp>.',
	'SCRIPT_PATH'				=> 'Scriptpfad',
	'SCRIPT_PATH_EXPLAIN'		=> 'Der Pfad in dem sich phpBB befindet, relativ zum Domainnamen; z.&nbsp;B. <samp>/phpBB3</samp>.',
	'SERVER_NAME'				=> 'Domain-Name',
	'SERVER_NAME_EXPLAIN'		=> 'Die Domain, auf der das Board läuft (bspw. <samp>www.phpbb.de</samp>).',
	'SERVER_PORT'				=> 'Server-Port',
	'SERVER_PORT_EXPLAIN'		=> 'Der Port, auf dem der Server läuft, für gewöhnlich 80. Ändere den Wert nur, wenn er sich davon unterscheidet.',
	'SERVER_PROTOCOL'			=> 'Server-Protokoll',
	'SERVER_PROTOCOL_EXPLAIN'	=> 'Dies wird als Server-Protokoll verwendet, wenn diese Einstellungen erzwungen werden. Ansonsten, oder wenn dieses Feld leer ist, werden die Einstellungen für „Sicherer Server“ aus den Cookie-Einstellungen genommen (<samp>http://</samp> oder <samp>https://</samp>).',
	'SERVER_URL_SETTINGS'		=> 'Server URL-Einstellungen',
	'SMILIES_PATH'				=> 'Speicherpfad für Smilies',
	'SMILIES_PATH_EXPLAIN'		=> 'Pfad von deinem phpBB-Hauptverzeichnis aus, z.&nbsp;B. <samp>images/smilies</samp>.',
	'UPLOAD_ICONS_PATH'			=> 'Speicherpfad der Dateityp-Gruppen-Symbole',
	'UPLOAD_ICONS_PATH_EXPLAIN'	=> 'Pfad von deinem phpBB-Hauptverzeichnis aus, z.&nbsp;B. <samp>images/upload_icons</samp>.',
));

// Security Settings
$lang = array_merge($lang, array(
	'ACP_SECURITY_SETTINGS_EXPLAIN'		=> 'Hier können die Einstellungen zu Sitzungen und zur Anmeldung festgelegt werden.',

	'ALL'							=> 'Alle',
	'ALLOW_AUTOLOGIN'				=> 'Dauerhafte Anmeldung erlauben',
	'ALLOW_AUTOLOGIN_EXPLAIN'		=> 'Legt fest, ob Benutzer sich automatisch bei jedem Besuch des Boards anmelden können.',
	'AUTOLOGIN_LENGTH'				=> 'Verfallszeit für Anmelde-Schlüssel',
	'AUTOLOGIN_LENGTH_EXPLAIN'		=> 'Die Anzahl der Tage, nach denen ein Anmelde-Schlüssel für die automatische Anmeldung verfällt. Um den Schlüssel nicht verfallen zu lassen, stelle als Wert 0 ein.',
	'BROWSER_VALID'					=> 'Browser prüfen',
	'BROWSER_VALID_EXPLAIN'			=> 'Aktiviert die Prüfung des Browsers für die jeweilige Sitzung, um die Sicherheit zu erhöhen.',
	'CHECK_DNSBL'					=> 'IP gegen Schwarze DNS-Liste prüfen',
	'CHECK_DNSBL_EXPLAIN'			=> 'Wenn aktiviert, wird die IP-Adresse des Benutzers bei der Registrierung und bei der Beitragserstellung gegen folgende DNSBL-Dienste geprüft: <a href="http://spamcop.net">spamcop.net</a> und <a href="http://www.spamhaus.org">www.spamhaus.org</a>. Diese Prüfung kann, abhängig von der Serverkonfiguration, etwas Zeit in Anspruch nehmen. Wenn Verzögerungen oder zu viele falsche Ablehnungen beobachtet werden, sollte diese Prüfung deaktiviert werden.',
	'CLASS_B'						=> 'A.B',
	'CLASS_C'						=> 'A.B.C',
	'EMAIL_CHECK_MX'				=> 'E-Mail-Domain auf gültigen MX-Eintrag prüfen',
	'EMAIL_CHECK_MX_EXPLAIN'		=> 'Wenn aktiviert, wird die Domain der E-Mail-Adresse bei der Registrierung und der Änderung des Profils auf einen gültigen MX-Eintrag geprüft.',
	'FORCE_PASS_CHANGE'				=> 'Passwortänderung erzwingen',
	'FORCE_PASS_CHANGE_EXPLAIN'		=> 'Verlangt von den Benutzern, ihr Passwort nach einer festgelegten Anzahl an Tagen zu erneuern. Um dieses Verhalten abzuschalten, stelle als Wert 0 ein.',
	'FORM_TIME_MAX'					=> 'Maximale Zeit zur Übermittlung eines Formulars',
	'FORM_TIME_MAX_EXPLAIN'			=> 'Die Zeit, die ein Benutzer hat, um ein Formular abzusenden. Stelle als Wert -1 ein, um das Verhalten abzuschalten. Beachte, dass ein Formular unabhängig dieser Einstellung ungültig werden kann, wenn die Sitzung abläuft.',
	'FORM_SID_GUESTS'				=> 'Formulare an Gast-Sitzungen binden',
	'FORM_SID_GUESTS_EXPLAIN'		=> 'Wenn aktiviert, ist ein Formular bei Gästen nur für die aktuelle Sitzung gültig. Dies kann bei manchen Internet-Providern zu Problemen führen.',
	'FORWARDED_FOR_VALID'			=> '<var>X_FORWARDED_FOR</var>-Kopfzeilen prüfen',
	'FORWARDED_FOR_VALID_EXPLAIN'	=> 'Sitzungen werden nur fortgesetzt, wenn die übermittelte <var>X_FORWARDED_FOR</var>-Kopfzeile mit der der letzten Anfrage identisch ist. Die in <var>X_FORWARDED_FOR</var> angegebene Adresse wird ebenfalls auf Sperrung geprüft.',
	'IP_VALID'						=> 'Überprüfung der Sitzungs-IP',
	'IP_VALID_EXPLAIN'				=> 'Legt fest, welche Teile der IP eines Benutzers zur Validierung einer Sitzung herangezogen werden. <samp>Alle</samp> bedeutet, dass die komplette IP Adresse verglichen wird; <samp>A.B.C</samp> vergleicht die ersten drei Oktetts; <samp>A.B</samp> vergleicht die ersten zwei Oktetts; <samp>Keine</samp> deaktiviert die Prüfung. Bei IPv6-Adressen prüft <samp>A.B.C</samp> die ersten 4 Blöcke und <samp>A.B</samp> die ersten 3.',
	'MAX_LOGIN_ATTEMPTS'			=> 'Maximale Anzahl an Anmeldeversuchen',
	'MAX_LOGIN_ATTEMPTS_EXPLAIN'	=> 'Nach dieser Anzahl fehlgeschlagener Anmeldungen muss der Benutzer seine Anmeldung zusätzlich durch einen visuellen Bestätigungscode bestätigen.',
	'NO_IP_VALIDATION'				=> 'Keine',
	'NO_REF_VALIDATION'				=> 'Keine',
	'PASSWORD_TYPE'					=> 'Passwort-Komplexität',
	'PASSWORD_TYPE_EXPLAIN'			=> 'Legt die bei der Wahl oder Änderung eines Passworts erforderliche Komplexität fest. Nachfolgende Optionen beinhalten jeweils die darüberstehenden.',
	'PASS_TYPE_ALPHA'				=> 'Muss Buchstaben und Ziffern enthalten',
	'PASS_TYPE_ANY'					=> 'Keine Erfordernisse',
	'PASS_TYPE_CASE'				=> 'Muss Groß- und Kleinbuchstaben enthalten',
	'PASS_TYPE_SYMBOL'				=> 'Muss Sonderzeichen enthalten',
	'REF_HOST'						=> 'Prüfe nur den Hostnamen',
	'REF_PATH'						=> 'Prüfe auch den Skript-Pfad',
	'REFERER_VALID'					=> 'Referrer prüfen',
	'REFERER_VALID_EXPLAIN'			=> 'Wenn aktiviert, wird der Referrer von POST-Anfragen gegen die Einstellungen des Hostnamen/Skript-Pfads geprüft. Dies kann bei Boards zu Problemen führen, die mehrere Domains oder eine externe Anmeldung nutzen.',
	'TPL_ALLOW_PHP'					=> 'Erlaube PHP in Templates',
	'TPL_ALLOW_PHP_EXPLAIN'			=> 'Wenn diese Option eingeschaltet ist, werden <code>PHP</code>- und <code>INCLUDEPHP</code>-Anweisungen in Templates erkannt und ausgeführt.',
));

// Email Settings
$lang = array_merge($lang, array(
	'ACP_EMAIL_SETTINGS_EXPLAIN'	=> 'Diese Informationen werden benötigt, wenn das Board E-Mails an deine Benutzer sendet. Stelle bitte sicher, dass die von dir angegebene Adresse gültig ist; geblockte oder nicht zustellbare Nachrichten werden an diese Adresse geschickt. Falls dein Webhosting-Provider keinen PHP-basierten E-Mail Service anbietet, kannst du deine Nachrichten auch direkt über SMTP versenden. Dies erfordert die Angabe der Adresse eines geeigneten Servers (frage falls nötig deinen Provider). Falls der Server eine Authentifizierung erfordert (und nur, wenn dies der Fall ist), gib den Benutzernamen und das Passwort ein und wähle eine Authentifizierungsmethode aus.',

	'ADMIN_EMAIL'					=> 'Antwort-E-Mail-Adresse',
	'ADMIN_EMAIL_EXPLAIN'			=> 'Diese technische Kontakt-Adresse wird als Antwort-Adresse für alle E-Mails genommen. Sie wird in allen E-Mails als <samp>Rückleitungs</samp>- und <samp>Absender</samp>-Adresse verwendet.',
	'BOARD_EMAIL_FORM'				=> 'E-Mails über das Board versenden',
	'BOARD_EMAIL_FORM_EXPLAIN'		=> 'Anstatt die E-Mail-Adresse der Benutzer anzuzeigen, können diese ihre E-Mails über das Board versenden.',
	'BOARD_HIDE_EMAILS'				=> 'E-Mail-Adressen verstecken',
	'BOARD_HIDE_EMAILS_EXPLAIN'		=> 'Diese Funktion hält E-Mail-Adressen komplett privat.',
	'CONTACT_EMAIL'					=> 'Kontakt-E-Mail-Adresse',
	'CONTACT_EMAIL_EXPLAIN'			=> 'Diese Adresse wird angegeben, wann immer eine spezifische Kontaktmöglichkeit benötigt wird, z.&nbsp;B. bei Spam, Fehlermeldungen etc. Sie wird in allen E-Mails als <samp>Von</samp>- und <samp>Antwort</samp>-Adresse verwendet.',
	'EMAIL_FUNCTION_NAME'			=> 'Name der E-Mail-Funktion',
	'EMAIL_FUNCTION_NAME_EXPLAIN'	=> 'Die PHP-Funktion, die genutzt wird, um E-Mails zu versenden.',
	'EMAIL_PACKAGE_SIZE'			=> 'Größe von E-Mail-Paketen',
	'EMAIL_PACKAGE_SIZE_EXPLAIN'	=> 'Dies ist die Anzahl der E-Mails, die maximal in einem Paket gesendet werden können. Diese Einstellung greift für die interne Nachrichten-Warteschlange; verwende 0, wenn du Probleme mit nicht versandten Benachrichtigungs-E-Mails hast.',
	'EMAIL_SIG'						=> 'E-Mail-Signatur',
	'EMAIL_SIG_EXPLAIN'				=> 'Dieser Text wird an alle E-Mails angehängt, die das Board versendet.',
	'ENABLE_EMAIL'					=> 'Aktiviere E-Mail-Funktionalität',
	'ENABLE_EMAIL_EXPLAIN'			=> 'Wenn dies deaktiviert ist, werden keinerlei E-Mails vom Board versendet.',
	'SMTP_AUTH_METHOD'				=> 'Authentifizierungsmethode für SMTP',
	'SMTP_AUTH_METHOD_EXPLAIN'		=> 'Nur benötigt, wenn ein Benutzername/Passwort eingegeben ist. Frage deinen Webhosting-Provider, falls du nicht sicher bist, welche Methode du wählen sollst.',
	'SMTP_CRAM_MD5'					=> 'CRAM-MD5',
	'SMTP_DIGEST_MD5'				=> 'DIGEST-MD5',
	'SMTP_LOGIN'					=> 'LOGIN',
	'SMTP_PASSWORD'					=> 'SMTP-Passwort',
	'SMTP_PASSWORD_EXPLAIN'			=> 'Gib nur ein Passwort ein, wenn dein SMTP-Server dies erfordert.',
	'SMTP_PLAIN'					=> 'PLAIN',
	'SMTP_POP_BEFORE_SMTP'			=> 'POP-BEFORE-SMTP',
	'SMTP_PORT'						=> 'SMTP-Server-Port',
	'SMTP_PORT_EXPLAIN'				=> 'Ändere diese Einstellung nur, wenn du weißt, dass dein SMTP-Server einen anderen Port nutzt.',
	'SMTP_SERVER'					=> 'SMTP-Server-Adresse',
	'SMTP_SETTINGS'					=> 'SMTP-Einstellungen',
	'SMTP_USERNAME'					=> 'SMTP-Benutzername',
	'SMTP_USERNAME_EXPLAIN'			=> 'Gib nur einen Benutzernamen ein, wenn dein SMTP-Server dies erfordert.',
	'USE_SMTP'						=> 'SMTP-Server für E-Mail nutzen',
	'USE_SMTP_EXPLAIN'				=> 'Wähle „Ja“ aus, wenn du E-Mails über einen SMTP-Server senden möchtest (oder musst), anstatt die PHP-eigene Mail-Funktion zu nutzen.',
));

// Jabber settings
$lang = array_merge($lang, array(
	'ACP_JABBER_SETTINGS_EXPLAIN'	=> 'Hier kannst du die Nutzung von <a href="http://de.wikipedia.org/wiki/Jabber">Jabber</a> für Instant Messages und Benachrichtigungen des Boards aktivieren und kontrollieren. Jabber ist ein OpenSource-Protokoll und daher für jeden verfügbar. Einige Jabber-Server nutzen Gateways oder Transport-Dienste, die es dir erlauben, Benutzer anderer Netzwerke zu kontaktieren. Nicht alle Server bieten alle Transport-Dienste an, und Änderungen an den Protokollen können Transport-Dienste am Funktionieren hindern. Stelle sicher, dass du die korrekten Daten eines bereits registrierten Jabber-Kontos eingibst — phpBB verwendet die Daten so, wie sie hier eingegeben sind.',

	'JAB_ENABLE'				=> 'Jabber aktivieren',
	'JAB_ENABLE_EXPLAIN'		=> 'Aktiviert die Nutzung von Jabber-Nachrichten und -Benachrichtigungen.',
	'JAB_GTALK_NOTE'			=> 'Beachte, dass GTalk nicht funktionieren wird, da die <samp>dns_get_record</samp>-Funktion nicht gefunden werden konnte. Diese Funktion ist in PHP 4 nicht verfügbar und nicht in Windows-Plattformen implementiert. Sie funktioniert derzeit nicht auf BSD-basierten Systemen inklusive Mac OS.',
	'JAB_PACKAGE_SIZE'			=> 'Jabber-Paketgröße',
	'JAB_PACKAGE_SIZE_EXPLAIN'	=> 'Dies ist die Anzahl der Nachrichten, die in einem Paket gesendet werden. Um die Nachrichten sofort zu senden, stelle als Wert 0 ein.',
	'JAB_PASSWORD'				=> 'Jabber-Passwort',
	'JAB_PORT'					=> 'Jabber-Port',
	'JAB_PORT_EXPLAIN'			=> 'Lass dieses Feld frei, es sei denn, du weißt, dass es nicht Port 5222 ist.',
	'JAB_SERVER'				=> 'Jabber-Server',
	'JAB_SERVER_EXPLAIN'		=> 'Siehe %sjabber.org%s für eine Liste an Servern.',
	'JAB_SETTINGS_CHANGED'		=> 'Jabber-Einstellungen erfolgreich geändert.',
	'JAB_USE_SSL'				=> 'Mit SSL verbinden',
	'JAB_USE_SSL_EXPLAIN'		=> 'Wenn aktiviert, wird versucht, eine sichere Verbindung zu verwenden. Der Jabber-Port wird auf 5223 geändert, sofern Port 5222 angegeben ist.',
	'JAB_USERNAME'				=> 'Jabber-Benutzername oder JID',
	'JAB_USERNAME_EXPLAIN'		=> 'Gebe einen bereits registrierten Benutzernamen oder eine gültige JID an. Der Benutzername wird nicht auf Gültigkeit geprüft. Wenn du nur einen Benutzernamen angibst, wird die JID aus dem Benutzernamen und dem oben festgelegten Server ermittelt. Gebe ansonsten eine gültige JID wie <samp>user@jabber.org</samp> ein.',
));

?>
