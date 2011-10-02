<?php
	function include_character_menu( $charid, $active, $server )
	{
		global $url;
		global $language;
?>

<div class="menu">
	<ul class="menu_top">
		<li>
			<a class="none" ><?php echo ( $language == 'de' ? 'Informationen' : 'Informations' ); ?></a>
			<ul>
			<li><a href="<?php echo $url; ?>/illarion/gmtool/<?php echo $language; ?>_charakter.php?id=<?php echo $charid; ?>&amp;server=<?php echo $server; ?>"><?php echo ( $language == 'de' ? 'Allgemeines' : 'General' ); ?></a></li>
				<li><a href="<?php echo $url; ?>/illarion/gmtool/<?php echo $language; ?>_charakter_settings.php?id=<?php echo $charid; ?>&amp;server=<?php echo $server; ?>"><?php echo ( $language == 'de' ? 'Einstellungen' : 'Settings' ); ?></a></li>
				<li class="last"><a href="<?php echo $url; ?>/illarion/gmtool/<?php echo $language; ?>_character_style.php?id=<?php echo $charid; ?>&amp;server=<?php echo $server; ?>"><?php echo ( $language == 'de' ? 'Aussehen' : 'Style' ); ?></a></li>
			</ul>
		</li>
		<li><a href="<?php echo $url; ?>/illarion/gmtool/<?php echo $language; ?>_character.php?id=<?php echo $charid; ?>&amp;server=<?php echo $server; ?>"><?php echo ( $language == 'de' ? 'Status' : 'Status' ); ?></a></li>
		<li><a href="<?php echo $url; ?>/illarion/gmtool/<?php echo $language; ?>_character_attributs.php?id=<?php echo $charid; ?>&amp;server=<?php echo $server; ?>"><?php echo ( $language == 'de' ? 'Attribute' : 'Attributs' ); ?></a></li>
		<li>
			<a class="none" ><?php echo ( $language == 'de' ? 'Skills' : 'Skills' ); ?></a>
			<ul>
			<li><a href="<?php echo $url; ?>/illarion/gmtool/<?php echo $language; ?>_charakter_skills.php?id=<?php echo $charid; ?>&amp;server=<?php echo $server; ?>&amp;filter=0"><?php echo ( $language == 'de' ? 'Sprachen' : 'Language' ); ?></a></li>
				<li><a href="<?php echo $url; ?>/illarion/gmtool/<?php echo $language; ?>_charakter_skills.php?id=<?php echo $charid; ?>&amp;server=<?php echo $server; ?>&amp;filter=1"><?php echo ( $language == 'de' ? 'Kampf' : 'Fighting' ); ?></a></li>
				<li><a href="<?php echo $url; ?>/illarion/gmtool/<?php echo $language; ?>_charakter_skills.php?id=<?php echo $charid; ?>&amp;server=<?php echo $server; ?>&amp;filter=2"><?php echo ( $language == 'de' ? 'Magie' : 'Magic' ); ?></a></li>
				<li><a href="<?php echo $url; ?>/illarion/gmtool/<?php echo $language; ?>_character_skills.php?id=<?php echo $charid; ?>&amp;server=<?php echo $server; ?>&amp;filter=3"><?php echo ( $language == 'de' ? 'Handwerk' : 'Crafting' ); ?></a></li>
				<li><a href="<?php echo $url; ?>/illarion/gmtool/<?php echo $language; ?>_character_skills.php?id=<?php echo $charid; ?>&amp;server=<?php echo $server; ?>&amp;filter=4"><?php echo ( $language == 'de' ? 'Druiden' : 'Druidic' ); ?></a></li>
				<li><a href="<?php echo $url; ?>/illarion/gmtool/<?php echo $language; ?>_character_skills.php?id=<?php echo $charid; ?>&amp;server=<?php echo $server; ?>&amp;filter=5"><?php echo ( $language == 'de' ? 'Barden' : 'Bard' ); ?></a></li>
				<li class="last"><a href="<?php echo $url; ?>/illarion/gmtool/<?php echo $language; ?>_character_skills.php?id=<?php echo $charid; ?>&amp;server=<?php echo $server; ?>&amp;filter=6"><?php echo ( $language == 'de' ? 'Sonstiges' : 'Others' ); ?></a></li>
			</ul>
		</li>
		<li><a href="<?php echo $url; ?>/illarion/gmtool/<?php echo $language; ?>_character_runes.php?id=<?php echo $charid; ?>&amp;server=<?php echo $server; ?>"><?php echo ( $language == 'de' ? 'Runen' : 'Runes' ); ?></a></li>

	</ul>
</div>

<?php } ?>