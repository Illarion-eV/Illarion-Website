<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( array( 'Account', 'Login' ) );
	Page::setDescription( 'Auf dieser Seite kannst du dich einloggen.' );
	Page::setKeywords( array( 'Login', 'Account', 'einloggen' ) );

	Page::setXHTML();
	Page::Init();

	if ( defined( 'LOGIN_TARGET_URL' ) )
	{
		$targetURL = constant('LOGIN_TARGET_URL');
	}
	else
	{
		$targetURL = Page::getURL().'/community/account/de_charlist.php';
	}
	$targetURL = str_replace( '&', '&amp;', $targetURL );

	$error = ( isset($_GET['error']) ? $_GET['error'] : '0' );

	if ($error > 0)
	{
		switch($error)
		{
			case 1: Messages::add('Falscher Benutzername oder falsches Passwort.', 'error'); break;
			default: Messages::add('Ein unbekannter Fehler ist aufgetreten.', 'error'); break;
		}
	}
?>

<h1>Login</h1>

<form action="<?php echo $targetURL; ?>" method="post">
	<table>
		<tr>
			<td>Login-Name</td>
			<td style="width:10px;" />
			<td><input name="login_name" type="text" /></td>
		</tr>
		<tr>
			<td>Passwort</td>
			<td />
			<td><input name="login_pw" type="password" /></td>
		</tr>
		<tr>
			<td />
			<td />
			<td><input type="checkbox" name="login_remember" value="remember" /> Immer automatisch einloggen</td>
		</tr>
		<tr>
			<td colspan="3" style="text-align:center;">
				<input type="submit" name="login" value="Einloggen" />
				<input type="hidden" name="action" value="login" />
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3">
				<a href="<?php echo Page::getURL(); ?>/community/account/de_register.php">Noch keinen Account? Dann registriere Dich hier.</a>
				<br />
				<a href="<?php echo Page::getURL(); ?>/community/account/de_forgot_pw.php">Passwort vergessen? Klicke hier!</a>
			</td>
		</tr>
	</table>
</form>
