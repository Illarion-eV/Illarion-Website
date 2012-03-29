<?php
	include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
	create_header( "Illarion - FAQ Graphic",
	"This page contains a praphical FAQ for Illarion.",
	"FAQ, Questions, Graphics" );
	include_header();
?>

<h2>
	<a class="float_left" href='/general/us_faq_technic.php'>Technical - FAQ</a>
	<a class="float_right" href='/general/us_faq_concept.php'>Game Concept - FAQ</a>
	<a class="clr" style="display:block;"></a>
</h2>

<h1>Graphics - FAQ</h1>

<h2>Contents</h2>

<ul>
	<li><a class="hidden" href="#1">Why this FAQ?</a></li>
	<li><a class="hidden" href="#2">Should all graphics be rendered with 3D software?</a></li>
	<li><a class="hidden" href="#3">What should the items look like?</a></li>
	<li><a class="hidden" href="#4">What size should the items have?</a></li>
	<li><a class="hidden" href="#5">What is this perspective you are talking about?</a></li>
	<li><a class="hidden" href="#6">How do I get my graphics to that perspective?</a></li>
	<li><a class="hidden" href="#7">I made some graphics, but I am not sure whether they are good
	enough or not. What should I do?</a></li>
	<li><a class="hidden" href="#8">Where can I find examples?</a></li>
	<li><a class="hidden" href="#9">Will I get paid?</a></li>
	<li><a class="hidden" href="#10">What colour should I paint the transparent	sections?</a></li>
	<li><a class="hidden" href="#11">Are there any other ways than painting, to help out with the
	graphics?</a></li>
	<li><a class="hidden" href="#12">Where can I find online-help/tutorials/... for <insert
	program>?</a></li>
</ul>

<?php insert_go_to_top_link(); ?>

<p><a name="1"></a></p>

<h2>Why this FAQ?</h2>

<p>The graphics needed for Illarion must live up to certain requirements, so we can implement
them easily. Some questions will arise during the process of making them, and we hope to cover
most of it with this FAQ.</p>

<?php insert_go_to_top_link(); ?>

<p><a name="2"></a></p>

<h2>Should all graphics be rendered with 3D rendering software?</h2>

<p>No, but it is useful (especially for monsters, characters and large items). With the 3D
model, you can</p>

<ul>
	<li>correct errors faster.</li>
	<li>the model can be used as base for another, similar character.</li>
	<li>animations become easier to make that way.</li>
	<li>you save time.</li>
</ul>

<p>But many items can be made without the use of such a program. These objects could be smaller
items where you can't see much difference between a rendered and a painted graphic
anyway.</p>

<?php insert_go_to_top_link(); ?>

<p><a name="3"></a></p>

<h2>What should the items look like?</h2>

<p>Item graphics are the same both on the map and in the inventory. They should not all be
upright, but rather adopt the position that makes them look most natural. Thus you should draw
the graphics in such a way, that they fit on the map, the inventory and look natural and nice to
you.</p>

<p>Larger items, with Approximately the same expansions in all three directions, should have the
right perspective (look below). Items like signs or swords expand only in one or two directions,
so the perspective is unimportant. Items like helmets should use the
perspective.</p>

<?php insert_go_to_top_link(); ?>

<p><a name="4"></a></p>

<h2>What size should the items have?</h2>

<p>There are two points to mention:</p>

<p>Normal items (Swords, items, armour, cloth, tools..., everything you can take with you)
should fit into the diamond-shaped tile. (Larger/longer objects, like long swords etc., may
overlap on adjacent tiles). Graphics are limited to 16 bit colours (Any larger ones will be
edited). This measure is to save disc space on our servers (so if your graphics look just as
nice in lesser colour depths, then please use those). The size difference in between items
should be realistic (e.g. a two handed sword should be larger than a finger ring). Rings and
other small items should be made a bit larger though, as they would otherwise be too small to
see. (Some objects, such as helmets, might also be a little bigger than one would expect, for
reasons of recognizability.)</p>

<p>Some graphics, such as characters, monsters, walls, trees etc., will of course be bigger than
the base-diamond. humans, for example, should have a height of about 90 pixels, elves 100,
halflings 60. We hope that some of you will help us with character renderings, and for such we
have readied this simple formula to calculate height. 2 centimeters = 1
pixel.</p>

