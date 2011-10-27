<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( 'Entwicklungsstatus' );
	Page::setDescription( 'Diese Seite zeigt an, wie es um die Entwicklung von Illarion steht.' );

	Page::addCSS( 'onlineplayer' );

	Page::setXHTML();
	Page::Init();
?>

<h1>Entwicklungsstatus (VBU)</h1>

<h2>
	Inhalt
</h2>

<?php
$filename = "/home/vilarion/public_html/project_status.txt";
$file = fopen($filename, "r");
$project_status = fread($file, filesize($filename));
echo $project_status
?>

