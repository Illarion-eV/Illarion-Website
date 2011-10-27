<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( 'Entwicklungsfortschritt' );
	Page::setDescription( 'Diese Seite zeigt an, wie es um die Entwicklung von Illarion steht.' );

	Page::addCSS( 'onlineplayer' );

	Page::setXHTML();
	Page::Init();
?>

<h1>Entwicklungsfortschritt (VBU)</h1>

<p>
    Legende:
    <span style="color:#FF4500">Geplant</span>,
    <span style="color:#D2691E">In Arbeit</span>,
    <span style="color:#FFA500">Testen</span>,
    <span style="color:green">Fertiggestellt</span>
</p>

<h2>Inhalt</h2>

<h3>Systeme</h3>
<ul>
    <li><span style="color:#FFA500">Handwerk</span></li>
    <li><span style="color:#FF4500">Rohstoffe sammeln</span>: pharse</li>
    <li><span style="color:#D2691E">Kampf</span>: martin</li>
    <li><span style="color:#FFA500">Arkane Magie</span></li>
    <li><span style="color:#D2691E">Druiden</span>: Jupiter</li>
    <li><span style="color:#FF4500">Fraktionen</span>: Ardian</li>
</ul>

<h3>NPCs</h3>
<ul>
    <li><span style="color:#FF4500">Händler</span></li>
    <li><span style="color:#FFA500">Monster</span></li>
    <li><span style="color:#FFA500">Wachen</span>: pharse</li>
    <li><span style="color:#FFA500">Maultiere</span></li>
</ul>

<h3>Sonstiges</h3>
<ul>
    <li><span style="color:#FF4500">Tutorial</span></li>
    <li><span style="color:#D2691E">Magische Edelsteine</span>: martin</li>
    <li><span style="color:#D2691E">Bücher</span>: Skamato</li>
    <li><span style="color:#D2691E">Quests</span></li>
</ul>
