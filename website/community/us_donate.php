<?php
include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

Page::setTitle( 'Donate' );
Page::setDescription( 'On this page you find ways to support the society by donations.' );
Page::setKeywords( array( 'donations', 'support', 'society', 'money' ) );

Page::addCSS( 'donate' );

Page::setXHTML();
Page::Init();
?>

<h1>Support Illarion</h1>

<h2>Preamble</h2>

<?php Page::cap('I'); ?>

<p>llarion is a free game that is maintained by voluntary developers and gamemasters.
No one gets a cent for the work at Illarion, but still the hosting of the server costs
money. The money needed for this is paid by the members of the Illarion e.V. To ensure
that we can keep the server online in future the Illarion e.V. is in need of donations.
As alternative to a donation there is also the possibility to
<a href="<?php echo Page::getURL(); ?>/community/us_society.php">join the Illarion
e.V</a> and help the society with 10€ yearly membership fee.</p>

<h2>Ways to donate</h2>

<h3>Paypal</h3>

<p>The Illarion e.V has a paypal-basic account with the e-mail address
donation@illarion.org</p>

<form method="post" action="https://www.paypal.com/cgi-bin/webscr">
	<p>
		<input type="hidden" name="cmd" value="_xclick" />
		<input type="hidden" name="business" value="donation@illarion.org" />
		<input type="hidden" name="currency_code" value="EUR" />
		<input type="hidden" name="item_name" value="Donation for the Illarion e.V." />
		<input class="no_style" type="image" name="add" src="<?php echo Page::getImageURL(); ?>/us_paypal_donate.png" />
	</p>
</form>

<h3>Remittance</h3>

<fieldset>
	<legend>for inland remittances (Germany)</legend>
	<dl class="bank_details">
		<dt>Name</dt>
		<dd>Illarion e.V.</dd>
		<dt>Bank</dt>
		<dd>Ev. Kreditgenossenschaft Kassel</dd>
		<dt>Account number</dt>
		<dd>3501264</dd>
		<dt>Bank code</dt>
		<dd>52060410</dd>
		<dt>Purpose of usage</dt>
		<dd>Donation for Illarion [Real name]</dd>
	</dl>
</fieldset>

<fieldset>
	<legend>for international remittances</legend>
	<dl class="bank_details">
		<dt>Name</dt>
		<dd>Illarion e.V.</dd>
		<dt>Bank</dt>
		<dd>Ev. Kreditgenossenschaft Kassel</dd>
		<dt>BIC</dt>
		<dd>GENODEF1EK1</dd>
		<dt>IBAN</dt>
		<dd>DE73 5206 0410 0003 5012 64</dd>
		<dt>Purpose of usage</dt>
		<dd>Donation for Illarion [Real name]</dd>
	</dl>
</fieldset>

<h3>Cash</h3>

<p>If you want to take the risk and send money, you can send it to the treasurer of the
Illarion e.V. Martin Völkel.</p>

<ul class="adress">
	<li>Illarion e.V.</li>
	<li>Martin Völkel</li>
	<li>Schloßberg 93</li>
	<li>91347 Aufseß</li>
	<li>Germany</li>
</ul>

<p>Also there is every half year a RL (Real Life) meeting for the staff members and players of
Illarion. This meetings are held in Germany. Its also possible to donate something
there. Details about this meetings can be found on the
<a href="<?php echo Page::getURL(); ?>/community/forums/">forum</a>.</p>