<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';
	includeWrapper::includeOnce( Page::getRootPath().'/statistics/inc_quests.php' );

	$id = ( is_numeric( $_GET['id'] ) ? (int)$_GET['id'] : ( is_numeric( $_POST['id'] ) ? (int)$_POST['id'] : false ) );

	Page::setXHTML();
	Page::Init();

	Page::setKeywords( array( 'Online', 'Spieler', 'Quests' ) );

	if (!$id)
	{
		Page::setTitle( array( 'Quest Details', 'Nicht gefunden' ) );
		Page::setDescription( 'Diese Seite zeigt die Details eines Quests an. Das gesuchte Quest konnte nicht gefunden werden, oder ein Fehler ist aufgetreten.' );
		Page::addKeyword( 'Fehler' );
		Page::addKeyword( 'nicht gefunden' );
?>
<h1>Quest Details</h1>

<h2>Gesuchtes Quest nicht gefunden</h2>

<p>Das gesuchte Quest konnte nicht gefunden werden. Entweder sind sie einem ungültigen
Link gefolgt, oder das Quest wurde bereits gelöscht, oder sie haben nicht die
Zugriffsberechtigung auf dieses Quest.</p>

<p class="center">
	<a href="<?php echo Page::getURL(); ?>/statistics/de_players.php">Zurück zur Onlineliste</a>
</p>

<?php Page::insert_go_to_top_link(); ?>
<?php
    exit();
	}

	$quest = loadQuest( $id );

	if ( !$quest )
	{
		Page::redirect( Page::getURL().'/statistics/de_quests.php' );
	}

	$title = ( is_null($quest['q_title_de']) ? $quest['q_title_us'] : $quest['q_title_de'] );

	Page::setTitle( array( 'Quest Details', $title ) );
	Page::setDescription( 'Auf dieser Seite findest du Informationen zum Quest "'.$title.'", wie Startzeit, Art und Author des Quests.' );
	Page::addKeyword( $title );

	Page::addCSS( 'quest_details' );
?>
<h1>Quest-Details</h1>

<h2><?php echo $title; ?></h2>
<?php echo prepareQuestTexts( $quest['q_content_de'], $quest['q_content_us'] ); ?>

<dl class="details">
	<?php if ($quest['q_status'] != 2): ?>
	<dt>Start Zeit des Quests:</dt>
	<dd>
		<?php if (is_null($quest['q_starttime'])): ?>
		Wird noch angekündigt
		<?php else: ?>
		<?php echo IllaDateTime::IllaTimestampToTime('d. F Y - H:i:s', IllaDateTime::RLTimeToIllaTime( $quest['q_starttime'] ) ); ?>
		(<?php echo strftime( '%d. %B %Y - %H:%M:%S', IllaDateTime::TimestampWithOffset( $quest['q_starttime'] ) ) ?> Uhr)
		<?php endif; ?>
	</dd>
	<?php endif; ?>
	<dt>Status des Quests:</dt>
	<dd>
		<?php
			if($quest['q_type'] == 2)
			{
				echo 'Quest erfordert Aktivierung';
			}
			else
         {
             switch($quest['q_status'])
             {
                 case 0: echo 'Quest in Planung'; break;
                 case 1: echo 'Quest startet in Kürze'; break;
                 case 2: echo 'Quest läuft zur Zeit'; break;
                 case 3: echo 'Quest is beendet'; break;
             }
         }
		?>
	</dd>
	<dt>Art des Quests:</dt>
	<dd><?php echo ( $quest['q_type']==1 ? 'Offizieller Quest' : 'Spieler-Quest'); ?></dd>
	<dt>Quest geplant von:</dt>
	<dd><?php echo ( strlen($quest['acc_name']) < 1 ? $quest['acc_login'] : $quest['acc_name'] ); ?></dd>
</dl>

<form method="post" action="<?php echo Page::getURL(); ?>/statistics/de_players.php" id="action_Form">
	<p>
		<button onclick="document.forms.action_Form.action='<?php echo Page::getURL(); ?>/statistics/de_players.php';document.forms.action_Form.elements.action.value='';return true;">Zur Online-Spieler Seite</button>
		<?php if($quest['q_type'] == 2 && IllaUser::auth('quests')): ?>
		<button onclick="document.forms.action_Form.action='<?php echo Page::getURL(); ?>/statistics/de_quests.php';document.forms.action_Form.elements.action.value='quest_activate';return true;">Quest aktivieren</button>
		<?php endif; ?>
		<?php if(IllaUser::auth('quests') || $quest['acc_id'] == IllaUser::$ID): ?>
		<button onclick="document.forms.action_Form.action='<?php echo Page::getURL(); ?>/statistics/de_players.php';document.forms.action_Form.elements.action.value='quest_delete';return true;">Quest löschen</button>
		<button onclick="document.forms.action_Form.action='<?php echo Page::getURL(); ?>/statistics/de_quests_edit.php';document.forms.action_Form.elements.action.value='';return true;">Quest bearbeiten</button>
		<?php endif; ?>
		<input type="hidden" name="action" value="" />
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
	</p>
</form>

<?php Page::insert_go_to_top_link(); ?>
