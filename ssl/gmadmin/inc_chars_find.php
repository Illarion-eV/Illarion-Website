<?php
	
	// Char search form
	$content="<form action='index.php?mod=search&submod=chars' method='post'>
								Search chars by<br><br>
								<input type='radio' name='servertype' value='testserver'> Testserver<br>
								<input type='radio' name='servertype' value='illarionserver' checked> Liveserver<br>
								<br>
								<input type='radio' name='searchtype' value='charid' checked> Char ID<br>
								<input type='radio' name='searchtype' value='charname'> Name<br>
								<input type='radio' name='searchtype' value='accountid'> Account ID<br>
								<input type='radio' name='searchtype' value='lastip'> Last IP<br>
								<input type='radio' name='searchtype' value='online'> Online<br>
								<input type='radio' name='searchtype' value='charstatus'> Char Status = ".VarCharStatus2(0)." <br><br>
							
								<br>with value<br><br>
								<input type='text' name='searchvalue'><br><br>
								<input type='submit' value='Search'>
								</form>";
?>