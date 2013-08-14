<?php
/**
 * This file contains some helper function for the news editing utility.
 */
use \News\NewsEntry;
use \News\NewsDatabase;

if (!defined('IN_NEWS_EDITOR')) {
    exit('Access to illegal file.');
}

IllaUser::requireLogin();

if (!IllaUser::auth('news')) {
    Page::redirect(Page::getUrlToFile($targetNewsPage), $translations['accessRejected'], 'error');
}

$newsDb = new NewsDatabase();

if (isset($_REQUEST['targetid']) && is_numeric($_REQUEST['targetid'])) {
    $newsId = (int) $_REQUEST['targetid'];
} else {
    $newsId = NewsEntry::UNKNOWN_ID;
}

$originalEntry = null;
if ($newsId != NewsEntry::UNKNOWN_ID) {
    $originalEntry = $newsDb->getEntry($newsId);

    if ($originalEntry->isPublished()) {
        Page::redirect(Page::getUrlToFile($targetNewsPage), $translations['entryAlreadyPublished'], 'error');
    }
}

if (isset($_POST['action'])) {
    if ($_POST['action'] === SUBMIT_DELETE) {
        if ($_POST['deleteConfirmed'] === 'yes') {
            $newsDb->deleteEntry($originalEntry->getId());
            Page::redirect(Page::getUrlToFile($targetNewsPage), $translations['entryDeleted'], 'info');
        } else {
            Messages::add($translations['deleteCheckMissing'], 'error');
        }
    }
    $titleDe = trim(stripslashes($_POST['title_de']));
    $contentDe = trim(stripslashes($_POST['content_de']));
    $signedOffDe = ($_POST['signedOff_de'] === 'yes' && strlen($titleDe) > 0 && strlen($contentDe) > 0);
    if (!is_null($originalEntry) && !is_null($originalEntry->getGerman())) {
        $germanEntry = $originalEntry->getGerman();
        $titleDeChanged = ($titleDe !== (is_null($germanEntry->getTitle()) ? '' : $germanEntry->getTitle()));
        $contentDeChanged = ($contentDe !== (is_null($germanEntry->getContent()) ? '' : $germanEntry->getContent()));
        $signedOffDeChanged = ($signedOffDe !== $germanEntry->isProofReadingDone());
    } else {
        $titleDeChanged = $titleDe !== '';
        $contentDeChanged = $contentDe !== '';
        $signedOffDeChanged = $signedOffDe;
    }

    $titleEn = trim(stripslashes($_POST['title_us']));
    $contentEn = trim(stripslashes($_POST['content_us']));
    $signedOffEn = ($_POST['signedOff_us'] === 'yes' && strlen($titleEn) > 0 && strlen($contentEn) > 0);
    if (!is_null($originalEntry) && !is_null($originalEntry->getEnglish())) {
        $englishEntry = $originalEntry->getEnglish();
        $titleEnChanged = ($titleEn !== (is_null($englishEntry->getTitle()) ? '' : $englishEntry->getTitle()));
        $contentEnChanged = ($contentEn !== (is_null($englishEntry->getContent()) ? '' : $englishEntry->getContent()));
        $signedOffEnChanged = ($signedOffEn !== $englishEntry->isProofReadingDone());
    } else {
        $titleEnChanged = $titleEn !== '';
        $contentEnChanged = $contentEn !== '';
        $signedOffEnChanged = $signedOffEn;
    }

    $published = ($_POST['published'] === 'yes' && $signedOffDe && $signedOffEn);
    $publishedChanged = $published != (!is_null($originalEntry) && $originalEntry->isPublished());
    $legacy = (!is_null($originalEntry) && $originalEntry->isLegacy());
} elseif (is_null($originalEntry)) {
    $titleDe = '';
    $titleDeChanged = false;
    $contentDe = '';
    $contentDeChanged = false;
    $signedOffDe = false;
    $signedOffDeChanged = false;

    $titleEn = '';
    $titleEnChanged = false;
    $contentEn = '';
    $contentEnChanged = false;
    $signedOffEn = false;
    $signedOffEnChanged = false;

    $published = false;
    $publishedChanged = false;
    $legacy = false;
} else {
    if (!is_null($originalEntry->getGerman())) {
        $titleDe = $originalEntry->getGerman()->getTitle();
        $contentDe = $originalEntry->getGerman()->getContent();
        $signedOffDe = $originalEntry->getGerman()->isProofReadingDone();
    } else {
        $titleDe = '';
        $contentDe = '';
        $signedOffDe = false;
    }
    $titleDeChanged = false;
    $contentDeChanged = false;
    $signedOffDeChanged = false;

    if (!is_null($originalEntry->getEnglish())) {
        $titleEn = $originalEntry->getEnglish()->getTitle();
        $contentEn = $originalEntry->getEnglish()->getContent();
        $signedOffEn = $originalEntry->getEnglish()->isProofReadingDone();
    } else {
        $titleEn = '';
        $contentEn = '';
        $signedOffEn = false;
    }
    $titleEnChanged = false;
    $contentEnChanged = false;
    $signedOffEnChanged = false;

    $published = $originalEntry->isPublished();
    $publishedChanged = false;
    $legacy = false;
}

