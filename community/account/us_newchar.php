<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	IllaUser::requireLogin();

	$charid = ( isset( $_GET['charid'] ) && is_numeric($_GET['charid']) ? (int)$_GET['charid'] : 0 );

	Page::Init();
	if (!$charid)
	{
		$pgSQL =& Database::getPostgreSQL( 'illarionserver' );
		$query = 'SELECT COUNT(*)'
		.PHP_EOL.' FROM chars'
		.PHP_EOL.' WHERE chr_accid = '.$pgSQL->Quote( IllaUser::$ID )
		;
		$pgSQL->setQuery( $query );
		$charcount = $pgSQL->loadResult();

		if ($charcount >= IllaUser::$charlimit && !IllaUser::auth('testserver') && IllaUser::$charlimit > 0)
		{
			Messages::add( 'Character limit of '.IllaUser::$charlimit.' was already reached.', 'error' );
			includeWrapper::includeOnce( Page::getRootPath().'/community/account/us_charlist.php' );
			exit();
		}
		$step = 1;
	}
	else
	{
		$server = ( isset( $_GET['server'] ) && $_GET['server'] == 1 ? 'testserver' : 'illarionserver' );
		$ident = '?charid='.$charid.( $server == 'testserver' ? '&amp;server=1' : '' );
		$pgSQL =& Database::getPostgreSQL( $server );

		$query = 'SELECT COUNT(*)'
		.PHP_EOL.' FROM chars'
		.PHP_EOL.' WHERE chr_playerid = '.$pgSQL->Quote( $charid )
		.PHP_EOL.' AND chr_accid = '.$pgSQL->Quote( IllaUser::$ID )
		;
		$pgSQL->setQuery( $query );
		if ($pgSQL->loadResult() != 1)
		{
			Messages::add( 'Character was not found', 'error' );
			includeWrapper::includeOnce( Page::getRootPath().'/community/account/us_charlist.php' );
			exit();
		}
		else
		{
			$step = 2;
		}

		$query = 'SELECT COUNT(*)'
		.PHP_EOL.' FROM player'
		.PHP_EOL.' WHERE ply_playerid = '.$pgSQL->Quote( $charid )
		;
		$pgSQL->setQuery( $query );
		if ($pgSQL->loadResult() == 1)
		{
			$step = 3;
			$query = 'SELECT COUNT(*)'
			.PHP_EOL.' FROM playerskills'
			.PHP_EOL.' WHERE psk_playerid = '.$pgSQL->Quote( $charid )
			;
			$pgSQL->setQuery( $query );
			if ($pgSQL->loadResult() > 0)
			{
				$step = 4;
			}
			else
			{
				$query = 'SELECT COUNT(*)'
				.PHP_EOL.' FROM playerlteffects'
				.PHP_EOL.' WHERE plte_playerid = '.$pgSQL->Quote( $charid )
				;
				$pgSQL->setQuery( $query );
				if ($pgSQL->loadResult() > 0)
				{
					$step = 4;
				}
			}
		}
	}

	Page::setTitle( array( 'Account', 'Create new character' ) );
	Page::setDescription( 'On this page you can create a new character for Illarion' );
	Page::setKeywords( array( 'Character', 'new', 'create' ) );

	Page::addCSS( array( 'lightwindow', 'lightwindow_us' ) );
	Page::addJavaScript( array( 'prototype', 'effects', 'lightwindow' ) );

	$enable_lightwindow = !( Page::getBrowserName() == 'msie' && Page::getBrowserVersion() <= 6 );

	if ($step == 1)
	{
		Page::addJavaScript( 'newchar_1' );
	}
	elseif ($step == 2)
	{
		Page::addCSS( 'slider' );
		Page::addJavaScript( 'slider' );
	}
	elseif ($step == 3)
	{
		Page::addJavaScript( 'newchar_3' );
	}

	Page::setXHTML();
?>

<h1>Create a new character</h1>

<h2>The three steps to get a new character</h2>

<h3>Notice to new players: Mages and Druids require a lot of development including assistance from other players so are not ideal "First Characters".</h3>

