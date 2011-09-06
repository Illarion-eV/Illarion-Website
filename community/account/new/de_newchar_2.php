<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	if (!IllaUser::loggedIn())
	{
		header('HTTP/1.0 401 Unauthorized');
		exit();
	}

	includeWrapper::includeOnce( Page::getRootPath().'/community/account/inc_editinfos.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/community/account/new/inc_charcreate.php' );
	includeWrapper::includeOnce( Page::getRootPath().'/community/account/new/def_charcreate.php' );

	$server = ( isset( $_GET['server'] ) && $_GET['server'] == '1' ? 'testserver' : 'illarionserver');
	$charid = ( isset( $_GET['charid'] )  && is_numeric($_GET['charid']) ? (int)$_GET['charid'] : false );
	if (!$charid)
	{
		exit('Fehler - Charakter ID wurde nicht richtig übergeben.');
	}

	$pgSQL =& Database::getPostgreSQL( $server );

	$query = 'SELECT chr_race, chr_sex'
	.PHP_EOL.' FROM chars'
	.PHP_EOL.' WHERE chr_playerid = '.$pgSQL->Quote( $charid )
	.PHP_EOL.' AND chr_accid = '.$pgSQL->Quote( IllaUser::$ID )
	;
	$pgSQL->setQuery( $query );
	list( $race, $sex ) = $pgSQL->loadRow();

	if ($race === null || $race === false)
	{
		header('HTTP/1.0 401 Unauthorized');
		exit();
	}

	$query = 'SELECT COUNT(*)'
	.PHP_EOL.' FROM player'
	.PHP_EOL.'WHERE ply_playerid = '.$pgSQL->Quote( $charid )
	;
	$pgSQL->setQuery( $query );
	if ($pgSQL->loadResult())
	{
		exit('Fehler - Werte wurden bereits gesetzt');
	}

	$account =& Database::getPostgreSQL( 'accounts' );

	$query = 'SELECT *'
	.PHP_EOL.' FROM raceattr'
	.PHP_EOL.' WHERE id IN ( -1, '.$account->Quote( $race ).' )'
	.PHP_EOL.' ORDER BY id DESC'
	;
	$account->setQuery( $query, 0, 1 );
	$limits = $account->loadAssocRow();

	$limits['curr_weight'] = 0;
	$limits['curr_bodyheight'] = 0;
	$limits['curr_age'] = 0;
	$dob= array( 'day' => 1, 'month' => 1 );

	calculateLimits( &$limits );
	$limit_text = generateLimitTexts( $limits );

	$enable_lightwindow = !( Page::getBrowserName() == 'msie' && Page::getBrowserVersion() <= 6 );

	if ($enable_lightwindow)
	{
		Page::setXML();
	}
	else
	{
		Page::setXHTML();
		Page::addJavaScript( 'prototype' );
		Page::addJavaScript( 'effects' );
		Page::addCSS( 'slider' );
		Page::addJavaScript( 'slider' );
	}
	Page::Init();
?>

