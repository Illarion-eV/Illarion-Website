$(document).ready(function() {
	var lastUsernameSend = 0;
	var lastUsernameReceived = 0;
	var lastEmailSend = 0;
	var lastEmailReceived = 0;
	var nameOK = false;
	var mailOK = false;
	var passOK = false;

	var addOrReplaceChild = function ( element, child ) {
		if (element.firstChild) {
			element.replaceChild( child, element.firstChild );
		} else {
			element.appendChild( child );
		}
	};
	
	var checkUsername = function() {
		var username = $('#username')[0].value;
		var text_area = $('#check_username')[0];
		var submitElement = $('#submit');
		
		if (username.length<5)
		{
			addOrReplaceChild( text_area, document.createTextNode((cur_lang == 'de' ? 'Name ist zu kurz' : 'Name is too short')) );
			nameOK = false;
			submitElement.className = 'disabled';
			submitElement.disabled = true;
			return true;
		}
		else if (username.length>32)
		{
			addOrReplaceChild( text_area, document.createTextNode((cur_lang == 'de' ? 'Name ist zu lang' : 'Name is too long')) );
			nameOK = false;
			submitElement.addClass('disabled');
			submitElement[0].disabled = true;
			return true;
		}
		lastUsernameSend++;
		var target = url+'/community/account/func.register.php?action=check_user&value='+encodeURIComponent(username)+'&cnt='+lastUsernameSend;
		$.ajax({
			url: target,
			type: 'get',
			dataType: 'script',
			success: function(data) {
				var text_area = $('#check_username')[0];
				var submitElement = $('#submit');
				var answer = data.split('|');
				answer[0] = parseInt(answer[0]);
				if (answer[0] < lastUsernameReceived) {
					return false;
				}
				lastUsernameReceived = answer[0];
				if (answer[1] == 1) {
					addOrReplaceChild( text_area, document.createTextNode((cur_lang == 'de' ? 'Name ist in Ordnung' : 'Name is okay')) );
					nameOK = true;
					if (mailOK && passOK) {
						submitElement.removeClass('disabled');
						submitElement[0].disabled = false;
					}
				} else {
					addOrReplaceChild( text_area, document.createTextNode((cur_lang == 'de' ? 'Name ist vergeben' : 'Name is taken')) );
					nameOK = false;
					submitElement.addClass('disabled');
					submitElement[0].disabled = true;
				}
			}
		});
	};
	$('#username').change(checkUsername);
	$('#username').keyup(checkUsername);

	var checkMail = function() {
		var email = $('#email')[0].value;
		var text_area = $('#check_email')[0];
		var submitElement = $('#submit');
		
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
				answer[0] = parseInt(answer[0]);
				if (answer[0] < lastEmailReceived) {
					return false;
				}
				lastEmailReceived = answer[0];
				if (answer[1] == 2) {
					addOrReplaceChild( text_area, document.createTextNode((cur_lang == 'de' ? 'E-Mail Adresse ist ungültig' : 'E-Mail address is invalid')) );
					mailOK = false;
					submitElement.addClass('disabled');
					submitElement[0].disabled = true;
				}
				else if (answer[1] == 1) {
					addOrReplaceChild( text_area, document.createTextNode((cur_lang == 'de' ? 'E-Mail Adresse ist in Ordnung' : 'E-Mail address is okay')) );
					mailOK = true;
					if (nameOK && passOK) {
						submitElement.removeClass('disabled');
						submitElement[0].disabled = false;
					}
				}
				else
				{
					addOrReplaceChild( text_area, document.createTextNode((cur_lang == 'de' ? 'E-Mail Adresse ist vergeben' : 'E-Mail address is taken')) );
					mailOK = false;
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
