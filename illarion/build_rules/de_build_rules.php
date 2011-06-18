<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

    Page::setTitle( 'Bauregeln' );
    Page::setDescription( 'Auf dieser Seite findest du die Regeln f&uuml;r bauen von
                   Geb&auml;uden im Spiel.' );
    Page::setKeywords(array('Bauregeln','bauen','Regeln') );

    Page::setXHTML( );
    Page::Init( );

    if ($_GET['typ']==0 or $_GET['typ']=="")
    {
        $_GET['typ']=0;
        $header="Bauregeln";
        $next=1;
        $next_text="[Zur Preisliste]";
    }
    else
    {
        $header="Preisliste";
        $next=0;
        $next_text="[Zu den Bauregeln]";
    }

	 $pgSQL =& Database::getPostgreSQL();

	$query = 'SELECT *'
			.PHP_EOL.' FROM homepage.build_rules'
			.PHP_EOL.' WHERE br_type='.$pgSQL->Quote($_GET['typ'])
			.PHP_EOL.' ORDER BY br_id'
	;
	$pgSQL->setQuery($query);
	$entries = $pgSQL->loadAssocList();
	$count = count($entries);

    echo "<h1>".$header."</h1>";

	echo "<center><strong><a href='de_build_rules.php?typ=".$next."'>".$next_text."</a></strong></center>";

	if( IllaUser::auth('build_edit') ):
		echo "<a class='float_right' style='font-size:10pt;' href='".Page::getURL()."/illarion/build_rules/de_build_work.php?typ=".$_GET['typ']."'>[Block hinzufügen]</a><br />";
	endif;

	for ($i=0;$i<$count;$i++)
	{
		echo "<h2>".$entries[$i]['br_title_de']."</h2>";
    	if( IllaUser::auth('build_edit') ):
    		echo "<a class='float_right' style='font-size:10pt;' href='".Page::getURL()."/illarion/build_rules/de_build_work.php?typ=".$_GET['typ']."&amp;id=".$entries[$i]['br_id']."'>[Block bearbeiten]</a><br />";
    	endif;

		echo "<p>".str_replace( '&', '&amp;', html_entity_decode( $entries[$i]['br_content_de'] ) )."</p>";

	}

?>
