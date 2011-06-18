<?php

    if (!IllaUser::auth('build_edit'))
    {
        Messages::add((Page::isGerman()?'Du darfst die Chronik nicht editieren':'You are not allowed to edit the chronicles'), 'error');
    }
    else
    {

		$pgSQL =& Database::getPostgreSQL();
       	
		if (isset( $_POST['id'] ) && is_numeric( $_POST['id'] ))
       	{
       	    $old_id = (int)$_POST['id'];
			$query = 'SELECT COUNT(*)'
					.PHP_EOL.' FROM homepage.build_rules'
					.PHP_EOL.' WHERE br_id='.$pgSQL->Quote($old_id)
			;
			$pgSQL->setQuery($query);
			
       	    if ( $pgSQL->loadResult() == 1 )
       	    {
				if ($_POST['delete']=="yes")
				{
					$query = 'DELETE FROM homepage.build_rules'
	                .PHP_EOL.' WHERE br_id='.$pgSQL->Quote( $old_id )
	                ;
	                $pgSQL->setQuery( $query );
	                $pgSQL->query();
	                Messages::add((Page::isGerman()?'Der Eintrag wurde gelöscht.':'The entry got removed.'), 'info');
				}
				else
				{
        	        $query = 'UPDATE homepage.build_rules'
        	        .PHP_EOL.' SET br_type = '.$pgSQL->Quote( $_POST['typ'] ).','
					.PHP_EOL.' br_title_de = '.$pgSQL->Quote( $_POST['head_de'] ).','
        	        .PHP_EOL.' br_title_us = '.$pgSQL->Quote( $_POST['head_us'] ).','
        	        .PHP_EOL.' br_content_de = '.$pgSQL->Quote( $_POST['text_de'] ).','
        	        .PHP_EOL.' br_content_us = '.$pgSQL->Quote( $_POST['text_us'] )
        	        .PHP_EOL.' WHERE br_id = '.$pgSQL->Quote( $old_id )
        	        ;
        	        $pgSQL->setQuery( $query );
        	        $pgSQL->query();
      		        Messages::add((Page::isGerman()?'Änderungen an dem Eintrag wurden gespeichert.':'Changes at the entry got saved.'), 'info');
				}
       	    }
       	    else
       	    {
       	        Messages::add((Page::isGerman()?'Der Eintrag wurde nicht gefunden.':'The entry  was not found.'), 'error');
       	    }
		}
		else
		{
		    $query = 'INSERT INTO homepage.build_rules (br_type,br_title_de,br_title_us,br_content_de,br_content_us)'
       	    .PHP_EOL.' VALUES ('.$pgSQL->Quote( $_POST['typ'] ).','.$pgSQL->Quote( $_POST['head_de'] ).','.$pgSQL->Quote( $_POST['head_us'] ).','.$pgSQL->Quote( $_POST['text_de'] ).','.$pgSQL->Quote( $_POST['text_de'] ).')'
       	    ;
       	    $pgSQL->setQuery( $query );
       	    $pgSQL->query();
       	    Messages::add((Page::isGerman()?'Eintrag wurde zu den Bauregeln hinzugefügt.':'The new entry is saved.'), 'info');
		}

	}


?>
