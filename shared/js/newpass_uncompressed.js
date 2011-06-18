function checkEmail()
{
	var email = document.getElementById("email").value;
	var text_area = document.getElementById("message_mail");
	var submitElement = document.getElementById("submit");
	if(!EMail(email))
	{
		addOrReplaceChild( text_area, document.createTextNode((cur_lang == 'de' ? 'E-Mail Adresse ist ungültig' : 'E-Mail adress is invalid')) );
		submitElement.className = 'disabled';
		submitElement.disabled = true;
		return true;
	}
	else
	{
		addOrReplaceChild( text_area, document.createTextNode((cur_lang == 'de' ? 'E-Mail Adresse ist in Ordnung' : 'E-Mail adress is okay')) );
		submitElement.className = '';
		submitElement.disabled = false;
	}
}

function EMail(s)
{
	var a = false;
	var res = false;
	if(typeof(RegExp) == 'function')
	{
		var b = new RegExp('abc');
		if(b.test('abc') == true){a = true;}
	}

	if(a == true)
	{
		reg = new RegExp('^([a-zA-Z0-9\\-\\.\\_]+)'+
		'(\\@)([a-zA-Z0-9\\-\\.]+)'+
		'(\\.)([a-zA-Z]{2,4})$');
		res = (reg.test(s));
	}
	else
	{
		res = (s.search('@') >= 1 &&
		s.lastIndexOf('.') > s.search('@') &&
		s.lastIndexOf('.') >= s.length-5)
	}
	return(res);
}

function checkPasswd()
{
	var submitElement = document.getElementById("submit");
	var passwd1 = document.getElementById("passwd").value;
	var passwd2 = document.getElementById("passwd2").value;
	var text_area = document.getElementById("message_passwd");
	if (passwd1.length < 5) {
		addOrReplaceChild( text_area, document.createTextNode((cur_lang == 'de' ? 'Passwort ist zu kurz' : 'Password is too short')) );
		submitElement.className = 'disabled';
		submitElement.disabled = true;
	}
	else if (passwd1.length > 20) {
		addOrReplaceChild( text_area, document.createTextNode((cur_lang == 'de' ? 'Passwort ist zu lang' : 'Password is too long')) );
		submitElement.className = 'disabled';
		submitElement.disabled = true;
	}
	else if (passwd1 == passwd2 )
	{
		addOrReplaceChild( text_area, document.createTextNode((cur_lang == 'de' ? 'Passwort ist in Ordnung' : 'Password is okay')) );
		submitElement.className = '';
		submitElement.disabled = false;
	}
	else
	{
		addOrReplaceChild( text_area, document.createTextNode((cur_lang == 'de' ? 'Passwörter sind nicht identisch' : 'Passwords are not identical')) );
		submitElement.className = 'disabled';
		submitElement.disabled = true;
	}
}

function addOrReplaceChild( element, child ) {
	if (element.firstChild)
	{
		element.replaceChild( child, element.firstChild );
	}
	else
	{
		element.appendChild( child );
	}
}