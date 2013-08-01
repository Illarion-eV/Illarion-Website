<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	$server = '';
	switch ($_GET['server']) {
	case '1':
		$server = 'devserver';
		break;
	case '2':
		$server = 'testserver';
		break;
	default:
		$server = 'illarionserver';
	}

	if (!isset( $_GET['charid'] ) || !is_numeric($_GET['charid']))
	{
		exit('Error - Character ID not correctly transfered.');
	}

	$charid = (int)$_GET['charid'];

	$pgSQL =& Database::getPostgreSQL( $server );

	$query = 'SELECT chr_name'
	.PHP_EOL.' FROM chars'
	.PHP_EOL.' WHERE chr_accid = '.$pgSQL->Quote( IllaUser::$ID )
	.PHP_EOL.' AND chr_playerid = '.$pgSQL->Quote( $charid )
	;
	$pgSQL->setQuery( $query );
	$char = $pgSQL->loadResult();

	if (strlen($char) == 0)
	{
		exit('Character was not found.');
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
	<p>Are you sure that you want to delete your character <b><?php echo $char; ?></b> (<?php echo $server; ?>)?
	There is no way to undo this action.</p>

	<form id="delete_form" name="delete_form" method="post" action="us_charlist.php" style="width:100%;text-align:center;">
		<button onclick="document.forms.delete_form.submit();" style="margin-right:10px;">Yes, delete the<br />character</button>
		<?php if($enable_lightwindow): ?><button onclick="myLightWindow.deactivate();return false;" style="margin-left:10px;">No, don't delete<br />the character</button><?php endif; ?>
		<input type="hidden" name="server" value="<?php echo $_GET['server']; ?>" />
		<input type="hidden" name="charid" value="<?php echo $charid; ?>" />
		<input type="hidden" name="action" value="char_delete" />
	</form>
</div>