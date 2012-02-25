<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';

	Page::setTitle( 'Allgemeine Regeln' );
	Page::setDescription( 'Auf dieser Seite sind die allgemeinen Regeln von '
		. 'Illarion niedergeschrieben.' );
	Page::setKeywords( array( 'allgemeine Regeln', 'Spielweise' ) );

	Page::setFirstPage(Page::getURL() . '/illarion/de_rules.php');
	Page::setPrevPage(Page::getURL() . '/illarion/de_rules_1.php');
	Page::setNextPage(Page::getURL() . '/illarion/de_rules_3.php');
	Page::setLastPage(Page::getURL() . '/illarion/de_rules_3.php');

	Page::setXHTML();
	Page::Init();
?>

<?php Page::NavBarTop(); ?>

<h1>Allgemeine Regeln</h1>

<p>Die allgemeinen Regeln sind die Regeln die für jeden Spieler sicher relevant
sind.</p>

<h2>Inhalt</h2>

<ul class="content_summery">
	<li><a href="#account">Account</a></li>
	<li><a href="#names">Namen</a></li>
	<li><a href="#world">Spielwelt</a></li>
    <li><a href="#realism">Realismus</a></li>
    <li><a href="#charmixing">Charaktere vermischen</a></li>
    <li><a href="#ooc">OOC</a></li>
    <li><a href="#language">Sprache</a></li>
    <li><a href="#emotes">Emotes</a></li>
    <li><a href="#pkilling">Player killing</a></li>
    <li><a href="#harm">Gewalt</a></li>
    <li><a href="#behaivor">Verhalten</a></li>
    <li><a href="#rulebreak">Regelverstöße</a></li>
    <li><a href="#bugs">Spielfehler</a></li>
    <li><a href="#attribs">Attribute</a></li>
    <li><a href="#gms">Gamemaster</a></li>
    <li><a href="#boards">Foren</a></li>
    <li><a href="#macros">Zusatzprogramme</a></li>
    <li><a href="#copyright">Urheberrecht</a></li>
</ul>

<div class="clr"></div>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="account"></a></div>
<h2>Account</h2>

<p>Jedem Spieler steht nur ein Account zu. Accounts und Charaktere werden nicht
an andere Spieler verliehen, getauscht oder verkauft. Der Besitzer eines
Accounts ist verantwortlich für alle Aktionen seiner Charaktere, auch wenn sich
ein Dritter Zugriff auf den Account verschafft hat.</p>

<p>Wenn zwei Spieler über dieselbe Internetverbindung ins Spiel einloggen
wollen, ist dies beim Team von Illarion anzumelden.</p>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="names"></a></div>
<h2>Namen</h2>

<p>Die Namen von Charakteren müssen in eine mittelalterliche Fantasywelt und zu
der Rasse des Charakters passen. Weiterhin sind folgende Arten von Namen nicht
zulässig:</p>

<ul>
  <li>Alberne und anstößige Namen (Kismai Ass, Adolf Hitlerssohn)</li>
  <li>Namen der irdischen Gegenwart oder Geschichte (Angela Merkel, Julius
  Cäsar)</li>
  <li>Namen aus irdischen Mythologien, Religionen etc. (Buddha, Osiris, Jesus
  Christus)</li>
  <li>Bekannte Namen aus Literatur, Film, Fernsehen etc. (Gandalf, Legolas,
  Harry Potter, Mononoke)</li>
  <li>Namen, die einen Titel enthalten (Sir Yaran, König Kuno). Titel können im
  Spiel separat eingefügt werden</li>
</ul>

<p>Zusätzlich gelten folgende Richtlinien:</p>

