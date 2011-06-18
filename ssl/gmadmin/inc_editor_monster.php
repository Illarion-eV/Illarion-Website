<?php
    function MonMovement($movementtype) {
		$retSelect="<select name='monmove'>";
		$movements=array("walk","fly","crawl");
		foreach ($movements as $movetype) {
			if ($movetype==$movementtype) {
				$retSelect=$retSelect."<option selected value='$movetype'>".$movetype."</option>";
			} else {
				$retSelect=$retSelect."<option value='$movetype'>".$movetype."</option>";
			}
		}
		$retSelect=$retSelect."</select>";
		return $retSelect;
	}
	function CreateArmorDropDown($count,$bodypos,$selitem,$server) {
		$retval="<select name='armor".$count."'>";
		$itemsel=sqlquery("SELECT itemname.itn_english, itemname.itn_itemid, armor.arm_puncture, armor.arm_stroke, armor.arm_thrust FROM (itemname JOIN armor ON ((itemname.itn_itemid = armor.arm_itemid))) WHERE (armor.arm_bodyparts = ".$bodypos." OR armor.arm_bodyparts = 0) ORDER BY itn_english",$server);
		foreach ($itemsel as $key=>$item) {
			if ($selitem==$item[itn_itemid]) {
				$retval=$retval."<option value='$item[itn_itemid]' selected>".$item[itn_english]." (".$item[arm_puncture]." - ".$item[arm_stroke]." - ".$item[arm_thrust].")</option>";
			} else {
				$retval=$retval."<option value='$item[itn_itemid]'>".$item[itn_english]." (".$item[arm_puncture]." - ".$item[arm_stroke]." - ".$item[arm_thrust].")</option>";
			}
		}
		$retval=$retval."</select>";
		return $retval;
	}
	function CreateWeaponDropDown($count,$selitem,$server) {
		$retval="<select name='weapon".$count."'>";
		$itemsel=sqlquery("SELECT itemname.itn_english, itemname.itn_itemid FROM (itemname JOIN weapon ON ((itemname.itn_itemid = weapon.wp_itemid))) ORDER BY itn_english",$server);
		foreach ($itemsel as $key=>$item) {
			if ($selitem==$item[itn_itemid]) {
				$retval=$retval."<option value='$item[itn_itemid]' selected>".$item[itn_english]."</option>";
			} else {
				$retval=$retval."<option value='$item[itn_itemid]'>".$item[itn_english]."</option>";
			}
		}
		$retval=$retval."</select>";
		return $retval;
	}
	function CreateItemDropDown($count,$selitem,$server) {
		$retval="<select name='belt".$count."'>";
		$itemsel=sqlquery("SELECT itemname.itn_english, itemname.itn_itemid FROM (itemname JOIN common ON ((itemname.itn_itemid = common.com_itemid))) WHERE ((common.com_volume<5000 AND common.com_weight<30000 AND common.com_agingspeed<255) OR (common.com_itemid=0)) ORDER BY itn_english",$server);
		foreach ($itemsel as $key=>$item) {
			if ($selitem==$item[itn_itemid]) {
				$retval=$retval."<option value='$item[itn_itemid]' selected>".$item[itn_english]."</option>";
			} else {
				$retval=$retval."<option value='$item[itn_itemid]'>".$item[itn_english]."</option>";
			}
		}
		$retval=$retval."</select>";
		return $retval;
	}
					
    if ($_GET[servertype]=="illarionserver") {
		$servertype="illarionserver";
	} else {
		$servertype="testserver";
	}
	
	if ($_GET[action]=="kill") {
		$monid=$_GET[monsterid];
		if ($monid!="") {
			sqlquery("DELETE FROM monster WHERE mob_monsterid='$monid'",$servertype);
			sqlquery("DELETE FROM monster_attributes WHERE mobattr_monsterid='$monid'",$servertype);
			sqlquery("DELETE FROM monster_items WHERE mobit_monsterid='$monid'",$servertype);
			sqlquery("DELETE FROM monster_skills WHERE mobsk_monsterid='$monid'",$servertype);
		}
	}
	
	switch($_GET[update]) {
		case "attribs":
			$monid=$_GET[monsterid];
			if ($monid!="") {
				$attribnames[0]=array("str","ength");
				$attribnames[1]=array("con","stitution");
				$attribnames[2]=array("dex","terity");
				$attribnames[3]=array("agi","lity");
				$attribnames[4]=array("int","elligence");
				$attribnames[5]=array("per","ception");
				$attribnames[6]=array("wil","lpower");
				$attribnames[7]=array("ess","ence");
				foreach ($attribnames as $key=>$attname) {
					$minstr=$attname[0]."min";
					$maxstr=$attname[0]."max";
					$value=sqlquery("SELECT mobattr_min FROM monster_attributes WHERE mobattr_monsterid='$monid' AND mobattr_name='".$attname[0].$attname[1]."'",$servertype);
					if ($value[0][mobattr_min]!="") {
						sqlquery("UPDATE monster_attributes SET mobattr_min='$_POST[$minstr]', mobattr_max='$_POST[$maxstr]' WHERE mobattr_monsterid='$monid' AND mobattr_name='".$attname[0].$attname[1]."'",$servertype);
					} else {
						sqlquery("INSERT INTO monster_attributes VALUES ('$monid','".$attname[0].$attname[1]."','$_POST[$minstr]','$_POST[$maxstr]')",$servertype);
					}
				}
			}
		break;
		case "skills":
			$monid=$_GET[monsterid];
			if ($monid!="") {
				sqlquery("UPDATE monster_skills SET mobsk_minvalue='$_POST[skillmin]', mobsk_maxvalue='$_POST[skillmax]' WHERE mobsk_monsterid='$monid' AND mobsk_name='$_POST[skillname]'",$servertype);
			}
		break;
		case "skillsdel":
			$monid=$_GET[monsterid];
			if ($monid!="") {
				sqlquery("DELETE FROM monster_skills WHERE mobsk_monsterid='$monid' AND mobsk_name='$_POST[skname]'",$servertype);
			}
		break;
		case "skilladd":
			$monid=$_GET[monsterid];
			if ($monid!="") {
				sqlquery("INSERT INTO monster_skills VALUES ('$monid','$_POST[sklname]','$_POST[minval]','$_POST[maxval]')",$servertype);
			}
		break;
		case "general":
			$monid=$_GET[monsterid];
			if ($monid!="") {
				$attack="false";
				$heal="false";
				if ($_POST[monattheal][0]=='0') {
					$attack="true";
				} elseif ($_POST[monattheal][0]=='1') {
					$heal="true";
				}
				if ($_POST[monattheal][1]=='1') {
					$heal="true";
				}
				sqlquery("UPDATE monster SET mob_name='$_POST[monname]', mob_race='$_POST[chr_race]', mob_hitpoints='$_POST[monhp]', mob_movementtype='$_POST[monmove]', mob_canattack=".$attack.", mob_canhealself=".$heal.", script='$_POST[monscript]' WHERE mob_monsterid='$monid'" ,$servertype);
			}
		break;
		case "items":
			$monid=$_GET[monsterid];
			if ($monid!="") {
				$itempos=array("head","neck","breast","hands","coat","left finger","right finger","legs","feet","right hand","left hand","belt1","belt2","belt3","belt4","belt5","belt6");
				for ($c=0;$c<16;$c++) {
					$checkval=sqlquery("SELECT * FROM monster_items WHERE mobit_position='".$itempos[$c]."' AND mobit_monsterid='$monid'",$servertype);
					if ($c>-1 and $c<9) { $kind="armor"; $correct=0; }
					elseif ($c>8 and $c<11) { $kind="weapon"; $correct=9;}
					else { $kind="belt"; $correct=11; }
					$calc=$c+1-$correct;
					$postname=$kind."".$calc;
					$postnames=array($postname,$postname."mincount",$postname."maxcount",$postname."prop");
					if ($checkval[0]!="") {
						if ($_POST[$postnames[0]]==0) {
							sqlquery("DELETE FROM monster_items WHERE mobit_position='".$itempos[$c]."' AND mobit_monsterid='$monid'",$servertype);
						} else {
							sqlquery("UPDATE monster_items SET mobit_itemid=".$_POST[$postnames[0]].", mobit_mincount=".$_POST[$postnames[1]].", mobit_maxcount=".$_POST[$postnames[2]].", mobit_propability=".$_POST[$postnames[3]]." WHERE mobit_position='".$itempos[$c]."' AND mobit_monsterid='$monid'",$servertype);
						}
					} else {
						if ($_POST[$postnames[0]]>0) {
							sqlquery("INSERT INTO monster_items VALUES ('$monid','".$itempos[$c]."',".$_POST[$postnames[0]].",".$_POST[$postnames[1]].",".$_POST[$postnames[2]].",".$_POST[$postnames[3]].")",$servertype);
						}
					}
				}
			}
		break;
		case "addmon":
			$monid=$_GET[monsterid];
			if ($monid!="") {
				$check=sqlquery("SELECT * FROM monster WHERE mob_monsterid='$monid'",$servertype);
				if ($check[0][mob_name]=="") {
					sqlquery("INSERT INTO monster VALUES ('$monid','New Monster',0,10000,'walk',true,true,'')",$servertype);
				}
			}
		break;
		case "delmon":
			$monid=$_GET[monsterid];
			if ($monid!="") {
				sqlquery("DELETE FROM monster WHERE mob_monsterid='$monid'",$servertype);
				sqlquery("DELETE FROM monster_items WHERE mobit_monsterid='$monid'",$servertype);
				sqlquery("DELETE FROM monster_skills WHERE mobsk_monsterid='$monid'",$servertype);
				sqlquery("DELETE FROM monster_attributes WHERE mobattr_monsterid='$monid'",$servertype);
			}
		break;
	}
	
	
	
	$menu3="<table width='100%'><tr><td></td>
		<td width='100' align='center'><a href='https://illarion.org/gmadmin/index.php?mod=gameeditors&submod=editor_monster&servertype=illarionserver'>Realserver</a></td>
		<td width='100' align='center'><a href='https://illarion.org/gmadmin/index.php?mod=gameeditors&submod=editor_monster&servertype=testserver'>Testserver</a></td>
		<td width='100' align='center'></td>
		<td width='100' align='center'><a href='https://illarion.org/gmadmin/index.php?mod=gameeditors&submod=editor_monster&action=addmonster&servertype=".$servertype."'>Add Monster</a></td>
		<td></td></tr></table>";
		
	switch($_GET[action]) {
		case "addmonster":
			$monsterids=sqlquery("SELECT mob_monsterid FROM monster ORDER BY mob_monsterid",$servertype);
			$newid=count($monsterids)+2;
			for ($count==0;$count<count($monsterids);$count++) {
				if ($count+1<$monsterids[$count][mob_monsterid]) {
					$newid=$count+1;
					break;
				}
			}
			$content=$content."<table><tr><td></td><td><form name='addauto' method='post' action='index.php?mod=gameeditors&submod=editor_monster&action=editmonster&update=addmon&servertype=".$servertype."&monsterid=".$newid."'>
							   <input type='submit' value='Create Monster - choose ID automaticly'></form></td></tr><tr>
							   <form name='addmanu' method='get' action='index.php?mod=gameeditors&submod=editor_monster&action=editmonster&update=addmon&servertype=".$servertype."'>
							   <td><input type='text' name='monsterid' value='$newid'></td><td><input type='hidden' name='mod' value='gameeditors'><input type='hidden' name='submod' value='editor_monster'><input type='hidden' name='action' value='editmonster'><input type='hidden' name='update' value='addmon'><input type='hidden' name='servertype' value='".$servertype."'><input type='submit' value='Create Monster - choose ID manual'></td></form></tr></table>";							   
		break;
		
		case "editmonster":
			$monid=$_GET[monsterid];
			if ($monid=="") { break; }		    
			$menu3="<table width='100%'><tr><td></td>
					<td width='100' align='center'><a href='https://illarion.org/gmadmin/index.php?mod=gameeditors&submod=editor_monster&action=editmonster&servertype=".$servertype."&monsterid=".$monid."'>General</a></td>
					<td width='100' align='center'><a href='https://illarion.org/gmadmin/index.php?mod=gameeditors&submod=editor_monster&action=editmonster&servertype=".$servertype."&monsterid=".$monid."&subsubmod=attr'>Attributes</a></td>
					<td width='100' align='center'><a href='https://illarion.org/gmadmin/index.php?mod=gameeditors&submod=editor_monster&action=editmonster&servertype=".$servertype."&monsterid=".$monid."&subsubmod=skl'>Skills</a></td>
					<td width='100' align='center'><a href='https://illarion.org/gmadmin/index.php?mod=gameeditors&submod=editor_monster&action=editmonster&servertype=".$servertype."&monsterid=".$monid."&subsubmod=itm'>Items</a></td>
					<td></td></tr></table>";
            switch($_GET[subsubmod]) {
			    case "attr":
			        $content=$content."<table width='100%'>";
					$monsterattrib=sqlquery("SELECT mobattr_name,mobattr_min,mobattr_max FROM monster_attributes WHERE mobattr_monsterid='$monid'",$servertype);
		    		$mon_str=array(0,0); $mon_dex=array(0,0); $mon_con=array(0,0); $mon_agi=array(0,0); $mon_int=array(0,0); $mon_per=array(0,0); $mon_wil=array(0,0); $mon_ess=array(0,0);
					foreach ($monsterattrib as $key=>$attribs) {
						if ($attribs[mobattr_name]=="strength")     { $mon_str[0]=$attribs[mobattr_min]; $mon_str[1]=$attribs[mobattr_max]; }
						elseif ($attribs[mobattr_name]=="dexterity")    { $mon_dex[0]=$attribs[mobattr_min]; $mon_dex[1]=$attribs[mobattr_max]; }
						elseif ($attribs[mobattr_name]=="constitution") { $mon_con[0]=$attribs[mobattr_min]; $mon_con[1]=$attribs[mobattr_max]; }
						elseif ($attribs[mobattr_name]=="agility")      { $mon_agi[0]=$attribs[mobattr_min]; $mon_agi[1]=$attribs[mobattr_max]; }
						elseif ($attribs[mobattr_name]=="intelligence") { $mon_int[0]=$attribs[mobattr_min]; $mon_int[1]=$attribs[mobattr_max]; }
						elseif ($attribs[mobattr_name]=="perception")   { $mon_per[0]=$attribs[mobattr_min]; $mon_per[1]=$attribs[mobattr_max]; }
						elseif ($attribs[mobattr_name]=="willpower")    { $mon_wil[0]=$attribs[mobattr_min]; $mon_wil[1]=$attribs[mobattr_max]; }
						elseif ($attribs[mobattr_name]=="essence")      { $mon_ess[0]=$attribs[mobattr_min]; $mon_ess[1]=$attribs[mobattr_max]; }
					}
					$content=$content."<form name='form1' method='post' action='index.php?mod=gameeditors&submod=editor_monster&action=editmonster&update=attribs&servertype=".$servertype."&monsterid=".$monid."&subsubmod=attr'>
     	    		<table align='center'><tr><td colspan='2'>Strength</td><td width='15'></td><td colspan='2'>Dexterity</td><td width='15'></td><td colspan='2'>Constitution</td><td width='15'></td><td colspan='2'>Agility</td></tr>
     				<tr><td>max:</td><td width='50'><input type='text' name='strmax' maxlength='3' size='5' width='50' value='".$mon_str[1]."'></td><td width='15'></td>
	        		<td>max:</td><td width='50'><input type='text' name='dexmax' maxlength='3' size='5' width='50' value='".$mon_dex[1]."'></td><td width='15'></td>
					<td>max:</td><td width='50'><input type='text' name='conmax' maxlength='3' size='5' width='50' value='".$mon_con[1]."'></td><td width='15'></td>
					<td>max:</td><td width='50'><input type='text' name='agimax' maxlength='3' size='5' width='50' value='".$mon_agi[1]."'></tr>
     				<tr><td>min:</td><td width='50'><input type='text' name='strmin' maxlength='3' width='50' size='5' value='".$mon_str[0]."'></td><td width='15'></td>
	   				<td>min:</td><td width='50'><input type='text' name='dexmin' maxlength='3' size='5' width='50' value='".$mon_dex[0]."'></td><td width='15'></td>
					<td>min:</td><td width='50'><input type='text' name='conmin' maxlength='3' size='5' width='50' value='".$mon_con[0]."'></td><td width='15'></td>
					<td>min:</td><td width='50'><input type='text' name='agimin' maxlength='3' size='5' width='50' value='".$mon_agi[0]."'></tr><tr><td></td></tr>
					<tr><td colspan='2'>Intelligence</td><td width='15'></td><td colspan='2'>Perception</td><td width='15'></td><td colspan='2'>Willpower</td><td width='15'></td><td colspan='2'>Essence</td></tr>
     				<tr><td>max:</td><td width='50'><input type='text' name='intmax' maxlength='3' size='5' width='50' value='".$mon_int[1]."'></td><td width='15'></td>
	       			<td>max:</td><td width='50'><input type='text' name='permax' maxlength='3' size='5' width='50' value='".$mon_per[1]."'></td><td width='15'></td>
					<td>max:</td><td width='50'><input type='text' name='wilmax' maxlength='3' size='5' width='50' value='".$mon_wil[1]."'></td><td width='15'></td>
					<td>max:</td><td width='50'><input type='text' name='essmax' maxlength='3' size='5' width='50' value='".$mon_ess[1]."'></tr>
     				<tr><td>min:</td><td width='50'><input type='text' name='intmin' maxlength='3' width='50' size='5' value='".$mon_int[0]."'></td><td width='15'></td>
	   				<td>min:</td><td width='50'><input type='text' name='permin' maxlength='3' size='5' width='50' value='".$mon_per[0]."'></td><td width='15'></td>
					<td>min:</td><td width='50'><input type='text' name='wilmin' maxlength='3' size='5' width='50' value='".$mon_wil[0]."'></td><td width='15'></td>
					<td>min:</td><td width='50'><input type='text' name='essmin' maxlength='3' size='5' width='50' value='".$mon_ess[0]."'></tr>
					<tr><td colspan='11' align='center'><input type='submit' name='attribupdate' value='Change Attributes'></td></tr>
	 				</table></form>";
				break;
				
				case "skl":			
					$monsterskills=sqlquery("SELECT mobsk_name,mobsk_minvalue,mobsk_maxvalue FROM monster_skills WHERE mobsk_monsterid='$monid'",$servertype);
					$content=$content."<table align='center' border='0'><tr><td>";
					$i=1;
					$tblupdate="";
					$tblkill="";
					foreach ($monsterskills as $key=>$skills) {
						$i++;
						$tblupdate=$tblupdate."<tr><form name='skill".$i."' method='post' action='index.php?mod=gameeditors&submod=editor_monster&action=editmonster&update=skills&servertype=".$servertype."&monsterid=".$monid."&subsubmod=skl'>
						<td>$skills[mobsk_name]</td><td><input type='hidden' name='skillname' value='$skills[mobsk_name]'></td><td>max:<input type='text' name='skillmax' value='$skills[mobsk_maxvalue]' maxlength='3' size='5' width='50'></td>
			    		<td>min:<input type='text' name='skillmin' value='$skills[mobsk_minvalue]' maxlength='3' size='5' width='50'></td><td><input type='submit' name='skillupdate' value='Update'></td></form></tr>";
						$tblkill=$tblkill."<tr><form name='skilldel".$i."' method='post' action='index.php?mod=gameeditors&submod=editor_monster&action=editmonster&update=skillsdel&servertype=".$servertype."&monsterid=".$monid."&subsubmod=skl'>
						<td><input type='hidden' name='skname' value='$skills[mobsk_name]'><input type='submit' name='skilldel' value='Delete'></td></form>
						</tr>";
					}
					$content=$content."<table border='0'>".$tblupdate."</table></td><td><table border='0'>".$tblkill."</table>";
					$content=$content."</td></tr></table><p></p><table align='center'><tr><td>Skill Name:</td><td>max:</td><td>min:</td></tr><tr><form name='addskill' method='post' action='index.php?mod=gameeditors&submod=editor_monster&action=editmonster&update=skilladd&servertype=".$servertype."&monsterid=".$monid."&subsubmod=skl'>
									   <td><input type='text' name='sklname' value=''></td><td><input type='text' name='maxval' maxlength='3' size='5' value=''></td><td><input type='text' name='minval' maxlength='3' size='5' value=''></td>
									   <td><input type='submit' name='addskill' value='Add Skill'></td><td></td></form></tr></table>";		
				break;
				
				case "itm":
					$monitems=sqlquery("SELECT mobit_itemid, mobit_position, mobit_mincount, mobit_maxcount, mobit_propability FROM monster_items WHERE mobit_monsterid='$monid'",$servertype);
					$monbodyitems=array(1=>0,2=>0,4=>0,8=>0,16=>0,64=>0,128=>0);
					$monbodyitems[32]=array(1=>0,2=>0);
					$monweapons=array(1=>0,2=>0);
					$monbelt=array(1=>0,2=>0,3=>0,4=>0,5=>0,6=>0);
					$monitemvalues=array();
					foreach ($monitems as $key=>$monitem) {
						if ($monitem[mobit_position]=="head") { $monbodyitems[1] = $monitem[mobit_itemid]; $monitemvalues[1]=array($monitem[mobit_mincount],$monitem[mobit_maxcount],$monitem[mobit_propability]); }
						elseif ($monitem[mobit_position]=="neck") { $monbodyitems[2] = $monitem[mobit_itemid]; $monitemvalues[2]=array($monitem[mobit_mincount],$monitem[mobit_maxcount],$monitem[mobit_propability]); }
						elseif ($monitem[mobit_position]=="breast") { $monbodyitems[4] = $monitem[mobit_itemid]; $monitemvalues[3]=array($monitem[mobit_mincount],$monitem[mobit_maxcount],$monitem[mobit_propability]); }
						elseif ($monitem[mobit_position]=="hands") { $monbodyitems[8] = $monitem[mobit_itemid]; $monitemvalues[4]=array($monitem[mobit_mincount],$monitem[mobit_maxcount],$monitem[mobit_propability]); }
						elseif ($monitem[mobit_position]=="coat") { $monbodyitems[16] = $monitem[mobit_itemid]; $monitemvalues[5]=array($monitem[mobit_mincount],$monitem[mobit_maxcount],$monitem[mobit_propability]); }
						elseif ($monitem[mobit_position]=="left finger") { $monbodyitems[32][1] = $monitem[mobit_itemid]; $monitemvalues[6]=array($monitem[mobit_mincount],$monitem[mobit_maxcount],$monitem[mobit_propability]); }
						elseif ($monitem[mobit_position]=="right finger") { $monbodyitems[32][2] = $monitem[mobit_itemid]; $monitemvalues[7]=array($monitem[mobit_mincount],$monitem[mobit_maxcount],$monitem[mobit_propability]); }
						elseif ($monitem[mobit_position]=="legs") { $monbodyitems[64] = $monitem[mobit_itemid]; $monitemvalues[8]=array($monitem[mobit_mincount],$monitem[mobit_maxcount],$monitem[mobit_propability]); }
						elseif ($monitem[mobit_position]=="feet") { $monbodyitems[128] = $monitem[mobit_itemid]; $monitemvalues[9]=array($monitem[mobit_mincount],$monitem[mobit_maxcount],$monitem[mobit_propability]); };
						
						if ($monitem[mobit_position]=="right hand") { $monweapons[1] = $monitem[mobit_itemid]; $monitemvalues[10]=array($monitem[mobit_mincount],$monitem[mobit_maxcount],$monitem[mobit_propability]); }
						elseif ($monitem[mobit_position]=="left hand") { $monweapons[2] = $monitem[mobit_itemid]; $monitemvalues[11]=array($monitem[mobit_mincount],$monitem[mobit_maxcount],$monitem[mobit_propability]); };
						
						if ($monitem[mobit_position]=="belt1") { $monbelt[1] = $monitem[mobit_itemid]; $monitemvalues[12]=array($monitem[mobit_mincount],$monitem[mobit_maxcount],$monitem[mobit_propability]); }
						elseif ($monitem[mobit_position]=="belt2") { $monbelt[2] = $monitem[mobit_itemid]; $monitemvalues[13]=array($monitem[mobit_mincount],$monitem[mobit_maxcount],$monitem[mobit_propability]); }
						elseif ($monitem[mobit_position]=="belt3") { $monbelt[3] = $monitem[mobit_itemid]; $monitemvalues[14]=array($monitem[mobit_mincount],$monitem[mobit_maxcount],$monitem[mobit_propability]); }
						elseif ($monitem[mobit_position]=="belt4") { $monbelt[4] = $monitem[mobit_itemid]; $monitemvalues[15]=array($monitem[mobit_mincount],$monitem[mobit_maxcount],$monitem[mobit_propability]); }
						elseif ($monitem[mobit_position]=="belt5") { $monbelt[5] = $monitem[mobit_itemid]; $monitemvalues[16]=array($monitem[mobit_mincount],$monitem[mobit_maxcount],$monitem[mobit_propability]); }
						elseif ($monitem[mobit_position]=="belt6") { $monbelt[6] = $monitem[mobit_itemid]; $monitemvalues[17]=array($monitem[mobit_mincount],$monitem[mobit_maxcount],$monitem[mobit_propability]); };
					}
					$content=$content."<form name='items' method='post' action='index.php?mod=gameeditors&submod=editor_monster&action=editmonster&update=items&servertype=".$servertype."&monsterid=".$monid."&subsubmod=itm'>
										<table width='100%'><tr><td>
										head:</td><td>".CreateArmorDropDown(1,1,$monbodyitems[1],$servertype)."</td><td><input type='text' size='5' name='armor1mincount' value=".$monitemvalues[1][0]."></td><td><input type='text' size='5' name='armor1maxcount' value=".$monitemvalues[1][1]."></td><td><input type='text' size='5' name='armor1prop' value=".$monitemvalues[1][2]."></td></tr><tr><td>
										neck:</td><td>".CreateArmorDropDown(2,2,$monbodyitems[2],$servertype)."</td><td><input type='text' size='5' name='armor2mincount' value=".$monitemvalues[2][0]."></td><td><input type='text' size='5' name='armor2maxcount' value=".$monitemvalues[2][1]."></td><td><input type='text' size='5' name='armor2prop' value=".$monitemvalues[2][2]."></td></tr><tr><td>
										breast:</td><td>".CreateArmorDropDown(3,4,$monbodyitems[4],$servertype)."</td><td><input type='text' size='5' name='armor3mincount' value=".$monitemvalues[3][0]."></td><td><input type='text' size='5' name='armor3maxcount' value=".$monitemvalues[3][1]."></td><td><input type='text' size='5' name='armor3prop' value=".$monitemvalues[3][2]."></td></tr><tr><td>
										hands:</td><td>".CreateArmorDropDown(4,8,$monbodyitems[8],$servertype)."</td><td><input type='text' size='5' name='armor4mincount' value=".$monitemvalues[4][0]."></td><td><input type='text' size='5' name='armor4maxcount' value=".$monitemvalues[4][1]."></td><td><input type='text' size='5' name='armor4prop' value=".$monitemvalues[4][2]."></td></tr><tr><td>
										coat:</td><td>".CreateArmorDropDown(5,16,$monbodyitems[16],$servertype)."</td><td><input type='text' size='5' name='armor5mincount' value=".$monitemvalues[5][0]."></td><td><input type='text' size='5' name='armor5maxcount' value=".$monitemvalues[5][1]."></td><td><input type='text' size='5' name='armor5prop' value=".$monitemvalues[5][2]."></td></tr><tr><td>
										right hand:</td><td>".CreateWeaponDropDown(1,$monweapons[1],$servertype)."</td><td><input type='text' size='5' name='weapon1mincount' value=".$monitemvalues[10][0]."></td><td><input type='text' size='5' name='weapon1maxcount' value=".$monitemvalues[10][1]."></td><td><input type='text' size='5' name='weapon1prop' value=".$monitemvalues[10][2]."></td></tr><tr><td>
										left hand:</td><td>".CreateWeaponDropDown(2,$monweapons[2],$servertype)."</td><td><input type='text' size='5' name='weapon2mincount' value=".$monitemvalues[11][0]."></td><td><input type='text' size='5' name='weapon2maxcount' value=".$monitemvalues[11][1]."></td><td><input type='text' size='5' name='weapon2prop' value=".$monitemvalues[11][2]."></td></tr><tr><td>
										finger right hand:</td><td>".CreateArmorDropDown(6,32,$monbodyitems[32][2],$servertype)."</td><td><input type='text' size='5' name='armor7mincount' value=".$monitemvalues[7][0]."></td><td><input type='text' size='5' name='armor7maxcount' value=".$monitemvalues[7][1]."></td><td><input type='text' size='5' name='armor7prop' value=".$monitemvalues[7][2]."></td></tr><tr><td>
										finger left hand:</td><td>".CreateArmorDropDown(7,32,$monbodyitems[32][1],$servertype)."</td><td><input type='text' size='5' name='armor6mincount' value=".$monitemvalues[6][0]."></td><td><input type='text' size='5' name='armor6maxcount' value=".$monitemvalues[6][1]."></td><td><input type='text' size='5' name='armor6prop' value=".$monitemvalues[6][2]."></td></tr><tr><td>
										legs:</td><td>".CreateArmorDropDown(8,64,$monbodyitems[64],$servertype)."</td><td><input type='text' size='5' name='armor8mincount' value=".$monitemvalues[8][0]."></td><td><input type='text' size='5' name='armor8maxcount' value=".$monitemvalues[8][1]."></td><td><input type='text' size='5' name='armor8prop' value=".$monitemvalues[8][2]."></td></tr><tr><td>
										feet:</td><td>".CreateArmorDropDown(9,128,$monbodyitems[128],$servertype)."</td><td><input type='text' size='5' name='armor9mincount' value=".$monitemvalues[9][0]."></td><td><input type='text' size='5' name='armor9maxcount' value=".$monitemvalues[9][1]."></td><td><input type='text' size='5' name='armor9prop' value=".$monitemvalues[9][2]."></td></tr><tr><td>
										belt slot 1:</td><td>".CreateItemDropDown(1,$monbelt[1],$servertype)."</td><td><input type='text' size='5' name='belt1mincount' value=".$monitemvalues[12][0]."></td><td><input type='text' size='5' name='belt1maxcount' value=".$monitemvalues[12][1]."></td><td><input type='text' size='5' name='belt1prop' value=".$monitemvalues[12][2]."></td></tr><tr><td>
										belt slot 2:</td><td>".CreateItemDropDown(2,$monbelt[2],$servertype)."</td><td><input type='text' size='5' name='belt2mincount' value=".$monitemvalues[13][0]."></td><td><input type='text' size='5' name='belt2maxcount' value=".$monitemvalues[13][1]."></td><td><input type='text' size='5' name='belt2prop' value=".$monitemvalues[13][2]."></td></tr><tr><td>
										belt slot 3:</td><td>".CreateItemDropDown(3,$monbelt[3],$servertype)."</td><td><input type='text' size='5' name='belt3mincount' value=".$monitemvalues[14][0]."></td><td><input type='text' size='5' name='belt3maxcount' value=".$monitemvalues[14][1]."></td><td><input type='text' size='5' name='belt3prop' value=".$monitemvalues[14][2]."></td></tr><tr><td>
										belt slot 4:</td><td>".CreateItemDropDown(4,$monbelt[4],$servertype)."</td><td><input type='text' size='5' name='belt4mincount' value=".$monitemvalues[15][0]."></td><td><input type='text' size='5' name='belt4maxcount' value=".$monitemvalues[15][1]."></td><td><input type='text' size='5' name='belt4prop' value=".$monitemvalues[15][2]."></td></tr><tr><td>
										belt slot 5:</td><td>".CreateItemDropDown(5,$monbelt[5],$servertype)."</td><td><input type='text' size='5' name='belt5mincount' value=".$monitemvalues[16][0]."></td><td><input type='text' size='5' name='belt5maxcount' value=".$monitemvalues[16][1]."></td><td><input type='text' size='5' name='belt5prop' value=".$monitemvalues[16][2]."></td></tr><tr><td>
										belt slot 6:</td><td>".CreateItemDropDown(6,$monbelt[6],$servertype)."</td><td><input type='text' size='5' name='belt6mincount' value=".$monitemvalues[17][0]."></td><td><input type='text' size='5' name='belt6maxcount' value=".$monitemvalues[17][1]."></td><td><input type='text' size='5' name='belt6prop' value=".$monitemvalues[17][2]."></td></tr><tr>
										<td colspan='5'><input type='submit' name='items' value='Update'></td></tr></table>
										</form>";
				break;
				
				default:
					$monsterinfos=sqlquery("SELECT mob_name,mob_race,mob_hitpoints,mob_movementtype,mob_canattack,mob_canhealself,script FROM monster WHERE mob_monsterid='$monid'",$servertype);
					$content=$content."<table><tr><td>Monster ID:</td><td>".$monid."</td></tr>
					                  <form name='informs' method='post' action='index.php?mod=gameeditors&submod=editor_monster&action=editmonster&update=general&servertype=".$servertype."&monsterid=".$monid."'>
									  <tr><td>Monster name:</td><td><input type='text' name='monname' value='".$monsterinfos[0][mob_name]."'></td></tr>
									  <tr><td>Monster race:</td><td>".VarCharRace($monsterinfos[0][mob_race])."</td></tr>
									  <tr><td>Monster Hitpoints:</td><td><input type='text' name='monhp' value='".$monsterinfos[0][mob_hitpoints]."'></td></tr>
									  <tr><td>Monster Movementtype:</td><td>".MonMovement($monsterinfos[0][mob_movementtype])."</td></tr>
									  <tr><td>Monster can attack:</td><td><input type='checkbox' name='monattheal[]' value='0'";
					if ($monsterinfos[0][mob_canattack]=="t") { $content=$content."checked"; }
					$content=$content."></td></tr>
									  <tr><td>Monster heals itself:</td><td><input type='checkbox' name='monattheal[]' value='1'";
					if ($monsterinfos[0][mob_canhealself]=="t") { $content=$content."checked"; }
					$content=$content."></td></tr>	
									  <tr><td>Monster Script:</td><td><input type='text' name='monscript' value='".$monsterinfos[0][script]."'></td></tr>
									  <tr><td colspan='2'><input type='submit' name='updategeneral' value='Change Settings'></td></tr></form></table>
									  <p></p><table><tr><td><form name='delmonster' method='post' action='index.php?mod=gameeditors&submod=editor_monster&update=delmon&servertype=".$servertype."&monsterid=".$monid."'>
									  <input type='submit' value='delete Monster'></form></td></tr></table>";
				break;				  
			}	
			break;	
		default:
			$monsterlist=sqlquery("SELECT mob_monsterid,mob_name FROM monster ORDER BY mob_monsterid",$servertype);				
			$content=$content."<table width='100%'>";
			foreach ($monsterlist as $key=>$monsters) {				
				$content=$content."<tr><td>".$monsters[mob_monsterid]."</td><td>".$monsters[mob_name];
				$content=$content."</td><td>";
				$content=$content."<form action='index.php' methode='get\'>";
				$content=$content."<input type='hidden' name='mod' value='gameeditors'><input type='hidden' name='submod' value='editor_monster'><input type='hidden' name='servertype' value='$servertype'><input type='hidden' name='monsterid' value='$monsters[mob_monsterid]'><input type='hidden' name='action' value='editmonster'><input type='submit' value='Edit'></form></td><td>";
				$content=$content."<form action='index.php?mod=gameeditors&submod=editor_monster&servertype=".$servertype."&action=kill&monsterid=".$monsters[mob_monsterid]."' methode='get'>";
				$content=$content."<input type='submit' value='Delete'></form></td></tr>";
			}
			$content=$content."</table>";
		break;
	}
?>