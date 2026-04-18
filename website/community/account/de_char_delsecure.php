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
		exit("Fehler - Charakter-ID wurde nicht richtig übergeben.");
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
	<p>Bist du sicher das du deinen Charakter <b><?php echo htmlspecialchars($char, ENT_QUOTES, 'UTF-8'); ?></b> (<?php echo $server; ?>) wirklich
	löschen willst? Diese Aktion kann nicht mehr rückgängig gemacht werden.</p>

	<form id="delete_form" name="delete_form" method="post" action="de_charlist.php" style="width:100%;text-align:center;" onsubmit="return confirmDeletion();">
        <p>Geben Sie den Namen des Zeichens ein, um die Löschung zu bestätigen:</p>
        <input type="text" id="confirm_name" name="confirm_name" />
        <br /><br />

        <button type="submit" style="margin-right:10px;">
            Ja, den Charakter<br />löschen
        </button>
        
        <?php if($enable_lightwindow): ?>
            <button onclick="myLightWindow.deactivate();return false;" style="margin-left:10px;">
                Nein, den Charakter<br />nicht löschen
            </button>
        <?php endif; ?>

        <input type="hidden" name="server" value="<?php echo $_GET['server']; ?>" />
		<input type="hidden" name="charid" value="<?php echo $charid; ?>" />
		<input type="hidden" name="action" value="char_delete" />
	</form>

    <script>
        function confirmDeletion() {
            var entered = document.getElementById('confirm_name').value;
            var actual = <?php echo json_encode($char); ?>;

            if (entered !== actual) {
            alert("Character name does not match. Deletion cancelled.");
            return false;
            }

            return true;
        }
    </script>
</div>