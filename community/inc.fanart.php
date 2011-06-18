<?php
class Fanart
{
	private $xml_content = null;
	private $max_per_page = 32;
	private $major_group = '';

	static private $loaded_bundles = array();

	static public function getFanArt( $xml_file, $major_group = '' )
	{
		if ( !isset( self::$loaded_bundles[ $xml_file ] ) )
		{
			self::$loaded_bundles[$xml_file] = new Fanart( $xml_file, $major_group );
		}
		return self::$loaded_bundles[$xml_file];
	}

	function __construct( $xml_file, $major_group )
	{
		$file_path = Page::getRootPath().'/community/fanart/'.$xml_file;
		if ( !file_exists( $file_path ) )
		{
			echo 'Error requesting xml-file!';
			return;
		}
		$file_content = file_get_contents( $file_path );
		$this->xml_content = new XmlC( 'UTF-8' );
		$this->xml_content->Set_xml_data($file_content);
		$this->major_group = $major_group;
	}

	function fanart_table( $page, $hidden = false )
	{
		global $url;
		global $language;
		switch ($this->xml_content->obj_data->pics[0]->type[0])
		{
			case 'gallery':
				$picture = $this->xml_content->obj_data->pics[0]->picture;
				$pointer = 0;
				$start = ( $page - 1 ) * $this->max_per_page;
				$end = ( $page * $this->max_per_page ) - 1;
				$group_title = ($language=='de' ? $this->xml_content->obj_data->pics[0]->title[0]->de[0] : $this->xml_content->obj_data->pics[0]->title[0]->us[0]);
				while($pointer <= (count($picture) - 1))
				{
					$folder = '/fanart/'.$this->xml_content->obj_data->pics[0]->folder[0].'/';
					$pic = rawurlencode($picture[$pointer]->picfile[0]);
					$pic_name = (Page::isGerman() ? $picture[$pointer]->de[0] : $picture[$pointer]->us[0]);

					if ($pointer < $start || $pointer > $end || $hidden)
					{
						echo '<a href="',Page::getMediaURL(),$folder,$pic,'" title="',$pic_name,'--',$this->major_group,'--',$group_title,'" class="lightwindow" onclick="return false;" style="display:none"></a>';
						$pointer++;
						continue;
					}
					$thumb = rawurlencode($picture[$pointer]->thumb[0]);
					$imagesize = getimagesize(Page::getMediaRootPath().$folder.$picture[$pointer]->thumb[0]);

					echo '<div style="margin:3px;float:left;width:150px;height:100px;text-align:center;">';
					echo '<a href="',Page::getMediaURL(),$folder,$pic,'" title="',$pic_name,'--',$this->major_group,'--',$group_title,'" class="lightwindow" onclick="return false;">';
					echo '<img src="',Page::getMediaURL(),$folder,$thumb,'" alt="',$pic_name,'" height="100" width="',$imagesize[0],'" />';
					echo '</a>';
					echo '</div>';
					$pointer++;
				}
				if (!$hidden)
				{
					echo '<div style="clear:left;"></div>';
				}
				break;
			case 'story':
				$cnt = count($this->xml_content->obj_data->pics[0]->picture);
				$group_title = ($language=='de' ? $this->xml_content->obj_data->pics[0]->title[0]->de[0] : $this->xml_content->obj_data->pics[0]->title[0]->us[0]);
				$folder = '/fanart/'.$this->xml_content->obj_data->pics[0]->folder[0].'/';
				for($i=0;$i<$cnt;$i++)
				{
					$picture = $this->xml_content->obj_data->pics[0]->picture;
					$imagesize = getimagesize(Page::getMediaRootPath().$folder.$picture[$i]->picfile[0]);
					$pic = rawurlencode($picture[$i]->picfile[0]);
					$pic_name = (Page::isGerman() ? 'Bild ' : 'Picture ').($i+1);
					if ($i==( $page - 1 ) && !$hidden)
					{
						echo '<div style="text-align:center;margin:auto;">';
						echo '<a href="',Page::getMediaURL(),$folder,$pic,'" title="',$pic_name,'--',$this->major_group,'--',$group_title,'" class="lightwindow" onclick="return false;">';
						echo '<img src="',Page::getMediaURL(),$folder,$pic,'" alt="',$pic_name,'" height="',$imagesize[1],'" width="',$imagesize[0],'" />';
						echo '</a>';
						echo '</div>';
					}
					else
					{
						echo '<a href="',Page::getMediaURL(),$folder,$pic,'" title="',$pic_name,'--',$this->major_group,'--',$group_title,'" class="lightwindow" onclick="return false;" style="display:none"></a>';
					}
				}
				break;
		}
	}

