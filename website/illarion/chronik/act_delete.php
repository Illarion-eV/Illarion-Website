<?php
	if (!IllaUser::auth('chronic_edit'))
	{
		Messages::add((Page::isGerman()?'Du darfst nichts aus der Chronik löschen.':'You must not delete anything from the chronicles.'), 'error');
	}
	elseif( isset( $_POST['submit'] ) && strlen( $_POST['submit'] ) > 0 )
	{
		if (isset( $_POST['id'] ) && is_numeric( $_POST['id'] ))
		{
			$entry_id = (int)$_POST['id'];

			$db =& Database::getPostgreSQL( 'homepage' );

			$query = 'SELECT COUNT(*)'
			.PHP_EOL.' FROM chronicle'
			.PHP_EOL.' WHERE id = '.$db->Quote( $entry_id )
			;
			$db->setQuery( $query );
			if ( $db->loadResult() == 1 )
			{
				$query = 'DELETE FROM chronicle'
				.PHP_EOL.' WHERE id = '.$db->Quote( $entry_id )
				;
				$db->setQuery( $query );
				$db->query();
				Messages::add((Page::isGerman()?'Der Eintrag wurde gelöscht.':'The entry got removed.'), 'info');
			}
			else
			{
				Messages::add((Page::isGerman()?'Der Eintrag wurde nicht gefunden.':'The entry were not found.'), 'error');
			}
		}
		else
		{
			Messages::add((Page::isGerman()?'Falsche Parameter':'Bad Parameters'), 'error');
		}
	}
?>
