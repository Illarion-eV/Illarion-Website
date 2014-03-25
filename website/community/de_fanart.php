<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';
	include Page::getRootPath().'/community/inc.fanart.php';

	Page::setTitle( 'Fanart' );
	Page::setDescription( 'Diese Seite enthält die künstlerischen Werke der Illarion Community' );
	Page::setKeywords( array( 'Fanart', 'Kunst', 'Bilder', 'Comics', 'Charakter Bilder' ) );

	Page::addCSS( array( 'lightwindow', 'lightwindow_de' ) );
	Page::addJavaScript( array( 'prototype', 'effects', 'lightwindow' ) );
	Page::Init();

	Fanart::getFanArt('char_jen.xml','Charakter Bilder');
	Fanart::getFanArt('char_holg.xml','Charakter Bilder');
	Fanart::getFanArt('comic_ascius.xml','Geschichten');
	Fanart::getFanArt('illa_rl_2007.xml','RL Treffen');
	Fanart::getFanArt('illa_rl_2008_1.xml','RL Treffen');
	Fanart::getFanArt('illa_rl_2008_2.xml','RL Treffen');
	Fanart::getFanArt('illa_rl_2009_1.xml','RL Treffen');

	if (!isset($_GET['coll'])):
?>
<h1>Fanart</h1>

<h2>Übersicht</h2>

<ul>
	<li><a href="#fanart_1">Charakter Bilder</a></li>
	<li><a href="#fanart_2">Geschichten</a></li>
	<li><a href="#fanart_10">RL Treffen</a></li>
</ul>

<?php Page::insert_go_to_top_link(); ?>

<h2>Charakter Bilder</h2>
<div><a id="fanart_1" /></div>

<div style="margin:3px;float:left;">
	<a href="<?php echo Page::getURL(); ?>/community/de_fanart.php?coll=1">
		<?php Fanart::getFanArt('char_jen.xml')->show_random_pic( ); ?>
	</a>
	<br />
	<span>von Gwynnther</span>
</div>
<div style="margin:3px;float:left;">
	<a href="<?php echo Page::getURL(); ?>/community/de_fanart.php?coll=3">
		<?php Fanart::getFanArt('char_holg.xml')->show_random_pic( ); ?>
	</a>
	<br />
	<span>von Holger Krause</span>
</div>
<div class="clr"></div>
<?php Page::insert_go_to_top_link(); ?>

<h2>Geschichten</h2>
<div><a id="fanart_2" /></div>

<div style="margin:3px;float:left;">
	<a href="<?php echo Page::getURL(); ?>/community/de_fanart.php?coll=4">
		<?php Fanart::getFanArt('comic_ascius.xml')->show_random_pic( ); ?>
	</a>
	<br />
	<span>Comic von Ascius</span>
</div>

<div class="clr"></div>
<?php Page::insert_go_to_top_link(); ?>

<h2>RL Treffen</h2>
<div><a id="fanart_10" /></div>

<div style="margin:3px;float:left;">
	<a href="<?php echo Page::getURL(); ?>/community/de_fanart.php?coll=2">
		<?php Fanart::getFanArt('illa_rl_2007.xml')->show_random_pic( ); ?>
	</a>
	<br />
	<span>Mai 2007</span>
</div>

<div style="margin:3px;float:left;">
	<a href="<?php echo Page::getURL(); ?>/community/de_fanart.php?coll=5">
		<?php Fanart::getFanArt('illa_rl_2008_1.xml')->show_random_pic( ); ?>
	</a>
	<br />
	<span>Mai 2008</span>
</div>

<div style="margin:3px;float:left;">
	<a href="<?php echo Page::getURL(); ?>/community/de_fanart.php?coll=6">
		<?php Fanart::getFanArt('illa_rl_2008_2.xml')->show_random_pic( ); ?>
	</a>
	<br />
	<span>Oktober 2008</span>
</div>

<div style="margin:3px;float:left;">
	<a href="<?php echo Page::getURL(); ?>/community/de_fanart.php?coll=7">
		<?php Fanart::getFanArt('illa_rl_2009_1.xml')->show_random_pic( ); ?>
	</a>
	<br />
	<span>Mai 2009</span>
</div>

<div class="clr"></div>
<?php Page::insert_go_to_top_link(); ?>

<?php
	else:
		foreach (array(1,3,4,2,5,6,7) as $coll):
			switch($coll):
				case 1: $file = 'char_jen.xml';break;
				case 2: $file = 'illa_rl_2007.xml';break;
				case 3: $file = 'char_holg.xml';break;
				case 4: $file = 'comic_ascius.xml';break;
				case 5: $file = 'illa_rl_2008_1.xml';break;
				case 6: $file = 'illa_rl_2008_2.xml';break;
				case 7: $file = 'illa_rl_2009_1.xml';break;
				default: exit();
			endswitch;
			$art = Fanart::getFanArt($file);
			$page = (isset($_GET['page']) ? (int)$_GET['page'] : 1);

			if ($coll == $_GET['coll'] ):
?>
<h1><?php $art->get_title( ); ?></h1>

<h2>von <?php $art->get_author( ); ?></h2>

<?php $art->show_additional_content(); ?>

<?php $art->fanart_table( $page, false ); ?>

<?php $art->show_page_select( $page, $coll ); ?>
<?php
			else:
				$art->fanart_table( $page, true );
			endif;
		endforeach;
	endif;
?>