	function show_random_pic( )
	{
		switch ($this->xml_content->obj_data->pics[0]->type[0]) {
			case 'gallery':
				$imagecnt = rand(0,count($this->xml_content->obj_data->pics[0]->picture)-1);
				$picture = $this->xml_content->obj_data->pics[0]->picture[$imagecnt];
				echo '<img src="',Page::getMediaURL(),'/fanart/',$this->xml_content->obj_data->pics[0]->folder[0],'/',rawurlencode($picture->thumb[0]),'" alt="',(Page::isGerman() ? $picture->de[0] : $picture->us[0]),'" />';
				break;
			case 'story':
				$picture = $this->xml_content->obj_data->pics[0]->prev_pic[0];
				echo '<img src="',Page::getMediaURL(),'/fanart/',$this->xml_content->obj_data->pics[0]->folder[0],'/',rawurlencode($picture),'" alt="Bild" />';
				break;
		}
	}

	function get_author( )
	{
		echo $this->xml_content->obj_data->pics[0]->author[0];
	}

	function get_title( )
	{
		if (Page::isGerman())
		{
			echo $this->xml_content->obj_data->pics[0]->title[0]->de[0];
		}
		else
		{
			echo $this->xml_content->obj_data->pics[0]->title[0]->us[0];
		}
	}

	function show_additional_content()
	{
		$picpack = false;
		$movpack = false;

		if (!IllaUser::loggedIn())
		{
			return;
		}
		if (is_array($this->xml_content->obj_data->pics[0]->picturepack) && !is_object($this->xml_content->obj_data->pics[0]->picturepack[0]) && strlen($this->xml_content->obj_data->pics[0]->picturepack[0]))
		{
			echo '<p>';
			$file = '/fanart/'.$this->xml_content->obj_data->pics[0]->folder[0].'/'.rawurlencode($this->xml_content->obj_data->pics[0]->picturepack[0]);
			if (is_file(Page::getMediaRootPath().$file) && is_readable(Page::getMediaRootPath().$file))
			{
				$size = round(filesize(Page::getMediaRootPath().$file)/1048576,2);
				if (Page::isGerman())
				{
					echo 'Alle Bilder zum herunterladen: ';
				}
				else
				{
					echo 'All pictures as download: ';
				}
				echo '<a href="',Page::getMediaURL(),$file,'">',$this->xml_content->obj_data->pics[0]->picturepack[0],' (ZIP, ',$size,'MB)</a>';
				$picpack = true;
			}
		}
		if (is_array($this->xml_content->obj_data->pics[0]->moviepack) && !is_object($this->xml_content->obj_data->pics[0]->moviepack[0]) && strlen($this->xml_content->obj_data->pics[0]->moviepack[0]))
		{
			$file = '/fanart/'.$this->xml_content->obj_data->pics[0]->folder[0].'/'.rawurlencode($this->xml_content->obj_data->pics[0]->moviepack[0]);
			if (is_file(Page::getMediaRootPath().$file) && is_readable(Page::getMediaRootPath().$file))
			{
				if ($picpack)
				{
					echo '<br />';
				}
				else
				{
					echo '<p>';
				}
				$size = round(filesize(Page::getMediaRootPath().$file)/1048576,2);
				if (Page::isGerman())
				{
					echo 'Videos zum herunterladen: ';
				}
				else
				{
					echo 'Movies as download: ';
				}
				echo '<a href="',Page::getMediaURL(),$file,'">',$this->xml_content->obj_data->pics[0]->moviepack[0],' (ZIP, ',$size,'MB)</a>';
				$movpack = true;
			}
		}
		if ($picpack || $movpack)
		{
			echo '</p>';
		}
	}

	function show_page_select( $page, $coll )
	{
		switch ($this->xml_content->obj_data->pics[0]->type[0])
		{
			case 'gallery':
				$img_amount = count($this->xml_content->obj_data->pics[0]->picture);
				if ($img_amount > $this->max_per_page)
				{
					echo '<div class="center">';
					$pages = ceil($img_amount/$this->max_per_page);
					for( $i=1;$i<=$pages;$i++ )
					{
						if ($page==$i)
						{
							echo '<a href="',Page::getURL(),'/community/',Page::getLanguage(),'_fanart.php?coll=',$coll,'&amp;page=',$i,'" class="current_page">';
						}
						else
						{
							echo '<a href="',Page::getURL(),'/community/',Page::getLanguage(),'_fanart.php?coll=',$coll,'&amp;page=',$i,'" class="page">';
						}
						echo $i,'</a>',"\n";
					}
					echo '</div>';
					echo '<br />';
				}
				echo '<div class="center">';
				echo '<a href="',Page::getURL(),'/community/',Page::getLanguage(),'_fanart.php">',( Page::isGerman() ? 'Zurück zur Übersicht' : 'Back to overview' ),'</a>';
				echo '</div>';
			break;
			case 'story':
            echo '<div class="center">';
            if (isset($this->xml_content->obj_data->pics[0]->picture[($page - 2)]))
				{
            	Page::setPrevPage( Page::getURL().'/community/'.Page::getLanguage().'_fanart.php?coll='.$coll.'&amp;page='.($page - 1) );
            }
				if (isset($this->xml_content->obj_data->pics[0]->picture[$page]))
				{
					Page::setNextPage( Page::getURL().'/community/'.Page::getLanguage().'_fanart.php?coll='.$coll.'&amp;page='.($page + 1) );
				}
            Page::navBarBottom();
			break;
		}
	}
}
?>