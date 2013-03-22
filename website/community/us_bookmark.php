<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - Social Bookmarks",
                  "On this way you can add Illarion to one of your personal ".
                  "social bookmark services",
                  "social, bookmarks" );

$bookmarks = array
(
   array("Mr. Wong","wong"),
   array("Webnews", "webnews"),
   array("ICIO", "icio"),
   array("OneView", "oneview"),
   array("Link Arena", "linkarena"),
   array("News Kick", "newskick"),
   array("seekXL", "seekxl"),
   array("Newsider", "newsider"),
   array("Link Silo", "linksilo"),
   array("Readster", "readster"),
   array("FolkD", "folkd"),
   array("Yigg", "yigg"),
   array("Digg", "digg"),
   array("del.icio.us", "del"),
   array("Reddit", "reddit"),
   array("Simpy", "simpy"),
   array("Slash Dot", "slashdot"),
   array("Netscape", "netscape"),
   array("FURL", "furl"),
   array("Stumble upon", "stumbleupon"),
   array("Yahoo!", "yahoo"),
   array("Spurl", "spurl"),
   array("Google", "google"),
   array("Blinklist", "blinklist"),
   array("Blogmarks", "blogmarks"),
   array("Diigo", "diigo"),
   array("Technorati", "technorati"),
   array("News vine", "newsvine"),
   array("Blink Bits", "blinkbits"),
   array("Ma.Gnolia", "magnolia"),
   array("Smarking", "smarking"),
   array("Netvouz", "netvouz"),
   array("Alltagz", "alltagz")
)

?>

<h1 style="margin-left:10px;">Social Bookmarks</h1>

<table style="margin-left:10px;margin-right:10px;">
   <?php foreach( $bookmarks as $key=>$mark ) { ?>
   <?php echo ( $key%2 == 0 ? "<tr>" : "" ); ?>
      <td style="width:50px;text-align:right;">
         <a rel="nofollow" href="<?php echo $url; ?>/community/bookmark.php?target=<?php echo $mark[1]; ?>">
            <img src="<?php echo $url; ?>/community/social/<?php echo $mark[1]; ?>.gif" alt="Bookmark: <?php echo $mark[0]; ?>" />
         </a>
      </td>
      <td style="width:10px" />
      <td style="width:170px;text-align:left;">
         <a rel="nofollow" href="<?php echo $url; ?>/community/bookmark.php?target=<?php echo $mark[1]; ?>">
            <b><?php echo $mark[0]; ?></b>
         </a>
      </td>
      <?php echo ( $key%2 == 0 ? "<td />" : "" ); ?>
   <?php echo ( $key%2 == 1 ? "<tr>" : "" ); ?>
   <?php } ?>
</table>