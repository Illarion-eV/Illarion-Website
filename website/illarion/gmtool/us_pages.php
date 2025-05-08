<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_topmenu.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_pagemenu.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_pages.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/shared/def_gmtool.php' );

	if (!IllaUser::auth('gmtool_pages'))
	{
		Messages::add( (Page::isGerman() ? 'Zugriff verweigert' : 'Access denied'), 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/us_gmtool.php' );
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

	Page::setTitle( array( 'GM Tool', 'Pages' ) );
    Page::setDescription( 'Edit GM Pages' );
    Page::setKeywords( array( 'GM Tool', 'Pages', 'Overview' ) );

    Page::addCSS( array( 'menu', 'gmtool' ) );

    Page::setXHTML();
    Page::Init();

	$pages = getGmPages($_GET['filter']);

?>

<h1>GM Pages</h1>

<?php include_menu(); ?>

<div class="spacer"></div>

<?php include_page_menu(isset($_GET['filter']) ? $_GET['filter'] : 0); ?>

<div class="spacer"></div>

<?php

        foreach ($pages as $page)
        {
            if ($page['chr_name']!="") { $char_name=$page['chr_name']; }
            else { $char_name="Character Deleted"; }


            echo "<table width='100%' border='0'>";
            echo "<tr><td colspan='3'>";
            echo "<h2>";
            echo "<a href=\"".$url."/illarion/gmtool/us_pages.php?filter=".$_GET['filter']."&amp;page=".$page['pager_id']."\">".$page['pager_time']." - ".$char_name." (".$page['pager_user'].")</a>";
            echo "</h2>";
            echo htmlspecialchars($page['pager_text'] ?? "");
            echo "</td></tr>";

            // Mittelteil der nur bei dem aktuellen Eintrag angezeigt wird
            //
            if ($_GET['page']==""){ $_GET['page']=0; }
            if ($page['pager_id']==$_GET['page'])
            {
                echo "<form action='".Page::getURL()."/illarion/gmtool/us_pages.php?filter=".$_GET['filter']."&amp;page=".$_GET['page']."' method='post'>";
                echo "<tr><td width='35%'><b>Message</b></td>";
                echo "<td><b>Notice</b></td></tr>";
                echo "<tr><td><textarea rows='3' cols='45' readonly='true'>";
                echo htmlspecialchars($page['pager_text'] ?? "");
                echo "</textarea></td>";
                echo "<td valign='top'><textarea name='note' rows='3' cols='35'>";
                echo htmlspecialchars($page['pager_note'] ?? "");
                echo "</textarea></td></tr>";
                echo "<tr><td>&nbsp;<button type='submit' name='action' value='0'>Save</button>";
                echo "&nbsp;&nbsp;&nbsp;<button type='submit' name='action' value='1'>Save and</button>";
                echo "&nbsp;move to&nbsp;<select name='move_to'>";
                echo "<option value='1'>In Work</option>";
                echo "<option value='2'>Completed</option>";
                echo "<option value='3'>Archive</option></select>";
                echo "&nbsp;&nbsp;&nbsp;<button type='submit' name='action' value='2'>Delete</button></td>";
                echo "&nbsp;<td><b>Last Modified By:</b>&nbsp;";
                if (!isset($page['gm_name'])) { $page['gm_name']="Nobody"; }
                echo $page['gm_name']."</td></tr>";
                echo "<input type='hidden' name='time' value='".$page['pager_time']."' />";
                echo "</form>";
            }
            echo "</table>";

        }



?>
