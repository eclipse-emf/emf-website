<?php
/**
  * A script that reads xml documents without the need of an external library
  * Useful for reading configuration data or content data, that would otherwise
  * have been placed in a db
  *
  * known bugs/limitations :
  *        + doesn't cope well with erraneous files - so be sure to validate
  *        + a lot of the special tags like doctype etc. aren't handled well
  *        + external doctype definitions are accepted though (but ignored)
  *        + methods and behaviour doesn't follow the W3C DOM specification correctly, although mostly.
  * usage :
  * <code>
  *        // open and read file
  *        $xml =& new xmlParser($filename);
  *        // parse document and return rootnode
  *        $doc =& $xml->getDocument();
  * </code>
  *
  * disclaimer :
  *        this piece of code is freely usable by anyone. if it makes your life better,
  *        remember me in your eveningprayer. if it makes your life worse, try doing it any
  *        better yourself.
  *
  * @version 4. aug. 04
  * @author troels@kyberfabrikken.dk
  * @download http://www.phpclasses.org/
  * @package xmllib
  */

/**
  * A generic implementation of a DOM node.
  * Somehow follows the specs at w3c
  * @see http://www.w3.org/TR/1998/REC-DOM-Level-1-19981001/
  * @package xmllib
  */
class Node
{
	/**
	  * Holds the attributes of the node
	  * @var array
	  * @access public
	  */
	var $attributes;

	/**
	  * Holds the children of the node
	  * @var array
	  * @access private
	  */
	var $children;

	/**
	  * The nodeName
	  * @var string
	  * @access private
	  */
	var $nodeName;

	/**
	  * The nodeType
	  * @var int
	  * @access private
	  */
	var $nodeType;

	/**
	  * Reference to parent node
	  * @var reference
	  * @access private
	  */
	var $parent;

	/**
	  * Internally used by the parser
	  * @var int
	  * @access private
	  */
	var $_end;

	/**
	  * Constructor
	  * @param string $nodeName The name of the node to construct
	  * @param int $nodeType The type of the node to construct.
	  * @see createChild
	  */
	function Node($nodeName='node', $nodeType=1)
	{
		$this->nodeName = $nodeName;
		$this->children = array();
		$this->attributes = array();
		$this->parent = null;
		$this->nodeType = $nodeType; // 1=element
	}

	/**
	  * Factorymethod.
	  * Constructs a child node, and returns it.
	  * @param string $nodeName The name of the node to construct
	  * @param int $nodeType The type of the node to construct.
	  * @return Node
	  */
	function &createChild($nodeName=null, $nodeType=1)
	{
		// create new instance of this class
		$params = ($nodeName == null) ? "();" : "(\$nodeName, \$nodeType);";
		$n=null;
		eval("\$n =& new ".get_class($this).$params);
		$this->appendChild($n);
		return $n;
	}

	/**
	  * @param Node $orphan The node to adopt
	  * @deprecated
	  * @see appendChild
	  */
	function adopt(&$orphan)
	{
		$this->appendChild($orphan);
	}

	/**
	  * Assigns a node as child to current node
	  * @param Node $orphan The node to adopt
	  */
	function appendChild(&$orphan)
	{
		$orphan->parent =& $this;
		$this->children[] =& $orphan;
		$this->children[count($this->children)-1];
	}

	/**
	  * Removes the child node indicated by oldChild from the list of children, and returns it.
	  * @param Node $orphan The node to adopt
	  * @returns Node
	  */
	function & removeChild(&$oldChild)
	{
		$_children = array();
		$notFound = true;
		for ($i=0;$i<count($this->children);$i++) {
			if ($oldChild !== $this->children[$i]) {
				$_children[] =& $this->children[$i];
				$notFound = false;
			}
		}
		if ($notFound) {
			trigger_error('oldChild is not a child of this node', E_USER_NOTICE);
			return null;
		}
		$this->children = $_children;
		$oldChild->parent = null;
		return $oldChild;
	}

