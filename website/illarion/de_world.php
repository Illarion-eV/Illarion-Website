<?php
   include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';

   Page::setTitle( 'Die Welt' );
   Page::setDescription( 'Übersicht über die Spielwelt.' );
   Page::setKeywords( array( 'Welt', 'Illarion', 'Karte', 'Cadomyr', 'Galmair', 'Runewick' ) );

   Page::setXHTML();
   Page::Init();
?>
<h1>Die Welt Illarion</h1>

<h2>Inhalt</h2>
<ul>
<li><a class="hidden" href="#0">Weltkarte</a></li>
<li><a class="hidden" href="#1">Der Norden</a></li>
<li><a class="hidden" href="#2">Der Osten</a></li>
<li><a class="hidden" href="#3">Das Zentrum</a></li>
<li><a class="hidden" href="#4">Der Süden</a></li>
</ul>

<h2><a name="0"></a>Weltkarte</h2>

<center><a href="<?php echo Page::getURL(); ?>/general/de_map_of_illarion.jpg"><img width="600" height="497" src="<?php echo $url; ?>/general/de_bigthumb_map_of_illarion.jpg" alt="Karte von Illarion"/></a></center>

<?php Page::insert_go_to_top_link(); ?>

<h2><a name="1"></a>Der Norden</h2>

<p>Hoch über den gezackten Gipfeln der Namenlosen Berge verlässt ein Adler seinen Horst. Schneebedeckte Gipfel, die das Firmament durchbrechen, grenzen die Halbinsel ab und dominieren die tiefer liegenden Steppen, Wälder und Wüsten Illarions. Majestätisch kreist der Adler über dem Chaos unerklärlicher Wunder und undenkbaren Grauens, das sich unter ihm abspielt.</p>

<p>Aus der Hochebene Galmairs fließt der Malachitbach hinab auf die Nargunebene, um sich dem [u]Mächtigen Strom[/u] anzuschließen. Tief versteckt in den Gebirgsausläufern und hinter verstärken Mauern, die sich mit den felsigen Ausläufern verbinden, liegt die Händlerstadt Galmair. Zahllose Eingänge führen in das Innere von Höhlen, Tunneln und Minen, die tief in die Berge geschnitten sind - eine geschäftige Welt, die für den dahingleitenden Adler nur wenig Bedeutung hat. Im Norden der stinkenden Sümpfe erkennen die scharfen Augen des Adlers den Hafen Galmairs und die Eingänge zum Tempel der Fünf. Dort, wo das Land in der Syritabucht von den Wellen eingeschlossen wird, zieren weit verstreute Inseln den Horizont.</p>

<p>Die üppigen Grassteppen der Ebene der Stille dehnen sich weit nach Osten aus, bis hin zu den Nördlichen Wäldern, durchbrochen einzig durch den Syritakanal, der das Land auf seinem Fluss zum [u]Mächtigen Strom[/u] tief durchschneidet. Während der Adler schwerelos über die Wälder hinweggleitet, kreist er einige Male neugierig über der Lichtung, die als Rabans Hain bekannt ist. Weiter im Norden stößt der Vogel ein stechendes Kreischen aus, als er über den mächtigen Festungswänden des Unüberwindbaren Limes plötzlich abdreht, die die übrigen Teile der Halbinsel abtrennen. Selbst in solch großer Höhe wagt es der mächtige Adler nicht, in die Wolken über dem düster anmutenden, tiefen Wald einzudringen.</p>

<?php Page::insert_go_to_top_link(); ?>

<h2><a name="2"></a>Der Osten</h2>

<p>Die Wellen schlagen gegen die Ostküste, welche die Nördlichen Wälder abgrenzt. Die felsigen Ausläufer, die als Fels des Bösen bekannt sind, steigen hoch aus dem Ozean auf und dominieren so die Landschaft am Horizont. Auf seinem Weg in Richtung Süden fliegt der Adler weiter über den isolierten Nordhafen und die Schulterplatteninsel mit ihren verstreuten Ruinen und unruhigen Friedhöfen. Aus dem Ozean erstreckt sich das Sumpfgebiet, in dem sich die Ruinen lange vergessener Tempel befinden und formt das nördliche Ufer des [u]Mächtigen Stroms[/u]. Weiter landeinwärts, wo der [u]Mächtige Strom[/u] und der Glühende Fluss im Spinnenmaul zusammenfließen, liegt auf einer Insel inmitten der sich hier überkreuzenden Routen zu allen drei Reichen der Gasthof zur Hanfschlinge.</p>

<p>Am Südufer des [u]Mächtigen Stroms[/u], grenzt die Totenebene an die üppige Elsbaumebene und wird von einem mächtigen Berg beschattet, der nur für Igruks Höhle und die Gefahren in deren Inneren bekannt ist. Der Adler gleitet hoch über den mächtigen Bäumen des Elsbaumwaldes dahin, unberührt von vielen der mysteriösen Zauber, die sich unter den Baumkronen verbergen. Die Graslandschaft des Ostlandes trennt das riesige Waldgebiet von der windigen Küste. Vom isolierten Osthafen aus, fliegt der Adler zwischen den Zwillingsbergen und der für manche als Wunderland bekannten Kuriosität hindurch, ehe er auf den Morgentausumpf zugleitet.</p>

<p>Die Stadt Runewick befindet sich, umgeben von fruchtbaren Feldern und üppigen Wiesen, inmitten eines Archipels waldiger Inseln. Der Adler gleitet über den Flickenteppich aus verstreuten Gebäuden und Brücken dahin, den weisen Worten, die in die Bücher der Bibliotheken unter ihm geschrieben sind, ungewahr. Hinter der Lunordbrücke liegt die Bauernsiedlung, die als Eibenthal bekannt ist und der Hafen Runewicks, der sich am Eingang zur Schlangenkopfbucht befindet. Jenseits des plätschernden Anthilbaches findet man die Bärenhöhle und die sanften Hügel der [u]Frohen Wiesen[/u].</p>

