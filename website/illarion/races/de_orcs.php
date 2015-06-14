<?php
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php' );
	create_header( 'Illarion - Hintergrund - Orks',
	'Rassen Illarions',
	'Hintergrund, Rassen, Geschichte', '', 'menu', '', true );
	include_header();
?>

<?php navBarTop( 'de_dwarves.php','de_story.php','de_lizards.php' ); ?>

<h1>Orks</h1>

<div class="menu">
	<ul class="menu_top">
		<li><a href="<?php echo $url; ?>/illarion/races/de_humans.php">Menschen</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/de_elves.php">Elfen</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/de_halflings.php">Halblinge</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/de_dwarves.php">Zwerge</a></li>
		<li class="selected"><a href="<?php echo $url; ?>/illarion/races/de_orcs.php">Orks</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/de_lizards.php">Echsenmenschen</a></li>
		<li class="end" />
	</ul>
</div>

<table class="center"><tr><td><img src="<?php echo $url; ?>/shared/pics/races/orc_m.png" alt="männlicher Ork"/></td><td> </td><td><img src="<?php echo $url; ?>/shared/pics/races/orc_f.png" alt="weiblicher Ork"/></td></tr></table>
<?php cap(D); ?>
<p>er normale Ork ist ein wenig kleiner als ein Mensch. Ihre Haut ist grünlich und zwei von ihren unteren Kieferzähnen
sind länger als die anderen und reichen ein wenig über die Lippen.</p>

<p>Ihre Gesellschaft kann nicht als organisiert beschrieben werden, tatsächlich besteht sie aus unterschiedlichen Stämmen.
Die meisten dieser Stämme leben als Nomaden in einem bestimmten Gebiet, in welchem sie mit ihren Herden reisen. Schweine
und Schafe sind ihre Hauptnahrung.</p>

<?php cap(O); ?>
<p>rks bauen keine Häuser, sie ziehen es vor, in Höhlen zu leben. Das Territorium eines Orkstammes umfasst normalerweise
eine Anzahl von natürlichen Höhlen, welche noch zusätzlich erweitert wurden, und künstlichen Stollen, welche in den Boden
gegraben wurden. Einige Orks haben sich auf das Graben nach Eisen und Kohle spezialisiert und finden manchmal seltenere
Metalle oder sogar ein paar Edelsteine. Der Großteil des Stammes wechselt die Wohnhöhle im Wechsel der Jahreszeiten, doch
einige Individuen, wie Schamanen, Ältere oder der Stammesführer leben das ganze Jahr über in der selben Höhle oder manchmal
auch in einer Hütte.</p>

<?php cap(D); ?>
<p>ie meisten größeren Orkstämme sind in Unterstämme aufgeteilt, die angeführt werden von einer Art Unteranführer.
Der Stammesführer ist häufig der Stärkste und zählt zu den Älteren im Stamm, denn durch seine Kraft und die in langen
Jahren gesammelte Erfahrung kann er sich gegen Widersacher auch aus den eigenen Reihen behaupten. Er herrscht uneingeschränkt
und versucht jede Form von Machtanspruch zu unterdrücken. Gewöhnlich ist aber der Schamane der wahre Anführer des Stammes.
Durch seine Klugheit kann er den Anführer beeindrucken und manipulieren. Er spinnt ein filigranes Netz von Beziehungen,
bleibt selbst aber im Hintergrund, und kann durch diese indirekte Einflussnahme die Richtung des Stammes beeinflussen.
Manchmal reicht aber auch einfach das Brauen von Bier, um den Anführer auf seine Seite zu bringen.</p>

<?php cap(D); ?>
<p>ie meisten Orkstämme sind ziemlich arm, was sich wiederum in ihrem Lebensstil widerspiegelt. Über die Jahrhunderte
haben sie eine rudimentäre Schrift entwickelt, bestehend aus verschiedenen Symbolen und geritzte Zeichen. In Kriegszeiten
entwickelte ein orkischer Stammesanführer eine verschlüsselte Sprache, die es Verbündeten erlaubte, Nachrichten auszutauschen,
ohne dem Feind die Möglichkeit zu geben, diese zu lesen.</p>

<p>Die meisten Orkstämme verehren unterschiedliche Götter. Oldra ist für die meisten Stämme die Göttin des Wachstums und der
Erneuerung und wird im Frühling angebetet. So wird sie von ihnen auch häufig die Frühlingsgöttin genannt.</p>

<p>Im Sommer verehren sie Brágon, den "täglich–Sonnen–Macher" oder "Stark–im–Sommer". Da Sommerzeit für einen Orkstamm
oft Kriegszeit bedeutet, beten einige Moshran, genannt "Knochenbrecher" oder einfach "Blutgott", an. Entweder Moshran
oder Malachín ist der Kriegsgott eines Stammes, manchmal beide.</p>

<p>Im Herbst beten die meisten Stämme zu Malachín, dem "Jäger", für eine gute Jagd und um sich auf den harten Winter
vorzubereiten. Die Winterhöhlen müssen mit Nahrung für den Stamm und seine Herden gefüllt werden.</p>