	/**
	  * Replaces the child node oldChild with newChild in the list of children, and returns
	  * the oldChild node. If the newChild is already in the tree, it is first removed.
	  * @param Node $newChild The new node to put in the child list.
	  * @param Node $oldChild The node being replaced in the list.
	  * @returns Node The node replaced.
	  */
	function & replaceChild(&$newChild, &$oldChild)
	{
		$notFound = true;
		for ($i=0;$i<count($this->children);$i++) {
			if ($oldChild !== $this->children[$i]) {
				$this->children[$i] = null;
				$this->children[$i] =& $newChild;
				$newChild->parent =& $this;
				$notFound = false;
			}
		}
		if ($notFound) {
			trigger_error('oldChild is not a child of this node', E_USER_NOTICE);
			return null;
		}
		$oldChild->parent = null;
		return $oldChild;
	}

	/**
	  * Fetch the last childnode, or null
	  * @param string $nodeName If supplied, only nodes of that nodeName will be returned
	  * @return Node
	  */
	function &lastChild($nodeName=null)
	{
		if (count($this->children)==0)
			return null;
		if ($nodeName == null)
			return $this->children[count($this->children)-1];
		for ($i=count($this->children);$i>=0;$i--) {
			$c =& $this->children[$i];
			if (($nodeName == null) || ($c->nodeName == $nodeName))
				return $c;
		}
		return null;
	}

	/**
	  * Fetch the first childnode, or null
	  * @param string $nodeName If supplied, only nodes of that nodeName will be returned
	  * @return Node
	  */
	function &firstChild($nodeName=null)
	{
		if (count($this->children)==0)
			return null;
		if ($nodeName == null)
			return $this->children[0];
		for ($i=0;$i<count($this->children);$i++) {
			$c =& $this->children[$i];
			if (($nodeName == null) || ($c->nodeName() == $nodeName))
				return $c;
		}
		return null;
	}

	/**
	  * This is a convenience method to allow easy determination of whether a node has any children.
	  * @see hasChildNodes
	  * @return bool
	  */
	function hasChildren()
	{
		return (count($this->children)>0);
	}

	/**
	  * This is a convenience method to allow easy determination of whether a node has any children.
	  * @see hasChildren
	  * @return bool
	  */
	function hasChildNodes()
	{
		return $this->hasChildren();
	}

	/**
	  * Fetch array of childnodes.
	  * @param string $nodeName If supplied, only nodes of that nodeName will be returned
	  * @param string $nodeType If supplied, only nodes of that nodeType will be returned
	  * @see childNodes
	  * @return array
	  */
	function children($nodeName=null, $nodeType=null)
	{
		$ret = array();
		for ($i=0;$i<count($this->children);$i++) {
			$c =& $this->children[$i];
			if ((($nodeName == null) || ($c->nodeName() == $nodeName)) && (($nodeType == null) || ($c->nodeType() == $nodeType)))
				$ret[count($ret)] =& $c;
		}
		return $ret;
	}

	/**
	  * Alias for children()
	  * @see children
	  */
	function childNodes($nodeName=null, $nodeType=null)
	{
		return $this->children($nodeName, $nodeType);
	}

	/**
	  * Iterates through the nodes children, looking for the first node with specified id.
	  * @return Node
	  */
	function &getElementById($id)
	{
		if (isset($this->attributes['id']) && $this->attributes['id'] == $id)
			return $this;
		for ($i=0;$i<count($this->children);$i++) {
			$node =& $this->children[$i]->getElementById($id);
			if (is_object($node))
				return $node;
		}
		return null;
	}

	/**
	  * Finds the greatest used id + 1 (next free id)
	  * @return int
	  */
	function getCardinality()
	{
		$cardinal = 0;
		if (isset($this->attributes['id']))
			$cardinal = $this->attributes['id'] + 1;
		for ($i=0;$i<count($this->children);$i++) {
			$tmp = $this->children[$i]->getCardinality();
			if ($tmp > $cardinal)
				$cardinal = $tmp;
		}
		return $cardinal;
	}

