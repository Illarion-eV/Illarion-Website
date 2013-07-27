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
		Messages::add( ( Page::isGerman() ? 'Quest nicht gefunden.' : 'Quest not found' ), 'error' );
		include Page::getRootPath().'/statistics/'.Page::getLanguage().'_players.php';
		exit();
	}

	$pgSQL =& Database::getPostgreSQL();
	$query = 'SELECT q_user_id'
	.PHP_EOL.' FROM homepage.quests'
	.PHP_EOL.' WHERE q_id = '.$pgSQL->Quote( $id )
	;
	$pgSQL->setQuery( $query, 0, 1 );
	$quest_author = $pgSQL->loadResult();

	if (!$quest_author)
	{
		Messages::add( ( Page::isGerman() ? 'Quest nicht gefunden.' : 'Quest not found' ), 'error' );
		include Page::getRootPath().'/statistics/'.Page::getLanguage().'_players.php';
		exit();
	}

	if( $quest_author != IllaUser::$ID && !IllaUser::auth('quests') )
	{
		Messages::add( ( Page::isGerman() ? 'Dir fehlt die Berechtigung um die Quest zu löschen.' : 'You lack authorization to delete the quest.' ), 'error' );
		include Page::getRootPath().'/statistics/'.Page::getLanguage().'_quests.php';
		exit();
	}

	$query = 'DELETE FROM homepage.quests'
	.PHP_EOL.' WHERE q_id = '.$pgSQL->Quote( $id )
	;
	$pgSQL->setQuery( $query );
	$pgSQL->query();

	Messages::add( ( Page::isGerman() ? 'Quest wurde gelöscht.' : 'Quest deleted' ), 'info' );
?>
