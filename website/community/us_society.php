<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
   create_header( "Illarion - Society",
                  "This page contains information about the Illarion e.V. society",
                  "society, Illarion e.V." );
   include_header();
   
   Page::addCSS( 'donate' );
?>

   <h1>Illarion Society</h1>
  
   <h2>Support Membership</h2>
   
<?php Page::cap('I'); ?>

<p>llarion is a free game that is maintained by volunteers.
No one gets a cent for their work at Illarion, but still the hosting of the server costs
money. The money needed for this is paid by the members of the Illarion Society.</p>

<p>The simplest way to cover our expenses in a predictable way is your Illarion Society support 
membership for only ten Euro per year. To become a member, just fill out the form and send it to us: <a href="mailto:committee@illarion.org">committee@illarion.org</a>
Please find the Illarion Society statutes below.</p>
   <ul>
      <li><a href="Illarion_e.V._-_Request_for_Support_Membership.pdf">Support Membership Request for &quot;Illarion e.V.&quot; Society</a> (pdf)</li>
	   <li><a href="Illarion_e.V._-_Statutes.pdf">Illarion e.V. - Statutes</a> (pdf)</li>
   </ul>

   <p>Because both sides should have a benefit, we thought about advantages for those members. 
   As a fundamental idea we don't want to offer any in-game advantages, 
   because this would be just a premium game account for people who are able to pay.
   The following benefits are available for support members on <a href="<?php echo Page::getURL(); ?>/community/de_contact.php?contact=25">request</a> right now:</p>
   <ul>
      <li>Your own forwarding email address to your specified account email address (e.g. charactername@illarion.org)</li>
      <li>Increase of the maximum character number for your account from 5 to 7</li>
      <li>A guild forum at forum.illarion.org with group leader and moderator rights</li>
   </ul>

   <p>This list could be changed at any time, we already have more ideas. There is no redress in law to get these benefits.</p>

   <?php insert_go_to_top_link(); ?>
   
<h2>Donations</h2>
<p>To ensure that we can keep the server online in future the Illarion Society is in need of donations.
As alternative to a donation there is also the possibility to
<a href="Illarion_e.V._-_Request_for_Support_Membership.pdf">join the Illarion
e.V</a> and help the Illarion Society with ten Euro yearly membership fee.</p>
<h3>Paypal</h3>

<p>The Illarion Society has a paypal-basic account with the e-mail address
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
	<legend>Remittance</legend>
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

<p>Also, every six months there is a RL (Real Life) meeting for the staff members and players of
Illarion. These meetings are held in Germany. It's also possible to donate something
there. Details about these meetings can be found on the
<a href="<?php echo Page::getURL(); ?>/community/forums/">forum</a>.</p>

<?php insert_go_to_top_link(); ?>

<?php include_footer(); ?>
