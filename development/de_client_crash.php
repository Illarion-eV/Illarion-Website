<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';
	
	Page::setTitle( 'Client Abstürze' );
	Page::setDescription( 'Diese Seite zeigt an mit welchen Fehlern der Client abgestürzt ist.' );
	Page::setKeywords( array( 'Client', 'Crashes' ) );
	Page::setXHTML();
	Page::Init();
	
	$id = ( isset( $_GET['id'] ) && is_numeric( $_GET['id'] ) ? (int)$_GET['id'] : -1 );
?>

<?php if ($id == -1): ?>

<?php
	$db = Database::getPostgreSQL();
	$db->setQuery('SELECT id, date, os, version, thread FROM client_crash');
	$results = $db->loadAssocList();
?>
<h1>Client Abstürze - Übersicht</h1>

<table>
	<tr>
		<th>Datum</th>
		<th>Betriebssystem</th>
		<th>Client Version</th>
		<th>Thread</th>
		<th></th>
	</tr>
	<?php if (count($results) == 0): ?>
	<td colspan="5">Keine Einträge</td>
	<?php else: ?>
	<?php foreach ($results as $value): ?>
	<tr>
		<td><?php echo $value['date']; ?></td>
		<td><?php echo $value['os']; ?></td>
		<td><?php echo $value['version']; ?></td>
		<td><?php echo $value['thread']; ?></td>
		<td>
			<a href="<?php echo Page::getURL(); ?>/development/de_client_crash.php?id=<?php echo $value['id']; ?>">
				Anzeigen
			</a>
		</td>
	</tr>
	<?php endforeach; ?>
	<?php endif; ?>
</table>
<?php else: ?>

<?php
	$db = Database::getPostgreSQL();
	$db->setQuery('SELECT id, date, os, version, thread, stack FROM client_crash WHERE id = '.$db->Quote($id));
	$result = $db->loadAssocRow();
?>

<h1>Client Absturz #<?php echo $result['id']; ?></h1>

<dl>
	<dt>Absturz ID</dt>
	<dd><?php echo $result['id']; ?></dd>
	<dt>Datum</dt>
	<dd><?php echo $result['date']; ?></dd>
	<dt>Betriebssystem</dt>
	<dd><?php echo $result['os']; ?></dd>
	<dt>Client Version</dt>
	<dd><?php echo $result['version']; ?></dd>
	<dt>Problematischer Thread</dt>
	<dd><?php echo $result['thread']; ?></dd>
	<dt>Stack Backtrace</dt>
	<dd><?php echo str_replace(array("\n\r", "\r\n", "\r", "\n"), "<br />", $result['stack']); ?></dd>
</dl>
<?php endif; ?>
