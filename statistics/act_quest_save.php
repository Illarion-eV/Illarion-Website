<?php
	function prepareData( &$data )
	{
		$data = ( isset( $data ) && is_string( $data ) ? trim( (string)$data ) : '' );
		$data = stripslashes( $data );
		$data = ( strlen( $data ) > 0 ? $data : null );
		return $data;
	}

	if (IllaUser::loggedIn())
	{
		$id = ( is_numeric( $_POST['id'] ) ? (int)$_POST['id'] : false );

		$pgSQL =& Database::getPostgreSQL();
		if ($id)
		{
			$query = 'SELECT q_user_id, q_type'
			.PHP_EOL.' FROM homepage.quests'
			.PHP_EOL.' WHERE q_id = '.$pgSQL->Quote( $id )
			;
			$pgSQL->setQuery( $query, 0, 1 );
			list($quest_author,$old_type) = $pgSQL->loadRow();

			if( $quest_author != IllaUser::$ID && !IllaUser::auth('quests') )
			{
				Messages::add( ( Page::isGerman() ? 'Die fehlt die Berechtigung um das Quest zu bearbeiten.' : 'You lack of the authorization to edit the quest.' ), 'error' );
				includeWrapper::includeOnce( Page::getRootPath().'/statistics/'.Page::getLanguage().'_quests.php' );
				exit();
			}
		}

		$title_de = prepareData( $_POST['title_de'] );
		$title_us = prepareData( $_POST['title_us'] );
		$content_de = prepareData( $_POST['content_de'] );
		$content_us = prepareData( $_POST['content_us'] );

		if ($title_de == NULL && $title_us == NULL)
		{
			Messages::add( ( Page::isGerman() ? 'Der Titel muss in mindestens einer Sprache angegeben sein.' : 'The title needs to be set in at least one language.' ), 'error' );
			includeWrapper::includeOnce( Page::getRootPath().'/statistics/'.Page::getLanguage().'_quests_edit.php' );
			exit();
		}

		if ($content_de == NULL && $content_us == NULL)
		{
			Messages::add( ( Page::isGerman() ? 'Die Beschreibung muss in mindestens einer Sprache angegeben sein.' : 'The description needs to be set in at least one language.' ), 'error' );
			include Page::getRootPath().'/statistics/'.Page::getLanguage().'_quests_edit.php';
			exit();
		}

		if ($content_de != NULL && strlen( $content_de ) < 10)
		{
			Messages::add( ( Page::isGerman() ? 'Die deutsche Beschreibung des Quests ist zu kurz.' : 'The german description of the text is too short.' ), 'error' );
			include Page::getRootPath().'/statistics/'.Page::getLanguage().'_quests_edit.php';
			exit();
		}

		if ($content_us != NULL && strlen( $content_us ) < 10)
		{
			Messages::add( ( Page::isGerman() ? 'Die englische Beschreibung des Quests ist zu kurz.' : 'The english description of the text is too short.' ), 'error' );
			include Page::getRootPath().'/statistics/'.Page::getLanguage().'_quests_edit.php';
			exit();
		}

		if (isset( $_POST['tba'] ) && $_POST['tba'] == true)
		{
			$starttime = NULL;
		}
		else
		{
			$hour   = ( isset( $_POST['time_h'] ) && is_numeric( $_POST['time_h'] ) ? (int)$_POST['time_h'] : 0 );
			$minute = ( isset( $_POST['time_i'] ) && is_numeric( $_POST['time_i'] ) ? (int)$_POST['time_i'] : 0 );

			$day    = ( isset( $_POST['time_d'] ) && is_numeric( $_POST['time_d'] ) ? (int)$_POST['time_d'] : 0 );
			$month  = ( isset( $_POST['time_m'] ) && is_numeric( $_POST['time_m'] ) ? (int)$_POST['time_m'] : 0 );
			$year   = ( isset( $_POST['time_y'] ) && is_numeric( $_POST['time_y'] ) ? (int)$_POST['time_y'] : 0 );

			if ( $hour < 0 || $hour > 23 || $minute < 0 || $minute > 59 || !checkdate( $month, $day, $year ) )
			{
				Messages::add( ( Page::isGerman() ? 'Das Datum ist nicht gültig.' : 'The date is invalid.' ), 'error' );
				include Page::getRootPath().'/statistics/'.Page::getLanguage().'_quests_edit.php';
				exit();
			}

			$starttime = IllaDateTime::TimestampWithoutOffset( mktime( $hour, $minute, 0, $month, $day, $year ) );
			$starttime = date( 'Y-m-d H:i:s', $starttime );
		}

		$status = ( isset( $_POST['status'] ) && is_numeric( $_POST['status'] ) ? (int)$_POST['status'] : 0 );
		$type   = ( isset( $_POST['type'] ) && is_numeric( $_POST['type'] ) ? (int)$_POST['type'] : 0 );

		if ( (!$id && !IllaUser::auth('quests') ) || $old_type == 2)
		{
			$type = 2;
		}
		elseif ( !IllaUser::auth('quests') )
		{
			$type = 0;
		}

		if ( $type == 2 )
		{
		    $status = 0;
		}

		if ($status < 0 || $status > 3)
		{
			Messages::add( ( Page::isGerman() ? 'Der Status des Quests ist ungültig. Bitte korrigieren sie die Eingaben.' : 'The status of the quest is invalid. Please correct the settings.' ), 'error' );
			include Page::getRootPath().'/statistics/'.Page::getLanguage().'_quests_edit.php';
			exit();
		}

		if ( $status == 1 && is_null( $starttime ) )
		{
			Messages::add( ( Page::isGerman() ? 'Der Queststatus "Startet in Kürze" ist nur gültig wenn eine klare Startzeit angegeben wurde.' : 'The status "starts soon" is only valid in case a clear starting time is set.' ), 'error' );
			include Page::getRootPath().'/statistics/'.Page::getLanguage().'_quests_edit.php';
			exit();
		}

		if ($id)
		{
			$query = 'UPDATE homepage.quests'
			.PHP_EOL.' SET q_title_de = '.$pgSQL->Quote( $title_de )
			. ', q_title_us = '.$pgSQL->Quote( $title_us )
			. ', q_content_de = '.$pgSQL->Quote( $content_de )
			. ', q_content_us = '.$pgSQL->Quote( $content_us )
			. ', q_status = '.$pgSQL->Quote( $status )
			. ', q_type = '.$pgSQL->Quote( $type )
			. ', q_starttime = '.$pgSQL->Quote( $starttime )
			.PHP_EOL.' WHERE q_id = '.$pgSQL->Quote( $id )
			;
		}
		else
		{
			$query = 'INSERT INTO homepage.quests (q_title_de, q_title_us, q_content_de, q_content_us, q_user_id, q_status, q_type, q_starttime)'
			.PHP_EOL.' VALUES ('.$pgSQL->Quote( $title_de ).','.$pgSQL->Quote( $title_us ).','.$pgSQL->Quote( $content_de ).','.$pgSQL->Quote( $content_us ).','.$pgSQL->Quote( IllaUser::$ID ).','.$pgSQL->Quote( $status ).','.$pgSQL->Quote( $type ).','.$pgSQL->Quote( $starttime ).')'
			;
		}
		$pgSQL->setQuery( $query );
		$pgSQL->query();

		if (!$id)
		{
			$pgSQL->setQuery('SELECT * FROM homepage.quests WHERE q_id = currval(\'quest_seq\')');
			$_POST['id'] = $pgSQL->loadResult();
		}

		if ($type == 2)
		{
			Messages::add( ( Page::isGerman() ? 'Die Quest wurde eingetragen, aber sie muss noch von einem GM bestätigt werden.' : 'The quest got saved, how ever a GM still needs to confirm the quest.' ), 'info' );
		}
		else
		{
			Messages::add( ( Page::isGerman() ? 'Die Quest wurde eingetragen.' : 'The quest got saved.' ), 'info' );
		}

		includeWrapper::includeOnce( Page::getRootPath().'/statistics/'.Page::getLanguage().'_quests.php' );
		exit();
	}
?>
