<?php
    include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

    global $template, $config, $user;

	Page::setTitle( $template->_rootref['PAGE_TITLE'] );
	Page::setDescription( $config['site_desc'] );
	Page::setLanguage( ( $user->data['user_lang'] == 'en' ? 'us' : 'de' ) );
	Page::addCSS( array( 'board' ) );

	Page::setXHTML();
 	Page::Init();
?>

<h3 class='right'>
	 Aktiv als:
	<select style='display:inline;' name="current_char" size="1">
      <option>Charakter 1</option>
      <option>Michael Jackson</option>
      <option>Marianne Rosenberg</option>
    </select>
</h3>

<table>
<tr>
<th>Profile</th>
<th>Messages</th>
</tr>
</table>



<!-- IF not S_IS_BOT and S_USER_LOGGED_IN -->
moep1
<!-- ENDIF -->
<!-- IF not S_USER_LOGGED_IN -->
moep2
<!-- ENDIF -->
<div style='border:1px solid #990000;'>
    moep
</div>

