<?php
	include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
	create_header( "Illarion - FAQ Technik",
	"Diese Seite enth&auml;lt die am h&auml;ufigsten gestellten Fragen zum Thema Technik von Illarion.",
	"FAQ, Fragen, Technik" );
	include_header();
?>

<h2>
	<a class="float_left" href='/general/de_faq_concept.php'>Spielkonzept - FAQ</a>
	<a class="float_right" href='/general/de_faq_graphic.php'>Grafik - FAQ</a>
	<a class="clr" style="display:block;"></a>
</h2>

<h1>Technik - FAQ</h1>

<h2>Inhalt</h2>

<ul>
	<li><a class="hidden" href="#1">Unzulässige Win32-Anwendung</a></li>
	<li><a class="hidden" href="#2">DirectDrawCreateEx</a></li>
	<li><a class="hidden" href="#3">WS2_32.dll</a></li>
	<li><a class="hidden" href="#4">Can't connect</a></li>
	<li><a class="hidden" href="#5">DDERR_INVALIDMODE</a></li>
	<li><a class="hidden" href="#6">Schwarzer Bildschirm</a></li>
	<li><a class="hidden" href="#7">Passwort</a></li>
	<li><a class="hidden" href="#8">Charakter anlegen</a></li>
	<li><a class="hidden" href="#9">Kann nicht einloggen</a></li>
</ul>

<?php insert_go_to_top_link(); ?>

<p><a name="1"></a></p>

<h2>Unzulässige Win32-Anwendung</h2>

<ul>
	<li class="question">Windows Fehlermeldung: "Illarion.exe ist keine zulässige
	Win32-Anwendung."</li>

	<li class="answer">Da ist der Download schiefgelaufen. Bekannt ist, dass es zum Beispiel
	Probleme mit Go!Zilla gab. Lade das Programm direkt mit Deinem Browser auf die
	Festplatte.</li>
</ul>

<?php insert_go_to_top_link(); ?>

<p><a name="2"></a></p>

<h2>DirectDrawCreateEx</h2>

<ul>
	<li class="question">Windows Fehlermeldung: "export DDraw.DLL:DirectDrawCreateEx"
	oder "... angeschlossenes Gerät funktioniert nicht".</li>

	<li class="answer">Klarer Fall von DirectX Version 7 nicht installiert!! Hole es Dir z.B. von
	<a href="http://www.microsoft.com/directx/" rel="external">Microsoft</a> und installiere es.
	Windows NT-User stehen außen vor. NT kann nur bis DirectX Version 3 updaten (ServicePack 1).
	Unter Windows 2000 ist es wieder möglich DirectX7 und damit unseren Client zu nutzen.</li>
</ul>

<?php insert_go_to_top_link(); ?>

<p><a name="3"></a></p>

<h2>WS2_32.dll</h2>

<ul>
	<li class="question">Windows Fehlermeldung: "Datei WS2_32.dll nicht gefunden"</li>

	<li class="answer">Es scheint, dass Du Windows 95 benutzt. Um Illarion spielen zu können,
	musst Du von Microsoft <a href="../illarion/W95ws2setup.exe">Winsock2</a> herunterladen
	und installieren.</li>
</ul>

<?php insert_go_to_top_link(); ?>

<p><a name="4"></a></p>

<h2>Can't connect</h2>

<ul>
	<li class="question">Illarion Client Fehlermeldung: "Can't establish connection -
	Maybe the server is not online or you have no internet connection." oder
	"Connecting to Server, Can't connect!"</li>

	<li class="answer">Dies kann zwei Gründe haben: Entweder benutzt Du Windows 95 (dann schaue
	<a href="#3">hier</a> noch nach) oder der Illarion-Server ist nicht online. Das kann mehrere
	Gründe haben: Wartungsarbeiten, Internetausfall oder zu langsam, Atombombendetonation ...
	Probiere es einfach später noch einmal.</li>
</ul>

<?php insert_go_to_top_link(); ?>

<p><a name="5"></a></p>

<h2>DDERR_INVALIDMODE</h2>

<ul>
	<li class="question">Illarion Client Fehlermeldung: "DDERR_INVALIDMODE"</li>

	<li class="answer">Deine Grafikkarte oder Dein Monitor unterstützt die Bildschirmauflösung
	von 1024*768 bei 65536 Farben (16 Bit, 64K Farben) nicht.</li>
</ul>

<?php insert_go_to_top_link(); ?>

<p><a name="6"></a></p>

<h2>Schwarzer Bildschirm</h2>

<ul>
	<li class="question">Nach dem Einloggen sehe ich andere Spieler sprechen und die
	Benutzeroberfläche, aber keine Karte</li>

	<li class="answer">Das kann zwei Gründe haben:
		<ul>
			<li>Du hast das Starticon von Illarion auf den Desktop gezogen. Starte das Spiel dort,
			wo es hingehört, nicht am Desktop!</li>

			<li>Du hast nicht die ganze ZIP Datei entpackt. Insbesondere hast du die *.tbl Dateien
			nicht in dem Verzeichnis, wo Illarion liegt gespeichert.</li>
		</ul>
	</li>
</ul>

<?php insert_go_to_top_link(); ?>

<p><a name="7"></a></p>

<h2>Passwort</h2>

<ul>
	<li class="question">Ich habe kein Passwort - wo bekomm ich das her?</li>

	<li class="answer">Im Startfenster klickst Du auf "create new". Dort kannst Du dann
	einen Charakter anlegen und Dir ein Passwort ausdenken.</li>
</ul>

<?php insert_go_to_top_link(); ?>

<p><a name="8"></a></p>

<h2>Charakter anlegen</h2>

<ul>
	<li class="question">Ich habe einen Charakter neu angelegt und nichts passiert</li>

	<li class="answer">Nachdem Du auf "create" geklickt hast, wird der Charakter
	angelegt, und Du bekommst eine Rückmeldung in der unteren Zeile. Klicke auf "OK" um
	einzuloggen. Beim nächsten Spielstart kannst Du Namen und Passwort gleich im Startbildschirm
	angeben.</li>
</ul>

<?php insert_go_to_top_link(); ?>

<p><a name="9"></a></p>

<h2>Kann nicht einloggen</h2>

<ul>
	<li class="question">Beim Einloggen bekomme ich die Meldung "Wrong password" oder
	"No character with this name has been found!"</li>

	<li class="answer">Bei Eingabe des Namens und Passworts wird zwischen Groß- und
	Kleinbuchstaben unterschieden.</li>
</ul>

<?php insert_go_to_top_link(); ?>

<?php include_footer(); ?>