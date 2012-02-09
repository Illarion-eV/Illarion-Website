<?php


// TOOLSET
// Includes some often used tools into the script
include("toolset.inc");


// HTML-HEAD
// Includes the HTML-Head part, which is used allover the page
include("inc_html_head.php");


// RIGHTS-MANAGEMENT-SWITCH

$loggedinuser=SQLQuery("SELECT gm_charid FROM gms WHERE gm_login='".$_SERVER['PHP_AUTH_USER']."'","illarionserver");

if ($loggedinuser[0][gm_charid]=="") {
	$_GET[mod]="notloggedin";
} else {
	$current_gm_id=$loggedinuser[0][gm_charid];
	$current_gm_rights=decbin($loggedinuser[0][gm_rights_gmtool]);
}





// MAIN MENU
// This menu is the first level menu, which is used allover the page
echo "<div id='menue'><table width='100%'><tr><td></td>
			<td width='100' align='center'><a href='index.php?mod=accwork'>Account Work</a></td>
			<td width='100' align='center'><a href='index.php?mod=search'>Search</a></td>
			<td width='100' align='center'><a href='index.php?mod=gameeditors'>Game Editors</a></td>
			<td width='100' align='center'><a href='index.php?mod=pager'>Pager</a></td>
			<td></td></tr></table></div>";


