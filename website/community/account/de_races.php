<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	if (!IllaUser::loggedIn())
	{
		header("Location: {$url}/community/account/de_login.php?target=".rawurlencode($_SERVER['REQUEST_URI']));
		exit();
	}

	include_once ( "inc_functions.php" );
	include_once ( "inc_racerequest.php" );

	create_header( 'Illarion - Sonderrassen',
	'Auf dieser Seite kannst du das Spielen einer Sonderrasse beantragen.',
	'Charaktere, Sonderrasse, beantragen','',
	'lightwindow,lightwindow_de','prototype,effects,lightwindow', true );
	include_header();

	$racerequests=getRacerequestList();
	?>
	<h1>Beantragte Rassen</h1>
	<table style="width:50%">
		<thead>
			<tr>
				<th>Rasse</th>
				<th style="width:110px;">Status</th>
				<th style="width:110px;">&nbsp;</th>
			</tr>
		</thead>
		<?php if(count(array_diff(IllaUser::$allowed_applies,IllaUser::$allowed_races))-count($racerequests)>0) { ?>
		<tfoot>
			<tr>
				<td colspan="3" style="text-align:center;vertical-align:middle;height:60px;"><a href="<?php echo Page::getURL(); ?>/community/account/de_racerequest.php">Sonderrasse beantragen</a></td>
			</tr>
		</tfoot>
		<?php } ?>
		<tbody>
			<?php if(count($racerequests)>0) {
						foreach($racerequests AS $racerequest) {
							$racepic_m=getRacePicture( $racerequest['raceid'], 0, $detailed = true ); // male
							$racepic_f=getRacePicture( $racerequest['raceid'], 1, $detailed = true ); // female
							if($racepic_m!=$racepic_f) {
								$racepic_m_alt=getRaceName( $racerequest['raceid'] ).'/'.getSexName( 0 );
								$racepic_f_alt=getRaceName( $racerequest['raceid'] ).'/'.getSexName( 1 );
								}
							else {
								$racepic_m_alt=getRaceName( $racerequest['raceid'] ).'/'.getSexName( 0 ).'&amp;'.getSexName( 1 );
								}
			?>
				<tr>
					<td style="text-align:center;"><img src="<?php echo $racepic_m['file']; ?>" width="<?php echo $racepic_m['width']; ?>" height="<?php echo $racepic_m['height']; ?>" alt="<?php echo $racepic_m_alt; ?>" /><?php if($racepic_m!=$racepic_f) { ?><img style="margin-left:30px;" src="<?php echo $racepic_f['file']; ?>" width="<?php echo $racepic_f['width']; ?>" height="<?php echo $racepic_f['height']; ?>" alt="<?php echo $racepic_f_alt; ?>" /><?php } ?></td>
					<td><?php switch($racerequest['status']) {	case 0: echo 'beantragt';break;
																case 1: echo 'nicht entschieden';break;
																case 2: echo 'genehmigt';break;
																case 3: echo 'abgelehnt';break;
																default: echo 'unbekannt';break;
															} ?></td>
					<td><?php $link_show="<a href='de_racerequest_show.php?id=".$racerequest['id']."' title='Beantragte Rasse' class='lightwindow' params='lightwindow_height=450,lightwindow_width=400'>ansehen</a>";
							switch($racerequest['status']) {	case 2: echo '';break;
																case 3: echo $link_show,'<br /><a href="de_racerequest.php?use=',$racerequest['id'],'">erneut beantragen</a>';break;
																default: echo $link_show;break;
															} ?></td>
				</tr>
				<?php } ?>
		<?php } else { ?><tr><td colspan="2">Keine Sonderrasse beantragt</td></tr><?php } ?>
			</tbody>
		</table>
<?php include_footer(); ?>