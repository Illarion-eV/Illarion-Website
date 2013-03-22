<?php
	if (!IllaUser::auth('chronic_edit'))
	{
		Messages::add((Page::isGerman()?'Du darfst die Chronik nicht editieren':'You are not allowed to edit the chronicles'), 'error');
	}
	elseif ( !isset( $_POST['text_de'] ) || !isset( $_POST['text_us'] ) || !isset( $_POST['time'] ) )
	{
		Messages::add((Page::isGerman()?'Fehler beim Bearbeiten der Chronik':'Error while editing the chronicle'), 'error');
	}
	else
	{
		$text_de = trim( $_POST['text_de'] );
		$text_us = trim( $_POST['text_us'] );

		if (!is_null( $text_de ) && strlen( $text_de ) == 0)
		{
			$text_de = NULL;
		}

		if (!is_null( $text_us ) && strlen( $text_us ) == 0)
		{
			$text_us = NULL;
		}

		$author = IllaUser::$ID;

		if ( $_POST['time'] == 'illa' )
		{
			$date = IllaDateTime::mkIllaDatestamp( (int)$_POST['time_illa_month'], (int)$_POST['time_illa_day'], (int)$_POST['time_illa_year'] );
		}
		else
		{
			$rl_time = mktime( (int)$_POST['time_rl_hour'], 0, 0, (int)$_POST['time_rl_month'], (int)$_POST['time_rl_day'], (int)$_POST['time_rl_year'] );
			$rl_time = IllaDateTime::TimestampWithoutOffset( $rl_time );
			$illa_time = IllaDateTime::IllaTimestampToTime( 'array', IllaDateTime::RLTimeToIllaTime( $rl_time ) );
			$date = IllaDateTime::mkIllaDatestamp( $illa_time['month'], $illa_time['day'], $illa_time['year'] );
		}

		$db =& Database::getPostgreSQL( 'homepage' );

		if (isset( $_POST['id'] ) && is_numeric( $_POST['id'] ))
		{
			$old_id = (int)$_POST['id'];

			$query = 'SELECT COUNT(*)'
			.PHP_EOL.' FROM chronicle'
			.PHP_EOL.' WHERE id = '.$db->Quote( $old_id )
			;
			$db->setQuery( $query );
			if ( $db->loadResult() == 1 )
			{
				$query = 'UPDATE chronicle'
				.PHP_EOL.' SET note_de = '.$db->Quote( $text_de ).','
				.PHP_EOL.' note_en = '.$db->Quote( $text_us ).','
				.PHP_EOL.' date = '.$db->Quote( $date ).','
				.PHP_EOL.' author = '.$db->Quote( $author )
				.PHP_EOL.' WHERE id = '.$db->Quote( $old_id )
				;
				$db->setQuery( $query );
				$db->query();
				Messages::add((Page::isGerman()?'Änderungen an dem Eintrag wurden gespeichert.':'Changes at the entry got saved.'), 'info');
			}
			else
			{
				Messages::add((Page::isGerman()?'Zu Editierender Eintrag wurde nicht gefunden.':'The entry that shall be changed was not found.'), 'error');
			}
		}
		else
		{
			$query = 'INSERT INTO chronicle (author,date,note_de,note_en)'
			.PHP_EOL.' VALUES ('.$db->Quote( $author ).','.$db->Quote( $date ).','.$db->Quote( $text_de ).','.$db->Quote( $text_us ).')'
			;
			$db->setQuery( $query );
			$db->query();
			Messages::add((Page::isGerman()?'Eintrag wurde der Chronik hinzugefügt.':'The new entry is saved.'), 'info');
		}
	}