// MODULE SWITCH
// Switches to the several functions of the Main Menu
switch($_GET[mod]) {





case "notloggedin":
	$content="You are obviously a GM, but not registered for the GM-Tool yet.
						To register you, please contact either Alatar, Shivoc or Martin to enable access for you.<br><br>";

break;


// MODULE SEARCH
    case "search":
        $menu2="<table width='100%'><tr><td></td>
				<td align='center'><a href='index.php?mod=search&submod=chars'>Characters</a></td>
				<td align='center'><a href='index.php?mod=search'>Account</a></td>
				<td align='center'>&nbsp;</td>
				<td align='center'>&nbsp;</td>
				<td></td></tr></table>";
		if ($_POST[searchvalue]=="") {$_POST[searchvalue]="%";}
		switch($_GET['submod']) {
			case "chars":
			    // Checks for the type of search chosen inc_chars_find.php
				// If empty, it will redirect to the search definition screen (inc_chars_find.php)
				// If not empty, it will print out the search results (inc_chars_findlist.php)
				if (($_POST[searchtype]<>"")) {
					include("inc_chars_findlist.php");
				} else {
					include("inc_chars_find.php");
				}
			break;
			default:
				// Checks for the type of search chosen in inc_account_find.php
				// If empty, it will redirect to the search definition screen (inc_account_find.php)
				// If not empty, it will print out the search results (inc_account_findlist.php)
				if (($_POST[searchtype]=="multi")) {
					include("inc_multi_trace.php");
				} elseif (($_POST[searchtype]<>"")) {
					include("inc_account_findlist.php");
				} else {
					include("inc_account_find.php");
				}
			break;
		}
	break;


// MODULE ACCOUNTWORK
// Contains the tools to do the account work
	case "accwork":
		$menu2="<table width='100%'><tr><td></td>
						<td align='center'><a href='index.php?mod=accwork&submod=accs'>Accounts</a></td>
						<td align='center'><a href='index.php?mod=accwork&submod=char'>Characters</a></td>
						<td align='center'><a href='index.php?mod=accwork&submod=race'>Race Applys</a></td>
						<td align='center'><a href='index.php?mod=accsettings'>AS Settings</a></td>
						<td></td></tr></table>";
		switch($_GET['submod']) {
			case "char":
				include("inc_chars_work.php");
			break;
			case "race":
				include("inc_race_work.php");
			break;
			case "accs":
				include("inc_account_work.php");
			break;
			default:
				include("inc_overview_work.php");
			break;
		}
	break;


	// MODULE ACCOUNTVIEW
	// Contains the tools to manage accounts
	// For account search, refer to module "accounts"
	case "accountview":
		// SUBMENU ACCOUNTS
		$menu2="<table width='100%'><tr><td></td>
						<td width='100' align='center'><a href='index.php?mod=accountview&accountid=$_GET[accountid]'>Overview</a></td>
						<td width='100' align='center'><a href='index.php?mod=accountview&accountid=$_GET[accountid]&submod=application'>Application</a></td>
						<td width='100' align='center'><a href='index.php?mod=accountview&accountid=$_GET[accountid]&submod=status'>Status</a></td>
						<td width='100' align='center'><a href='index.php?mod=accountview&accountid=$_GET[accountid]&submod=chars'>Chars</a></td>
						<td></td></tr></table>";

		// SUBMODULE SWITCH
		switch($_GET[submod]) {

			// SUBMODULE APPLICATION OVERVIEW
			// Shows the application and the votes for the specified account
			case "application":
				include ("inc_account_application_main.php");
			break;

			// SUBMODULE FIRST APPLICATION
			// Shows the content of the first application plus the opportunity to vote
			case "application1":
				include ("inc_account_application_first.php");
			break;

			// SUBMODULE SECOND APPLICATION
			// Shows the content of the second application plus the opportunity to vote
			case "application2":
				include ("inc_account_application_second.php");
			break;

			// SUBMODULE ACCOUNT STATUS
			// Offers a checkbox list of all status possibilities to choose from
			// I am unsure if this is the best solution to give a possibility to select a status
			// for an account, especially for status 0, 1, 2, 4, 5 and 6, cause these are normally
			// set either by the Account System Playerside or the Application Interface
			case "warn":
			case "status":
			  include("inc_account_status.php");
			break;

			// SUBMODULE ACCOUNT CHARS
			// Shows a list of all chars included in this account including a link to the char overview
			case "chars":
				include("inc_account_charview.php");
			break;

			// SUBMODULE ACCOUNT OVERVIEW
			// Shows the main aspects of the account including the possibility to change password and email
			default:
				include("inc_account_overview.php");
		}

	break;


	// MODULE CHARVIEW
	// Contains the tools to manage chars
	// For char search, refer to module "characters"
	case "charview":

		// SUBMENU CHARS
		$menu2="<table width='100%'><tr><td></td>
						<td width='100' align='center'><a href='index.php?mod=charview&playerid=$_GET[playerid]&servertype=$_GET[servertype]'>Overview</a></td>
						<td width='100' align='center'><a href='index.php?mod=charview&playerid=$_GET[playerid]&submod=status&servertype=$_GET[servertype]'>Status&Stats</a></td>
						<td width='100' align='center'><a href='index.php?mod=charview&playerid=$_GET[playerid]&submod=skills&servertype=$_GET[servertype]'>Skills</a></td>
						<td width='100' align='center'><a href='index.php?mod=charview&playerid=$_GET[playerid]&submod=inventory&servertype=$_GET[servertype]'>Inventory</a></td>
						<td></td></tr></table>";

		// SUBMODULE SWITCH
		switch($_GET[submod]) {

			// SUBMODULE CHAR SKILLS
			// Shows a list of all skills of the specified char and gives the possibility
			// to add, change and remove skills from that char
			case "skills":
				include("inc_chars_skills.php");
			break;

			// SUBMODULE CHAR INVENTORY
			// Shows the inventory of the specified char
			case "inventory":
				include("inc_chars_inventory.php");
			break;

			// SUBMODULE CHAR STATUS
			// Shows the current stats and the status of the char
			case "status":
				include("inc_chars_status.php");
			break;

			// SUBMODULE CHAR OVERVIEW
			// Shows a little overview about the character
			default:
				include("inc_chars_overview.php");
		}
		break;

	case "pager":
        // Clean Up Pager
        SQLQuery("DELETE FROM gmpager WHERE ( SELECT count(*) FROM gms WHERE gmpager.pager_user = gms.gm_charid ) > 0;","illarionserver");
        // Pages von GMs gelöscht

        if ($_GET['action'] == "update") {
            SQLQuery("UPDATE gmpager SET pager_status=$_POST[folder],pager_gm=$current_gm_id,pager_note='".pg_escape_string($_POST[comment])."' WHERE oid='$_GET[pageid]';","illarionserver");
            switch($_POST[folder]){
                case 0: $_GET[submod] = "new"; break;
                case 1: $_GET[submod] = "inwork"; break;
                case 2: $_GET[submod] = "done"; break;
                case 3: $_GET[submod] = "trash"; break;
                default: $_GET[submod] = "new"; break;
            } // switch
        } elseif ($_GET['action'] == "delete") {
            SQLQuery("DELETE FROM gmpager WHERE oid='$_GET[pageid]';","illarionserver");
        }
		    switch ($_GET[submod]) {
			    case "new":
			        $title="New GM Calls";
				    $pages=SQLQuery("SELECT gmpager.oid,chars.chr_name,gmpager.pager_user,gmpager.pager_text,gmpager.pager_time FROM gmpager JOIN chars ON gmpager.pager_user = chars.chr_playerid  WHERE gmpager.pager_status = 0 ORDER BY pager_time DESC LIMIT 100","illarionserver");
				break;
			    case "inwork":
			        $title="GM Calls in Work";
				    $pages=SQLQuery("SELECT gmpager.oid,chars.chr_name,gmpager.pager_user,gmpager.pager_text,gmpager.pager_time FROM gmpager JOIN chars ON gmpager.pager_user = chars.chr_playerid  WHERE gmpager.pager_status = 1 ORDER BY pager_time DESC LIMIT 100","illarionserver");
				break;
			    case "done":
			        $title="done gm calls";
				    $pages=SQLQuery("SELECT gmpager.oid,chars.chr_name,gmpager.pager_user,gmpager.pager_text,gmpager.pager_time FROM gmpager JOIN chars ON gmpager.pager_user = chars.chr_playerid  WHERE gmpager.pager_status = 2 ORDER BY pager_time DESC LIMIT 100","illarionserver");
				break;
			    case "trash":
			        $title="archived gm calls";
				    $pages=SQLQuery("SELECT gmpager.oid,chars.chr_name,gmpager.pager_user,gmpager.pager_text,gmpager.pager_time FROM gmpager JOIN chars ON gmpager.pager_user = chars.chr_playerid  WHERE gmpager.pager_status = 3 ORDER BY pager_time DESC LIMIT 100","illarionserver");
				break;
				case "showpage":
				    include('inc_page_showpage.php');
				break;
				default:
				    $title="New GM Calls";
				    $pages=SQLQuery("SELECT gmpager.oid,chars.chr_name,gmpager.pager_user,gmpager.pager_text,gmpager.pager_time FROM gmpager JOIN chars ON gmpager.pager_user = chars.chr_playerid  WHERE gmpager.pager_status = 0 ORDER BY pager_time DESC LIMIT 100","illarionserver");
				break;
		    }
		    if ($_GET[submod] == "showpage") {
		    } elseif (count($pages)>0) {
		        $content=$content."<b>".$title."</b><br><br>";
	            $content=$content."<table width='100%'>";
		        foreach ($pages as $key=>$page) {
			        $content=$content."<tr><td width='100' valign='top'><a href='index.php?mod=charview&playerid=$page[pager_user]&servertype=illarionserver'>$page[chr_name]</a></td>
		        				       <td width='100' valign='top'><a href='index.php?mod=pager&submod=showpage&pageid=$page[oid]'>".substr($page[pager_time],0,19)."</a></td>
								       <td valign='top'>$page[pager_text]</tr>";
			        $content=$content."<tr height='5'><td width='100'></td><td></td></tr>";
		        }
		        $content=$content."</table>";
	        } else {
	            $content=$content."<b>".$title."</b><br><br>";
                $content=$content."No GM-Calls found";
            }
			$menu2="<table width='100%'><tr><td></td>
					<td width='100' align='center'><a href='index.php?mod=pager&submod=new'>New</a></td>
					<td width='100' align='center'><a href='index.php?mod=pager&submod=inwork'>In Work</a></td>
					<td width='100' align='center'><a href='index.php?mod=pager&submod=done'>Done</a></td>
					<td width='100' align='center'><a href='index.php?mod=pager&submod=trash'>Archive</a></td>
					<td></td></tr></table>";


	break;


	case "gameeditors":
		$menu2="<table width='100%'><tr><td></td>
						<td width='100' align='center'><a href='index.php?mod=gameeditors&submod=gmeditor'>GM Editor</a></td>
						<td width='100' align='center'><a href='index.php?mod=gameeditors&submod=itemeditor'>Item Editor</a></td>
						<td width='100' align='center'><a href='index.php?mod=gameeditors&submod=npceditor'>NPC Editor</a></td>
						<td width='100' align='center'><a href='index.php?mod=gameeditors&submod=triggereditor'>Trigger Editor</a></td>
						<td></td></tr></table>";
		switch($_GET[submod]) {
			case "gmeditor":
				if (GetGMToolRights($_SERVER['PHP_AUTH_USER'])=="1") {
					include("inc_editor_gmrights.php");
				} else {
					include("inc_notallowed.php");
				}
			break;
			case "itemeditor":
				include("inc_editor_items.php");
			break;
			case "npceditor":
				$menu3="<table width='100%'><tr><td></td>
					<td width='100' align='center'><a href='https://illarion.org/gmadmin/index.php?mod=gameeditors&submod=editor_npc'>NPCs</a></td>
					<td width='100' align='center'><a href='https://illarion.org/gmadmin/index.php?mod=gameeditors&submod=editor_monster'>Monster</a></td>
					<td width='100' align='center'><a href='https://illarion.org/gmadmin/index.php?mod=gameeditors&submod=editor_spawns'>Spawns</a></td>
					<td width='100' align='center'><a href='#'></a></td>
					<td></td></tr></table>";
			break;
			case "editor_npc":
				include("inc_editor_npc.php");
			break;
			case "editor_monster":
				include("inc_editor_monster.php");
			break;
			case "editor_spawns":
				include("inc_editor_spawns.php");
			break;

			case "triggereditor":
				$content="triggereditor";
			break;
			default:
				$content="default";
		}


	break;
	case "accsettings":
		include ("inc_account_settings.php");
	break;

	default:
	// *** MAIN ***
		$content="Illarion GM-Tool v2<br><br>After the deletion of the old system, this is the renewed version. Send bugs to <a href='mailto:neonfire@illarion.org'>neonfire@illarion.org</a>.<br><br>And remember, this is just a sneaky spaceholder for all those killer-applications I am going to code. And when I say 'killer' I mean it that way ;-)";


}



echo "<div id='spacer'></div><div id='menue'>$menu2</div>";
echo "<div id='spacer'></div><div id='menue'>$menu3</div>";
echo "<div id='spacer'></div><div id='content'>$content</div>";

php?>

<div id='spacer'></div>
<div id='footer' align='center' valign='bottom'>Coded by <a href='mailto:neonfire@illarion.org'>Neonfire</a> and <a href='mailto:nitram@illarion.org'>Nitram</a><br>Comments and critics are welcome!</div>
<div id='spacer'></div>

</body>
</html>
