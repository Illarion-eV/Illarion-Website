function colorChange(color, image)
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
				parseResponse( response.responseXML );

				$('ajax_works').setStyle({
						background: ''
				});
			}
		}
	);

	$('skin_color').style.backgroundColor = '#'+color;
	$('skincolor').value = '#'+color;


}

function parseResponse( object )
{
	// Normalisiert das Xml weil verschiedene Browser werten die daten unterschiedlich aus
	if ( object.nodeType == 9 ) {
		if (object.childNodes.length > 0) {
			for( var i = 0;i<object.childNodes.length; i++ ) {
			    if (object.childNodes[i].nodeType != 10 && object.childNodes[i].nodeType != 7) {
			    	return parseResponse( object.childNodes[i] );
				};
			};
		};
	}
	else if ( object.nodeType == 1 ) {
		if (object.nodeName == 'image') {
			for(var i=0;i<object.childNodes.length; i++ ) {
				if (object.childNodes[i].nodeName == 'newimage') {
					$('char_image').src = object.childNodes[i].firstChild.nodeValue;
				}
			};

		}
	};
};