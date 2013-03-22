<?php
    if (!IllaUser::loggedIn())
    {
        Messages::add( ( Page::isGerman() ? 'Zugriff verweigert.' : 'Access denied.' ), 'error' );
        include Page::getRootPath().'/statistics/'.Page::getLanguage().'_players.php';
        exit();
    }
	$id = ( is_numeric( $_POST['id'] ) ? (int)$_POST['id'] : false );

	if ( !$id )
	{
		Messages::add( ( Page::isGerman() ? 'Quest nicht gefunden.' : 'Quest was not found' ), 'error' );
		include Page::getRootPath().'/statistics/'.Page::getLanguage().'_players.php';
		exit();
	}

	$pgSQL =& Database::getPostgreSQL();
	$query = 'SELECT COUNT(*)'
	.PHP_EOL.' FROM homepage.quests'
	.PHP_EOL.' WHERE q_id = '.$pgSQL->Quote( $id )
	;
	$pgSQL->setQuery( $query, 0, 1 );
	$found_quest = ( $pgSQL->loadResult() == 1 );

	if (!$found_quest)
	{
		Messages::add( ( Page::isGerman() ? 'Quest nicht gefunden.' : 'Quest was not found' ), 'error' );
		include Page::getRootPath().'/statistics/'.Page::getLanguage().'_players.php';
		exit();
	}

	if( !IllaUser::auth('quests') )
	{
		Messages::add( ( Page::isGerman() ? 'Dir fehlt die Berechtigung um das Quest zu aktivieren.' : 'You lack of the authorization to activate the quest.' ), 'error' );
		include Page::getRootPath().'/statistics/'.Page::getLanguage().'_quests.php';
		exit();
	}

	$query = 'UPDATE homepage.quests'
	.PHP_EOL.' SET q_type = 0'
	.PHP_EOL.' WHERE q_id = '.$pgSQL->Quote( $id )
	;
	$pgSQL->setQuery( $query );
	$pgSQL->query();

	Messages::add( ( Page::isGerman() ? 'Quest wurde aktiviert.' : 'Quest got activated' ), 'info' );
?>
