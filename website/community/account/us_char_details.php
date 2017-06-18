<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	IllaUser::requireLogin();

	includeWrapper::includeOnce( Page::getRootPath().'/community/account/inc_char_details.php' );

	$server = '';
	switch ($_GET['server']) {
	case '1':
		$server = 'devserver';
		break;
	case '2':
		$server = 'testserver';
		break;
	default:
		$server = 'illarionserver';
	}
	
	$charid = ( isset( $_GET['charid'] ) && is_numeric($_GET['charid']) ? (int)$_GET['charid'] : 0 );

	if (!$charid)
	{
		Messages::add('Character ID was not transferred correctly.', 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/community/account/us_charlist.php' );
		exit();
	}

	if (!($chardata = loadCharacterData($charid, $server)))
	{
		Messages::add('Character was not found in the Database.', 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/community/account/us_charlist.php' );
		exit();
	}

	Page::setTitle( array( 'Account', 'Characterdetails', $chardata['chr_name'] ) );
	Page::setDescription( 'This page shows informations about the character '.$chardata['chr_name'] );
	Page::setKeywords( array( 'character', 'account', 'details', $chardata['chr_name'] ) );

	Page::addCSS( array( 'lightwindow', 'lightwindow_us' ) );
	Page::addJavaScript( array( 'prototype', 'effects', 'lightwindow', 'wz_tooltip' ) );

	Page::setXHTML();
	Page::Init();
?>

<h1>Character Details - <?php echo $chardata['chr_name']; ?></h1>

<div style="float:left; height:200px; width:255px;vertical-align:middle;text-align:center;">
	<img src="<?php echo $chardata['picture']['file']; ?>" style="height:<?php echo $chardata['picture']['height']; ?>px; width:<?php echo $chardata['picture']['width']; ?>px;" alt="Picture of <?php echo $chardata['chr_name']; ?>" />
</div>

<div style="text-align:left;">
	<table style="padding-left: 20px;">
		<tbody>
			<tr>
				<td style="width:150px">Name:</td>
				<td><?php echo $chardata['chr_name']; ?></td>
			</tr>
            <?php if ($chardata['is_gm']): ?>
                <tr>
                    <td style="width:150px">Naming:</td>
                    <td>
                        <form id="delete_form" name="delete_form" method="post" action="de_char_details.php" style="float:left">
                            <button type="submit"
                                    style="margin-right:10px;"
                                    title="Clears the known name assignments to this character. All character who named this character will forget it.">
                                Clear known names
                            </button>
                            <input type="hidden" name="server" value="<?php echo $_GET['server']; ?>" />
                            <input type="hidden" name="charid" value="<?php echo $charid; ?>" />
                            <input type="hidden" name="action" value="char_clear_name" />
                            <input type="hidden" name="clear" value="known_names" />
                        </form>
                        <form id="delete_form" name="delete_form" method="post" action="de_char_details.php" style="float:left">
                            <button type="submit"
                                    style="margin-right:10px;"
                                    title="Clear all introductions the character has done.">
                                Clear introduce
                            </button>
                            <input type="hidden" name="server" value="<?php echo $_GET['server']; ?>" />
                            <input type="hidden" name="charid" value="<?php echo $charid; ?>" />
                            <input type="hidden" name="action" value="char_clear_name" />
                            <input type="hidden" name="clear" value="introduce" />
                        </form>
                        <form id="delete_form" name="delete_form" method="post" action="de_char_details.php" style="float:left">
                            <button type="submit"
                                    style="margin-right:10px;"
                                    title="Clear both the known names and the introductions. The character will become fully unknown.">
                                Clear both
                            </button>
                            <input type="hidden" name="server" value="<?php echo $_GET['server']; ?>" />
                            <input type="hidden" name="charid" value="<?php echo $charid; ?>" />
                            <input type="hidden" name="action" value="char_clear_name" />
                            <input type="hidden" name="clear" value="all" />
                        </form>
                        <div style="clear: both" ></div>
                    </td>
                </tr>
            <?php endif; ?>
			<tr>
				<td style="width:150px">Race:</td>
				<td><?php echo IllarionData::getRaceName($chardata['chr_race']); ?></td>
			</tr>
			<tr>
				<td style="width:150px">Gender:</td>
				<td><?php echo IllarionData::getSexName($chardata['chr_sex']); ?></td>
			</tr>
			<tr>
				<td style="height:10px;" />
			</tr>
			<tr>
				<td style="width:150px">Birthday:</td>
				<td><?php echo $chardata['ply_dob']['day'].". ". $month_names[$chardata['ply_dob']['month']-1]." ".($chardata['ply_dob']['year']>0 ? $chardata['ply_dob']['year'].' AW' : (-$chardata['ply_dob']['year']).' BW' ); ?></td>
			</tr>
			<tr>
				<td style="width:150px">Age:</td>
				<td><?php echo $chardata['ply_dob']['age']; ?> years</td>
			</tr>
			<tr>
				<td style="width:150px">Body height:</td>
				<td><?php echo $chardata['ply_body_height']; ?></td>
			</tr>
			<tr>
				<td style="width:150px">Weight:</td>
				<td><?php echo $chardata['ply_weight']; ?></td>
			</tr>
			<tr>
				<td style="height:10px;" />
			</tr>
		</tbody>
	</table>
	<?php if ($server == 'illarionserver'): ?>
	<table style="padding-left: 20px;">
		<tbody>
			<tr>
				<td>
					<a href="<?php echo Page::getURL(); ?>/community/account/us_char_settings.php<?php echo $chardata['ident']; ?>" onclick="myLightWindow.activateWindow({href:this.href,height:180,width:350,title:'Settings of <?php echo str_replace("'", "\\'", $chardata['chr_name'] ); ?>'});return false;">
						Edit the settings of this character
					</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="<?php echo Page::getURL(); ?>/community/account/us_char_picture.php<?php echo $chardata['ident']; ?>" onclick="myLightWindow.activateWindow({href:this.href,height:410,width:400,title:'Picture of <?php echo str_replace("'", "\\'", $chardata['chr_name'] ); ?>'});return false;">
						Upload or delete the picture
					</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="<?php echo Page::getURL(); ?>/community/account/us_char_description.php<?php echo $chardata['ident']; ?>">
						Edit the description of the character
					</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="<?php echo Page::getURL(); ?>/community/account/us_char_story.php<?php echo $chardata['ident']; ?>">
						Edit the story of that character
					</a>
				</td>
			</tr>
		</tbody>
	</table>
	<?php endif; ?>
</div>

<div style="height: 30px"></div>

<div style="text-align:left;">
	<p>
		<b>Strength (<?php echo $chardata['ply_strength']; ?>)</b><br />
		<?php
			switch(max( 1, min( 6, ceil( $chardata['ply_strength'] / 4 ) ) ))
			{
				case 1: echo 'You have a hard time carrying your own weight. Being able to load yourself with more than the clothing on your back is a dream of your weak body.'; break;
				case 2: echo 'You are able to carry your bag, but it should not be fully packed.<br />During longer walks you need a breather every now and then.'; break;
				case 3: echo 'You are just as strong as any person your age should be without daily training.<br />You cannot lift heavy things, but all in all, you have no problem with carrying most common things.'; break;
				case 4: echo 'You are stronger than the average, lift heavy load quite easily.<br />Even a good, strong armour does not seem to cause a problem.'; break;
				case 5: echo 'You have brawns everywhere, you can lift even the things that others surrender to while merely looking at them.<br />However, your built-up stature requires you to buy special, wider clothings from your tailor or you would tear your clothing apart when flexing your muscles.'; break;
				case 6: echo 'Your strength is supernatural.'; break;
				default: echo 'Your strength is unknown.'; break;
			}
		?>
	</p>
	<p>
		<b>Constitution (<?php echo $chardata['ply_constitution']; ?>)</b><br />
		<?php
			switch(max( 1, min( 6, ceil( $chardata['ply_constitution'] / 4 ) ) ))
			{
				case 1: echo 'You are nearly always sick. You are literally a magnet for all kind of diseases, influenza and kind of known and unknown plagues.<br />Your fragile body nearly breaks with any wound. Broken arms and legs are nothing unusual for you.'; break;
				case 2: echo 'You cannot be considered as being really fit. Only an influenza can bring you down, thus you should take good care of your health. But with good care and some rest you will be up on your feet again.'; break;
				case 3: echo 'Your body is fit and can take some damage without giving up, and you can endure several illnesses without fearing for your life.'; break;
				case 4: echo 'As far as you remember, you have never been severely ill. With an influenza a hot soup always got you back on your feet without you having to rest for long.'; break;
				case 5: echo 'As long as you can remember you have never been ill, you body also seems to endure more stress than everyone else\'s.'; break;
				case 6: echo 'Your constition is supernatural.'; break;
				default: echo 'Your constition is unknown.'; break;
			}
		?>
	</p>
	<p>
		<b>Dexterity (<?php echo $chardata['ply_dexterity']; ?>)</b><br />
		<?php
			switch(max( 1, min( 6, ceil( $chardata['ply_dexterity'] / 4 ) ) ))
			{
				case 1: echo 'Your mind does not know what your hands are doing and vice versa. <br /> You a so clumsy that you constantly drop or break the things you are carrying in your hands. <br /> Nimble works and working with fragile materials is impossible for you.'; break;
				case 2: echo 'When handling tools you should in any case concentrate on your work, otherwise the risk of hurting yourself or others would be immense.'; break;
				case 3: echo 'You can use tools without any problems at all, unless it is a very difficult process.<br />When you throw a rock at a duck, you can almost be sure that it would land at least next to the spot you aimed at.'; break;
				case 4: echo 'You can handle tools quite well, learn quick how to use them and with a bit effort and work you are even able to produce some very nice pieces of work.'; break;
				case 5: echo 'You are more nimble than anyone you know. You can use your fingers to make filigree tasks with ease.<br />If you are able to see them, you can shoot the fleas from a dog\'s back with your sling.'; break;
				case 6: echo 'Your dexterity is supernatural.'; break;
				default: echo 'Your dexterity is unknown.'; break;
			}
		?>
	</p>
	<p>
		<b>Agility (<?php echo $chardata['ply_agility']; ?>)</b><br />
		<?php
			switch(max( 1, min( 6, ceil( $chardata['ply_agility'] / 4 ) ) ))
			{
				case 1: echo 'You are slow. Even snails appear as fast as a lightening next to you.<br />In a crowd you keep running into people.<br />You have problems to keep your balance.'; break;
				case 2: echo 'You are really not a sprinter, but with enough training you could at least gain some stamina.<br />Always keep your eyes open and directed straight forwards, because there is only little chance that you can dodge before running into something.'; break;
				case 3: echo 'You are not slow, but you aren\'t fast either. You are as fast as any other person as well.<br />If someone is throwing stones at you, you have a good chance to dodge them, if you notice them in time.'; break;
				case 4: echo 'You are pretty fast. Fast enough that you have good chances to outrun anyone.<br />An attack by suprirse will in most cases fail on you, since you can dodge very swiftly.'; break;
				case 5: echo 'You are the fastest runnter and you are even able to outdistance animals during the hunt.<br />Even if the sky would drop on your head you would have a pretty good chance to dodge.'; break;
				case 6: echo 'Your agility is supernatural.'; break;
				default: echo 'Your agility is unknown.'; break;
			}
		?>
	</p>
	<p>
		<b>Intelligence (<?php echo $chardata['ply_intelligence']; ?>)</b><br />
		<?php
			switch(max( 1, min( 6, ceil( $chardata['ply_intelligence'] / 4 ) ) ))
			{
				case 1: echo 'You have huge problems when it comes to using your brain. You cannot form complex sentences and even have trouble using more than one word at a time. <br />Reading and writing is something you will never learn.'; break;
				case 2: echo 'You are proud being able to phrase entire sentences, even if they are not really complex.<br />You can learn to read and write with a good amount of effort.'; break;
				case 3: echo 'You know everything you need to know in your everyday life. However you are still unable to understand huge and complex topics.<br />You could learn to read, if you were ever taught to.'; break;
				case 4: echo 'You are not dumb, rather cleverer than the average, even if not called a genius. You can achieve a lot with arguments.<br />You learned how to read and write quite easily and you have no problems to use those skills.'; break;
				case 5: echo 'You are clever, your brain is your power.<br />No matter what the task is, mathematics, poetry, literature, you can understand it within short time.<br />If you cannot read or write, it should not be that hard for you to learn it.'; break;
				case 6: echo 'Your intelligence is supernatural.'; break;
				default: echo 'Your intelligence is unknown.'; break;
			}
		?>
	</p>
	<p>
		<b>Willpower (<?php echo $chardata['ply_willpower']; ?>)</b><br />
		<?php
			switch(max( 1, min( 6, ceil( $chardata['ply_willpower'] / 4 ) ) ))
			{
				case 1: echo 'You are weak in your mind, so weak that even a child can make a servant of you.<br />You are always doing what others tell you.'; break;
				case 2: echo 'In general you know what you want, yet you can be easily convinced from the opposite simply through words. So you can easily be turned into a cue ball for everyone.'; break;
				case 3: echo 'You are no rock in a stormy night on the shore, but you can defend your own opinion quite well.'; break;
				case 4: echo 'You have no real problems to establish yourself, mainly achieve what you wish, although you might be influenced by good arguments.'; break;
				case 5: echo 'You are always in the centre when you enter a room, your charismatic way of speaking allows you to influence the opinions of others with much ease.<br />You almost always get what you want.'; break;
				case 6: echo 'Your willpower is supernatural.'; break;
				default: echo 'Your willpower is unknown.'; break;
			}
		?>
	</p>
	<p>
		<b>Perception (<?php echo $chardata['ply_perception']; ?>)</b><br />
		<?php
			switch(max( 1, min( 6, ceil( $chardata['ply_perception'] / 4 ) ) ))
			{
				case 1: echo 'You are blind as a mole, your view ends 1 meter in front of you. Even then, you have difficulties recognizing things and persons.<br />You are almost unable to hear, unless someone is shouting in your ear.'; break;
				case 2: echo 'You should evade the forest by night, otherwise it could happen that you try to lead a conversation with a tree stump.<br />Your sense of hearing is only acceptable if you can fully concentrate on the noises.'; break;
				case 3: echo 'Considering your race and your age, you see and hear as much as any normal person would.'; break;
				case 4: echo 'Not much can escape your sharp senses, your eyes are good and allow you to catch sight of far away things, but at night even your sight is a bit clouded.<br />Your sense of hearing is better than that of most others, even if you cannot hear the grass growing.'; break;
				case 5: echo 'Your eyes are sharp as nothing else. You can see far and much farther than those next to you.<br />Your senses allow you to hear, smell or feel better than those of the average man.'; break;
				case 6: echo 'Your perception is supernatural.'; break;
				default: echo 'Your perception is unknown.'; break;
			}
		?>
	</p>
	<p>
		<b>Essence (<?php echo $chardata['ply_essence']; ?>)</b><br />
		<?php
			switch(max( 1, min( 6, ceil( $chardata['ply_essence'] / 4 ) ) ))
			{
				case 1: echo 'You are like a lifeless shell, your eyes are dull and soulless.<br />There is nothing that might prevent your body from being a play thing to unnatural influences.'; break;
				case 2: echo 'You really have nothing to put against unnatural influences, even if you have the impression that there is something going on you don’t really like.'; break;
				case 3: echo 'You have been blessed with an inner shine, however it\'s no brighter than the one of the person next to you.<br />You can be influenced in unnatural way, but you are not completely defenseless.'; break;
				case 4: echo 'You can\'t hide your aura from many people.<br />Your intense nature most of the time prevents you from being taken into anybody’s unnatural ban.'; break;
				case 5: echo 'Somehow your aura shines brighter than those of others, like a single star in a deep, deep night.<br />This also prevents you from being unnaturally influenced most of the time.'; break;
				case 6: echo 'Your essence is supernatural.'; break;
				default: echo 'Your essence is unknown.'; break;
			}
		?>
	</p>
</div>

<div style="height: 30px"></div>

<p style="text-align:center;">
   <a href="<?php echo Page::getURL(); ?>/community/account/us_charlist.php">Back to overview</a>
</p>
