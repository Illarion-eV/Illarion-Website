<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_topmenu.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_charactermenu.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_character.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/shared/def_runes.php' );

	if (!IllaUser::auth('gmtool_chars'))
	{
		Messages::add( (Page::isGerman() ? 'Zugriff verweigert' : 'Access denied'), 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	Page::setTitle( array( 'GM-Tool', 'Charakter', 'Runen' ) );
    Page::setDescription( 'Hier befindet sich eine Übersicht die Runen des Charakters' );
    Page::setKeywords( array( 'GM-Tool', 'Charakter', 'Runen' ) );

    Page::addCSS( array( 'menu', 'gmtool' ) );

    Page::setXHTML();
    Page::Init();

	$server = ( isset( $_GET['server'] ) && $_GET['server'] == '1' ? 'devserver' : 'illarionserver');
	$charid = ( isset( $_GET['charid'] )  && is_numeric($_GET['charid']) ? (int)$_GET['charid'] : false );

	if (!$charid)
	{
		Messages::add( (Page::isGerman() ? 'Charakter ID wurde nicht richtig übergeben' : 'Character ID was not transfered correctly'), 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}
	
	list($char_type, $char_runes, $rune_names) = getCharRunesAndType( $charid,$server );

	$charname = getCharName($charid,$server );

	if (strlen($charname) == 0)
	{
        Messages::add( (Page::isGerman() ? 'Charakter wurde nicht gefunden' : 'Character not found'), 'error' );
        includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
        exit();
	}
?>

<h1>Runen - <?php echo $charname; ?></h1>

<?php include_menu(); ?>

<div class="spacer"></div>

<?php include_character_menu( $charid, 5, $_GET['server'] ); ?>

<div class="spacer"></div>

<form action="<?php echo Page::getURL(); ?>/illarion/gmtool/de_character_runes.php?charid=<?php echo $charid; ?>&amp;server=<?php echo $_GET['server']; ?>" method="post">
	<div>
		<dl class="gmtool">
			<dt>Magie Typ</dt>
			<dd>
                <select name="type">
                    <?php foreach( getCastTypeArray(IllaUser::$lang) as $key => $type ): ?>
                        <option value="<?php echo $key; ?>"
                        <?php if ($key == $char_type) { echo ' selected="selected"'; } ?>
                        >
                        <?php echo $key."-".$type; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
			</dd>
			<table style='width:100%;'>
			<colgroup><col width='25%' /><col width='25%' /><col width='25%' /><col width='25%' /></colgroup>
			<?php
			$i=1;
			foreach ($rune_names as $key => $name)
			{
				if ($i == 1) { echo "<tr>";  }
				echo "<td><input type='checkbox' name='".$key."' class='checkbox' value='".$key."' id='".$key."'";
               	if ($char_runes[$key]) { echo " checked='checked'"; }
                echo "/>";
                echo "<label for='".$key."'>".$name."</label></td>";
				if ($i == 4) { echo "</tr>";  }
				if ($i < 4) { $i++; } else { $i=1; }
			}
			?>
			<tr>
				<td colspan='4'>
				<input type="submit" name="submit" value="Änderungen speichern" />
	        	<input type="hidden" name="action" value="character_runes" />
				</td>
			</tr>
			</table>
		</dl>
	</div>
</form>
