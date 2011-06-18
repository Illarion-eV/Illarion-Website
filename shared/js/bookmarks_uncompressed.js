function FensterOeffnen ()
{
   MeinFenster = window.open(url+"/community/"+cur_lang+"_bookmark.php", "Bookmarks", "width=300,height=560,left=100,top=100,scrollbars=yes");
   MeinFenster.focus();
}

function initGoogle()
{
    if (typeof _gat != 'undefined')
    {
    	var pageTracker = _gat._getTracker("UA-591896-1");
    	pageTracker._initData();
    	pageTracker._trackPageview();
    }
}

if (typeof Prototype != 'undefined')
{
	Event.observe(window, 'load', initGoogle, false);
}
else
{
	window.onload = initGoogle;
}