var currentlySearching = false;
var searchAgain = false;
function performSearch()
{
	if (!currentlySearching)
	{
		currentlySearching = true;
	}
	else
	{
		searchAgain = true;
		return;
	};
	var params= 'state='+$('status').value;
	params+= '&race='+$('race').value;
	params+= '&sex='+$('sex').value;
	params+= '&online='+$('online').value;
	params+= '&server='+$('server').value;
	params+= '&search='+encodeURIComponent( $('search').value );
	params+= '&acc='+( $('search_in_account').checked ? '1' : '0' );
	params+= '&email='+( $('search_in_email').checked ? '1' : '0' );
	params+= '&char='+( $('search_in_char').checked ? '1' : '0' );

	$('search_title').setStyle({
		background: '#000 url('+url+'/shared/pics/ajax-loading-small.gif) no-repeat scroll 2px 2px'
	});
	var newAJAX = new Ajax.Request(
		url+'/illarion/gmtool/ajax_search_chars.php', {
			method: 'post',
			parameters: params,
			evalJS: false,
			onComplete: function(response)
			{
				var output_area = $('output_area');
				if (Object.isUndefined(response.responseXML))
				{
					addOrReplaceChild( output_area, document.createTextNode( 'Error - Invalid XML' ) );
				}
				else
				{
					addOrReplaceChild( output_area, parseResponse( response.responseXML ) );
				};
				currentlySearching = false;
				if (searchAgain)
				{
					searchAgain = false;
					performSearch();
				}
				else
				{
					$('search_title').setStyle({
						background: ''
					});
				}
			}
		}
	);
};

function parseResponse( object )
{
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
		if (object.nodeName == 'manyHits') {
			var found = 0;
			var max = 0;
			for(var i=0;i<object.childNodes.length; i++ ) {
				if (object.childNodes[i].nodeName == 'found') {
					found = object.childNodes[i].firstChild.nodeValue;
				}
				else if (object.childNodes[i].nodeName == 'max') {
					max = object.childNodes[i].firstChild.nodeValue;
				};
			};
			if (cur_lang == 'de') {
				return document.createTextNode( found+' von '+max+' Charaktere entsprechen der Suche. Bitte gib genauere Suchparameter an.' );
			}
			else {
				return document.createTextNode( found+' of '+max+' characters fit the search. Please specify your search parameters more exactly.' );
			};
		}
		else if (object.nodeName == 'nothing') {
			if (cur_lang == 'de') {
				return document.createTextNode( 'Keine Charaktere entsprechen den Suchparametern.' );
			}
			else {
				return document.createTextNode( 'No characters fit the search parameters.' );
			};
		}
		else if (object.nodeName == 'characters') {
			var output = document.createElement( 'div' );
			var index = 0;
			var result = null;
			for(var i=0;i<object.childNodes.length; i++ ) {
				if (object.childNodes[i].nodeName != 'char') {
					continue;
				};
				if (index == 0)
				{
					result = document.createElement( 'ul' );
					result.style.cssText = 'float:left;margin-right:10px;';
				};
				var name = '';
				var id = '';
				var server = '';
				for(var k=0;k<object.childNodes[i].childNodes.length; k++ ) {
					if (object.childNodes[i].childNodes[k].nodeName == 'name') {
						name = object.childNodes[i].childNodes[k].firstChild.nodeValue;
					}
					else if (object.childNodes[i].childNodes[k].nodeName == 'id') {
						id = object.childNodes[i].childNodes[k].firstChild.nodeValue;
					};
					if (object.childNodes[i].childNodes[k].nodeName == 'server') {
						server = object.childNodes[i].childNodes[k].firstChild.nodeValue;
					}
				};
				var tag = '';
				if (server == 1)
				{
					tag = '(ts)';
				}
				var temp = document.createElement( 'li' );
				temp.appendChild( document.createTextNode( id ) );
				temp.appendChild( document.createTextNode( ' - ' ) );
				var temp2 = document.createElement( 'a' );
				temp2.href=url+'/illarion/gmtool/'+cur_lang+'_character.php?id='+id+'&server='+server;
				temp2.appendChild( document.createTextNode( name+tag ) );
				temp.appendChild( temp2 );
				result.appendChild( temp );
				index++;
				if (index == 10)
				{
					output.appendChild( result );
					index = 0;
				};
			};
			if (index > 0)
			{
				output.appendChild( result );
			};
			return output;
		};
	};
};

function clearChilds(element) {
	if (element.hasChildNodes()) {
		while ( element.childNodes.length >= 1 )
		{
    		element.removeChild( element.firstChild );
		};
	};
};

function addOrReplaceChild( element, child ) {
	if (element.firstChild)
	{
		element.replaceChild( child, element.firstChild );
	}
	else
	{
		element.appendChild( child );
	};
};