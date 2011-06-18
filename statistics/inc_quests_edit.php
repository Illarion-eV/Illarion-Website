<?php
	function loadQuestEditData( $id )
	{
		$data_from_db = true;

		if ($id)
		{
			$pgSQL =& Database::getPostgreSQL();
			if ($id)
			{
				$query = 'SELECT q_user_id'
				.PHP_EOL.' FROM homepage.quests'
				.PHP_EOL.' WHERE q_id = '.$pgSQL->Quote( $id )
				;
				$pgSQL->setQuery( $query, 0, 1 );
				$quest_author = $pgSQL->loadResult();

				if( $quest_author != IllaUser::$ID && !IllaUser::auth('quests') )
				{
					Messages::add( 'Die fehlt die Berechtigung um das Quest zu bearbeiten.', 'error' );
					include Page::getRootPath().'/statistics/de_quests.php';
					exit();
				}
			}
		}
		else
		{
			$data_from_db = false;
		}

		$title_de = '';
		$title_us = '';
		$content_de = '';
		$content_us = '';

		if ( isset( $_POST['title_de'] ) )
		{
			$title_de = ( is_null( $_POST['title_de'] ) ? '' : $_POST['title_de'] );
			$data_from_db = false;
		}
		if ( isset( $_POST['title_us'] ) )
		{
			$title_us = ( is_null( $_POST['title_us'] ) ? '' : $_POST['title_us'] );
			$data_from_db = false;
		}
		if ( isset( $_POST['content_de'] ) )
		{
			$content_de = ( is_null( $_POST['content_de'] ) ? '' : $_POST['content_de'] );
			$data_from_db = false;
		}
		if ( isset( $_POST['content_us'] ) )
		{
			$content_us = ( is_null( $_POST['content_us'] ) ? '' : $_POST['content_us'] );
			$data_from_db = false;
		}

		if (isset( $_POST['time_h'] ) || isset( $_POST['time_i'] ) || isset( $_POST['time_d'] ) || isset( $_POST['time_m'] ) || isset( $_POST['time_y'] ))
		{
			$hour   = ( isset( $_POST['time_h'] ) && is_numeric( $_POST['time_h'] ) ? (int)$_POST['time_h'] : 0 );
			$minute = ( isset( $_POST['time_i'] ) && is_numeric( $_POST['time_i'] ) ? (int)$_POST['time_i'] : 0 );

			$day    = ( isset( $_POST['time_d'] ) && is_numeric( $_POST['time_d'] ) ? (int)$_POST['time_d'] : 0 );
			$month  = ( isset( $_POST['time_m'] ) && is_numeric( $_POST['time_m'] ) ? (int)$_POST['time_m'] : 0 );
			$year   = ( isset( $_POST['time_y'] ) && is_numeric( $_POST['time_y'] ) ? (int)$_POST['time_y'] : 0 );
			$data_from_db = false;
		}
		else
		{
			$time = IllaDateTime::TimestampWithOffset();

			$hour   = date('H', $time);
			$minute = date('i', $time);

			$day    = date('d', $time);
			$month  = date('m', $time);
			$year   = date('Y', $time);
		}

		if (isset( $_POST['tba'] ) && $_POST['tba'] == true)
		{
			$tba = true;
			$data_from_db = false;
		}
		else
		{
			$tba = false;
		}

		$status = 0;
		$type = 0;

		if (isset( $_POST['status'] ) || isset( $_POST['type'] ) )
		{
			$status = ( isset( $_POST['status'] ) && is_numeric( $_POST['status'] ) ? (int)$_POST['status'] : 0 );
			$type   = ( isset( $_POST['type'] ) && is_numeric( $_POST['type'] ) ? (int)$_POST['type'] : 0 );
			if ($type == 2)
			{
				$type = 0;
			}
			$data_from_db = false;
		}

		if ($data_from_db)
		{
			$pgSQL =& Database::getPostgreSQL();
			$query = 'SELECT q_title_de, q_title_us, q_content_de, q_content_us, q_type, q_status, q_starttime'
			.PHP_EOL.' FROM homepage.quests'
			.PHP_EOL.' WHERE q_id = '.$pgSQL->Quote( $id )
			;

			$pgSQL->setQuery( $query );
			$quest_data = $pgSQL->loadAssocRow();

			$title_de = utf8_decode($quest_data['q_title_de']);
			$title_us = utf8_decode($quest_data['q_title_us']);
			$content_de = utf8_decode($quest_data['q_content_de']);
			$content_us = utf8_decode($quest_data['q_content_us']);

			$type = $quest_data['q_type'];
			$status = $quest_data['q_status'];

			if (is_null( $quest_data['q_starttime'] ))
			{
				$tba = true;
			}
			else
			{
				$tba = false;
				$time = IllaDateTime::TimestampWithOffset( strtotime( $quest_data['q_starttime'] ) );

				$hour   = date('H', $time);
				$minute = date('i', $time);

				$day    = date('d', $time);
				$month  = date('m', $time);
				$year   = date('Y', $time);
			}
		}

		$title_de = htmlentities( $title_de );
		$title_us = htmlentities($title_us );
		$content_de = htmlentities( $content_de );
		$content_us = htmlentities( $content_us );

		return array( $title_de, $title_us, $content_de, $content_us, $type, $status, $tba, $hour, $minute, $day, $month, $year );
	}
