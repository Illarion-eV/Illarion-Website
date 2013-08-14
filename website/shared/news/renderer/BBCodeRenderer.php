<?php
namespace News\Renderer;

/**
 * This is the abstract renderer that implements the default implementation for the RSS Feed
 *
 * @package News\Renderer
 */
abstract class BBCodeRenderer implements Renderer {
    /**
     * @var \StringParser_BBCode The BBCode string parser instance of this renderer
     */
    protected $bbcode;

    /**
     * Create the BBCode renderer and initialize the default settings of the BBCode parser.
     */
    public function __construct() {
        $this->bbcode = new \StringParser_BBCode();
        $this->bbcode->addFilter(STRINGPARSER_FILTER_PRE, '\\News\\Renderer\\HTMLRenderer::convertLineBreaks');

        $this->bbcode->addParser(array ('block', 'inline', 'link', 'listitem'), 'htmlspecialchars');
        $this->bbcode->addParser(array ('block', 'inline', 'link', 'listitem'), 'nl2br');
        $this->bbcode->addParser('list', '\\News\\Renderer\\HTMLRenderer::stripContents');

        $this->bbcode->addCode('b', 'simple_replace', null, array('start_tag' => '<b>', 'end_tag' => '</b>'), 'inline', array('listitem', 'block', 'inline', 'link'), array());
        $this->bbcode->addCode('i', 'simple_replace', null, array('start_tag' => '<i>', 'end_tag' => '</i>'), 'inline', array('listitem', 'block', 'inline', 'link'), array());

        $this->bbcode->addCode ('url', 'usecontent?', '\\News\\Renderer\\HTMLRenderer::handleBBCodeURL', array('usecontent_param' => 'default'), 'link', array('listitem', 'block', 'inline'), array('link'));

        $this->bbcode->addCode('list', 'simple_replace', null, array('start_tag' => '<ul>', 'end_tag' => '</ul>'), 'list', array('block', 'listitem'), array());
        $this->bbcode->addCode('*', 'simple_replace', null, array('start_tag' => '<li>', 'end_tag' => '</li>'), 'listitem', array('list'), array());
        $this->bbcode->setCodeFlag('*', 'closetag', BBCODE_CLOSETAG_OPTIONAL);
        $this->bbcode->setCodeFlag('*', 'paragraphs', false);
        $this->bbcode->setCodeFlag('*', 'opentag.before.newline', BBCODE_NEWLINE_DROP);
        $this->bbcode->setCodeFlag('list', 'paragraph_type', BBCODE_PARAGRAPH_BLOCK_ELEMENT);
        $this->bbcode->setCodeFlag('list', 'opentag.before.newline', BBCODE_NEWLINE_DROP);
        $this->bbcode->setCodeFlag('list', 'closetag.before.newline', BBCODE_NEWLINE_DROP);
        $this->bbcode->setCodeFlag('url', 'paragraph_type', BBCODE_PARAGRAPH_ALLOW_INSIDE);
        $this->bbcode->setRootParagraphHandling(true);
        $this->bbcode->setParagraphHandlingParameters ("\n\n", '<p class="hyphenate">', '</p>');
    }

    /**
     * Process a url tag in BBCode.
     *
     * @param string $action the requested action ('validate' or 'output')
     * @param array $attributes the attributes supplied to the tag
     * @param string $content the content inside the tag
     * @param array $params additional parameters
     * @param \StringParser_BBCode_Node_Element $node_object the node element of the tag
     * @return bool|string true in case the validation was successful, false if not or the output string
     */
    public static function handleBBCodeURL($action, array $attributes, $content, array $params, \StringParser_BBCode_Node_Element $node_object) {
        if (!isset ($attributes['default'])) {
            $url = $content;
            $text = htmlspecialchars ($content);
        } else {
            $url = $attributes['default'];
            $text = $content;
        }
        if ($action == 'validate') {
            if (substr ($url, 0, 5) == 'data:' || substr ($url, 0, 5) == 'file:' || substr ($url, 0, 11) == 'javascript:' || substr ($url, 0, 4) == 'jar:') {
                return false;
            }
            return true;
        }
        return '<a href="'.htmlspecialchars ($url).'">'.$text.'</a>';
    }

    /**
     * This filter function is used to normalize the line breaks.
     *
     * @param string $text the text to process
     * @return string the filtered text
     */
    public static function convertLineBreaks($text) {
        return preg_replace ("/\015\012|\015|\012/", "\n", $text);
    }

    /**
     * This filter strips the text of all line breaks.
     *
     * @param string $text the text to filter
     * @return string the text without line breaks
     */
    public static function stripContents($text) {
        return preg_replace ("/[^\n]/", '', $text);
    }
}