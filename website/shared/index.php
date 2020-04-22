<?php
if (preg_match('/de/', $_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
	header('Location: https://illarion.org/general/de_startpage.php');
} else {
	header('Location: https://illarion.org/general/us_startpage.php');
}

?>