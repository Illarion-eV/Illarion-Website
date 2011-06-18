<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - Gegenst&auml;nde",
                  "Grundlegende Gedanken zu den Gegenst&auml;nden des Online-Rollenspiels Illarion werden hier beschrieben.",
                  "Gegenst&auml;nde" );
   include_header();
   function InsertPicture($filename) {
      global $url;
	  list($w, $h) = getimagesize($url."images/".$filename);
	  echo "<img alt='itempic' src='images/".$filename."' style=\"width: ".$w."px; height: ".$h."px; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled=true, src='images/".$filename."', sizingMethod=scale)\" />";
  }
?>

<table class="center">
  <tr><td colspan="3"><h2 class="center">Schwerter</h2></td></tr>
  <tr>
   <td><? InsertPicture("dark_blade.png"); ?></td>
   <td>Dunkelklinge</td>
   <td>Eine Klinge aus geschw&auml;rztem Metall, wie sie von Dunkelelfen benutzt wird. Es w&uuml;rde schlie&szlig;lich st&ouml;ren, wenn die Waffe blitzt und funkelt, w&auml;hrend man sich im Dunkel der Nacht an seine Gegner anschleicht.</td>
  </tr>
  <tr>
   <td><? InsertPicture("fsword-3.png"); ?></td>
   <td>Feuer-Langschwert</td>
   <td>Ein Schwert, welches magisch mit der Kraft des elementaren Feuers verzaubert wurde.</td>
  </tr>
  <tr>
   <td><? InsertPicture("lightningswd-4.png"); ?></td>
   <td>Magisches Serinjah-Schwert</td>
   <td>Eine Klinge des Serinjah-Steppenvolkes, welche durch	elementare, magische Kraft verzaubert wurde. Blitze wie die eines Steppengewitters umzucken diese Klinge.</td>
  </tr>
  <tr>
   <td><? InsertPicture("longsword_magic1.png"); ?></td>
   <td>Magisches Langschwert</td>
   <td>Ein Schwert, welches magisch ver&auml;ndert wurde. Wie und zu welchem Zweck genau, wird man wohl selbst herausfinden oder einen Magier fragen m&uuml;ssen.</td>
  </tr>
  <tr>
   <td><? InsertPicture("longsword_pois1.png"); ?></td>
   <td>Vergiftetes Langschwert</td>
   <td>Dieses in den richtigen H&auml;nden durchaus sehr effektive Langschwert wurde &ndash; wie hinterh&auml;ltig ! Obendrein auch noch vergiftet.</td>
  </tr>
  <tr><td style="text-align:right;" colspan="3"><?php insert_go_to_top_link(); ?></td></tr>
  <tr><td colspan="3"><h2 class="center">&Auml;xte</h2></td></tr>
  <tr>
   <td><? InsertPicture("poison_axe.png") ?></td>
   <td>Vergiftete Henkersaxt</td>
   <td>Diese sehr schwere, allgemein als &bdquo;Henkersaxt&ldquo; bezeichnete Waffe &ndash; man verwendet sie in Albar und Gynk gerne f&uuml;r Hinrichtungen, und im Kampf damit auszuholen dauert einfach zu lange &ndash; wurde doch tats&auml;chlich vergiftet. Anscheinend reicht es nicht, einem Opfer den Kopf mit einem einzigen Hieb abzutrennen. Nein, um wirklich sicherzugehen, da&szlig; der Delinquent auch wirklich daran stirbt, mu&szlig; man die Waffe auch noch vergiften.</td>
  </tr>
  <tr>
   <td><? InsertPicture("round_axe_blue.png"); ?></td>
   <td>Magische Zwergenaxt</td>
   <td>Diese Axt nach eindeutig zwergischer Machart strahlt ein durchaus als magisch zu betrachtendes Leuchten aus. Jeder Zwerg wei&szlig; nat&uuml;rlich, da&szlig; Magie gemeingef&auml;hrlicher Firlefanz ist. Nein, diese Waffe wurde nat&uuml;rlich von Irmorom gesegnet!</td>
  </tr>
  <tr>
   <td><? InsertPicture("bat_axe.png"); ?></td>
   <td>Schwere Schlachtaxt</td>
   <td>Nur sehr starke Krieger f&uuml;hren eine solch schwere Waffe wirklich effektiv. Aber die, die es tun k&ouml;nnen, richten damit einen ganz ansehnlichen Schaden an. Jeder, der nicht wirklich sehr kr&auml;ftig ist, sollte jedoch die Finger davon lassen, denn ohne das dazugeh&ouml;rige Muskelschmalz dauert es etwa dreimal so lange, damit auszuholen, wie es dauern w&uuml;rde, wenn einem ein Goblin einen Knoten in die (zuvor herausgenommenen) Eingeweide macht.</td>
  </tr>
  <tr>
   <td><? InsertPicture("fire_axe2.png"); ?></td>
   <td>Riesige Feuer-Kriegsaxt</td>
   <td>Eine sehr gro&szlig;e Kriegsaxt, die zudem mit einer elementaren Feuer-Verzauberung belegt wurde. Schwer, aber &auml;u&szlig;erst t&ouml;dlich.</td>
  </tr>
  <tr>
   <td><? InsertPicture("ice_axe.png"); ?></td>
   <td>Magische Kriegsaxt</td>
   <td>Eine mittelgro&szlig;e Kriegsaxt, von der ein eindeutig magisches Leuchten ausgeht. Sehr beeindruckend.</td>
  </tr>
  <tr><td style="text-align:right;" colspan="3"><?php insert_go_to_top_link(); ?></td></tr>
  <tr><td colspan="3"><h2 class="center">Dolche &amp; andere Stichwaffen</h2></td></tr>
  <tr>
   <td><? InsertPicture("sabre3.png"); ?></td>
   <td>Degen</td>
   <td>in eleganter Degen, auch Rapier genannt. Diese schnelle und leichte Waffe wird gerne von Seeleuten oder Piraten verwendet.</td>
  </tr>
  <tr>
   <td><? InsertPicture("sml_mag_dagger.png"); ?></td>
   <td>Roter Feuerdolch</td>
   <td>Eine kurze Sto&szlig;klinge, die mit der elementaren Kraft des Feuers bezaubert wurde.Allerdings v&ouml;llig ungeeignet, um sich damit im Schatten an jemanden anzuschleichen. Sie eignet sich wohl eher als Not-Waffe eines Kriegers oder eines Orks des Flammenordens.</td>
  </tr>
  <tr>
   <td><? InsertPicture("dagger_blue_glow.png"); ?></td>
   <td>Magischer Dolch</td>
   <td>Dieser Dolch ist von einem magischen Leuchten umgeben.</td>
  </tr>
  <tr>
   <td><? InsertPicture("dagger_glow.png"); ?></td>
   <td>Giftiger Dolch</td>
   <td>Ein vergifteter Dolch, der vermutlich viele Anh&auml;nger bei  Meuchelm&ouml;rdern, Assassinen oder den Schwiegerm&uuml;ttern intrigierender albarischer Adeliger findet.</td>
  </tr>
  <tr><td style="text-align:right;" colspan="3"><?php insert_go_to_top_link(); ?></td></tr>
  <tr><td colspan="3"><h2 class="center">Fernwaffen</h2></td></tr>
  <tr>
   <td><? InsertPicture("dark_spiked_bow.png"); ?></td>
   <td>Drow-Bogen</td>
   <td>Ein Bogen, von dem ein magisches Leuchten ausgeht. Der Name &bdquo;Drow-Bogen&ldquo; hat sich wohl irgendwie eingeb&uuml;rgert, denn im Dunkeln eine Waffe vor sich zu halten, die selbst leuchtet, erschwert das Zielen bekanntlicherweise ungemein &ndash; ganz besonders, wenn man wie ein Drow, sehr lichtempfindliche Augen hat. Vielleicht gibt es auch einfach einen anderen Grund f&uuml;r das Leuchten, oder ein Magier hat ihn einfach verzaubert.</td>
  </tr>
  <tr>
   <td><? InsertPicture("drow_bow.png"); ?></td>
   <td>Ebenholzbogen</td>
   <td>Dieser Langbogen nach Elben-Machart wurde kunstvoll aus einem teuren Holz gefertigt und mit einem Zauber belegt.</td>
  </tr>
  <tr>
   <td><? InsertPicture("longbow1.png"); ?></td>
   <td>Langbogen</td>
   <td>Ein normaler, auf gro&szlig;e Reichweite sehr effektiver Langbogen.</td>
  </tr>
  <tr>
   <td><? InsertPicture("recurvebow2.png"); ?></td>
   <td>Reiterbogen</td>
   <td>Ein verzauberter Bogen des Serinjah-Steppenvolkes. Diese B&ouml;gen werden oft von Reitern benutzt &ndash; die Serinjah sind daf&uuml;r bekannt, ihre relativ kleinen, aber sehr wendigen braun-wei&szlig;en Steppenpferde auch freih&auml;ndig lenken zu k&ouml;nnen.</td>
  </tr>
  <tr>
   <td><? InsertPicture("arrow_wind.png"); ?></td>
   <td>Windpfeile</td>
   <td>Diese Pfeile wurden durch eine magische Substanz verst&auml;rkt &ndash; die elementare Kraft des Windes schlummert in ihren Federn.</td>
  </tr>
  <tr><td style="text-align:right;" colspan="3"><?php insert_go_to_top_link(); ?></td></tr>
  <tr><td colspan="3"><h2 class="center">Kn&uuml;ppel, St&auml;be &amp; andere Schlagwaffen</h2></td></tr>
  <tr>
   <td><? InsertPicture("morningstar.png"); ?></td>
   <td>Morgenstern</td>
   <td>Eine Spitzenbesetzte Metallkugel an einer Kette. Diese Waffe wurde daf&uuml;r entwickelt, um im Nahkampf um einen Schild herum schlagen zu k&ouml;nnen. Dieses erfordert jedoch ge&uuml;btes K&ouml;nnen, und im Kampf gegen einzelne, schnelle Klingen ist man damit im Nachteil.</td>
  </tr>
  <tr>
   <td><? InsertPicture("mace_1.png"); ?></td>
   <td>Streitkolben</td>
   <td>Dieser gew&ouml;hnliche Streitkolben mit Stahlkopf eignet sich hervorragend, um im Kampf gegen Gegner in Kettenr&uuml;stungen effektiv zu bestehen.</td>
  </tr>
  <tr>
   <td><? InsertPicture("i_2785.png"); ?></td>
   <td>Stab des Windes</td>
   <td>Ein Stab, in dem die elementare Kraft des Windes schlummert. Ein Magier wei&szlig; vermutlich, wie man ihn einsetzt.</td>
  </tr>
  <tr>
   <td><? InsertPicture("i_2783.png"); ?></td>
   <td>Stab des Feuers</td>
   <td>Der funkelnde Stein an der Spitze dieses Stabes k&ouml;nnte auch ein einfacher Rubin sein. Du wei&szlig;t es jedoch besser, als den mit elementarem Feuer verzauberten Stab eines Magiers anzufassen...</td>
  </tr>
  <tr>
   <td><? InsertPicture("i_2782.png"); ?></td>
   <td>Stab der Erde</td>
   <td>Ein Stab, dessen Schaft die Symbole der elementaren Kraft der Erde tr&auml;gt. Wenn man kein Magier ist, sollte man besser die Finger davonlassen.</td>
  </tr>
  <tr><td style="text-align:right;" colspan="3"><?php insert_go_to_top_link(); ?></td></tr>
  <tr><td colspan="3"><h2 class="center">R&uuml;stungen</h2></td></tr>
  <tr>
   <td><? InsertPicture("salkamaerian_officer_armor.png"); ?></td>
   <td>Salkamaerische Offiziersr&uuml;stung</td>
   <td>Ein schwerer, stark verzierter Plattenharnisch, wie ihn die Offiziere und Paladine Salkamars tragen.</td>
  </tr>
  <tr>
   <td><? InsertPicture("albarian_noble_armor.png"); ?></td>
   <td>Albarische Adeligenr&uuml;stung</td>
   <td>Nicht ganz so verziert wie das Salkamaerische Gegenst&uuml;ck, ist dieser schwere Plattenharnisch in albarischem Stil die Art von R&uuml;stung, die ein albarischer Adeliger oder Kommandeur auf dem Schlachtfeld tragen w&uuml;rde.</td>
  </tr>
  <tr>
   <td><? InsertPicture("albarian_steel_plate.png"); ?></td>
   <td>Albarischer Stahlharnisch</td>
   <td>Ein Stahlharnisch, wie ihn ein albarischer Ritter niederen Ranges ohne Adel oder leibeigener Elitek&auml;mpfer (Was eigentlich fast auf dasselbe herauskommt) tragen w&uuml;rde.</td>
  </tr>
  <tr>
   <td><? InsertPicture("dwarf_armor.png"); ?></td>
   <td>Zwergen-Prunkr&uuml;stung</td>
   <td>Ein &uuml;berschwerer Stahlharnisch, der &uuml;ber und &uuml;ber mit Gold verziert ist. Aufgrund der beinahe quadratischen Bauform wird jemand ohne den K&ouml;rperbau eines Zwergen wohl kaum hineinpassen &ndash; f&uuml;r Zwerge jedoch ist dieses Schwergewicht die Krone der zwergischen R&uuml;stungsbaukunst &ndash; eine prunkvolle Festung auf zwei kurzen Beinen.</td>
  </tr>
  <tr>
   <td><? InsertPicture("drowarmor.png"); ?></td>
   <td>Dunkelelfenr&uuml;stung</td>
   <td>Eine geschw&auml;rzte R&uuml;stung, mit einigen magischen Runenversehen, ohne da&szlig; jedoch ein elementarer Effekt erkennbar w&auml;re. Die furchterregend anmutende Bauweise scheint etwas unpraktisch, jedoch dienen die grausam aussehenden Schulterklingen wohl dazu, Enthauptungen vorzubeugen und den Gegner einzusch&uuml;chtern. Da Dunkelelben den G&ouml;ttern abgeschworen haben und daf&uuml;r verflucht wurden, ist es vermutlich ziemlich unratsam, dieses Ding anzuziehen.</td>
  </tr>
  <tr><td style="text-align:right;" colspan="3"><?php insert_go_to_top_link(); ?></td></tr>
  <tr><td colspan="3"><h2 class="center">Helme &amp; anderes R&uuml;stzeug</h2></td></tr>
  <tr>
   <td><? InsertPicture("chainlegs.png"); ?></td>
   <td>Kettenhose</td>
   <td>Eine Hose aus vielen m&uuml;hselig zusammengef&uuml;gten Kettengliedern.</td>
  </tr>
  <tr>
   <td><? InsertPicture("2441.png"); ?></td>
   <td>Sturmhaube</td>
   <td>Ein Helm, wie er von Salkamaerischen Legion&auml;rssoldaten getragen wird. Diese bekommen noch w&auml;hrend ihrer mehrj&auml;hrigen Milit&auml;rausbildung eine uniformierte R&uuml;stung zugeteilt, im Gegensatz zum gemeinen albarischen Fu&szlig;volk, welches sich &uuml;blicherweise aus Leibeigenen rekrutiert, denen man einen Sauspie&szlig; in die Hand gedr&uuml;ckt hat.</td>
  </tr>
  <tr>
   <td><? InsertPicture("2302.png"); ?></td>
   <td>Gynkesischer S&ouml;ldnerhelm</td>
   <td>Ein Helm nach der Machart, wie ihn gynkesische S&ouml;ldner tragen. Diese bevorzugen ein Stabiles Gitter als Gesichtsschutz, welches die Sicht nicht allzustark behindert.</td>
  </tr>
  <tr>
   <td><? InsertPicture("2291.png"); ?></td>
   <td>Salkamaerischer Paladinhelm</td>
   <td>Dies ist ein schwerer, verzierter Plattenhelm nach der Machart, wie ihn die Paladine Salkamars tragen.</td>
  </tr>
  <tr>
   <td><? InsertPicture("shield_red.png"); ?></td>
   <td>Mosaikschild</td>
   <td>Ein mittelschwerer Schild, dessen Oberfl&auml;che aus mosaikartig ineinandergef&uuml;gten Metallplatten besteht. Die kleinen Platten &uuml;berlappen sich nach au&szlig;en hin, so da&szlig; Hiebe von Klingenwaffen eher nach au&szlig;en abgeleitet werden, als gegen Gesicht oder Beine des Tr&auml;gers zu rutschen.</td>
  </tr>
  <tr><td style="text-align:right;" colspan="3"><?php insert_go_to_top_link(); ?></td></tr>
  <tr><td colspan="3"><h2 class="center">Kleidung &amp; Accesoires</h2></td></tr>
  <tr>
   <td><? InsertPicture("schlapphutbraun.png"); ?></td>
   <td>Schlapphut</td>
   <td>Ein bequemer, Filzartiger Hut welcher, wenn mit Fett, &Ouml;l oder Wachs behandelt, sehr guten Regen- und Sonnenschutz bietet.</td>
  </tr>
  <tr>
   <td><? InsertPicture("cloak_black.png"); ?></td>
   <td>Schwarzkult-Robe</td>
   <td>Roben dieser Art werden von Schwarzkultisten getragen &ndash; &uuml;blicherweise von Anh&auml;ngern der gef&auml;hrlichen und in allen Kulturen Illarions verbotenen Kulte von Bjolmur und Cherass. W&auml;hrend Drargorog-Kultisten eher schwarze, mit Schuppen und H&ouml;rnern besetzte R&uuml;stungen tragen, bevorzugen Moshran-Anh&auml;nger eher blutverschmierte Symbole des Krieges, des T&ouml;tens, der St&auml;rke und des Triumphes.</td>
  </tr>
  <tr>
   <td><? InsertPicture("kleid.png"); ?></td>
   <td>Blaues Kleid</td>
   <td>Ein einfaches, jedoch elegantes Kleid in traditionellem Blau.</td>
  </tr>
  <tr>
   <td><? InsertPicture("icebirdamulet.png"); ?></td>
   <td>Eisvogel-Amulett</td>
   <td>Ein kleiner, eisblauer Vogel aus hellem Blaustein, an einer Kette befestigt. Magier erinnert er an eine Rune.</td>
  </tr>
  <tr>
   <td><? InsertPicture("cloak_white2.png"); ?></td>
   <td>Wei&szlig;e Priesterrobe</td>
   <td>Eine schwere, stark verzierte und bestickte Robe, wie sie oft von Priestern getragen wird.</td>
  </tr>
  <tr><td style="text-align:right;" colspan="3"><?php insert_go_to_top_link(); ?></td></tr>
  <tr><td colspan="3"><h2 class="center">Nahrung</h2></td></tr>
  <tr>
   <td><? InsertPicture("apfeltorte.png"); ?></td>
   <td>Apfeltorte</td>
   <td>Ein sehr leckerer Kuchen, der sich perfekt dazu eignet, seinen Liebsten zu bezirzen.</td>
  </tr>
  <tr>
   <td><? InsertPicture("dish_rabbit.png"); ?></td>
   <td>Hasen-Schlachtplatte</td>
   <td>Eine feine Zusammenstellung aus frischen Kr&auml;utern und Hasenfleisch.</td>
  </tr>
  <tr>
   <td><? InsertPicture("brot.png"); ?></td>
   <td>Brot</td>
   <td>Die perfekte Erg&auml;nzung f&uuml;r nahezu jedes Mal.</td>
  </tr>
  <tr>
   <td><? InsertPicture("dish_steak.png"); ?></td>
   <td>Steak</td>
   <td>Ein gut gebratenes Steak vom besten Fleisch der Kuh.</td>
  </tr>
  <tr>
   <td><? InsertPicture("glas_wine.png"); ?></td>
   <td>Wein</td>
   <td>Passt perfekt in romantische Abende und zu deftigen Fleischgerichten.</td>
  </tr>
  <tr><td style="text-align:right;" colspan="3"><?php insert_go_to_top_link(); ?></td></tr>
  <tr><td colspan="3"><h2 class="center">Werkzeug</h2></td></tr>
  <tr>
   <td><? InsertPicture("pickaxe1.png"); ?></td>
   <td>Spitzhacke</td>
   <td>Jeder der Kohle, Edelsteine, Eisen oder andere Rohstoffe abbauen will, sollte eine besitzen.</td>
  </tr>
  <tr>
   <td><? InsertPicture("pincers_crucible.png"); ?></td>
   <td>Tiegeltanze</td>
   <td>Diese Zange braucht man, um geschmolzenes Eisen aus der Esse zu holen.</td>
  </tr>
  <tr>
   <td><? InsertPicture("plane.png"); ?></td>
   <td>Hobel</td>
   <td>Ein gutes Werkzeug, um Holz zu bearbeiten.</td>
  </tr>
  <tr>
   <td><? InsertPicture("schaufel.png"); ?></td>
   <td>Schaufel</td>
   <td>Kein Glasbl&auml;ser kann darauf verzichten - Man braucht sie um Quarzsand zu schaufeln.</td>
  </tr>
  <tr>
   <td><? InsertPicture("scissors.png"); ?></td>
   <td>Schere</td>
   <td>Mit diesem Werkzeug l&auml;sst sich jeder Stoff auf die richtige Gr&ouml;&szlig;e zurechtschneiden. Auch Schafe kann man damit effektiv scheren, wenn sie nicht weglaufen.</td>
  </tr>
  <tr><td style="text-align:right;" colspan="3"><?php insert_go_to_top_link(); ?></td></tr>
  <tr><td colspan="3"><h2 class="center">Tr&auml;nke &amp; Mixturen</h2></td></tr>
  <tr>
   <td><? InsertPicture("bottle_full1.png"); ?></td>
   <td>Volle Flasche</td>
   <td>Eine Glasflasche mit praktischem Tragekorb &ndash; vermutlich bis zum Rand mit Rum oder leckerem, starkem Zwergenbier gef&uuml;llt.</td>
  </tr>
  <tr>
   <td><? InsertPicture("brownpotion.png"); ?></td>
   <td>Sattmacher</td>
   <td>Dieser von Alchemisten gebraute Trunk enth&auml;lt viele N&auml;hrstoffe. Durch Kr&auml;utermagie auch noch unterst&uuml;tzt, kann er Nahrungsmittel ersetzen. Allerdings w&auml;re das &uuml;ber l&auml;ngere Zeit hinweg bestimmt ungesund, und zudem ziemlich teuer.</td>
  </tr>
  <tr>
   <td><? InsertPicture("manapotion.png"); ?></td>
   <td>Manatrank</td>
   <td>Ein starkes, magisches Ges&ouml;ff, um die mystische Energie, welche von Magiern &bdquo;Mana&ldquo; genannt wird, schnell wiederaufzuf&uuml;llen.</td>
  </tr>
  <tr>
   <td><? InsertPicture("poisonpotion.png"); ?></td>
   <td>Gelber Trank</td>
   <td>Eine Flasche mit gelbem Zeug. Es k&ouml;nnte sich um Wein handeln, den jemand ungeb&uuml;hrlich in eine Trankflasche gesch&uuml;ttet hat &ndash; oder um wer wei&szlig; was anderes!</td>
  </tr>
  <tr>
   <td><? InsertPicture("potion4_black.png"); ?></td>
   <td>Leere Flasche</td>
   <td>Diese Trankflasche ist &ndash; wer h&auml;tte das gedacht! V&ouml;llig leer. Ein Alchimist oder Druide k&ouml;nnte sie bestimmt gut gebrauchen.</td>
  </tr>
  <tr><td style="text-align:right;" colspan="3"><?php insert_go_to_top_link(); ?></td></tr>
  <tr><td colspan="3"><h2 class="center">Kr&auml;uter &amp; Pflanzen</h2></td></tr>
  <tr>
   <td><? InsertPicture("hops.png"); ?></td>
   <td>Hopfen</td>
   <td>Unverzichtbar f&uuml;r die Met- und Bierherstellung.</td>
  </tr>
  <tr>
   <td><? InsertPicture("pflanze20.png"); ?></td>
   <td>Lebenswurz</td>
   <td>Eine symbiotische Wurzelpflanze, die man zwischen den Wurzeln gef&auml;llter B&auml;ume finden kann. Manche sagen sogar, es sei die Lebenswurzel eines Baumes, die mit purer Lebenskraft gef&uuml;llt sei. Andere sagen, wenn man sie eingr&auml;bt, wachse daraus wieder derselbe Baum.</td>
  </tr>
  <tr>
   <td><? InsertPicture("pflanze19.png"); ?></td>
   <td>Erdbeeren</td>
   <td>Sehr lecker und s&uuml;&szlig; - ein verf&uuml;hrerischer Angblick f&uuml;r jedes Schleckermaul.</td>
  </tr>
  <tr>
   <td><? InsertPicture("pflanze10.png"); ?></td>
   <td>Sandbeere</td>
   <td>Man findet sie in den verschiedenen W&uuml;sten Gobiaths. Sie w&auml;chst an Hecken und Str&auml;uchern</td>
  </tr>
  <tr>
   <td><? InsertPicture("pflanze04.png"); ?></td>
   <td>Wutbeere</td>
   <td>Diese Beere braucht man, um den geheimnisvollen Windtrank brauen zu k&ouml;nnen.</td>
  </tr>
  <tr><td style="text-align:right;" colspan="3"><?php insert_go_to_top_link(); ?></td></tr>
</table>

<?php include_footer(); ?>
