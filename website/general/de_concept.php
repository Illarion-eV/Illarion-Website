<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( 'Das kostenlose Online-Rollenspiel' );
	Page::setDescription( 'Illarion ist ein kostenloses Online-Rollenspiel in einer mittelalterlichen Fantasy Umgebung mit dem Schwerpunkt auf echtes Rollenspiel.' );
	Page::setKeywords( array( 'Startseite', 'Neuigkeiten' ) );
	Page::addCSS( array( 'lightwindow', 'lightwindow_de', 'onlineplayer' ) );
	Page::addJavaScript( array( 'prototype', 'effects', 'lightwindow' ) );
	Page::setXHTML();
	Page::Init();
	
	$xmlC = new XmlC( 'UTF-8' );
	$xml_file = file_get_contents( Page::getRootPath().'/illarion/screenshots_start.xml' );
	$xmlC->Set_XML_data( $xml_file );
?>

<h1>Spielkonzept</h1>

<h3>Die Welt Illarion</h3>
<p class="hyphenate">Illarion ist eine reife Fantasy-Welt, in der Orks, Elfen und viele andere Kreaturen anzutreffen sind. Es ist eine offene, lebendige Welt mit greifbarem Hintergrund. Sechzehn Götter werden von den Bewohnern von drei Reichen verehrt.</p>

<h3>Dein Abenteuer</h3>
<p class="hyphenate">Deine Entscheidungen und Taten formen und gestalten die Welt. Sie werden eines Tages die Seiten der Geschichtsbücher Illarions füllen. Werde Eins mit der Welt und lass deinen Charakter werden, was du möchtest.</p>

<h3>Keine Grenzen</h3>
<p class="hyphenate">Dein Charakter wird nicht auf eine feste Klasse eingegrenzt wie bei den meisten MMORPGs. Du kannst deinen eigenen Charakter formen und sein Schicksal ist nur von deinen Entscheidungen, Vorstellungen und den Spielregeln begrenzt. Das Spiel hat ein skillbasiertes Levelsystem, welches es dem Spieler erlaubt, seine eigene einzigartige Spielerfahrung zu machen.</p>

<h3>Kostenlos und Open Source</h3>
<p class="hyphenate">Illarion ist komplett kostenlos. Das Spiel wird von einem eingetragenen Verein geführt und von hochmotivierten Freiwilligen betrieben. Der Client-, Server- und Spielcode sind Open Source gemäß den Bedingungen der Lizenzen GPLv3 und APGPLv3.</p>

<h3>Immersives Spielkonzept</h3>
<p class="hyphenate">Die angewandten Spielmechaniken halten die Balance zwischen Komplexität, Innovation und Motivation der Spieler. Illarion ist ein klassisches Spiel im gemächlichen Tempo mit isometrischen Retrografiken und modernen Technologien zugleich.</p>

<?php insert_go_to_top_link(); ?>

<?php include_footer(); ?>