<p>Im Winter leben die Stämme in ihren Winterhöhlen und Cheerga ist die verehrte Göttin. Der Winter ist die Zeit des Todes,
Zeit der Geister, Zeit der Ahnen. Einige Ahnenschädel werden in den Winterquartieren an heiligen Orten platziert und manche
auch in den Räumen des Anführers und des Schamanen, um ihnen bei ihren Entscheidungen zu helfen. Sie sind auch Bestandteil
der Traumrituale, in denen der Schamane direkt zu den Ahnen sprechen kann.</p>

<?php cap(M); ?>
<p>it Ausnahme der Sommerzeit versuchen die Orkstämme bewaffnete Auseinandersetzungen zu vermeiden. Kriege sind dabei
oft territoriale Konflikte zwischen den verschiedenen Stämmen, da in den kargen Gebieten der Orks der Umfang an Landbesitz
das Überleben sicherstellt. Diese Konflikte beinhalten Spionage, das Stehlen von Tieren und auch Schlachten. Trotzdem enden
diese Kriege nur sehr selten mit vielen Toten, sondern haben sich eher zu einer Art Sport und Training für die Kämpfer
entwickelt. So finden jedes Jahr im Monat Malas die großen Wettkämpfe statt, bei denen der stärkste Clan ermittelt wird.
Trotzdem ist die Teilnahme an diesen Wettkämpfen nicht ungefährlich, wie die zum Teil tödlichen Verletzungen und dauerhaften
Verstümmelungen bezeugen.</p>

<?php cap(D); ?>
<p>a die Stämme ziemlich arm sind, neigen sie dazu, manchmal kleine Dörfer oder Farmen zu überfallen, wenn sie nicht genügend
Nahrung für den nächsten Winter haben. Normalerweise sind Orks nicht blutrünstig, aber wenn sie mit anderen Rassen kämpfen,
ist ihre primäre Kampftaktik, Furcht unter ihren Feinden zu verbreiten. Gefangene, welche tödlich verwundet wurden und keine
Überlebenschance mehr haben, werden nach einer Schlacht manchmal vor den Augen der anderen Gefangenen brutal umgebracht. Dann
wird einigen von diesen Gefangenen, welche im Kampf außerordentliche Stärke und ein mutiges Herz gezeigt haben, die Möglichkeit
gegeben zu fliehen, um die Neuigkeiten zu verbreiten und auf diese Weise Furcht in die Herzen des Feindes zu bringen. Die anderen
werden als Sklaven verkauft oder werden persönliche Diener (meist Bauern und Köche) oder helfen den Frauen bei ihrer Arbeit.
Wenn der Sklave es wert ist und gute Arbeit oder Stärke zeigt, ist er von starkem Blut und möglicherweise wird ihm eines Tages
die Wahl gegeben, den Stamm zu verlassen. In sehr großen Ausnahmefällen kann es sogar dazu kommen, dass ein Sklave eine Orkin
heiratet. Er wird damit gleichzeitig ein freies Mitglied des Stammes, wodurch man auch verschiedenen Halborks begegnen kann.</p>

<?php cap(O); ?>
<p>rks haben ein anderes Verständnis von "Kunst" als es Menschen oder Elfen haben. Orkische "Poesie" folgt keinen Reimen,
sondern erzählt Geschichten und erzeugt disharmonische Geräusche, um die Situation zu untermalen oder zu beschreiben.
Dasselbe gilt für orkische Musik. Die Melodien, die ein Ork mit Flöte oder Trompete erzeugt, kann man bestenfalls als "laut"
bezeichnen, denn sie nutzen die meisten Instrumente nur aus Spaß und um laute Geräusche hervorzubringen. Orks lieben insbesondere
den Klang der Trommeln. "Normale" Lieder, wenn sie von einem guten Barden gespielt werden, können einen Ork auch faszinieren,
aber es kann ihm sonderbar erscheinen, wie es Musik aus einer anderen Kultur immer tut.</p>

<?php cap(O); ?>
<p>rks haben eine sehr direkt Art mit Dingen umzugehen. Ihrer Meinung nach ist es am besten, wenn ein Mann ohne Umschweife sagt,
was er meint und nicht noch viele und unnütze Worte dabei macht. Gewisse Höflichkeitsformen, wie zum Beispiel die metaphorische
Sprache der Elfen und die sehr ausgeklügelte Hofsprache der Menschen, sind ihnen daher ungewohnt. So kann es hier leicht zu
Missverständnissen kommen. Trotzdem greift ein Ork normalerweise nicht sofort zu seinem Schwert, wenn er von einem Vertreter
einer anderen Rasse beleidigt wird. Man muss sich schon sehr Anstrengen, um einen Ork in Rage zu versetzten, da ihr Umgangston
untereinander sehr rau ist. Anders herum können schon eher Konflikte provoziert werden, weil die Toleranzschwelle der anderen Rassen,
vielleicht nur mit Ausnahme der Zwerge, viel niedriger ist. Empfindlich reagiert ein Ork nur bei Beleidigungen des eigenen Stammes
oder der Rasse.</p>

<?php insert_go_to_top_link(); ?>

<?php include_footer(); ?>
