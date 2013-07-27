<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';
	includeWrapper::includeOnce( Page::getRootPath().'/statistics/inc_quests_edit.php' );

	IllaUser::requireLogin();

	Page::setTitle( 'Questplaner' );
	Page::setDescription( 'This page allows you to create, edit and delete quests.' );
	Page::setKeywords( array( 'Online', 'player', 'Quests' ) );

	Page::addJavaScript( 'quests_edit' );

	Page::setXHTML();
	Page::Init();

	$id = ( isset( $_POST['id'] ) && is_numeric( $_POST['id'] ) ? (int)$_POST['id'] : ( isset( $_GET['id'] ) && is_numeric( $_GET['id'] ) ? (int)$_GET['id'] : false ) );

	list( $title_de, $title_us, $content_de, $content_us, $type, $status, $tba, $hour, $minute, $day, $month, $year ) = loadQuestEditData( $id );

	$days_in_month = (int)date('t', mktime( 1, 1, 1, $month, 0, $year));
	$current_year  = (int)date('Y');
?>

<h1><?php if ($id): ?>Edit quest<?php else: ?>Create quest<?php endif; ?></h1>

<form action="<?php echo Page::getURL(); ?>/statistics/de_quests_edit.php" method="post" id="quest_form">
	<h2>Name of the quest</h2>
	<p>
		<b>German Name:</b><br />
		<input style="width:100%" type="text" name="title_de" value="<?php echo $title_de; ?>" />
	</p>
	<p>
		<b>English Name:</b><br />
		<input style="width:100%" type="text" name="title_us" value="<?php echo $title_us; ?>" />
	</p>
	<h2>Quest description</h2>
	<p>
		<b>German Description:</b>
		<textarea cols="60" rows="5" style="width:100%;" name="content_de"><?php echo $content_de; ?></textarea>
	</p>
	<p>
		<b>English Description:</b>
		<textarea cols="60" rows="5" style="width:100%;" name="content_us"><?php echo $content_us; ?></textarea>
	</p>
	<h2>Additional information about the quest</h2>
	<p>
		<b>Starttime:</b>
		<select name="time_d" id="time_d"<?php echo ( $tba ? ' disabled="disabled" class="disabled"' : '' ); ?>>
			<?php for($i=1;$i<=$days_in_month;++$i): ?>
			<option value="<?php echo $i; ?>"<?php echo ($i == $day ? ' selected="selected"' : ''); ?>><?php echo $i; ?>.</option>
			<?php endfor; ?>
		</select>

		<select name="time_m" id="time_m"<?php echo ( $tba ? ' disabled="disabled" class="disabled"' : '' ); ?> onchange="checkDays()">
			<?php for($i=1;$i<=12;++$i): ?>
			<option value="<?php echo $i; ?>"<?php echo ($i == $month ? ' selected="selected"' : ''); ?>><?php echo nl_langinfo( constant( 'MON_'.$i ) ); ?></option>
			<?php endfor; ?>
		</select>

		<select name="time_y" id="time_y"<?php echo ( $tba ? ' disabled="disabled" class="disabled"' : '' ); ?> onchange="checkDays()">
			<?php for($i=min($current_year,$year);$i<=$current_year+2;++$i): ?>
			<option value="<?php echo $i; ?>"<?php echo ($i == $year ? ' selected="selected"' : ''); ?>><?php echo $i; ?></option>
			<?php endfor; ?>
		</select>

		um

		<select name="time_h" id="time_h"<?php echo ( $tba ? ' disabled="disabled" class="disabled"' : '' ); ?>>
			<?php for($i=0;$i<=23;++$i): ?>
			<option value="<?php echo $i; ?>"<?php echo ($i == $hour ? ' selected="selected"' : ''); ?>><?php echo $i; ?></option>
			<?php endfor; ?>
		</select>
		:
		<select name="time_i" id="time_i"<?php echo ( $tba ? ' disabled="disabled" class="disabled"' : '' ); ?>>
			<?php for($i=0;$i<=59;++$i): ?>
			<option value="<?php echo $i; ?>"<?php echo ($i == $minute ? ' selected="selected"' : ''); ?>><?php echo $i; ?></option>
			<?php endfor; ?>
		</select>

		<br />

		<input type="checkbox" name="tba" id="tba" value="tba" onclick="disableDatepicker()"<?php echo ( $tba ? ' checked="checked"' : '' ); ?> />
		<label for="tba">Starttime is to be announced</label>
	</p>
	<p>
		<b>Quest type:</b><br />
		<?php if (IllaUser::auth('quests')): ?>
		<select name='type' id="type">
			<option value='0'<?php echo ( $type==0 ? ' selected="selected"' : '' ); ?>>Player-Quest</option>
			<option value='1'<?php echo ( $type==1 ? ' selected="selected"' : '' ); ?>>Official Quest</option>
		</select>
		<?php else: ?>
		<span>Spieler-Quest</span>
		<input type="hidden" name="type" value="2" />
		<?php endif; ?>
	</p>
	<p>
		<b>Quest status:</b><br />
		<?php if ( ( $id && $type < 2 ) || IllaUser::auth('quests')): ?>
		<select name='status' id="status">
			<option value='0'<?php echo ( $status==0 ? ' selected="selected"' : '' ); ?>>Quest is planned</option>
			<option value='1'<?php echo ( $status==1 ? ' selected="selected"' : '' ); ?>>Quest starts soon</option>
			<option value='2'<?php echo ( $status==2 ? ' selected="selected"' : '' ); ?>>Quest takes place now</option>
			<option value='3'<?php echo ( $status==3 ? ' selected="selected"' : '' ); ?>>Quest is finished</option>
		</select>
		<?php else: ?>
		<span>Quest is planned</span>
		<input type="hidden" name="status" value="0" />
		<?php endif; ?>
	</p>
	<p class="center">
		<input type="submit" name="submit" value="Save" />
		<?php if ($id): ?>
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<?php endif; ?>
		<input type="hidden" name="action" value="quest_save" />
	</p>
</form>

<?php Page::insert_go_to_top_link(); ?>