<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';

	Page::setTitle( 'Gildenregeln' );
	Page::setDescription( 'Auf dieser Seite sind alle Regeln die für die '
		. 'Gründung und Leitung von Gilden relevant sind.' );
	Page::setKeywords( array( 'Gildenregeln', 'Gilden', 'Regeln' ) );

	Page::setFirstPage(Page::getURL() . '/illarion/de_rules.php');
	Page::setPrevPage(Page::getURL() . '/illarion/de_rules_2.php');
	Page::setLastPage(Page::getURL() . '/illarion/de_rules_3.php');

	Page::setXHTML();
	Page::Init();
?>

<?php Page::NavBarTop(); ?>

<h1>Gildenregeln</h1>

<?php Page::cap('D'); ?>
<p>ie Gildenregeln umfassen alle Regeln, die bei der Gründung und der Leitung
von Gilden zu beachten sind. Diese Regeln sind notwendig, um sicherzustellen,
dass die gegründeten Gilden nicht nach kurzer Zeit wieder verschwinden oder zu
schnell völlig inaktiv werden. </p>

<p>Außerdem wird hier das Verfahren angegeben, wie eine Gilde generell gegründet
werden sollte.</p>

<?php Page::insert_go_to_top_link(); ?>

<h2>Regeln</h2>

<ul>
	<li>Eine Gilde kann mit mindestens vier aktiven Mitgliedern gegründet
	werden. Dabei ist es wichtig, dass die Gildenmitglieder von
	unterschiedlichen Spielern gespielt werden.</li>
	<li>Eine Gilde muss ein Konzept haben. Also eine Aufstellung der Grundsätze
	der Gilde und eine Aufstellung der Dinge, für die die Gilde steht. Sollte
	dieses Konzept geheim sein und nicht für alle offen lesbar sein, kann es
	auch zu einem der Gamemaster zur Prüfung geschickt werden.</li>
	<li>Jede Gilde hat eine Probezeit von drei Wochen, in der die Mitglieder
	und die Aktivitäten der Gilde verstärkt beobachtet werden, um einzuschätzen,
	ob die Gilde förderlich für das Spiel ist.</li>
	<li>Wenn eine Gilde inaktiv wird, das heißt, nicht mehr genügend als aktiv
	geltende Mitglieder hat, wird das Eigentum der Gilde entweder verfallen oder
	von einer anderen Gilde übernommen.</li>
	<li>Neue Gilden müssen von einem Gamemaster genehmigt werden.</li>
</ul>

<?php Page::insert_go_to_top_link(); ?>

<h2>Vorüberlegungen vor der Gründung einer Gilde</h2>

<p>Bevor eine Gilde veröffentlicht wird, sollten folgende Überlegungen
angestellt werden, um sicherzustellen, dass die Gilde in der gewünschten Form
bestehen kann.</p>

<ul>
	<li>Verstößt die Gilde in irgendeiner Form gegen die bestehenden Regeln von
	Illarion? Wenn das der Fall ist, wird die Gilde mit Sicherheit abgelehnt.
	</li>
	<li>Kann ich mit meiner Idee andere Spieler begeistern? Das ist einer der
	wichtigsten Punkte. Wenn die Gilde in der Form die Spieler nicht begeistern
	kann, hat eine Gründung keinen Sinn. Eine Möglichkeit herauszufinden, wie
	die Gilde angenommen wird, ist das Konzept im Forum zu veröffentlichen. Aber
	es wird nicht nur positive Kritik geben; darauf sollte man sich einstellen.
	</li>
	<li>Verspreche ich mit dem Konzept meinen Mitgliedern irgendwas, was ich
	nicht bieten kann? Nichts ist schädlicher für eine Gilde, als demotivierte
	Mitglieder, die erkannt haben, dass sie das, was sie sich von der Gilde
	erhofft hatten, nicht bekommen werden.</li>
	<li>Einer der wichtigsten Punkte: Habe ich genug Zeit, um die Gilde zu
	gründen und zu leiten? Gerade bei der Gründung und in den Monaten danach ist
	der Zeitaufwand, der nötig ist, um eine Gilde zu führen, nicht zu
	unterschätzen. Wenn du diese Zeit nicht aufbringen kannst, kannst du die
	Gilde nicht gründen, egal wie gut das Konzept ist.</li>
	<li>Gibt es die Gilde, die ich gründen möchte, in gleicher oder sehr
	ähnlicher Form bereits? Wenn das so ist, sollte man sich an der bestehenden
	Gilde beteiligen, statt eine neue zu Gründen.</li>
