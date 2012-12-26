<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	$server = ( $_GET['server'] == '1' ? 'testserver' : 'illarionserver');

	if (!is_numeric($_GET['charid']))
	{
		exit("Fehler - Charakter-ID wurde nicht richtig übergeben.");
	}

	$pgSQL =& Database::getPostgreSQL( $server );

	$query = 'SELECT chr_name'
	.PHP_EOL.' FROM chars'
	.PHP_EOL.' WHERE chr_accid = '.$pgSQL->Quote( IllaUser::$ID )
	.PHP_EOL.' AND chr_playerid = '.$pgSQL->Quote( $_GET['charid'] )
	;
	$pgSQL->setQuery( $query );
	$char = $pgSQL->loadResult();

	if (strlen($char) == 0)
	{
		exit('Charakter wurde nicht gefunden.');
	}

	$enable_lightwindow = false;

	if ($enable_lightwindow)
	{
		Page::setXML();
	}
	else
	{
		Page::setXHTML();
	}
	Page::Init();
?>

<div>
	<p>Bist du sicher das du deinen Charakter <b><?php echo $char; ?></b> wirklich
	löschen willst? Diese Aktion kann nicht mehr rückgängig gemacht werden.</p>

	<form id="delete_form" name="delete_form" method="post" action="de_charlist.php" style="width:100%;text-align:center;">
		<button onclick="document.forms.delete_form.submit();" style="margin-right:10px;">Ja, den Charakter<br />löschen</button>
		<?php if($enable_lightwindow): ?><button onclick="myLightWindow.deactivate();return false;" style="margin-left:10px;">Nein, den Charakter<br />nicht löschen</button><?php endif; ?>
		<input type="hidden" name="server" value="<?php echo ($server == 'illarionserver' ? 0 : 1 ); ?>" />
		<input type="hidden" name="charid" value="<?php echo $_GET['charid']; ?>" />
		<input type="hidden" name="action" value="char_delete" />
	</form>
</div>