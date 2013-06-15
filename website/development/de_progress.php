<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( 'Entwicklungsfortschritt' );
	Page::setDescription( 'Diese Seite zeigt an, wie es um die Entwicklung von Illarion steht.' );

	Page::addCSS( 'dev_progress' );

	Page::Init();
?>

<h1>Entwicklungsfortschritt</h1>
<p>
    Legende:
    <span class="planned">Geplant</span>,
    <span class="inProgress">In Arbeit</span>,
    <span class="testing">Testen</span>,
    <span class="done">Fertiggestellt</span>
</p>

<h2>Server</h2>
<ul>
    <li><span class="inProgress">Entfernen von Luabind</span></li>
    <li><span class="inProgress">Test-Suite</span></li>
    <li><span class="inProgress">Effiziente Datenstrukturen zur Spielersuche</span></li>
    <li><span class="planned">Benachrichtigung &uuml;ber verf&uuml;gbare Quests</span></li>
    <li><span class="planned">Neue Login-Prozedur</span></li>
    <li><span class="planned">Charaktererstellung</span></li>
    <li><span class="planned">Bereitstellung als Debian-Paket (.deb)</span></li>
</ul>

<h2>Client</h2>
<ul>
    <li><span class="inProgress">Sitzungsverwaltung</span></li>
    <li><span class="planned">Anzeige von verf&uuml;gbaren Quests</span></li>
    <li><span class="planned">Neue Login-Prozedur</span></li>
    <li><span class="planned">Charaktererstellung</span></li>
</ul>

<h2>Inhalt</h2>

<h3>Systeme</h3>
<ul>
    <li><span class="inProgress">Balancierung des Handwerks</span></li>
    <li><span class="planned">Magie</span></li>
</ul>

<h3>NPCs</h3>
<ul>
    <li><span class="inProgress">Dynamische Wachen</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=7216">pharse</a></li>
</ul>

<h3>Sonstiges</h3>
<ul>
    <li><span class="inProgress">Quests</span></li>
    <li><span class="inProgress">Quest-Logs</span></li>
</ul>

<h2>Homepage</h2>
<ul>
    <li><span class="inProgress">GM-Tool</span></li>
    <li><span class="inProgress">Umstellung auf CMS Drupal</span></li>
</ul>
