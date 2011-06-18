<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( array( 'Account', 'Forgot password' ) );
	Page::setDescription( 'On this page you can request a new password in case you forgot your old' );
	Page::setKeywords( array( 'password', 'forgot', 'new' ) );

	Page::addJavaScript( 'newpass' );

	Page::setXHTML();
	Page::Init();

	$activate = ( isset( $_GET['id'] ) && strlen( $_GET['id'] ) == 32 ? (string)$_GET['id'] : false );
?>

<?php if (!$activate): ?>
<h1>Request a new password</h1>

<p>In case you forgot your password you can request an email to change your password.
You have to type in the email address you used in your account. The link in that email
will grant you the ability to change your password.</p>

<form method="post" action="<?php echo Page::getURL(); ?>/community/account/us_forgot_pw.php">
	<p>
		<span style="width:150px;display:block;float:left;">Email address:</span>
		<input type="text" name="email" id="email" onkeyup="checkEmail();" onchange="checkEmail();" value="" style="width:250px;margin-right:15px;float:left;" />
		<span id="message_mail"></span>
	</p>
	<div class="clr"></div>
	<p>
		<input type="submit" name="submit" id="submit" class="disabled" disabled="disabled" value="Request e-mail" />
		<input type="hidden" name="action" value="forgot_pw" />
	</p>
</form>
<?php else: ?>
<h1>New password</h1>

<p>Here you can type in your new password</p>

<form method="post" action="<?php echo Page::getURL(); ?>/community/account/us_forgot_pw.php">
	<p>
		<span style="width:150px;display:block;float:left;">Password:</span>
		<input type="password" name="passwd" id="passwd" onkeyup="checkPasswd();" onchange="checkPasswd();" value="" style="width:250px;" />
	</p>
	<p>
		<span style="width:150px;display:block;float:left;">Repeat password:</span>
		<input type="password" name="passwd2" id="passwd2" onkeyup="checkPasswd();" onchange="checkPasswd();" value="" style="width:250px;margin-right:15px;float:left;" />
		<span id="message_passwd"></span>
	</p>
	<div class="clr"></div>
	<p>
		<input type="hidden" name="id" value="<?php echo $activate; ?>" />
		<input type="submit" name="submit" id="submit" class="disabled" disabled="disabled" value="Change password" />
		<input type="hidden" name="action" value="forgot_pw" />
	</p>
</form>
<?php endif; ?>