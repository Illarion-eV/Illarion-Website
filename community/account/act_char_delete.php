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

	$mySQL =& Database::getMySQL();

	if ($status == 30)
	{
		$query = 'INSERT INTO `homepage_badname`(`name`)'
		.PHP_EOL.' VALUES ('.$mySQL->Quote( $name ).')'
		;
		$mySQL->setQuery( $query );
		$mySQL->query();
	}

	$query = 'INSERT INTO '.$server.'.deleted_chars (dc_acc_id, dc_char_id, dc_char_name)'
	.PHP_EOL.' VALUES ('.$pgSQL->Quote( IllaUser::$ID ).', '.$pgSQL->Quote( $charid ).', '.$pgSQL->Quote( $name ).')'
	;
	$pgSQL->setQuery( $query );
	$pgSQL->query();

	$pgSQL->Begin();
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

	$mySQL->Begin();
	$query = 'DELETE FROM `homepage_character_details`'
	.PHP_EOL.' WHERE `char_id` = '.$mySQL->Quote( $_POST['charid'] )
	;
	$mySQL->setQuery( $query );
	$mySQL->query();
	$query = 'DELETE FROM `homepage_character_votes`'
	.PHP_EOL.' WHERE `char_id` = '.$mySQL->Quote( $_POST['charid'] )
	;
	$mySQL->setQuery( $query );
	$mySQL->query();
	$mySQL->Commit();

	Messages::add((Page::isGerman() ? 'Dein Charakter wurde gelöscht.' : 'Your character was deleted.'), 'info');
?>
