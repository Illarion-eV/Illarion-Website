<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( array( 'Account', 'Passwort vergessen' ) );
	Page::setDescription( 'Hier kannst Du Dein Passwort neu eingeben, wenn Du es vergessen hast.' );
	Page::setKeywords( array( 'Passwort', 'vergessen', 'neu' ) );

	Page::addJavaScript( 'newpass' );

	Page::setXHTML();
	Page::Init();

	$activate = ( isset( $_GET['id'] ) && strlen( $_GET['id'] ) == 32 ? (string)$_GET['id'] : false );
?>

<?php if (!$activate): ?>
<h1>Neues Passwort anfordern</h1>

<p>Solltest Du Dein Passwort verloren haben, kannst Du hier eine E-Mail anfordern, um
Dein Passwort zu ändern. Diese E-Mail wird zur angegebenen Adresse geschickt. Der Link in
der E-Mail versetzt Dich dann in die Lage, ein neues Passwort für Deinen Account
einzustellen.</p>

<form method="post" action="<?php echo Page::getURL(); ?>/community/account/de_forgot_pw.php">
	<p>
		<span style="width:150px;display:block;float:left;">E-Mail-Adresse:</span>
		<input type="text" name="email" id="email" onkeyup="checkEmail();" onchange="checkEmail();" value="" style="width:250px;margin-right:15px;float:left;" />
		<span id="message_mail"></span>
	</p>
	<div class="clr"></div>
	<p>
		<input type="submit" name="submit" id="submit" class="disabled" disabled="disabled" value="E-Mail anfordern" />
		<input type="hidden" name="action" value="forgot_pw" />
	</p>
</form>
<?php else: ?>
<h1>Neues Passwort eingeben</h1>

<p>Hier kannst Du ein neues Passwort für Deinen Account eingeben.</p>

<form method="post" action="<?php echo Page::getURL(); ?>/community/account/de_forgot_pw.php">
	<p>
		<span style="width:150px;display:block;float:left;">Passwort:</span>
		<input type="password" name="passwd" id="passwd" onkeyup="checkPasswd();" onchange="checkPasswd();" value="" style="width:250px;" />
	</p>
	<p>
		<span style="width:150px;display:block;float:left;">Passwort wiederholen:</span>
		<input type="password" name="passwd2" id="passwd2" onkeyup="checkPasswd();" onchange="checkPasswd();" value="" style="width:250px;margin-right:15px;float:left;" />
		<span id="message_passwd"></span>
	</p>
	<div class="clr"></div>
	<p>
		<input type="hidden" name="id" value="<?php echo $activate; ?>" />
		<input type="submit" name="submit" id="submit" class="disabled" disabled="disabled" value="Passwort ändern" />
		<input type="hidden" name="action" value="forgot_pw" />
	</p>
</form>
<?php endif; ?>