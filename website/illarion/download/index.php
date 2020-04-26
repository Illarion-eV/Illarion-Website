<?php
   if( preg_match( '/de/', $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? '' ) )
   {
      header('Location: ../de_java_download.php');
   }
   else
   {
      header('Location: ../us_java_download.php');
   }
?>