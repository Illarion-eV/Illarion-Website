<?php
/**
 * JavaScript Builder
 * Main Class to build some default JavaScript Blocks
 *
 */
class JSBuilder
{
	/**
	 * Generate a Javascript function to open a lightwindow
	 *
	 * @param	string	Target URL for the lightwindow. If set to false this.href is used
	 * @param	string	Title of the lightwindow
	 * @param	int	Width of the lightwindow
	 * @param	int	Height of the lightwindow
	 * @param	bool	if true the string is returned, if false the string is echoed
	 *
	 * @return	string	the string in case the last parameter was set to false, else null
	**/
	public static function Lightwindow_activate( $customURL = false, $title = '', $width = 0, $height = 0, $return = false )
	{
		$output = 'if(document.getElementById(\'lightwindow\')!=null){myLightWindow.activateWindow({href:';
		if ( $customURL )
		{
			$output.= '\''.$customURL.'\'';
		}
		else
		{
			$output.= 'this.href';
		}
		if (strlen( $title ) > 0)
		{
			$output .= ',title:\''.str_replace( '\'', '\\\'', $title ).'\'';
		}
		if ( $width > 0 )
		{
			$output .= ',width:'.$width;
		}
		if ( $height > 0 )
		{
			$output .= ',height:'.$height;
		}
		$output .= '});};return false;';

		if ( $return )
		{
			return $output;
		}
		else
		{
			echo $output;
		}
	}
}