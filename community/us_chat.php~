<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php' );
   create_header( 'Illarion - Chat',
                  'This page contains a Java IRC applet that allows to access the Illarion Chatroom',
                  'Chat, IRC', '', '', '', true );
   include_header();
?>

<h1>Illarion IRC Chat</h1>

<h2>Hints</h2>

<p>On this page is a Java Applet that establishes a connection to the Quakenet IRC
Servernetwork and enters the Illarion Chatroom. In this chat the
<a href="<?php echo $url; ?>/illarion/us_rules.php">rules of Illarion</a> as well as
the rules of <a href="http://www.quakenet.org/">Quakenet</a> apply.</p>

<p>In case you want to use a different IRC client you may use this informations</p>
<dl>
	<dt>Server:</dt>
	<dd>irc.quakenet.org</dd>
	<dt>Channel:</dt>
	<dd>#illarion</dd>
</dl>

<p><span style="color:#F00;font-weight:bold;">Important:</span> When the applet
loads up first time its needs to confirm the certificate the applet is signed with.
Only in case you confirm you allowed to use the applet. Most browsers will rate
this as insecure, but the certificate isn't any trouble. </p>

<h2>Chat</h2>

<!--[if !IE]>-->
<object classid="java:EIRC.class" type="application/x-java-applet" style="width:100%;height:400px;">
	<param name="archive" value="EIRC.jar,EIRC-gfx.jar" />
	<param name="server" value="irc.quakenet.org" />
	<param name="mainbg" value="#000000" />
	<param name="mainfg" value="#B9C0FF" />
	<param name="textbg" value="#000000" />
	<param name="textfg" value="#B9C0FF" />
	<param name="selbg" value="#000000" />
	<param name="selfg" value="#B9C0FF" />
	<param name="channel" value="#illarion" />
	<param name="titleExtra" value="Illarion - EIRC" />
	<param name="username" value="illaplayer" />
	<param name="realname" value="Illarion Player" />
	<param name="nickname" value="<?php echo ( IllaUser::loggedIn() ? IllaUser::$name : 'Guest????' ); ?>" />
	<param name="login" value="1" />
	<param name="language" value="en" />
	<param name="country" value="US" />
<!--<![endif]-->
	<object classid="clsid:8AD9C840-044E-11D1-B3E9-00805F499D93" style="width:100%;height:400px;">
		<param name="archive" value="EIRC.jar,EIRC-gfx.jar" />
		<param name="code" value="EIRC" />
		<param name="server" value="irc.quakenet.org" />
		<param name="mainbg" value="#000000" />
		<param name="mainfg" value="#B9C0FF" />
		<param name="textbg" value="#000000" />
		<param name="textfg" value="#B9C0FF" />
		<param name="selbg" value="#000000" />
		<param name="selfg" value="#B9C0FF" />
		<param name="channel" value="#illarion" />
		<param name="titleExtra" value="Illarion - EIRC" />
		<param name="username" value="illaplayer" />
		<param name="realname" value="Illarion Player" />
		<param name="nickname" value="<?php echo ( IllaUser::loggedIn() ? IllaUser::$name : 'Guest????' ); ?>" />
		<param name="login" value="1" />
		<param name="language" value="en" />
		<param name="country" value="US" />
	</object>
<!--[if !IE]>-->
</object>
<!--<![endif]-->

<?php include_footer(); ?>
