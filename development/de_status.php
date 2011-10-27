<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( 'Entwicklungsstatus' );
	Page::setDescription( 'Diese Seite zeigt an, wie es um die Entwicklung von Illarion steht.' );

	Page::addCSS( 'onlineplayer' );

	Page::setXHTML();
	Page::Init();
?>

<h1>Entwicklungsstatus (VBU)</h1>

<p>
    Legende:
    <span style="color:maroon">Geplant</span>,
    <span style="color:purple">In Arbeit</span>,
    <span style="color:navy">Testen</span>,
    <span style="color:green">Fertiggestellt</span>
</p>

<h2>Inhalt</h2>

<h3>Systeme</h3>
<ul>
    <li><span style="color:navy">Handwerk</span></li>
    <li><span style="color:maroon">Rohstoffe sammeln</span>: pharse</li>
    <li><span style="color:purple">Kampf</span>: martin</li>
    <li><span style="color:navy">Arkane Magie</span></li>
    <li><span style="color:purple">Druiden</span>: Jupiter</li>
    <li><span style="color:maroon">Fraktionen</span>: Ardian</li>
</ul>

<h3>NPCs</h3>
<ul>
    <li><span style="color:maroon">Händler</span></li>
    <li><span style="color:navy">Monster</span></li>
    <li><span style="color:navy">Wachen</span>: pharse</li>
    <li><span style="color:navy">Maultiere</span></li>
</ul>

<h3>Sonstiges</h3>
<ul>
    <li><span style="color:maroon">Tutorial</span></li>
    <li><span style="color:purple">Magische Edelsteine</span>: martin</li>
    <li><span style="color:purple">Bücher</span>: Skamato</li>
    <li><span style="color:purple">Quests</span></li>
</ul>
