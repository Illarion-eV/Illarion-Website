<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_topmenu.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_charactermenu.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_character.php' );

	Page::Init();

	if (!IllaUser::auth('gmtool_chars'))
	{
		Messages::add( (Page::isGerman() ? 'Zugriff verweigert' : 'Access denied'), 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$server = ( isset( $_GET['server'] ) && $_GET['server'] == '1' ? 'devserver' : 'illarionserver');
	$charid = ( isset( $_GET['charid'] )  && is_numeric($_GET['charid']) ? (int)$_GET['charid'] : false );
	$type = ( isset( $_GET['filter'] )  && is_numeric($_GET['filter']) ? (int)$_GET['filter'] : 0 );


	if (!$charid)
	{
		Messages::add( (Page::isGerman() ? 'Charakter ID wurde nicht richtig übergeben' : 'Character ID was not transferred correctly'), 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	Page::setTitle( array( 'GM-Tool', 'Charakter' ) );
    Page::setDescription( 'Hier befindet sich eine Übersicht die Skills des Charakters' );
    Page::setKeywords( array( 'GM-Tool', 'Charakter', 'Informationen' ) );

    Page::addCSS( array( 'menu', 'gmtool' ) );

    Page::setXHTML();
    Page::Init();

	$char_name = getCharName($charid, $server);
	$char_skills = getCharSkills( $charid, $server, $type );

	$skill_list = getSkillList( $server, $type);

/*
echo "<pre>";
//    print_r($char_skills);
//	print_r($skill_list);
print_r(getSkillGroupList($server));
    echo "</pre>";
*/
?>

<h1>Charakter - <?php echo $char_name; ?></h1>

<?php include_menu(); ?>

<div class="spacer"></div>

<?php include_character_menu( $charid, 4, $_GET['server'] ); ?>

<div class="spacer"></div>

<form action="<?php echo Page::getURL(); ?>/illarion/gmtool/de_character_skills.php?charid=<?php echo $charid; ?>&amp;server=<?php echo $_GET['server']; ?>&amp;filter=<?php echo $_GET['filter']; ?>" method="post">
	<div>
	<dl class="gmtool">
		<?php foreach($skill_list as $key=>$skill) : ?>
            <dt><?php echo (Page::isGerman() ? $skill['skl_name_german'] : $skill['skl_name_english']); ?></dt>
            <dd><input type="text" name="<?php echo $key; ?>" value="<?php echo (isset($char_skills[$key]) ? $char_skills[$key] : "0");?>" /></dd>
		<?php endforeach ?>
	</dl>
	<div class="spacer" />
		<?php if (count($skill_list) > 0 ) : ?>
        <input type="submit" name="submit" value="Änderungen speichern" />
        <input type="hidden" name="action" value="character_skills" />
		<?php else :?>
		<p class='center'> Es wurden keine Skills in dieser Kategorie gefunden</p>
		<?php endif ?>
    </div>
</form>


