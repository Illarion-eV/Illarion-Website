<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setXML();
	Page::Init();
	
	$pgSQL =& Database::getPostgreSQL();
	$newsDb = new \News\NewsDatabase(false);
	$news_list = $newsDb->getNewsList(4, 0);

	$newestNewsEntry = $news_list->getEntry(0);
	$publishDateTime = $newestNewsEntry->getPublicationDate();
	$publishDateTime->setTimezone(new \DateTimeZone(date_default_timezone_get()));

	$time = $publishDateTime->getTimestamp();
	
	$query = <<<SQL
SELECT q_title_de, q_title_us, q_status, q_id, q_type, q_starttime
 FROM homepage.quests
 WHERE q_status == 3
 ORDER BY q_starttime ASC, q_status DESC, q_type DESC, COALESCE( q_title_de , q_title_us ) ASC
SQL;
	$pgSQL->setQuery($query, 0, 4);
    $quests = $pgSQL->loadAssocList();

	if (count($quests) > 0) {
		$newestQuestTime = strtotime($quests[0]['q_starttime']);
		if ($newestQuestTime > $time) {
			$time = $newestQuestTime;
		}
	}
	
	$etag = md5($time);

	header('Last-Modified: '.gmdate('D, d M Y H:i:s', $time).' GMT');
	header('ETag: '.$etag);

	$if_last_mod = isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) ? strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) : 0;
	$if_not_match = isset($_SERVER['HTTP_IF_NONE_MATCH']) ? $_SERVER['HTTP_IF_NONE_MATCH'] : 0;

	if ( $if_last_mod >= $time && $if_not_match == $etag )
	{
		header('HTTP/1.0 304 Not Modified');
		exit;
	}

	$newsRenderer = new \News\Renderer\LauncherRenderer();
?>
<launcher>
	<news>
		<?php echo $newsRenderer->renderList($news_list); ?>
	</news>
	<quests>
		<?php foreach($quests as $key=>$quest): ?>
		<item>
			<id><?php echo $quest['q_id']; ?></id>
			<title lang="de"><?php echo htmlspecialchars($quest['q_title_de']); ?></title>
			<title lang="en"><?php echo htmlspecialchars($quest['q_title_us']); ?></title>			
			<date><?php echo date(DATE_RSS, strtotime($quest['q_starttime'])); ?></date>
		</item>
		<?php endforeach; ?>
	</quests>
</launcher>