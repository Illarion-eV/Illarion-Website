<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	IllaUser::requireLogin();

	$charid = ( isset( $_GET['charid'] ) && is_numeric($_GET['charid']) ? (int)$_GET['charid'] : 0 );

	Page::Init();
	if (!$charid)
	{
		$pgSQL =& Database::getPostgreSQL( 'illarionserver' );
		$query = 'SELECT COUNT(*)'
		.PHP_EOL.' FROM chars'
		.PHP_EOL.' WHERE chr_accid = '.$pgSQL->Quote( IllaUser::$ID )
		;
		$pgSQL->setQuery( $query );
		$charcount = $pgSQL->loadResult();

		if ($charcount >= IllaUser::$charlimit && !IllaUser::auth('devserver') && IllaUser::$charlimit > 0)
		{
			Messages::add( 'Charakterlimit von '.IllaUser::$charlimit.' wurde erreicht.', 'error' );
			includeWrapper::includeOnce( Page::getRootPath().'/community/account/de_charlist.php' );
			exit();
		}
		$step = 1;
	}
	else
	{
		$server = ( isset( $_GET['server'] ) && $_GET['server'] == 1 ? 'devserver' : 'illarionserver' );
		$ident = '?charid='.$charid.( $server == 'devserver' ? '&amp;server=1' : '' );
		$pgSQL =& Database::getPostgreSQL( $server );

		$query = 'SELECT COUNT(*)'
		.PHP_EOL.' FROM chars'
		.PHP_EOL.' WHERE chr_playerid = '.$pgSQL->Quote( $charid )
		.PHP_EOL.' AND chr_accid = '.$pgSQL->Quote( IllaUser::$ID )
		;
		$pgSQL->setQuery( $query );
		if ($pgSQL->loadResult() != 1)
		{
			Messages::add( 'Charakter wurde nicht gefunden.', 'error' );
			includeWrapper::includeOnce( Page::getRootPath().'/community/account/de_charlist.php' );
			exit();
		}
		else
		{
			$step = 2;
		}

		$query = 'SELECT COUNT(*)'
		.PHP_EOL.' FROM player'
		.PHP_EOL.' WHERE ply_playerid = '.$pgSQL->Quote( $charid )
		;
		$pgSQL->setQuery( $query );

		if ($pgSQL->loadResult() == 1)
		{
			$step = 3;
			$query = 'SELECT COUNT(*)'
			.PHP_EOL.' FROM player'
			.PHP_EOL.' WHERE ply_playerid = '.$pgSQL->Quote( $charid )
			.PHP_EOL.' AND ply_dob > 0'
			;
			$pgSQL->setQuery( $query );

			if ($pgSQL->loadResult() > 0)
			{
				$step = 4;
			}
			$query = 'SELECT COUNT(*)'
			.PHP_EOL.' FROM playerskills'
			.PHP_EOL.' WHERE psk_playerid = '.$pgSQL->Quote( $charid )
			;
			$pgSQL->setQuery( $query );
			if ($pgSQL->loadResult() > 0)
			{
				$step = 5;
			}
			else
			{
				$query = 'SELECT COUNT(*)'
				.PHP_EOL.' FROM playerlteffects'
				.PHP_EOL.' WHERE plte_playerid = '.$pgSQL->Quote( $charid )
				;
				$pgSQL->setQuery( $query );
				if ($pgSQL->loadResult() > 0)
				{
					$step = 5;
				}
			}
		}
	}

	Page::setTitle( array( 'Account', 'Neuen Charakter erstellen' ) );
	Page::setDescription( 'Auf dieser Seite kannst Du einen neuen Charakter für Illarion erstellen' );
	Page::setKeywords( array( 'Charaktere', 'Neu', 'erstellen' ) );

	Page::addCSS( array( 'lightwindow', 'lightwindow_de' ) );
	Page::addJavaScript( array( 'prototype', 'effects', 'lightwindow', 'charcreate_search_color' ) );

	$enable_lightwindow = !( Page::getBrowserName() == 'msie' && Page::getBrowserVersion() <= 6 );

	if ($step == 1)
	{
		Page::addJavaScript( 'newchar_1' );
	}
	elseif ($step == 2)
	{
		Page::addCSS( 'slider' );
		Page::addJavaScript( 'slider' );
	}
	elseif ($step == 3)
	{
		Page::addJavaScript( 'newchar_3' );
	}

	Page::setXHTML();
?>

<h1>Neuen Charakter erstellen</h1>

<h2>Vier Schritte zu einem neuen Charakter für Illarion</h2>

