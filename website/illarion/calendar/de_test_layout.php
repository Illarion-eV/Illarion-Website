<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( array( 'Kalender', 'Layout-Test' ) );
	Page::setDescription( 'Layout Test für den Kalender.' );
	Page::setKeywords( array('Kalender','Layout','Testseite') );

	Page::setXHTML( );
	Page::Init( );

	Page::addAdditionalHeader( '<style type="text/css"><![CDATA['
		.PHP_EOL.'div.month {'
		.PHP_EOL.'	float: left;'
		.PHP_EOL.'	width: 184px;'
		.PHP_EOL.'	height: 134px;'
		.PHP_EOL.'	display: block;'
		.PHP_EOL.'	margin: 0 20px 20px 0;'
		.PHP_EOL.'}'
		.PHP_EOL.'div.month a.month_pic {'
		.PHP_EOL.'	float: left;'
		.PHP_EOL.'	width: 65px;'
		.PHP_EOL.'	height: 65px;'
		.PHP_EOL.'	display: block;'
		.PHP_EOL.'	margin-right: 10px;'
		.PHP_EOL.'}'
		.PHP_EOL.'div.month h2.month_title {'
		.PHP_EOL.'	margin: 0 0 0 75px;'
		.PHP_EOL.'	text-align: center;'
		.PHP_EOL.'}'
		.PHP_EOL.'div.month div.month_desc {'
		.PHP_EOL.'	height: 41px;'
		.PHP_EOL.'	text-align: center;'
		.PHP_EOL.'}'
		.PHP_EOL.'div.month div.month_desc a {'
		.PHP_EOL.'	vertical-align: middle;'
		.PHP_EOL.'}'
		.PHP_EOL.'div.month ul.days {'
		.PHP_EOL.'	list-style: none none outside;'
		.PHP_EOL.'	margin: 0;'
		.PHP_EOL.'	padding: 0;'
		.PHP_EOL.'}'
		.PHP_EOL.'div.month ul.days li {'
		.PHP_EOL.'	float: left;'
		.PHP_EOL.'	width: 23px;'
		.PHP_EOL.'	line-height: 23px;'
		.PHP_EOL.'	text-align: center;'
		.PHP_EOL.'}'
		.PHP_EOL.'div.month ul.days li.current {'
		.PHP_EOL.'	width: 21px;'
		.PHP_EOL.'	line-height: 21px;'
		.PHP_EOL.'	border: 1px solid #D4B96E;'
		.PHP_EOL.'}'
		.PHP_EOL.']]></style>' );
?>

<h1>Layout Test für den Kalender</h1>

<h2>Beschreibung</h2>

<p>Hier wird versucht den Kalender ohne den Einsatz von Tabellen und mit dem Einsatz der
neuen Homepage Umgebung zu modellieren. Es werden nur DIV-Ebenen und unnummerierte
Listen verwendet um die Gestaltung zu realisieren.</p>

<h2>Layout</h2>

<?php for($a = 1; $a <= 16; ++$a): ?>
<div class="month">
	<a class="month_pic" href="<?php echo Page::getURL(); ?>/illarion/calendar/signs/de_sign_<?php echo $a; ?>.php" onclick="<?php JSBuilder::Lightwindow_activate( false, 'Titel', 400, 450 ); ?>">
		<img src="<?php echo Page::getURL(); ?>/illarion/calendar/images/Ximage_<?php echo $a; ?>.png" width="65" height="65" alt="Tierzeichen des Monats" />
	</a>
	<h2 class="month_title"><?php echo IllaDateTime::getMonthName( $a ); ?></h2>
	<div class="month_desc">
		<a href="<?php echo Page::getURL(); ?>/illarion/calendar/month/de_month_<?php echo $a; ?>.php" onclick="<?php JSBuilder::Lightwindow_activate( false, 'Titel', 400, 450 ); ?>">
			<?php echo IllaDateTime::getMonthDescription( $a ); ?>
		</a>
	</div>
	<ul class="days">
	<?php if ($a==16): $days=5; else: $days=24; endif; ?>
		<?php for($i = 1; $i <= $days; ++$i): ?>
		<li<?php echo( $i == 4 ? ' class="current"' : '' ); ?>><?php echo $i; ?></li>
		<?php endfor; ?>
	</ul>
</div>
<?php endfor; ?>
