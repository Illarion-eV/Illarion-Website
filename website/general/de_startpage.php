<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( 'Das kostenlose Online-Rollenspiel' );
	Page::setDescription( 'Illarion ist ein kostenloses Online-Rollenspiel in einer mittelalterlichen Fantasy Umgebung mit dem Schwerpunkt auf echtes Rollenspiel.' );
	Page::setKeywords( array( 'Startseite', 'Neuigkeiten' ) );
	Page::addCSS( array( 'lightwindow', 'lightwindow_de', 'onlineplayer' ) );
	Page::addJavaScript( array( 'prototype', 'effects', 'lightwindow' ) );
	Page::setXHTML();
	Page::Init();
	
	$xmlC = new XmlC( 'UTF-8' );
	$xml_file = file_get_contents( Page::getRootPath().'/illarion/screenshots_start.xml' );
	$xmlC->Set_XML_data( $xml_file );
?>

<h1>Die Welt Illarion</h1>

<?php Page::cap('D'); ?>
<p class="hyphenate">
as Land ist in Aufruhr. Der Edelsteinkrieg zerrüttete die Reiche,
Flüchtlinge aller Völker strömen in die Bastionen der Menschheit im Land
Illarion, die verschont geblieben sind von den Entbehrungen der vergangenen
Tage. Sechs Edelsteine der Macht waren den Fürsten dieser Bastionen zur
Verwahrung gegeben; doch Missgunst, Verrat und Neid sind die alltäglichen
Geißeln der Macht. Das edle <a href="/illarion/de_factions.php#1">Cadomyr</a>, 
das reiche <a href="/illarion/de_factions.php#2">Galmair</a> oder das weise 
<a href="/illarion/de_factions.php#3">Runewick</a> - welchen Weg wirst du einschlagen?</p>

    			<div class="head_button">
    			    <div class="create_account">
        			    <a href="{HTTP_URL}/community/account/{LANGUAGE}_register.php"></a>
        			</div>
        			<div class="start_game">
    			        <a href="{HTTP_URL}/illarion/{LANGUAGE}_java_download.php"></a>
    			    </div>
    			</div>
				
<p class="hyphenate">
Illarion ist ein kostenloses Open Source-MMORPG, welches seinen Schwerpunkt
auf echtes Rollenspiel legt. Alle Charaktere um dich herum werden sich wie
lebendige, atmende Wesen dieser eigenständigen, geheimnisvollen Welt
verhalten. Jeder Charakter hat eine eigene Vergangenheit, Ziele, Stärken und
Schwächen. Erlebe als edler Ritter ruhmvolle Abenteuer oder führe ein Leben
als fleißiger Handwerker, geschäftiger Händler oder charismatischer Priester
der <a href="/illarion/goetter/de_bck_10.php">Götter</a>.
Deine Entscheidungen und Taten formen und gestalten diese Welt und werden 
eines Tages die Seiten der Geschichtsbücher füllen.</p>

<p>Illarion - Welche Rolle wirst du spielen?</p>

<?php Page::insert_go_to_top_link(); ?>

<h1>Screenshots</h1>

<?php foreach( $xmlC->obj_data->screenshots[0]->group as $currGroup ): ?>
<div><a id="group<?php echo $currGroup->index; ?>"></a></div>
<h2><?php echo $currGroup->gName; ?></h2>
<?php foreach( $currGroup->screenshot as $index=>$currScreen ): ?>
<div style="margin:3px;float:left;width:206px;height:116px;text-align:center;vertical-align:center;">
	<a style="margin:auto;" href="<?php echo Page::getMediaURL(); ?>/screenshots/<?php echo $currScreen->filename; ?>" title="<?php echo $currScreen->gName; ?>" rel="Illarion Screenshots--<?php echo $currGroup->gName; ?>" class="lightwindow" onclick="return false;">
		<img src="<?php echo Page::getMediaURL(); ?>/screenshots/preview/<?php echo $currScreen->filename; ?>" width="206" height="116" alt="Auf das Bild klicken um es in voller Größe zu sehen" />
	</a>
