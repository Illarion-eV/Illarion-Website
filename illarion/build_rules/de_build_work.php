<?php
    include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

    Page::Init();

    if (!IllaUser::auth('build_edit'))
    {
        Messages::add('Du darfst die Bauregeln nicht editieren', 'error');
        includeWrapper::includeOnce( $_SERVER['DOCUMENT_ROOT'].'/illarion/build_rules/de_build_rules.php' );
        exit();
    }

    $pgSQL =& Database::getPostgreSQL();

    $old_id = ( isset( $_GET['id'] ) ? (int)$_GET['id'] : false );

    $text_de = '';
    $text_us = '';
	$head_de = '';
	$head_us = '';

    if ($old_id)
    {
		$query = 'SELECT *'
				.PHP_EOL.' FROM homepage.build_rules'
				.PHP_EOL.' WHERE br_id='.$pgSQL->Quote($old_id)
		;
		$pgSQL->setQuery($query);
		$old_entry = $pgSQL->loadAssocRow();

        if (!count( $old_entry ))
        {
            Messages::add('Eintrag nicht gefunden.', 'error');
            includeWrapper::includeOnce( $_SERVER['DOCUMENT_ROOT'].'/illarion/build_rules/de_build_rules.php' );
            exit();
        }

        Page::setTitle( array( 'Bauregeln', 'Eintrag bearbeiten' ) );
        Page::setDescription( 'Eintrag in den Bauregeln bearbeiten' );

        $text_de = ( is_null( $old_entry['br_content_de'] ) ? '' : (string)$old_entry['br_content_de'] );
        $text_us = ( is_null( $old_entry['br_content_us'] ) ? '' : (string)$old_entry['br_content_us'] );
        $head_de = ( is_null( $old_entry['br_title_de'] ) ? '' : (string)$old_entry['br_title_de'] );
        $head_us = ( is_null( $old_entry['br_title_us'] ) ? '' : (string)$old_entry['br_title_us'] );
	}
	else
	{
		Page::setTitle( array( 'Bauregeln', 'Neuen Eintrag anlegen' ) );
        Page::setDescription( 'Neuen Eintrag in den Bauregeln anlegen' );
	}

    Page::setFirstPage( Page::getURL().'/illarion/build_rules/de_build_rules.php' );
    Page::setPrevPage( Page::getURL().'/illarion/build_rules/de_build_rules.php' );

	Page::NavBarTop();

    echo "<form method='post' action='".Page::getURL()."/illarion/build_rules/de_build_rules.php?typ=".$_GET['typ']."'>";

	if ($old_id):
		echo "<h1>Eintrag in den Bauregeln bearbeiten</h1>";
		echo "<input type='checkbox' name='delete' value='yes'> Block löschen";
	else:
		echo "<h1>Neuen Eintrag in den Bauregeln anlegen</h1>";
	endif;

    echo "<h2>Blocktitel (deutsch)</h2>";
	echo "<p><input type='text' style='width:100%' maxlenght='100' name='head_de' value='".$head_de."' /></p>";
	echo "<h2>Blocktitel (englisch)</h2>";
    echo "<p><input type='text' style='width:100%' maxlenght='100' name='head_us' value='".$head_us."' /></p>";
	echo "<h2>Blocktext (deutsch)</h2>";
	echo "<p><textarea name='text_de' cols='80' rows='5' style='width:100%'>".$text_de."</textarea></p>";
	echo "<h2>Blocktext (englisch)</h2>";
    echo "<p><textarea name='text_us' cols='80' rows='5' style='width:100%'>".$text_us."</textarea></p>";

	echo "<p class='center'>";
        echo "<input type='submit' name='submit' value='Speichern' />";
        echo "<input type='reset' name='reset' value='Zurücksetzen' />";
		echo "<input type='hidden' name='action' value='edit' />";
		echo "<input type='hidden' name='typ' value='".$_GET['typ']."' />";
        if ($old_id):
        	echo "<input type='hidden' name='id' value='".$old_id."' />";
        endif;
    echo "</p>";


	echo "</form>";

	Page::NavBarBottom();
