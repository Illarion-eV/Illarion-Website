<?php
	include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
	create_header( "Illarion - FAQ Grafik",
	"Diese Seite enthält die am häufigsten gestellten Fragen zum Thema Grafik in Illarion.",
	"FAQ, Fragen, Grafik" );
	include_header();
?>

<h2>
	<a class="float_left" href='/general/de_faq_technic.php'>Technik - FAQ</a>
	<a class="float_right" href='/general/de_faq_concept.php'>Spielkonzept - FAQ</a>
	<a class="clr" style="display:block;"></a>
</h2>

<h1>Grafik - FAQ</h1>

<h2>Inhalt</h2>

<ul>
	<li><a class="hidden" href="#1">Wofür ist diese FAQ-Liste?</a></li>
	<li><a class="hidden" href="#2">Müssen alle Grafiken mit 3D-Software gerendert
	werden?</a></li>
	<li><a class="hidden" href="#3">Wie sollen Items aussehen?</a></li>
	<li><a class="hidden" href="#4">Welche Größe sollten Items haben?</a></li>
	<li><a class="hidden" href="#5">Über welche Perspektive wird da dauernd gesprochen?</a></li>
	<li><a class="hidden" href="#6">Wie schaffe ich es, Objekte in dieser Perspektive
	darzustellen?</a></li>
	<li><a class="hidden" href="#7">Ich habe eine Grafik erstellt aber bin mir nicht sicher, ob
	sie gut genug ist. Was soll ich tun?</a></li>
	<li><a class="hidden" href="#8">Wo kann ich Beispiele finden?</a></li>
	<li><a class="hidden" href="#9">Werde ich für meine Arbeit bezahlt?</a></li>
	<li><a class="hidden" href="#10">Wie müssen durchsichtige Bereiche aussehen?</a></li>
	<li><a class="hidden" href="#11">Gibt es außer Malen eine andere Möglichkeit, bei den
	Grafiken zu helfen?</a></li>
	<li><a class="hidden" href="#12">Wo kann ich online Hilfe/Tutorials/... für <Programm>
	finden?</a></li>
</ul>

<?php insert_go_to_top_link(); ?>

<p><a name="1"></a></p>

<h2>Wofür ist diese FAQ-Liste?</h2>

<p>Jeder, der Grafiken für Illarion machen will, muss wissen, welche Vereinbarungen über deren
Aussehen etc. wir getroffen haben. Während der Erstellung von Grafiken, aber auch davor oder
danach, können (und werden) Fragen auftauchen. Wir hoffen, die meisten davon mit dieser
FAQ-Liste abzudecken.</p>

<?php insert_go_to_top_link(); ?>

<p><a name="2"></a></p>

<h2>Müssen alle Grafiken mit 3D-Software gerendert werden?</h2>

<p>Nein, aber es ist sehr praktisch und sinnvoll, speziell für Monster, Charaktere und große
Objekte. Mit einem 3D-Modell kann man</p>

<ul>
	<li>Fehler einfacher korrigieren,</li>
	<li>leicht ähnliche Charaktere/Objekte erstellen,</li>
	<li>leichter Animationen erstellen und </li>
	<li>Zeit sparen.</li>
</ul>

<p>Allerdings können auch viele Items ohne 3D-Software erstellt werden. Das betrifft vor allem
sehr kleine Objekte, wo man den Unterschied zwischen gezeichneter und gerenderter Version
praktisch gar nicht erkennen kann.</p>

<?php insert_go_to_top_link(); ?>

<p><a name="3"></a></p>

<h2>Wie sollen Items aussehen?</h2>

<p>Es gibt nur eine Grafik für ein Objekt, die jedoch für zwei verschiedene Zwecke verwendet
wird: einerseits im Inventar eines Spieler-Charakters, andererseits auf dem Boden. Gegenstände
sollten nicht alle aufrecht und parallel herumliegen, denn das sieht unnatürlich aus. Am besten
orientiert man sich an den bereits bestehenden Grafiken für ähnliche Dinge.</p>

<p>Große Gegenstände, die in allen drei Raumrichtungen etwa dieselbe Ausdehnung haben, sollten
in der korrekten Perspektive dargestellt werden. Objekte wie Wegweiser oder Schwerter haben nur
eine große Ausdehnung in eine Raumrichtung, daher ist die Perspektive bei diesen nicht so
wichtig. Gegenstände wie Helme allerdings sollten in der korrekten Perspektive gezeichnet
sein.</p>

<?php insert_go_to_top_link(); ?>

<p><a name="4"></a></p>

<h2>Welche Größe sollten Items haben?</h2>

