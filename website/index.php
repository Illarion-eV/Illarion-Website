<?php
    if (preg_match('/de/', $_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
        header('Locations: http://' . $_SERVER['SERVER_NAME'] . '/general/de_startpage.php');
    } else {
        header('Locations: http://' . $_SERVER['SERVER_NAME'] . '/general/us_startpage.php');
    }