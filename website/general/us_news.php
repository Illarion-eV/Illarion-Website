<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( 'Current News' );
	Page::setDescription( 'This page contains the current news of Illarion' );
	Page::setKeywords( array( 'News' ) );
	Page::setXHTML();
	Page::Init();

    define( 'NEWS_PER_PAGE', 5 );

    $newsDb = new \News\NewsDatabase(IllaUser::auth('news'));


    if (isset($_GET['news']) && is_numeric( $_GET['news'] ))
    {
        $page = ceil($newsDb->getListIndexOfNewsEntry((int)$_GET['news'])/NEWS_PER_PAGE );
    }
    else
    {
        $page = (isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1);
    }
    $offset = ($page - 1) * NEWS_PER_PAGE;
    $count = $newsDb->getAmount();
    $pages = ceil($count / NEWS_PER_PAGE);
?>

<h1>
	<a href="<?php echo Page::getURL(); ?>/general/us_rss.php" style="float:right;">
		<img src="<?php echo Page::getCurrentImageURL(); ?>/rss.png" height="32" width="32" alt="RSS-Feed" />
	</a>
	News
</h1>
<p class="hyphenate">
    Do you want to stay tuned and receive the latest news with your email client or browser?
    <a href="<?php echo Page::getURL(); ?>/general/us_rss.php">Subscribe to our RSS feed!</a>
</p>

<?php if (IllaUser::auth('news')): ?>
<a href="<?php echo Page::getCurrentURL(); ?>/general/us_edit_news.php">Create new newsentry</a>
<?php endif; ?>

<?php
    $newsRenderer = new \News\Renderer\HTMLRenderer(IllaUser::auth('news'));
    echo $newsRenderer->renderList($newsDb->getNewsList(NEWS_PER_PAGE, $offset), 'en');
?>
<br />
<div class="center">
	<?php
		for ($i = 1; $i <= $pages; ++$i) {
			if ($page == $i) {
				echo '<a href="',Page::getURL(),'/general/us_news.php?page=',$i,'" class="current_page">';
			} else {
				echo '<a href="',Page::getURL(),'/general/us_news.php?page=',$i,'" class="page">';
			}
			echo $i,'</a>';

			if ($i > 0 && ($i % 20) == 0) {
				echo '<br />';
			}
		}
	?>
</div>