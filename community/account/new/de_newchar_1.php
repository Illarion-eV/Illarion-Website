<?php
include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

IllaUser::requireLogin();

Page::Init();

   // Maximale Anzahl an Charakteren ist erreicht
   $pgSQL =& Database::getPostgreSQL( 'illarionserver' );
   $query = 'SELECT COUNT(*)'
   .PHP_EOL.' FROM chars'
   .PHP_EOL.' WHERE chr_accid = '.$pgSQL->Quote( IllaUser::$ID )
   ;
   $pgSQL->setQuery( $query );
   $charcount = $pgSQL->loadResult();

   if ($charcount >= IllaUser::$charlimit && !IllaUser::auth('testserver') && IllaUser::$charlimit > 0)
   {
   Messages::add( 'Charakterlimit von '.IllaUser::$charlimit.' wurde erreicht.', 'error' );
   includeWrapper::includeOnce( Page::getRootPath().'/community/account/de_charlist.php' );
   exit();
   }

   Page::setTitle( array( 'Account', 'Neuen Charakter erstellen' ) );
   Page::setDescription( 'Auf dieser Seite kannst Du einen neuen Charakter für Illarion erstellen' );
   Page::setKeywords( array( 'Charaktere', 'Neu', 'erstellen' ) );

   Page::addJavaScript( array( 'prototype', 'effects', 'newchar_1'));

   Page::setXHTML();

?>

<h1>Neuen Charakter erstellen</h1>

<h2>Schritt 1</h2>

<p>Hier musst Du Name, Rasse und Geschlecht des Charakters festlegen. Bitte beachte dazu die
<a href="<?php echo Page::getURL(); ?>/illarion/de_name_rules.php">Namensregeln</a>
von Illarion. Hilfreich kann auch die <a href="<?php echo Page::getURL(); ?>/general/de_rpg_guide.php">RPG-Anleitung</a> sein.</p>

