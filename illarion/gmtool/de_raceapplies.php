<?php
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php' );
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/shared/illarion_data.php' );
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/inc_topmenu.php' );

	if (!IllaUser::auth('gmtool_raceapplys'))
	{
		Messages::add('Zugriff verweigert', 'error');
		include_once( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	create_header( 'Illarion - GM-Tool - Account Arbeit - Rassenbewerbungen',
	'Auf dieser Seite kannst du Rassenbewerbungen bearbeiten',
	'GM-Tool, Accounts, Rassenbewerbungen', '', 'menu', 'prototype', true );
	include_header();
?>

<h1>Rassenbewerbungen bearbeiten</h1>

<?php include_menu(); ?>


<?php include_footer(); ?>