	/**
	  * If the returned value is null, the node is the topmost (root)
	  * @deprecated
	  * @see parentNode
	  * @return Node
	  */
	function &parent()
	{
		return $this->parentNode();
	}

	/**
	  * If the returned value is null, the node is the topmost (root)
	  * @return Node
	  */
	function &parentNode()
	{
		return $this->parent;
	}

	/**
	  * Retrieves the name of the node
	  * @note In older versions of xmllib, nodeName was (wrongly) called type.
	  * @return string
	  */
	function nodeName()
	{
		return $this->nodeName;
	}

	/**
	  * Retrieves the type of the node
	  * @note In older versions of xmllib, nodeName was called type.
	  * @return int
	  */
	function nodeType()
	{
		return $this->nodeType;
	}

	/**
	  * Retrieves the named attribute.
	  * @note It's legal to accees $this->attributes directly, but this presents a more clean way of accomplishing it.
	  * @param string $name Name of the attribute to retrieve.
	  * @return string
	  */
	function getAttribute($name)
	{
		return (isset($this->attributes[$name])) ? $this->attributes[$name] : null;
	}

	/**
	  * Sets the value of the named attribute.
	  * @param string $name Name of the attribute to retrieve.
	  * @param string $value Value to assign to the node. Only scalar values are allowed.
	  * @return bool
	  */
	function setAttribute($name, $value)
	{
		if (!is_scalar($value)) {
			trigger_error("Only scalar values are allowed as attribute values.", E_USER_WARNING);
			return false;
		}
		$this->attributes[$name] = $value;
		return true;
	}

	/**
	  * Removes a named attribute
	  * @param string $name Name of the attribute to retrieve.
	  */
	function removeAttribute($name)
	{
		$_attributes = array();
		for ($i=0, $keys=array_keys($this->attributes); $i < count($keys); $i++) {
			if ($keys[$i] != $name)
				$_attributes[] = $this->attributes[$keys[$i]];
		}
		$this->attributes =& $_attributes;
	}

	/**
	  * Fetch the value of this node, depending on its type.
	  * @return string
	  */
	function nodeValue()
	{
		if (isset($this->attributes['value']))
			return $this->attributes['value'];
		if (count($this->children('#cdata-section')) == 1) {
			$n = $this->firstChild('#cdata-section');
			return $n->data;
		}
		if (count($this->children('#text')) == 1) {
			$n = $this->firstChild('#text');
			return $n->data;
		}
		return null;
	}

	/**
	  * Escape html-entities for flash
	  * For some reason flash doesn't seem to recognize the htmlentities
	  * for singlequote, lesser than and greater than
	  * @param string $str String to escape
	  * @return string
	  */
	function flash_escape($str)
	{
		$translation_table = array();
		$translation_table['&'] = '&amp;';
		$translation_table['"'] = '&quot;';
		$translation_table["'"] = '&#039;';
		$translation_table['<'] = '&#060;';
		$translation_table['>'] = '&#062;';
		return strtr($str, $translation_table);
	}

	/**
	  * Escapes string with different protocols
	  * Allowed values for translation param are :
	  *     + htmlentities
	  *     + htmlspecialchars
	  *     + addslashes
	  *     + flash_escape
	  * @param string $str String to escape
	  * @param string $translation The mode to translate the string by
	  * @return string
	  */
	function escape($str, $translation)
	{
		switch ($translation) {
			case 'flash_escape' : return Node::flash_escape($str);
			case 'addslashes' : return addslashes($str);
			case 'htmlspecialchars' : return htmlspecialchars($str);
			case 'htmlentities' : return htmlentities($str);
		}
		trigger_error("unknown translation : ".$translation, E_USER_WARNING);
		return $str;
	}

