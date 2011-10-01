charname_request_cnt = 0;
last_request_received = 0;
function appendOrReplace( object, node )
{
	if (object.childNodes.length == 0)
	{
		object.appendChild( node );
	}
	else
	{
		object.replaceChild( node, object.firstChild );
	}
}

function checkCharname()
{
	var input_field = document.getElementById("charname");
	var charname = input_field.value;
	var server = document.getElementById("server").value;
	var text_area = document.getElementById("charname_result");
	var submitElement = document.getElementById("submit");
	if (charname.length<4)
	{
		if (cur_lang == 'de')
		{
			appendOrReplace( text_area, document.createTextNode( 'Name ist zu kurz' ) );
		}
		else
		{
			appendOrReplace( text_area, document.createTextNode( 'Name is too short' ) );
		}
		submitElement.className = 'disabled';
		submitElement.disabled = true;
		return true;
	}
	else if (charname.length>50)
	{
		if (cur_lang == 'de')
		{
			appendOrReplace( text_area, document.createTextNode( 'Name ist zu lang' ) );
		}
		else
		{
			appendOrReplace( text_area, document.createTextNode( 'Name is too long' ) );
		}
		submitElement.className = 'disabled';
		submitElement.disabled = true;
		return true;
	}
	else if (charname.search('[0-9*+.,;:@/\?!]')!=-1 || charname.search('^[A-Za-z \'äöüÄÖÜßáàÁÀéèÉÈíìÍÌóòÒÓúùÚÙ]+$')==-1)
	{
		if (cur_lang == 'de')
		{
			appendOrReplace( text_area, document.createTextNode( 'Name enthält ungültige Zeichen' ) );
		}
		else
		{
			appendOrReplace( text_area, document.createTextNode( 'Name contains invalid characters' ) );
		}
		submitElement.className = 'disabled';
		submitElement.disabled = true;
		return true;
	}
	else if (charname.search('^[A-Z]')==-1)
	{
		if (cur_lang == 'de')
		{
			appendOrReplace( text_area, document.createTextNode( 'Name muss mit Großbuchstaben beginnen' ) );
		}
		else
		{
			appendOrReplace( text_area, document.createTextNode( 'Name has to start with a capital letter' ) );
		}
		submitElement.className = 'disabled';
		submitElement.disabled = true;
		return true;
	}
	else if (charname.search(' [a-zäöüßáàéèíìóòúù]+$')!=-1)
	{
		if (cur_lang == 'de')
		{
			appendOrReplace( text_area, document.createTextNode( 'Der Nachname muss mit einem Großbuchstaben beginnen' ) );
		}
		else
		{
			appendOrReplace( text_area, document.createTextNode( 'Last name has to start with a capital letter' ) );
		}
		submitElement.className = 'disabled';
		submitElement.disabled = true;
		return true;
	}
	else if (charname.search(' [a-zäöüßáàéèíìóòúù]{4}$')!=-1)
	{
		if (cur_lang == 'de')
		{
			appendOrReplace( text_area, document.createTextNode( 'Der Nachname muss mindestens 5 Zeichen lang sein' ) );
		}
		else
		{
			appendOrReplace( text_area, document.createTextNode( 'The last name has to contain at least 5 characters' ) );
		}
		submitElement.className = 'disabled';
		submitElement.disabled = true;
		return true;
	}
	else if ((charname.toLowerCase()).search('[aeiouäöüáàéèíìóòúù]')==-1)
	{
		if (cur_lang == 'de')
		{
			appendOrReplace( text_area, document.createTextNode( 'Der Name muss Vokale enthalten' ) );
		}
		else
		{
			appendOrReplace( text_area, document.createTextNode( 'The name has to contain vowels' ) );
		}
		submitElement.className = 'disabled';
		submitElement.disabled = true;
		return true;
	}
	else if (charname.search('^.. ')!=-1)
	{
		if (cur_lang == 'de')
		{
			appendOrReplace( text_area, document.createTextNode( 'Der Vorname muss mindestens 3 Zeichen lang sein' ) );
		}
		else
		{
			appendOrReplace( text_area, document.createTextNode( 'The first name has to contain at least 3 characters' ) );
		}
		submitElement.className = 'disabled';
		submitElement.disabled = true;
		return true;
	}
	else if (charname.search(' .$')!=-1)
	{
		if (cur_lang == 'de')
		{
			appendOrReplace( text_area, document.createTextNode( 'Der letzte Teil des Namens muss mindestens 2 Zeichen lang sein' ) );
		}
		else
		{
			appendOrReplace( text_area, document.createTextNode( 'The last part of the name has to contain at least 2 characters' ) );
		}
		submitElement.className = 'disabled';
		submitElement.disabled = true;
		return true;
	}
	else if (charname.search('[a-zäöüßéèíìóòúùA-ZÄÖÜÁÀÉÈÍÌÒÓÚÙ][A-ZÄÖÜÁÀÉÈÍÌÒÓÚÙ]')!=-1)
	{
		if (cur_lang == 'de')
		{
			appendOrReplace( text_area, document.createTextNode( 'Es darf keine Großbuchstaben direkt nach einem Kleinbuchstaben geben' ) );
		}
		else
		{
			appendOrReplace( text_area, document.createTextNode( 'Capital letters must not be written directly after non-capital letters' ) );
		}
		submitElement.className = 'disabled';
		submitElement.disabled = true;
		return true;
	}
	else if (charname.search('  ')!=-1)
	{
		if (cur_lang == 'de')
		{
			appendOrReplace( text_area, document.createTextNode( 'Der Name enthält zwei Leerzeichen in Folge' ) );
		}
		else
		{
			appendOrReplace( text_area, document.createTextNode( 'The name contains two whitespaces in a row' ) );
		}
		submitElement.className = 'disabled';
		submitElement.disabled = true;
		return true;
	}
	else if (charname.search('^ ')!=-1)
	{
		if (cur_lang == 'de')
		{
			appendOrReplace( text_area, document.createTextNode( 'Der Name darf nicht mit einem Leerzeichen beginnen' ) );
		}
		else
		{
			appendOrReplace( text_area, document.createTextNode( 'The name must not beginn with a whitespace' ) );
		}
		submitElement.className = 'disabled';
		submitElement.disabled = true;
		return true;
	}
	else if (charname.search(' $')!=-1)
	{
		if (cur_lang == 'de')
		{
			appendOrReplace( text_area, document.createTextNode( 'Der Name darf nicht mit einem Leerzeichen enden' ) );
		}
		else
		{
			appendOrReplace( text_area, document.createTextNode( 'The name must not end with a whitespace' ) );
		}
		submitElement.className = 'disabled';
		submitElement.disabled = true;
		return true;
	}

	input_field.className = 'ajax_loading';
	charname_request_cnt++;
	var target = url+'/community/account/func.newchar_1.php?charname='+encodeURIComponent(charname)+'&server='+server+'&lang='+cur_lang+'&cnt='+charname_request_cnt;
	new Ajax.Request(target, {
		method: 'get',
		onSuccess: function(transport)
		{
			var text_area = document.getElementById("charname_result");
			var submitElement = document.getElementById("submit");
			var answer = transport.responseText.split('|');
			answer[0] = parseInt(answer[0]);
			if (answer[0] < last_request_received)
			{
				return false;
			}
			last_request_received = answer[0];
			if (answer[1] == 'OK')
			{
				if (cur_lang == 'de')
				{
					appendOrReplace( text_area, document.createTextNode( 'Name ist in Ordnung' ) );
				}
				else
				{
					appendOrReplace( text_area, document.createTextNode( 'Name is fine' ) );
				}
				submitElement.className = '';
				submitElement.disabled = false;

			}
			else
			{
				appendOrReplace( text_area, document.createTextNode( answer[1] ) );
				submitElement.className = 'disabled';
				submitElement.disabled = true;
			}
			document.getElementById("charname").className = '';
		}
	});}