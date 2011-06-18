<?php
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php' );
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/shared/illarion_data.php' );
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/inc_topmenu.php' );
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/inc_accountmenu.php' );
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/inc_account_notes.php' );

	if (!IllaUser::auth('gmtool_accounts'))
	{
		Messages::add('Zugriff verweigert', 'error');
		include_once( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$accid = ( is_numeric($_GET['id']) ? (int)$_GET['id'] : 0 );
	if (!$accid)
	{
		Messages::add('Account ID wurde nicht richtig übergeben', 'error');
		include_once( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$account_name = getAccountName( $accid );
	if (!$account_name || !strlen($account_name))
	{
		Messages::add('Account wurde nicht gefunden', 'error');
		include_once( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	list($notes,$warnings) = getNotes( $accid );

	create_header( 'Illarion - GM-Tool - Notizen und Warnungen - '.$account_name,
	'Auf dieser Seite könnten die Notizen und Warnungen von '.$account_name.' eingesehen werden',
	'GM-Tool, Account, Notizen, Warnungen, '.$account_name, '', 'menu,gmtool', '', true );
	include_header();
?>

<h1>Notizen und Warnungen - <?php echo $account_name; ?></h1>

<?php include_menu(); ?>

<div class="spacer"></div>

<?php include_account_menu( $accid, 4 ); ?>

<div class="spacer"></div>

<h2>Notizen</h2>

<?php if (count($notes)): ?>
<dl class="gmtool_notes">
	<?php foreach( $notes as $note ): ?>
	<dt>
		<?php echo date( 'd.m.Y H:i', $note['unixtime'] ),' - ',$note['name']; ?>
		<?php if ($note['type'] == 1): ?>
		-
		<form action="<?php echo $url; ?>/illarion/gmtool/de_account_notes.php?id=<?php echo $accid; ?>" method="post" style="display:inline;">
			<input type="hidden" name="action" value="account_notes" />
			<input type="hidden" name="method" value="remove" />
			<input type="hidden" name="id" value="<?php echo $note['id']; ?>" />
			<input type="submit" name="submit" value="Löschen" />
		</form>
		<?php endif; ?>
	</dt>
	<dd><?php echo $note['message']; ?></dd>
	<?php endforeach; ?>
</dl>
<?php endif; ?>

<form action="<?php echo $url; ?>/illarion/gmtool/de_account_notes.php?id=<?php echo $accid; ?>" method="post" id="note_form">
	<p><textarea name="entry" rows="5" cols="60"></textarea></p>
	<p>
		<input type="submit" value="Neue Notiz eintragen" name="submit" />
		<input type="hidden" name="action" value="account_notes" />
		<input type="hidden" name="method" value="add" />
		<input type="hidden" name="id" value="1" />
	</p>
</form>

<h2>Verwarnungen</h2>

<?php if (count($warnings)): ?>
<dl class="gmtool_notes">
	<?php foreach( $warnings as $warn ): ?>
	<dt>
		<?php echo date( 'd.m.Y H:i', $warn['unixtime'] ),' - ',$warn['name']; ?>
		-
		<form action="<?php echo $url; ?>/illarion/gmtool/de_account_notes.php?id=<?php echo $accid; ?>" method="post" style="display:inline;">
			<input type="hidden" name="action" value="account_notes" />
			<input type="hidden" name="method" value="remove" />
			<input type="hidden" name="id" value="<?php echo $note['id']; ?>" />
			<input type="submit" name="submit" value="Löschen" />
		</form>
	</dt>
	<dd><?php echo $warn['message']; ?></dd>
	<?php endforeach; ?>
</dl>
<?php endif; ?>

<form action="<?php echo $url; ?>/illarion/gmtool/de_account_notes.php?id=<?php echo $accid; ?>" method="post" id="warn_form">
	<p><textarea name="entry" rows="5" cols="60"></textarea></p>
	<p>
		<input type="submit" value="Neue Verwarnung eintragen" name="submit" />
		<input type="hidden" name="action" value="account_notes" />
		<input type="hidden" name="method" value="add" />
		<input type="hidden" name="id" value="2" />
	</p>
</form>

<?php include_footer(); ?>