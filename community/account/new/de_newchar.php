<?php
include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

IllaUser::requireLogin();

Page::Init();

Page::setTitle( array( 'Account', 'Neuen Charakter erstellen' ) );
Page::setDescription( 'Auf dieser Seite kannst Du einen neuen Charakter für Illarion erstellen' );
Page::setKeywords( array( 'Charaktere', 'Neu', 'erstellen' ) );

Page::setXHTML();

?>


<p>Hallo Welt</p>