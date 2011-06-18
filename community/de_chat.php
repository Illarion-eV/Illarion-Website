<?php
   include_once ( $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php' );
   create_header( 'Illarion - Chat',
                  'Diese Seite enthält ein IRC Java Applet mit dem der Zugang zum Illarion IRC Channel möglich ist',
                  'Chat, IRC', '', '', '', true );
   include_header();
?>

<h1>Illarion IRC Chat</h1>

<h2>Hinweise</h2>

<p>Auf dieser Seite wird ein Java Applet geladen, welches eine Verbindung zum Quakenet
IRC Servernetzwerk herstellt und automatisch dem Illarion Chat betritt. In diesem Chat
gelten sowohl die <a href="<?php echo $url; ?>/illarion/de_rules.php">Regeln von
Illarion</a> als auch die Regeln von <a href="http://www.quakenet.org/">Quakenet</a>.
</p>

<p>Solltest du einen anderen IRC Client verwenden wollen sind das die nötigen
Zugangsdaten:</p>
<dl>
	<dt>Server:</dt>
	<dd>irc.quakenet.org</dd>
	<dt>Channel:</dt>
	<dd>#illarion</dd>
</dl>

<p><span style="color:#F00;font-weight:bold;">Wichtig:</span> Wenn das Applet zum
ersten Mal geladen wird, muss das Zertifikat mit dem das Applet unterschrieben wurde
bestätigt werden. Nur wenn es angenommen wird, kann dieses Applet verwendet werden. Auch
wenn die meisten Browser dieses Zertifikat als unsicher einstufen werden, wird davon
keine Gefahr ausgehen.</p>

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
	<param name="username" value="illaspieler" />
	<param name="realname" value="Illarion Spieler" />
	<param name="nickname" value="<?php echo ( IllaUser::loggedIn() ? IllaUser::$name : 'Gast????' ); ?>" />
	<param name="login" value="1" />
	<param name="language" value="de" />
	<param name="country" value="DE" />
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
		<param name="username" value="illaspieler" />
		<param name="realname" value="Illarion Spieler" />
		<param name="nickname" value="<?php echo ( IllaUser::loggedIn() ? IllaUser::$name : 'Gast????' ); ?>" />
		<param name="login" value="1" />
		<param name="language" value="de" />
		<param name="country" value="DE" />
	</object>
<!--[if !IE]>-->
</object>
<!--<![endif]-->

<?php include_footer(); ?>
