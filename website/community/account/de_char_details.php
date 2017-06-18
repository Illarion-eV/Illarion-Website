<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	IllaUser::requireLogin();

	includeWrapper::includeOnce( Page::getRootPath().'/community/account/inc_char_details.php' );

	$server = '';
	switch ($_GET['server']) {
	case '1':
		$server = 'devserver';
		break;
	case '2':
		$server = 'testserver';
		break;
	default:
		$server = 'illarionserver';
	}
	
	$charid = ( isset( $_GET['charid'] ) && is_numeric($_GET['charid']) ? (int)$_GET['charid'] : 0 );

	if (!$charid)
	{
		Messages::add('Charakter ID wurde nicht richtig übertragen.', 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/community/account/de_charlist.php' );
		exit();
	}

	if (!($chardata = loadCharacterData($charid, $server)))
	{
		Messages::add('Charakter wurde nicht in der Datenbank gefunden.', 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/community/account/de_charlist.php' );
		exit();
	}

	Page::setTitle( array( 'Account', 'Charakterdetails', $chardata['chr_name'] ) );
	Page::setDescription( 'Diese Seite zeigt Informationen über den Charakter '.$chardata['chr_name'] );
	Page::setKeywords( array( 'Charakter', 'Account', 'Details', $chardata['chr_name'] ) );

	Page::addCSS( array( 'lightwindow', 'lightwindow_de' ) );
	Page::addJavaScript( array( 'prototype', 'effects', 'lightwindow', 'wz_tooltip' ) );

	Page::setXHTML();
	Page::Init();
?>

<h1>Charakterdetails - <?php echo $chardata['chr_name']; ?></h1>

<div style="float:left; height:200px; width:255px;vertical-align:middle;text-align:center;">
	<img src="<?php echo $chardata['picture']['file']; ?>" height="<?php echo $chardata['picture']['height']; ?>" width="<?php echo $chardata['picture']['width']; ?>" alt="Bild von <?php echo $chardata['chr_name']; ?>" />
</div>

<div style="text-align:left;">
	<table style="padding-left: 20px;">
		<tbody>
			<tr>
				<td style="width:150px">Name:</td>
				<td><?php echo $chardata['chr_name']; ?></td>
			</tr>
            <?php if ($chardata['is_gm']): ?>
            <tr>
                <td style="width:150px">Benennung:</td>
                <td>
                    <form id="delete_form" name="delete_form" method="post" action="de_char_details.php" style="float:left">
                        <button type="submit"
                                style="margin-right:10px;"
                                title="Löscht die Individuellen Benennungen, die dieser Charakter erhalten hat.">
                            Individuelle Benennung löschen
                        </button>
                        <input type="hidden" name="server" value="<?php echo $_GET['server']; ?>" />
                        <input type="hidden" name="charid" value="<?php echo $charid; ?>" />
                        <input type="hidden" name="action" value="char_clear_name" />
                        <input type="hidden" name="clear" value="known_names" />
                    </form>
                    <form id="delete_form" name="delete_form" method="post" action="de_char_details.php" style="float:left">
                        <button type="submit"
                                style="margin-right:10px;"
                                title="Löscht die Vorstellungen die dieser Character durchgeführt hat.">
                            Vorstellung löschen
                        </button>
                        <input type="hidden" name="server" value="<?php echo $_GET['server']; ?>" />
                        <input type="hidden" name="charid" value="<?php echo $charid; ?>" />
                        <input type="hidden" name="action" value="char_clear_name" />
                        <input type="hidden" name="clear" value="introduce" />
                    </form>
                    <form id="delete_form" name="delete_form" method="post" action="de_char_details.php" style="float:left">
                        <button type="submit"
                                style="margin-right:10px;"
                                title="Löscht sowohl die individuellen Benennungen, als auch die Vorstellungen. Dadurch wird ein Charakter vollständig unbekannt.">
                            Beides löschen
                        </button>
                        <input type="hidden" name="server" value="<?php echo $_GET['server']; ?>" />
                        <input type="hidden" name="charid" value="<?php echo $charid; ?>" />
                        <input type="hidden" name="action" value="char_clear_name" />
                        <input type="hidden" name="clear" value="all" />
                    </form>
                    <div style="clear: both" ></div>
                </td>
            </tr>
            <?php endif; ?>
			<tr>
				<td style="width:150px">Rasse:</td>
				<td><?php echo IllarionData::getRaceName($chardata['chr_race']); ?></td>
			</tr>
			<tr>
				<td style="width:150px">Geschlecht:</td>
				<td><?php echo IllarionData::getSexName($chardata['chr_sex']); ?></td>
			</tr>
			<tr>
				<td style="height:12px;" ></td>
			</tr>
			<tr>
				<td style="width:150px">Geburtstag:</td>
				<td><?php echo $chardata['ply_dob']['day'],'. ',IllaDateTime::getMonthName( $chardata['ply_dob']['month'] ),' ',($chardata['ply_dob']['year']>0 ? $chardata['ply_dob']['year'].' n.VdH' : (-$chardata['ply_dob']['year']).' v.VdH' ); ?></td>
			</tr>
			<tr>
				<td style="width:150px">Alter:</td>
				<td><?php echo $chardata['ply_dob']['age']; ?> Jahre</td>
			</tr>
			<tr>
				<td style="width:150px">Körpergröße:</td>
				<td><?php echo $chardata['ply_body_height']; ?></td>
			</tr>
			<tr>
				<td style="width:150px">Gewicht:</td>
				<td><?php echo $chardata['ply_weight']; ?></td>
			</tr>
			<tr>
				<td style="height:12px;" ></td>
			</tr>
		</tbody>
	</table>
	<?php if ($server == 'illarionserver'): ?>
	<table style="padding-left: 20px;">
		<tbody>
			<tr>
				<td>
					<a href="<?php echo Page::getURL(); ?>/community/account/de_char_settings.php<?php echo $chardata['ident']; ?>" onclick="myLightWindow.activateWindow({href:this.href,height:180,width:350,title:'Einstellungen von <?php echo str_replace("'", "\\'", $chardata['chr_name'] ); ?>'});return false;">
						Einstellungen des Charakters bearbeiten
					</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="<?php echo Page::getURL(); ?>/community/account/de_char_picture.php<?php echo $chardata['ident']; ?>" onclick="myLightWindow.activateWindow({href:this.href,height:410,width:400,title:'Bild von <?php echo str_replace("'", "\\'", $chardata['chr_name'] ); ?>'});return false;">
						Bild des Charakters bearbeiten
					</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="<?php echo Page::getURL(); ?>/community/account/de_char_description.php<?php echo $chardata['ident']; ?>">
						Beschreibung des Charakters bearbeiten
					</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="<?php echo Page::getURL(); ?>/community/account/de_char_story.php<?php echo $chardata['ident']; ?>">
						Geschichte des Charakters bearbeiten
					</a>
				</td>
			</tr>
		</tbody>
	</table>
	<?php endif; ?>
</div>

<div style="height: 30px"></div>

<div style="text-align:left;">
	<p>
		<b>Stärke (<?php echo $chardata['ply_strength']; ?>)</b><br />
		<?php
			switch(max( 1, min( 6, ceil( $chardata['ply_strength'] / 4 ) ) ))
			{
				case 1: echo 'Du hast schon Probleme dein eigenes Gewicht zu tragen. Dich mit mehr als nur Kleidung zu belasten ist ein Traum deines schwachen Körpers.'; break;
				case 2: echo 'Deine Tasche kannst du gerade noch tragen, aber voll beladen sollte sie nicht sein.<br />Während längerer Wegstrecken brauchst du die eine oder andere Verschnaufpause.'; break;
				case 3: echo 'Du bist genauso stark wie jede Person deines Alters ohne tägliches Training.<br />Du kannst zwar keine schweren Sachen heben, allerdings hast du keine Probleme, gewöhnliche Sachen zu tragen.'; break;
				case 4: echo 'Du bist kräftiger als der Durchschnitt, hebst schwerere Sachen ohne dich zu überanstrengen.<br />Selbst eine gute, starke Rüstung bereitet dir keine sonderlichen Probleme.'; break;
				case 5: echo 'Du hast überall Muskeln. Du kannst Dinge heben, bei denen andere schon vom Hinsehen aufgeben würden.<br />Allerdings musst du deswegen auch weite Kleidung bei deinem Schneider kaufen, sonst würdest du sie jedes Mal zerreißen, wenn du deine Muskeln anspannst.'; break;
				case 6: echo 'Deine Stärke ist übernatürlich.'; break;
				default: echo 'Deine Stärke ist unbekannt.'; break;
			}
		?>
	</p>
	<p>
		<b>Ausdauer (<?php echo $chardata['ply_constitution']; ?>)</b><br />
		<?php
			switch(max( 1, min( 6, ceil( $chardata['ply_constitution'] / 4 ) ) ))
			{
				case 1: echo 'Du bist fast immer krank. du bist ein reiner Magnet für alle Arten an Krankheiten, von Influenza bis hin zu allen bekannten und noch unbekannten Plagen.<br />Dein zerbrechlicher Körper ist empfänglich für jede Verletzung. Gebrochene Arme und Beine sind bei dir gewöhnlich.'; break;
				case 2: echo 'Man kann dich nicht als sonderlich fit bezeichnen. Schon eine Influenza kann dich niederstrecken, deshalb solltest du besonders auf deine Gesundheit achten. Aber bei richtiger Pflege und viel Ruhe bist du bald wieder auf den Beinen.'; break;
				case 3: echo 'Dein Körper ist fit und kann einiges einstecken ohne aufzugeben. du kannst einige Krankheiten überstehen, ohne um dein Leben zu fürchten.'; break;
				case 4: echo 'Soweit du dich erinnern kannst, warst du nie ernsthaft krank. Eine heiße Suppe hat dich bei Influenza immer wieder auf die Füße gebracht, ohne dass du dich sonderlich schonen musstest.'; break;
				case 5: echo 'So lange du zurückdenken kannst, warst du niemals krank. Außerdem scheint dein Körper mehr einstecken zu können, als der jedes Anderen.'; break;
				case 6: echo 'Deine Ausdauer ist übernatürlich.'; break;
				default: echo 'Deine Ausdauer ist unbekannt.'; break;
			}
		?>
	</p>
	<p>
		<b>Geschicklichkeit (<?php echo $chardata['ply_dexterity']; ?>)</b><br />
		<?php
			switch(max( 1, min( 6, ceil( $chardata['ply_dexterity'] / 4 ) ) ))
			{
				case 1: echo 'Dein Kopf weiß nicht was deine Hände machen und anders herum.<br />Du bist so tollpatschig, dass du ständig Werkzeuge und alles was du in den Händen hältst, fallen lässt.<br />Geschickte Arbeiten mit zerbrechlichen Materialen sind unmöglich für dich.'; break;
				case 2: echo 'Wenn du mit Werkzeugen hantierst, solltest du dich in jedem Fall auf deine Arbeit konzentrieren, da ansonsten ein recht hohes Verletzungsrisiko für dich und andere besteht.'; break;
				case 3: echo 'Du kannst Werkzeuge ohne Probleme verwenden, solange es keine wirklich schwierige Aufgabe ist.<br />Wenn du einen Stein nach einer Ente wirfst, kannst du dir fast sicher sein, dass er in etwa dort landet, wo du hingezielt hast.'; break;
				case 4: echo 'Du kannst gut mit Werkzeugen umgehen, erfasst ihre Handhabung schnell und mit etwas Fleiß und Arbeit gelingen dir sogar recht ordentliche Arbeiten.'; break;
				case 5: echo 'Du bist geschickter als jeder den du kennst. du kannst deine Finger benutzen, um filigrane Aufgaben mit Leichtigkeit zu erfüllen.<br />Wenn du sie sehen könntest, wärst du in der Lage mit deiner Schleuder Flöhe vom Rücken eines Hundes zu schießen.'; break;
				case 6: echo 'Deine Geschicklichkeit ist übernatürlich.'; break;
				default: echo 'Deine Geschicklichkeit ist unbekannt.'; break;
			}
		?>
	</p>
	<p>
		<b>Schnelligkeit (<?php echo $chardata['ply_agility']; ?>)</b><br />
		<?php
			switch(max( 1, min( 6, ceil( $chardata['ply_agility'] / 4 ) ) ))
			{
				case 1: echo 'Du bist langsam. Selbst Schnecken wirken neben dir so schnell wie ein Blitz.<br />In einer Menschenmenge stößt du ständig an jemand an.<br />Du hast selbst Probleme das Gleichgewicht zu halten.'; break;
				case 2: echo 'Du bist nicht gerade ein Sprinter, aber mit viel Training würdest du zumindest als ausdauernd bezeichnet werden können.<br />Halte immer deine Augen offen und nach vorn gerichtet, denn einem Zusammenstoß würdest du wahrscheinlich eher nicht ausweichen können.'; break;
				case 3: echo 'Du bist nicht langsam, aber du bist auch nicht schnell. du bist genauso schnell wie jeder andere auch.<br />Wenn jemand Steine nach dir wirft, hast du eine gute Chance auszuweichen, wenn du sie früh genug siehst.'; break;
				case 4: echo 'Du bist sehr schnell, so schnell, dass du gute Chancen hast, so ziemlich jedem davon zu laufen.<br />Ein Überraschungsangriff auf dich wird in den meisten Fällen misslingen, da du geschickt ausweichen kannst.'; break;
				case 5: echo 'Du bist der schnellste Läufer, du bist sogar fähig einige Tiere bei der Jagd zu überholen.<br />Wenn der Himmel auf deinen Kopf fallen würde, hättest du selbst dann eine große Chance dem auszuweichen.'; break;
				case 6: echo 'Deine Schnelligkeit ist übernatürlich.'; break;
				default: echo 'Deine Schnelligkeit ist unbekannt.'; break;
			}
		?>
	</p>
	<p>
		<b>Intelligenz (<?php echo $chardata['ply_intelligence']; ?>)</b><br />
		<?php
			switch(max( 1, min( 6, ceil( $chardata['ply_intelligence'] / 4 ) ) ))
			{
				case 1: echo 'Du hast Probleme, wenn es darum geht dein Gehirn zu benutzen. du kannst keine komplexen Sätze formen und hast selbst Schwierigkeiten mehr als ein Wort gleichzeitig zu verwenden.<br />Lesen und Schreiben wirst du wohl nie lernen.'; break;
				case 2: echo 'Du bist stolz darauf, in vollständigen Sätzen sprechen zu können, auch wenn sie nicht wirklich komplex sind.<br />Lesen und Schreiben kannst du mit großer Anstrengung erlernen.'; break;
				case 3: echo 'Du weißt alles, was du zum täglichen Leben brauchst. Jedoch verstehst du immer noch keine großen und komplexen Themen.<br />Du kannst Lesen und Schreiben, wenn du es jemals gelernt hast.'; break;
				case 4: echo 'Du bist nicht dumm, eher cleverer als der durchschnitt, wenn auch nicht gerade ein Genie. Mit Argumenten kannst du viel erreichen.<br />Lesen und Schreiben hast du zügig erlernt und der Gebrauch fällt dir nicht schwer.'; break;
				case 5: echo 'Du bist clever, dein Gehirn ist deine Kraft.<br />Egal welche Aufgabe es ist, Mathematik, Poesie, Literatur, du kannst es  binnen kurzer Zeit verstehen.<br />Falls du noch nicht Lesen oder Schreiben kannst, sollte es leicht für dich sein es zu erlernen.'; break;
				case 6: echo 'Deine Intelligenz ist übernatürlich.'; break;
				default: echo 'Deine Intelligenz ist unbekannt.'; break;
			}
		?>
	</p>
	<p>
		<b>Willenskraft (<?php echo $chardata['ply_willpower']; ?>)</b><br />
		<?php
			switch(max( 1, min( 6, ceil( $chardata['ply_willpower'] / 4 ) ) ))
			{
				case 1: echo 'Du bist schwach im Geiste, selbst kleine Kinder können dich nach ihrer Pfeife tanzen lassen.<br />Du machst immer das, was Andere dir sagen.'; break;
				case 2: echo 'Im Grunde weißt du schon, was du willst. Allerdings bist du durch Worte zu leicht vom Gegenteil zu überzeugen. Somit kannst du leicht zu jedermanns Spielball werden.'; break;
				case 3: echo 'Du bist kein Fels am Strand in einer stürmischen Nacht, allerdings kannst du deine Meinung recht gut vertreten.'; break;
				case 4: echo 'Du hast selten Probleme dich durchzusetzen, erreichst meist das Gewünschte, auch wenn du bei gut angebrachten Argumenten schon mal ins Wanken geraten kannst.'; break;
				case 5: echo 'Du bist immer in der Mitte des Raums, deine charismatische Art zu sprechen erlaubt es dir, die Meinungen aller mit Leichtigkeit zu beeinflussen.<br />Du bekommst fast immer was du willst.'; break;
				case 6: echo 'Deine Willenskraft ist übernatürlich.'; break;
				default: echo 'Deine Willenskraft ist unbekannt.'; break;
			}
		?>
	</p>
	<p>
		<b>Wahrnehmung (<?php echo $chardata['ply_perception']; ?>)</b><br />
		<?php
			switch(max( 1, min( 6, ceil( $chardata['ply_perception'] / 4 ) ) ))
			{
				case 1: echo 'Du bist blind wie ein Maulwurf, deine Sicht endet einen Meter vor dir. Selbst dann hast du trotzdem Probleme etwas oder jemanden zu erkennen.<br />Du hörst selbst dann schlecht, wenn dir jemand etwas ins Ohr schreit.'; break;
				case 2: echo 'Du solltest nachts den Wald meiden oder eine Fackel bei dir tragen, denn sonst könnte es dir passieren, dass du einem Baumstumpf eine Konversation aufdrängen willst.<br />Dein Gehör ist nur dann akzeptabel, wenn du dich auf die Geräusche konzentrieren kannst.'; break;
				case 3: echo 'Dein Alter und deine Rasse beachtend, kannst du genauso viel hören und sehen wie jede normale Person auch.'; break;
				case 4: echo 'Dir entgeht nicht viel, du kannst gut und weit sehen, aber nachts ist selbst deine Wahrnehmung leicht getrübt.<br />Dein Gehör ist besser als das der meisten Anderen, auch wenn du das Gras nicht wachsen hören kannst.'; break;
				case 5: echo 'Deine Augen sind so scharf wie nichts anderes. du kannst weit und sogar weiter sehen als die neben dir.<br />Deine Sinne erlauben es dir besser zu hören, riechen oder fühlen als ein durchschnittlicher.'; break;
				case 6: echo 'Deine Wahrnehmung ist übernatürlich.'; break;
				default: echo 'Deine Wahrnehmung ist unbekannt.'; break;
			}
		?>
	</p>
	<p>
		<b>Essenz (<?php echo $chardata['ply_essence']; ?>)</b><br />
		<?php
			switch(max( 1, min( 6, ceil( $chardata['ply_essence'] / 4 ) ) ))
			{
				case 1: echo 'Du bist wie eine leblose Hülle, deine Augen sind stumpf und seelenlos.<br />Es gibt nichts, dass deinen Körper davor bewahrt ein Spielball unnatürlicher Einflüsse zu werden.'; break;
				case 2: echo 'Unnatürlichen Einflüssen hast du wirklich nicht viel entgegen zu setzen, auch wenn du das Gefühl hast, dass da etwas vor sich geht, was dir nicht gefällt.'; break;
				case 3: echo 'Du wurdest mit einem inneren Leuchten gesegnet, jedoch ist es nicht heller als das der Person neben dir.<br />Du kannst unnatürlich beeinflußt werden, aber du bist nicht komplett ohne Verteidigung.'; break;
				case 4: echo 'Deine Aura bleibt nur wenigen verborgen.<br />Dein starkes Wesen macht es nahezu unmöglich, dich in irgend jemandes übernatürlichen Bann ziehen zu lassen.'; break;
				case 5: echo 'Irgendwie scheint deine Aura heller als die anderer, wie ein kleiner Stern in einer dunklen Nacht.<br />Das verhindert auch meist, dass du unnatürlich beeinflusst wirst.'; break;
				case 6: echo 'Deine Essenz ist übernatürlich.'; break;
				default: echo 'Deine Essenz ist unbekannt.'; break;
			}
		?>
	</p>
</div>

<div style="height: 30px"></div>

<p class="center">
   <a href="<?php echo Page::getURL(); ?>/community/account/de_charlist.php">Zurück zur Übersicht</a>
</p>
