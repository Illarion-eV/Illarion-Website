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
    <span style="color:#FF0000">Geplant</span>,
    <span style="color:#CC4400">In Arbeit</span>,
    <span style="color:#777700">Testen</span>,
    <span style="color:#00FF00">Fertiggestellt</span>
</p>

<h2>Inhalt</h2>
<h3>Systeme</h3>
<ul>
    <li>Handwerk</li>
    <li>Rohstoffe sammeln: pharse</li>
    <li>Kampf: martin</li>
    <li>Arkane Magie</li>
    <li>Druiden: Jupiter</li>
</ul>