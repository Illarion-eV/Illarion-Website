<?

	$menu3="<table width='100%'><tr><td></td>
						<td width='100' align='center'><a href='https://illarion.org/gmadmin/index.php?mod=gameeditors&submod=editor_npc&servertype=illarionserver'>Realserver</a></td>
						<td width='100' align='center'><a href='https://illarion.org/gmadmin/index.php?mod=gameeditors&submod=editor_npc&servertype=testserver'>Testserver</a></td>
						<td width='100' align='center'></td>
						<td width='100' align='center'><a href='https://illarion.org/gmadmin/index.php?mod=gameeditors&submod=editor_npc&action=addnpc'>Add Monster</a></td>
						<td></td></tr></table>";
						
	if ($_GET[servertype]<>"illarionserver") {$_GET[servertype]="testserver";}
	

?>