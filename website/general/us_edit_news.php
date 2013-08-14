<?php
    include ( $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php' );

    define('SUBMIT_SAVE', 'Save');
    define('SUBMIT_PREVIEW', 'Preview');
    define('SUBMIT_DELETE', 'Delete');
    define('IN_NEWS_EDITOR', 1);

    $targetNewsPage = __DIR__ . '/us_news.php';

    $translations = array();
    $translations['accessRejected'] = 'Access denied';
    $translations['entryAlreadyPublished'] = 'You can\'t edit news entries that got already published.';
    $translations['entryDeleted'] = 'The news entry got deleted.';
    $translaction['deleteCheckMissing'] = 'You need to set the mark to confirm that you really want to delete the news entry.';
    $translations['newsEntryStored'] = 'The news entry got successfully stored.';
    $translations['errorWhileStoring'] = 'Something went wrong when saving the news entry.';

    include __DIR__ . '/inc_edit_news.php';

    Page::setTitle('Compose News Entry');
    Page::setDescription('This page contains the editor to write news for the Illarion homepage.');
    Page::setKeywords(array('News', 'Editor'));
    Page::setXHTML();
    Page::Init();
?>

<h1><?php echo (is_null($originalEntry) ? 'Create' : 'Change'); ?> a news entry</h1>

<?php if ($legacy): ?>
    <p style="font-weight:bold;color:#990000;">
        This news entry is a old one. It's rendered using different techniques. HTML-Code is used in this entry and
        BBCode is ignored. How ever in case you change this news entry it will loose its legacy flag and will be
        interpreted like a new entry. So make sure that you replace all HTML with BBCode in case you change this entry.
    </p>
<?php endif; ?>

<?php
if ($showPreview): ?>
    <div>
        <fieldset>
            <legend>Preview (german)</legend>
            <?php echo $newsRenderer->renderEntry($newsEntry, 'de'); ?>
        </fieldset>
        <fieldset>
            <legend>Preview (english)</legend>
            <?php echo $newsRenderer->renderEntry($newsEntry, 'en'); ?>
        </fieldset>
    </div>
<?php endif; ?>

<form action="<?php echo Page::getUrlToFile(__FILE__); ?>" method="post">
    <fieldset>
        <legend>German news entry</legend>
        <p>
            <label>
                Headline <?php echo ($titleDeChanged ? '(changed)' : ''); ?>
                <input type="text" name="title_de" value="<?php echo $titleDe; ?>" style="width:100%"/>
            </label>
        </p>
        <p>
            <label>
                Text <?php echo ($contentDeChanged ? '(changed)' : ''); ?>
                <textarea rows="15" name="content_de" style="width:100%" wrap="virtual"><![CDATA[<?php echo $contentDe; ?>]]></textarea>
            </label>
        </p>
        <p>
            <label>
                <input type="checkbox" name="signedOff_de"
                       value="yes" <?php echo ($signedOffDe ? 'checked="checked" ' : ''); ?>/>
                Entry signed off <?php echo ($signedOffDeChanged ? '(changed)' : ''); ?>
            </label>
        </p>
    </fieldset>

    <fieldset>
        <legend>English news entry</legend>
        <p>
            <label>
                Headline <?php echo ($titleEnChanged ? '(changed)' : ''); ?>
                <input type="text" name="title_us" value="<?php echo $titleEn; ?>" style="width:100%"/>
            </label>
        </p>
        <p>
            <label>
                Text <?php echo ($contentEnChanged ? '(changed)' : ''); ?>
                <textarea rows="15" name="content_us" style="width:100%" wrap="virtual"><![CDATA[<?php echo $contentEn; ?>]]></textarea>
            </label>
        </p>
        <p>
            <label>
                <input type="checkbox" name="signedOff_us"
                       value="yes" <?php echo ($signedOffEn ? 'checked="checked" ' : ''); ?>/>
                Entry signed off <?php echo ($signedOffEnChanged ? '(changed)' : ''); ?>
            </label>
        </p>
    </fieldset>

    <fieldset>
        <legend>Allgmein</legend>

        <p class="hyphenate" style="font-weight: bold;">
            News entries that got published, are pushed to the players and to facebook using the news feed. For this
            reason its not possible to change news entries once they got published. Its required to check the news entry
            prior to being published.
        </p>
        <p>
            <label>
                <input type="checkbox" name="published"
                       value="yes" <?php echo ($published ? 'checked="checked" ' : ''); ?>/>
                Published <?php echo ($publishedChanged ? '(changed)' : ''); ?>
            </label>
        </p>
        <p style="text-align:center;">
            <input type="submit" name="action" value="<?php echo SUBMIT_PREVIEW; ?>" style="margin-right:15px" />
            <input type="submit" name="action" value="<?php echo SUBMIT_SAVE; ?>" />
            <input type="reset" value="Zurücksetzen" />
            <input type="hidden" name="targetid" value="<?php echo $newsId; ?>" />
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


<h2>Help</h2>

<p class="hyphenate">
    You have to be aware that the headlines may only contain simple text. The text fields for the content of the news
    entry may contain BBCode. The following tags are supported:
</p>

<ul>
    <li>Bold text (<span style="font-family: monospace;">[b]Text[/b]</span>)</li>
    <li>Italic text (<span style="font-family: monospace;">[i]Text[/i]</span>)</li>
    <li>URLs (<span style="font-family: monospace;">[url]http://illarion.org[/url]</span> oder
        <span style="font-family: monospace;">[url=http://illarion.org]Illarion Homepage[/url]</span></li>
    <li>Lists (<span style="font-family: monospace;">[list][*]Entry 1[*]Entry 2[/list]</span>)</li>
</ul>

<p class="hyphenate">
    The German and English news entry has to be signed prior to the publishing. Before the signing and publishing is
    done, the news entry is only visible for news authors. The signing should be done by the person who checked the
    news entry text. The signing can be done by the author, how ever that is not the way it should be done. Only in case
    the news entry was prepared before, its allowed to be done.
</p>