<?php insert_go_to_top_link(); ?>

<p><a name="5"></a></p>

<h2>What is this perspective you are talking about?</h2>

<p>This is about the in game view mode. Tiles are based on the diamond shape; see the sample
tiles to see what I mean.</p>

<p><img src="karo.gif" alt="tile" height="37" width="76" /></p>

<?php insert_go_to_top_link(); ?>

<p><a name="6"></a></p>

<h2>How do I get my graphics to fit that perspective?</h2>

<p>With a 3d-graphic programs, you set the camera with a very high focal length (or ideally,
e.g. in 3d s max, use orthogonal projection) to avoid distance-effects (far objects tend to be
smaller than close objects... this shouldn't be the case here!). To find the correct
position of the camera, place a square somewhere in the scene, render the image and compare it
to e.g. a field of 2*2 tiles (diamonds) in a 2d-gfx-program (photoshop, paint shop pro...). If
the rendered diamond is too small, the camera is too far away; if it is too broad, the camera is
too far away and has to be placed higher etc.With a little bit of three dimensional thinking and
intuition, you'll surely find a way to place the camera correctly .</p>

<p>Some words about the lightning: objects that appear mainly on the ground (walls, trees)
should look "natural", as if it were on a warm summer's day. To achieve this I use
a parallel, yellowish light coming from right above the camera and pointing towards the
rendering image, as well as a dark blue (weak) ambient light (to simulate scattered light from
the sky...). Have a look at the sample pictures/screenshots to check if your lightning effects
fit into the ones used in the game.</p>

<p>For other items, i usually use a second, weak (white), light to get some nice shine/shadow
effects (e.g. on the blade of a sword or on a shield).</p>

<p>Turn off (or remove manually) the anti aliasing against the
background.</p>

<?php insert_go_to_top_link(); ?>

<p><a name="7"></a></p>

<h2>I made some graphics, but I am not sure whether they are good enough. What should I do?</h2>

<p>There are several options:</p>

<ul>
	<li>You can put them up on a web page, and post a link on the graphics board in theforums</li>
	<li>You can mail them to <a href="mailto:martin.polak@reflex.at?subject=Illarion-Grafiken">me</a>.</li>
	<li>You can basically send it to any person working on Illarion, for a review.</li>
</ul>

<?php insert_go_to_top_link(); ?>

<p><a name="8"></a></p>

<h2>Where Can I find sample graphics?</h2>

<p>Have a look in the screenshot section, or ask for it on the boards, if you need something
particular.</p>

<?php insert_go_to_top_link(); ?>

<p><a name="9"></a></p>

<h2>Will I get paid?</h2>

<p>No. The Illarion project was started by three students, and they cannot pay you for your
work. By sending us the graphics, you grant us all rights to use and edit the graphics at our
own discretion. Once you have granted us this right, you cannot take it back at a later time. Do
not send us Copyrighted graphics made by third party people
.</p>

<?php insert_go_to_top_link(); ?>

<p><a name="10"></a></p>

<h2>What colour should I paint the transparent sections?</h2>

<p>Anything you wish not to appear in the game (i.e. the surrounding space of an item), should
be of the colour pink. precisely: RGB 255 0 255. This is because the server will see that
particular colour as "invisible". For example, a sword graphic should be surrounded by
that precise colour, to avoid any colours appearing around the graphic. Be aware that any
smearing or blur effects will change these colour settings, so do check before you send us your
graphics. This also applies to lines and resizes, if you use anti
aliasing.</p>

<?php insert_go_to_top_link(); ?>

<p><a name="11"></a></p>

<h2>Are there other ways than painting, to help with graphics?</h2>

<p>YES, there are. Making and designing graphics takes a lot of time. And afterwards, all these
graphic pieces have to be cut out of their back grounds, to make them Illarion server
"friendly" and that is quite easy to do. Furthermore it does not require any special
skills/programs. If you feel you want to help us with this, then just post it on the boards.</p>

<p>Feel free to post any of your remaining questions on the graphics board in the forums. And
don't be afraid to ask questions, it will only help us better this
FAQ.</p>

<?php insert_go_to_top_link(); ?>

<p><a name="12"></a></p>

<h2>Where can I find online-help/tutorials/... for <insert program>?</h2>

<p>In general it should be mentioned, that there can be found a lot of different tutorials etc.
(with different level and quality) on the internet. Some of them deal with a certain program
(e.g. 3D Studio Max), others are more general ("How to model a human head?").</p>

<p>Many of these sites are not online very long for different reasons and therefore I do not
recommend too many sites here. To find more information just use *the* search engine: <a href=
"http://www.google.com" rel="external">http://www.google.com</a> (Hint: If you do not know
google or do not know how to use google properly, learn it as soon as possible! Probably you do
not use the web very effectively!)</p>

