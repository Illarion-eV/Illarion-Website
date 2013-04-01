<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_topmenu.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_charactermenu.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/inc_character.php' );

	if (!IllaUser::auth('gmtool_chars'))
	{
		Messages::add( (Page::isGerman() ? 'Zugriff verweigert' : 'Access denied'), 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	Page::setTitle( array( 'GM-Tool', 'Charakterlog' ) );
    Page::setDescription( 'Charakterlog Übersicht' );
    Page::setKeywords( array( 'GM-Tool', 'Charakter', 'Log', 'Übersicht') );

    Page::addCSS( array( 'menu', 'gmtool' ) );

    Page::setXHTML();
    Page::Init();

	$server = ( isset( $_GET['server'] ) && $_GET['server'] == '1' ? 'devserver' : 'illarionserver');
	$charid = ( is_numeric($_GET['charid']) ? (int)$_GET['charid'] : 0 );
	if (!$charid)
	{
		Messages::add( (Page::isGerman() ? 'Account ID wurde nicht richtig übergeben' : 'Account ID was not transfered correctly'), 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

    $char_data = getCharData( $charid,$server );

    if (!$char_data || !count($char_data))
    {
		Messages::add( (Page::isGerman() ? 'Charakter wurde nicht gefunden' : 'Character not found'), 'error' );
        includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
        exit();
    }

	$loglist = getLogs( $charid, $server );
?>

<h1>Accountlog - <?php echo $char_data['chr_name']; ?></h1>

<?php include_menu(); ?>

<div class="spacer"></div>

<?php include_character_menu( $charid, 1, $_GET['server'] ); ?>

<div class="spacer"></div>
<table style="width:100%;text-align:center;">
    <thead>
        <tr>
            <th style="width:20px;">ID</th>
            <th style="width:20px;">Datum</th>
            <th style="width:20px;">Verantwortlich</th>
            <th>Nachricht</th>
            <th style="width:20px;">Typ</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($loglist) == 0)
        { ?>
            <tr><td style='height:50px;text-align:center;' colspan='5'>Es wurden keine Logdateien gefunden.</td></tr>
    <?php } else { ?>
            <?php foreach ($loglist as $key=>$log): ?>
            <?php $class = ( $log['cl_type']==CHAR_LOG_TYPE_ADMONISHMENT) ? "rowerror" : "row".(($key+1)%2); ?>
            <tr class="<?php echo $class; ?>">
                <td><?php echo $log['cl_id']; ?></td>
                <td><?php echo convertDBTime($log['cl_time']); ?></td>
                <td class='center'><?php echo $log['acc_name']; ?></td>
                <td><?php echo $log['cl_message']; ?></td>
                <td class='center'><?php echo getLogTypeString($log['cl_type']); ?></td>
            </tr>
            <?php endforeach; ?>
        <?php } ?>
    </tbody>
</table>
