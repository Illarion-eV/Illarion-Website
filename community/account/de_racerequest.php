<?php
   include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';
	if (!IllaUser::loggedIn())
	{
		header("Location: {$url}/community/account/de_login.php?target=".rawurlencode($_SERVER['REQUEST_URI']));
		exit();
	}

	include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/illarion_data.php" );
	include_once ( "inc_racerequest.php" );
   
   if(isset($_POST['action']) && !isset($errmessage)) {
		$mySQL =& Database::getMySQL();
		if(isset($_GET['use'])) {
			$query="UPDATE `homepage_raceapplies` SET 	prehistory=".$mySQL->Quote( $_POST['prehistory'] ).",
														characteristics=".$mySQL->Quote( $_POST['characteristics'] ).",
														status=0,
														answer=NULL,
														lastmod_gmid=NULL WHERE id=".$mySQL->Quote( $_GET['use'] );
			}
		else {
			$query="INSERT INTO `homepage_raceapplies`(	userid,
														prehistory,
														characteristics,
														raceid)
												VALUES(	".$mySQL->Quote( IllaUser::$ID ).",
														".$mySQL->Quote( $_POST['prehistory'] ).",
														".$mySQL->Quote( $_POST['characteristics'] ).",
														".$mySQL->Quote( $_POST['race'] ).")";
			}
		$mySQL->setQuery( $query );
		$mySQL->query();
		Messages::add('Deine Bewerbung wurde gesendet', 'info');
		include_once( $_SERVER['DOCUMENT_ROOT'] . '/community/account/de_races.php' );
		exit();
		}
   
   $css='';
   $js='racerequest';
   create_header( "Illarion - Bewerbung für Sonderrasse",
                  "Hier kann man sich für eine Sonderrasse bewerben.",
                  "Charakter, Bewerbung, Sonderrasse", "", $css, $js, false);
   include_header();
?>

<h1>Bewerbung für Sonderrasse</h1>
<p>Hier kannst du dich für eine Sonderrasse bewerben. Bitte beschreibe ausführlich (min. 200 Zeichen),
wie dein Charakter nach Gobaith kam, wie er vorher lebte, etc. Beschreibe auch welche Merkmale dein Charakter aufweist.</p>
<form name="racerequest" id="racerequest" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; if(isset($_GET['use'])) { echo '?use=',$_GET['use']; } ?>">
<table class="center" style="width:90%;">
  <tr>
    <td style="width:20%;">Sonderrasse:</td>
	<td style="width:60%;"><select style="width:100%;" name="race" onchange="changepic(this.value)">
	<?php
	if(!isset($_GET['use'])) {
		$races2request=array_diff(IllaUser::$allowed_applies,IllaUser::$allowed_races,getRacerequested());
		}
	else {
		$presetrequest=getOldrequest($_GET['use']);
		$races2request=array($presetrequest['raceid']);
		}
	foreach($races2request AS $raceid) {
		echo '<option value="',$raceid,'">',getRaceName($raceid),'</option>';
		}
	?>
	</select></td><td rowspan=3 style="width:20%;text-align:right;">
	<?php
	$i=0;
	foreach($races2request AS $raceid) {
		if($i!=1) { echo '<script language="javascript">',"\r\n",'showpicid=',$raceid,";\r\n",'</script>'; }
		$racepic_m=getRacePicture( $raceid, 0, $detailed = true ); // male
		$racepic_f=getRacePicture( $raceid, 1, $detailed = true ); // female
		echo '<img style="display:', ($i==1 ? 'none' : 'inline') ,';margin-right:20px;" id="racepic_m_',$raceid,'" src="',$racepic_m['file'],'" width=',$racepic_m['width'],' height=',$racepic_m['height'],'>';
		if($racepic_m!=$racepic_f) { echo '<img style="display:', ($i==1 ? 'none' : 'inline') ,';margin-right:20px;" id="racepic_f_',$raceid,'" src="',$racepic_f['file'],'" width=',$racepic_f['width'],' height=',$racepic_f['height'],'>'; }
		$i=1;
		}
	?></td>
  </tr>
  <tr>
    <td style="vertical-align:top">Vorgeschichte:</td>
	<td><textarea rows="6" style="width:100%;" name="prehistory" id="prehistory"><?php if(isset($_POST['prehistory'])) { echo $_POST['prehistory']; } else { echo (isset($presetrequest['prehistory']) ? $presetrequest['prehistory'] : ''); } ?></textarea></td>
  </tr>
  <tr>
    <td style="vertical-align:top">Charakter-Merkmale:</td>
	<td><textarea rows="6" style="width:100%;" name="characteristics" id="characteristics"><?php echo (isset($_POST['characteristics']) ? $_POST['characteristics'] : (isset($presetrequest['characteristics']) ? $presetrequest['characteristics'] : '') ); ?></textarea></td>
  </tr>
  <tr><td colspan="3" class="center"><input type="hidden" name="action" value="racerequest" /><input type="submit" name="submit" value="Bewerben" /> &nbsp; <input type="button" onclick="window.location.href='de_races.php'" value="Zu Sonderrassen" /></td></tr>
</table>
</form>

<?php
insert_go_to_top_link();
include_footer();
?>