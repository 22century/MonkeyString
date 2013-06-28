<?php
/**
 * Monkey String Library
 *
 * 参考:
 * https://developer.mozilla.org/ja/docs/Web/JavaScript/Reference/Global_Objects/String
 *
 * @author 22century
 * @license MIT License
 */

namespace Monkey;

class MonkeyString {

	/** @var integer (readonly) */
	private $length = 0;

	/** @var string */
	private $value;

	/**
	 * get
	 * @param string $propertyName
	 * @return integer
     */
    public function __get($propertyName) {
		if ($propertyName === 'length') {
			self::_setLength();
			return $this->length;
		} else {
			trigger_error("Cannot access private property {$propertyName}.");
		}
        return null;
	}

	/**
	 * construct
	 * @param string $thing
     */
    public function __construct($thing){
		if (is_string($thing)) {
			$this->value = $thing;
		} else {
			$this->value = '';
		}
		self::_setLength();
	}

	/**
	 * set length
	 * @return void
	 */
	private function _setLength(){
		$this->length = mb_strlen($this->valueOf());
	}

	/**
	 * is empty
	 * @param string $thing
	 * @return boolean
	 */
	private function _isEmpty($thing){
		if (is_string($thing) && !is_null($thing)) {
			return $thing === '';
		} else {
			return false;
		}
	}

