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

	Page::setTitle( array( 'GM-Tool', 'Pages' ) );
    Page::setDescription( 'Auf dieser Seite kannst du gm-pages bearbeiten' );
    Page::setKeywords( array( 'GM-Tool', 'Pages', 'Übersicht' ) );

    Page::addCSS( array( 'menu', 'gmtool' ) );

    Page::setXHTML();
    Page::Init();

	$pages = getGmPages($_GET['filter']);

?>

<h1>Gm-Pages - Übersicht</h1>

<?php include_menu(); ?>

<div class="spacer"></div>

<?php include_page_menu(1); ?>

<div class="spacer"></div>

<?php

echo "<pre>";
print(htmlspecialchars(var_export($pages, TRUE)));
echo "</pre>";

        foreach ($pages as $page)
        {

			echo "<pre>";
			print_r($page['oid']);
			echo "</pre>";

            if ($page['chr_name']!="") { $char_name=$page['chr_name']; }
            else { $char_name="Char gelöscht"; }


            echo "<table width='100%' border='0'>";
            echo "<tr><td colspan='3'>";
            echo "<h2>";
            echo "<a href=".$url."/illarion/gmtool/de_pages.php?filter=0&page=".$page['oid'].">".$page['pager_time']." - ".$char_name." (".$page['pager_user'].")</a>";
            echo "</h2>";
            echo "</td></tr>";

            // Mittelteil der nur bei dem aktuellen Eintrag angezeigt wird
            //
            if ($_GET['page']==""){ $_GET['page']=0; }
            if ($page['oid']==$_GET['page'])
            {
                echo "<form action='".Page::getURL()."/illarion/gmtool/de_pages.php?filter=".$_GET['filter']."&page=".$_GET['page']."' method='post'>";
                echo "<tr><td width='35%'><b>Message</b></td>";
                echo "<td><b>Notiz</b></td></tr>";
                echo "<tr><td><textarea rows='3' cols='80' readonly>";
                echo $page['pager_text'];
                echo "</textarea></td>";
                echo "<td valign='top'><textarea name='note' rows='3' cols='80'>";
                echo $page['pager_note'];
                echo "</textarea></tr>";
                echo "<tr><td>&nbsp;<input type='submit' name='justSave' value='Nur Speichern'>";
                echo "&nbsp;&nbsp;&nbsp;<input type='submit' name='SaveAnd' value='Speichern und...'>";
                echo "&nbsp;verschieben&nbsp;<select name='move_to'>";
                echo "<option value='1'>nach \"in Arbeit\"</option>";
                echo "<option value='2'>nach \"Erledigt\"</option>";
                echo "<option value='3'>ins Archiv</option></select>";
                echo "&nbsp;&nbsp;&nbsp;<input type='submit' name='delete' value='Löschen'></td>";
                echo "&nbsp;<td><b>Zuletzt geändert durch:</b>&nbsp;";
                if ($page['gm_accid']=="") { $page['gm_accid']="Niemand"; }
                echo $page['gm_accid']."</td></tr>";
                echo "<input type='hidden' name='time' value='".$page['pager_time']."' />";
                echo "</form>";
            }
            echo "</table>";

        }



?>
