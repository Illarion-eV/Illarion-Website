<?php
class News {
	static function amount() {
		$pgSQL = &Database::getPostgreSQL();
		$query = 'SELECT COUNT(*)'
		 . PHP_EOL . ' FROM homepage.news'
		 . PHP_EOL . ' WHERE n_title_' . Page::getLanguage() . ' != \'\'' ;
		$pgSQL->setQuery($query, 0, 1);

		return (int)$pgSQL->loadResult();
	}

	static function listindex_of_id($id) {
		$pgSQL = &Database::getPostgreSQL();
		$query = 'SELECT n_published_at'
		 . PHP_EOL . ' FROM homepage.news'
		 . PHP_EOL . ' WHERE n_id = ' . $pgSQL->Quote($id) ;
		$pgSQL->setQuery($query, 0, 1);
		$query = 'SELECT COUNT(*)'
		 . PHP_EOL . ' FROM homepage.news'
		 . PHP_EOL . ' WHERE n_title_' . Page::getLanguage() . ' != \'\''
		 . PHP_EOL . ' AND n_published_at >= ' . $pgSQL->Quote($pgSQL->loadResult()) ;
		$pgSQL->setQuery($query, 0, 1);

		return (int)$pgSQL->loadResult();
	}

	static function load_from_db($order = 'DESC', $count = 5, $offset = 0) {
		$order = (strtoupper($order) == 'ASC' ? 'ASC' : 'DESC');
		$pgSQL = &Database::getPostgreSQL();
		$query = 'SELECT n_id AS id,n_title_de AS title_de,n_title_us AS title_us,n_content_de AS content_de,n_content_us AS content_us,n_use_capital AS use_capital,date_part(\'epoch\', n_published_at) AS published_at,n_user_id AS author,acc_name AS name'
		 . PHP_EOL . ' FROM homepage.news'
		 . PHP_EOL . ' LEFT JOIN accounts.account ON acc_id = n_user_id'
		 . PHP_EOL . ' ORDER BY n_published_at ' . $order ;
		$pgSQL->setQuery($query, $offset, $count);

		if ($count == 1) {
			$result = $pgSQL->loadAssocRow();
		}
		$result = $pgSQL->loadAssocList();

		return $result;
	}

	static function load_id_from_db($id) {
		if (!$id) {
			return false;
		}
		$pgSQL = &Database::getPostgreSQL();
		$query = 'SELECT n_id AS id,n_title_de AS title_de,n_title_us AS title_us,n_content_de AS content_de,n_content_us AS content_us,n_use_capital AS use_capital,date_part(\'epoch\', n_published_at) AS published_at,n_user_id AS author,acc_name AS name'
		 . PHP_EOL . ' FROM homepage.news'
		 . PHP_EOL . ' LEFT JOIN accounts.account ON acc_id = n_user_id'
		 . PHP_EOL . ' WHERE n_id = ' . $pgSQL->Quote($id) ;
		$pgSQL->setQuery($query, 0, 1);
		return $pgSQL->loadAssocRow();
	}
	static function show($news, $type = 'html', $lang = false, $edit = false) {
		if (!is_array($news)) {
			return;
		}
		if (!isset($news['id'])) {
			foreach($news as $entry) {
				self::show($entry, $type, $lang, $edit);
			}
			return;
		}
		$lang = ($lang ? $lang : Page::getLanguage());

		if (!strlen($news['title_' . $lang])) {
			return null;
		}

		if (!strlen($news['name'])) {
			switch ($news['author']) {
				case 0: $news['name'] = 'Bror';
					break;
				case 1: $news['name'] = 'Serpardum';
					break;
				case 2: $news['name'] = 'Fleariel Ellis';
					break;
				case 3: $news['name'] = 'Zarundamar';
					break;
				default: $news['name'] = (Page::isGerman() ? 'Unbekannt' : 'Unknown');
					break;
			}
		}

		if ($type == 'html') {
			echo '<div><a id="news_' . $news['id'] . '"></a></div>';
			echo '<h2>';
			if ($edit) {
				echo '<a href="', Page::getURL(), '/general/', $lang, '_edit_news.php?targetid=', $news['id'], '" style="float:right;">';
				echo '<img src="', Page::getCurrentImageURL(), '/feder.png" style="height:22px;width:18px;" alt="edit" />';
				echo '</a>';
			}
			echo htmlspecialchars($news['title_' . $lang]);
			echo '</h2>';
			$text = preg_replace('/(\n\r)|(\r\n)|(\n|\r)/', '<br />', $news['content_' . $lang]);
			if ($news['use_capital'] == 1) {
				Page::cap(substr($text, 0, 1));
				echo '<p class="hyphenate">', substr($text, 1), '</p>';
			} else {
				echo '<p class="hyphenate">', $text, '</p>';
			}

			echo '<div class="right">', ($lang == 'de' ? 'geschrieben von ' : 'written by ');
			echo '<b>', $news['name'], '</b>';
			echo ($lang == 'de' ? ' am ' : ' on ');
			echo strftime(($lang == 'de' ? '%d. %B %Y um %H:%MUhr' : '%d. %B %Y %H:%I%p'), IllaDateTime::TimestampWithOffset($news['published_at']));
			echo '<br /><br /></div>';

			Page::insert_go_to_top_link();
		} elseif ($type == 'rss') {
			echo '<item>';
			echo '<title>', htmlspecialchars($news['title_' . $lang]), '</title>';
			echo '<pubDate>', date(DATE_RSS, $news['published_at']), '</pubDate>';
			echo '<description>';
			echo '<![CDATA[';
			echo preg_replace('/(\n\r)|(\r\n)|(\n|\r)/', '<br />', $news['content_' . $lang]);
			echo ']]>';
			echo '</description>';
			echo '<link>', Page::getURL(), '/general/', $lang, '_news.php?news=', $news['id'], '#news_', $news['id'], '</link>';
			echo '<guid isPermaLink="false">news_', $news['id'], '</guid>';
			echo '<author>', $news['name'], '</author>';
			echo '<dc:creator>', $news['name'], '</dc:creator>';
			echo '</item>';
		} elseif ($type == 'short_html') {
			echo '<a href="', $url, '/general/', $lang, '_news.php?news=', $news['id'], '#news_', $news['id'], '">';
			echo $news['title_' . $lang];
			echo '</a>';
		}
	}