<ul>
    <li>Ein Name muss zumindest einen Vornamen haben und kann einen Nachnamen
    haben, was auch sehr empfohlen wird.</li>
    <li>Der Name muss aussprechbar sein, also Vokale enthalten</li>
    <li>Echsen dürfen unaussprechliche Namen haben, sollen sich aber nach
    Echsen-Sprache anhören (Entscheidung der Gamemaster)</li>
    <li>Namenszusätze wie "el", "al" etc. (z.B. el'Chitarim al Kazar) können mit
    einem kleinen Buchstaben beginnen</li>
</ul>

<p>Bei Sippennamen und Adelsgeschlechtern gilt des Weiteren: Wer zuerst kommt,
mahlt zuerst. Wenn ein weiterer Spieler einen Charakter mit gleichem Nachnamen
erstellen will, benötigt er die Erlaubnis des Spielers, der diesen Namen zuerst
verwendet hat.</p>


<?php Page::insert_go_to_top_link(); ?>

<div><a id="world"></a></div>
<h2>Die Spielwelt</h2>

<p>Bei der Auswahl der Rassen eines Charakters ist die Auswahl auf die bei der
Charaktererstellung angegebenen Rassen begrenzt. Auch über das Rollenspiel ist
es nicht erlaubt, Mischlingscharaktere irgendeiner Art zu spielen. Die einzige
tolerierte Ausnahme bilden Halbelfen (Elf/Mensch), die allerdings von ihren
Eigenschaften (Sprache, Attribute) auf eine der Elternrassen begrenzt sind.</p>

<p>Bei magischem und göttlichem Wirken oder übernatürlichen Eigenschaften gilt,
dass alles, was man nicht über die Engine von Illarion umsetzen kann, eine
Genehmigung eines Gamemasters erfordert. Das gilt insbesondere für magische und
göttliche Rituale, die einen Effekt erzielen sollen, sowie für alle Arten von
Artefaktmagie, solange diese nicht über die Engine ihren Effekt erhält.</p>

<p>Die Durchführung von effektbehafteten Ritualen muss immer von einem
Gamemaster überwacht werden, in dessen Ermessen es liegt, ob das Ritual Erfolg
hat und welche Effekte im Detail eintreten.</p>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="realism"></a></div>
<h2>Realismus</h2>

<p>Unabhängig von denen durch die Engine vorgegebenen Begrenzungen und
Möglichkeiten ist das Verhalten eines Charakters an die Spielwelt anzupassen.
Schwerter sind tödliche Waffen, Oger bleiben furchteinflößende Wesen und
Ackerbau harte Knochenarbeit, auch wenn ein Spieler mit der Engine
Herausforderungen leicht meistern kann. Es ist im Sinne der Spiellogik nicht
gestattet, NPCs im Rollenspiel zu ignorieren. So wird kein Verbrecher einen
anderen Charakter ausrauben, wenn dieser direkt neben einer NPC-Stadtwache
steht.</p>

<p>Handlungen eines Charakters sind nicht den technischen Bedingungen der Engine
anzupassen, um maximalen Erfolg zu erzielen. Charaktere müssen stets auf äußere
Einflüsse reagieren und dürfen nicht unbeaufsichtigt im Spiel belassen werden.
Sich unliebsamen Situationen, die nachteilige Folgen für den Charakter haben
könnten, durch Ausloggen zu entziehen, ist verboten.</p>

<p>Wenn ein Charakter niedergeschlagen oder 'getötet' wird, trägt er
Verletzungen davon, die auszuspielen sind. Im Falle des Niederschlagens sind das
leichte Verletzungen, im Falle des Todes sehr schwere. Diese Wunden sind solange
auszuspielen, bis die Lebenspunkte des Charakters wieder hergestellt sind.</p>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="charmixing"></a></div>
<h2>Charaktere vermischen</h2>

<p>Es ist generell nicht erlaubt, dass sich zwei Charaktere von einem Spieler
gegenseitig unterstützen. Daher dürfen zwischen diesen Charakteren keine
Gegenstände, auch nicht über Mittelsleute, ausgetauscht werden und die
Charaktere dürfen kein Wissen teilen. Außerdem können sich zwei Charaktere eines
Spielers nicht gegenseitig kennen oder verwandt sein. Es ist niemals gestattet,
sich mit zwei Charakteren gleichzeitig einzuloggen.</p>

<p>Es ist nicht gestattet, dass zwei Charaktere eines Spielers Mitglied in
derselben Gilde sind. Zwei Charaktere eines Spielers dürfen, um
Interessenkonflikten vorzubeugen, keinen Gruppen angehören, die sich gegenseitig
behindern oder direkt beeinflussen.</p>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="ooc"></a></div>
<h2>Out of character (OOC)</h2>

<p>Out of character ist generell alles, was nicht dem Handeln oder den Gedanken
des Charakters im Spiel entspringt. Aktionen im Spiel dürfen niemals durch
OOC-Einflüsse begründet sein, zum Beispiel dadurch, dass man einen anderen
Spieler nicht leiden kann. Das Herbeirufen von anderen Charakteren durch im
Spiel nicht vorhandene Möglichkeiten (z.B. Messenger) ist strengstens verboten.
Außerdem ist die Verwendung von Wissen untersagt, das der Spieler, jedoch nicht
der Charakter, erlangt hat. Der Spieler ist in der Pflicht nachzuweisen, dass
sein Charakter das Wissen im Spiel erworben hat.</p>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="language"></a></div>
<h2>Sprache eines Charakters</h2>

<p>Die Sprache muss dem Charakter und der Spielwelt angemessen sein und sollte
den Regeln der Rechtschreibung und der Grammatik so gut wie möglich folgen.
Moderne Ausdrücke sind ebenso wie Abkürzungen und "Leet-Speak" (z.B. "u g0t
pwn3d") zu unterlassen.</p>

<p>Das Schreiben oder Erzeugen von sinnlosen oder störenden Nachrichten und die
durchgehende Verwendung von Großbuchstaben als Betonung ist zu unterlassen
(z.B. "ICH BIN JETZT DRAN!").</p>

<p>Die Gespräche im Spiel sind aus Sicht des Charakters zu führen. Gespräche,
die nichts mit der Kommunikation der Charaktere zu tun haben (OOC), sind auf
ein absolutes Minimum zu begrenzen und im Flüstermodus durch doppelte Klammern
(( )) zu kennzeichnen.</p>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="emotes"></a></div>
<h2>Emotes</h2>

<p>Aktionen eines Charakters (z.B. Kämpfen, Handwerk) sind durch Emotes
einzuleiten und zu begleiten. Emotes beschreiben nur wahrnehmbare Handlungen und
Zustände. Emotes enthalten keine Meinungen, Gedanken und Gefühle des Charakters.
</p>

<p>So genannte Poweremotes, die anderen Charakteren ein Verhalten oder einen
Effekt aufzwingen und keine Möglichkeit des Reagierens bieten, sind verboten.
</p>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="pkilling"></a></div>
<h2>Player killing</h2>

<p>Das Angreifen von Charakteren ohne angemessenen und nachprüfbaren
Rollenspielgrund ist verboten. Das sofortige Töten eines Charakters direkt nach
einer Wiederbelebung ("reskilling") ist nicht erlaubt.</p>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="harm"></a></div>
<h2>Gewalt und nicht jugendfreie Darstellungen</h2>

<p>Gewaltverherrlichende, brutale, perverse oder sexuelle Schilderungen sind im
Spiel strengstens verboten. Außerdem dürfen durch alle Schilderungen im Spiel
die Wertvorstellungen und moralischen Grundsätze aller beteiligten Spieler und
zufälliger Zuhörer nicht verletzt werden.</p>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="behaivor"></a></div>
<h2>Verhalten</h2>

<p>Jegliche Belästigungen, Bedrohungen oder Beleidigungen, einschließlich
rassistischer oder sexistischer Äußerungen, werden nicht toleriert. Dies gilt
für alle Plattformen von Illarion: das Spiel, das Forum und den Chat,
einschließlich privater Nachrichten.</p>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="rulebreak"></a></div>
<h2>Reaktion auf Regelverstöße</h2>

<p>Auf Regelverstöße anderer Spieler darf nicht ebenfalls mit einem Regelverstoß
(z.B. OOC-Nachrichten) reagiert werden. Solche Verfehlungen werden völlig
unabhängig der Situation ebenfalls bestraft. Des Weiteren ist es nicht
erwünscht, dass Spieler andere Spieler für ihre Verstöße im Spiel zurechtweisen.
Wenn ein Verstoß gegen die Regeln von Illarion vorliegt, sollte das Team von
Illarion darüber informiert werden, um diesen Fall zu bearbeiten.</p>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="bugs"></a></div>
<h2>Ausnutzen von Spielfehlern</h2>

<p>Das bewusste Ausnutzen von Spielfehlern ist, egal mit welcher Absicht,
verboten. Wenn ein Fehler im Spiel gefunden wird, muss dieser an das Team von
Illarion gemeldet werden; vorzugsweise durch einen Eintrag im Bugtracker.
Sollten durch Bugs oder Serverabstürze Dinge oder Eigenschaften verloren gehen,
so werden diese nicht ersetzt.</p>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="attribs"></a></div>
<h2>Änderung von Attributen</h2>

<p>Wenn vom Spieler der Wunsch besteht, die Attribute eines Charakters zu
ändern, dann besteht dazu einmalig die Möglichkeit. Dazu muss bei einem
Gamemaster die Änderung angegeben werden. Generell werden nur Änderungen durchgeführt, 
bei denen höchstens vier Attribute um 'jeweils' maximal 2 Punkte geändert werden 
und bei denen die Summe aller Attribute erhalten bleibt.
Außerdem darf kein Attribut durch die Änderung auf einen Wert kleiner als 5
oder größer als 16 geändert werden.</p>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="gms"></a></div>
<h2>Gamemaster</h2>

<p>Gamemaster sind dafür zuständig, Spielern zu helfen, Events zu veranstalten
und für Ordnung im Spiel zu sorgen. Das Belügen eines Gamemasters oder das
Zurückhalten von Informationen in Bezug auf Regelverstöße und Programmfehler ist
verboten. Die Namen von Spielcharakteren eines Gamemasters oder eines anderen
Teammitglieds dürfen ohne seine Erlaubnis nicht genannt oder weitergegeben
werden, um seine Privatsphäre zu wahren.</p>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="boards"></a></div>
<h2>Foren</h2>

<p>Auf den Foren und dem Chat von Illarion gelten alle Regeln sinngemäß.
Das Erstellen von sinnlosen oder themenfremden Beiträgen ist zu unterlassen.</p>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="macros"></a></div>
<h2>Zusatzprogramme</h2>

<p>Die Verwendung von Programmen, die das Verhalten des Spiels beeinflussen und
so einen Vorteil für den Spieler bewirken, ist nicht gestattet.</p>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="copyright"></a></div>
<h2>Urheberrecht</h2>

<p>Der Quellcode der Java-Anwendungen (Client und Entwicklungstools) und die
Serversoftware sind unter der <a href="http://www.gnu.de/documents/gpl.de.html">
GPLv3</a> veröffentlicht und somit
<a href="http://illarion.org/development/de_opensource.php">öffentlich einsehbar</a>
und verwendbar. Alle anderen Inhalte von Illarion, das heißt alle Texte, die für
Illarion verfasst wurden, alle Scripte, Grafiken, Soundeffekte, Musik und die
Homepage gehören dem Illarion e.V. und sind damit urheberrechtlich geschützt,
soweit nicht explizit anders angegeben. Diese Inhalte dürfen ohne die Zustimmung
des Illarion e.V. nicht verwendet werden.</p>

<?php Page::NavBarBottom(); ?>
