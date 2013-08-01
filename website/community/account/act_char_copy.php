<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	if (!is_numeric($_POST['charid']))
	{
		exit();
	}

	$pgSQL =& Database::getPostgreSQL( 'illarionserver' );

	$charid = $pgSQL->Quote( $_POST['charid'] );

	$query = 'SELECT COUNT(*)'
	.PHP_EOL.' FROM illarionserver.chars'
	.PHP_EOL.' WHERE chr_accid = '.$pgSQL->Quote( IllaUser::$ID )
	.PHP_EOL.' AND chr_playerid = '.$pgSQL->Quote( $charid )
	;
	$pgSQL->setQuery( $query );
	if ( !$pgSQL->loadResult() )
	{
		exit();
	}

	$query = 'SELECT COUNT(*)'
	.PHP_EOL.' FROM "testserver"."onlineplayer"'
	.PHP_EOL.' WHERE "on_playerid" = '.$pgSQL->Quote( $charid );
    $pgSQL->setQuery( $query );
    $isOnline = ($pgSQL->loadResult() > 0);
	if ($isOnline)
	{
		Messages::add((Page::isGerman() ? 'Der Zielcharakter ist eingeloggt und kann nicht überschrieben werden.' : 'The target character is logged in and cannot be overwritten.'), 'error');
	}
	else
	{
		$query = 'SELECT illarionserver.transfer_player_to_testserver('.$pgSQL->Quote( $charid ).')';
		$pgSQL->setQuery( $query );
		$pgSQL->query();

		Messages::add((Page::isGerman() ? 'Dein Charakter wurde kopiert.' : 'Your character has been copied.'), 'info');
	}
?>
