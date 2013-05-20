<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( 'Entwicklungsfortschritt' );
	Page::setDescription( 'Diese Seite zeigt an, wie es um die Entwicklung von Illarion steht.' );

	Page::addCSS( 'dev_progress' );

	Page::Init();
?>

<h1>Entwicklungsfortschritt (VBU)</h1>

<p>
    Legende:
    <span class="planned">Geplant</span>,
    <span class="inProgress">In Arbeit</span>,
    <span class="testing">Testen</span>,
    <span class="done">Fertiggestellt</span>
</p>

<h2>Server</h2>

<ul>
    <li><span class="done">Lua-Anbindung</span></li>
    <li><span class="done">Lernsystem</span></li>
    <li><span class="done">Datenbankschnittstelle</span></li>
    <li><span class="done">Client-Protokoll</span></li>
</ul>

<h2>Client</h2>

<ul>
    <li class="done">Resourcenverwaltung</li>
    <li class="done">Server-Protokoll</li>
    <li class="done">Sound und Musikanbindung</li>
    <li class="done">Wegesuchen</li>
    <li class="done">Slick-Grafikengine Anbindung</li>
    <li class="done">NiftyGUI Anbindung</li>
    <li class="done">Verwaltung der Benutzereingaben (Maus, Tastatur)</li>
    <li class="done">Szenenverwaltung</li>
    <li class="inProgress">Sitzungsverwaltung</li>
</ul>

<h2>Inhalt</h2>

<h3>Systeme</h3>
<ul>
    <li><span class="done">Handwerk</span></li>
    <li><span class="done">Kampf</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=1226">martin</a></li>
    <li><span class="testing">Alchemie</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=5791">Jupiter</a></li>
    <li><span class="done">Rohstoffe sammeln</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=7216">pharse</a></li>
    <li><span class="done">Fraktionen</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=5398">Ardian</a></li>
</ul>

<h3>Karte</h3>
<ul>
    <li><span class="done">Städte</span></li>
    <li><span class="done">Dungeons</span></li>
    <li><span class="done">Wildnis</span></li>
    <li><span class="done">Tutorial</span></li>
</ul>

<h3>NPCs</h3>
<ul>
    <li><span class="done">Monster</span></li>
    <li><span class="done">Wachen</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=7216">pharse</a></li>
    <li><span class="done">Händler</span></li>
</ul>

<h3>Sonstiges</h3>
<ul>
    <li><span class="done">Schatzkarten</span></li>
    <li><span class="done">Magische Edelsteine</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=1226">martin</a></li>
    <li><span class="done">Bücher</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=10083">Skamato</a></li>
    <li><span class="inProgress">Quests</span></li>
    <li><span class="done">Tutorial</span></li>
</ul>

<h2>Grafik</h2>

<h3>Charaktere</h3>
<ul>
    <li><span class="done">Avatare</span></li>
    <li><span class="done">Paperdolling</span></li>
    <li><span class="done">Monster</span></li>
</ul>

<h3>Statisch</h3>
<ul>
    <li><span class="done">Szenerie</span></li>
    <li><span class="done">Dekoration</span></li>
    <li><span class="done">Gegenstände</span></li>
    <li><span class="done">Bodenfelder</span></li>
</ul>

<h2>Homepage</h2>

<ul>
    <li><span class="done">Charakter-Erstellung</span></li>
    <li><span class="inProgress">GM-Tool</span></li>
</ul>
