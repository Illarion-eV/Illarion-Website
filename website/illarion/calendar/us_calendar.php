<?php
	include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
	create_header( "Illarion - Calendar",
	"A graphical calendar of the current year",
	"calendar, date, month, zodiac",
	"",
	"lightwindow,lightwindow_us,calendar_2","prototype,effects,lightwindow");
	include_header();
?>

<!-- Datumsberechnung -->

<?php
$illa_year=illa_date('y');
$illa_today=illa_date('d');
$illa_month=illa_date('m');
    // Monatsnamen und beschreibung
    $monate=array("Elos","Tanos","Zhas","Ushos","Siros","Ronas","Bras","Eldas","Irmas","Malas","Findos","Olos","Adras","Naras","Chos","Mas");
    $monate_desc=array("Month of <br>Magic","Month of <br>Floods","Month of <br>Loyalty","Month of <br>Sowing","Month of <br>Love","Month of <br>Generosity","Month of <br>Immolation","Month of <br>Abrosia","Month of <br>Trade","Month of the <br>Hunter","Month of <br>Fine Arts","Month of <br>Harvest","Month of <br>Intoxication","Month of the <br>Four Winds","Month of <br>Commemoration","Month of <br>Blood");
?>

<!-- Webteil -->

<h1>Calendar - We are in the year <?php echo $illa_year ?></h1>

<h2>Current date: <?php echo $illa_today.". "; echo $monate[$illa_month-1]." "; echo $illa_year;?></h2>

<p>Click on the description of a month to learn more about it. Also, you can click on the Signs of the Zodiac for more information on the typical traits of a character that was born in each month.</p>

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
	    <a href='signs/us_sign_<?php echo $this_month; ?>.php' class='lightwindow' params='lightwindow_height=450,lightwindow_width=400'>
	        <img src='images/image_<?php echo $this_month; ?>.gif' alt='Grafik'>
            </a>
	    </td>

	    <!-- <td colspan='5' height='20' width='134' valign='center' style='color:#000000; font-size: 12pt;'>  -->
	    <td colspan='5' width='108'>
	    <?php if ( ($this_month > 0) and ($this_month < 5) )
	    { ?>
	        <h2 class="spring"><b><?php echo $monate[$this_month-1]; ?></b></h2>
		<?php $season="Spring"; ?>
	    <?php }
	    elseif ( ($this_month > 4) and ($this_month < 9) )
	    { ?>
		<h2 class="summer"><b><?php echo $monate[$this_month-1]; ?></b></h2>
		<?php $season="Summer"; ?>
	    <?php }
	    elseif ( ($this_month > 8) and ($this_month < 13) )
	    { ?>
		<h2 class="autumn"><b><?php echo $monate[$this_month-1]; ?></b></h2>
		<?php $season="Autumn"; ?>
	    <?php }
	    else
	    { ?>
		<h2 class="winter"><b><?php echo $monate[$this_month-1]; ?></b></h2>
		<?php $season="Winter"; ?>
	    <?php } ?>
	    </td>
	    </tr>

	    <tr>
	    <td colspan='5' >
	    <a href='month/us_month_<?php echo $this_month; ?>.php' title='<?php echo $season ?>' class='lightwindow' params='lightwindow_height=450,lightwindow_width=400'>
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
