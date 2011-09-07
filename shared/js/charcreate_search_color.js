var currentlySearching = false;
var searchAgain = false;
function performSearch()
{
	if (!currentlySearching)
	{
		currentlySearching = true;
	}
	else
	{
		searchAgain = true;
		return;
	};


}

function colorChange(color)
{
	$('skin_color').style.backgroundColor = '#'+color;
	$('skincolor').value = '#'+color;
}