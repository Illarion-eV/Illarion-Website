<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( 'Crypt' );
	Page::setDescription( 'Crypt a password for Illarion' );
	Page::setKeywords( array( 'Password', 'Crypt' ) );

	Page::setXHTML();
	Page::Init();

	if ( isset( $_POST['klartext'] ) )
	{
		$subject =& $_POST['klartext'];
		$everything_ok = true;
		if ( !preg_match( '/[a-z]/i', $subject ) )
		{
			Messages::add( 'Letters are needed in the password.', 'error' );
			$everything_ok = false;
		}

		if ( !preg_match( '/[0-9]/', $subject ) )
		{
			Messages::add( 'Numbers are needed in the password', 'error' );
			$everything_ok = false;
		}

		if ( strlen( $subject ) < 12 )
		{
			Messages::add( 'At least 12 characters are needed in the password', 'error' );
			$everything_ok = false;
		}

		if (!$everything_ok)
		{
			unset( $_POST['klartext'] );
		}
		else
		{
			Messages::add( 'Password okay', 'info' );
		}
	}
?>
<h1>Crypt</h1>

<h2>Plaintext Password</h2>

<p>Choose a password that
<ul>
    <li>does not resemble an existing word</li>
    <li>does not resemble an existing word with a number added</li>
    <li>is at least 12 characters long</li>
    <li>contains letters in upper case and lower case</li>
    <li>contains digits</li>
    <li>contains special characters</li>
    <li>contains the above in seemingly arbitrary order</li>
</ul>
If you're having trouble to remember all your passwords, than have a look at <a href="http://keepassx.org">http://keepassx.org</a>
</p>

<p>Please enter the password that shall be crypted:</p>

<form action='<?php $_SERVER['PHP_SELF'] ?>' method='post'>
	<p>
	   <input name="klartext" type="text" style="width:100%;" />
	   <input type="submit" value="Go!" />
	</p>
</form>

<h2>Crypted Password</h2>
<p>Please copy/paste this (and only this) crypted password to the one who requested it (Alatar or Vilarion):</p>
<p>
	<?php
		$salt = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789"), 0, 8);
	?>
	<input type="text" name="cryptpw" onclick="this.select();" readonly="readonly" style="width:100%;" value="<?php echo ( isset( $_POST['klartext'] ) ? crypt( $_POST['klartext'], '$1$'.$salt.'$' ) : '' ); ?>" />
</p>

<h2>Other Encryption Methods</h2>
<p>Listed below the password is encrypted with some alternative encryption systems. This is mainly displayed for testing purposes.</p>

<?php
	function executeEncryption($salt, $name, $requirement) {
		$plainpass = '';
		$passwd = '';
		
		echo '<dt style="font-weight:bold">', $name, ' (Salt: <em style="font-weight:bold">', $salt, '</em>)</dt>';
		echo '<dd style="margin-bottom:10px;">';
		if (!$requirement) {
			echo $name, ' not supported!</dd>';
			return;
		}
		
		if (isset($_POST['klartext'])) {
			$plainpass = $_POST['klartext'];
			$passwd = crypt($plainpass, $salt);
		}
		
		echo '<input type="text" name="cryptpw" onclick="this.select();" readonly="readonly" style="width:100%;" value="', $passwd, '" />';
		
		if ($passwd == '') {
			echo '</dd>';
			return;
		}
		
		echo '<br />Checking Password: ';
		if (crypt($plainpass, $passwd) == $passwd) {
			echo '<b style="color:green">Password is working fine.</b>';
		} else {
			echo '<b style="color:red">Failed to validate password!</b>';
		}
		echo '</dd>';
	}
?>

<dl>
	<?php executeEncryption('21', 'Standard DES', (CRYPT_STD_DES == 1)); ?>
	<?php executeEncryption('_J6..illa', 'Extended DES', (CRYPT_EXT_DES == 1)); ?>
	<?php executeEncryption('$1$illarion$', 'Salted MD5', (CRYPT_MD5 == 1)); ?>
	<?php executeEncryption('$2a$12$IllarionIsACoolGame12', 'Blowfish', (CRYPT_BLOWFISH == 1)); ?>
	<?php executeEncryption('$5$rounds=5000$Illarion4TheWin', 'SHA-256', (CRYPT_SHA256 == 1)); ?>
	<?php executeEncryption('$6$rounds=5000$Illarion4TheWin', 'SHA-512', (CRYPT_SHA512 == 1)); ?>
</dl>

<?php Page::insert_go_to_top_link(); ?>
