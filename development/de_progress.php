<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( 'Entwicklungsfortschritt' );
	Page::setDescription( 'Diese Seite zeigt an, wie es um die Entwicklung von Illarion steht.' );

	Page::addCSS( 'onlineplayer' );

	Page::Init();
?>

<h1>Entwicklungsfortschritt (VBU)</h1>

<p>
    Legende:
    <span style="font-weight:bold; color:#000000">Geplant</span>,
    <span style="font-weight:bold; color:#8B0000">In Arbeit</span>,
    <span style="font-weight:bold; color:#285917">Testen</span>,
    <span style="font-weight:bold; color:#152B85">Fertiggestellt</span>
</p>

<h2>Server</h2>

<ul>
    <li><span style="font-weight:bold; color:#152B85">Lua-Anbindung</span></li>
    <li><span style="font-weight:bold; color:#152B85">Lernsystem</span></li>
    <li><span style="font-weight:bold; color:#152B85">Datenbankschnittstelle</span></li>
    <li><span style="font-weight:bold; color:#152B85">Client-Protokoll</span></li>
</ul>

<h2>Client</h2>

<ul>
    <li style="font-weight:bold; color:#152B85">Resourcenverwaltung</li>
    <li style="font-weight:bold; color:#152B85">Server-Protokoll</li>
    <li style="font-weight:bold; color:#152B85">Sound und Musikanbindung</li>
    <li style="font-weight:bold; color:#152B85">Wegesuchen</li>
    <li style="font-weight:bold; color:#285917">Sitzungsverwaltung</li>
    <li style="font-weight:bold; color:#285917">Slick-Grafikengine Anbindung</li>
    <li style="font-weight:bold; color:#285917">Szenenverwaltung</li>
    <li style="font-weight:bold; color:#8B0000">NiftyGUI Anbindung</li>
    <li style="font-weight:bold; color:#8B0000">Verwaltung der Benutzereingaben (Maus, Tastatur)</li>
</ul>

<h2>Inhalt</h2>

<h3>Systeme</h3>
<ul>
    <li><span style="font-weight:bold; color:#285917">Handwerk</span></li>
    <li><span style="font-weight:bold; color:#8B0000">Kampf</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=1226">martin</a></li>
    <li><span style="font-weight:bold; color:#8B0000">Alchemie</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=5791">Jupiter</a></li>
    <li><span style="font-weight:bold; color:#8B0000">Rohstoffe sammeln</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=7216">pharse</a></li>
    <li><span style="font-weight:bold; color:#8B0000">Fraktionen</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=5398">Ardian</a></li>
</ul>

<h3>Karte</h3>
<ul>
    <li><span style="font-weight:bold; color:#152B85">Städte</span></li>
    <li><span style="font-weight:bold; color:#152B85">Dungeons</span></li>
    <li><span style="font-weight:bold; color:#152B85">Wildnis</span></li>
    <li><span style="font-weight:bold; color:#152B85">Tutorial</span></li>
</ul>

<h3>NPCs</h3>
<ul>
    <li><span style="font-weight:bold; color:#285917">Monster</span></li>
    <li><span style="font-weight:bold; color:#285917">Wachen</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=7216">pharse</a></li>
    <li><span style="font-weight:bold; color:#8B0000">Händler</span></li>
</ul>

<h3>Sonstiges</h3>
<ul>
    <li><span style="font-weight:bold; color:#152B85">Schatzkarten</span></li>
    <li><span style="font-weight:bold; color:#8B0000">Magische Edelsteine</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=1226">martin</a></li>
    <li><span style="font-weight:bold; color:#8B0000">Bücher</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=10083">Skamato</a></li>
    <li><span style="font-weight:bold; color:#8B0000">Quests</span></li>
    <li><span style="font-weight:bold; color:#152B85">Tutorial</span></li>
</ul>

<h2>Grafik</h2>

<h3>Charaktere</h3>
<ul>
    <li><span style="font-weight:bold; color:#285917">Avatare</span></li>
    <li><span style="font-weight:bold; color:#285917">Paperdolling</span></li>
    <li><span style="font-weight:bold; color:#8B0000">Monster</span></li>
</ul>

<h3>Statisch</h3>
<ul>
    <li><span style="font-weight:bold; color:#152B85">Szenerie</span></li>
    <li><span style="font-weight:bold; color:#152B85">Dekoration</span></li>
    <li><span style="font-weight:bold; color:#152B85">Gegenstände</span></li>
    <li><span style="font-weight:bold; color:#152B85">Bodenfelder</span></li>
</ul>

<h2>Homepage</h2>

<ul>
    <li><span style="font-weight:bold; color:#152B85">Charakter-Erstellung</span></li>
    <li><span style="font-weight:bold; color:#8B0000">GM-Tool</span></li>
</ul>
