<?
    include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
    create_header( "Illarion - Items",
                   "Auf dieser Seite findest du einige Items die es in Illarion gibt.",
                   "Items, Spiel, Grafiken" );
    include_header();

    $i = 0;
    $content = "";
    $overview = "";

    $page = ( isset( $_GET['page'] ) ? $_GET['page'] : 1 );

   AddHeadline("Waffen");
   AddItem(2675,"Degen","Ein flinker, leichter Degen. Sieht spitz aus. Dinge wie diese Klinge m&ouml;chte man eigentlich nicht aus seinem Hintern ziehen m&uuml;ssen.");
   AddItem(1,"Serinjahschwert","Ein handliches Schwert, dem Design der legend&auml;ren Klingen der Serinjah-St&auml;mme nachempfunden.");
   AddItem(78,"Machete","Eignet sich hervorragend, um sich durch Zweige, Bl&auml;tter oder Gliedma&szlig;en einen Weg zu bahnen.");
   AddItem(25,"S&auml;bel","Ein S&auml;bel, wie ihn Seeleute und Piraten benutzen. Hisst die Segel, ihr lauszerfressenen Seehunde! Arrrr !");
   AddItem(2694,"vergiftetes Serinjah-Schwert","Da ist ja Gift auf der Klinge - wie gemein !");
   AddItem(2693,"magisches Serinjah-schwert","Eine magisch verzauberte Klinge.");
   AddItem(206,"Feuer-Langschwert","Diese Klinge wurde mit der elementaren Macht des Feuers verzaubert.");
   AddItem(2655,"vergiftetes Breitschwert","Klingen zu vergiften ist ziemlich gemein.");
   AddItem(2658,"Breitschwert","Ein simples, praktisches Breitschwert.");
   AddItem(2654,"magisches Breitschwert","Ein Breitschwert, das wohl mal ein Magier in den Fingern hatte.");
   AddItem(2656,"Feuerbreitschwert","Ein magisch verzaubertes Breitschwert. Sieht hei&szlig; aus und ersetzt wohl so jede Fackel.");
   AddItem(2731,"Zweih&auml;nder","Ein gro&szlig;es, zweih&auml;ndiges Schwert. H&uuml;bsch !");
   AddItem(2740,"roter Dolch","Ein verzierter, roter Dolch.");
   AddItem(27,"einfacher Dolch","Gut zum Brot schneiden, Briefe &ouml;ffnen oder Kehlen durchschneiden.");
   AddItem(190,"verzierter Dolch","Ein h&uuml;bscher verzierter Dolch.");
   AddItem(2668,"vergifteter einfacher Dolch","Ein schlichter Dolch, auf den jemand Gift geschmiert hat.");
   AddItem(2671,"magischer Dolch","Ein magisch aussehender Dolch.");
   AddItem(2742,"roter Feuerdolch","Ein roter Dolch mit magisch verzauberter Klinge.");
   AddItem(2689,"Wurfdolch","Diese kann man gut im &Auml;rmel verstecken und als kleine, gemeine šberraschung einsetzen.");
   AddItem(2672,"giftiger Dolch","Ein Dolch mit vergifteter Klinge.");
   AddItem(189,"Dolch","Ein Dolch, der sich f&uuml;r alles m&ouml;gliche eignet.");
   AddItem(91,"Malachindolch","In diesen Dolch ist ein Falke, das heilige Symbol Mallachins, eingraviert.");
   AddItem(2645,"Wurfbeil","Tut ziemlich weh, wenn eines davon zwischen beiden Augen steckt.");
   AddItem(2723,"Henkersaxt","Diese Axt ist so schwer, da&szlig; man bewegliche Ziele damit schwer trifft. Macht aber nix, da Delinquenten &uuml;blicherweise eh gut gefesselt sind.");
   AddItem(2629,"leichte Schlachtaxt","Eine handliche Axt. Nat&uuml;rlich nur, wenn man noch H&auml;nde hat.");
   AddItem(383,"Kriegsaxt","Ausholen, zuschlagen, ab ist der Kopf. Wenn man damit umgehen kann, k&ouml;nnte der Eigene sogar auf den Schultern bleiben.");
   AddItem(2725,"vergiftete Henkersaxt","Wenn der Kopf ab ist, mu&szlig; man trotzdem sichergehen, da&szlig; die Wunde t&ouml;dlich ist.");
   AddItem(2626,"magische Kriegsaxt","Diese Axt sieht aus, als habe ein Magier irgendetwas damit angestellt. Du bist dir nicht sicher was.");
   AddItem(88,"Langaxt","Etwas k&uuml;rzer als eine Hellebarde und schwerer.");
   AddItem(2627,"Feuer-Kriegsaxt","Ein ziemlich hei&szlig;es Ding.");
   AddItem(2635,"vergiftete Halblingsaxt","Jemandem den Kopf abzuhacken macht nat&uuml;rlich erst dann Sinn, wenn der Gegner an der Wunde auch stirbt.");
   AddItem(2636,"vergiftete Doppelaxt","Beide Klingenseiten dieser Axt wurden ordentlich mit Gift beschmiert.");
   AddItem(205 ,"Doppelaxt"," Du bist nicht sicher, warum man es \"Doppelaxt\" nennt, aber es ist zu schwer um es einh&auml;ndig zu f&uuml;hren. ");
   AddItem(2642,"Orkaxt","Dieses grobschl&auml;chtige Ding wird gerne von Orks in die Eingeweide von Monstern oder anderen Leuten gesteckt.");
   AddItem(2660,"Zwergenaxt","Eine Axt nach Zwergenmachart.");
   AddItem(2641,"riesige Kriegsaxt","Eine verdammt gro&szlig;e Kriegsaxt. Davon m&ouml;chtest du lieber nicht in zwei Teile gehauen werden.");
   AddItem(2662,"magische Zwergenaxt","Zwerge m&ouml;gen zwar keine Magie, aber an dieser Axt hat eindeutig ein Magier herumgefummelt.");
   AddItem(2640,"riesige Feuer-Kriegsaxt","Wenn man hiermit einen Goblin entzweit, sind vermutlich beide Teile gar.");
   AddItem(207,"Kampfstab","Dieser Stab hat einen eisernen Knauf am oberen Ende und eine kleine eiserne Spitze am unteren Ende.");
   AddItem(208,"verzierter Magierstab","Ein h&uuml;bsch verzierter Stab, der wohl einem Magier geh&ouml;rt.");
   AddItem(209,"Elben-Magierstab","Ein aufwendig geschnitzter, kostbarer Magierstab, auf Elben-Art hergestellt.");
   AddItem(323,"Magierstab","Sieht aus wie der Stab eines Magiers. Besser nicht damit herumspielen.");
   AddItem(39,"Sch&auml;delstab","Der geschnitzte Sch&auml;del am Ende dieses Stabes sieht aus als k&ouml;nne er sich auch als Keule eignen.");
   AddItem(40,"Priesterstecken","St&auml;be wie diese werden gerne von Priestern verwendet.");
   AddItem(57,"einfacher Magierstab","Ein Magierstab. Wenn der, der ihn in der Hand hat, eine Robe tr&auml;gt und damit auf dich zeigt, solltest du rennen.");
   AddItem(76,"Magierstab","Ein Magierstab. N&uuml;tzlich, wenn man wei&szlig;, wie man damit umgeht.");
   AddItem(77,"Hellebarde","Eine imposante Stangenwaffe.");
   AddItem(2664,"Keule","Ein ziemlich &uuml;berzeugendes h&ouml;lzernes Argument.");
   AddItem(231,"Morgenstern","Schwer zu blocken, wenn man sich nicht selbst damit trifft.");
   AddItem(2737,"Morgenstern","Es ist ein Morgenstern. Wenn einer auf dich trifft wird es Nacht und die Sterne funkeln.");
   AddItem(226,"Kriegshammer","Die Bedienungsanleitung sagt : Ausholen, zuschlagen, aufwischen.");
   AddItem(230,"Streitkolben","Das Richtige Werkzeug, um ein paar alte Knochen zu zerschlagen.");
   AddItem(2646,"Serinjah-Reiterbogen","Viele Kurzb&ouml;gen wie diese werden von den Serinjah hergestellt, welche als ein Volk von J&auml;gern und Reitern bekannt sind.");
   AddItem(2685,"Elben Kurzbogen","Da&szlig; Elben Kurzb&ouml;gen statt Langb&ouml;gen einsetzen ist zwar recht selten, aber dieser hier sieht trotzdem aus als ob er von Elben gemacht wurde.");
   AddItem(2727,"Feuer-Jagdbogen","Ein Jagdbogen wurde mit elementarem Feuer verzaubert. So mu&szlig; man die Pfeile nicht mehr einzeln anz&uuml;nden.");
   AddItem(2739,"magischer Eisbogen","Ein Bogen, der mit Elementarmagie verzaubert wurde. Cool.");
   AddItem(65,"Kurzbogen","Ein praktischer, preiswerter Kurzbogen.");
   AddItem(70,"Armbrust","Es dauert eine ganze Weile, dieses Ding nachzuladen, aber daf&uuml;r tut so ein Bolzen schon ziemlich weh.");
   AddItem(293,"Wurfspeer","Zielen, werfen, aus dem toten kalten K&ouml;rper eines Monsters ziehen und Sch&auml;tze einsammeln. Klingt eigentlich nach einem einfachen Plan.");
   AddItem(294,"Wurfstern","Dies ist die fiese fliegende šberraschung aus deinem &Auml;rmel.");
   AddItem(322,"Windpfeile","Pfeile, die mit einer Magischen Salbe behandelt wurden, fliegen einfach besser.");
   AddItem(89,"Schleuder","Damit kannst du kleine Steine oder Kugeln verschie&szlig;en, wenn du dich nicht selbst damit triffst.");
   AddHeadline( "R&uuml;stungen und Schilde");
   AddItem(184,"Visierhelm","Ein Helm, wie ihn Ritter gern tragen.");
   AddItem(185,"schwarzer Visierhelm","Ein Helm, wie ihn schwarze Ritter gern tragen.");
   AddItem(187,"Stahlhut","Ein Helm, wie ihn W&auml;chter in Albar oft tragen.");
   AddItem(202,"Stahlkappe","Ein schlichter, stabiler Helm.");
   AddItem(324,"Kettenhelm","Eine Kettenhaube aus vielen kleinen Ringen.");
   AddItem(94,"Topfhelm","Helme wie diese werden oft von Rittern getragen.");
   AddItem(101,"Kettenhemd","Eine mittelschwere, flexible R&uuml;stung. Die Herstellung ist ziemlich aufwendig.");
   AddItem(362,"volle Lederr&uuml;stung","Eine Lederr&uuml;stung, die den gesamten Oberk&ouml;rper und die arme sch&uuml;tzt. Das Leder wurde mit hei&szlig;em Wachs getr&auml;nkt oder mit Knochenleim geh&auml;rtet. Ziemlich stabil.");
   AddItem(363,"Lederschuppenr&uuml;stung","Harte Lederschuppen auf einem weichen Lederhemd. Bequem, billig und flexibel.");
   AddItem(364,"leichte Jagdr&uuml;stung","Eine bewegliche R&uuml;stung aus &uuml;berlappenden, dicken Lederschichten.");
   AddItem(365,"halbe Lederr&uuml;stung","Sch&uuml;tzt den Oberk&ouml;rper, l&auml;&szlig;t jedoch die Arme frei.");
   AddItem(325,"Stahlhandschuhe","Handschuhe aus Stahl, die sich gut zum Duellieren eignen, das heisst wenn du deine Finger behalten willst. M&auml;nnern die sowas tragen geht man besser aus dem Weg.");
   AddItem(326,"Stahlschuhe","Schuhe aus Stahl, die sich gut zum Fechten eignen, das heisst wenn du deine F&uuml;&szlig;e behalten willst. Frauen die sowas tragen geht Mann besser aus dem Weg.");
   AddItem(366,"Lederbeinschienen","Stabile Hosen aus bequemem, weichem aber dickem Leder, auf das schwere, geh&auml;rtete Lederteile gen&auml;ht wurden.");
   AddItem(367,"kurze Lederbeinschienen","Die einfache und preiswerte Form eines Leder-Beinschutzes.");
   AddItem(17,"Holzschild","Ein einfacher, runder Holzschild. Nicht besonders schwer und nicht besonders teuer.");
   AddItem(18,"leichter Metallschild","Ein sehr leicht gebauter, modisch aussehender Metallschild. Junge albarische Adelige zeigen sich gerne mit so etwas, aber ein S&ouml;ldner w&uuml;rde &uuml;ber so etwas lachen.");
   AddItem(186,"Metallrundschild","Ein kleiner Rundschild aus Metall.");
   AddItem(19,"gro&szlig;er Metallschild","Ein stabiler Metallschild, wie er von vielen K&auml;mpfern getragen wird.");
   AddItem(20,"Ritterschild","Ein schwerer Schild, wie ihn viele Ritter, Paladine und schwer gepanzerte K&auml;mpfer benutzen.");
   AddItem(498,"Holzturmschild","Diese Art Schild aus hartem, widerstandsf&auml;higen Holz ist oft mit Stahl beschlagen und wird oft vom Fu&szlig;volk der Salkamaerischen Legion eingesetzt.");
   AddItem(916,"verzierter Turmschild","Schwer und gro&szlig;, stabil und auch noch verziert. Sieht aus, als habe er mal einem salkamaerischen Infanterie-Offizier geh&ouml;rt.");
   AddItem(95,"Wappenschild","Dieser schwere,verzierte Schild tr&auml;gt das Wappen eines Adelshauses. Es sieht teuer aus.");
   AddItem(96,"Stahlturmschild","Dieser schwere Turmschild wird oft von schwerer Infanterie eingesetzt. Er eignet sich &uuml;berhaupt nicht zum Reiten.");
   AddHeadline( "Genu&szlig;mittel und damit Zusammenh&auml;ngendes");
   AddItem(118,"Nudelholz","N&uuml;tzlich f&uuml;r jeden Koch, aber sehr erschreckend in den H&auml;nden jeder Ehefrau.");
   AddItem(119,"Backhaus","Feuer an, Brot rein, Brot raus - sollte nicht allzu schwer sein.");
   AddItem(121,"Brotschieber","Wenn du dir nicht die Finger verbrennen willst, brauchst du etwas wie dieses hier.");
   AddItem(1840,"Kupferkelch","Ein einfacher Kelch aus geh&auml;mmertem Kupfer.");
   AddItem(191,"Br&ouml;tchen","Einfach lecker.");
   AddItem(2058,"Glas mit Wasser","Ein einfaches Glas mit frischem Wasser. Gib es einem Elfen und er wird es trinken. Gib es einem Zwergen, und er wird fragen ob du ihn vergiften willst.");
   AddItem(223,"Eisenkelch","Ein Kelch, aus Eisen. Pa&szlig; auf, da&szlig; er nicht rostet.");
   AddItem(2744,"Pfeife","Ob Tabak, Kr&auml;uter oder Sibanac - das Ideale Werkzeug, um seine Mitmenschen zu bel&auml;stigen.");
   AddItem(306,"Schinken","Ein leckeres St&uuml;ck ger&auml;ucherter Schinken.");
   AddItem(307,"Schweinefleisch","Ein st&uuml;ck roher Schinken, herausgeschnitten aus einem armem Schwein. Es sieht aus, als ob es ger&auml;uchert werden wollte.");
   AddItem(339,"Weinfass","Du hast die Wahl : stilvoll in ein Glas mit dem inhalt - oder drunterlegen und laufenlassen.");
   AddItem(353,"Apfelkuchen","Apfelkuchen. Halblinge lieben sowas, Elfen findens zu s&uuml;&szlig; und Echsen ist es nicht roh genug.");
   AddItem(354,"Erdbeertorte","Da sind Erdbeeren drin. Ganz viele ! Sieht lecker aus, es sei denn du hast Schuppen und magst lieber Fisch.");
   AddItem(355,"Lachs","Ein Lachs. Echsen m&ouml;gen sie roh.");
   AddItem(44,"Presse","Damit kann man Sachen so richtig auspressen, wie albarische Adelige es mit den Geldbeuteln ihrer Untergebene tun.");
   AddItem(49,"Brot","Sieht aus wie... Brot.");
   AddItem(514,"F&auml;sser","Einfach praktisch, um irgendetwas fl&uuml;ssiges zu lagern. Du kannst aber auch &Auml;pfel reintun.");
   AddItem(516,"Bierfass","Zwerge w&uuml;rden daf&uuml;r t&ouml;ten.");
   AddItem(58,"M&ouml;rser","Damit kann man Dinge zu Pulver zermahlen.");
   AddItem(332,"Harfe","Eine Harfe. Manche Leute k&ouml;nnen damit herrliche Musik machen. Andere Leute k&ouml;nnen damit herrliche Ohrenfolter verursachen.");
   AddItem(333,"Horn","Tieeef Luft holen, reintr&ouml;ten, und hoffen da&szlig; man wegen dem L&auml;rm nicht erschlagen wird. Boromir hatte auch eins, aber die Uruk-Hai fanden es zu laut.");
   AddItem(335,"Laute","Laaa, laaa, laaaaaaaaa ! Wenn ich jetzt noch singen k&ouml;nnte...");
   AddItem(90,"Fl&ouml;te","Manche Leute k&ouml;nnen damit wirklich sch&ouml;ne Melodien spielen. Andere Leute k&ouml;nnen einem damit echt auf den Geist gehen.");
   AddHeadline("Juwelen und Wertgegenst&auml;nde");
   AddItem(234,"Gold Nuggets","Klein, gl&auml;nzend, golden, die gro&szlig;e Liebe eines jeden Zwergen.");
   AddItem(2536,"Kupfererz","Nachdem du es m&uuml;hevoll aus dem Stein herausgeklopft hast, solltest du herausfinden wie man es einschmilzt.");
   AddItem(2550,"Kupferbarren","Das also wird aus Erz, wenn man es eingeschmolzen hat. Viel handlicher.");
   AddItem(2571,"Merinium Barren","Ein Magier hat dir gesagt, da&szlig; Merinium sich als manastromkapazitativkatalysierende Prim&auml;rkomponente verwenden lie&szlig;e. Die spinnen, die Magier.");
   AddItem(104,"Silberbarren","Ein kleiner Silberbarren. H&uuml;bsch und wertvoll.");
   AddItem(236,"Goldbarren","Es gibt da ein altes Zwergenlied : Sch&auml;tze, Sch&auml;tze, GOLD ! GOLD ! Und so weiter. Jede Strophe geht genau so, und es gibt hunderte.");
   AddItem(3076,"Kupferst&uuml;cke","Kleingeld. Sehr n&uuml;tzlich.");
   AddItem(3077,"Silberst&uuml;cke","Man sagt, albarische Bauern k&ouml;nnen drei Monate davon leben - wenn es ihnen nicht vorher weggenommen wird.");
   AddItem(61,"Goldstuecke","Es funkelt. Zwerge sind wirklich verr&uuml;ckt nach dem Zeug.");
   AddItem(283,"Schwarzstein"," Dieser kleine Edelstein wird \"Schwarzstein\" genannt. Gut geschliffen sind sie viel wert. ");
   AddItem(284,"Blaustein","Ein h&uuml;bscher blauer Edelstein von der Farbe des Meeres (bei gutem Wetter).");
   AddItem(285,"Diamant","Uii, wie der funkelt ! Du solltest den vor Zwergen verstecken. Die kriegen n&auml;mlich sonst das Funkeln in den Augen und dann ist er weg...");
   AddItem(45,"Smaragd","Ein kleiner, gl&auml;nzender Smaragd.");
   AddItem(46,"Rubin","Ein funkelnder Rubin. Klein, aber wertvoll.");
   AddItem(197,"Amethyst","Ein kleiner Edelstein.");
   AddItem(198,"Topas","Noch ein kleiner Edelstein.");
   AddItem(62,"Smaragdamulett","Sieht h&uuml;bsch aus. Oder ?");
   AddItem(222,"Amulett","Ein Amulett. Davon gibt's viele in verschiedenen Formen und Farben.");
   AddItem(225,"Krone","Uiii, die funkelt aber. Ist bestimmt teuer.");
   AddItem(93,"Medallie","Man sagt, diese Dinger seien verflucht.");
   AddItem(235,"Goldring","Ein Ring, sie zu knechten, sie alle zu finden - zum Gl&uuml;ck kannst du auf dem hier keine seltsamen Schriftzeichen entdecken.");
   AddItem(277,"Amethystring","Jemand hat einen h&uuml;nbschen, funkelnden Amethyst auf diesem h&uuml;bschen, funkelnden Ring befestigt.");
   AddItem(278,"Schwarzsteinring","Nur ein kleiner schwarzer Edelstein in einem funkelnden goldenen Ring.");
   AddItem(279,"Blausteinring","Der Edelstein auf diesem Ring ist so blau wie das Meer an einem sch&ouml;nen Sommertag.");
   AddItem(280,"Diamantring","Man sagt, Diamanten sind f&uuml;r die Ewigkeit. Auf einem Ring wie diesem sehen sie besonders h&uuml;bsch aus.");
   AddItem(281,"Smaragdring","Ein leuchtend gr&uuml;ner Smaragd wurde in diesen Ring eingelassen.");
   AddItem(282,"Topasring","Ein h&uuml;bscher, gelber Topaz auf einem h&uuml;bschen, goldenen Ring.");
   AddItem(68,"Rubinring","Ein funkelnder Ring mit einem auch funkelnden Rubin drauf.");
   AddHeadline("Kleidung");
   AddItem(193,"blaue Robe","Eine blaue Magierrobe.");
   AddItem(194,"schwarze Robe","Eine schwarze Robe mit h&uuml;bschen gelben Verzierungen.");
   AddItem(195,"gelbe Robe","Eine gelbe Robe mit h&uuml;bschen schwarzen Verzierungen.");
   AddItem(34,"schwarze Hose","Du wirst es nicht glauben, aber das hier ist eine Hose.");
   AddItem(356,"Schlapphut","Sch&uuml;tzt gut vor der Sonne und auch vor Regen, ist aber nicht besonders modisch.");
   AddItem(357,"blauer Zauberhut","Ein einfacher, blauer Hut f&uuml;r Magier.");
   AddItem(358,"roter Zauberhut","Ein einfacher, roter Hut f&uuml;r Magier.");
   AddItem(368,"gelbe Priesterrobe","Eine gelbe Robe, die aussieht, als ob sie irgendeinem Priester gut stehen w&uuml;rde.");
   AddItem(369,"Lederschuhe","Einfache, bequeme Lederschuhe.");
   AddItem(370,"bunter Zauberhut","Ist bestimmt der letzte Schrei auf jeder Party in Lor-Angur...");
   AddItem(371,"teurer Zauberhut","Sieht sehr edel und ziemlich teuer aus.");
   AddItem(385,"blaues Kleid","Ein h&uuml;bsches blaues Kleid. Ein Oger w&uuml;rde darin ziemlich dumm aussehen.");
   AddItem(48,"Lederhandschuhe","Stabile Handschuhe aus Leder.");
   AddItem(53,"Lederstiefel","Stabile Lederstiefel.");
   AddItem(55,"gr&uuml;ne Robe","Eine h&uuml;bsch aussehende Robe, wie Magier sie tragen.");
   AddItem(97,"Ledertasche","Da kannst du deinen Kram hineintun.");
   AddHeadline("Magisches");
   AddItem(165 ,"Mana Trank","Magier lieben dieses Zeug. \"Magische Energien\" - pah ! ");
   AddItem(327,"Windtrank","Das ist das magische Zeug was man auf Pfeile schmiert damit sie besser fliegen.");
   AddItem(328,"Sattmacher","Wenn man dieses Zeug trinkt,braucht man eigentlich kein Mittagessen mehr.");
   AddItem(329,"Schwarze Fl&uuml;ssigkeit","Ein seltsames, schwarzes Gebr&auml;u. Sieht unappetitlich aus.");
   AddItem(331,"starker Heiltrank","Der Alchimist, der ihn verkauft hat, pries ihn als Allheilmittel gegen Blessuren, Schnitt- und Brandwunden aller Art.");
   AddItem(334,"Eisvogel Amulett","Ein funkelndes, teuer aussehendes Amulett. Wird oft getragen von Elfen oder Weicheiern ohne R&uuml;stung - ist daher bestimmt n&uuml;tzlich f&uuml;r Magier.");
   AddItem(359,"Flamme","Du k&ouml;nntest ein Schild danebenstellen : Vorsicht, hei&szlig; ! Nicht anfassen. Nicht hindurchgehen. Nicht hineinsetzen. Nicht versuchen, es zu essen.");
   AddItem(360,"Eisflamme","H&uuml;bsch und blau. Aber wie du diese Magier kennst ist es gewi&szlig; sehr ungem&uuml;tlich.");
   AddItem(372,"Giftwolke","Gr&uuml;n, wabernd, und bestimmt &auml;tzend. Sowas kann nur von einem Magier kommen.");
   AddItem(59,"Gegengift","Ein Trank, der sehr gut gegen Vergiftungen aller Art wirkt.");
   AddItem(738,"Drachenei","Tritt nicht drauf, Mama wird sonst sehr, sehr sauer. Und das wollen wir doch nicht... Wenn du das hier siehst, steht sie sowieso gerade hinter dir.");
   AddHeadline("Sonstiges");
   AddItem(1005,"Bienenstock","Wenn du dich an ein paar tausend Bienen vorbeischleichen kannst, ist dies eine gute Gelegenheit, an frischen Honig oder sogar Wachs zu gelangen.");
   AddItem(125,"Baumstumpf","Na, da war wohl jemand mit einer Axt am Werk.");
   AddItem(1879,"Schwarzkult-Altar","Oha. Wenn man so etwas findet, ist &Auml;rger nicht weit. Schnell weg, jetzt brauchen wir shcleunigst einen Inquisitor.");
   AddItem(1880,"entweihter Altar","Den hat wohl jemand absichtlich kapputtgemacht ! Du solltest dringend einen Priester holen, der das wieder in Ordnung bringt.");
   AddItem(2038,"Totenkopf","Na, wer den wohl verloren hat ? Sein oder nicht sein...");
   AddItem(211,"Pferdekopf","Es war dir lieber es noch laufen, wiehern und Gras fressen konnte. Sein Name war \"Ed\".");
   AddItem(22,"Eisenerz","Du hast das Gef&uuml;hl, da&szlig; dieses St&uuml;ck Erz noch eine ganze Menge vor sich hat.");
   AddItem(2745,"Pergament","Ein St&uuml;ck Pergament.");
   AddItem(2746,"Rasierklinge","Hmmmh... bartlose Zwerge sind gef&auml;hrlich... aber hast du schonmal einen nackten Goblin gesehen ?");
   AddItem(2749,"Geschmolzenes Eisen","Das ist geschmolzenes Eisen. Vorsicht, hei&szlig; !");
   AddItem(2750,"Geschmolzenes Gold","Das ist geschmolzenes Gold. Es ist nicht nur ziemlich hei&szlig;, sondern auch ziemlich wertvoll.");
   AddItem(3094,"Spinnennetz","Ein gro&szlig;es, ekliges und widerlich aussehendes Spinnennetz, vermutlich produziert von einer noch gr&ouml;&szlig;eren, noch ekligeren und noch viel widerlicher aussehenden Spinne, der du jetzt gerade lieber nicht begegnen m&ouml;chtest.");
   AddItem(321,"Depot","Das hier ist ein magisches Depot. Man kann nur Dinge herausholen die man auch selbst hineingesteckt hat.");
   AddItem(336,"Spiegel","Oh ! Der Typ in dem Glas sieht genauso aus wie ich.");
   AddItem(361,"Altar","Ein Altar, wie ihn Menschen gern herstellen. Vermutlich einem der j&uuml;ngeren G&ouml;tter geweiht.");
   AddItem(374,"Fallenbausatz","Ein paar Federn, Spie&szlig;e und Hebel. Sieht gef&auml;hrlich aus.");
   AddItem(375,"zerstoerte Falle","Sieht aus, als h&auml;tte es jemand kaputtgemacht.");
   AddItem(376,"ausgeloeste Falle","Sieht aus, als h&auml;tte sich jemand wehgetan.");
   AddItem(377,"getarnte Falle","Sieht man, oder sieht man nicht.");
   AddItem(41,"Glasblock","Ein Glasblock. Gl&auml;nzend.");
   AddItem(428,"Kerzenziehertisch","Sieht aus, als w&uuml;rde hier jemand Kerzen herstellen.");
   AddItem(50,"Garn","Du kannst dir viele Dinge vorstellen, die man mit so etwas machen kann.");
   AddItem(505,"Schatzkarte","Ooooh ! Eine Schatzkarte ! Du k&ouml;nntest dein Holzbein anschnallen, deinen Papagei aus dem K&auml;fig holen, die segel setzen und danach graben.");
   AddItem(51,"Eimer","Eine sehr n&uuml;tzliche Erfindung.");
   AddItem(69,"Rohleder","Irgendeinem armen Schwein, das du vermutlich gerade geschlachtet hast, hat jetzt eine Haut weniger.");
   AddItem(733,"Steinquader","Dieser Steinklotz ist hart und schwer. Ein &uuml;berzeugendes Argument.");
   AddItem(739,"Dietriche","Sie sehen n&uuml;tzlich aus. Sind bestimmt f&uuml;r irgendetwas zu gebrauchen.");
   AddItem(92,"Öllampe","Du reibst und reibst und reibst, aber es scheint niemand zu Hause zu sein. Das Ding ist voller ™l, also ist der Geist vielleicht l&auml;ngst ertrunken. Armer Lampengeist.");
   AddItem(102,"Schneidertisch","Sieht aus wie der Arbeitsplatz eines Schneiders, meinst du nicht ?");
   AddItem(126,"Sichel","Eignet sich gut, um damit pflanzen zu schneiden.");
   AddItem(13,"Amboss","Ein Ambo&szlig;.Schwer, hart, wie das Leben halt...");
   AddItem(169,"Webstuhl","Damit kann man aus Wollf&auml;den Stoff machen.");
   AddItem(171,"Spinnrad","Du wei&szlig;t doch, da&szlig; man damit aus Wolle Wollf&auml;den macht ?");
   AddItem(23,"Hammer","Was denkst du wohl, kann man damit machen ? Na, schmieden, h&auml;mmern und quiekende Goblins an B&auml;ume annageln, nat&uuml;rlich.");
   AddItem(24,"Schaufel","Grab ein Loch und schau, was herauskommt ! Nunja, wenn's was totes sein sollte, bete da&szlig; es sich nicht bewegt.");
   AddItem(250,"M&uuml;hlstein","Tja, dieses Ding ist einfach mal so schwer wie ein M&uuml;hlstein. Keine Ahnung warum...");
   AddItem(258,"Dreschflegel","Das brauchst du, um Getreide und neugierige kleine Goblins zu dreschen.");
   AddItem(270,"Edelsteinschleifer","Edelsteine kann man hiermit so richtig h&uuml;bsch machen - oder so richtig pulverf&ouml;rmig.");
   AddItem(271,"Sense","KOMM MIT MIR, STERBLICHER... Das sind Worte, die du gar nicht in Gro&szlig;buchstaben h&ouml;ren willst ! Aber diese hier ist eh f&uuml;r Getreide.");
   AddItem(2738,"N&auml;gel","Tja, das sind N&auml;gel. Du kannst aber nicht direkt feststellen ob sie magisch sind oder nicht...");
   AddItem(2752,"Schnitzmesser","Ein Set Schnitzwerkzeuge.");
   AddItem(304,"R&auml;ucherh&uuml;tte","Da kann man Schinken reinh&auml;ngen, den man zuvor aus einem armen Schwein geschnitzt hat. Lecker, wenn man nicht lieber Salat isst.");
   AddItem(311,"Glasblasrohr","Pfeil rein, zielen und - Oh warte. Das hier ist nur zum Glasblasen.");
   AddItem(312,"Holzkelle","Damit kann man Dinge aus einem heissen Ofen holen.");
   AddItem(313,"Glasschmelzofen","Ein ziemlich hei&szlig;er Ofen.");
   AddItem(47,"Nadel","Ja, damit kann man N&auml;hen. Wennman's kann.");
   AddItem(724,"Werkbank","S&auml;gen, H&auml;mmer, Messer, Feilen und jede Menge S&auml;gesp&auml;ne.");



   function AddItem( $itemid, $name, $desc )
   {
      global $content, $i, $page;

      if ( $i != $page )
      {
         return false;
      }
      $content.= "<tr><td><img src=\"$url/shared/pics/items/$itemid.png\" alt=\"$name\" /></td>";
      $content.= "<td style=\"width:5px\" /><td><b>$name</b></td>";
      $content.= "<td style=\"width:5px\" /><td>$desc</td></tr>";
   }

   function AddHeadline( $name )
   {
      global $i, $content, $overview, $page;
      $i++;
      if ( $i != $page )
      {
         $overview.= "<li><a class=\"hidden\" href=\"?page=$i\">$name</a></li>";
      }
      else
      {
         $content.= "<tr><td colspan=\"5\">".go_to_top_link()."</td></tr>";
         $content.= "<tr><td colspan=\"5\"><a name=\"$i\"></a><h2>$name</h2></td></tr>";

         $overview.= "<li><a class=\"hidden\" href=\"#$i\">$name</a></li>";
      }
   }

?>
<h1>Items</h1>

<h2>Inhalt</h2>

<ul>
  <?php echo $overview; ?>
</ul>

<table style="width:100%">
   <?php echo $content; ?>
   <tr>
     <td colspan="5">
       <?php insert_go_to_top_link(); ?>
     </td>
   </tr>
</table>

<?php include_footer(); ?>