<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	$server = ( $_POST['server'] == '1' ? 'testserver' : 'illarionserver');

	if (!is_numeric($_POST['charid']))
	{
		exit();
	}

//	$pgSQL =& Database::getPostgreSQL( $server );
	$pgSQL =& Database::getPostgreSQL();

	$charid = $pgSQL->Quote( $_POST['charid'] );

	$query = 'SELECT COUNT(*)'
	.PHP_EOL.' FROM '.$server.'.chars'
	.PHP_EOL.' WHERE chr_accid = '.$pgSQL->Quote( IllaUser::$ID )
	.PHP_EOL.' AND chr_playerid = '.$pgSQL->Quote( $charid )
	;
	$pgSQL->setQuery( $query );
	if ( !$pgSQL->loadResult() )
	{
		exit();
	}

	$query = 'SELECT chr_status'
	.PHP_EOL.' FROM '.$server.'.chars'
	.PHP_EOL.' WHERE chr_playerid = '.$pgSQL->Quote( $charid )
	;
	$pgSQL->setQuery( $query );
	$status = $pgSQL->loadResult();

	$query = 'SELECT chr_name'
    .PHP_EOL.' FROM '.$server.'.chars'
    .PHP_EOL.' WHERE chr_playerid = '.$pgSQL->Quote( $charid )
    ;
    $pgSQL->setQuery( $query );
    $name = $pgSQL->loadResult();

	$db_hp =& Database::getPostgreSQL( 'homepage' );

	if ($status == 30)
	{
		$query = 'INSERT INTO badname(name)'
		.PHP_EOL.' VALUES ('.$db_hp->Quote( $name ).')'
		;
		$db_hp->setQuery( $query );
		$db_hp->query();
	}
	
	$query = 'SELECT COUNT(*)'
	.PHP_EOL.' FROM "'.$server.'"."onlineplayer"'
	.PHP_EOL.' WHERE "on_playerid" = '.$pgSQL->Quote( $charid );
    $pgSQL->setQuery( $query );
    $isOnline = ($pgSQL->loadResult() > 0);
	if ($isOnline)
	{
		Messages::add((Page::isGerman() ? 'Der Charakter ist eingeloggt und kann nicht gelöscht werden.' : 'The character is logged in and can\'t be deleted.'), 'error');
	}
	else
	{
		$pgSQL->Begin();
		$query = 'INSERT INTO '.$server.'.deleted_chars (dc_acc_id, dc_char_id, dc_char_name)'
		.PHP_EOL.' VALUES ('.$pgSQL->Quote( IllaUser::$ID ).', '.$pgSQL->Quote( $charid ).', '.$pgSQL->Quote( $name ).')'
		;
		$pgSQL->setQuery( $query );
		$pgSQL->query();

		$query = 'DELETE FROM '.$server.'.gms'
		.PHP_EOL.' WHERE gm_charid = '.$pgSQL->Quote( $charid )
		;
		$pgSQL->setQuery( $query );
		$pgSQL->query();
		$query = 'DELETE FROM '.$server.'.playerlteffectvalues'
		.PHP_EOL.' WHERE pev_playerid = '.$pgSQL->Quote( $charid )
		;
		$pgSQL->setQuery( $query );
		$pgSQL->query();
		$query = 'DELETE FROM '.$server.'.playerlteffects'
		.PHP_EOL.' WHERE plte_playerid = '.$pgSQL->Quote( $charid )
		;
		$pgSQL->setQuery( $query );
		$pgSQL->query();
		$query = 'DELETE FROM '.$server.'.playeritems'
		.PHP_EOL.' WHERE pit_playerid = '.$pgSQL->Quote( $charid )
		;
		$pgSQL->setQuery( $query );
		$pgSQL->query();
		$query = 'DELETE FROM '.$server.'.playerskills'
		.PHP_EOL.' WHERE psk_playerid = '.$pgSQL->Quote( $charid )
		;
		$pgSQL->setQuery( $query );
		$pgSQL->query();
		$query = 'DELETE FROM '.$server.'.player'
		.PHP_EOL.' WHERE ply_playerid = '.$pgSQL->Quote( $charid )
		;
		$pgSQL->setQuery( $query );
		$pgSQL->query();
		$query = 'DELETE FROM '.$server.'.chars'
		.PHP_EOL.' WHERE chr_playerid = '.$pgSQL->Quote( $charid )
		;
		$pgSQL->setQuery( $query );
		$pgSQL->query();
		$pgSQL->Commit();

		$db_hp->Begin();
		$query = 'DELETE FROM character_details'
		.PHP_EOL.' WHERE char_id = '.$db_hp->Quote( $_POST['charid'] )
		;
		$db_hp->setQuery( $query );
		$db_hp->query();
		$query = 'DELETE FROM character_votes'
		.PHP_EOL.' WHERE char_id = '.$db_hp->Quote( $_POST['charid'] )
		;
		$db_hp->setQuery( $query );
		$db_hp->query();
		$db_hp->Commit();

		Messages::add((Page::isGerman() ? 'Dein Charakter wurde gelöscht.' : 'Your character was deleted.'), 'info');
	}
?>
