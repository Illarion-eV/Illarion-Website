<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_topmenu.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_pagemenu.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_pages.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/shared/def_gmtool.php' );

	if (!IllaUser::auth('gmtool_pages'))
	{
		Messages::add( (Page::isGerman() ? 'Zugriff verweigert' : 'Access denied'), 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
        if (!isset($_GET['page'])) {
            return;
        }

        $action = $_POST['action'];
        $pageId = $_GET['page'];
        $note = isset($_POST['note']) ? $_POST['note'] : '';
        $status = isset($_POST['move_to']) ? $_POST['move_to'] : null;

        if ($action == 0) {
            saveGmPage($pageId, $note, null);
        } else if ($action == 1) {
            saveGmPage($pageId, $note, $status);
        } else if ($action == 2) {
            saveGmPage($pageId, $note, 4);
        }
    }

    Page::setTitle( array( 'GM-Tool', 'Pages' ) );
    Page::setDescription( 'Auf dieser Seite kannst du GM-Pages bearbeiten' );
    Page::setKeywords( array( 'GM-Tool', 'Pages', 'Übersicht' ) );

    Page::addCSS( array( 'menu', 'gmtool' ) );

    Page::setXHTML();
    Page::Init();

	$pages = getGmPages($_GET['filter']);

?>

<h1>GM-Pages - Übersicht</h1>

<?php include_menu(); ?>

<div class="spacer"></div>

<?php include_page_menu(isset($_GET['filter']) ? $_GET['filter'] : 0); ?>

<div class="spacer"></div>

<?php

        foreach ($pages as $page)
        {
            if ($page['chr_name']!="") { $char_name=$page['chr_name']; }
            else { $char_name="Char gelöscht"; }


            echo "<table width='100%' border='0'>";
            echo "<tr><td colspan='3'>";
            echo "<h2>";
            echo "<a href=\"".$url."/illarion/gmtool/de_pages.php?filter=".$_GET['filter']."&amp;page=".$page['pager_id']."\">".$page['pager_time']." - ".$char_name." (".$page['pager_user'].")</a>";
            echo "</h2>";
            echo htmlspecialchars($page['pager_text'] ?? "");
            echo "</td></tr>";

            // Mittelteil der nur bei dem aktuellen Eintrag angezeigt wird
            //
            if ($_GET['page']==""){ $_GET['page']=0; }
            if ($page['pager_id']==$_GET['page'])
            {
                echo "<form action='".Page::getURL()."/illarion/gmtool/de_pages.php?filter=".$_GET['filter']."&amp;page=".$_GET['page']."' method='post'>";
                echo "<tr><td width='35%'><b>Message</b></td>";
                echo "<td><b>Notiz</b></td></tr>";
                echo "<tr><td><textarea rows='3' cols='45' readonly='true'>";
                echo htmlspecialchars($page['pager_text'] ?? "");
                echo "</textarea></td>";
                echo "<td valign='top'><textarea name='note' rows='3' cols='35'>";
                echo htmlspecialchars($page['pager_note'] ?? "");
                echo "</textarea></td></tr>";
                echo "<tr><td>&nbsp;<button type='submit' name='action' value='0'>Speichern</button>";
                echo "&nbsp;&nbsp;&nbsp;<button type='submit' name='action' value='1'>Speichern und</button>";
                echo "&nbsp;verschieben&nbsp;<select name='move_to'>";
                echo "<option value='1'>nach \"In Arbeit\"</option>";
                echo "<option value='2'>nach \"Erledigt\"</option>";
                echo "<option value='3'>ins Archiv</option></select>";
                echo "&nbsp;&nbsp;&nbsp;<button type='submit' name='action' value='2'>Löschen</button></td>";
                echo "&nbsp;<td><b>Zuletzt geändert durch:</b>&nbsp;";
                if (!isset($page['gm_accid'])) { $page['gm_accid']="Niemand"; }
                echo $page['gm_accid']."</td></tr>";
                echo "<input type='hidden' name='time' value='".$page['pager_time']."' />";
                echo "</form>";
            }
            echo "</table>";

        }



?>
