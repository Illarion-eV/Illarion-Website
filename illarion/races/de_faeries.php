<?php
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php' );
	create_header( 'Illarion - Hintergrund - Client',
	'Rassen Illarions',
	'Hintergrund, Rassen, Geschichte', '', 'menu', '', true );
	include_header();
?>

<?php navBarTop( 'de_gnomes.php','de_story.php','de_goblins.php' ); ?>

<h1>Feen</h1>

<div class="menu">
	<ul class="menu_top">
		<li><a href="<?php echo $url; ?>/illarion/races/de_humans.php">Menschen</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/de_elfes.php">Elfen</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/de_halflings.php">Halblinge</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/de_dwarfs.php">Zwerge</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/de_orcs.php">Orks</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/de_lizards.php">Echsenmenschen</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/de_gnomes.php">Gnome</a></li>
		<li class="selected"><a href="<?php echo $url; ?>/illarion/races/de_faeries.php">Feen</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/de_goblins.php">Goblins</a></li>
		<li class="end" />
	</ul>
</div>

<table class="center"><tr><td><img src="<?php echo $url; ?>/shared/pics/races/fairy.png" alt="Fee"/></td></tr></table>
<?php cap(D); ?>
<p>as Volk der Feen ist seit Ewigkeiten bekannt, jedoch lebten sie immer sehr gut versteckt. Sie sind bekannt dafür,
Menschen meist harmlose Streiche zu spielen, auch wenn man sie nur selten entdeckt. Ihre geringe Größe und ihre Fähigkeit
zu fliegen machen es ihnen sehr leicht, sich in Büschen und in Blattwerk zu verstecken.</p>

<p>Weibliche Feen haben Schmetterlingsähnliche, mehrfarbige Flügel, während die Flügel der männlichen eher grasfarben oder
transparent sind. Sie verwenden ihre erstaunlich stabilen Flügel jedoch eher wie eine Libelle, weswegen sie in der Lage
sind auch bei starkem oder schnell wechselndem Wind in der Luft still zustehen. Fast keine Kreatur kann so schnell laufen
wie die Fee fliegen kann. Der Nachteil daran jedoch ist ihre sehr geringe Körperkraft. Da sie sehr klein und geradezu
zerbrechlich sind, geben sie sehr schlechte Nahkämpfer ab. Sie können jedoch, genau wie Echsen, jedes abgetrennte oder verstümmelte
Körperteil regenerieren – vor allem die Flügel, welche innerhalb von Zwei Wochen komplett nachwachsen, sollten sie einmal
abgetrennt werden.</p>

<?php cap(E); ?>
<p>ine gemeine Angewohnheit eines Grafen in Albar war einmal Feen zu jagen und zu einzusperren, um dann ihre abgeschnittenen
Flügel zu verkaufen. Da Feen jedoch in von Menschen besiedelten Gegenden sehr selten sind, wurden nur wenige gefangen. Er
starb jedoch ziemlich plötzlich, indem er einfach in Flammen aufging während er über einen öffentlichen Platz spazierte, just
nachdem das teure magische Schutzamulett um seinen Hals plötzlich in einem Regen von wunderschönen Farben explodierte. Danach
wurden alle seine Feen sehr schnell befreit. Es heißt, dass seine Tochter, welche sich mit diesen Kreaturen anfreundete, die
einzige weibliche Gräfin in Albar war, welche jemals im Stande war das Land ihres Vaters als Eigenbesitz zu beanspruchen.</p>

<?php cap(F); ?>
<p>een bewohnen vorzugsweise natürliche Gegenden, sie leben hauptsächlich in tiefen Wäldern. Man sagt, dass sie gerne in der Nähe
von Elfensiedlungen wohnen, beide Völker kommen sehr gut miteinander aus. Tatsächlich gibt es zwischen beiden Völkern seit Ewigkeiten
so etwas wie eine enge Allianz. Obwohl Feen normalerweise nicht sehr alt werden – in den Augen eines Elfen sind vier Jahrhunderte
keine sehr lange Zeitspanne – scheinen sich beide Rassen sehr gut zu verstehen und zu respektieren.</p>

<p>Feen kennen keine vererbbaren Adelstitel. Im Gegensatz zu den Elfen jedoch nennen sie ihre jeweiligen Herrscher Könige und
Königinnen. Diese sind immer ein paar – unverheiratete Feen würden niemals zum Herrscher gewählt werden. Die „Adeligen“, aus
welchen der Hof besteht, haben ihre Titel nicht geerbt, sondern bekamen die Ehre eines solchen Titels vom Königspaar verliehen,
nachdem sie ihn sich wohl verdient haben. Anders als bei Menschen jedoch besitzen solche Adeligen niemals Land, denn Feen sind
davon überzeugt, daß man Land nicht besitzen kann, weswegen sie Menschen oft für sehr dämlich halten.</p>

<?php cap(S); ?>
<p>o wie Elfen, haben Feen generell ein gutes Verständnis von Natur und Leben, normalerweise respektieren sie jedes Lebewesen.
Ihre Religion gleicht der der Elfen, obwohl es heißt, dass einige Feen auch den jüngeren Göttern folgen, vor allem Adron. Genau
wie Elfen, hegen sie verständlicherweise eine angeborene, sehr tiefe Abneigung gegen unnatürliche Dinge, wie zum Beispiel muffige
Untote, oder gemeine Dinge wie gefährliche Dämonen. Sie sind als Magier oft Naturtalente: Obwohl sie sich sehr schnell langweilen
und schnell die Konzentration verlieren wenn sie etwas zu lange studieren müssen, sind ihr natürliches Talent und ihre Neugierde enorm.</p>

<p>Im Allgemeinen mögen es Feen Spaß zu haben und sind sehr neugierig, aber auch vorsichtig und leicht zu verängstigen. Es heißt, dass
sie niemals vergessen ob jemand sie gut oder schlecht behandelt hat, und Feen sind dafür bekannt, ihre Schulden immer zu begleichen.
Bauern, welche in der Nähe von Wäldern wohnen in denen es Feen gibt, finden manchmal einen oder zwei Goldene Taler in Zeiten der Not,
wenn sie oder ihre Vorfahren freundlich zu den Feen waren, aber es heißt auch, dass Bauern, welche eine Fee betrügen wollten, auf ihren
Feldern nur noch enorme Disteln und Brennnesseln ernten konnten.</p>

<?php insert_go_to_top_link(); ?>

<?php include_footer(); ?>
