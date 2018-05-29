<?php
   if( ereg( 'de', $_SERVER['HTTP_ACCEPT_LANGUAGE'] ) )
   {
   	header('Location: https://' . $_SERVER['SERVER_NAME'] . '/community/de_privacy.php');
   }
   else
   {
      header('Location: https://' . $_SERVER['SERVER_NAME'] . '/community/us_privacy.php');
   }
?>