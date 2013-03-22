<?php
/**
* XML Parser of the Illarion Homepage.
* This parser reads any XML file and put it into a easy accessible form for later usage.
*
* After parsing the XML data is stored in the variable $obj_data. So as example a file
* <root>
* 	<tag>1</tag>
*   <tag>2</tag>
* </root>
* You can access to root tag just by
* $xml->obj_data->root[0]
* Accessing the second "tag" tag works like:
* $xml->obj_data->root[0]->tag[1]
*
* @version $Id: xmlC.php 9156 2010-10-05 13:17:26Z nitram $
* @copyright Copyright (C) 1997 - 2010 Illarion e.V. All rights reserved.
* @author Martin Karing <nitram@illarion.org>
*/
class XmlC {
	/**
	* The raw text data that is parsed with this parser.
	*
	* @access private
	* @var string
	*/
	private $xml_data;
	
	/**
	* The data that is generated from parsing the XML files.
	*
	* @access public
	* @var object
	*/
	public $obj_data;
	
	/**
	* The currently used internal pointer of the parser.
	*
	* @access private
	* @var array
	*/
	private $pointer;
	
	/**
	* The charset used to read and parse the XML file.
	*
	* @access private
	* @var string
	*/
	private $charset;

	/**
	* The constructor of the XML parser. It prepares the parser to work properly.
	* Also it allows setting the charset used.
	*
	* @access public
	* @param string $used_charset The charset used to parse the xml file
	*/
	public function XmlC($used_charset = 'ISO-8859-1') {
		$this->charset = $used_charset;
	}

	/**
	* Set the XML data this parser is supposed to read. The data should contain
	* the string of the text that is written in the xml file that has to be
	* read.
	*
	* Proposed way to implement:
	* xml->Set_xml_data(file_get_contents('path/to/file.xml'));
	*
	* @access public
	* @param string $xml_data The xml data this parser is supposed to parse
	*/
	public function Set_xml_data(&$xml_data) {
		$this->index = 0;
		$this->pointer[] = &$this->obj_data;

		$this->xml_data = $xml_data;
		$this->xml_parser = xml_parser_create($this->charset);

		xml_parser_set_option($this->xml_parser, XML_OPTION_CASE_FOLDING, 0);
		xml_parser_set_option($this->xml_parser, XML_OPTION_SKIP_WHITE, 1);
		xml_parser_set_option($this->xml_parser, XML_OPTION_TARGET_ENCODING, $this->charset) .
		xml_set_object($this->xml_parser, $this);
		xml_set_element_handler($this->xml_parser, '_startElement', '_endElement');
		xml_set_character_data_handler($this->xml_parser, '_cData');

		xml_parse($this->xml_parser, $this->xml_data, true);
		xml_parser_free($this->xml_parser);
	}

	/**
	* Start element function for the XML parser. This function jumps
	* in any time a new XML tag starts.
	* For further details see the documentation of the php buildin parser.
	*
	* @access private
	*/
	private function _startElement($parser, $tag, $attributeList) {
		$object = new stdClass();
		foreach($attributeList as $name => $value) {
			$value = $this->_cleanString($value);
			$object->$name = $value;
		}
		$element = &$this->pointer[$this->index]->$tag;
		$element[] = $object;
		$size = count($element);
		$this->pointer[] = &$element[$size - 1];
		$this->index++;
	}

	/**
	* End element function for the XML parser. This function jumps
	* in any time a new XML tag ends.
	* For further details see the documentation of the php buildin parser.
	*
	* @access private
	*/
	private function _endElement($parser, $tag) {
		array_pop($this->pointer);
		$this->index--;
		if (!count($this->pointer[$this->index])) {
			$this->pointer[$this->index] == null;
		}
	}

	/**
	* CDATA element function for the XML parser. This function jumps
	* in any time a CDATA block is found.
	* For further details see the documentation of the php buildin parser.
	*
	* @access private
	*/
	private function _cData($parser, $data) {
		$cleaned = $this->_cleanString($data);
		if (strlen($cleaned)) {
			$this->pointer[$this->index] = $cleaned;
		}
	}

	/**
	* Function used to cleanup a string before its placed into the
	* Resulting object.
	*
	* @access private
	*/
	private function _cleanString($string) {
		return trim($string);
	}
}

?>