<p>Another area I recommend, are newsgroups. Some of them deal with graphics/programs and they
are always a source of good information. However, better read the archive of the group first
before you ask a question which was asked a million times before. A lot of group-regulars will
start flaming you a little bit otherwise. To search the archives of newsgroups, use google
again: <a href="http://groups.google.com/" rel="external">http://groups.google.com/</a> or
<a href="http://groups.google.com/advanced_group_search"  rel="external">http://groups.google.com/advanced_group_search</a>.</p>

<p>Here are some special links:</p>

<p>General tutorials, textures, models and links (about 3D Studio Max, Maya, Lightwave, ...)</p>

<ul>
	<li><a href="http://www.3dcafe.com/asp/default.asp"  rel="external">http://www.3dcafe.com/asp/default.asp</a></li>
	<li><a href="http://www.3dcafe.com/asp/default.asp"  rel="external">http://www.3dspline.com/modeling-tuts.htm</a></li>
	<li><a href="http://www.3dlinks.com/" rel="external">http://www.3dlinks.com/</a></li>
	<li><a href="http://www.renderosity.com/"  rel="external">http://www.renderosity.com/</a></li>
</ul>

<p>3D Studio Max tutorials, textures, models ...</p>

<ul>
	<li><a href="http://www.3dluvr.com/content/"  rel="external">http://www.3dluvr.com/content/</a></li>
	<li><a href="http://www.maxforums.org/tutorial.asp"  rel="external">http://www.maxforums.org/tutorial.asp</a></li>
	<li><a href="http://www.maxplugins.de/" rel="external">http://www.maxplugins.de/</a></li>
	<li><a href="http://go.to/maxfaq" rel="external">http://go.to/maxfaq</a></li>
	<li><a href="http://3dmodelworld.com/maxlinks.asp"  rel="external">http://3dmodelworld.com/maxlinks.asp</a></li>
</ul>

<p>Poser (misc)</p>

<ul>
	<li><a href="http://www.hallofheads.com/html/tutorials.htm"  rel="external">http://www.hallofheads.com/html/tutorials.htm</a></li>
	<li><a href="http://www.propsguild.com/files/index.html"  rel="external">http://www.propsguild.com/files/index.html</a></li>
</ul>

<p>Paint Shop Pro</p>

<ul>
	<li><a href="http://www.jasc.com/" rel="external">http://www.jasc.com/</a></li>
</ul>

<p>Rhino</p>

<ul>
	<li><a href="http://www.rhino3d.com/training.htm"  rel="external">http://www.rhino3d.com/training.htm</a></li>
</ul>

<p>2D Art</p>

<ul>
	<li><a href="http://www.polykarbon.com/" rel="external">http://www.polykarbon.com/</a></li>
	<li><a href="http://elfwood.lysator.liu.se/elfwood.html"  rel="external">http://elfwood.lysator.liu.se/elfwood.html</a></li>
	<li><a href="http://elfwood.lysator.liu.se/farp/"  rel="external">http://elfwood.lysator.liu.se/farp/</a></li>
	<li><a href="http://www.simgoddesses.com/tutorials/painting_tut/byl_painttut.html"  rel="external">http://www.simgoddesses.com/tutorials/painting_tut/byl_painttut.html</a></li>
	<li><a href="http://www.steeldolphin.com/resources_tutsites.php"  rel="external">http://www.steeldolphin.com/resources_tutsites.php</a></li>
</ul>

<?php insert_go_to_top_link(); ?>

<?php include_footer(); ?>