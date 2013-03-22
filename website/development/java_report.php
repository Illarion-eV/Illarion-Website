<?php
/**
 * This page is used to fetch data from the error reporting system that is part of
 * the Illarion Java Software and forward the data properly to Mantis.
 */
include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';

print_r($_POST);
// client error report, fetching data
$os = (isset($_POST['os']) ? urldecode($_POST['os']) : 'not set');
$application = (isset($_POST['app']) ? urldecode($_POST['app']) : 'not set');
$version = (isset($_POST['version']) ? urldecode($_POST['version']) : 'not set');
$thread = (isset($_POST['thread']) ? urldecode($_POST['thread']) : 'not set');
$stack = (isset($_POST['stack']) ? urldecode($_POST['stack']) : 'not set');
$exception = (isset($_POST['exception']) ? ': '.urldecode($_POST['exception']) : '');

    
$db = Database::getPostgreSQL();
	
// fetch the correct project ID
$query = '';
$appname = '';
if (strcmp($application, 'Illarion Client') == 0) {
	$query = 'SELECT id'
	.PHP_EOL.' FROM mantis.mantis_project_table'
	.PHP_EOL.' WHERE name = "Illarion Client"'
	;
	$appname = 'Illarion Client';
} elseif (strcmp($application, 'Illarion Mapeditor') == 0) {
	$query = 'SELECT id'
	.PHP_EOL.' FROM mantis.mantis_project_table'
	.PHP_EOL.' WHERE name = "Illarion Mapeditor"'
	;
	$appname = 'Illarion Mapeditor';
} elseif (strcmp($application, 'Illarion easyNPC') == 0) {
	$query = 'SELECT id'
	.PHP_EOL.' FROM mantis.mantis_project_table'
	.PHP_EOL.' WHERE name = "Illarion easyNPC Editor"'
	;
	$appname = 'Illarion easyNPC Editor';
} else {
	echo 'selected wrong application. Cancel!';
	exit();
}

$db->setQuery($query);
$projectId = $db->loadResult();
echo 'Found project id: '.$projectId;
echo PHP_EOL;

$text = 'This is a bug report insert as result to a crash of the "'.$appname.'".'
.PHP_EOL.'The problem occured in the thread: '.$thread
.PHP_EOL
.PHP_EOL.'The following stack backtrace shows the crash in detail:'
.PHP_EOL
.PHP_EOL.$stack;

// get the ID of the reporting user
$query = 'SELECT id'
.PHP_EOL.' FROM mantis.mantis_user_table'
.PHP_EOL.' WHERE username = "Java Reporting System"'
;
$db->setQuery($query);
$reporterId = $db->loadResult();
echo 'Found reporter id: '.$reporterId;
echo PHP_EOL;

// Checking for dublicated
$query = 'SELECT COUNT(*)'
.PHP_EOL.'FROM mantis.mantis_bug_table'
.PHP_EOL.'INNER JOIN mantis.mantis_bug_text_table ON mantis.mantis_bug_table.bug_text_id = mantis.mantis_bug_text_table.id'
.PHP_EOL.'WHERE mantis.mantis_bug_table.status != 90'
.PHP_EOL.'AND mantis.mantis_bug_table.project_id = '.$db->Quote($projectId)
.PHP_EOL.'AND mantis.mantis_bug_table.reporter_id = '.$db->Quote($reporterId)
.PHP_EOL.'AND mantis.mantis_bug_text_table.description LIKE '.$db->Quote($text);
$db->setQuery($query);

if ($db->loadResult() > 0) {
	echo 'Dublicated entry.';
	exit();
}

if ($db->getErrorNum() != 0) {
	echo 'Error while checking for dublicate.';
	echo PHP_EOL;
	echo $db->stderr(true);
	echo PHP_EOL;
	exit();
}

echo 'No dublicate.';

// insert the bug report
$db->Begin();

$query = 'INSERT INTO mantis.mantis_bug_table (project_id, reporter_id, date_submitted, last_updated, severity, summary, os, version)'
.PHP_EOL.' VALUES ('.$db->Quote($projectId).', '.$db->Quote($reporterId).', UNIX_TIMESTAMP(NOW()), UNIX_TIMESTAMP(NOW()), 70, '.$db->Quote('Automated Crash Report'.$exception).', '.$db->Quote($os).', '.$db->Quote($version).')'
;
$db->setQuery($query);
$db->query();

if ($db->getErrorNum() != 0) {
	echo 'Error while insert bug into table';
	echo PHP_EOL;
	echo $db->stderr(true);
	echo PHP_EOL;
	$db->Rollback();
	exit();
}

$reportId = $db->insertid();

$query = 'INSERT INTO mantis.mantis_bug_text_table (description, steps_to_reproduce, additional_information)'
.PHP_EOL.' VALUES ('.$db->Quote($text).', "", "")'
;
$db->setQuery($query);
$db->query();

if ($db->getErrorNum() != 0) {
	echo 'Error while insert bug text into table';
	echo PHP_EOL;
	echo $db->stderr(true);
	echo PHP_EOL;
	$db->Rollback();
	exit();
}

$reportTextId = $db->insertid();

$query = 'UPDATE mantis.mantis_bug_table'
.PHP_EOL.' SET bug_text_id = '.$db->Quote($reportTextId)
.PHP_EOL.' WHERE id = '.$db->Quote($reportId)
;
$db->setQuery($query);
$db->query();

if ($db->getErrorNum() != 0) {
	echo 'Error while updating text reference in bug table';
	echo PHP_EOL;
	echo $db->stderr(true);
	echo PHP_EOL;
	$db->Rollback();
	exit();
}

$db->Commit();
echo 'Done';
// all done. Get the beer
?>
