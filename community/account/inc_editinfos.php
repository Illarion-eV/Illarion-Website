<?php
	function calculateLimits( &$limit )
	{
		if (IllaUser::usesMeter())
		{
			$limit['minbodyheight'] = ceil($limit['minbodyheight'] * 2.54)/100;
			$limit['maxbodyheight'] = floor($limit['maxbodyheight'] * 2.54)/100;
			$limit['curr_bodyheight'] = round($limit['curr_bodyheight'] * 2.54)/100;
			$limit['increment_bodyheight'] = 0.01;
			$limit['unit_bodyheight'] = 'm';
		}
		else
		{
			$limit['increment_bodyheight'] = 1;
			$limit['unit_bodyheight'] = 'inch';
		}
		if (IllaUser::usesPound())
		{
			$limit['minweight'] = ceil($limit['minweight']/100*2.204623);
			$limit['maxweight'] = floor($limit['maxweight']/100*2.204623);
			$limit['curr_weight'] = round($limit['curr_weight']/100*2.204623);
			$limit['increment_weight'] = 1;
			$limit['unit_weight'] = 'lb';
		}
		else
		{
			$limit['minweight'] /= 100;
			$limit['maxweight'] /= 100;
			$limit['curr_weight'] /= 100;
			$limit['increment_weight'] = 0.01;
			$limit['unit_weight'] = 'kg';
		}

		$limit['increment_age'] = 1;
		$limit['unit_age'] = ( Page::isGerman() ? ' Jahre' : ' years' );
	}

	function generateLimitTexts( $limit )
	{
		$texts = array();
		if (IllaUser::usesMeter())
		{
			$texts['height'] = round($limit['minbodyheight'],2).'m '.(Page::isGerman() ? 'bis ' : 'to ').round($limit['maxbodyheight'],2).'m';
		}
		else
		{
			$texts['height'] = floor($limit['minbodyheight']/12).'ft '.floor($limit['minbodyheight']%12).'inch '.(Page::isGerman() ? 'bis ' : 'to ').floor($limit['maxbodyheight']/12).'ft '.floor($limit['maxbodyheight']%12).'inch';
		}

		if (IllaUser::usesPound())
		{
			$texts['weight'] = floor($limit['minweight']/14).'st '.floor($limit['minweight']%14).'lb '.(Page::isGerman() ? 'bis ' : 'to ').floor($limit['maxweight']/14).'st '.floor($limit['maxweight']%14).'lb';
		}
		else
		{
			$texts['weight'] = round($limit['minweight'],2).'kg '.(Page::isGerman() ? 'bis ' : 'to ').round($limit['maxweight'],2).'kg';
		}
		return $texts;
	}

	function include_slider( $limit, $name )
	{
		$default = $limit['curr_'.$name];
		if (!$limit['increment_'.$name])
		{
			$limit['increment_'.$name] = 1;
		}
		if ( !$default || $default < $limit['min'.$name] || $default > $limit['max'.$name] )
		{
			$default = floor(($limit['min'.$name]+$limit['max'.$name])/2/$limit['increment_'.$name])*$limit['increment_'.$name];
		}
	?>
<table style="width:100%">
	<tbody>
		<tr>
			<td>
				<div id="<?php echo $name; ?>_slider" class="slider">
					<div class="handle"></div>
				</div>
			</td>
			<td style="width:70px;">
				<input style="width:70px;" type="text" name="<?php echo $name; ?>" id="<?php echo $name; ?>_text" value="<?php echo $default.$limit['unit_'.$name] ?>" onchange="<?php echo $name; ?>_control.setValue(parseInt(parseFloat($('<?php echo $name; ?>_text').value)<?php echo ($limit['increment_'.$name] != 1 ? '/'.$limit['increment_'.$name] : '' ); ?>));" />
			</td>
		</tr>
	</tbody>
</table>
	<?php
	}

	function include_heightweight_js( $limit )
	{
		$values = array( 'weight', 'bodyheight' );
	?>
<?php if (Page::canXHTML()): ?>
<script type="text/javascript"><![CDATA[
<?php else: ?>
<script type="text/javascript">
<?php endif; ?>
	init1 = function()
	{
		<?php foreach( $values as $name ) { ?>
		var <?php echo $name; ?>_slider = $('<?php echo $name; ?>_slider');
		var <?php echo $name; ?>_text = $('<?php echo $name; ?>_text');
		<?php } ?>
		<?php foreach( $values as $name ) {
			$default = $limit['curr_'.$name];
			if ( !$default || $default < $limit['min'.$name] || $default > $limit['max'.$name] )
			{
				$default = floor(($limit['min'.$name]+$limit['max'.$name])/2/$limit['increment_'.$name]);
			}
			else
			{
				$default /= $limit['increment_'.$name];
			}
		?>
		<?php echo $name; ?>_control = new Control.Slider(<?php echo $name; ?>_slider.down('.handle'), <?php echo $name; ?>_slider, {
			range: $R(<?php echo ($limit['min'.$name]/$limit['increment_'.$name]).','.($limit['max'.$name]/$limit['increment_'.$name]); ?>),
			increment: 1,
			sliderValue: <?php echo $default; ?>,
			onSlide: function(value) {
				<?php echo $name; ?>_text.value = Math.round(value)<?php echo ($limit['increment_'.$name] != 1 ? '/'.(1/$limit['increment_'.$name]) : '' ); ?>+'<?php echo $limit['unit_'.$name]; ?>';
			},
			onChange: function(value) {
				<?php echo $name; ?>_text.value = Math.round(value)<?php echo ($limit['increment_'.$name] != 1 ? '/'.(1/$limit['increment_'.$name]) : '' ); ?>+'<?php echo $limit['unit_'.$name]; ?>';
			}
		});
		<?php } ?>
	};
	if (typeof myLightWindow != 'undefined')
	{
		myLightWindow.addEventOnReady( init1 );
	}
	else
	{
	    if (window.addEventListener)
	    {
		    window.addEventListener("load", init1, false);
		}
		else
		{
		    // IE8 compatibility
		    window.attachEvent("onload", init1);
		}
	}
<?php if (Page::canXHTML()): ?>
]]></script>
<?php else: ?>
</script>
<?php endif; ?>
	<?php
	}

	function include_age_js( $limit )
	{
		$default = $limit['curr_age'];
		if ( !$default || $default < $limit['minage'] || $default > $limit['maxage'] )
		{
			$default = floor(($limit['minage']+$limit['maxage'])/2);
		}
	?>
<?php if (Page::canXHTML()): ?>
<script type="text/javascript"><![CDATA[
<?php else: ?>
<script type="text/javascript">
<?php endif; ?>
	init2 = function()
	{
		var change_month_age = function()
		{
			var day = $('day');
			var month = $('month');
			if ( ( month.selectedIndex == 15 ) && ( day.length == 24 ) )
			{
				for ( var i = 5; i < 24; i++ )
				{
					day[5] = null;
				};
			}
			else if ( ( month.selectedIndex != 15 ) && ( day.length < 24 ) )
			{
				for ( var i = 5; i < 24; i++ )
				{
					day[i] = new Option( (i + 1)+".", (i + 1) );
				};
			};
		};
		var age_slider = $('age_slider');
		var age_text = $('age_text');
		$('month').onchange = change_month_age;
		age_control = new Control.Slider(age_slider.down('.handle'), age_slider, {
			range: $R(<?php echo $limit['minage'].','.$limit['maxage']; ?>),
			increment: 1,
			sliderValue: <?php echo $default; ?>,
			onSlide: function(value) {
				age_text.value = Math.round(value)+'<?php echo $limit['unit_age']; ?>';
			},
			onChange: function(value) {
				age_text.value = Math.round(value)+'<?php echo $limit['unit_age']; ?>';
			}
		});
	};
	if (typeof myLightWindow != 'undefined')
	{
		myLightWindow.addEventOnReady( init2 );
	}
	else
	{
		if (window.addEventListener)
	    {
		    window.addEventListener("load", init2, false);
		}
		else
		{
		    // IE8 compatibility
		    window.attachEvent("onload", init2);
		}
	}
<?php if (Page::canXHTML()): ?>
]]></script>
<?php else: ?>
</script>
<?php endif; ?>
	<?php
	}

	function include_attribute_js( $limit )
	{
	?>
<?php if (Page::canXHTML()): ?>
<script type="text/javascript"><![CDATA[
<?php else: ?>
<script type="text/javascript">
<?php endif; ?>
	init3 = function()
	{
		<?php
			$sum = 0;
			foreach( array( 'strength', 'agility', 'constitution', 'dexterity', 'intelligence', 'perception', 'willpower', 'essence' ) as $name )
			{
		?>
		var <?php echo $name; ?>_slider = $('<?php echo $name; ?>_slider');
		var <?php echo $name; ?>_text = $('<?php echo $name; ?>_text');
		<?php
			}
		?>
		var remaining_slider = $('remaining_slider');
		var remaining_text = $('remaining_text');
		var sumUp = function() {
			return parseInt(strength_text.value)+parseInt(agility_text.value)+parseInt(constitution_text.value)+parseInt(dexterity_text.value)+parseInt(intelligence_text.value)+parseInt(perception_text.value)+parseInt(willpower_text.value)+parseInt(essence_text.value);
		};

		var lastChanged = null;
		var correcting = true;

		var lowerAll = function( except, value )
		{
			var i = 0;
			do
			{
				correcting = false;
				if (lastChanged == null) { lastChanged = strength_control; }
				else if (lastChanged == strength_control) { lastChanged = agility_control; }
				else if (lastChanged == agility_control) { lastChanged = constitution_control; }
				else if (lastChanged == constitution_control) { lastChanged = dexterity_control; }
				else if (lastChanged == dexterity_control) { lastChanged = intelligence_control; }
				else if (lastChanged == intelligence_control) { lastChanged = perception_control; }
				else if (lastChanged == perception_control) { lastChanged = willpower_control; }
				else if (lastChanged == willpower_control) { lastChanged = essence_control; }
				else if (lastChanged == essence_control) { lastChanged = strength_control; };

				if (except != lastChanged && lastChanged.value > lastChanged.minimum) {
					lastChanged.setValue( lastChanged.values[0] - 1 );
					i++;
					if (i == value-1)
					{
						correcting = true;
					};
				};
			} while (i<value);
			correcting = true;
		};
		var setupTemplate = function( )
		{
			var object = $('attrib_pack');
			var lastChanged = null;
			for(var i=0;i<object.childNodes.length;i++) {
				if (object.childNodes[i].selected) {
					value = object.childNodes[i].value;
				};
			};
			value = value.split("|");
			setCorrecting( false );
			strength_control.setValue( parseInt(value[0]) );
			agility_control.setValue( parseInt(value[1]) );
			dexterity_control.setValue( parseInt(value[2]) );
			constitution_control.setValue( parseInt(value[3]) );
			intelligence_control.setValue( parseInt(value[4]) );
			perception_control.setValue( parseInt(value[5]) );
			willpower_control.setValue( parseInt(value[6]) );
			setCorrecting( true );
			essence_control.setValue( parseInt(value[7]) );

			while (remaining_control.values[0] > 0) {
				if (lastChanged == null) { lastChanged = strength_control; }
				else if (lastChanged == strength_control) { lastChanged = agility_control; }
				else if (lastChanged == agility_control) { lastChanged = constitution_control; }
				else if (lastChanged == constitution_control) { lastChanged = dexterity_control; }
				else if (lastChanged == dexterity_control) { lastChanged = intelligence_control; }
				else if (lastChanged == intelligence_control) { lastChanged = perception_control; }
				else if (lastChanged == perception_control) { lastChanged = willpower_control; }
				else if (lastChanged == willpower_control) { lastChanged = essence_control; }
				else if (lastChanged == essence_control) { lastChanged = strength_control; };

				if (lastChanged.values[0] < lastChanged.maximum) {
					lastChanged.setValue( lastChanged.values[0] + 1 );
				};
			};
		};

		$('attrib_pack').onchange = setupTemplate;
		setCorrecting = function( newVal )
		{
			correcting = newVal;
		};
		<?php
			foreach( array( 'strength', 'agility', 'constitution', 'dexterity', 'intelligence', 'perception', 'willpower', 'essence' ) as $name )
			{
				$default = $limit['min'.$name];
				$sum += $default;
		?>
		<?php echo $name; ?>_control = new Control.Slider(<?php echo $name; ?>_slider.down('.handle'), <?php echo $name; ?>_slider, {
			range: $R(<?php echo $limit['min'.$name],',',$limit['max'.$name]; ?>),
			increment: 1,
			sliderValue: <?php echo $default; ?>,
			onSlide: function(value) {
				<?php echo $name; ?>_text.value = Math.round(value);
				var sum = sumUp();
				if (sum > <?php echo $limit['maxattribs']; ?> && correcting) {
					lowerAll( <?php echo $name; ?>_control, sum-<?php echo $limit['maxattribs']; ?> );
				}
				else
				{
					remaining_control.setValue(<?php echo $limit['maxattribs']; ?>-sum);
				};
			},
			onChange: function(value) {
				<?php echo $name; ?>_text.value = Math.round(value);
				var sum = sumUp();
				if (sum > <?php echo $limit['maxattribs']; ?> && correcting) {
					lowerAll( <?php echo $name; ?>_control, sum-<?php echo $limit['maxattribs']; ?> );
				}
				else
				{
					remaining_control.setValue(<?php echo $limit['maxattribs']; ?>-sum);
				};
			}
		});
		<?php } ?>
		Element.addClassName(remaining_slider.down('.handle'), 'disabled');
		remaining_control = new Control.Slider( remaining_slider.down('.handle'), remaining_slider, {
			range: $R(<?php echo $limit['minremaining']; ?>, <?php echo $limit['maxremaining']; ?>),
			increment: 1,
			disabled: true,
			sliderValue: <?php echo $limit['curr_remaining']; ?>,
			onSlide: function(value) {
				remaining_text.value = Math.round(value);
			},
			onChange: function(value) {
				remaining_text.value = Math.round(value);
			}
		});
	};

	if (typeof myLightWindow != 'undefined')
	{
		myLightWindow.addEventOnReady( init3 );
	}
	else
	{
		if (window.addEventListener)
	    {
		    window.addEventListener("load", init3, false);
		}
		else
		{
		    // IE8 compatibility
		    window.attachEvent("onload", init3);
		}
	};
<?php if (Page::canXHTML()): ?>
]]></script>
<?php else: ?>
</script>
<?php endif; ?>
	<?php
	}

	function calculateAge( $dobStamp )
	{
		$current = IllaDateTime::IllaTimestampToTime( 'array' );
		$char_birth = IllaDateTime::IllaDatestampToDate( $dobStamp );

		$age = ( $current['year'] - $char_birth['year'] );
		if ( $char_birth['month'] < $current['month'] || ( $char_birth['month'] == $current['month'] && $char_birth['day'] == $current['day'] ) )
		{
			$age--;
		}
		return $age;
	}
?>
