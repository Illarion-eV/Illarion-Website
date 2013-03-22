<?php
   if( ereg( 'de', $_SERVER['HTTP_ACCEPT_LANGUAGE'] ) )
   {
   	include $_SERVER['DOCUMENT_ROOT'].'/general/de_startpage.php';
   }
   else
   {
      include $_SERVER['DOCUMENT_ROOT'].'/general/us_startpage.php';
   }
?>