<table style="width:100%">
	<tr>
		<td style="width:130px;">
			<?php if ($step == 1): ?>
			<a href="<?php echo Page::getURL(); ?>/community/account/us_newchar_1.php"<?php if ($enable_lightwindow): ?> onclick="<?php JSBuilder::Lightwindow_activate( null, 'Character creation step 1', 350, 380 ); ?>"<?php endif; ?> style="font-size:25px;">
				Step 1
			</a>
			<?php else: ?>
			<span style="color:#007f00;">
				Step 1
			</span>
			<?php endif; ?>
		</td>
		<td>
			&nbsp;&nbsp;&nbsp;
		</td>
		<td>
			<?php if ($step == 1): ?>
			Click the link "Step 1" to start the first step of the character creation.
			At this point you have to type in the name, race and gender of your
			character. You should have a look at the
			<a href="<?php echo Page::getURL(); ?>/illarion/us_name_rules.php">name rules</a> of
			Illarion. The
			<a href="<?php echo Page::getURL(); ?>/general/us_rpg_guide.php">RPG-Guide</a> can be
			helpful as well.
			<?php else: ?>
			Step 1 is done correctly.
			<?php endif; ?>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>
			<?php if ($step == 2): ?>
			<a href="<?php echo Page::getURL(); ?>/community/account/us_newchar_2.php<?php echo $ident; ?>"<?php if ($enable_lightwindow): ?> onclick="<?php JSBuilder::Lightwindow_activate( null, 'Character creation step 2', 600, 750 ); ?>"<?php endif; ?> style="font-size:25px;">
				Step 2
			</a>
			<?php elseif ($step > 2): ?>
			<span style="color:#007f00;">
				Step 2
			</span>
			<?php else: ?>
			<span style="color:#7f0000;">
				Step 2
			</span>
			<?php endif; ?>
		</td>
		<td>
			&nbsp;&nbsp;&nbsp;
		</td>
		<td>
			<?php if ($step == 2): ?>
			Click on the link "Step 2" to perform the next step of the character
			creation. You have to put in the attributes of your character here. You
			should think well about this, because the attributes will not change
			anymore in the game.
			<?php elseif ($step > 2): ?>
			Step 2 is done correctly.
			<?php else: ?>
			Step 2 can't be done yet since step 1 is still waiting to be done.
			<?php endif; ?>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>
			<?php if ($step == 3): ?>
			<a href="<?php echo Page::getURL(); ?>/community/account/us_newchar_3.php<?php echo $ident; ?>"<?php if ($enable_lightwindow): ?> onclick="<?php JSBuilder::Lightwindow_activate( null, 'Character creation step 3', 450, 550 ); ?>"<?php endif; ?> style="font-size:25px;">
				Step 3
			</a>
			<?php elseif ($step > 3): ?>
			<span style="color:#007f00;">
				Step 3
			</span>
			<?php else: ?>
			<span style="color:#7f0000;">
				Step 3
			</span>
			<?php endif; ?>
		</td>
		<td>
			&nbsp;&nbsp;&nbsp;
		</td>
		<td>
			<?php if ($step == 3): ?>
			Click on the link "Step 3" to perform the last part of the character
			creation. Here you are able to choose the starting equipment as well as the
			skills your character has at the very beginning. During the game you will
			gain further skills and new equipment. The selection of the first
			equipment package has no real influence on the further game. So just
			choose the package you like most.
			<?php elseif ($step > 3): ?>
			Step 3 is done correctly.
			<?php else: ?>
			Step 3 can't be done yet since step 2 is still waiting to be done.
			<?php endif; ?>
		</td>
	</tr>
</table>

<?php if ($step == 4): ?>
<h1 style="color:#007f00;">Character creation is done! Have fun!</h1>

<h2>So what now?</h2>

<ul>
	<li><a href="<?php echo Page::getURL(); ?>/community/account/us_charlist.php">Back to overview</a></li>
	<li><a href="<?php echo Page::getURL(); ?>/illarion/us_java_download.php">Client download</a></li>
	<li><a href="<?php echo Page::getURL(); ?>/illarion/us_rules.php">Rules</a></li>
	<li><a href="<?php echo Page::getURL(); ?>/general/us_rpg_guide.php">RPG-Guide</a></li>
</ul>
<?php endif; ?>