<table style="width:100%">
	<tr>
 		<td style="width:130px;">
			<?php if ($step == 1): ?>
			<a href="<?php echo Page::getURL(); ?>/community/account/de_newchar_1.php" style="font-size:18pt;">
				Schritt 1
			</a>
			<?php else: ?>
 			<span style="color:#007f00;">
 				Schritt 1
 			</span>
			<?php endif; ?>
 		</td>
 		<td>
 			&nbsp;&nbsp;&nbsp;
 		</td>
 		<td>
			<?php if ($step == 1): ?>
			Klicke auf den Link "Schritt 1" um diesen Teil der Charaktererstellung
			durchzuführen. Hier musst Du Name, Rasse und Geschlecht des Charakters
			festlegen. Bitte beachte dazu die
			<a href="<?php echo Page::getURL(); ?>/illarion/de_name_rules.php">Namensregeln</a>
			von Illarion. Hilfreich kann auch die
			<a href="<?php echo Page::getURL(); ?>/general/de_rpg_guide.php">RPG-Anleitung</a>
			sein.
			<?php else: ?>
			Schritt 1 wurde richtig ausgeführt.
			<?php endif; ?>
 		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>
			<?php if ($step == 2): ?>
			<a href="<?php echo Page::getURL(); ?>/community/account/de_newchar_2.php<?php echo $ident; ?>" style="font-size:18pt;">
				Schritt 2
			</a>
			<?php elseif ($step > 2): ?>
			<span style="color:#007f00;">
				Schritt 2
			</span>
			<?php else: ?>
			<span style="color:#7f0000;">
				Schritt 2
			</span>
			<?php endif; ?>
		</td>
		<td>
			&nbsp;&nbsp;&nbsp;
		</td>
		<td>
			<?php if ($step == 2): ?>
			Klicke auf den Link "Schritt 2" um diesen Teil der Charaktererstellung
			durchzuführen. Hier kannst Du das Aussehen Deines Charakters festlegen.
			<?php elseif ($step > 2): ?>
			Schritt 2 wurde richtig ausgeführt.
			<?php else: ?>
			Schritt 2 kann nicht ausgeführt werden, solange Schritt 1 noch aussteht.
			<?php endif; ?>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>
			<?php if ($step == 3): ?>
			<a href="<?php echo Page::getURL(); ?>/community/account/de_newchar_3.php<?php echo $ident; ?>" style="font-size:18pt;">
				Schritt 3
            </a>
            <?php elseif ($step > 3): ?>
            <span style="color:#007f00;">
                Schritt 3
            </span>
            <?php else: ?>
            <span style="color:#7f0000;">
                Schritt 3
            </span>
            <?php endif; ?>
        </td>
        <td>
            &nbsp;&nbsp;&nbsp;
        </td>
        <td>
            <?php if ($step == 3): ?>
            Klicke auf den Link "Schritt 3" um diesen Teil der Charaktererstellung
            durchzuführen. Hier kannst Du die Attribute Deines Charakters festlegen.
            Die Attribute verändern sich im Spiel nicht mehr. Überlege also möglichst
            genau, wie Du sie wählst.
            <?php elseif ($step > 3): ?>
            Schritt 3 wurde richtig ausgeführt.
            <?php else: ?>
            Schritt 3 kann nicht ausgeführt werden, solange Schritt 2 noch aussteht.
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>
            <?php if ($step == 4): ?>
            <a href="<?php echo Page::getURL(); ?>/community/account/de_newchar_4.php<?php echo $ident; ?>" style="font-size:18pt;">
				Schritt 4
			</a>
			<?php elseif ($step > 4): ?>
			<span style="color:#007f00;">
				Schritt 4
			</span>
			<?php else: ?>
			<span style="color:#7f0000;">
				Schritt 4
			</span>
			<?php endif; ?>
		</td>
		<td>
			&nbsp;&nbsp;&nbsp;
		</td>
		<td>
			<?php if ($step == 4): ?>
			Klicke auf den Link "Schritt 4" um diesen Teil der Charaktererstellung
			durchzuführen. Hier wählst Du die Startausrüstung und die Anfangsfähigkeiten
			Deines Charakters. Im Laufe des Spiel wirst Du neue Fähigkeiten lernen und
			neue Ausrüstung bekommen. Die Wahl dieser Startausrüstung schränkt den
			weiteren Verlauf des Spiels nicht ein. Wähle also einfach das Paket, dass Dir für den
			Anfang am meisten zusagt.
			<?php elseif ($step > 4): ?>
			Schritt 4 wurde richtig ausgeführt.
			<?php else: ?>
			Schritt 4 kann nicht ausgeführt werden, solange Schritt 3 noch aussteht.
			<?php endif; ?>
		</td>
	</tr>
</table>

<?php if ($step == 5): ?>
<h1>Charaktererstellung ist abgeschlossen. Viel&nbsp;Spaß!</h1>

<h2>Wie gehts weiter?</h2>

<ul>
	<li><a href="<?php echo Page::getURL(); ?>/community/account/de_charlist.php">Zurück zur Übersicht</a></li>
	<li><a href="<?php echo Page::getURL(); ?>/illarion/de_java_download.php">Download des Clients</a></li>
	<li><a href="<?php echo Page::getURL(); ?>/illarion/de_rules.php">Regelwerk</a></li>
	<li><a href="<?php echo Page::getURL(); ?>/general/de_rpg_guide.php">Rollenspielanleitung</a></li>
</ul>
<?php endif; ?>