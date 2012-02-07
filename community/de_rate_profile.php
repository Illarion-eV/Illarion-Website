<?php
	include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );

	$charid = hexdec($_GET['profile']);
	if (!is_numeric($charid))
	{
		exit("Fehler - Charakterid wurde nicht richtig übergeben");
	}

	$db_hp =& Database::getPostgreSQL( 'homepage' );
	$query = "SELECT COUNT(*)"
	. "\n FROM character_details"
	. "\n WHERE char_id = ".$db_hp->Quote( $charid )
	. "\n AND (settings & 1) > 0"
	;
	$db_hp->setQuery( $query );

	if ($db_hp->loadResult() != 1)
	{
		exit("Profil nicht gefunden");
	}

	$query = "SELECT vote"
	. "\n FROM character_votes"
	. "\n WHERE user_id = ".$db_hp->Quote( IllaUser::$ID )
	. "\n AND char_id = ".$db_hp->Quote( $charid )
	;
	$db_hp->setQuery( $query );
	$vote = $db_hp->loadResult();

	if (!$vote && $vote !== 0)
	{
		$vote = 5;
	}

	create_XMLheader();
?>

<div>
	<p>Wie möchtest du das Profil bewerten?</p>

	<form id="vote_form" name="vote_form" method="post" action="<?php echo $url; ?>/community/de_charprofile.php?id=<?php echo dechex($charid); ?>" style="width:100%;text-align:center;">
		<table style="width:100%">
			<tbody>
				<tr>
					<td>
						<div id="rate_slider" class="slider">
							<div class="handle"></div>
						</div>
					</td>
					<td style="width:70px;">
						<input style="width:70px;" type="text" name="rate" id="rate_text" value="<?php echo $vote; ?>/10" onchange="rate_control.setValue(parseInt($('rate_text').value));" />
					</td>
				</tr>
				<tr>
					<td style="text-align:center;" colspan="2">
						<br />
						<button onclick="document.forms.vote_form.submit();" style="margin-right:10px;">Bewertung speichern</button>
						<button onclick="window.parent.myLightWindow.deactivate();return false;" style="margin-left:10px;">Abbrechen</button>
					</td>
				</tr>
			</tbody>
		</table>
	</form>
	<script type="text/javascript"><![CDATA[
		init = function()
		{
			var rate_slider = $('rate_slider');
			var rate_text = $('rate_text');
			rate_control = new Control.Slider(rate_slider.down('.handle'), rate_slider, {
				range: $R(0,10),
				increment: 1,
				sliderValue: <?php echo $vote; ?>,
				onSlide: function(value) {
					rate_text.value = Math.round(value)+'/10';
				},
				onChange: function(value) {
					rate_text.value = Math.round(value)+'/10';
				}
			});
		};
		if (typeof myLightWindow != 'undefined')
		{
			myLightWindow.addEventOnReady( init );
		}
		else
		{
			init();
		}
	]]></script>
</div>
<?php include_short_footer(); ?>