	static function save($news) {
		if (!IllaUser::auth('news')) {
			Messages::add((Page::isGerman() ? 'Zugriff nicht gestattet' : 'Access denieded'), 'error');
			return false;
		}
		$linebreak = array("\r\n", "\n\r", "\r", '<br>', '<br />');
		$title_de = str_replace($linebreak, "\n", trim($news['title_de']));
		$title_us = str_replace($linebreak, "\n", trim($news['$title_us']));
		$content_de = str_replace($linebreak, "\n", trim($news['$content_de']));
		$content_us = str_replace($linebreak, "\n", trim($news['$content_us']));

		if (!strlen($news['title_de']) && !strlen($news['$title_us'])) {
			Messages::add((Page::isGerman() ? 'News unvollständig' : 'News imcomplete'), 'error');
			return false;
		}

		if ((strlen($news['title_de']) && !strlen($news['content_de'])) || (strlen($news['title_us']) && !strlen($news['content_us']))) {
			Messages::add((Page::isGerman() ? 'News unvollständig' : 'News imcomplete'), 'error');
			return false;
		}
		$pgSQL = &Database::getPostgreSQL();

		if (!$news['id']) {
			$query = 'INSERT INTO homepage.news (n_title_de,n_title_us,n_content_de,n_content_us,n_user_id,n_use_capital)'
			 . PHP_EOL . ' VALUES (' . $pgSQL->Quote($news['title_de']) . ',' . $pgSQL->Quote($news['title_us']) . ',' . $pgSQL->Quote($news['content_de']) . ',' . $pgSQL->Quote($news['content_us']) . ',' . $pgSQL->Quote(IllaUser::$ID) . ',' . $pgSQL->Quote($news['use_capital']) . ')' ;
			$pgSQL->setQuery($query);
			$pgSQL->query();
			echo $pgSQL->getQuery();
			Messages::add((Page::isGerman() ? 'News wurde eingetragen' : 'News got insert'), 'info');
			return true;
		} else {
			$query = 'SELECT COUNT(*)'
			 . PHP_EOL . ' FROM homepage.news'
			 . PHP_EOL . ' WHERE n_id = ' . $pgSQL->Quote($news['id']) ;
			$pgSQL->setQuery($query);
			if (!$pgSQL->loadResult()) {
				Messages::add((Page::isGerman() ? 'Zu bearbeitender Newseintrag exsistiert nicht' : 'The edited news entry doesn\'t exsist'), 'error');
				return false;
			}
			$query = 'UPDATE homepage.news'
			 . PHP_EOL . ' SET n_title_de = ' . $pgSQL->Quote($news['title_de'])
			 . ', n_title_us = ' . $pgSQL->Quote($news['title_us'])
			 . ', n_content_de = ' . $pgSQL->Quote($news['content_de'])
			 . ', n_content_us = ' . $pgSQL->Quote($news['content_us'])
			 . ', n_use_capital = ' . $pgSQL->Quote($news['use_capital'])
			 . PHP_EOL . ' WHERE n_id = ' . $pgSQL->Quote($news['id']) ;
			$pgSQL->setQuery($query);
			$pgSQL->query();
			Messages::add((Page::isGerman() ? 'News wurde geändert' : 'News got changed'), 'info');
			return true;
		}
	}
}

?>
