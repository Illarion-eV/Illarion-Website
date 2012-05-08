<?php
	ob_start();
	header('HTTP/1.0 200 OK');
   header('Content-type: text/css; charset=UTF-8');

   $lang = ( isset( $_GET['lang'] ) && $_GET['lang'] == 'us' ? 'us' : 'de' );

   function createBase64( $file )
   {
   	$size = getimagesize( $file );
		echo 'data:'.$size['mime'].';base64,'.base64_encode(file_get_contents( $file ));
   }
?>
body
{
	background-image: url(<?php createBase64( 'pics/background.jpg' ); ?>);
}

div.menu_title img {
	background-image: url(<?php createBase64( 'pics/'.$lang.'_navtitles.jpg' ); ?>);
}

h2,
th,
thead td,
input,
textarea,
button,
select option,
button.disabled,
input.disabled,
textarea.disabled,
select.disabled {
	background-image: url(<?php createBase64( 'pics/uebbg.jpg' ); ?>);
}

select, select.disabled {
	background-image: url(<?php createBase64( 'pics/silver.gif' ); ?>);
}

input.ajax_loading {
	background-image: url(<?php createBase64( 'pics/ajax-loading-small-invert.gif' ); ?>);
}

div.head_button div a {
	background-image: url(<?php createBase64( 'pics/'.$lang.'_buttons.png' ); ?>);
}

div.head_button div {
	background-image: url(<?php createBase64( 'pics/head_buttons.png' ); ?>);
}

div.footer_bar_left,
div.footer_bar_right {
	background-image: url(<?php createBase64( 'pics/footer_bar.jpg' ); ?>);
}

td.content {
	background-image: url(<?php createBase64( 'pics/pergament.jpg' ); ?>);
}

td.navi {
	background-image: url(<?php createBase64( 'pics/navibar_back.jpg' ); ?>);
}

div.menu_title {
	background-image: url(<?php createBase64( 'pics/nav_title_back.jpg' ); ?>);
}

td.vertical_border,
div#message_border_left,
div#message_border_right {
	background-image: url(<?php createBase64( 'pics/alodv.jpg' ); ?>);
}

td.horizontal_border,
div#message_border_top,
div#message_border_bottom {
	background-image: url(<?php createBase64( 'pics/alodh.jpg' ); ?>);
}

dl.messages dd.info {
	background-image: url(<?php createBase64( 'pics/background_message.png' ); ?>);
}

dl.messages dd.info ul {
	background-image: url(<?php createBase64( 'pics/message.gif' ); ?>);
}

dl.messages dd.error {
	background-image: url(<?php createBase64( 'pics/background_error.png' ); ?>);
}

dl.messages dd.error ul {
	background-image: url(<?php createBase64( 'pics/error.gif' ); ?>);
}

dl.messages dd.note {
	background-image: url(<?php createBase64( 'pics/background_notice.png' ); ?>);
}

dl.messages dd.note ul {
	background-image: url(<?php createBase64( 'pics/notice.gif' ); ?>);
}
<?php
	$output = ob_get_contents();
	ob_end_clean();

	$output = str_replace( array( "\n", "\r", "\t" ), '', $output );
	$output = str_replace( array(' {', '{ '), '{', $output );
	$output = str_replace( array(' }', '} '), '}', $output );
	$output = str_replace( ': ', ':', $output );

	$file_res = fopen( '/var/www/illarion/shared/pics/'.$lang.'_image_bundle.css', 'w' );
	fwrite( $file_res, $output );
	fclose( $file_res );

	echo $output;
?>