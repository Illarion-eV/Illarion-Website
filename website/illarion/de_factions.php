<?php
   include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';

   Page::setTitle( 'Reiche' );
   Page::setDescription( 'Übersicht über die Reiche im Spiel.' );
   Page::setKeywords( array( 'Fraktionen', 'Reiche', 'Cadomyr', 'Galmair', 'Runewick' ) );

   Page::setXHTML();
   Page::Init();
?>
<h1>Die Reiche</h1>

<h2>Inhalt</h2>
<ul>
<li><a class="hidden" href="#0">Die Welt Illarion</a></li>
<li><a class="hidden" href="#1">Cadomyr - Reich von Ruhm und Ehre</a></li>
<li><a class="hidden" href="#2">Galmair - Reich des aufstrebenden Wohlstands</a></li>
<li><a class="hidden" href="#3">Runewick - Reich der Weisheit und Magie</a></li>
</ul>

<h2><a name="0"></a>Die Welt Illarion</h2>

<a href="<?php echo Page::getURL(); ?>/general/de_map_of_illarion.jpg"><img align="center" width="400" height="331" src="<?php echo $url; ?>/general/de_bigthumb_map_of_illarion.jpg" alt="Karte von Illarion"/></a>

<h2><a name="1"></a>Cadomyr - Reich von Ruhm und Ehre</h2>

<img align="left" vspace="10" hspace="20" src="<?php echo $url; ?>/shared/pics/factions/cadomyrShieldDirt150.png" alt="Cadomyr"/>

<p>Umgeben von den unüberwindbaren Namenlosen Bergen und dem Großen Meer erheben sich die mächtigen Mauern Cadomyrs aus dem Wüstensand. Das blaue Band des Kantabiflusses fließt von den Namenlosen Bergen herab und durchschneidet die Kantabiwüste, wobei der Strom das Reich Cadomyr begrenzt, bevor er sich im Kantabidelta verliert und in das Meer ergießt. Die brennende Sonne wird von den glatten Sandsteinmauern der Stadt zurückgeworfen. Beeindruckende Gemälde und Standbilder zeugen von den glorreichen Heldentaten vergangener Herrscher.</p>

<p>Geschützt von wehrhaften Mauern liegt der königliche Palast, Heimstätte der Königin Rosaline Edwards. Sie ist die Tochter von Sir Reginald, dem Letzten einer Linie erlauchter Könige von Albarischem Geblüt, welche die Trutzburg in der Wüste regiert. Das Erbe vieler Feldzüge und ein strikter Ehrenkodex bewahren die althergebrachten Bräuche. Die Blutlinie wird von einer stolzen und zielstrebigen Königing fortgeführt, manche sagen, sie sei von den Göttern selbst gesegnet. Als Frau beeindruckender Ehre und somit auch Macht, ist Königin Rosaline Edwards die unumstrittene Herrscherin von Cadomyr. Sie gebietet über die Kraft zweier Edelsteine der Macht, den Amethysten und den Topas.</p>

<p>Für jeden mächtigen Krieger arbeitet ein einfacher Handwerker und hier stellt Cadomyr keine Ausnahme dar. Die Minen 'Freiheitsbruch' und 'Grundstein der Aufrichtigkeit' liefern gemeinsam mit der Wüste reichliche Bodenschätze für Gräber, Glasbläser, Edelsteinschleifer und Feinschmiede. Bergarbeiter, Schmiede, Steinmetze, Ziegelbrenner, Schneider und Kräuterkundige kommen ebenfalls auf ihre Kosten in Cadomyr.</p>

<p>Malachín, Gott der Jagd und der Schlachten, wird allen anderen Göttern in Cadomyr vorgezogen. Zhambra, Gott der Freundschaft und des Vertrauens, sowie Sirani, Göttin der Liebe und der Freude, werden ebenfalls hoch geschätzt. In dieser hierarchischen Gesellschaft ist der Rang von entscheidender Bedeutung für die Königin, welche, nur unterstützt von einer Handvoll Aristokraten, unabdingbare Loyalität von ihren Untertanen erwartet. Jeder hat seinen Platz in der Gesellschaft und sollte sich mit seinem Los abfinden. Da ruchlose Mitglieder der Herrscherkaste nach der Gunst der Königin gieren, sollte man sich als Untertan hüten, die alten Sitten zu missachten oder die Edikte der Königin in Frage zu stellen.</p>

<?php Page::insert_go_to_top_link(); ?>

<h2><a name="2"></a>Galmair - Reich des aufstrebenden Wohlstands</h2>

<img align="right" vspace="10" hspace="20" src="<?php echo $url; ?>/shared/pics/factions/galmairShieldDirt150.png" alt="Galmair"/>

<p>Eingrahmt von den Ausläufern der Namenlosen Berge, vereinen sich die beeindruckenden Mauern Galmairs mit Felshängen zu einer respekteinflößenden Festung. Der Malachitbach fließt durch das Territorium Galmairs um dem Grenzstrom zuzufließen, welcher sich aus der Syritabucht ergießt und die Nargunebene begrenzt. Einst von Zwergenhand geschaffen, liegt ein guter Teil der Stadt unter der Erde. Geräumige Hallen und Tunnel erstrecken sich bis tief in die Berge.</p>

