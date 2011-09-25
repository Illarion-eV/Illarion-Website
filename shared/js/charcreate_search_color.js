var h_color = '412728';
var h_value = '_hair_2';

function skinColorChange(color, image)
{
	var params = '';
	params+='color='+color;
	params+='&image='+image;

	$('ajax_works').setStyle({
		background: 'transparent url('+url+'/shared/pics/ajax-loading.gif) no-repeat scroll center center'
	});

	var newAJAX = new Ajax.Request(
		url+'/community/account/new/ajax_search_colors.php',
		{
			method: 'post',
			parameters: params,
			evalJS: false,
			onComplete: function(response)
			{
				parseResponse( response.responseXML, 'char_image' );

				$('ajax_works').setStyle({
						background: ''
				});
			}
		}
	);

	$('skin_color').style.backgroundColor = '#'+color;
	$('skincolor').value = '#'+color;
}

function hairChange(image, color)
{
	var params = '';
	params+='color='+color;
	params+='&image='+image;

	alert($('hair'));

	$('ajax_works').setStyle({
		background: 'transparent url('+url+'/shared/pics/ajax-loading.gif) no-repeat scroll center center'
	});

	var newAJAX = new Ajax.Request(
		url+'/community/account/new/ajax_search_colors.php',
		{
			method: 'post',
			parameters: params,
			evalJS: false,
			onComplete: function(response)
			{
				parseResponse( response.responseXML, 'hair_image' );

				$('ajax_works').setStyle({
						background: ''
				});
			}
		}
	);

	$('hair_color').style.backgroundColor = '#'+color;
	$('haircolor').value = '#'+color;
	$('hairvalue').value = image.substring(5);
	h_color = color;
	h_value = image.substring(5);
}

function parseResponse( object, target )
{
	// Normalisiert das Xml weil verschiedene Browser werten die daten unterschiedlich aus
	if ( object.nodeType == 9 ) {
		if (object.childNodes.length > 0) {
			for( var i = 0;i<object.childNodes.length; i++ ) {
			    if (object.childNodes[i].nodeType != 10 && object.childNodes[i].nodeType != 7) {
			    	return parseResponse( object.childNodes[i] , target);
				};
			};
		};
	}
	else if ( object.nodeType == 1 ) {
		if (object.nodeName == 'image') {
			for(var i=0;i<object.childNodes.length; i++ ) {
				if (object.childNodes[i].nodeName == 'newimage') {
					$(target).src = object.childNodes[i].firstChild.nodeValue;
				}
			};

		}
	};
};