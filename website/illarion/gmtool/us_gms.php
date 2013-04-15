<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_topmenu.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_accountmenu.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_account.php' );

	if (!IllaUser::auth('gmtool_gms'))
	{
		Messages::add( (Page::isGerman() ? 'Zugriff verweigert' : 'Access denied'), 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}


	Page::setTitle( array( 'GM Tool', 'Account', 'Gamemaster'  ) );
    Page::setDescription( 'GameMaster Management Tool' );
    Page::setKeywords( array( 'GM Tool', 'Account', 'Gamemaster' ) );

    Page::addCSS( array( 'menu', 'gmtool' ) );

    Page::setXHTML();
    Page::Init();

?>

<h1>GameMaster Management</h1>

<?php include_menu(); ?>

<div class="spacer"></div>

<div class='center'>Coming soon</div>
