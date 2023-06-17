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
   <h2>Das Volk der Menschen</h2>
   <?php cap("M"); ?>
   <p>enschen sind von allen V&ouml;lkern am einfachsten zu spielen. Das ist kein Wunder, sind wir doch selbst welche � du brauchst 
   dich also nicht so kompliziert in die Denkweise eines anderen Volkes hineinzuversetzen wie zum Beispiel in die Denkweise 
   eines Echsenmenschen der gar die Jahrhunderte &uuml;berspannende Denkweise eines Elfen.</p>
   <p>Dennoch gibt es unter den Menschenv&ouml;lkern Unterschiede. Die folgenden Links enthalten kurze Beschreibungen der Menschenv&ouml;lker
   und ihrer Ansichten &uuml;ber andere V&ouml;lker. Du solltest dich das Volk entscheiden, dessen Ansichten dir am meisten Spa&szlig; machen.</p>
   <p>Die Attributswerte sowie St&auml;rken und Schw&auml;chen dieser V&ouml;lker sind v&ouml;llig identisch � diese Entscheidung ist also rein RP-technisch. 
   In den V&ouml;lkerbeschreibungen und den Religionsbeschreibungen der V&ouml;lker findest du noch mehr Details und Anregungen.</p>
   <p class="center"><a href="de_rpguide_human1.php">Norodaji</a> - <a href="de_rpguide_human2.php">Serinjah</a> - <a href="de_rpguide_human3.php">Ama-Shoon</a>
   - <a href="de_rpguide_human4.php">Salkamaerier</a> - <a href="de_rpguide_human5.php">Albarier</a> - <a href="de_rpguide_human6.php">Gynkesen</a></p>
   
   <?php insert_go_to_top_link(); ?>
   
<?php include_footer(); ?>