<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( array('Chronicle','Dedication') );
	Page::setDescription( 'Dedication of the chronicle of Gobaith' );
	Page::setKeywords(array('Dedication','Chronicle','History','Gobaith') );

	Page::setXHTML( );
	Page::Init( );

	Page::setFirstPage( Page::getURL().'/illarion/chronik/us_chronik.php' );
	Page::setPrevPage( Page::getURL().'/illarion/chronik/us_chronik.php' );
?>

<?php Page::navBarTop(); ?>

<h1>The Chronicle of Gobaith</h1>

<h2>Dedication</h2>

<?php Page::cap( 'H' ); ?>
<p>erewith ends the first part of the Troll's Bane Chronicles. Dedicated is this
Chronicle to all citizens of Troll's Bane, which stayed nameless.</p>

<p>Our sincerly thank go to our citizens, which worked many hours in the library.
Without them, this Chronicle never succeded. This thank is dedicated mostly to Aragon
ben Galwan, Christiana and Adano Eles. Than to Josefine da Vince, Andriel and Elkrim
Also to Fieps, Nartak, Turnupto, Steffenk, Zarah, Rackere Diplomatre, Belegi,
Gwynnether, Giandor and Alain Milan. Printed was this Chronicle by Falk vom Wald.</p>

<p>Our sincerly thank for the translation is dedicated mostly to Josefine da Vince,
Cheemona, Moirear Sian, Andriel and Thalodos Artemetus. Than to Malgallad, Nartak,
Adano Eles and Jandro. Also to Mishrak, Konstantin, Galim, Zarah, Carahawen, Belegi,
Rackere Diplomatre and Aragon ben Galwan.</p>

<?php Page::navBarBottom(); ?>