function initGoogleAnalytics()
{
    if (typeof _gat != 'undefined')
    {
    	var pageTracker = _gat._getTracker("UA-591896-1");
    	pageTracker._initData();
    	pageTracker._trackPageview();
	};
};

function initGooglePlusOne()
{
	var po = document.createElement('script');
	po.type = 'text/javascript';
	po.async = true;
	po.src = 'https://apis.google.com/js/plusone.js';
	
	var s = document.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(po, s);
};

function initGoogle()
{
    initGoogleAnalytics();
	initGooglePlusOne();
};

if (typeof Prototype != 'undefined')
{
	Event.observe(window, 'load', initGoogle, false);
}
else
{
	var oldonload = window.onload; 
	if (typeof window.onload != 'function') { 
		window.onload = initGoogle; 
	} else { 
		window.onload = function() { 
			if (oldonload) { 
				oldonload(); 
			} 
			initGoogle(); 
		} 
	}
};