<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';
	includeWrapper::includeOnce( Page::getRootPath().'/statistics/inc_quests.php' );

	$id = ( is_numeric( $_GET['id'] ) ? (int)$_GET['id'] : ( is_numeric( $_POST['id'] ) ? (int)$_POST['id'] : false ) );

	Page::setKeywords( array( 'Online', 'players', 'Quests' ) );

	Page::setXHTML();
	Page::Init();

	if (!$id)
	{
		Page::setTitle( array( 'Quest Details', 'No found' ) );
		Page::setDescription( 'This site shows the details of a quest. The quest was not found or a error occured while searching for it.' );
		Page::addKeyword( 'error' );
		Page::addKeyword( 'not found' );
?>
<h1>Quest Details</h1>

<h2>Searched quest not found</h2>

<p>The searched quest was not found. Eighter you followed a invalid link, or the quest
was already deleted or you lack of the access rights to view the quest.</p>

<p class="center">
	<a href="<?php echo Page::getURL(); ?>/statistics/us_players.php">Back to onlineplayer list</a>
</p>

<?php Page::insert_go_to_top_link(); ?>
<?php
    exit();
	}

	$quest = loadQuest( $id );

	if ( !$quest )
	{
			Page::redirect( Page::getURL().'/statistics/us_quests.php' );
	}

	$title = ( is_null($quest['q_title_us']) ? $quest['q_title_de'] : $quest['q_title_us'] );

	Page::setTitle( array( 'Quest Details', $title ) );
	Page::setDescription( 'On this page you find informations about the quest "'.$title.'", such as start time, kind and creator of the quest.' );
	Page::addKeyword( $title );

	Page::addCSS( 'quest_details' );
?>
<h2><?php echo $title; ?></h2>
<div class="description"><?php echo prepareQuestTexts( $quest['q_content_de'], $quest['q_content_us'] ); ?></div>

<dl class="details">
	<?php if ($quest['q_status'] != 2): ?>
	<dt>Start time of the quest:</dt>
		<dd>
		<?php if (is_null($quest['q_starttime'])): ?>
		To be announced
		<?php else: ?>
		<?php echo IllaDateTime::IllaTimestampToTime('dS F Y - h:i a', IllaDateTime::RLTimeToIllaTime( $quest['q_starttime'] ) ); ?>
		(<?php echo strftime( '%d. %B %Y %I:%M %P', IllaDateTime::TimestampWithOffset( $quest['q_starttime'] ) ) ?>)
		<?php endif; ?>
	</dd>
	<?php endif; ?>
	<dt>Status of the quest:</dt>
	<dd>
		<?php
			if($quest['q_type'] == 2)
			{
				echo 'Quest requires activation';
			}
			else
			{
				switch($quest['q_status'])
				{
					case 0:	echo 'Quest is planned'; break;
					case 1:	echo 'Quest starts soon'; break;
					case 2:	echo 'Quest takes place now'; break;
					case 3:	echo 'Quest ended'; break;
				}
			}
		?>
	</dd>
	<dt>Kind of the quest:</dt>
	<dd><?php echo ( $quest['q_type']==1 ? 'Official quest' : 'Player quest'); ?></dd>
	<dt>Quest is planned by:</dt>
	<dd><?php echo ( strlen($quest['acc_name']) < 1 ? $quest['acc_login'] : $quest['acc_name'] ); ?></dd>
</dl>

<form method="post" action="<?php echo Page::getURL(); ?>/statistics/us_players.php" id="action_Form">
	<p>
		<button onclick="document.forms.action_Form.action='<?php echo Page::getURL(); ?>/statistics/us_players.php';document.forms.action_Form.elements.action.value='';return true;">Back to online players</button>
		<?php if($quest['q_type'] == 2 && IllaUser::auth('quests')): ?>
		<button onclick="document.forms.action_Form.action='<?php echo Page::getURL(); ?>/statistics/us_quests.php';document.forms.action_Form.elements.action.value='quest_activate';return true;">Activate Quest</button>
		<?php endif; ?>
		<?php if(IllaUser::auth('quests') || $quest['acc_id'] == IllaUser::$ID): ?>
		<button onclick="document.forms.action_Form.action='<?php echo Page::getURL(); ?>/statistics/us_players.php';document.forms.action_Form.elements.action.value='quest_delete';return true;">Delete Quest</button>
		<button onclick="document.forms.action_Form.action='<?php echo Page::getURL(); ?>/statistics/us_quests_edit.php';document.forms.action_Form.elements.action.value='';return true;">Edit Quest</button>
		<?php endif; ?>
		<input type="hidden" name="action" value="" />
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
	</p>
</form>

<?php Page::insert_go_to_top_link(); ?>
