<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( 'Aktuelle Neuigkeiten' );
	Page::setDescription( 'Diese Seite enthält eine Liste aller Neuigkeiten die veröffnetlicht wurden.' );
	Page::setKeywords( array( 'Aktuelles', 'Neuigkeiten', 'News' ) );
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
	<a href="<?php echo Page::getURL(); ?>/general/de_rss.php" style="float:right;">
		<img src="<?php echo Page::getCurrentImageURL(); ?>/rss.png" height="32" width="32" alt="RSS-Feed" />
	</a>
	Aktuelle Neuigkeiten
</h1>
<p class="hyphenate">
    Möchtest du stets auf dem Laufenden gehalten werden und die aktuellen Neuigkeiten mit deinem E-Mail-Client oder
    Browser empfangen? <a href="<?php echo Page::getURL(); ?>/general/de_rss.php">Abbonniere unseren RSS-Feed!</a>
</p>

<?php if (IllaUser::auth('news')): ?>
<a href="<?php echo Page::getCurrentURL(); ?>/general/de_edit_news.php">Neuen Newseintrag erstellen</a>
<?php endif; ?>

<?php
    $newsRenderer = new \News\Renderer\HTMLRenderer(IllaUser::auth('news'));
    echo $newsRenderer->renderList($newsDb->getNewsList(NEWS_PER_PAGE, $offset), 'de');
?>
<br />
<p class="center">
	<?php
		for ($i = 1; $i <= $pages; ++$i) {
			if ($page == $i) {
				echo '<a href="',Page::getCurrentURL(),'/general/de_news.php?page=',$i,'" class="current_page">';
			} else {
				echo '<a href="',Page::getCurrentURL(),'/general/de_news.php?page=',$i,'" class="page">';
			}
			echo $i,'</a>';

			if ($i > 0 && ($i % 20) == 0) {
				echo '<br />';
			}
		}
	?>
</p>