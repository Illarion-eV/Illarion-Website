<?php


// TOOLSET
// Includes some often used tools into the script
	include("toolset.inc");


// HTML-HEAD
// Includes the HTML-Head part, which is used allover the page
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - A free massive multiplayer online roleplaying game (MMORPG)",
                  "Illarion: A free massive multiplayer online roleplaying game (MMORPG)",
                  "Gamemaster Tool" );
   include_header();


// RIGHTS-MANAGEMENT-SWITCH

	$loggedinuser=sqlquery("SELECT gm_charid FROM gms WHERE gm_login='".$_SERVER['PHP_AUTH_USER']."'","illarionserver");

	if ($loggedinuser[0][gm_charid]=="") {
		$_GET[mod]="notloggedin";
	} else {
		$current_gm_id=$loggedinuser[0][gm_charid];
		$current_gm_rights=decbin($loggedinuser[0][gm_rights_gmtool]);
	}





// MAIN MENU
// This menu is the first level menu, which is used allover the page
echo "<h2 class='center'><table width='100%'><tr><td></td>
			<td width='100' align='center'><a href='?mod=accounts'>Accounts</a></td>
			<td width='100' align='center'><a href='?mod=characters'>Characters</a></td>
			<td width='100' align='center'><a href='?mod=gameeditors'>Game Editors</a></td>
			<td width='100' align='center'><a href='?mod=pager'>Pager</a></td>
			<td></td></tr></table></h2>";


