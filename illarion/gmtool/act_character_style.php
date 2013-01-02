<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	if (!is_numeric($_GET['charid']))
	{
		exit();
	}
	$charid = $_GET['charid'];
	$server = ( isset( $_GET['server'] ) && $_GET['server'] == '1' ? 'testserver' : 'illarionserver');

	$pgSQL =& Database::getPostgreSQL( $server );

	$query = "SELECT COUNT(*)"
	. "\n FROM player"
	. "\n WHERE ply_playerid = ".$pgSQL->Quote( $_GET['charid'] )
	;
	$pgSQL->setQuery( $query );

	if (!$pgSQL->loadResult())
	{
		exit();
	}

	
	$new_bodyheight = (float)str_replace(",", ".", $_POST['bodyheight']);
	$new_weight = (float)str_replace(",", ".", $_POST['weight']);

	if (IllaUser::usesMeter())
	{
		$new_bodyheight = round($new_bodyheight*100/2.54);
	}
	if (IllaUser::usesPound())
	{
		$new_weight = round( $new_weight*100/2.204623 );
	}
	else
	{
		$new_weight *= 100;
	}

    $age = (int)$_POST['age'];
    $day = (int)$_POST['day'];
    $month = (int)$_POST['month'];

	$current_data = IllaDateTime::IllaTimestampToTime( 'array' );

	$illa_day_stamp = ( ( $current_data['year'] - $age ) - ( -10000 ) );
	if ( ( ( $month - 1 ) * 24 + $day ) > ( ( $current_data['month'] - 1 ) * 24 + $current_data['day'] ) )
	{
		$illa_day_stamp -= 1;
	}
	$illa_day_stamp = ( $illa_day_stamp * 365 ) + ( ( $month - 1 ) * 24 ) + $day;

	$query = "UPDATE player"
		.PHP_EOL."SET ply_weight = ".$pgSQL->Quote($new_weight)
		.PHP_EOL.", ply_body_height = ".$pgSQL->Quote($new_bodyheight)
		.PHP_EOL.", ply_age = ".$pgSQL->Quote($age)
		.PHP_EOL.", ply_dob = ".$pgSQL->Quote($illa_day_stamp)
		.PHP_EOL."WHERE ply_playerid = ".$pgSQL->Quote($charid)
	;

	//echo $query;

	$pgSQL->setQuery( $query );
	$pgSQL->query();

	Messages::add( (Page::isGerman() ? 'Die Einstellungen wurden gespeichert.' : 'All settings were saved.'), 'info' );
?>
