<?php
include $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php";

Page::setTitle( 'Spielserver starten und beenden' );
Page::setDescription( 'Diese Seite dient dazu den Spielserver zu starten und zu stoppen.' );
Page::setKeywords( array( 'Starten', 'Stoppen', 'Spielserver' ) );

Page::setXHTML();
Page::Init();
?>

    <h1>Spielserver steuern</h1>

<?php if (file_exists('/home/vilarion/rs_restart.lock')): ?>
    <p>Die Steuerung wurde durch <b>Vilarion</b> gesperrt.</p>
    <?php exit; endif; ?>

<?php if (file_exists('/home/martin/rs_restart.lock')): ?>
    <p>Die Steuerung wurde durch <b>martin</b> gesperrt.</p>
    <?php exit; endif; ?>

<?php if (file_exists('/home/nitram/rs_restart.lock')): ?>
    <p>Die Steuerung wurde durch <b>Nitram</b> gesperrt.</p>
    <?php exit; endif; ?>

<?php

if (isset($_POST['mode'])) {
    if ($_POST['mode'] == 'start') {
        $process = popen('sudo -u illarionserver illarionctl start', 'r');
        if (!is_bool($process)) {
            fread($process, 128);
            pclose($process);
        }
    } elseif ($_POST['mode'] == 'stop') {
        `sudo -u illarionserver illarionctl stop`;
    } elseif ($_POST['mode'] == 'kill') {
        `sudo -u illarionserver illarionctl kill`;
    }
}
?>

    <h2>Informationen</h2>

    <p>Diese Seite dient dazu den Devserver zu starten und zu stoppen. Bitte überprüfe vor dem Start
        des Devservers das dieser sicher nicht mehr läuft.</p>

    <h2>Zustand überprüfen</h2>

    <p>Teste ob Devserver läuft:</p>
<?php
$output = `illarionctl status`;
$running_server = false;
if (strpos($output, 'OFFLINE') === FALSE) {
    $running_server = true;
} else {
    $running_server = false;
}
?>
<?php if ($running_server): ?>
    <p style="color: #495645;">Der Server läuft.</p>
<?php else: ?>
    <p style="color: #be0000;">Der Server läuft nicht.</p>
<?php endif; ?>

<?php if ($running_server): ?>
    <p>Teste ob Spielserver Verbindungen annimmt:</p>
    <?php
    $connection = @fsockopen('127.0.0.1', 3012, $errno, $errstr, 30);
    $working_server = false;
    if (is_bool($connection)) {
        $working_server = false;
    } else {
        $working_server = true;
        fclose($connection);
    }
    ?>
    <?php if ($working_server): ?>
        <p style="color: #495645;">Verbindung kann hergestellt werden.</p>
    <?php else: ?>
        <p style="color: #be0000;">Verbindung kann nicht hergestellt werden.</p>
    <?php endif; ?>
<?php endif; ?>

    <p>Auswertung:</p>
<?php if ($running_server): ?>
    <?php if ($working_server): ?>
        <p>Der Server scheint normal zu arbeiten. Um einen Neustart durchzuführen muss der Server
            erst heruntergefahren und dann wieder gestartet werden.</p>
    <?php else: ?>
        <p>Der Server läuft, nimmt aber keine Verbindungen an. Das bedeutet das er entwender abgestürzt
            ist oder noch nicht richtig hochgefahren ist. Sollte dieser Zustand länger als 5 Minuten bestehen
            sollte der Server abgeschalten und neu gestartet werden.</p>
    <?php endif; ?>
<?php else: ?>
    <p>Der Server läuft nicht und kann daher jetzt gestartet werden.</p>
<?php endif; ?>

    <p><a href="<?php echo Page::getSecureURL(); ?>/restart_rs/de_restart_rs.php">Seite aktualisieren</a></p>

<?php Page::insert_go_to_top_link(); ?>

    <h2>Spielserver starten</h2>

    <p>In diesem Abschnitt kann der Spielserver gestartet werden. Diese Aktion sollte nur ausgeführt werden
        wenn der Spielserver nicht läuft.</p>

<?php if (isset($_POST['mode']) && $_POST['mode'] == 'start'): ?>

    <p>Server wird gestartet!</p>

<?php else: ?>

    <form action="<?php echo Page::getSecureURL(); ?>/restart_rs/de_restart_rs.php" method="post">
        <input type="submit" name="submit" value="Spielserver starten"<?php echo ($running_server ? '
        disabled="disabled" class="disabled"' : ''); ?> />
        <input type="hidden" name="mode" value="start" />
    </form>

<?php endif; ?>

<?php Page::insert_go_to_top_link(); ?>

    <h2>Spielserver herunterfahren</h2>

    <p>In diesem Abschnitt kann der Spielserver heruntergefahren werden. Dabei werden alle Spieler und die Karte
        gespeichert und der
        Server dann beendet. Diese Methode ist die beste um den Server abzuschalten. Allerdings kann es sein das sie nicht funktioniert
        wenn der Server abgestürzt ist.</p>

<?php if (isset($_POST['mode']) && $_POST['mode'] == 'stop'): ?>

    <p>Server wird heruntergefahren.</p>

<?php else: ?>

    <form action="<?php echo Page::getSecureURL(); ?>/restart_rs/de_restart_rs.php" method="post">
        <input type="submit" name="submit" value="Spielserver herunterfahren"<?php echo ($running_server ? '' : '
        disabled="disabled" class="disabled"'); ?> />
        <input type="hidden" name="mode" value="stop" />
    </form>

<?php endif; ?>

<?php Page::insert_go_to_top_link(); ?>

    <h2>Spielserver abschalten</h2>

    <p>In diesem Abschnitt kann der Spielserver abgeschalten werden. Das hat zur Folge das der Devserver beendet wird
        ohne das Spieler und
        die Karte gespeichert werden. Diese Methode wird immer funktionieren um den Devserver abzuschalten. Wegen dem Datenverlust sollte sie
        aber nur dann verwendet werden wenn das normale Herunterfahren fehlschlägt. In den meisten Fällen zeigt die Auswertung des Server
        Zustandes bereits ob der Server heruntergefahren oder abgeschalten werden muss.</p>

<?php if (isset($_POST['mode']) && $_POST['mode'] == 'stop'): ?>

    <p>Server wird abgeschalten.</p>

<?php else: ?>

    <form action="<?php echo Page::getSecureURL(); ?>/restart_rs/de_restart_rs.php" method="post">
        <input type="submit" name="submit" value="Devserver abschalten"<?php echo ($running_server ? '' : ' disabled="disabled" class="disabled"'); ?> />
        <input type="hidden" name="mode" value="kill" />
    </form>

<?php endif; ?>

<?php Page::insert_go_to_top_link(); ?>