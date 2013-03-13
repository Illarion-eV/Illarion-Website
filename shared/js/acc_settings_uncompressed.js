$(document).ready(function() {
	var lastEmailSend = 0;
	var lastEmailReceived = 0;

	var EMail = function(s) {
		var a = false;
		var res = false;
		if(typeof(RegExp) == 'function') {
			var b = new RegExp('abc');
			if(b.test('abc')) {
				a = true;
			}
		}

		if(a) {
			var reg = new RegExp('^([a-zA-Z0-9\\-\\.\\_]+)'+
			'(\\@)([a-zA-Z0-9\\-\\.\\_]+)'+
			'(\\.)([a-zA-Z]{2,4})$');
			res = (reg.test(s));
		} else {
			res = (s.search('@') >= 1 &&
			s.lastIndexOf('.') > s.search('@') &&
			s.lastIndexOf('.') >= s.length-5);
		}
		return(res);
	};

	var addOrReplaceChild = function ( element, child ) {
		if (element.firstChild) {
			element.replaceChild( child, element.firstChild );
		} else {
			element.appendChild( child );
		}
	};

	var checkMail = function() {
		var email = $('#email').val();
		var text_area = $('#check_email')[0];
		var submitElement = $('#submit');

		if (email.length === 0) {
			return true;
		}

		if(!EMail(email)) {
			addOrReplaceChild( text_area, document.createTextNode((cur_lang == 'de' ? 'E-Mail Adresse ist ungültig' : 'E-Mail adress is invalid')) );
			submitElement.addClass('disabled');
			submitElement[0].disabled = true;
			return true;
		}

		lastEmailSend++;
		var target = url+'/community/account/func.register.php?action=check_email&value='+encodeURIComponent(email)+'&cnt='+lastEmailSend;

		$.ajax({
			url: target,
			type: 'get',
			dataType: 'script',
			success: function(data) {
				var text_area = $('#check_email')[0];
				var submitElement = $('#submit');
				var answer = data.split('|');
				answer[0] = parseInt(answer[0], 0);
				if (answer[0] < lastEmailReceived) {
					return false;
				}
				lastEmailReceived = answer[0];
				if (answer[1] == 1) {
					addOrReplaceChild( text_area, document.createTextNode((cur_lang == 'de' ? 'E-Mail Adresse ist in Ordnung' : 'E-Mail adress is okay')) );
					submitElement.removeClass('disabled');
					submitElement[0].disabled = false;
				} else {
					addOrReplaceChild( text_area, document.createTextNode((cur_lang == 'de' ? 'E-Mail Adresse ist vergeben' : 'E-Mail adress is taken')) );
					submitElement.addClass('disabled');
					submitElement[0].disabled = true;
				}
			}
		});
	};
	$('#email').change(checkMail);
	$('#email').keyup(checkMail);

	var checkPasswd = function() {
		var submitElement = $('#submit');
		var passwd1 = $('#passwd').val();
		var passwd2 = $('#passwd2').val();
		var text_area = $('#check_passwd')[0];

		if (passwd1.length === 0) {
			return true;
		}
		else if (passwd1.length < 5) {
			addOrReplaceChild( text_area, document.createTextNode((cur_lang == 'de' ? 'Passwort ist zu kurz' : 'Password is too short')) );
			submitElement.addClass('disabled');
			submitElement[0].disabled = true;
		}
		else if (passwd1.length > 20) {
			addOrReplaceChild( text_area, document.createTextNode((cur_lang == 'de' ? 'Passwort ist zu lang' : 'Password is too long')) );
			submitElement.addClass('disabled');
			submitElement[0].disabled = true;
		}
		else if (passwd1 == passwd2 )
		{
			addOrReplaceChild( text_area, document.createTextNode((cur_lang == 'de' ? 'Passwort ist in Ordnung' : 'Password is okay')) );
			submitElement.removeClass('disabled');
			submitElement[0].disabled = false;
		}
		else
		{
			addOrReplaceChild( text_area, document.createTextNode((cur_lang == 'de' ? 'Passwörter sind nicht identisch' : 'Passwords are not identical')) );
			submitElement.addClass('disabled');
			submitElement.disabled = true;
		}
	};

	$('#passwd').change(checkPasswd);
	$('#passwd').keyup(checkPasswd);
	$('#passwd2').change(checkPasswd);
	$('#passwd2').keyup(checkPasswd);
});