<?php Page::insert_go_to_top_link(); ?>

<h2><a name="3"></a>Das Zentrum</h2>

<p>Der Adler steigt scharf auf und macht einen weiten Bogen um den Drachenhort, wohl wissend um die Macht, die sich in dessen Inneren verbirgt. Lava fließt aus dem Vulkan und zerstört das Land entlang der nördlichen Flanke der Berge. Das faulige Sumpfland des Todesgestanks breitet sich bis zu den [u]Dreifingerspitzen[/u] aus, die in die Schlangenkopfbucht hineinragen. Weiter entlang der Schlangenkopfküste, ragt der Schlangenkopfberg in die Höhe und überblickt die Bucht und die zahlreichen, verstreuten Inseln darin.</p>

<p>Weiter Richtung Norden, auf die Grenzberge zufliegend, entdecken die scharfen Augen des Adlers die Elfenruinen, die zwischen den Bäumen versteckt liegen. In den Bergen liegen die Eingänge zu [u]Cherass Zitadelle[/u] und der [u]Glitzernden Höhle[/u]. Der Adler dreht ab und fliegt gegen den Lauf des Glühenden Flusses auf seinem Weg durch die Ostflanke der Grenzberge. Im Schatten der felsigen Ausläufer, fliegt der Adler ungehindert über die Schneise der Verwüstung hinweg, die als Todesschneise bekannt ist. Wasser quillt aus der Leuchtenden Pforte und durchschneidet den Lavafluss im Leuchtenden Wald darunter und die darüber aufsteigenden Dämpfe hüllen die krummen Überreste eines längst abgestorbenen Waldes ein. Während der Adler über den Wichtkanal und den lodernden Flammenwall fliegt, zieht er neugierig Kreise über den Ruinen, die sich entlang der westlichen Küste der Schlangenkopfbucht befinden, wo das einzige noch intakte Gebäude der Leuchtturmhafen zu sein scheint.</p>

<p>Von den südlichsten Gebirgsausläufern aus gleitet der Adler über dem Wachtwald dahin, der sich schützend an der Westküste der Schlangenkopfbucht ausbreitet. Über den Baumwipfeln abdrehend, zieht der Adler entlang der Küste zurück, wo die Einsamen Inseln, weit draußen auf dem Großen Ozean, den Horizont zieren. Dort, wo sich die Grenzberge im Süden bis in die Namenlosen Berge erstrecken, bilden sie die östliche Grenze zur Kantabiwüste. Zahlreiche Höhleneingänge zeichnen die Berglandschaft und deuten auf die Monster und Kriminellen hin, die in ihnen Zuflucht finden. Tief unter den Bergen vergraben, liegt das Schattenland, dessen Schrecken dem dahingleitenden Adler unbekannt sind.</p>

<?php Page::insert_go_to_top_link(); ?>

<h2><a name="4"></a>Der Süden</h2>

<p>Im Südwesten Illarions herrscht die Kantabiwüste vor, die sich von den Bergen bis zum Ozean erstreckt. Der Adler fliegt über den verlassenen Gebieten hinweg, die mit den Ruinen von Siedlungen und lange verlassenen Arbeitslagern übersäht sind, die auf bessere Zeiten hindeuten, ehe Kriminelle sich dort wie die Kakerlaken ausbreiteten. Irgendwo aus den Höhen der Namenlosen Berge quellend, schneidet der Kantabifluss durch die Wüste, auf seinem Weg in Richtung des Großen Ozeans, wo er auseinander fließt und das fruchtbare Kantabidelta bildet. Der ominöse Berg Letma erstreckt sich dort in die Höhe und überblickt das Delta und die Katainsel, während die Wellen des Großen Ozeans an seinen felsigen Ausläufern zerschellen.</p>

<p>Während der Adler abdreht und die Küste entlang fliegt, kommt er am nunmehr Verlorenen Hafen vorbei und überquert die Mündung mit dem neuen Hafen Cadomyrs. Weiter im Norden liegt das Kap des Abschieds und Fabers Wachhaus dient als letzter Aussichtspunkt zur Piratenbucht. Flankiert von den unüberwindbaren Namenlosen Bergen und dem Großen Ozean, erheben sich Cadomyrs beeindruckenden, glatten Festungswälle aus dem goldenen Sand und reflektieren die brennend heißen Strahlen der Wüstensonne. Banner wehen stolz von den Zinnen und wachen über die Monumente der glorreichen Taten vergangener Herrscher, während der Adler, unberührt von der unter ihm befindlichen Hierarchie, über ihnen hinweggleitet.</p>

<p>In majestätischem Flug zieht der Adler über die Wipfel und Bergspitzen zurück zu seinem Horst. Von seiner luftigen Perspektive aus, blickt er unberührt auf Eiffersucht, Verrat und Neid herab, die die Machtkämpfe zwischen den Reichen antreiben. Jeden Tag zieht er über Illarion seine Kreise und beobachtet alles, das passiert und bleibt dabei doch stets außerhalb der Reichweite des Chaos, das unter ihm herrscht. Einige behaupten, die Götter würden über uns wachen, aber die Meisten sind zu beschäftigt mit ihren eigenen Problemen, um auch nur den aufsteigenden Adler zu bemerken.</p>

<?php Page::insert_go_to_top_link(); ?>