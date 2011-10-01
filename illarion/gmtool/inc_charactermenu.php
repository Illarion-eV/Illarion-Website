<?php
	function include_character_menu( $charid, $active )
	{
		global $url;
		global $language;
?>

<div class="menu">
	<ul class="menu_top">
		<li><a href="<?php echo $url; ?>/illarion/gmtool/<?php echo $language; ?>_character.php"><?php echo ( $language == 'de' ? 'Informationen' : 'Informations' ); ?></a></li>
		<li><a href="<?php echo $url; ?>/illarion/gmtool/<?php echo $language; ?>_character.php"><?php echo ( $language == 'de' ? 'Status' : 'Status' ); ?></a></li>
		<li><a href="<?php echo $url; ?>/illarion/gmtool/<?php echo $language; ?>_character_attributs.php"><?php echo ( $language == 'de' ? 'Attribute' : 'Attributs' ); ?></a></li>
		<li>
			<a class="none"><?php echo ( $language == 'de' ? 'Skills' : 'Skills' ); ?></a>
			<ul>
			<li><a href="<?php echo $url; ?>/illarion/gmtool/<?php echo $language; ?>_charakter_skills.php?filter=0"><?php echo ( $language == 'de' ? 'Sprachen' : 'Language' ); ?></a></li>
				<li><a href="<?php echo $url; ?>/illarion/gmtool/<?php echo $language; ?>_charakter_skills.php?filter=1"><?php echo ( $language == 'de' ? 'Kampf' : 'Fighting' ); ?></a></li>
				<li><a href="<?php echo $url; ?>/illarion/gmtool/<?php echo $language; ?>_charakter_skills.php?filter=2"><?php echo ( $language == 'de' ? 'Magie' : 'Magic' ); ?></a></li>
				<li><a href="<?php echo $url; ?>/illarion/gmtool/<?php echo $language; ?>_character_skills.php?filter=3"><?php echo ( $language == 'de' ? 'Handwerk' : 'Crafting' ); ?></a></li>
				<li><a href="<?php echo $url; ?>/illarion/gmtool/<?php echo $language; ?>_character_skills.php?filter=4"><?php echo ( $language == 'de' ? 'Druiden' : 'Druidic' ); ?></a></li>
				<li><a href="<?php echo $url; ?>/illarion/gmtool/<?php echo $language; ?>_character_skills.php?filter=5"><?php echo ( $language == 'de' ? 'Barden' : 'Bard' ); ?></a></li>
				<li class="last"><a href="<?php echo $url; ?>/illarion/gmtool/<?php echo $language; ?>_character_skills.php?filter=6"><?php echo ( $language == 'de' ? 'Sonstiges' : 'Others' ); ?></a></li>
			</ul>
		</li>
		<li><a href="<?php echo $url; ?>/illarion/gmtool/<?php echo $language; ?>_character_runes.php"><?php echo ( $language == 'de' ? 'Runen' : 'Runes' ); ?></a></li>
		<li class="end" />
	</ul>
</div>

<?php } ?>