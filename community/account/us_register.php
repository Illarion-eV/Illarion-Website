<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	if (isset($_GET['activate']))
	{
		if (IllaUser::activate( $_GET['activate'] ))
		{
			Messages::add('Account got activated', 'info');
			includeWrapper::includeOnce( Page::getRootPath().'/general/us_startpage.php' );
			exit();
		}
		else
		{
			Messages::add('Activation key is invalid.', 'error');
			Messages::add('At times it happens that the browser sends the activation request twice because the website did not respond fast enougth. In this case the account is activated and the error message appears. Please just try to login into your account.', 'note');
		}
	}

	if (isset($_POST['submit']))
	{
		IllaUser::$username = trim(stripslashes($_POST['username']));
		if (isset($_POST['name']))
		{
			IllaUser::$name = trim(stripslashes($_POST['name']));
		}
		else
		{
			IllaUser::$name = IllaUser::$username;
		}
		if ($_POST['passwd'] == $_POST['passwd2'])
		{
			IllaUser::$clean_pw = trim($_POST['passwd']);
		}
		IllaUser::$email = $_POST['email'];
		IllaUser::$lang = ( isset( $_POST['language'] ) && (int)$_POST['language'] == 0 ? 'de' : 'us' );

		if ( IllaUser::register() )
		{
			Messages::add('Register successfully. Now you get an email you can use to activate your account.', 'info');
		}
		else
		{
			Messages::add('Register failed', 'error');
		}
		includeWrapper::includeOnce( Page::getRootPath().'/general/us_startpage.php' );
		exit();
	}

	Page::setTitle( array( 'Account', 'Create a new Account' ) );
	Page::setDescription( 'On this page you can register at Illarion' );
	Page::setKeywords( array( 'account', 'register', 'playing', 'join' ) );

	Page::addJavaScript( array( 'jquery', 'wz_tooltip', 'register' ) );

	Page::setXHTML();
	Page::Init();
?>
<h1>Create a new account</h1>

<h2>Important information</h2>

<p>On this page you can create an account for Illarion.
In addition it's needed to create a character you
can play after you created this account.</p>

<p>Players who already have an account should know that it's forbidden to create another
one.</p>

<p>Details with a * behind are required. All others are optional. The email address
needs to be valid, because an email is send to this address with a link in it to activate the
account.</p>

<p>To use that page it is needed that the used browser supports JavaScript.</p>

<h2>Account details</h2>

<form action="<?php echo Page::getURL(); ?>/community/account/us_register.php" method="post">
	<table style="width:100%;">
		<tr>
			<td style="width:130px;"><a title="" class="tooltip" onmouseover="Tip('This name needs to be unique on the server and it\'s used to login to your account. The name contains at least 5 and maximal 32 characters. Capital and non-capital letters, as well as digits, underlines and hyphens are possible.',TITLE,'Login name',WIDTH,-300);" onmouseout="UnTip();">Login name:</a></td>
			<td style="width:10px;"></td>
			<td style="width:162px;"><input type="text" name="username" id="username" value="" /> *</td>
			<td style="text-indent:15px;" id="check_username"></td>
		</tr>
		<tr>
			<td><a title="" class="tooltip" onmouseover="Tip('Only this name would be displayed for all other players. Furthermore this name is taken for your first board account. If you don\'t enter a name then your login name will be taken. As soon as you state a name it\'s not changeable anymore.',TITLE,'Displayed Name',WIDTH,-300);" onmouseout="UnTip();">Displayed Name:</a></td>
			<td></td>
			<td><input type="text" name="name" value="" /></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td><a title="" class="tooltip" onmouseover="Tip('This email address will be used in case the Illarion staff needs to contact you. The address will be stored hidden for everyone except the staff.',TITLE,'Email address',WIDTH,-300);" onmouseout="UnTip();">Email address:</a></td>
			<td></td>
			<td><input type="text" name="email" id="email" value="" /> *</td>
			<td id="check_email" style="text-indent:15px;"></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td><a title="" class="tooltip" onmouseover="Tip('With this password you will be able to login at the homepage and into the game. The password contains at least 5 and at maximum 15 characters. There are no limits for the characters you can use. But its recommended to use capital and non-capital letters, as well as digits and special characters to make your password safe.',TITLE,'Password',WIDTH,-300);" onmouseout="UnTip();">Password:</a></td>
			<td></td>
			<td><input type="password" name="passwd" id="passwd" value="" /> *</td>
		</tr>
		<tr>
			<td><a title="" class="tooltip" onmouseover="Tip('Here you have to type in your password again, just to take care that you made no typing mistake.',TITLE,'Repeat password',WIDTH,-300);" onmouseout="UnTip();">Repeat password:</a></td>
			<td></td>
			<td><input type="password" name="passwd2" id="passwd2" value="" /> *</td>
			<td id="check_passwd" style="text-indent:15px;"></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td><a title="" class="tooltip" onmouseover="Tip('Here you can choose the language your account shall work with.',TITLE,'Language',WIDTH,-300);" onmouseout="UnTip();">Language:</a></td>
			<td></td>
			<td>
				<select name="language">
					<option value="0">german</option>
					<option value="1" selected="selected">english</option>
				</select>
			</td>
			<td></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td colspan="3" class="center"><input type="submit" value="Send registration" name="submit" id="submit" disabled="disabled" class="disabled" /></td>
		</tr>
	</table>
</form>