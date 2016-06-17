<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php";

	Page::setTitle( 'Start and stop the gameserver' );
	Page::setDescription( 'This page is used to start and stop the gameserver.' );
	Page::setKeywords( array( 'start', 'stop', 'gameserver' ) );

	Page::setXHTML();
	Page::Init();
?>

<div style="text-align: center;">
    <img src="blocked.png" />
</div>
