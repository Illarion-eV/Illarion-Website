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
$illa_today=illa_date('d');
$illa_month=illa_date('m');
    // Monatsnamen und beschreibung
    $monate=array("Elos","Tanos","Zhas","Ushos","Siros","Ronas","Brás","Eldas","Irmas","Malas","Findos","Olos","Adras","Naras","Chos","Mas");
    $monate_desc=array("Monat der<br/> Magie","Monat der<br/> Fluten","Monat der<br/> Treue","Monat der<br/> Aussaat","Monat der<br/> Liebe","Monat der Freigiebigkeit","Monat der<br/> Opferung","Monat des<br/> Fastens","Monat des<br/> Handwerks","Monat des<br/> J&auml;gers","Monat der<br/> bildenden K&uuml;nste","Monat der<br/> Ernte","Monat der<br/> Trunkenheit","Monat der<br/> vier Winde","Monat des<br/> Gedenkens","Monat des<br/> Blutes");
?>

<!-- Webteil -->

<h1>Kalender - Wir schreiben das Jahr <?php echo $illa_year ?></h1>

<h2>Aktuelles Datum: <?php echo $illa_today.". "; echo $monate[$illa_month-1]." "; echo $illa_year;?></h2>

<p>Die Zeit vergeht in der Welt Illarion dreimal schneller als im wirklichen Leben. So dauert ein Tag in der Welt Illarion lediglich acht Stunden. Soll auf einen Tag im wirklichen Leben verwiesen werden, so wird von "Zwergentagen" geredet. Dies leitet sich aus den Arbeitsschichten der fleißigen Zwerge her, welche unter Tage nicht auf den Lauf der Sonne Rücksicht nehmen und dreimal länger arbeiten als die faulen anderen Rassen.</p>

<p>Klicke auf die Beschreibung eines Monats, um Weiteres zu erfahren. Ebenso kannst du auf das Sternkreiszeichenbild klicken, um etwas über die typischen Eigenschaften eines Charakters zu erfahren, der im jeweiligen Monat geboren wurde.</p>

<?php
$this_month=1;
while ($this_month < 17)
{ ?>
    <div class="meine_Klasse">

        <?php $erster=1; ?>
        <?php if ($this_month==16) { $insgesamt=5; } else { $insgesamt=24; } ?>
        <?php if( $erster==0 ){ $erster=8; } ?>

	<table>
					
            <tr>
	    <td colspan='3' rowspan='2'>
	    <a href='signs/de_sign_<?php echo $this_month; ?>.php' title='<?php echo $monate[$this_month-1] ?>' class='lightwindow' params='lightwindow_height=450,lightwindow_width=400'>
	        <img src='images/image_<?php echo $this_month; ?>.gif' alt='Grafik'>
            </a>
	    </td>

	    <!-- <td colspan='5' height='20' width='134' valign='center' style='color:#000000; font-size: 12pt;'>  -->
	    <td colspan='5' width='108'>
	    <?php if ( ($this_month > 0) and ($this_month < 5) )
	    { ?>
	        <h2 class="spring"><b><?php echo $monate[$this_month-1]; ?></b></h2>
		<?php $season="Fr&uuml;hling"; ?>
	    <?php }
	    elseif ( ($this_month > 4) and ($this_month < 9) )
	    { ?>
		<h2 class="summer"><b><?php echo $monate[$this_month-1]; ?></b></h2>
		<?php $season="Sommer"; ?>
	    <?php }
	    elseif ( ($this_month > 8) and ($this_month < 13) )
	    { ?>
		<h2 class="autumn"><b><?php echo $monate[$this_month-1]; ?></b></h2>
		<?php $season="Herbst"; ?>
	    <?php }
	    else
	    { ?>
		<h2 class="winter"><b><?php echo $monate[$this_month-1]; ?></b></h2>
		<?php $season="Winter"; ?>
	    <?php } ?>
	    </td>
	    </tr>

	    <tr>
	    <td colspan='5'> 
	    <a href='month/de_month_<?php echo $this_month; ?>.php' title='<?php echo $season ?>' class='lightwindow' params='lightwindow_height=450,lightwindow_width=400'>
	    	<span class="month"><?php echo $monate_desc[$this_month-1]; ?></span>
	    </a>
	    </td>
	    </tr>	
        <tr>

        <?php $i=1; ?>
        <?php while ($i<$erster)
	{?>
	    <!-- <td> </td>  -->
	    <?php $i++; ?>
	<?php } ?>
	<?php $i=1; ?>

        <?php while($i<=$insgesamt)
        { ?>
            <?php $rest=($i+$erster-1)%8; ?>

	    <td class="day">
		
	    <?php if ($i==$illa_today && $this_month==$illa_month) 
	    { ?>
                <span class="today">
		    <?php echo $i; ?>
		</span>
            <?php }
            else 
	    {?>
	        <span class="day">
                    <?php echo $i; ?>
		</span>
            <?php } ?>

            </td>
	    <?php if($rest==0) 
	    { ?>
	        </tr><tr>
	    <?php } ?>
	    <?php $i++; ?>
	<?php } ?>
	<?php if ($this_month==16) { ?> <td class="day"></td><td class="day"></td><td class="day"></td><?php } ?>
        </tr>
        </table> 
<?php $this_month++; ?>
</div>
<?php } ?>

<?php include_footer(); ?>








