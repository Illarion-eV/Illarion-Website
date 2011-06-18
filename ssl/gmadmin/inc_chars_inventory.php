<?php

  $silver=SQLQuery("SELECT pit_number FROM playeritems WHERE pit_playerid=".$_GET[playerid]." AND pit_itemid=3077",$_GET[servertype]);
  $copper=SQLQuery("SELECT pit_number FROM playeritems WHERE pit_playerid=".$_GET[playerid]." AND pit_itemid=3076",$_GET[servertype]);
  $coppercoins=0;
  $silvercoins=0;
  foreach($copper as $key=>$copper2) {
    $coppercoins=$coppercoins+$copper2[pit_number];
  }
  foreach($silver as $key=>$silver2) {
    $silvercoins=$silvercoins+$silver2[pit_number];
  }
  $coins=($silvercoins*100)+$coppercoins;
  $showsilver=floor($coins/100);
  $showcopper=$coins-$showsilver*100;
  $content=$content."money: ".$showsilver."SC  ".$showcopper."CC";

?>