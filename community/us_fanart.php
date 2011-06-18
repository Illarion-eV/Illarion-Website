<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';
	include Page::getRootPath().'/community/inc.fanart.php';

	Page::setTitle( 'Fanart' );
	Page::setDescription( 'This page contains the creative work of the Illarion community.' );
	Page::setKeywords( array( 'Fanart', 'art', 'pictures', 'comics', 'character pictures' ) );

	Page::addCSS( array( 'lightwindow', 'lightwindow_us' ) );
	Page::addJavaScript( array( 'prototype', 'effects', 'lightwindow' ) );
	Page::Init();

	Fanart::getFanArt('char_jen.xml','Character pictures');
	Fanart::getFanArt('char_holg.xml','Character pictures');
	Fanart::getFanArt('comic_ascius.xml','Stories');
	Fanart::getFanArt('illa_rl_2007.xml','RL meeting');
	Fanart::getFanArt('illa_rl_2008_1.xml','RL meeting');
	Fanart::getFanArt('illa_rl_2008_2.xml','RL meeting');

	if (!isset($_GET['coll'])):
?>
<h1>Fanart</h1>

<h2>Overview</h2>

<ul>
	<li><a href="#fanart_1">Character pictures</a></li>
	<li><a href="#fanart_2">Stories</a></li>
	<li><a href="#fanart_10">RL meeting</a></li>
</ul>

<?php Page::insert_go_to_top_link(); ?>

<h2>Character pictures</h2>
<div><a id="fanart_1" /></div>

<div style="margin:3px;float:left;">
	<a href="<?php echo Page::getURL(); ?>/community/us_fanart.php?coll=1">
		<?php Fanart::getFanArt('char_jen.xml')->show_random_pic( ); ?>
	</a>
	<br />
	<span>by Jennifer Pirker</span>
</div>
<div style="margin:3px;float:left;">
	<a href="<?php echo Page::getURL(); ?>/community/us_fanart.php?coll=3">
		<?php Fanart::getFanArt('char_holg.xml')->show_random_pic( ); ?>
	</a>
	<br />
	<span>by Holger Krause</span>
</div>

<div class="clr"></div>
<?php Page::insert_go_to_top_link(); ?>

<h2>Stories</h2>
<div><a id="fanart_2" /></div>

<div style="margin:3px;float:left;">
	<a href="<?php echo Page::getURL(); ?>/community/us_fanart.php?coll=4">
		<?php Fanart::getFanArt('comic_ascius.xml')->show_random_pic( ); ?>
	</a>
	<br />
	<span>Comic by Ascius</span>
</div>

<div class="clr"></div>
<?php Page::insert_go_to_top_link(); ?>

<h2>RL meeting</h2>
<div><a id="fanart_10" /></div>

<div style="margin:3px;float:left;">
	<a href="<?php echo Page::getURL(); ?>/community/us_fanart.php?coll=2">
		<?php Fanart::getFanArt('illa_rl_2007.xml')->show_random_pic( ); ?>
	</a>
	<br />
	<span>May 2007</span>
</div>

<div style="margin:3px;float:left;">
	<a href="<?php echo Page::getURL(); ?>/community/us_fanart.php?coll=5">
		<?php Fanart::getFanArt('illa_rl_2008_1.xml')->show_random_pic( ); ?>
	</a>
	<br />
	<span>May 2008</span>
</div>

<div style="margin:3px;float:left;">
	<a href="<?php echo Page::getURL(); ?>/community/us_fanart.php?coll=6">
		<?php Fanart::getFanArt('illa_rl_2008_2.xml')->show_random_pic( ); ?>
	</a>
	<br />
	<span>October 2008</span>
</div>

<div style="margin:3px;float:left;">
	<a href="<?php echo Page::getURL(); ?>/community/us_fanart.php?coll=7">
		<?php Fanart::getFanArt('illa_rl_2009_1.xml')->show_random_pic( ); ?>
	</a>
	<br />
	<span>May 2009</span>
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
				default: include_footer();exit();
			endswitch;
			$art = Fanart::getFanArt($file);
			$page = (isset($_GET['page']) ? (int)$_GET['page'] : 1);

			if ($coll == $_GET['coll'] ):
?>
<h1><?php $art->get_title( ); ?></h1>

<h2>by <?php $art->get_author( ); ?></h2>

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