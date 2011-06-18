<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';
	include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/illarion_data.php" );
	
	create_XMLheader();
	
	$mySQL =& Database::getMySQL();
	$query = "SELECT `raceid`, `status`, `prehistory`, `characteristics`, `answer`"
		. "\n FROM `homepage_raceapplies`"
		. "\n WHERE `id` = ".$mySQL->Quote( $_GET['id'] )." AND `userid` = ".$mySQL->Quote( IllaUser::$ID )
		;
	$mySQL->setQuery( $query );
	$racerequest=$mySQL->loadAssocRow();

?>
<div>
	<h1>Sonderrasse beantragt</h1>

	<h2>Rasse: <?php echo getRaceName($racerequest['raceid']); ?><br />Status: <?php switch($racerequest['status']) {	case 0: echo 'beantragt';break;
																case 1: echo 'nicht entschieden';break;
																case 2: echo 'genehmigt';break;
																case 3: echo 'abgelehnt';break;
																default: echo 'unbekannt';break;
															} ?></h2>
	<p><b>Vorgeschichte:</b></p>
	<p><?php echo $racerequest['prehistory']; ?></p>
	<p><b>Charakter-Merkmale:</b></p>
	<p><?php echo $racerequest['characteristics']; ?></p>
	<?php if($racerequest['answer']!="") { echo '<p><b>Vermerk des Gamemasters:</b></p><p>',$racerequest['answer'],'</p>'; } ?>
</div>
<?php include_short_footer(); ?>