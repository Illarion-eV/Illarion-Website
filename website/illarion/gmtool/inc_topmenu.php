<?php
	function include_menu()
	{
		global $url;
		global $language;
?>
<div class="menu">
	<ul class="menu_top">
		<li><a href="<?php echo $url; ?>/illarion/gmtool/<?php echo $language; ?>_gmtool.php"><?php echo ( $language == 'de' ? 'Übersicht' : 'Overview' ); ?></a></li>
		<?php if (IllaUser::auth('gmtool_chars') || IllaUser::auth('gmtool_accounts')): ?>
		<li>
			<a class="none"><?php echo ( $language == 'de' ? 'Suche' : 'Search' ); ?></a>
			<ul>
				<?php if (IllaUser::auth('gmtool_accounts')): ?>
				<li><a href="<?php echo $url; ?>/illarion/gmtool/<?php echo $language; ?>_search_accounts.php"><?php echo ( $language == 'de' ? 'Accounts' : 'Accounts' ); ?></a></li>
				<?php endif; ?>
				<?php if (IllaUser::auth('gmtool_chars')): ?>
				<li class="last"><a href="<?php echo $url; ?>/illarion/gmtool/<?php echo $language; ?>_search_chars.php"><?php echo ( $language == 'de' ? 'Charaktere' : 'Characters' ); ?></a></li>
				<?php endif; ?>
			</ul>
		</li>
		<?php endif; ?>
        <?php if (IllaUser::auth('gmtool_pages')): ?>
        <li>
            <a class="none"><?php echo ( $language == 'de' ? 'GM Pages' : 'GM Pages' ); ?></a>
            <ul>
                <li><a href="<?php echo $url; ?>/illarion/gmtool/<?php echo $language; ?>_pages.php?filter=0"><?php echo ( $language == 'de' ? 'Neu' : 'New' ); ?></a></li>
                <li><a href="<?php echo $url; ?>/illarion/gmtool/<?php echo $language; ?>_pages.php?filter=1"><?php echo ( $language == 'de' ? 'in Arbeit' : 'in work' ); ?></a></li>
                <li><a href="<?php echo $url; ?>/illarion/gmtool/<?php echo $language; ?>_pages.php?filter=2"><?php echo ( $language == 'de' ? 'fertig' : 'done' ); ?></a></li>
                <li class="last"><a href="<?php echo $url; ?>/illarion/gmtool/<?php echo $language; ?>_pages.php?filter=3"><?php echo ( $language == 'de' ? 'Archiv' : 'Archiv' ); ?></a></li>
            </ul>
        </li>
        <?php endif; ?>
		<?php if (IllaUser::auth('gmtool_gms')): ?>
		<li>
			<a class="none"><?php echo ( $language == 'de' ? 'Admin Tools' : 'Admin Tools' ); ?></a>
			<ul>
				<li class="last"><a href="<?php echo $url; ?>/illarion/gmtool/<?php echo $language; ?>_gms.php"><?php echo ( $language == 'de' ? 'GMs verwalten' : 'Manage gms' ); ?></a></li>
			</ul>
		</li>
		<?php endif; ?>
		<li class="end" />
	</ul>
</div>
<?php } ?>