	/**
	  * decodes c-style slashes and html-entities (unicode ones too)
	  * @param string $str Encoded string
	  * @return string
	  */
	function unescape($str)
	{
		$translation_table = array_flip(get_html_translation_table(HTML_ENTITIES));
		$ret = strtr(stripslashes($str), $translation_table);
		return preg_replace('/&#(\d+);/me', "chr('\\1')",$ret);
	}

	/**
	  * Recursively transforms node into string
	  * @see escape
	  * @param bool $add_formatting If true, blocks get indented
	  * @param string $att_escape Translation to use.
	  * @param string $str String to escape
	  * @return string
	  */
	function toString($add_formatting=false, $att_escape='addslashes')
	{
		$indent = "";
		$toadd = "";
		$indent_minus_one = "";
		if ($add_formatting) {
			$toadd = "\n";
			for ($p = $this->parent(); $p != null; $p = $p->parent()) {
				if ($indent != "")
					$indent_minus_one .= "\t";
				$indent .= "\t";
			}
		}

		if ($this->nodeType() == 3) {
			return Node::escape($this->data, $att_escape);
		} else if ($this->nodeType() == 4) {
			if (strpos($this->data, '<![CDATA[') !== false) {
				trigger_error("illegal content. cdata-section can't contain the string : <![CDATA[", E_USER_WARNING);
			}
			if (strpos($this->data, ']]>') !== false) {
				trigger_error("illegal content. cdata-section can't contain the string : ]]>", E_USER_WARNING);
			}
			return $toadd.$indent."<![CDATA[".$this->data."]]>".$toadd.$indent_minus_one;
		} else if ($this->nodeType() == 8) {
			return $toadd.$indent."<!--".$this->data."-->".$toadd.$indent_minus_one;
		} else if ($this->nodeType() != 1) {
			trigger_error("unsupported nodetype : ".$this->nodeType(), E_USER_WARNING);
		}

		$a = "";
		foreach ($this->attributes as $name => $value) {
			$value = Node::escape($value, $att_escape);
			$a .= " ".$name."=\"".$value."\"";
		}
		if ((count($this->children) == 0)) {
			return $indent."<".$this->nodeName().$a." />";
		}
		$ret = $indent."<".$this->nodeName().$a.">";
		if ((count($this->children(null,1)) == 0)) {
			// only text/cdata nodes contained
			foreach ($this->children as $child) {
				$ret .= $child->toString($add_formatting, $att_escape);
			}
			$ret .= "</".$this->nodeName().">";
		} else {
			$ret .= $toadd;
			foreach ($this->children as $child) {
				$ret .= $child->toString($add_formatting, $att_escape);
				$ret .= $toadd;
			}
			$ret .= $indent."</".$this->nodeName().">";
		}
		return $ret;
	}

	/**
	  * Outputs document to browser, complete with header
	  * Param encoding works with :
	  *     + UTF-8
	  *     + ISO-8859-1
	  * but may work with other encodings too.
	  * @param string $encoding The document encoding.
	  */
	function dump($encoding='utf-8')
	{
		header ("Content-Type: application/xml");

		echo "<?xml version=\"1.0\" encoding=\"".$encoding."\" ?>\n";
		if ($encoding == 'utf-8') {
			echo utf8_encode($this->toString(true, 'flash_escape'));
		} else {
			echo $this->toString(true, 'flash_escape');
		}
	}

	/**
	  * Writes document to file
	  * @param string $filename The filename to write to
	  * @param string $encoding The document encoding.
	  */
	function toFile($filename, $encoding='utf-8')
	{
		$content = "<?xml version=\"1.0\" encoding=\"".$encoding."\" ?>\n";
		if ($encoding == 'utf-8') {
			$content .= utf8_encode($this->toString(true, 'flash_escape'));
		} else {
			$content .= $this->toString(true, 'flash_escape');
		}
		$fp = fopen($filename,'wb');
		fwrite($fp, $content);
		fclose($fp);
	}

