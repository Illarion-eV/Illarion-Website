var h_color = '';

function skinColorChange(image, color)
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
	var hairvalue = $('hair').options[$('hair').selectedIndex].value;
	if ($('beard') === null)
	{
		var beardvalue = '_beard_0';
	}
	else
	{
		var beardvalue = $('beard').options[$('beard').selectedIndex].value;
	}
	if (color.length == 0)
	{
		color = $('haircolor').value;
	}

	var params = '';
	params+='color='+color;
	params+='&image='+image;
	params+='&hairvalue='+hairvalue;
	params+='&beardvalue='+beardvalue;

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
				parseResponse( response.responseXML, 'hair_image', 'beard_image' );

				$('ajax_works').setStyle({
						background: ''
				});
			}
		}
	);

	$('hair_color').style.backgroundColor = '#'+color;
	$('haircolor').value = '#'+color;
	$('hairvalue').value = hairvalue;
	$('beardvalue').value = beardvalue;
	h_color = color;

}

function parseResponse( object, hairtarget, beardtarget )
{
	// Normalisiert das Xml weil verschiedene Browser werten die daten unterschiedlich aus
	if ( object.nodeType == 9 ) {
		if (object.childNodes.length > 0) {
			for( var i = 0;i<object.childNodes.length; i++ ) {
			    if (object.childNodes[i].nodeType != 10 && object.childNodes[i].nodeType != 7) {
			    	return parseResponse( object.childNodes[i] , hairtarget, beardtarget);
				};
			};
		};
	}
	else if ( object.nodeType == 1 ) {
		if (object.nodeName == 'image') {
			for(var i=0;i<object.childNodes.length; i++ ) {
				if (object.childNodes[i].nodeName == 'hairimage') {
					$(hairtarget).src = object.childNodes[i].firstChild.nodeValue;
				}
				if (object.childNodes[i].nodeName == 'beardimage') {
					$(beardtarget).src = object.childNodes[i].firstChild.nodeValue;
				}
			};

		}
	};
};