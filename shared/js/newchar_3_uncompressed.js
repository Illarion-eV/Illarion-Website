function selectStartpack( ) {
	var target = url+'/community/account/xml_startpack.php?startpack='+$('startpack').value;
	target += '&language='+( cur_lang == 'de' ? 'de' : 'us' );
	target += '&server='+$('serverId').value;
	$('loading').setStyle({ display: 'inline' });
	new Ajax.Request(target, {
		method: 'get',
		onSuccess: function(transport)
		{
			var output_area = $('startpack_area');
			var cnt = output_area.childNodes.length;
			for( var i = 0;i<cnt ;i++ ) {
				output_area.removeChild( output_area.firstChild);
			}
			var pack = transport.responseXML.firstChild;
			while( pack.nodeName != 'pack' && pack.nextSibling != null ) {
				pack = pack.nextSibling;
			}
			$('sel_pack').value = getAttributeValue( pack.attributes, 'id' );
			var button = $('submit_button');
			button.disabled = false;
			button.className = '';
			var showed_title = false;
			var temp;
			for( var j = 0;j<pack.childNodes.length;j++ ) {
				if (pack.childNodes[j].nodeName == 'skills') {
					var skill_list = pack.childNodes[j].childNodes;
					for( var i = 0;i<skill_list.length;i++ ) {
						if (skill_list[i].childNodes.length) {
							if (!showed_title) {
								temp = document.createElement('h3');
								temp.appendChild( document.createTextNode( 'Skills' ) );
								output_area.appendChild( temp );
								temp = document.createElement('ul');
								showed_title = true;
							};
							var temp2 = document.createElement('li');
							temp2.appendChild( document.createTextNode( getAttributeValue( skill_list[i].attributes, 'name' ) ) );
							temp2 = Element.extend(temp2);
							temp2.setStyle({
								cssFloat: 'left',
								width: '33%'
							});
							temp.appendChild( temp2 );
						};
					};
					if (showed_title) {
						output_area.appendChild( temp );
						temp = document.createElement('div');
						temp.className = 'clr';
						output_area.appendChild( temp );
					};
				} else if (pack.childNodes[j].nodeName == 'items') {
					var showed_title = false;
					var item_list = pack.childNodes[1].childNodes;
					for( var i = 0;i<item_list.length;i++ ) {
						if (item_list[i].attributes.getNamedItem('id').nodeValue != 0) {
							if (!showed_title) {
								temp = document.createElement('h3');
								temp.appendChild( document.createTextNode( (cur_lang=='de'?'Gegenstände':'Items') ) );
								output_area.appendChild( temp );
								showed_title = true;
							};
							temp = document.createElement('img');
							temp.src = url+'/shared/pics/items/'+getAttributeValue(item_list[i].attributes, 'id')+'.png';
							temp.alt = document.createTextNode( getAttributeValue( item_list[i].attributes, 'name' ) );
							temp = Element.extend(temp);
							temp.setStyle({
								margin : '5px'
							});
							output_area.appendChild(temp);
						};
					};
				};
			};
			$('loading').setStyle({ display: 'none' });
		}
	});
};

function getAttributeValue( object, attribute ) {
	if (object.length <= 0) {
		return null;
	}
	else {
		for(var i=0;i<object.length;i++) {
			if (object[i].nodeName == attribute) {
				return object[i].nodeValue;
			};
		};
	};
	return null;
};