	/**
	  * Makes a html decorated version of the document. Usefull for debugging.
	  * @see toString
	  * @return string Document as html-formatted string
	  */
	function toHtml()
	{
		return nl2br(str_replace('&lt;', '<strong>&lt;', str_replace('&gt;', '&gt;</strong>', str_replace("\t",'&#160;&#160;&#160;&#160;',htmlentities($this->toString(true, 'htmlentities'))))));
	}

	/**
	  * Translates the document into an associative array.
	  * @param Node $node From where to start the recursion. You shouldn't use this.
	  * @return array
	  */
	function toArray($node=null)
	{
		if ($node == null) $node = $this;
		if ((isset($node->attributes['type']) && ($node->attributes['type'] == 'array') || $node->nodeName() == 'array')) {
			$a = array();
			$c =& $node->children();
			for ($i=0; $i < count($c); $i++) {
				if (in_array($c[$i]->nodeType(), array(1,3,4))) {
					array_push($a, Node::toArray($c[$i]));
				}
			}
			return $a;
		}

		if (!$node->hasChildren()) {
			if (count($node->attributes)>0)
				return $node->attributes;
			return $node->nodeValue();
		}
		$a = array();
		$c =& $node->children();
		for ($i=0; $i < count($c); $i++) {
			if (in_array($c[$i]->nodeType(), array(1,3,4))) {
				$v = $c[$i]->nodeValue();
				if ($v !== null)
					$a[$c[$i]->nodeName()] = $v;
				else
					$a[$c[$i]->nodeName()] = Node::toArray($c[$i]);
			}
		}
		return $a;
	}
}

/**
  * The xml-parser. Used to parse a document into a tree of nodes.
  * @access public
  * @package xmllib
  */
class xmlParser
{
	/**
	  * @access private
	  */
	var $parse_stack;

	/**
	  * @access private
	  */
	var $data;

	/**
	  * @access private
	  */
	var $encoding;

	/**
	  * @access private
	  */
	var $casefolding;

	/**
	  * Constructor
	  * @param string $filename If a filename is given, the document will be loaded and prepared
	  * @param boolean $casefolding If true, uppercase nodenames and attributenames are converted to lowercase
	  */
	function xmlParser($filename=null, $casefolding=false)
	{
		$this->casefolding = $casefolding;
		if (is_string($filename)) {
			$this->loadFromFile($filename);
		}
	}

	/**
	  * Loads and prepares a file
	  * @param string $filename name of the file
	  */
	function loadFromFile($filename)
	{
		if (!function_exists('file_get_contents')) {
			$fp = fopen($filename,'rb');
			$size = filesize($filename);
			$contents = fread($fp,$size);
			fclose($fp);
		} else $contents = file_get_contents($filename);
		$this->loadFromString($contents);
	}

	/**
	  * Loads a xml-document and prepares the parsing
	  * @param string $contents the document
	  */
	function loadFromString($contents)
	{
		$this->parse_stack = array();

		// find xml opening tag
		$pos1 = strpos($contents, "<?xml");
		if ($pos1 === false) {
			trigger_error ("not xml", E_USER_ERROR);
		}
		// find xml opening tag terminator
		$pos2 = strpos($contents, "?>");
		if ($pos2 === false) {
			trigger_error ("not xml", E_USER_ERROR);
		}
		// find the encoding
		$xml_att = substr($contents, $pos1, $pos2);
		$pos3 = strpos($xml_att, "encoding=\"");
		if ($pos3 === false) {
			$this->encoding = "utf-8";
		} else {
			$xml_att_enc = substr($xml_att, $pos3+10, $pos2);
			$pos4 = strpos($xml_att_enc, "\"");
			if ($pos3 === false) {
			} else {
				$this->encoding = strtolower(substr($xml_att_enc, 0, $pos4));
			}
		}

		if ($this->encoding == "utf-8") {
			$contents = utf8_decode($contents);
			$pos2 = strpos($contents, "?>");
		}

		// strip xml opening tag
		$this->data = substr($contents, $pos2+2);


		// find doctype tag if any
		$pos = strpos($this->data, "<!DOCTYPE");
		if ($pos !== false) {
			// find doctype tag terminator
			$pos = strpos($this->data, ">");
			if ($pos === false) {
				trigger_error ("xml parse error", E_USER_ERROR);
			}
			$this->data = substr($this->data, $pos+1);
		}
	}

