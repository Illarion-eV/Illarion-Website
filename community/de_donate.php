<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( 'Spenden' );
	Page::setDescription( 'Auf dieser Seite finden sich die Informationen wie ihr für Illarion etwas spenden könnt' );
	Page::setKeywords( array( 'Spenden', 'unterstützen', 'Verein', 'Geld' ) );

	Page::addCSS( 'donate' );

	Page::setXHTML();
	Page::Init();
?>

<h1>Illarion unterstützen</h1>

<h2>Vorwort</h2>

<?php Page::cap('I'); ?>

<p>llarion ist ein kostenloses Spiel, welches von freiwilligen Entwicklern und
Gamemastern unterhalten wird. Niemand verdient auch nur einen Cent an Illarion, dennoch
kostet der Betrieb des Servers Geld. Dieses Geld wird von den Mitgliedern des Illarion
e.V. privat aufgebracht. Um den Betrieb des Servers auch in Zukunft sicherstellen zu
können, ist der Illarion e. V. auf Spenden angewiesen. Anstelle einer einmaligen Spende
besteht die Möglichkeit, für 10€ im Jahr
<a href="<?php echo Page::getURL(); ?>/community/de_society.php">Fördermitglied im
Illarion e. V.</a> zu werden.</p>

<h2>Spendemöglichkeiten</h2>

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
	<legend>für Überweisungen aus dem Inland (Deutschland)</legend>
	<dl class="bank_details">
		<dt>Name</dt>
		<dd>Illarion e.V.</dd>
		<dt>Bank</dt>
		<dd>Ev. Kreditgenossenschaft Kassel</dd>
		<dt>Kontonummer</dt>
		<dd>3501264</dd>
		<dt>Bankleitzahl</dt>
		<dd>52060410</dd>
		<dt>Verwendungszweck</dt>
		<dd>Spende für Illarion [RL-Name]</dd>
	</dl>
</fieldset>

<fieldset>
	<legend>für Überweisungen aus dem Ausland</legend>
	<dl class="bank_details">
		<dt>Name</dt>
		<dd>Illarion e.V.</dd>
		<dt>Bank</dt>
		<dd>Ev. Kreditgenossenschaft Kassel</dd>
		<dt>BIC</dt>
		<dd>GENODEF1EK1</dd>
		<dt>IBAN</dt>
		<dd>DE73 5206 0410 0003 5012 64</dd>
		<dt>Verwendungszweck</dt>
		<dd>Spende für Illarion [RL-Name]</dd>
	</dl>
</fieldset>

<h3>Bar</h3>

<p>Wer das Risiko eines Bargeldversandes über den Postweg eingehen möchte, kann eine
Spende an den Kassenwart des Illarion e.V. Martin Völkel schicken.</p>

<ul class="adress">
	<li>Illarion e.V.</li>
	<li>Martin Völkel</li>
	<li>Schloßberg 93</li>
	<li>91347 Aufseß</li>
	<li>Deutschland</li>
</ul>

<p>Außerdem werden jedes halbe Jahr RL Treffen der Illarion Teammitglieder und Spieler
in Deutschland organisiert. Auch dort kann gespendet werden. Details zu diesen Treffen
gibt es im <a href="<?php echo Page::getURL(); ?>/community/forums/">Forum</a>.</p>