<?php
	function include_account_menu( $accid, $active )
	{
		global $url;
		global $language;

		$entries = array();
		$entries[1] = array( 'link'=>$url.'/illarion/gmtool/'.$language.'_account.php?id='.$accid, 'name'=>( $language == 'de' ? 'Informationen' : 'Informations' ) );
		$entries[2] = array( 'link'=>$url.'/illarion/gmtool/'.$language.'_account_chars.php?id='.$accid, 'name'=>( $language == 'de' ? 'Charaktere' : 'Characters' ) );
		$entries[3] = array( 'link'=>$url.'/illarion/gmtool/'.$language.'_account_status.php?id='.$accid, 'name'=>( $language == 'de' ? 'Status' : 'State' ) );
		$entries[4] = array( 'link'=>$url.'/illarion/gmtool/'.$language.'_account_notes.php?id='.$accid, 'name'=>( $language == 'de' ? 'Notizen' : 'Notes' ) );
?>
<div class="menu">
	<ul class="menu_top">
		<?php foreach ($entries as $key=>$entry): ?>
			<li<?php echo ($active==$key ? ' class="selected"' : ''); ?>>
				<a <?php echo ($active==$key ? ' class="selected"' : 'href="'.$entry['link'].'"'); ?>>
					<?php echo $entry['name']; ?>
				</a>
			</li>
		<?php endforeach; ?>
		<li class="end" />
	</ul>
</div>

<?php } ?>