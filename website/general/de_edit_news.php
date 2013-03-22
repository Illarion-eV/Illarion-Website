<?php
	include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );

	if (!IllaUser::auth('news'))
	{
		Messages::add( 'Zugriff nicht gestattet', 'error');
		include_once( "de_news.php" );
		exit();
	}

	$new_news = array();
	$new_news['id'] = ( isset($_POST['targetid']) ? $_POST['targetid'] : false );
	if (!$new_news['id'])
	{
		$new_news['id'] = ( isset($_GET['targetid']) ? $_GET['targetid'] : false );
	}
	$new_news['title_de'] = '';
	$new_news['title_us'] = '';
	$new_news['content_de'] = '';
	$new_news['content_us'] = '';
	$new_news['use_capital'] = 0;
	$new_news['name'] = IllaUser::$name;
	$new_news['author'] = IllaUser::$ID;
	$new_news['published_at'] = time();

	if (isset($_POST['action']))
	{
		$new_news['title_de'] = stripslashes($_POST['title_de']);
		$new_news['title_us'] = stripslashes($_POST['title_us']);
		$new_news['content_de'] = stripslashes($_POST['content_de']);
		$new_news['content_us'] = stripslashes($_POST['content_us']);
		$new_news['use_capital'] = ( $_POST['use_capital'] == 'yes' ? 1 : 0 );
	}
	elseif ( $new_news['id'] )
	{
		$new_news = News::load_id_from_db( $new_news['id'] );
	}

	if ($_POST['action'] == 'Absenden')
	{
		News::save( $new_news );
		include_once( "de_news.php" );
		exit();
	}

	create_header( "Illarion - News posten",
	"Hier kann eine neue News auf die Titelseite von Illarion gepostet werden.",
	"News, Aktuelles, Neuigkeiten" );
	include_header();
?>

<h1>Einen News Eintrag <?php echo ($new_news['id'] ? 'ändern' : 'erstellen'); ?></h1>

<?php
	if ($new_news['title_de'] != '')
	{
		News::show( $new_news, $type = 'html', $lang='de' );
		if ($new_news['title_us'] != '')
		{
			echo "<br />";
		}
	}
	if ($new_news['title_us'] != '')
	{
		News::show( $new_news, $type = 'html', $lang='us' );
	}
?>

<form action="de_edit_news.php" method="post">
	<table style="width:100%;">
		<tr>
			<th style="width:50%;">Überschrift (deutsch)</th>
			<td style="width:15px;" />
			<th style="width:50%;">Überschrift (englisch)</th>
		</tr>
		<tr>
			<td style="width:50%;"><input type="text" name="title_de" value="<?php echo $new_news['title_de']; ?>" style="width:100%" /></td>
			<td style="width:15px;" />
			<td style="width:50%;"><input type="text" name="title_us" value="<?php echo $new_news['title_us']; ?>" style="width:100%" /></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<th style="width:50%;">Text (deutsch)</th>
			<td style="width:15px;" />
			<th style="width:50%;">Text (englisch)</th>
		</tr>
		<tr>
			<td style="width:50%;"><textarea rows="15" name="content_de" value="" style="width:100%" wrap="virtual"><?php echo $new_news['content_de']; ?></textarea></td>
			<td style="width:15px;" />
			<td style="width:50%;"><textarea rows="15" name="content_us" value="" style="width:100%" wrap="virtual"><?php echo $new_news['content_us']; ?></textarea></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td colspan="3">
				<input type="checkbox" name="use_capital" id="use_capital" value="yes" <?php echo ( $new_news['use_capital'] == 1 ? 'checked="checked" ' : '' ); ?>/>
				<label for="use_capital">Grafischen Großbuchstaben am Anfang benutzen</label>
			</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td colspan="3" style="text-align:center;">
				<input type="submit" name="action" value="Vorschau" />
				&nbsp;&nbsp;&nbsp;
				<input type="submit" name="action" value="Absenden" />
				<input type="reset" value="Zurücksetzen" />
				<?php if ($new_news['id']) { ?><input type="hidden" name="targetid" value="<?php echo $new_news['id']; ?>" /><?php } ?>
			</td>
		</tr>
	</table>
</form>

<h2>Ausfüllanleitung</h2>

<p>Wenn Du einen Text schreibst, wird der gesamte Text automatisch von einem
<b>&lt;p&gt;</b> und <b>&lt;/p&gt;</b> eingeschlossen. Möchtest Du mehrere
Abschnitte formulieren, sollte Deine Eingabe insgesamt wie folgt aussehen:
"absatz1&lt;/p&gt;&lt;p&gt;absatz2"</p>

<p>Links werden ähnlich gesetzt: <strong>&lt;a href='...'&gt;Link&lt;/a&gt;</strong>
aber denke daran beim deutschen Text auf deutsche (Unter-)Seiten und beim englischen Text auf
englische (Unter-)Seiten zu verlinken.</p>

<p>Aufzählungen können wie folgt gemacht werden: <b>&lt;ul&gt;&lt;li&gt;Aufz&auml;hlungspunkt
1&lt;/li&gt;&lt;li&gt;Aufzählungspunkt 2&lt;/li&gt;&lt;/ul&gt;</b></p>

<p>Am einfachsten ist es, sich vom Resultat mittels Vorschau zu überzeugen und erst dann die
News abzusenden.</p>

<?php insert_go_to_top_link(); ?>

<?php include_footer(); ?>