<?php
   // Bookmark redirect script

   $target = $_GET['target'];
   $url = "http://illarion.org";
   $description = "Illarion";

   switch( $target )
   {
      case "wong":
         $newurl = "http://www.mister-wong.de/index.php?action=addurl&bm_url=$url&bm_notice=&bm_description=$description&bm_tags=";
      break;
      case "webnews":
         $newurl = "http://www.webnews.de/einstellen?url=$url&title=$description";
      break;
      case "icio":
         $newurl = "http://www.icio.de/add.php?url=$url";
      break;
      case "oneview":
         $newurl = "http://beta.oneview.de:80/quickadd/neu/addBookmark.jsf?URL=$url&title=$description";
      break;
      case "linkarena":
         $newurl = "http://linkarena.com/bookmarks/addlink/?url=$url&title=$description&desc=&tags=";
      break;
		case "newskick":
         $newurl = "http://www.newskick.de/submit.php?url=$url";
      break;
		case "seekxl":
         $newurl = "http://social-bookmarking.seekxl.de/?add_url=$url&title=$description";
      break;
      case "newsider":
   		$newurl = "http://www.newsider.de/submit.php?url=$url";
   	break;
   	case "linksilo":
   		$newurl = "http://www.linksilo.de/index.php?area=bookmarks&func=bookmark_new&addurl=$url&addtitle=$description";
   	break;
   	case "readster":
   		$newurl = "http://www.readster.de/submit/?url=$url&title=$description";
   	break;
   	case "folkd":
   		$newurl = "http://www.folkd.com/submit/$url";
   	break;
   	case "yigg":
   		$newurl = "http://yigg.de/neu?exturl=$url";
   	break;
   	case "digg":
   		$newurl = "http://digg.com/submit?phase=2&url=$url&bodytext=&tags=&title=$description";
   	break;
   	case "del":
   		$newurl = "http://del.icio.us/post?v=2&url=$url&notes=&tags=&title=$description";
   	break;
   	case "reddit":
   		$newurl = "http://reddit.com/submit?url=$url&title=$description";
   	break;
   	case "simpy":
   		$newurl = "http://www.simpy.com/simpy/LinkAdd.do?title=$description&tags=&note=&href=$url";
   	break;
   	case "stumbleupon":
   		$newurl = "http://www.stumbleupon.com/submit?url=$url&title=$description";
   	break;
   	case "slashdot":
   		$newurl = "http://slashdot.org/bookmark.pl?url=$url&title=$description";
   	break;
   	case "netscape":
   		$newurl = "http://www.netscape.com/submit/?U=$url&T=$description";
   	break;
   	case "furl":
   		$newurl = "http://www.furl.net/storeIt.jsp?u=$url&keywords=&t=$description";
   	break;
   	case "yahoo":
   		$newurl = "http://myweb2.search.yahoo.com/myresults/bookmarklet?t=$description&d=&tag=&u=$url";
   	break;
   	case "spurl":
   		$newurl = "http://www.spurl.net/spurl.php?v=3&tags=&title=$description&url=$url";
   	break;
   	case "google":
   		$newurl = "http://www.google.com/bookmarks/mark?op=add&hl=de&bkmk=$url&annotation=&labels=&title=$description";
   	break;
   	case "blinklist":
   		$newurl = "http://www.blinklist.com/index.php?Action=Blink/addblink.php&Description=&Tag=&Url=$url&Title=$description";
   	break;
   	case "blogmarks":
   		$newurl = "http://blogmarks.net/my/new.php?mini=1&simple=1&url=$url&content=&public-tags=&title=$description";
   	break;
   	case "diigo":
   		$newurl = "http://www.diigo.com/post?url=$url&title=$description&tag=&comments=";
   	break;
   	case "technorati":
   		$newurl = "http://technorati.com/faves?add=$url&tag=";
   	break;
   	case "newsvine":
   		$newurl = "http://www.newsvine.com/_wine/save?popoff=1&u=$url&tags=&blurb=$description";
   	break;
   	case "blinkbits":
   		$newurl = "http://www.blinkbits.com/bookmarklets/save.php?v=1&title=$description&source_url=$url&source_image_url=&rss_feed_url=&rss_feed_url=&rss2member=&body=";
   	break;
   	case "magnolia":
   		$newurl = "http://ma.gnolia.com/bookmarklet/add?url=$url&title=$description&description=&tags=";
   	break;
   	case "smarking":
   		$newurl = "http://smarking.com/editbookmark/?url=$url&description=&tags=";
   	break;
   	case "netvouz":
   		$newurl = "http://www.netvouz.com/action/submitBookmark?url=$url&description=&tags=&title=$description";
   	break;
   	case "alltagz":
   	   $newurl = "http://www.alltagz.de/bookmarks/?action=add&address=$url&title=$description";
   	default:
   	   $newurl = "http://illarion.org";
      break;
   }

   // now we got the target and get rid of the user. Cya!
   header("Location: $newurl");
?>