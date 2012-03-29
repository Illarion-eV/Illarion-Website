<?php
include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

Page::setTitle( 'Creating Graphics' );
Page::setDescription( 'This page contains information about creating Illarion graphics' );
Page::setKeywords( array( 'Development', 'Graphics' ) );
Page::setXHTML();
Page::Init();
?>

<h1>Creating graphics for Illarion</h1>

<h2>Introduction</h2>

<p>The purpose of this page is to give basic instructions on how to
create graphics for Illarion should you be interested in helping us out.
Remember, Illarion is a free game and was build from scratch by unpaid
university students. We're unable to offer any remuneration to your work
besides credit and much appreciation. (It also makes a nice portfolio
piece!)</p>

<p>Graphics in Illarion are typically created using 3D modelling
software such as Maya or Blender. With specific rendering settings,
camera angles and lighting position, images of the 3D graphic are
rendered as PNG image and cropped out to then be implemented into the
game. All these steps will be given to you with this page.</p>

<h2>Content</h2>

<ul>
	<li><a href="#size">Image sizes and orientation</a></li>
	<li><a href="#result">Result image specifications</a></li>
	<li>Configuration instructions for 3D modelling applications
	<ul>
		<li><a href="#setup_maya">Autodesk Maya 2009</a></li>
	</ul>
	</li>
</ul>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="size"></a></div>
<h2>Image sizes and orientation</h2>

<p>In general, the weight in bytes of an image is unimportant. However,
the size and width must absolutely fit the width of a tile in Illarion
(see below image).</p>

<p style="text-align: center;"><img
	src="<?php echo Page::getURL(); ?>/general/karo.gif" alt="tile"
	height="37" width="76" /></p>

<p>When rendering a tile in your 3D modelling application without
anti-aliasing, every pixel of the outline must fit this example. If it
does, your camera settings are correct. These settings will be explained
below for most popular 3D-applications. The space between two levels in
the game is exactly 111 pixels (three the height of one tile).</p>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="result"></a></div>
<h2>Result image specifications</h2>

<p>The output image that is supposed to be used in the client has to
meet a few specifications. First of all it is needed that the image is
cut to perfect fit. So all rows or columns that consist of transparent
pixels around the image must be cut off. The only exception are
animations and variations.</p>

<p>A graphic can either contain a animation or a variation. Either way
there are multiple images showing the same image. Those images of one
object need to have the same dimension, even if that results in images
that are not cut to minimal size.</p>

<p>The resulting image itself, has to be a png that uses one of the
following colorspace settings:</p>

<ul>
	<li>24bit color and 8bit alpha channel</li>
	<li>24bit color</li>
	<li>8bit greyscale and 8bit alpha channel</li>
	<li>8bit greyscale</li>
</ul>

<?php Page::insert_go_to_top_link(); ?>

<h2>Configuration instructions for 3D modelling applications</h2>

<div><a id="setup_maya"></a></div>
<h3>Autodesk Maya 2009</h3>

<p>Follow these instructions in order to set up a proper render scene in
Autodesk Maya 2009:</p>

<ol>
	<li>In the main top menu, click on "Create", then select "Cameras",
	then select "Camera".</li>
	<li>A camera will appear in the origin of your stage. Select it. (It
	should be selected by default)</li>
	<li>In the smaller menu right above the scene, select "Panels" then
	select "Look though selected". You are now looking through the lens of
	the camera you selected (Feel free to rename it in the attributes
	selector on the right (CTRL+A)</li>
	<li>In the smaller menu right above the scene, select "View", then
	"Predefined Bookmarks" and finally "Perspective" to set your camera at
	the default perspective position. Be sure not to move, rotate or pan
	your camera at this point. If you do by accident, simply go back into
	"View", "Predefined Bookmarks" and "Perspective" again.</li>
	<li>On the right, in the attributes selector, find a tab that says
	"cameraShape1" (or the name of your camera followed by Shape). If you
	can not see said tabs, press CTRL+A to switch to the attribute editor.</li>
	<li>In the cameraShape tab, scroll down the options until you find
	"Orthographic views". Press the little triangle next to it to reveal
	its settings.</li>
	<li>The "orthographic" option should be unchecked by default. Check it
	if it's not. The Orthographic Width setting will light up so you can
	edit its value. Enter 5.7 as value then right-click on the text area
	where you wrote 5.7 and select "Lock Attribute". That makes it so you
	can not pan, rotate or move that camera anymore.</li>
</ol>

<p>If you need to move the camera again, instead of unlocking the
attribute and having to start all over again, simply right-click on the
little camera icon right under the "View" menu and choose "perspective"
or any other camera of your choice beside the one you've just set up.</p>

<p>Before you render however, or to preview what your object looks like
in the "Illarion orthographic cam" (that you've just set up), simply
right-click on the camera icon again and choose the camera you've set up
again. It must be the selected one before you render.</p>

<p>Ensure to render your scene with the resolution of 320x240. At this
resolution one default square on the Maya grid is the equivalent of an
Illarion tile.</p>

<p>It is suggested that you use Maya Software with Production Quality to
render. Also, depending on the cases, Maya's default "Box Filter" does a
good job at anti aliasing jagged edges.</p>

<p style="text-align: right;">Thanks to Karl Salameh for these
instructions.</p>

<?php Page::insert_go_to_top_link(); ?>
