<?php
	$last_mod = array();
	$last_mod[] = filemtime( $_SERVER['SCRIPT_FILENAME'] );

	$filenames = preg_split( '/,/', $_GET['file'] );

	foreach( $filenames as &$file )
	{
		if ( $file != '' )
		{
			$file .= ( $_GET['no_opti'] == 1 ? '_uncompressed.js' : '.js' );
			$last_mod[] = filemtime( $file );
		}
	}

	rsort( $last_mod );
	$last_mod = $last_mod[0];
	$if_last_mod = isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) ? strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) : 0;
	$if_not_match = isset($_SERVER['HTTP_IF_NONE_MATCH']) ? $_SERVER['HTTP_IF_NONE_MATCH'] : 0;
	$etag = md5( $last_mod );
	header('Last-Modified: ' . gmdate('D, d M Y H:i:s', $last_mod) . ' GMT');
	header('ETag: ' . $etag);
	if ( $if_last_mod >= $last_mod && $if_not_match == $etag )
	{
		header('HTTP/1.0 304 Not Modified');
		exit;
	}
	header("HTTP/1.0 200 OK");
	header('Content-type: text/javascript; charset: UTF-8');

	$content = '';
	$size = 0;
	foreach( $filenames as $file )
	{
		if ( $file != '' )
		{
			$size += filesize( $file );
			$content .= file_get_contents( $file );
		}
	}
	header('Content-Length: '.$size);
	echo $content;
?>