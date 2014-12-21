<?php
	include ( $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php' );

    define('SUBMIT_SAVE', 'Speichern');
    define('SUBMIT_PREVIEW', 'Vorschau');
    define('SUBMIT_DELETE', 'Löschen');
    define('IN_NEWS_EDITOR', 1);

    $targetNewsPage = __DIR__ . '/de_news.php';

    $translations = array();
    $translations['accessRejected'] = 'Zugriff nicht gestattet';
    $translations['entryAlreadyPublished'] = 'News-Einträge die bereits veröffentlicht sind können nicht bearbeitet werden.';
    $translations['entryDeleted'] = 'Der News-Eintrag wurde erfolgreich entfernt.';
    $translaction['deleteCheckMissing'] = 'Um den News-Eintrag zu löschen muss der Hacken gesetzt werden.';
    $translations['newsEntryStored'] = 'Der News-Eintrag wurde erfolgreich gespeichert.';
    $translations['errorWhileStoring'] = 'Beim Speichern des News-Eintrags ist ein Fehler aufgetreten.';
    $translations['warningNewsChanged'] = 'Achtung! Der News-Eintrag wurde von einer anderen Person geändert.';
    $translations['errorNewsChanged'] = 'Der News-Eintrag kann nicht gespeichert werden, er wurde von einer anderen Person verändert.';

    include __DIR__ . '/inc_edit_news.php';

    Page::setTitle('Neuigkeiten verfassen');
    Page::setDescription('Diese Seite enthält den Editor für die Neuigkeiten auf der Homepage.');
    Page::setKeywords(array('Neuigkeiten', 'News', 'Editor'));
    Page::setXHTML();
    Page::Init();
?>

<h1>Einen News Eintrag <?php echo (is_null($originalEntry) ? 'erstellen' : 'ändern'); ?></h1>

<?php if ($legacy): ?>
<p style="font-weight:bold;color:#990000;">
    Dieser News-Eintrag ist ein alter Eintrag. Er wird nach anderen Prinzipien gerendert. HTML-Code wird interpretiert
    und BBCode wird ignoriert. Es ist möglich diesen News-Eintrag zu ändern, allerdings verliert er dadurch die
    Markierung als alter News-Eintrag. Bei der Bearbeitung muss also aller HTML-Code aus dem News-Eintrag entfernt
    werden und durch entsprechenden BBCode ersetzt werden.
</p>
<?php endif; ?>

<?php
if ($showPreview): ?>
<div>
    <fieldset>
        <legend>Vorschau (deutsch)</legend>
        <?php echo $newsRenderer->renderEntry($newsEntry, 'de'); ?>
    </fieldset>
    <fieldset>
        <legend>Vorschau (englisch)</legend>
        <?php echo $newsRenderer->renderEntry($newsEntry, 'en'); ?>
    </fieldset>
</div>
<?php endif; ?>

<form action="<?php echo Page::getUrlToFile(__FILE__); ?>" method="post">
    <fieldset>
        <legend>Deutscher News Eintrag</legend>
        <p>
            <label>
                Überschrift <?php echo ($titleDeChanged ? '(geändert)' : ''); ?>
                <input type="text" name="title_de" value="<?php echo $titleDe; ?>" style="width:100%"/>
            </label>
        </p>
        <p>
            <label>
                Text <?php echo ($contentDeChanged ? '(geändert)' : ''); ?>
                <textarea rows="15" name="content_de" style="width:100%" wrap="virtual"><![CDATA[<?php echo $contentDe; ?>]]></textarea>
            </label>
        </p>
        <p>
            <label>
                <input type="checkbox" name="signedOff_de"
                       value="yes" <?php echo ($signedOffDe ? 'checked="checked" ' : ''); ?>/>
                Eintrag ist abgezeichnet <?php echo ($signedOffDeChanged ? '(geändert)' : ''); ?>
            </label>
        </p>
    </fieldset>

    <fieldset>
        <legend>Englischer News Eintrag</legend>
        <p>
            <label>
                Überschrift <?php echo ($titleEnChanged ? '(geändert)' : ''); ?>
                <input type="text" name="title_us" value="<?php echo $titleEn; ?>" style="width:100%"/>
            </label>
        </p>
        <p>
            <label>
                Text <?php echo ($contentEnChanged ? '(geändert)' : ''); ?>
                <textarea rows="15" name="content_us" style="width:100%" wrap="virtual"><![CDATA[<?php echo $contentEn; ?>]]></textarea>
            </label>
        </p>
        <p>
            <label>
                <input type="checkbox" name="signedOff_us"
                       value="yes" <?php echo ($signedOffEn ? 'checked="checked" ' : ''); ?>/>
                Eintrag ist abgezeichnet <?php echo ($signedOffEnChanged ? '(geändert)' : ''); ?>
            </label>
        </p>
    </fieldset>

    <fieldset>
        <legend>Allgemein</legend>

        <p class="hyphenate" style="font-weight: bold;">
            News-Einträge die veröffentlicht wurden, werden über den News-Feed an die Spieler und an Facebook geschickt. Darum
            ist es nicht mehr möglich einen News-Eintrag zu verändern nachdem er veröffentlicht wurde. Die News-Einträge müssen
            daher vorher auf Richtigkeit geprüft werden.
        </p>
        <p>
            <label>
                <input type="checkbox" name="published"
                       value="yes" <?php echo ($published ? 'checked="checked" ' : ''); ?>/>
                Veröffentlicht <?php echo ($publishedChanged ? '(geändert)' : ''); ?>
            </label>
        </p>
        <p style="text-align:center;">
            <input type="submit" name="action" value="<?php echo SUBMIT_PREVIEW; ?>" style="margin-right:15px" />
            <input type="submit" name="action" value="<?php echo SUBMIT_SAVE; ?>" />
            <input type="reset" value="Zurücksetzen" />
            <input type="hidden" name="targetid" value="<?php echo $newsId; ?>" />
            <input type="hidden" name="lastChangeTimeStamp" value="<?php echo $lastChangeTimeStamp; ?>" />
        </p>
    </fieldset>

    <fieldset>
        <legend>News-Eintrag löschen</legend>
        <p>
            <label>
                <input type="checkbox" name="deleteConfirmed" value="yes" />
                Löschung des News-Eintrags bestätigen
            </label>
        </p>
        <p style="text-align:center;">
            <input type="submit" name="action" value="<?php echo SUBMIT_DELETE; ?>" />
        </p>
    </fieldset>
</form>


<h2>Ausfüllanleitung</h2>

<p class="hyphenate">
    Es ist zu beachten, dass die Überschriften nur reinen Text enthalten dürfen. Die Textfelder die den Inhalt der News
    enthalten dürfen BBCode enthalten. Es gibt einige wenige Tags die unterstützt werden. Unterstützt werden:
</p>

<ul>
    <li>Fetter Text (<span style="font-family: monospace;">[b]Text[/b]</span>)</li>
    <li>Kursiver Text (<span style="font-family: monospace;">[i]Text[/i]</span>)</li>
    <li>URLs (<span style="font-family: monospace;">[url]http://illarion.org[/url]</span> oder
        <span style="font-family: monospace;">[url=http://illarion.org]Illarion Homepage[/url]</span></li>
    <li>Listen (<span style="font-family: monospace;">[list][*]Punkt 1[*]Punkt 2[/list]</span>)</li>
</ul>

<p class="hyphenate">
    Bei allen News müssen die deutschen und englischen Einträge abgezeichnet werden bevor die News veröffentlicht werden
    kann. Bevor das Abzeichnen und das Veröffentlichen durchgeführt wurde, ist der News-Eintrag nur für News-Autoren
    sichbar. Das Abzeichnen sollte von der Person vorgenommen werden, die die Richtigkeit des Textes überprüft hat.
    Posts sollten generell nicht selbst abgezeichnet und direkt veröffentlicht werden. Es ist zwar möglich um Posts
    abzuschicken, die im Vorfeld vorbereitet wurden, allerdings sollte das nicht die Regel sein.
</p>