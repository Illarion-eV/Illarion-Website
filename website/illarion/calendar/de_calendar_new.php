<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
      create_header( "Illarion - Kalender",
      "Ein grafischer Kalender des aktuellen Jahres",
      "Kalender, Datum, Monat, Tierkreiszeichen",
      "",
      "lightwindow,lightwindow_de,calendar","prototype,effects,lightwindow");

      include_header();
?>

<!-- Datumsberechnung -->

<?php
$illa_year=illa_date('y');
$illa_today=ltrim(illa_date('d'),'0');
$illa_month=ltrim(illa_date('m'),'0');
    // Monatsnamen und beschreibung
 $month = array( 	"1"=>array("NAME"=>"Elos", "DESC"=>"Monat der<br/> Magie", "SEASON"=>"spring", "SEASON_NAME"=>"Frühling"), 
					"2"=>array("NAME"=>"Tanos", "DESC"=>"Monat der<br/> Fluten", "SEASON"=>"spring", "SEASON_NAME"=>"Frühling"),
					"3"=>array("NAME"=>"Zhas", "DESC"=>"Monat der<br/> Treue", "SEASON"=>"spring", "SEASON_NAME"=>"Frühling"),
					"4"=>array("NAME"=>"Ushos", "DESC"=>"Monat der<br/> Aussaat", "SEASON"=>"spring", "SEASON_NAME"=>"Frühling"),
					"5"=>array("NAME"=>"Siros", "DESC"=>"Monat der<br/> Liebe", "SEASON"=>"summer", "SEASON_NAME"=>"Sommer"),
					"6"=>array("NAME"=>"Ronas", "DESC"=>"Monat der Freigiebigkeit", "SEASON"=>"summer", "SEASON_NAME"=>"Sommer"),
					"7"=>array("NAME"=>"Bras", "DESC"=>"Monat der<br/> Opferung", "SEASON"=>"summer", "SEASON_NAME"=>"Sommer"),
                    "8"=>array("NAME"=>"Eldas", "DESC"=>"Monat des<br/> Fastens", "SEASON"=>"summer", "SEASON_NAME"=>"Sommer"),
                    "9"=>array("NAME"=>"Irmas", "DESC"=>"Monat des<br/> Handwerks", "SEASON"=>"autumn", "SEASON_NAME"=>"Herbst"),
					"10"=>array("NAME"=>"Malas", "DESC"=>"Monat des<br/> Jägers", "SEASON"=>"autumn", "SEASON_NAME"=>"Herbst"),
					"11"=>array("NAME"=>"Findos", "DESC"=>"Monat der<br/> bildenden Künste", "SEASON"=>"autumn", "SEASON_NAME"=>"Herbst"),
                    "12"=>array("NAME"=>"Olos", "DESC"=>"Monat der<br/> Ernte", "SEASON"=>"autumn", "SEASON_NAME"=>"Herbst"),
                    "13"=>array("NAME"=>"Adras", "DESC"=>"Monat der<br/> Trunkenheit", "SEASON"=>"winter", "SEASON_NAME"=>"Winter"),
                    "14"=>array("NAME"=>"Naras", "DESC"=>"Monat der<br/> vier Winde", "SEASON"=>"winter", "SEASON_NAME"=>"Winter"),
                    "15"=>array("NAME"=>"Chos", "DESC"=>"Monat des<br/> Gedenkens", "SEASON"=>"winter", "SEASON_NAME"=>"Winter"),
                    "16"=>array("NAME"=>"Mas", "DESC"=>"Monat des<br/> Blutes", "SEASON"=>"winter", "SEASON_NAME"=>"Winter")
				);
?>

<!-- Webteil -->

<h1>Kalender - Wir schreiben das Jahr <?php echo $illa_year ?></h1>

<h2>Aktuelles Datum: <?php echo $illa_today.". "; echo $month[$illa_month]['NAME']." "; echo $illa_year;?></h2>

<br/>

<?php
	$this_month=1;

	echo "<div class='year'>";	
	while ($this_month < 17)
	{
		echo "<div class='calendar'>";
        if ($this_month==16) { $days_per_month=5; } else { $days_per_month=24; }
		
		echo "<table border='1'>";
		echo "<tr>";

		// IMAGE
		echo "<td colspan='3' rowspan='2'>";
        echo "<a href='signs/de_sign_".$this_month.".php' class='lightwindow' params='lightwindow_height=450,lightwindow_width=400'>";
        echo "<img src='images/image_".$this_month.".gif' alt='Grafik' />";
		echo "</a>";
        echo "</td>";

		// MONTH NAME
		echo "<td colspan='5' style='width:108px;'>";
		echo "<h2 class='".$month[$this_month]['SEASON']."'>".$month[$this_month]['NAME']."</h2>";
		echo "</td>";
		echo "</tr>";
		
		echo "<tr>";
		echo "<td colspan='5'>";
        echo "<a href='month/de_month_".$this_month.".php' title='".$month[$this_month]['SEASON_NAME']."' class='lightwindow' params='lightwindow_height=450,lightwindow_width=400'>";
        echo "<span class='month'>".$month[$this_month]['DESC']."</span>";
        echo "</a>";
        echo "</td>";
		echo "</tr>";

/*
		echo "<pre>";
		print_r($month[$this_month]);
		echo "</pre>";

		for ($i=1;$i<=$days_per_month;$i++)
		{
			echo $i."-";

		}
*/		
		echo "</table>";
		echo "</div>";
//		if ($this_month % 2 != 0) { echo "<br/>"; }
		$this_month++;
	}

	echo "</div>";




?>

<?php include_footer(); ?>