</div>
<?php endforeach; ?>
<?php endforeach; ?>

<div class="clr"></div>

<?php Page::insert_go_to_top_link(); ?>

<?php
	$pgSQL =& Database::getPostgreSQL();
	
	if(IllaUser::auth('quests'))
    {
        $query = 'SELECT q_title_de, q_title_us, q_status, q_id, q_type, q_starttime'
        .PHP_EOL.' FROM homepage.quests'
        .PHP_EOL.' WHERE q_status != 3'
        .PHP_EOL.' ORDER BY q_starttime ASC, q_status DESC, q_type DESC, COALESCE( q_title_de , q_title_us ) ASC'
        ;
    }
    else
    {
        $query = 'SELECT q_title_de, q_title_us, q_status, q_id, q_type, q_starttime'
        .PHP_EOL.' FROM homepage.quests'
        .PHP_EOL.' WHERE q_status != 3 AND ( q_type != 2 OR q_user_id = '.$pgSQL->Quote( IllaUser::$ID ).' )'
        .PHP_EOL.' ORDER BY q_starttime ASC, q_status DESC, q_type DESC, COALESCE( q_title_de , q_title_us ) ASC'
        ;
    }
	
    $pgSQL->setQuery( $query );
    $quests = $pgSQL->loadAssocList();
	if ( count($quests) > 0):
?>

<h1>Quests und Events</h1>

<h2>Angekündigte Ereignisse</h2>

<table class="quests">
	<?php foreach($quests as $key=>$quest): ?>
	<?php
		if ($quest['q_type'] == 2)
		{
			$quest['q_status'] = 3;
		}
		if (!is_null( $quest['q_starttime'] ))
		{
		    $quest['q_starttime'] = strtotime( $quest['q_starttime'] );
		}
	?>
	<tr>
		<td class="title">
			<a style="font-weight:bold;" href="<?php echo Page::getURL(); ?>/statistics/de_quests.php?id=<?php echo $quest['q_id']; ?>">
				<?php echo ( is_null($quest['q_title_de']) ? $quest['q_title_us'] : $quest['q_title_de'] ); ?>
			</a>
		</td>
		<td class="type"><?php echo ( $quest['q_type'] == 1 ? 'Offizielle Quest' : 'Spieler-Quest'); ?></td>
		<td class="status<?php echo $quest['q_status']; ?>">
			<?php
				switch($quest['q_status'])
				{
					case 0:	echo 'Quest in Planung'; break;
					case 1:	echo 'Quest startet in Kürze'; break;
					case 2:	echo 'Quest läuft zur Zeit'; break;
					case 3:	echo 'Nicht aktiviert'; break;
				}
				if (!is_null( $quest['q_starttime'] ))
				{
					echo '<br />', strftime( '%d. %B %Y - %H:%M', IllaDateTime::TimestampWithOffset( $quest['q_starttime'] ) );
				}
			?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<?php endif; ?>

<?php if (IllaUser::auth('quests')): ?>
<p><button onclick="window.location.href='<?php echo Page::getURL(); ?>/statistics/de_quests_edit.php'">Neue Quest eintragen</button></p>
<?php elseif(IllaUser::loggedIn()): ?>
<p><button onclick="window.location.href='<?php echo Page::getURL(); ?>/statistics/de_quests_edit.php'">Neue Spieler-Quest eintragen</button></p>
<?php endif; ?>

<?php if ( count($quests) > 0): ?>
<?php Page::insert_go_to_top_link(); ?>
<?php endif; ?>

<h1>Aktuelle News</h1>

<?php
    $newsRenderer = new \News\Renderer\HTMLRenderer(IllaUser::auth('news'));
    $newsDb = new \News\NewsDatabase(IllaUser::auth('news'));
    echo $newsRenderer->renderList($newsDb->getNewsList(3), 'de')
?>
