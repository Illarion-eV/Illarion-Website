<?php
/**
 * This file handles the autoloading for the libraries.
 */
function libraries_autoload($class) {
    switch ($class) {
        case 'PHPMailer': require __DIR__ . '/PHPMailer/class.phpmailer.php'; break;
        case 'StringParser_BBCode': require __DIR__ . '/stringparser_bbcode/stringparser_bbcode.class.php'; break;
    }
}

spl_autoload_register('libraries_autoload');