<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php";

	Page::setTitle( 'Reload the Devserver Maps' );
	Page::setDescription( 'This page is used to trigger a reload of the devserver maps.' );
	Page::setKeywords( array( 'Maps', 'Devserver', 'Reload' ) );

	Page::setXHTML();
	Page::Init();
?>

<?php if (file_exists('/home/vilarion/ts_restart.lock')): ?>
<h1>Reload the Devserver Map</h1>

<p>The controls were locked by <b>vilarion</b>.</p>
<?php exit; endif; ?> 

<?php if (file_exists('/home/martin/ts_restart.lock')): ?>
<h1>Reload the Devserver Map</h1>

<p>The controls were locked by <b>martin</b>.</p>
<?php exit; endif; ?> 

<?php if (file_exists('/home/nitram/ts_restart.lock')): ?>
<h1>Reload the Devserver Map</h1>

<p>The controls were locked by <b>nitram</b>.</p>
<?php exit; endif; ?> 

<h1>Reload the Devserver Map</h1>

<h2>Informations</h2>

<p>This site is used to make the devserver reloading the map data. Before launching the script ensure that the
maps in the SVN repo are exactly in the way they are supposed to be on the server.</p>

<h2>Reload the Server</h2>

<?php if (is_null($_POST['start'])): ?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="submit" name="start" value="Start reloading" />
</form>

<?php else: ?>

<p>The reload of the server should be done now. Now following is the output of the console:</p>

<p>Removing the old map data:</p>

<pre style="max-height: 130pt;overflow-y: scroll;"><?php
    echo htmlentities(`sudo -u devserver rm /usr/share/servers/devserver/map/Illarion_* -f -v`);
?></pre>

<p>Updating Map Data:</p>

<pre style="max-height: 130pt;overflow-y: scroll;"><?php
    echo htmlentities(`svn update /usr/share/servers/devserver/map/import 2>&1`);
?></pre>

<p>Causing the server to reload the maps:</p>

<pre style="max-height: 130pt;overflow-y: scroll;"><?php
    echo htmlentities(`sudo -u devserver /usr/bin/devctl loadmaps`);
    echo PHP_EOL.'Sending Signal 10 to devserver';
?></pre>

<?php endif; ?>