// MODULE SWITCH
// Switches to the several functions of the Main Menu
switch($_GET[mod]) {



	
	
case "notloggedin":	
	$content="You are obviously a GM, but not registered for the GM-Tool yet. 
						To register you, please contact either Alatar, Shivoc or Martin to enable access for you.<br><br>";

break;



// MODULE ACCOUNTS
// Contains the tools to find accounts in the database
// For account management, refer to module "accountview"
	case "accounts":
		// Checks if the search value field from inc_account_find.php is empty
		// if yes, it is filled with the wildcard %
		if ($_POST[searchvalue]=="") {$_POST[searchvalue]="%";}
		
		// Checks for the type of search chosen in inc_account_find.php
		// If empty, it will redirect to the search definition screen (inc_account_find.php)
		// If not empty, it will print out the search results (inc_account_findlist.php)
		if (($_POST[searchtype]<>"")) {
			include("inc_account_findlist.php");
		} else {
			include("inc_account_find.php");
		}
	break;
	
	
	// MODULE ACCOUNTVIEW
	// Contains the tools to manage accounts
	// For account search, refer to module "accounts"	
	case "accountview":
		// SUBMENU ACCOUNTS
		$menu2="<table width='100%'><tr><td></td>
						<td width='100' align='center'><a href='?mod=accountview&accountid=$_GET[accountid]'>Overview</a></td>
						<td width='100' align='center'><a href='?mod=accountview&accountid=$_GET[accountid]&submod=application'>Application</a></td>
						<td width='100' align='center'><a href='?mod=accountview&accountid=$_GET[accountid]&submod=status'>Status</a></td>
						<td width='100' align='center'><a href='?mod=accountview&accountid=$_GET[accountid]&submod=chars'>Chars</a></td>
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

	
	// MODULE CHARACTERS
	// Contains the tools to find chars in the database
	// For char management, refer to module "charview"
	case "characters":
		
		// Checks if the search value is empty
		// If yes, it is replaced by the wildcard %
		if ($_POST[searchvalue]=="") {
			$_POST[searchvalue]="%";
		}
		
		// Checks for the type of search chosen inc_chars_find.php
		// If empty, it will redirect to the search definition screen (inc_chars_find.php)
		// If not empty, it will print out the search results (inc_chars_findlist.php)
		if (($_POST[searchtype]<>"")) {
			include("inc_chars_findlist.php");	
		} else {
			include("inc_chars_find.php");
		}
	break;	
			

	
	// MODULE CHARVIEW
	// Contains the tools to manage chars
	// For char search, refer to module "characters"	
	case "charview":
	
		// SUBMENU CHARS
		$menu2="<table width='100%'><tr><td></td>
						<td width='100' align='center'><a href='?mod=charview&playerid=$_GET[playerid]&servertype=$_GET[servertype]'>Overview</a></td>
						<td width='100' align='center'><a href='?mod=charview&playerid=$_GET[playerid]&submod=status&servertype=$_GET[servertype]'>Status&Stats</a></td>
						<td width='100' align='center'><a href='?mod=charview&playerid=$_GET[playerid]&submod=skills&servertype=$_GET[servertype]'>Skills</a></td>
						<td width='100' align='center'><a href='?mod=charview&playerid=$_GET[playerid]&submod=inventory&servertype=$_GET[servertype]'>Inventory</a></td>
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
		switch ($_GET[submod]) {
			case "new": 
				include("inc_page_new.php");
				/*
				$_GET[submod]="new";
				$pages=sqlquery("UPDATE gmpager SET pager_status=0,pager_gm=$current_gm_id,pager_note='$_POST[comment]' WHERE pager_time='".$_GET[ptime]."' AND pager_user=$_GET[puser]","illarionserver");
				*/
				break;
			case "in work": 
				include("inc_page_inwork.php");
				/*
				$_GET[submod]="inwork";
				$pages=sqlquery("UPDATE gmpager SET pager_status=1,pager_gm=$current_gm_id,pager_note='$_POST[comment]'  WHERE pager_time='".$_GET[ptime]."' AND pager_user=$_GET[puser]","illarionserver");
				*/
				break;
			case "done": 
				include("inc_page_done.php");
				/*
				$_GET[submod]="done";
				$pages=sqlquery("UPDATE gmpager SET pager_status=2,pager_gm=$current_gm_id,pager_note='$_POST[comment]'  WHERE pager_time='".$_GET[ptime]."' AND pager_user=$_GET[puser]","illarionserver");
				*/
				break;
			case "archive": 
				include("inc_page_trash.php");
				/*
				$_GET[submod]="trash";
				$pages=sqlquery("UPDATE gmpager SET pager_status=3,pager_gm=$current_gm_id,pager_note='$_POST[comment]'  WHERE pager_time='".$_GET[ptime]."' AND pager_user=$_GET[puser]","illarionserver");
				*/
				break;
		}
		
				$menu2="<table width='100%'><tr><td></td>
						<td width='100' align='center'><a href='?mod=pager&submod=new'>New</a></td>
						<td width='100' align='center'><a href='?mod=pager&submod=inwork'>In Work</a></td>
						<td width='100' align='center'><a href='?mod=pager&submod=done'>Done</a></td>
						<td width='100' align='center'><a href='?mod=pager&submod=trash'>Archive</a></td>
						<td></td></tr></table>";
		
		switch($_GET[submod]) {
			
			case "showpage":
				include("inc_page_showpage.php");
			break;
			
			case "inwork":
				include("inc_page_inwork.php");
			break;
			
			case "done":
				include("inc_page_done.php");
			break;
			
			case "trash":
				include("inc_page_trash.php");
			break;
				include("inc_page_new.php");
			default:

		}	
			


	break;


	case "gameeditors":
		$menu2="<table width='100%'><tr><td></td>
						<td width='100' align='center'><a href='?mod=gameeditors&submod=gmeditor'>GM Editor</a></td>
						<td width='100' align='center'><a href='?mod=gameeditors&submod=itemeditor'>Item Editor</a></td>
						<td width='100' align='center'><a href='?mod=gameeditors&submod=npceditor'>NPC Editor</a></td>
						<td width='100' align='center'><a href='?mod=gameeditors&submod=triggereditor'>Trigger Editor</a></td>
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
					<td width='100' align='center'><a href='?mod=gameeditors&submod=editor_npc'>NPCs</a></td>
					<td width='100' align='center'><a href='?mod=gameeditors&submod=editor_monster'>Monster</a></td>
					<td width='100' align='center'><a href='?mod=gameeditors&submod=editor_spawns'>Spawns</a></td>
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
	
	default:
	// *** MAIN ***
		$content="Illarion GM-Tool v2<br><br>After the deletion of the old system, this is the renewed version. Send bugs to <a href='mailto:neonfire@illarion.org'>neonfire@illarion.org</a>.<br><br>And remember, this is just a sneaky spaceholder for all those killer-applications I am going to code. And when I say 'killer' I mean it that way ;-)";


}
		
if ($menu2=="") { $menu2="<table><tr><td>&nbsp;</td></tr></table>"; }
if ($menu3=="") { $menu3="<table><tr><td>&nbsp;</td></tr></table>"; }
if ($content=="") { $content="<table><tr><td>&nbsp;</td></tr></table>"; }

echo "<br><h2><div align='center'>$menu2</div></h2>";
echo "<br><h2><div align='center'>$menu3</div></h2>";
echo "<br><h2><table hspace='5px' vspace='5px'><tr><td>$content</td></tr></table></h2>";
echo "<br><h2><table width='100%'><tr><td><div align='center'>Coded by <a href='mailto:neonfire@illarion.org'>Neonfire</a> and <a href='mailto:nitram@illarion.org'>Nitram</a><br>Comments and critics are welcome!</div></td></tr></table></h2>";

include_footer();
?>