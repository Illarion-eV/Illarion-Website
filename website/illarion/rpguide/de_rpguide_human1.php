<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - Hintergrund - Client",
                  "RP Guide Illarions",
                  "RP, Rollenspiel, Hilfe" );
   include_header();
?>

   <h2>Rollenspiel Hilfe</h2>
   <ul>
      <li><a href="de_rpguide_human.php">Menschen</a></li>
	  <ul>
	   <li><a href="de_rpguide_human1.php">Norodaji</a></li>
	   <li><a href="de_rpguide_human2.php">Serinjah</a></li>
	   <li><a href="de_rpguide_human3.php">Ama-Shoon</a></li>
	   <li><a href="de_rpguide_human4.php">Salkamaerier</a></li>
	   <li><a href="de_rpguide_human5.php">Albarier</a></li>
	   <li><a href="de_rpguide_human6.php">Gynkesen</a></li>
	  </ul>
      <li>Elfen (bald verf&uuml;gbar)</li>
      <li>Halblinge (bald verf&uuml;gbar)</li>
      <li>Zwerge (bald verf&uuml;gbar)</li>
      <li>Orks (bald verf&uuml;gbar)</li>
      <li>Echsenmenschen (bald verf&uuml;gbar)</li>
      <li>Gnome (bald verf&uuml;gbar)</li>
      <li>Feen (bald verf&uuml;gbar)</li>
      <li>Goblins (bald verf&uuml;gbar)</li>
   </ul>
   <br />
   <h2>Das Barbarenvolk der Norodaji</h2>
   <?php cap("N"); ?>
   <p>orodaji leben in n&ouml;rdlichen, kalten Regionen des bekannten Kontinents. Das oftmals sehr harte, eisige Klima sorgt daf&uuml;r, 
   dass sie normalerweise warme Kleidung aus rauer Wolle, Leder oder Pelzen tragen. Die M&auml;nner tragen B&auml;rte. Im Kampf 
   beforzugen sie &Auml;xte und schwere Waffen. Norodaji haben f&uuml;r gew&ouml;hnlich keine dunklen Haare und sind ein wenig st&auml;rker als 
   die normalen Menschen. Meist haben sie gr&uuml;ne, blaue, graue und manchmal auch braune Augen. Ihre Haut ist meistens sehr hell, 
   fast wei&szlig; und manchmal ein wenig br&auml;unlich. M&auml;nner und Frauen sind in der Gesellschaft gleichgestellt.</p>
   
   <a class="hidden" style="text-decoration:underline;">Soziale Struktur:</a> Familien-Klans, keine K&ouml;nige oder Adelige.<br />
   <a style="text-decoration:underline;">Religion:</a> Tanora, Malachin, Irmorom, Zhambra<br />
   <a style="text-decoration:underline;">Meinungen zu den anderen Menschenv&ouml;lkern</a>
   <ul>
     <li>Serinjah sind ein wenig komisch</li>
     <li>Salkamaerier und Albarier sind einfache Leute mit zu gro&szlig;em Sinn f&uuml;r Autorit&auml;t</li>
     <li>Gynkesen sind haarlose Schlangen denen man nicht vertrauen kann</li>
   </ul>

   <a style="text-decoration:underline;">Meinungen zu den Elfen:</a> Gef&auml;rhlich und voll von magischer Kraft, bleibt weg von ihnen!<br />
   <a style="text-decoration:underline;">Meinungen zu den Halblingen:</a> Klein und Schwach <br />
   <a style="text-decoration:underline;">Meinungen zu den Zwergen:</a> Sie k&ouml;nnen saufen, sind gute H&auml;ndler und ehrenhafte Freunde.<br />
   <a style="text-decoration:underline;">Meinungen zu den Orks:</a> Stinken und sollten get&ouml;tet werden.<br />
   <a style="text-decoration:underline;">Meinungen zu den Echsen:</a> Ich wusste nicht, dass sie wirklich existieren!<br />
   <a style="text-decoration:underline;">Meinungen zu den Gnomen:</a> Komisch, ich wei&szlig; nicht was ich von ihnen halten soll.<br />
   <a style="text-decoration:underline;">Meinungen zu den Feen:</a> Schmal, aber genau wie die Elfen! Halte dich blos fern von ihnen!<br />
   <a style="text-decoration:underline;">Meinungen zu den Goblins:</a> Schw&auml;cher als Orks, einfacher zu zerquetschen aber verdammt laut.<br />
   
   <?php insert_go_to_top_link(); ?>
   
<?php include_footer(); ?>