<p>Im Herzen Galmairs liegt Galmairs Krone, Heim von Don Valerio Guilianni. Er ist der Sohn von Tommaso Guilianni, eines erfolgreichen gynkesischen Händlers, welcher in seiner Gier nach unermesslichen Reichtum Galmair als Ort des Handels gründete. Als sein rechtmäßiger Erbe kam Valerio Guilianni an die Macht, nachdem sein Vater eines unerwarteten Todes starb. Gerüchten zufolge soll eine Familienfede und ein weiterer möglicher Erbe sein Ableben beschleunigt haben. Reich und mächtig, das ist der Zwerg Don Valerio Guilianni, welcher über die Kraft zweier Edelsteine der Macht verfügt, des Saphirs und des Obsidians.</p>

<p>Galmair lebt vom regen Handel und jeder Handwerker und Händler kann hier sein Glück finden. Traditionelles Zwergengewerke wie das Schmieden, der Bergbau, Steinmetzkunst, Ziegelbrennen und das Brauen dominieren die Stadt, welche ihren Reichtum auch aus der Malachitmine und der Dunkellochmine zieht. Feinschmiede, Edelsteinschleifer, Schreiner, Holzfäller, Köche, Bäcker und Bauern können es in Galmair ebenso zu Reichtum bringen.</p>

<p>Viele hängen Irmorom, dem Gott des Handels und des Handwerkes an. Andere verehren Nargun, den Gott des Chaos, und Ronagan, Gott der Diebe und der Schatten. Frei von den Fesseln eines niedergeschriebenen Gesetzes, steifen Gebräuchen oder eines Ehrenkodexes, ist in Galmair jeder willkommen, der seine Steuern zahlt. Alles und jeder hat seinen Preis und in den Schatten kann man reichlich ungewöhnliche Waren und auch Dienste erstehen. Ein flüchtiger Blick in die dunklen Gassen oder in das sogenannte Tolloch erinnert einen an die dunkle Seite des Lebens in Galmair.</p>

<?php Page::insert_go_to_top_link(); ?>

<h2><a name="3"></a>Runewick - Reich der Weisheit und Magie</h2>

<img align="left" vspace="10" hspace="20" src="<?php echo $url; ?>/shared/pics/factions/runewickShieldDirt150.png" alt="Runewick"/>

<p>Mitten in einem Archipel bewaldeter Inseln erheben sich Runewicks Türme über fruchtbarem Land und weitgestreckten Waldwiesen. Hinter der Lunordbrücke liegt das Bauerndorf Eibenthal und der Hafen Runewicks am Eingang der Schlangenkopfbucht. Tiere grasen friedlich bis hin zu den Morgentausümpfen. Einst gegründet durch den Erzmagier Elvaine Morgan, stellen die Türme einen erhabenen Platz des Lernens dar, welcher sich über der geschäftigen Stadt erhebt.</p>

<p>Oben im Turm des Feuers residiert Erzmagier Elvaine Morgan in der Halle der Elara. Ursprünglich gründete er Runewick als Akademie zusammen mit einer Gruppe Magier aus der wohlbekannten Stadt der Magie, Lor Angur. Gemeinsam bilden die Türme der Erde, des Feuers, der Luft und des Wassers eine erhabene arkane Struktur, in der unzählige, kostbare Bücher und Manuskripte in großen Bibliotheken und Studierstuben aufbewahrt werden. Der Elf von immenser Weisheit und Macht ist der uneingeschränkte Herrscher Runewicks und macht sich die Magie zweier Edelsteine der Macht zu Nutzen, des Rubins und des Smaragdes.</p>

<p>Eine Vielzahl von Handwerkern arbeitet an der Seite der Magier und Gelehrten, welche in Runewicks Bibliotheken studieren. Schreiner, Holzfäller, Schneider, Bauern, Köche, Bäcker, Kräuterkundige und Kerzenzieher erfreuen sich an den weitläufigen Wäldern, Herden und gutem Ackerboden rund um die Stadt. Aber auch Brauen, Fischfang und Glasblasen ist nicht unüblich in Runewick.</p>

<p>Elara, Göttin der Weisheit und des Wissesn, wird als Patronin Runewicks angesehen. Andere beten eher Oldra, die Göttin des Lebens und der Fruchtbarkeit, oder Adron, Gott des Weines und der Fest, an. Das geschriebene Gesetz macht Runewick zu einer aufgeklärten Stadt, doch nur wenige würden es wagen, sich gegen das grenzenlose Wissen des Gründervaters aufzulehen oder seinen Rat nicht zu befolgen. Verstreute Ruinen zeugen jedoch davon, dass selbst ein Hort der Weisheit nicht vor Unglück gefeit ist, vor allem nicht vor selbstverursachter Pein.</p>

<?php Page::insert_go_to_top_link(); ?>