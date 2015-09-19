<?php
$fromSSL = __DIR__ . '/../../../../services/account/service.php';
$fromNormal = __DIR__ . '/../../../services/account/service.php';

 if (file_exists($fromSSL)) {
     include $fromSSL;
 } else if (file_exists($fromNormal)) {
     include $fromNormal;
 } else {
     throw new Exception("Failed to locate service.");
 }