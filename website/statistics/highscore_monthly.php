<?php
    include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';
    includeWrapper::includeOnce( Page::getRootPath().'/statistics/inc_highscores.php' );
    set_monthly_offset();
?>