if (!is_null($originalEntry)) {
    $publishDateTime = $originalEntry->getPublicationDate();
    $publishDateTime->setTimezone(new \DateTimeZone('GMT'));
    $lastChangeTimeStamp = $publishDateTime->getTimestamp();
    $originalLastTimeStamp = $lastChangeTimeStamp;
} else {
    $lastChangeTimeStamp = 0;
    $originalLastTimeStamp = 0;
}
if (isset($_POST['lastChangeTimeStamp']) && is_numeric($_POST['lastChangeTimeStamp'])) {
    $lastChangeTimeStamp = (int) $_POST['lastChangeTimeStamp'];
}

$showPreview = false;
if (isset($_POST['action'])) {
    $currentAuthor = new \News\NewsAuthor(IllaUser::$ID, IllaUser::$username, IllaUser::$name);

    if (strlen($titleDe) > 0 || strlen($contentDe) > 0) {
        $author = $currentAuthor;
        $proofReader = null;
        if (!is_null($originalEntry) && !is_null($originalEntry->getGerman())) {
            $author = $originalEntry->getGerman()->getAuthor();
            $proofReader = $originalEntry->getGerman()->getProofReader();
        }
        if (!$signedOffDe) {
            $proofReader = null;
        } elseif ($signedOffDeChanged || $titleDeChanged || $contentDeChanged) {
            $proofReader = $currentAuthor;
        }
        $germanEntry = new \News\NewsLanguageEntry($titleDe, $contentDe, $author, $proofReader, !is_null($proofReader));
    } else {
        $germanEntry = null;
    }
    if (strlen($titleEn) > 0 || strlen($contentEn) > 0) {
        $author = $currentAuthor;
        $proofReader = null;
        if (!is_null($originalEntry) && !is_null($originalEntry->getEnglish())) {
            $author = $originalEntry->getEnglish()->getAuthor();
            $proofReader = $originalEntry->getEnglish()->getProofReader();
        }
        if (!$signedOffEn) {
            $proofReader = null;
        } elseif ($signedOffEnChanged || $titleEnChanged || $contentEnChanged) {
            $proofReader = $currentAuthor;
        }
        $englishEntry = new \News\NewsLanguageEntry($titleEn, $contentEn, $author, $proofReader, !is_null($proofReader));
    } else {
        $englishEntry = null;
    }
    $newsEntry = new \News\NewsEntry($newsId, new DateTime(), $germanEntry, $englishEntry, $published, false);

    if ($_POST['action'] === SUBMIT_PREVIEW) {
        $showPreview = true;
        $newsRenderer = new \News\Renderer\HTMLRenderer();
        if ($lastChangeTimeStamp != $originalLastTimeStamp) {
            Messages::add($translations['warningNewsChanged'], 'warn');
        }
    } elseif ($_POST['action'] === SUBMIT_SAVE) {
        if ($lastChangeTimeStamp == $originalLastTimeStamp) {
            if ($newsDb->saveEntry($newsEntry)) {
                if ($newsEntry->isPublished()) {
                    Page::redirect(Page::getUrlToFile($targetNewsPage), $translations['newsEntryStored'], 'info');
                } else {
                    Messages::add($translations['newsEntryStored'], 'info');
                }
            } else {
                Messages::add($translations['errorWhileStoring'], 'error');
            }
        } else {
            Messages::add($translations['errorNewsChanged'], 'error');
        }
    }
}