<p>Da gibt es zwei Punkte zu berücksichtigen:</p>

<p>Normale Items (Schwerter, Gebrauchsgegenstände, Rüstungen, Gewand, Werkzeug, ..., schlichtweg
alles, das man in einer Tasche mitnehmen kann) sollten in das karoförmige Bodenfeld passen.
(Größere Objekte, wie etwa lange Schwerter, dürfen auch etwas nach links oder rechts oben
überlappen) Grafiken sollten maximal mit 16 Bit pro Pixel (High Color) dargestellt werden.
Alles, das mehr Farben hat, wird auf weniger Farben herunterkonvertiert. Probiert mit der Anzahl
der Farben ein wenig herum: Oft sehen Grafiken auch noch mit 8 oder sogar 4 bit pro Pixel noch
sehr gut aus und man erkennt mit freiem Auge fast keinen Unterschied zur 16-Bit-Version. Das
spart Platz im Client für mehr Grafiken! Die Größenverhältnisse der Items zueinander sollten
vernünftig sein; zum Beispiel sollte ein Bihänder größer als ein Ring sein. Allerdings gilt zu
beachten, dass sehr kleine Objekte, wie eben Ringe oder Edelsteine, ein wenig vergrößert
dargestellt werden sollten, damit sie überhaupt noch sichtbar sind. Das verhindert, dass eine
Lupe ein zum Spielen notwendiges Utensil wird. Auch etwas größere Objekte wie beispielsweise
Helme dürfen etwas größer sein, als sie realistischerweise sein sollten. Das erhöht die
Erkennbarkeit.</p>

<p>Einige Grafiken, z.B. Charaktere, die meisten Monster, Wände, Bäume etc., müssen freilich
größer als die Bodenplatten (Basis-Karo) sein. Menschen, um ein Beispiel zu erwähnen, sind
ungefähr 90 Pixel hoch, Elfen 100 und Halblinge 60. Für den (wahrscheinlichen) Fall, dass diese
Grafiken gerendert werden, kann man die Größe leicht ändern. Übrigens bedeuten obige
Größenverhältnisse, dass zwei Zentimeter etwa einem Pixel
entsprechen.</p>

<?php insert_go_to_top_link(); ?>

<p><a name="5"></a></p>

<h2>Über welche Perspektive wird da dauernd gesprochen?</h2>

<p>Es geht hiebei um die perspektivische Darstellung im Spiel. Ein Quadrat am Boden sieht aus
wie ein Karo (Basis-Karo). In der Beispielgrafik kann man dies sehen:</p>

<p><img height="37" alt="Bodenplatte" src="karo.gif" width="76" /></p>

<?php insert_go_to_top_link(); ?>

<p><a name="6"></a></p>

<h2>Wie schaffe ich es, Objekte in dieser Perspektive darzustellen?</h2>

<p>In 3D-Programmen kann man eine Kamera mit unendlicher (oder zumindest sehr hoher) Brennweite
plazieren. (In 3D Studio Max muss man dafür die Option "orthogonal projection" für die
Kamera verwenden.) Das verhindert, dass entfernte Objekte kleiner erscheinen als nahe; aus
offensichtlichen Gründen ist dies im Spiel erwünscht. Um die korrekte Position für die Kamera zu
finden, sollte man einfach ein Quadrat irgendwo am Boden der betreffenden Szene positionieren
und es mit dem Beispiel-Karo (Basis-Karo/BK) vergleichen. Wenn das BK kleiner als das gerenderte
Karo ist, muss man an der Kamera herumtüfteln; ist das BK höher als das gerenderte, hat aber
dieselbe Breite, dann muss die Kamera weiter nach oben gebracht werden etc. Auf diese Weise
tastet man sich langsam heran. Mit ein wenig dreidimensionalem Vorstellungsvermögen sollte es
nur eine Frage der Zeit sein, bis man die optimale Einstellung gefunden hat.</p>

<p>Ein paar erhellende Worte zum Licht: Objekte, die hauptsächlich unter Tageslicht erscheinen,
sollten natürlich wirken, wie an einem warmen Sommertag. Deshalb habe ich eine sehr, sehr
leichte Gelbfärbung der (parallelen!) Lichtquelle gewählt. Zusätzlich habe ich das "ambient
light" von Schwarz (=Null) auf sehr, sehr leichtes Blau (dunkelstes Dunkelblau) gesetzt.
Hier muss man etwas aufpassen: lieber kein "ambient light" (=Schwarz) und eine weiße
Sonne als gelbes Metall. Wer sich nicht sicher ist, ob das Licht stimmt, sollte es mit
bestehenden Grafiken vergleichen.</p>

