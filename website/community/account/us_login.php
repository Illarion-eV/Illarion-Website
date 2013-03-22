<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( array( 'Account', 'Login' ) );
	Page::setDescription( 'You can login on this page.' );
	Page::setKeywords( array( 'login', 'accounts' ) );

	Page::setXHTML();
	Page::Init();

	if ( defined( 'LOGIN_TARGET_URL' ) )
	{
		$targetURL = constant('LOGIN_TARGET_URL');
	}
	else
	{
		$targetURL = Page::getURL().'/community/account/us_charlist.php';
	}
	$targetURL = str_replace( '&', '&amp;', $targetURL );

	$error = ( isset($_GET['error']) ? $_GET['error'] : '0' );

	if ($error > 0)
	{
		switch($error)
		{
			case 1: Messages::add('Wrong user name or password.', 'error'); break;
			default: Messages::add('An unknown error occured.', 'error'); break;
		}
	}
?>

<h1>Login</h1>

<form action="<?php echo $targetURL; ?>" method="post">
	<table>
		<tr>
			<td>Login Name</td>
			<td style="width:10px;" />
			<td><input name="login_name" type="text" /></td>
		</tr>
		<tr>
			<td>Password</td>
			<td />
			<td><input name="login_pw" type="password" /></td>
		</tr>
		<tr>
			<td />
			<td />
			<td><input type="checkbox" name="login_remember" value="remember" /> Stay logged in</td>
		</tr>
		<tr>
			<td colspan="3" style="text-align:center;">
				<input type="submit" name="login" value="Login" />
				<input type="hidden" name="action" value="login" />
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3">
				<a href="<?php echo Page::getURL(); ?>/community/account/us_register.php">No account yet? Then register here.</a>
				<br />
				<a href="<?php echo Page::getURL(); ?>/community/account/us_forgot_pw.php">Forgot your password? Click here!</a>
			</td>
		</tr>
	</table>
</form>
