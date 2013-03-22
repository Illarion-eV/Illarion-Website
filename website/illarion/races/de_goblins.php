<?php
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php' );
	create_header( 'Illarion - Hintergrund - Client',
	'Rassen Illarions',
	'Hintergrund, Rassen, Geschichte', '', 'menu', '', true );
	include_header();
?>

<?php navBarTop( 'de_faeries.php','de_story.php','' ); ?>

<h1>Goblins</h1>

<div class="menu">
	<ul class="menu_top">
		<li><a href="<?php echo $url; ?>/illarion/races/de_humans.php">Menschen</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/de_elfes.php">Elfen</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/de_halflings.php">Halblinge</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/de_dwarfs.php">Zwerge</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/de_orcs.php">Orks</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/de_lizards.php">Echsenmenschen</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/de_gnomes.php">Gnome</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/de_faeries.php">Feen</a></li>
		<li class="selected"><a href="<?php echo $url; ?>/illarion/races/de_goblins.php">Goblins</a></li>
		<li class="end" />
	</ul>
</div>

<table class="center"><tr><td><img src="<?php echo $url; ?>/shared/pics/races/goblin_m.png" alt="münnlicher Goblin"/></td><td> </td><td><img src="<?php echo $url; ?>/shared/pics/races/goblin_f.png" alt="weiblicher Goblin"/></td></tr></table>
<?php cap(G); ?>
<p>oblins scheinen entfernt mit Orks verwandt zu sein, sind jedoch kleiner, etwas flinker und manchmal ein bisschen schlauer
als Diese. Sie haben große Augen, Ohren und Mäuler. Ihr ganzer Körper mit Ausnahme des Gesichtes, welches aus weicher,
grünlich–bräunlicher ledriger Haut besteht, ist mit einem kurzen Fell bedeckt. Üblicherweise sind ihre Stimmen recht
quietschig, und manche Goblins sind dafür bekannt, sehr störend und erstaunlich laut zu heulen, wenn irgendetwas beängstigendes
oder gemeines passiert.</p>

<?php cap(G); ?>
<p>oblins sind klein, nicht wirklich stark und nur durchschnittlich intelligent. Normalerweise Leben sie in einer Art Familien–Clan,
dessen Führungsart variiert. Goblins sind nicht böse und hassen jegliche Art von „langweiliger“ Religion und haben dabei einen
schlechten Geschmack in Sachen Mode, sowie einen Sinn für Hygiene, der beinahe an den der Orks heran reicht. Sie neigen dazu,
Dinge lecker zu finden, die andere Kreaturen nicht einmal anfassen würden und haben manchmal einen Hang dazu, Gefallen an
einfachen, pieksigen Gegenständen, wie etwa einem rostigen Schwert oder einem kurzen Speer, zu finden. Manchmal werden Goblins
von Orks gefangen genommen und in den Stämmen als Sklaven gehalten. Deshalb fürchten sich die meisten von ihnen ziemlich vor
Orks. Eigentlich kann man sagen, dass Goblins Angst vor fast Allem haben, nur nicht vor Halblingen, welche sie für ihre erstklassige
Kochkunst nahezu anhimmeln. Mit ihrem guten Geruchssinn und ihren flinken, geschickten Fingern geben sie gute Alchemisten, Handwerker
und Diebe ab – wenn sie es erst einmal schaffen, sich lange genug zu konzentrieren um es zu lernen. Für gewöhnlich gehen aus ihren
Reihen keine wirklich talentierten Magier hervor. Und auch wenn einige wenige von ihnen tatsächlich für ihren meisterhaften Umgang
mit Runen und Zaubersprüchen bekannt sind, ist das doch sehr selten. Momentan ist der Posten eines hohen Lor–Angur–Erzmagiers von
einem Goblin besetzt, dem man große Weisheit nachsagt – aber wie er es geschafft hat zu einem wirklich begabten Magier zu werden,
ist ein großes Abenteuer und eine lange Geschichte.</p>

<?php cap(G); ?>
<p>oblins leben nicht in Städten oder ähnlichem, sondern in kleinen Ansiedlungen die für gewöhnlich fast überall gefunden werden
können. Manche dieser Niederlassungen können räuberische Gewohnheiten entwickeln und zu einer Gefahr für die Umgebung werden,
weshalb Goblins meist nicht gerne gesehen werden.</p>

<p>In Albar allerdings werden Goblins gerne gesehen – in Grubenkämpfen, wo sie versuchen müssen im Kampf gegen Hunde, Wölfe und
andere Tiere zu bestehen. Intelligentere Goblins werden manchmal als Sklaven oder, wegen ihres guten Geruchssinns, als eine Art
Jagdhund eingesetzt.</p>

<p>Manche eher zivilisierte Goblins leben sogar in gynkesischen oder salkmaerischen Städten unter Menschen. Diese zivilisierten
Goblins arbeiten dort oft als erstaunlich gut gesittete, nahezu vornehme Diener oder Dienstboten, als Kuriere und begabte
Händler oder als durchaus respektierte Alchemisten.</p>

<?php insert_go_to_top_link(); ?>

<?php include_footer(); ?>
