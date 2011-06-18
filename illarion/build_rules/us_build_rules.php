<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

    Page::setTitle( 'build rules' );
    Page::setDescription( 'On this page you find the rules for building houses in the
                   game' );
    Page::setKeywords(array('build rules','build','rules') );

    Page::setXHTML( );
    Page::Init( );

    if ($_GET['typ']==0 or $_GET['typ']=="")
    {
        $_GET['typ']=0;
        $header="Building rules";
        $next=1;
        $next_text="[To the priceliste]";
    }
    else
    {
        $header="Pricelist";
        $next=0;
        $next_text="[To the building rules]";
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

	echo "<center><strong><a href='us_build_rules.php?typ=".$next."'>".$next_text."</a></strong></center>";

	if( IllaUser::auth('build_edit') ):
		echo "<a class='float_right' style='font-size:10pt;' href='".Page::getURL()."/illarion/build_rules/us_build_work.php?typ=".$_GET['typ']."'>[Insert new entry]</a><br />";
	endif;

	for ($i=0;$i<$count;$i++)
	{
		echo "<h2>".$entries[$i]['br_title_us']."</h2>";
    	if( IllaUser::auth('build_edit') ):
    		echo "<a class='float_right' style='font-size:10pt;' href='".Page::getURL()."/illarion/build_rules/us_build_work.php?typ=".$_GET['typ']."&amp;id=".$entries[$i]['br_id']."'>[Edit entry]</a><br />";
    	endif;

		echo "<p>".str_replace( '&', '&amp;', html_entity_decode( $entries[$i]['br_content_us'] ) )."</p>";

	}

?>
