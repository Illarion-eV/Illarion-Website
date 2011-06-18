<?php
   if( ereg( 'de', $_SERVER['HTTP_ACCEPT_LANGUAGE'] ) )
   {
   	header('Location: http://illarion.org/general/de_startpage.php');
   }
   else
   {
      header('Location: http://illarion.org/general/us_startpage.php');
   }
?>