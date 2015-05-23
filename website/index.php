<?php
    if (preg_match('/de/', $_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
        header('Location: http://' . $_SERVER['SERVER_NAME'] . '/general/de_startpage.php');
    } else {
        header('Location: http://' . $_SERVER['SERVER_NAME'] . '/general/us_startpage.php');
    }