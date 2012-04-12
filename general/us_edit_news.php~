<?php
	include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
	include_once( "inc_news.php" );

	if (!IllaUser::auth('news'))
	{
		Messages::add( 'Access denieded', 'error');
		include_once( "us_news.php" );
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

	if ($_POST['action'] == 'Send')
	{
		News::save( $new_news );
		include_once( "de_news.php" );
		exit();
	}

	create_header( "Illarion - Post a news",
	"Here you can post a news to the Illarion start website.",
	"News, news, actual" );
	include_header();
?>

<h1><?php echo ($new_news['id'] ? 'Edit a' : 'Create a'); ?> News entry</h1>

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

<form action="us_edit_news.php" method="post">
	<table style="width:100%;">
		<tr>
			<th style="width:50%;">Headline (german)</th>
			<td style="width:15px;" />
			<th style="width:50%;">Headline (english)</th>
		</tr>
		<tr>
			<td style="width:50%;"><input type="text" name="title_de" value="<?php echo $new_news['title_de']; ?>" style="width:100%" /></td>
			<td style="width:15px;" />
			<td style="width:50%;"><input type="text" name="title_us" value="<?php echo $new_news['title_us']; ?>" style="width:100%" /></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<th style="width:50%;">Content (german)</th>
			<td style="width:15px;" />
			<th style="width:50%;">Content (english)</th>
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
				<label for="use_capital">Use graphical cap at the beginning</label>
			</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td colspan="3" style="text-align:center;">
				<input type="submit" name="action" value="Preview" />
				&nbsp;&nbsp;&nbsp;
				<input type="submit" name="action" value="Send" />
				<input type="reset" value="Reset" />
				<?php if ($new_news['id']) { ?><input type="hidden" name="targetid" value="<?php echo $new_news['id']; ?>" /><?php } ?>
			</td>
		</tr>
	</table>
</form>

<h2>How to fill the form</h2>

<p>When you write some text, it will automatically be implemented within a
<strong>&lt;p&gt;</strong> and <strong>&lt;/p&gt;</strong> sign. Should your entry contain more
sections, you should strive to make it appear thus: &quot;section 1&lt;/p&gt;&lt;p&gt;section
2&quot;</p>

<p>Linking has finally been implemented: <strong>&lt;a
href=&#39;...&#39;&gt;Link&lt;/a&gt;</strong> Do bear in mind however to link accordingly with
regard to lingual content.</p>

<p>Lists can be made thus: <strong>&lt;ul&gt;&lt;li &gt;list item 1&lt;/li&gt;&lt;li &gt;list
item 2&lt;/li&gt;&lt;/ul&gt;</strong></p>

<p>The simplest thing to do is just to preview your posts before submitting
them.</p>

<?php insert_go_to_top_link(); ?>

<?php include_footer(); ?>