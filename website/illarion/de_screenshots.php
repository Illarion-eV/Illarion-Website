<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( 'Screenshots' );
	Page::setDescription( 'Diese Seite enthält einige Screenshots, um einen ersten Eindruck von Illarion zu bekommen.' );
	Page::setKeywords( array( 'Screenshots', 'Bilder', 'Grafik', 'Graphik' ) );

	Page::addCSS( array( 'lightwindow', 'lightwindow_de' ) );
	Page::addJavaScript( array( 'prototype', 'effects', 'lightwindow' ) );

	Page::setXHTML();
	Page::Init();

	$xmlC = new XmlC( 'UTF-8' );
	$xml_file = file_get_contents( Page::getRootPath().'/illarion/screenshots.xml' );
	$xmlC->Set_XML_data( $xml_file );
?>

<h1>Screenshots</h1>

<h2>Inhalt</h2>

<ul>
	<?php foreach( $xmlC->obj_data->screenshots[0]->group as $currGroup ): ?>
	<li><a class="hidden" href="#group<?php echo $currGroup->index; ?>"><?php echo $currGroup->gName; ?></a></li>
	<?php endforeach; ?>
</ul>

<?php Page::insert_go_to_top_link(); ?>

<?php foreach( $xmlC->obj_data->screenshots[0]->group as $currGroup ): ?>
<div><a id="group<?php echo $currGroup->index; ?>"></a></div>
<h2><?php echo $currGroup->gName; ?></h2>
<?php foreach( $currGroup->screenshot as $index=>$currScreen ): ?>
<div style="margin:3px;float:left;width:205px;height:115px;text-align:center;vertical-align:center;">
	<a style="margin:auto;" href="<?php echo Page::getMediaURL(); ?>/screenshots/<?php echo $currScreen->filename; ?>" title="<?php echo $currScreen->gName; ?>" rel="Illarion Screenshots--<?php echo $currGroup->gName; ?>" class="lightwindow" onclick="return false;">
		<img src="<?php echo Page::getMediaURL(); ?>/screenshots/preview/<?php echo $currScreen->filename; ?>" width="205" height="115" alt="Auf das Bild klicken um es in voller Größe zu sehen" />
	</a>
</div>
<?php endforeach; ?>
<div class="clr"></div>

<?php Page::insert_go_to_top_link(); ?>
<?php endforeach; ?>