	/**
	  * Parses the loaded document
	  * @returns Node The rootnode of the document
	  */
	function getDocument()
	{
		$tags = $this->parse_tags();
		return $this->parse_tree($tags);
	}

	/**
	  * @access private
	  */
	function stack_push($nodeName, $pos,  $a_begin)
	{
		$nodeName = strtolower($nodeName);
		if (!isset($this->parse_stack[$nodeName]) || ($this->parse_stack[$nodeName] == null))
			$this->parse_stack[$nodeName] = array();
		$t = new Tag($nodeName);
		$t->begin = $pos;
		$t->a_begin = $a_begin;
		array_push($this->parse_stack[$nodeName], $t);
	}

	/**
	  * @access private
	  */
	function stack_pop($nodeName, $pos)
	{
		$nodeName = strtolower($nodeName);
		if (($this->parse_stack[$nodeName] == null) || (count($this->parse_stack[$nodeName])==0))
			trigger_error("xml_malformed unmatched closing tag [tag=".$nodeName." pos=".$pos."]", E_USER_ERROR);

		$t = array_pop($this->parse_stack[$nodeName]);
		$t->end = $pos;
		return $t;
	}

	/**
	  * @access private
	  */
	function cmp($a, $b)
	{
		if ($a->begin == $b->begin) return 0;
		return ($a->begin > $b->begin) ? 1 : -1;
	}

	/**
	  * eh .. a hack really ... but it works, so who cares
	  * @access private
	  */
	function add_textnode($textnode_begin, $textnode_end)
	{
		$t = new Tag('#text');
		$t->nodeType = 3;
		$t->begin = $textnode_begin+1;
		$t->end = $textnode_end-1;
		$t->data = Node::unescape(substr($this->data, $textnode_begin, $textnode_end - $textnode_begin));
		$t->begin;
		return $t;
	}