<p>Für kleine Items habe ich oft ein zweites, schwaches (weißes) Licht verwendet, um gute
Glanzeffekte zu erzielen (z.B. auf Schwertklingen).</p>

<p>"Anti-aliasing" gegen den Hintergrund sollte entweder abgeschalten oder von Hand
entfernt werden.</p>

<?php insert_go_to_top_link(); ?>

<p><a name="7"></a></p>

<h2>Ich habe eine Grafik erstellt aber bin mir nicht sicher, ob sie gut genug ist. Was soll ich tun?</h2>

<p>Da bieten sich mehrere Möglichkeiten an, z.B. die Grafik(en):</p>

<ul>
	<li>auf eine Webpage hochladen und einen Link posten,</li>
	<li><a href="mailto:martin.polak@reflex.at?subject=Illarion-Grafiken">mir</a> mailen
	oder</li>
	<li>einer anderen Person schicken, die für Illarion Grafiken erstellt.</li>
</ul>

<?php insert_go_to_top_link(); ?>

<p><a name="8"></a></p>

<h2>Wo kann ich Beispiele finden?</h2>

<p>Entweder in der Screenshot-Sektion auf dieser Homepage oder, wenn man dort nichts Passendes
finden kann, auf den Boards danach fragen.</p>

<?php insert_go_to_top_link(); ?>

<p><a name="9"></a></p>

<h2>Werde ich für meine Arbeit bezahlt?</h2>

<p>Nein. Dieses Projekt wurde von drei (ehemaligen) Studenten ins Leben gerufen und werden
niemanden bezahlen, da sie selbst kein Geld für das Spielen in der Welt Illarions verlangen.
Wenn Du uns Grafiken für Illarion schickst, erlaubst Du damit automatisch, diese für Illarion zu
verwenden und kannst diese Erlaubnis später nicht zurückziehen. Bitte schick' uns keine
rechtlich geschützten Grafiken anderer Grafiker!!</p>

<?php insert_go_to_top_link(); ?>

<p><a name="10"></a></p>

<h2>Wie müssen durchsichtige Bereiche aussehen?</h2>

<p>Alle Teile einer Grafik, die durchsichtig (transparent) sein sollen (beispielsweise alles um
ein Schwert herum, das nicht zum Schwert gehört), müssen Pink sein. Dabei muss es sich exakt um
die Farbe R:255, G:0, B:255 handeln. Jede andere Farbe (z.B. 254, 0, 255) würde im Spiel
dargestellt werden. Daher ist Vorsicht beim Verschmieren, Weichzeichnen oder Verkleinern
geboten, da hier Farben vermischt werden und es leicht dazu kommen kann, dass eine Farbe am Rand
eines Objektes entsteht, die 255, 0, 255 sehr ähnlich ist!</p>

<?php insert_go_to_top_link(); ?>

<p><a name="11"></a></p>

<h2>Gibt es außer Malen eine andere Möglichkeit, bei den Grafiken zu helfen?</h2>

<p>JA, die gibt es. Grafiken zu erstellen braucht viel Zeit und Geduld. Nach der Erstellung
allerdings müssen diese Grafiken noch aus größeren Grafiken ausgeschnitten werden. In den
meisten Fällen handelt es sich dabei um eher einfache, aber wichtige Aufgaben. Man benötigt dazu
keine speziellen Kenntnisse oder Fähigkeiten. Wer interessiert ist, der bekunde dies auf den
Grafik-Boards.</p>

<p>Sollten Fragen unbeantwortet geblieben sein, dann lass' uns das durch ein Posting wissen.
Hab' keine Angst zu fragen, denn es wird anderen Leuten und dieser FAQ-Liste helfen und
vielleicht bewirken, dass mehr Menschen zur Mitarbeit angeregt
werden.</p>

<?php insert_go_to_top_link(); ?>

<p><a name="12"></a></p>

<h2>Wo kann ich online Hilfe/Tutorials/... für <Programm> finden?</h2>