</ul>

<?php Page::insert_go_to_top_link(); ?>

<h2>Erster Schritt zur neuen Gilde - Das Konzept </h2>

<p>Das Konzept ist das Erste, was man sich vor der Gründung einer Gilde
überlegen muss. Es beschreibt, was die Gilde eigentlich ist und wofür sie
steht. Das Konzept muss unabhängig davon, ob es anderen Spielern zugänglich
gemacht werden soll oder nicht, geschrieben werden, damit die Gamemaster
einschätzen können, ob die Gilde in die Welt von Illarion passt.</p>

<p>Folgende Punkte sollten im Konzept enthalten sein:</p>

<ul>
	<li>Entstehungsgeschichte der Gilde: Warum wird sie von wem gegründet?
	Dieser Punkt sollte im Spiel fundiert sein oder nachvollziehbar in die
	Hintergrundgeschichte von Illarion passen.</li>
	<li>Beschreibung der Gilde</li>
	<li>Selbstgesteckte Ziele, Aufgaben, Sinn und Zweck der Gilde: Dieser Punkt
	ist besonders wichtig. Die Ziele dienen der Langzeitmotivation der
	Mitglieder und sind entsprechend zu setzen. Gilden, deren einziges Ziel ist
	ein paar Häuser zu bauen, werden grundsätzlich abgelehnt. Außerdem sollte
	als Sinn und Zweck der Gilde dargestellt sein, wie sich die Gilde von den
	schon bestehenden Gilden unterscheidet und wie sie zur Verbesserung des
	Spielerlebnisses in Illarion beitragen soll.</li>
	<li>Eventuelle zusätzliche Informationen über die Gilde wie Ämter und Ränge
	innerhalb der Gilde. Dieser Punkt ist nicht zwingend notwendig, aber es ist
	nützlich, sich im Konzept auch darüber Gedanken zu machen.</li>
</ul>

<?php Page::insert_go_to_top_link(); ?>

<h2>Zweiter Schritt zur neuen Gilde - Gilde prüfen lassen</h2>

<p>Im nächsten Schritt muss die Gilde geprüft werden. Dazu muss das komplette
Konzept der Gilde, sowie die exakten Namen der ersten Mitglieder an einen
Gamemaster geschickt werden, der sich alles durchliest und die Gilde dann
bestätigt oder nicht. Wenn die Gilde bestätigt wird, kann man sie am Gildenboard
im Forum eintragen. Ob das Konzept im Gildenpost veröffentlicht wird oder nicht,
ist die Wahl des Gildenleiters.</p>

<?php Page::insert_go_to_top_link(); ?>

<h2>Dritter Schritt zur neuen Gilde - Probezeit überstehen</h2>

<p>In der Probezeit, die etwa drei Wochen dauert, werden die Mitglieder der
neuen Gilde verstärkt beobachtet. Wenn die Mitglieder durch unzureichendes
Rollenspiel oder durch Regelwidriges Verhalten auffallen, kann dies schon das
Ende der Gilde bedeuten. Weiterhin muss die Gilde zeigen, dass sie die vier
Mitglieder aktiv halten kann.</p>

<p>Wenn es innerhalb der Probezeit keine Probleme gibt, bekommt die Gruppierung
den Status einer echten Gilde und hat damit Anrecht auf die Vorzüge einer Gilde
wie zum Beispiel das Bauen eines Gildenhauses.</p>

<?php Page::NavBarBottom(); ?>