<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

    define('IN_RSS_FEED', 1);

    require __DIR__ . '/inc_rss.php';

	Page::setXML( 'application/rss+xml' );
	Page::Init();
?>
<rss version="2.0">
	<channel>
		<title>News of Illarion - News von Illarion</title>
		<link><?php echo Page::getURL(); ?>/general/rss.php</link>
		<description>
            <p>The current news of the online-roleplaygame Illarion</p>
            <p>Die aktuellen Nachrichten des Online-Rollenspiels Illarion</p>
        </description>
		<copyright>Illarion e.V.</copyright>
		<lastBuildDate><?php echo date(DATE_RSS, $time); ?></lastBuildDate>
		<pubDate><?php echo date(DATE_RSS, $time); ?></pubDate>
		<managingEditor>webmaster@illarion.org</managingEditor>
		<webMaster>webmaster@illarion.org</webMaster>
		<?php echo $newsRenderer->renderList($news_list, 'un'); ?>
	</channel>
</rss>