	/**
	 * is function
	 * @param object $object
	 * @return boolean
	 */
	private function _isFunction($object){
		if (is_string($object) && function_exists($object)) {
			return true;
		} else if (is_callable($object)) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * string to array
	 * @param string $str
	 * @return array
	 */
	private function _str2Array($str){
		if (self::_isEmpty($str)) {
			return array();
		}
		$maches = array();
		preg_match_all('/./u', $str, $maches);
		if (isset($maches[0])) {
			return $maches[0];
		} else {
			return $maches;
		}
	}

	/**
	 * charAt
	 * @param integer $index
	 * @return integer
	 */
	public function charAt($index = 0){
		return mb_substr($this->valueOf(), $index, 1);
	}

	/**
	 * charCodeAt
	 * @param integer $index
	 * @return integer
	 */
	public function charCodeAt($index = 0){
		$char = mb_substr($this->valueOf(), $index, 1);
		$ent  = mb_convert_encoding($char, 'HTML-ENTITIES');
		if (ctype_alpha($ent) || is_numeric($ent)) {
			return ord($ent);
		} else {
			return preg_replace('/[^\d]/u', '', $ent);
		}
	}

	/**
	 * concat
	 * @param string
	 * @return string
	 */
	public function concat(){
		$args = func_get_args();
		$value = $this->valueOf();
		if (isset($args[0])) {
			$value .= implode('', $args);
			return $value;
		} else {
			return $value;
		}
	}

	/**
	 * contains
	 * @param string $searchString
	 * @return boolean
	 */
	public function contains($searchString){
		if (self::_isEmpty($searchString)) {
			return true;
		}
		return (strpos($this->valueOf(), $searchString) !== false);
	}

	/**
	 * endsWith
	 * @param string $searchString
	 * @param integer $position
	 * @return boolean
	 */
	public function endsWith($searchString, $position = null){
		if ($position === null) {
			$string = $this->valueOf();
		} else {
			$string = mb_substr($this->valueOf(), 0, $position);
		}
		return !!preg_match('/'. $searchString .'$/u', $string);
	}

	/**
	 * indexOf
	 * @param string $searchValue
	 * @param integer $fromIndex
	 * @return integer
	 */
	public function indexOf($searchValue, $fromIndex = 0){
		if (self::_isEmpty($searchValue)) {
			return 0;
		}
		$index = mb_strpos($this->valueOf(), $searchValue, $fromIndex);
		if ($index === false) {
			return -1;
		} else {
			return $index;
		}
	}

	/**
	 * lastIndexOf
	 * @param string $searchValue
	 * @param integer $fromIndex
	 * @return integer
	 */
	public function lastIndexOf($searchValue, $fromIndex = 0){
		if (self::_isEmpty($searchValue)) {
			return mb_strlen($this->valueOf());
		}
		$index = mb_strrpos($this->valueOf(), $searchValue, $fromIndex);
		if ($index === false) {
			return -1;
		} else {
			return $index;
		}
	}

	/**
	 * localeCompare
	 * @param string $compareString
	 * @return integer
	 */
	public function localeCompare($compareString){
		$result = strnatcasecmp($this->valueOf(), $compareString);
		if ($result === 0 && $this->valueOf() !== $compareString) {
			return 1;
		} else {
			return $result * 2;
		}
	}

	/**
	 * match
	 * @param string $regexp
	 * @return array
	 */
	public function match($regexp){
		$matches = array();
		preg_match_all($regexp, $this->valueOf(), $matches, PREG_SET_ORDER);
		if (isset($matches[0])) {
			return $matches[0];
		} else {
			return null;
		}
	}

	/**
	 * quote
	 * @return string
	 */
	public function quote(){
		return json_encode($this->valueOf());
	}

	/**
	 * replace
	 * @param string $regexp
	 * @param string $newSubStr
	 * @return string
	 */
	public function replace($regexp, $newSubStr){
		if (!self::_isEmpty($newSubStr))
		{
			if (self::_isFunction($newSubStr)) {
				return preg_replace_callback($regexp , $newSubStr , $this->valueOf());
			} else {
				return preg_replace($regexp, $newSubStr, $this->valueOf());
			}
		}
		return $this->valueOf();
	}

	/**
	 * search
	 * @param string $regexp
	 * @return integer
	 */
	public function search($regexp){
		$matches = array();
		if (preg_match($regexp, $this->valueOf(), $matches, PREG_OFFSET_CAPTURE)) {
			return $matches[0][1];
		} else {
			return -1;
		}
	}

	/**
	 * slice
	 * @param integer $beginslice
	 * @param integer $endSlice
	 * @return string
	 */
	public function slice($beginslice, $endSlice){
		if ($endSlice > 0) {
			$endSlice = $endSlice - $beginslice;
		}
		return mb_substr($this->valueOf(), $beginslice, $endSlice);
	}

	/**
	 * split
	 * @param string $separator
	 * @param integer $limit
	 * @return array
	 */
	public function split($separator, $limit = null){
		$ary = array();
		if ($separator === '') {
			$ary = self::_str2Array($this->valueOf());
		} else {
			$ary = explode($separator, $this->valueOf());
		}
		if ($limit !== null) {
			array_splice($ary, $limit);
		}
		return $ary;
	}

	/**
	 * startsWith
	 * @param string $searchString
	 * @param integer $position
	 * @return boolean
	 */
	public function startsWith($searchString, $position = null){
		if ($position === null) {
			$string = $this->valueOf();
		} else {
			$string = mb_substr($this->valueOf(), $position, mb_strlen($this->valueOf()));
		}
		return !!preg_match('/^'. $searchString .'/u', $string);
	}

	/**
	 * substr
	 * @param string $start
	 * @param integer $length
	 * @return string
	 */
	public function substr($start, $length = null){
		if ($length === null) {
			return mb_substr($this->valueOf(), $start);
		} else {
			if ($length < 0) {
				return '';
			} else {
				return mb_substr($this->valueOf(), $start, $length);
			}
		}
	}

	/**
	 * substring
	 * @param string $indexA
	 * @param string $indexB
	 * @return string
	 */
	public function substring($indexA, $indexB){
		if ($indexA < 0) $indexA = 0;
		if ($indexB < 0) $indexB = 0;

		if ($indexA < $indexB) {
			$indexB = $indexB - $indexA;
			return mb_substr($this->valueOf(), $indexA, $indexB);
		} else {
			$indexA = $indexA - $indexB;
			return mb_substr($this->valueOf(), $indexB, $indexA);
		}
	}

	/**
	 * toLowerCase
	 * @return string
	 */
	public function toLowerCase(){
		return mb_strtolower($this->valueOf());
	}

	/**
	 * toUpperCase
	 * @return string
	 */
	public function toUpperCase(){
		return mb_strtoupper($this->valueOf());
	}

	/**
	 * toString
	 * @return string
	 */
	public function toString(){
		return $this->value;
	}

	/**
	 * trim
	 * @return string
	 */
	public function trim(){
		return preg_replace('/^[\s　]*([^\s　]*)[\s　]*$/u', '$1', $this->valueOf());
	}

	/**
	 * trimLeft
	 * @return string
	 */
	public function trimLeft(){
		return preg_replace('/^[\s　]*([^\s　]*)/u', '$1', $this->valueOf());
	}

	/**
	 * trimRight
	 * @return string
	 */
	public function trimRight(){
		return preg_replace('/([^\s　]*)[\s　]*$/u', '$1', $this->valueOf());
	}

	/**
	 * valueOf
	 * @return string
	 */
	public function valueOf(){
		return $this->value;
	}

}