<div>
	<h1>Schritt 2</h1>

	<form action="<?php echo Page::getURL(); ?>/community/account/new/de_newchar.php?charid=<?php echo $charid,($_GET['server'] == '1' ? '&amp;server=1' : ''); ?>" method="post" name="create_char" id="create_char">
		<div>
			<h2>Informationen</h2>
			<table style="width:100%">
				<tbody>
					<tr>
						<td>
							Gewicht: <?php echo $limit_text['weight']; ?>
						</td>
						<td style="width:423px;">
							<?php include_slider( $limits, 'weight' ); ?>
						</td>
					</tr>
					<tr>
						<td>
							Größe: <?php echo $limit_text['height']; ?>
						</td>
						<td>
							<?php include_slider( $limits, 'bodyheight' ); ?>
						</td>
					</tr>
					<tr>
						<td>
							Alter: <?php echo $limits['minage']; ?> Jahre bis <?php echo $limits['maxage']; ?> Jahre
						</td>
						<td>
							<?php include_slider( $limits, 'age' ); ?>
							<p>
								Geburtsdatum:
								<select name="day" id="day" style="width:50px;margin-right:10px;">
									<?php for ($i = 1;$i <= 24;++$i): ?>
									<option value="<?php echo $i; ?>"<?php echo ($dob['day'] == $i ? ' selected="selected"' : '' ); ?>><?php echo $i; ?>.</option>
									<?php endfor; ?>
								</select>
								<select name="month" id="month" style="margin-left:10px;">
									<?php for ($i = 1;$i <= 16;++$i): ?>
									<option value="<?php echo $i; ?>"<?php echo ($dob['month'] == $i ? ' selected="selected"' : '' ); ?>><?php echo IllaDateTime::getMonthName( $i ); ?></option>
									<?php endfor; ?>
								</select>
							</p>
						</td>
					</tr>
				</tbody>
			</table>
			<?php include_heightweight_js( $limits ); ?>
            <?php include_age_js( $limits ); ?>

			<h2>Aussehen</h2>
			<table style="width=100%">
				<tbody>
					<tr>
						<td>
							$skincolors = char_create::getSkinColors($race);
							Hautfarbe:<span id="skin_color" style="width:100%;height:30px;display:block;"></span>
							<input type="hidden" id="skincolor" value="" name="skincolor" />
                            <?php foreach ( $skincolors as $color ): ?>
                                <a onclick="$('skin_color').style.backgroundColor = '#<?php echo $color; ?>';$('skincolor').value = '#<?php echo $color; ?>';" style="display: block;height: 10px;width: 10px;float: left;background-color: #<?php echo $color; ?>;border: 1px solid black;"></a>
                            <?php endforeach; ?>
						</td>
					</tr>
					<tr>
                        <td>
                            $haircolors = char_create::getHairColors($race);
                            Haarfarbe: <span id="hair_color" style="width:100%;height:30px;display:block;"></span>
							<input type="hidden" id="haircolor" value="" name="haircolor" />
                            <?php foreach ( $haircolors as $color ): ?>
                                <a onclick="$('hair_color').style.backgroundColor = '#<?php echo $color; ?>';$('haircolor').value = '#<?php echo $color; ?>';" style="display: block;height: 10px;width: 10px;float: left;background-color: #<?php echo $color; ?>;border: 1px solid black;"></a>
                            <?php endforeach; ?>
                        </td>
                    </tr>
		<?php
/*
					<tr>
                        <td>
							<?php $hair_list = char_create::getHairValues($race, $sex); ?>
							<input type="hidden" id="hair" value="" name="hair" />
							Haare: <br/>
						 	<br/>
							<?php foreach ( $hairs as $hair ): ?>
								<a onclick="$('<?php echo $hair; ?>').style.border='1px solid black';$('hair').value = '<?php echo $hair; ?>';" ><img id="<?php echo $hair; ?>" src="<?php echo $url; ?>/shared/pics/chars/<?php echo $hair; ?>.png" style="width:25px;border: 1px solid black;"/></a>
							<?php endforeach; ?>
                        </td>
                    </tr>

					if ( ((($race==0) || ($race==4)) && ($sex==0)) || ($race==1) )
					{
						$beard_list = char_create::getBeardValues($race);
						?>
						<tr>
                    	    <td>
								<?php if ($race==0) { $beards = array("hum_m_beard_1","hum_m_beard_2");  }
								elseif ($race==1) { $beards = array("dwa_m_beard_1","dwa_m_beard_2");  }
								elseif ($race==4) { $beards = array("orc_m_beard_1","orc_m_beard_2");  }
								?>
								<input type="hidden" id="beard" value="" name="beard" />
                    	        Bart: <br/>
								<br/>
								<?php foreach ( $beards as $beard ): ?>
                                	<a onclick="$('<?php echo $beard; ?>').style.border='1px solid black';$('beard').value = '<?php echo $beard; ?>';" ><img id="<?php echo $beard; ?>" src="<?php echo $url; ?>/shared/pics/chars/<?php echo $beard; ?>.png" style="width:25px"/></a>
                            	<?php endforeach; ?>
                    	    </td>
                    	</tr>
					<?php }
			   */
			   ?>
				</tbody>
			</table>

			<p style="text-align:center;padding-bottom:10px;">
				<input type="hidden" name="action" value="newchar_2" />
				<button onclick="document.forms.create_char.submit();" style="margin-right:10px;">Daten speichern</button>
				<?php if($enable_lightwindow): ?><button onclick="myLightWindow.deactivate();return false;" style="margin-left:10px;">Abbrechen</button><?php endif; ?>
			</p>
		</div>
	</form>
</div>