	/**
	  * @access private
	  */
	function parse_tags()
	{
		$valid = array(	'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','-','_',':',
				'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		$parse_tags = array();
		$len = strlen($this->data);
		$textnode_begin = -1;
		for ($i=0;$i<$len;$i++) {
			$n = $i+1;
			if (substr($this->data, $i, 9) == '<![CDATA[') {
				if ($textnode_begin > -1) {
					array_push($parse_tags, $this->add_textnode($textnode_begin, $i));
					$textnode_begin = -1;
				}
				$t = new Tag('#cdata-section');
				$t->nodeType = 4;
				$t->begin = $i+9;
				for ($i=$t->begin;substr($this->data, $i, 3) != ']]>';$i++) ;
				$t->end = $i;
				$i=$i+2;
				$t->data = substr($this->data, $t->begin, $t->end - $t->begin);
				array_push($parse_tags, $t);
			} else if (substr($this->data, $i, 4) == '<!--') {
				if ($textnode_begin > -1) {
					array_push($parse_tags, $this->add_textnode($textnode_begin, $i));
					$textnode_begin = -1;
				}
				$t = new Tag('#comment');
				$t->nodeType = 8;
				$t->begin = $i+4;
				for ($i=$t->begin;substr($this->data, $i, 3) != '-->';$i++) ;
				$t->end = $i;
				$i=$i+2;
				$t->data = substr($this->data, $t->begin, $t->end - $t->begin);
				array_push($parse_tags, $t);
			} else if (($this->data{$i} == '<') && ($n<$len) && ($this->data{$n} == '/')) {
				if ($textnode_begin > -1) {
					array_push($parse_tags, $this->add_textnode($textnode_begin, $i));
					$textnode_begin = -1;
				}
				// closing tag
				$n++;
				for ($c=$this->data{$n++},$nodeName=''; in_array($c, $valid); $c=$this->data{$n++}) $nodeName .= $c;
				array_push($parse_tags, $this->stack_pop($nodeName, $i-1));
				$i = $n-1;
			} else if ($this->data{$i} == '<') {
				if ($textnode_begin > -1) {
					array_push($parse_tags, $this->add_textnode($textnode_begin, $i));
					$textnode_begin = -1;
				}
				// opening tag
				for ($c=$this->data{$n++},$nodeName=''; in_array($c, $valid); $c=$this->data{$n++}) $nodeName .= $c;
				for ($a=$n--;($this->data{$n}!='>') && !(($this->data{$n-1}=='/') && ($this->data{$n}=='>')); $n++) { ; }	// this part holds the attributes
				if ($this->casefolding) $nodeName = strtolower($nodeName);
				if ($this->data{$n-1} == '/') {
					// single-style closing
					$t = new Tag($nodeName);
					$t->begin = $n+1;
					$t->end = $n+1;
					$t->a_begin = $a;
					array_push($parse_tags, $t);
				} else {
					$this->stack_push($nodeName, $n+1, $a);
				}
				$i = $n;
			} else if ($textnode_begin == -1 && (ord($this->data{$i}) > 32)) {
				$textnode_begin = $i;
			}
		}
		usort($parse_tags, array('xmlParser', 'cmp'));
		return $parse_tags;
	}

	/**
	  * @access private
	  */
	function loadAttributes(&$node, $data)
	{
		$escapes=0;
		if ($node->nodeType != 1)
			return ;
		$valid = array(	'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','-','_',':',
				'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		$len = strlen($data);
		$name = null;
		$value = null;
		for ($i=0;$i<$len;$i++) {
			if ($value === null) {	// reading name
				if ($data{$i} == '=') {	// end of name
					$value = '';
					$escapes = 0;
					$i++;	// skip opening quote
				} else if (in_array($data{$i}, $valid)){	// add to name
					if ($name === null) $name = $data{$i};
					else $name .= $data{$i};
				}
			} else {		// reading value
				if ($data{$i} == "\\")
					$escapes++;
				if ($data{$i} == "\"" && ($escapes == 0)) {	// closing quote
					if ($this->casefolding) $name = strtolower($name);
					$node->attributes[$name] = Node::unescape($value);
					$name = null;
					$value = null;
				} else {	// add to value
					$value .= $data{$i};
				}
				if ($data{$i-1} == "\\")
					$escapes--;
			}
		}
	}

	/**
	  * @access private
	  */
	function parse_tree($tags)
	{
		for ($r=null, $i=0; $i<count($tags); $i++) {
			if ($r == null) {
				$r = $tags[$i]->toNode();
				$r->_end = strlen($this->data);
				if ($tags[$i]->a_begin != $tags[$i]->begin)
					$this->loadAttributes(&$r, substr($this->data, $tags[$i]->a_begin, ($tags[$i]->begin - $tags[$i]->a_begin)-1));
				$p =& $r;
			} else {
				$n = $tags[$i]->toNode();
				if ($tags[$i]->a_begin != $tags[$i]->begin)
					$this->loadAttributes(&$n, substr($this->data, $tags[$i]->a_begin, ($tags[$i]->begin - $tags[$i]->a_begin)-1));
				while ($p->_end < $tags[$i]->begin)
					$p =& $p->parent;
				$n->parent =& $p;
				array_push($p->children, $n);
				$p =& $p->lastChild();
			}
		}
		return $r;
	}
}

/**
  * Used by the parser, as an intermediate before becomming a node
  * @access private
  * @package xmllib
  */
class Tag
{
	var $nodeName;
	var $begin;
	var $end;
	var $a_begin;

	function Tag($nodeName)
	{
		$this->nodeName = $nodeName;
		$this->nodeType = 1;
		$this->data = null;
	}

	function toNode()
	{
		$n = new Node($this->nodeName);
		$n->nodeType = $this->nodeType;
		$n->_end = $this->end;
		$n->data = $this->data;
		return $n;
	}
}
?>