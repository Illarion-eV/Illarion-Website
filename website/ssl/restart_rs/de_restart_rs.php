<?php
include $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php";

Page::setTitle( 'Spielserver starten und beenden' );
Page::setDescription( 'Diese Seite dient dazu den Spielserver zu starten und zu stoppen.' );
Page::setKeywords( array( 'Starten', 'Stoppen', 'Spielserver' ) );

Page::setXHTML();
Page::Init();
?>

<div style="text-align: center;">
    <img src="blocked.png" />
</div>
