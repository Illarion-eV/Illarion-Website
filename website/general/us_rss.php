<?php
    include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

    define('IN_RSS_FEED', 1);

    require __DIR__ . '/inc_rss.php';

    Page::setXML( 'application/rss+xml' );
    Page::Init();
?>
<rss version="2.0">
	<channel>
		<title>News of Illarion</title>
		<link><?php echo Page::getURL(); ?>/general/us_rss.php</link>
		<description>The current news of the online-roleplaygame Illarion</description>
		<language>en-us</language>
		<copyright>Illarion e.V.</copyright>
		<lastBuildDate><?php echo date(DATE_RSS, $time); ?></lastBuildDate>
		<pubDate><?php echo date(DATE_RSS, $time); ?></pubDate>
		<managingEditor>website@illarion.org</managingEditor>
		<webMaster>website@illarion.org</webMaster>
        <?php echo $newsRenderer->renderList($news_list, 'en'); ?>
	</channel>
</rss>