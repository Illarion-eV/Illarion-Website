<?php
	function include_character_menu( $charid, $active )
	{
		global $url;
		global $language;

		$entries = array();
		$entries[1] = array( 'link'=>$url.'/illarion/gmtool/'.$language.'_character.php?id='.$charid, 'name'=>( $language == 'de' ? 'Informationen' : 'Informations' ) );
		$entries[2] = array( 'link'=>$url.'/illarion/gmtool/'.$language.'_character_attribs.php?id='.$charid, 'name'=>( $language == 'de' ? 'Attribute' : 'Attributs' ) );
		$entries[3] = array( 'link'=>$url.'/illarion/gmtool/'.$language.'_character_status.php?id='.$charid, 'name'=>( $language == 'de' ? 'Status' : 'State' ) );
		$entries[4] = array( 'link'=>$url.'/illarion/gmtool/'.$language.'_character_skills.php?id='.$charid, 'name'=>( $language == 'de' ? 'Skills' : 'Skills' ) );
		$entries[4]['subentries'][1] = array( 'link'=>$url.'/illarion/gmtool/'.$language.'_character_skills.php?id='.$charid, 'name'=>( $language == 'de' ? 'Kampfskills' : 'fighting skills' ));
?>

<div>
<pre>
<?php
	print_r($entries);
?>
</pre>
</div>

<?php } ?>