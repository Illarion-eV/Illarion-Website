<?php
   if( ereg( 'de', $_SERVER['HTTP_ACCEPT_LANGUAGE'] ) )
   {
      header('Location: de_overview.php');
   }
   else
   {
      header('Location: us_overview.php');
   }
?>