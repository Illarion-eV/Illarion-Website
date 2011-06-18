var a = 'i';
a+= 'l';
a+= 'l';
a+= 'a';
a+= 'r';
a+= 'i';
a+= 'o';
a+= 'n';
a+= '.';
a+= 'o';
a+= 'r';
a+= 'g';

if (window.location.hostname != a)
{
	window.location.href = window.location.protocol+'//'+a+'/';
};

if (window.location.host.indexOf(a) == -1)
{
	window.location.href = window.location.protocol+'//'+a+'/';
};

if (window.location.href.indexOf(a) == -1)
{
	window.location.href = window.location.protocol+'//'+a+'/';
};
a = null;