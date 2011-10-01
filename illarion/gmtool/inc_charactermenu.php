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


<div class="menu">
	<ul class="menu_top">
		<?php foreach ($entries as $key=>$entry): ?>
			<li<?php echo ($active==$key ? ' class="selected"' : ''); ?>>
				<a <?php echo ($active==$key ? ' class="selected"' : 'href="'.$entry['link'].'"'); ?>>
					<?php echo $entry['name']."-".count($entry['subentries']); ?>
				</a>

			<?php if (count($entry['subentries']) > 0 ) : ?>
				<?php foreach ($entry['subentries'] as $key => $subentry): ?>
					<li>
						<a href="<?php echo $subentry['link']; ?>">
						<?php echo $subentry['name']; ?>
						</a>
					</li>
				<?php endforeach; ?>
			<?php endif ?>
			</li>

		<?php endforeach; ?>
		<li class="end" />
	</ul>
</div>



<?php } ?>