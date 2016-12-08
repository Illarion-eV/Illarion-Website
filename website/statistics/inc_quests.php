<?php
	function loadQuest( $id )
	{
		$pgSQL =& Database::getPostgreSQL();
		$query = 'SELECT q_title_de, q_title_us, q_content_de, q_content_us, q_status, q_type, q_starttime, acc_id AS userid, acc_name, acc_login'
			.PHP_EOL.' FROM homepage.quests'
			.PHP_EOL.' INNER JOIN accounts.account ON q_user_id = acc_id'
			.PHP_EOL.' WHERE q_id='.$pgSQL->Quote($id)
			.( !IllaUser::auth( 'quests' ) ? PHP_EOL.' AND ( q_type != 2 OR q_user_id = '.$pgSQL->Quote( IllaUser::$ID ).')' : '' )
		;
		$pgSQL->setQuery($query, 0, 1);
		$quest = $pgSQL->loadAssocRow();

		if (is_null( $quest ))
		{
			return false;
		}
		if (!is_null( $quest['q_starttime'] ))
		{
		    $quest['q_starttime'] = strtotime( $quest['q_starttime'] );
		}
		
		return $quest;
	}

	function prepareQuestTexts( &$german, &$english )
	{
		$show_error = false;
		if ( Page::isGerman() )
		{
			$temp =& $german;
		}
		else
		{
			$temp =& $english;
		}
		$length = strlen( ( isset( $temp ) && is_string( $temp ) ? $temp : '' ) );
		if ( $length < 10 )
		{
			if ( Page::isGerman() )
			{
				$temp =& $english;
			}
			else
			{
				$temp =& $german;
			}
			$length = strlen( ( isset( $temp ) && is_string( $temp ) ? $temp : '' ) );
			$show_error = true;
			if ( $length < 10 )
			{
				return false;
			}
		}
		
		$temp = preg_replace( '/([^\s]{50})[^\s]*/', '\1', $temp );
		$temp = htmlspecialchars( $temp  );
		$temp = preg_replace( '/\s*(\n\r|\r\n|\n|\r){2}(\n\r|\r\n|\n|\r)+\s*/', '</p><p>', $temp );
		$temp = preg_replace( '/\s*[\n\r|\r\n|\n|\r]+\s*/', '<br />', $temp );
		if ($length > 700)
		{
			$capital = Page::cap( substr( $temp, 0, 1 ), true );
			if ( strlen( $capital ) > 1 )
			{
				$temp = substr( $temp, 1 );
			}
			else
			{
				$capital = '';
			}
		}
		else
		{
			$capital = '';
		}

		if ($show_error)
		{
			$error = '<p style="font-style:italic;">'.( Page::isGerman() ? 'Keine deutsche Fassung vorhanden' : 'No english version avaiable' ).'</p>';
		}
		else
		{
			$error = '';
		}
		$temp = $error.$capital.'<p>'.$temp.'</p>';
		return $temp;
	}
?>
