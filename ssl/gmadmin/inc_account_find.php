<?php
			
	// Generates the search form for accounts		
	$content="<form action='index.php?mod=search' method='post'>
								Search accounts by<br><br>
								<input type='radio' name='searchtype' value='id' checked> ID<br>
								<input type='radio' name='searchtype' value='mail'> Email<br>
								<input type='radio' name='searchtype' value='name'> Name<br>
								<input type='radio' name='searchtype' value='char'> Char<br>
								<input type='radio' name='searchtype' value='status'> Status<br><br>
																
								<input type='radio' name='searchtype' value='multi'> Search for Multi Accounts<br>

								<br>with value<br><br>
								<input type='text' name='searchvalue'><br><br>
								<input type='submit' value='Search'>
								</form>";
	
?>