<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( 'Screenshots' );
	Page::setDescription( 'On this page you will find Illarion screenshots, to give you a first impression of the game.' );
	Page::setKeywords( array( 'Screenshots', 'Pictures', 'Graphics' ) );

	Page::addCSS( array( 'lightwindow', 'lightwindow_us' ) );
	Page::addJavaScript( array( 'prototype', 'effects', 'lightwindow' ) );

	Page::setXHTML();
	Page::Init();

	$xmlC = new XmlC( 'UTF-8' );
	$xmlC->Set_XML_data( file_get_contents( Page::getRootPath().'/illarion/screenshots.xml' ) );
?>

<h1>Screenshots</h1>

<h2>Content</h2>

<ul>
	<?php foreach( $xmlC->obj_data->screenshots[0]->group as $currGroup ): ?>
	<li><a class="hidden" href="#group<?php echo $currGroup->index; ?>"><?php echo $currGroup->eName; ?></a></li>
	<?php endforeach; ?>
</ul>

<?php Page::insert_go_to_top_link(); ?>

<?php foreach( $xmlC->obj_data->screenshots[0]->group as $currGroup ): ?>
<div><a id="group<?php echo $currGroup->index; ?>"></a></div>
<h2><?php echo $currGroup->eName; ?></h2>
<?php foreach( $currGroup->screenshot as $index=>$currScreen ): ?>
<div style="margin:3px;float:left;">
	<?php $imagesize = getimagesize( Page::getMediaRootPath().'/screenshots/'.$currScreen->filename); ?>
	<a href="<?php echo Page::getMediaURL(); ?>/screenshots/<?php echo $currScreen->filename; ?>" title="<?php echo $currScreen->eName; ?>" rel="Illarion Screenshots--<?php echo $currGroup->eName; ?>" class="lightwindow" onclick="return false;">
		<img src="<?php echo Page::getMediaURL(); ?>/screenshots/preview/<?php echo $currScreen->filename; ?>" style="width:150px;height:75px" alt="Click here to view the picture in full size" />
		<br />
		<?php
if (strlen($currScreen->eName)<25)
{
	echo $currScreen->eName;
}
else
{
	echo substr($currScreen->eName,0,22),'...';
}
?>
	</a>
</div>
<?php endforeach; ?>
<div class="clr"></div>

<?php Page::insert_go_to_top_link(); ?>
<?php endforeach; ?>