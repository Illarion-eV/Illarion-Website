<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - Verein",
                  "Diese Seite enth&auml;lt Informationen zum Illarion e.V.",
                  "Verein, Illarion e.V." );
   include_header();
   
   Page::addCSS( 'donate' );
?>

   <h1>Illarion e.V.</h1>
   
    <h2>Mitgliedschaft</h2>

	<?php Page::cap('I'); ?>

   <p>llarion ist ein kostenloses Spiel, welches von einem Team von Freiwilligen unterhalten wird. Niemand verdient auch nur einen Cent an Illarion, dennoch
	kostet der Betrieb des Servers Geld. Dieses Geld wird von den Mitgliedern des Illarion e.V. aufgebracht.</p>

   <p>Der einfachste Weg, unsere Ausgaben planbar zu decken, ist eure freiwillige F&ouml;rdermitgliedschaft im Illarion e.V. f&uuml;r nur zehn Euro im Jahr. Das Formular für den Antrag auf Fördermitgliedschaft und die Satzung des Illarion e.V. findet ihr hier. Schickt das ausgefüllte Formular einfach an <a href="mailto:committee@illarion.org>committee@illarion.org</a>.</p>
   <ul>
      <li><a href="Illarion_e.V._-_Antrag_auf_Foerdermitgliedschaft.pdf">Illarion e.V. - Antrag auf F&ouml;rdermitgliedschaft</a> (pdf)</li>
	  <li><a href="Illarion_e.V._-_Satzung.pdf">Illarion e.V. - Satzung</a> (pdf)</li>
   </ul>
   <p>Da beide Seiten (ihr und der Verein) davon profitieren k&ouml;nnen und sollen, haben wir uns Gedanken gemacht, welche Vorteile wir f&uuml;r F&ouml;rdermitglieder schaffen. Grundgedanke ist dabei, dass keine Vorteile im Spiel aus diesen Boni entstehen d&uuml;rfen, denn sonst w&auml;re es ein verkappter Bezahl-Account - kurz, wer zahlt w&uuml;rde im Spiel bessere Chancen haben und dies wollen wir vermeiden.
   Folgende Vorteile werden ab sofort f&uuml;r F&ouml;rdermitglieder auf <a href="<?php echo Page::getURL(); ?>/community/de_contact.php?contact=25">Anfrage</a> gew&auml;hrt:</p>
   <ul>
      <li>Eine eigene E-Mail-Adresse als Weiterleitung an die im Account hinterlegte Adresse, z.B. charaktername@illarion.org</li>
      <li>Erhöhung der maximalen Charaktere des Account von 5 auf 7</li>
      <li>Ein eigenes Gildenforum auf forum.illarion.org mit Gruppenleiter- und Moderatorrecht</li> 
   </ul>

   <p>Diese Liste kann sich jederzeit &auml;ndern, weitere Ideen sind bereits vorhanden. Ein Rechtsanspruch auf die Boni besteht nicht. </p>
   
   <?php insert_go_to_top_link(); ?>
   
<h2>Spendenmöglichkeiten</h2>
<p> Um den Betrieb des Servers auch in Zukunft sicherstellen zu
können, ist der Illarion e. V. auf Spenden angewiesen. Anstelle einer einmaligen Spende
besteht die Möglichkeit, für zehn Euro im Jahr
<a href="Illarion_e.V._-_Antrag_auf_Foerdermitgliedschaft.pdf">Fördermitglied im
Illarion e. V.</a> zu werden.</p>

<h3>Paypal</h3>

<p>Der Illarion e.V hat einen Paypal-Basis-Account unter der E-Mail Adresse
donation@illarion.org</p>

<form method="post" action="https://www.paypal.com/cgi-bin/webscr">
	<p>
		<input type="hidden" name="cmd" value="_xclick" />
		<input type="hidden" name="business" value="donation@illarion.org" />
		<input type="hidden" name="currency_code" value="EUR" />
		<input type="hidden" name="item_name" value="Spende an den Illarion e.V." />
		<input class="no_style" type="image" name="add" src="<?php echo Page::getImageURL(); ?>/de_paypal_donate.png" />
	</p>
</form>

<h3>Banküberweisung</h3>

<fieldset>
	<legend>Bankverbindung</legend>
	<dl class="bank_details">
		<dt>Kontoinhaber</dt>
		<dd>Illarion e.V.</dd>
		<dt>Bank</dt>
		<dd>Ev. Kreditgenossenschaft Kassel</dd>
		<dt>BIC</dt>
		<dd>GENODEF1EK1</dd>
		<dt>IBAN</dt>
		<dd>DE73 5206 0410 0003 5012 64</dd>
		<dt>Verwendungszweck</dt>
		<dd>Spende für Illarion [Realname]</dd>
	</dl>
</fieldset>

<p>Außerdem werden jedes halbe Jahr RL Treffen der Illarion Teammitglieder und Spieler
in Deutschland organisiert. Auch dort kann gespendet werden. Details zu diesen Treffen
gibt es im <a href="<?php echo Page::getURL(); ?>/community/forums/">Forum</a>.</p>

  <?php insert_go_to_top_link(); ?>

<?php include_footer(); ?>
