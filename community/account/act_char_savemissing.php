<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	processSave();

    function processSave()
    {
    	if (!is_numeric($_POST['charid']))
    	{
    		exit();
    	}

    	$server = ( $_POST['server'] == '1' ? 'testserver' : 'illarionserver');

    	$pgSQL =& Database::getPostgreSQL( $server );

    	$charid = $pgSQL->Quote( $_POST['charid'] );

    	$query = "SELECT chr_status, chr_race, ply_dob"
    	. "\n FROM chars"
    	. "\n INNER JOIN player ON ply_playerid = chr_playerid"
    	. "\n WHERE chr_accid = ".$pgSQL->Quote( IllaUser::$ID )
    	. "\n AND chr_playerid = ".$charid
    	;
    	$pgSQL->setQuery( $query );
    	$chardata = $pgSQL->loadAssocRow();

    	if ( $chardata['chr_status'] != 40 && $chardata['ply_dob'] > 0 )
    	{
    		return;
    	}

    	$account =& Database::getPostgreSQL( 'accounts' );

    	$query = "SELECT minage, maxage, minweight, maxweight, minbodyheight, maxbodyheight"
    	. "\n FROM raceattr"
    	. "\n WHERE id IN ( -1, ".$account->Quote( $chardata['chr_race'] )." )"
    	. "\n ORDER BY id DESC"
    	. "\n LIMIT 1"
    	;
    	$account->setQuery( $query );
    	$limits = $account->loadAssocRow();

    	$query = array();
    	if ( $chardata['chr_status'] == 40 )
    	{

    		$new_bodyheight = (float)str_replace(',','.',$_POST['bodyheight']);
    		$new_weight = (float)str_replace(',','.',$_POST['weight']);

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

    		if ( $new_weight < $limits['minweight'] || $new_weight > $limits['maxweight'] )
    		{
    		    Messages::add((Page::isGerman() ? 'Das gew‰hlte Gewicht ist auﬂerhalb der Zul‰ssigen Grenzen.' : 'The chosen weight is out of Range').' '.$limits['minweight'].'&lt;'.$new_weight.'&lt;'.$limits['maxweight'], 'error');
    		    return;
    		}
    		if ( $new_bodyheight < $limits['minbodyheight'] || $new_bodyheight > $limits['maxbodyheight'] )
    		{
    		    Messages::add((Page::isGerman() ? 'Die gew‰hlte Kˆrpergrˆﬂe ist auﬂerhalb der Zul‰ssigen Grenzen.' : 'The chosen bodyheight is out of Range').' '.$limits['minbodyheight'].'&lt;'.$new_bodyheight.'&lt;'.$limits['maxbodyheight'], 'error');
    		    return;
    		}

    		$query[] = 'ply_weight = '.$pgSQL->Quote( $new_weight );
    		$query[] = 'ply_body_height = '.$pgSQL->Quote( $new_bodyheight );
    	}

    	if ( $chardata['chr_status'] == 40 || !$chardata['ply_dob'] )
    	{
    		$age = (int)$_POST['age'];
    		$day = (int)$_POST['day'];
    		$month = (int)$_POST['month'];

    		if ( $age < $limits['minage'] || $age > $limits['maxage'] )
    		{
    		    Messages::add((Page::isGerman() ? 'Das gew‰hlte Alter ist auﬂerhalb der zul‰ssigen Grenzen.' : 'The chosen age is out of Range').' '.$limits['minage'].'&lt;'.$age.'&lt;'.$limits['maxage'], 'error');
    		    return;
    		}

    		$current_data = IllaDateTime::IllaTimestampToTime( 'array' );

    		$illa_day_stamp = ( ( $current_data['year'] - $age ) - ( -10000 ) );
    		if ( ( ( $month - 1 ) * 24 + $day ) > ( ( $current_data['month'] - 1 ) * 24 + $current_data['day'] ) )
    		{
    			$illa_day_stamp -= 1;
    		}
    		$illa_day_stamp = ( $illa_day_stamp * 365 ) + ( ( $month - 1 ) * 24 ) + $day;

    		$query[] = 'ply_dob = '.$pgSQL->Quote( $illa_day_stamp );
    		$query[] = 'ply_age = '.$pgSQL->Quote( $age );
    	}

    	$query = "UPDATE player"
    	. "\n SET ".implode( ', ', $query )
    	. "\n WHERE ply_playerid = ".$charid
    	;
    	$pgSQL->setQuery( $query );
    	$pgSQL->query();

    	if ( $chardata['chr_status'] == 40 )
    	{
    		$query = "UPDATE chars"
    		. "\n SET chr_status = 0"
    		. "\n WHERE chr_playerid = ".$charid
    		;
    		$pgSQL->setQuery( $query );
    		$pgSQL->query();
    	}

    	Messages::add((Page::isGerman() ? 'Die Informationen wurden gespeichert.' : 'All information were saved.'), 'info');
    }
?>