<p>Generell ist zu sagen, dass es im Internet sehr, sehr viele verschiedene Hilfen auf
unterschiedlichem Niveau und in unterschiedlicher Qualität zu finden gibt. Einige davon
beschäftigen sich mit einem speziellen Programm (z.B. 3D Studio Max), andere sind eher als
generelle Anleitungen zu verstehen und nicht sehr Programm-spezifisch (z.B. "Wie modelliere
ich einen Kopf?").</p>

<p>Viele dieser Seiten haben keine sehr lange Verweildauer im Internet, einerseits weil sie
übersiedeln, andererseits, weil sie der jeweilige Bereitsteller wieder aus dem Netz nimmt oder
sich nicht darum kümmert. Daher habe ich nur eine sehr kleine Auswahl getroffen. Wer dort nicht
fündig wird, kann sich vertrauensvoll an eine, nein, an *die* Suchmaschine wenden: <a href=
"http://www.google.com" rel="external">http://www.google.com</a>. (Tipp: Wer mit Google nicht
vertraut ist, dem rate ich, sich schleunigst damit auseinander zu setzen. Denn wer Google nicht
kennt, nutzt das World Wide Web offenbar nicht sehr effektiv!)</p>

<p>Auch zu empfehlen sind Newsgroups, wobei hier Vorsicht geboten ist: Es gibt gewiss einige,
die sich mit dem Themenkreis 2D/3D-Graphik beschäftigen, allerdings ist die Wahrscheinlichkeit,
dass eine Frage, die man so haben könnte, bereits tausend mal abgehandelt wurde, relativ hoch.
Auf ein abermaliges Nachfragen reagiert man aus diesem Grunde meistens eher ungehalten. Daher
empiehlt sich "lurken" (=stilles mitlesen) oder das Stöbern in den Archiven der
Newsgroups. Auch hier hilft Google: <a href="http://groups.google.com/"  rel="external">http://groups.google.com/</a> bzw. <a class="illarion" href=
"http://groups.google.com/advanced_group_search"  rel="external">http://groups.google.com/advanced_group_search</a>.</p>

<p>Hier aber etwas speziellere Links:</p>

<p>Allgemeine Tutorials, Texturen, Modelle und Links (für 3D Studio Max, Maya, Lightwave,
...)</p>

<ul>
	<li><a href="http://www.3dcafe.com/asp/default.asp" rel="external">http://www.3dcafe.com/asp/default.asp</a></li>
	<li><a href="http://www.3dcafe.com/asp/default.asp" rel="external">http://www.3dspline.com/modeling-tuts.htm</a></li>
	<li><a href="http://www.3dlinks.com/" rel="external">http://www.3dlinks.com/</a></li>
	<li><a href="http://www.renderosity.com/"  rel="external">http://www.renderosity.com/</a></li>
</ul>

<p>3D Studio Max Tutorials, Texturen, Modelle ...</p>

<ul>
  <li><a href="http://www.3dluvr.com/content/"  rel="external">http://www.3dluvr.com/content/</a></li>
  <li><a href="http://www.maxforums.org/tutorial.asp"  rel="external">http://www.maxforums.org/tutorial.asp</a></li>
  <li><a href="http://www.maxplugins.de/" rel="external">http://www.maxplugins.de/</a></li>
  <li><a href="http://go.to/maxfaq" rel="external">http://go.to/maxfaq</a></li>
  <li><a href="http://3dmodelworld.com/maxlinks.asp"  rel="external">http://3dmodelworld.com/maxlinks.asp</a></li>
</ul>

<p>Poser (misc)</p>

<ul>
	<li><a href="http://www.hallofheads.com/html/tutorials.htm"  rel="external">http://www.hallofheads.com/html/tutorials.htm</a></li>
	<li><a href="http://www.propsguild.com/files/index.html"  rel="external">http://www.propsguild.com/files/index.html</a></li>
</ul>

<p>Paint Shop Pro</p>

<ul>
	<li><a href="http://www.jasc.com/" rel="external">http://www.jasc.com/</a></li>
</ul>

<p>Rhino</p>

<ul>
	<li><a href="http://www.rhino3d.com/training.htm"  rel="external">http://www.rhino3d.com/training.htm</a></li>
</ul>

<p>2D Art</p>

<ul>
	<li><a href="http://www.polykarbon.com/" rel="external">http://www.polykarbon.com/</a></li>
	<li><a href="http://elfwood.lysator.liu.se/elfwood.html"  rel="external">http://elfwood.lysator.liu.se/elfwood.html</a></li>
	<li><a href="http://elfwood.lysator.liu.se/farp/"  rel="external">http://elfwood.lysator.liu.se/farp/</a></li>
	<li><a href="http://www.simgoddesses.com/tutorials/painting_tut/byl_painttut.html"  rel="external">http://www.simgoddesses.com/tutorials/painting_tut/byl_painttut.html</a></li>
	<li><a href="http://www.steeldolphin.com/resources_tutsites.php"  rel="external">http://www.steeldolphin.com/resources_tutsites.php</a></li>
</ul>

<?php insert_go_to_top_link(); ?>

<?php include_footer(); ?>