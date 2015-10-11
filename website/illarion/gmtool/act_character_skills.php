<?php
    if (!IllaUser::auth('gmtool_chars'))
    {
        Messages::add((Page::isGerman()?'Zugriff verweigert':'Access denied'), 'error');
        includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
        exit();
    }

    $server = ( isset( $_GET['server'] ) && $_GET['server'] == '1' ? 'devserver' : 'illarionserver');
    $charid = ( isset( $_GET['charid'] )  && is_numeric($_GET['charid']) ? (int)$_GET['charid'] : false );
	$type = ( isset( $_GET['filter'] )  && is_numeric($_GET['filter']) ? (int)$_GET['filter'] : 0 );

    if (!$charid)
    {
        Messages::add((Page::isGerman()?'Charakter ID wurde nicht richtig übergeben':'Character ID was not transferred correctly'), 'error');
        includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
        exit();
    }


	$skill_list = getSkillList( $server, $type);
	$old_data = getCharSkills( $charid, $server, $type );	

	$diff_data = array();
	$error = false;
	$msg="";

	$new_data = $_POST;
	unset($new_data['action']);
	unset($new_data['submit']);
/*
echo "<pre>";
    echo "newdata:";
    print_r($new_data);
	echo "olddata:";
    print_r($old_data);
	echo "skill_list:";
    print_r($skill_list);
echo "</pre>";
*/
	// validate
	foreach($new_data as $key=>$new_value)
	{
		// welche daten wurden überhaupt geändert?
		if ($new_value != $old_data[$key])
		{
			$diff_data[$key] = $new_value;
			$msg .= "[".$skill_list[$key]['skl_name'].": ".$old_data[$key]." to ".$new_value."]";
		}

		// check: Ist wert größer als 100 oder kleiner als 0?
		if ( ($new_value > 100) || ($new_value < 0))
        {
            Messages::add((Page::isGerman()?'Skills müssen zwischen 0 und 100 liegen':'Skills has to been between 0 and 100'), 'error');
            $error = true;
        }		
	}
/*
	echo $msg;
echo "<pre>";
    echo "newdata:";
    print_r($diff_data);
echo "</pre>";
		
*/
	
	// Jetzt speichern

	$pgSQL =& Database::getPostgreSQL();
	foreach($diff_data as $key=>$value)
	{
		if ($value==0)
		{
			// loeschen
			$query = "DELETE FROM ".$server.".playerskills WHERE psk_playerid = ".$pgSQL->Quote( $charid )." AND psk_skill_id = ".$pgSQL->Quote( $key );
		}
		elseif ($old_data[$key]==0)
		{
			// neu 
			$query = "INSERT INTO ".$server.".playerskills (psk_playerid, psk_skill_id, psk_value) "
					.PHP_EOL."VALUES (".$pgSQL->Quote( $charid).",".$pgSQL->Quote( $key).",".$pgSQL->Quote($value).")"; 
		}
		else
		{
			// update
			$query = "UPDATE ".$server.".playerskills SET psk_value = ".$pgSQL->Quote( $value )." WHERE psk_playerid = ".$pgSQL->Quote( $charid )." AND psk_skill_id = ".$pgSQL->Quote( $key );
		}
		$pgSQL->setQuery( $query );
		$pgSQL->query();
	}	


	// get accid
    $query = 'SELECT chr_accid'
          .PHP_EOL.'FROM '.$server.'.chars'
          .PHP_EOL.'WHERE chr_playerid = '.$pgSQL->Quote( $charid )
          ;
    $pgSQL->setQuery( $query );
    $accid = $pgSQL->loadResult();

	$msg = "Change Skill: ".$msg;
    writeCharLog($accid, $charid, IllaUser::$ID, $msg, CHAR_LOG_TYPE_CHANGE_SKILL, $server);

    Messages::add((Page::isGerman()?'Änderungen wurden gespeichert':'Changes got saved'), 'info');

