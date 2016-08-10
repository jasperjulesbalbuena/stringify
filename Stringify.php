<?php

class Stringify
{
	public function __construct($string)
	{
		/**
		* @param string
		*
		* return error message
		*
		*/
		if(!is_string($string))
		{
			return 'Cannot create string type of ' . gettype($string);
		}

		$this->string = $string;
	}

	/**
	* Append to string
	*
	* @param string
	* @return object
	*/	
	public function append($string)
	{
		return $this->string . $string;
	}

	/**
	* Convert a CamelCase string to snake_case
	*
	* @param string
	* @return object
	*/
	public function camelToSnake()
	{
		preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $this->string, $matches);
		
		//Force the variable to be passed by reference
		foreach ($matches[0] as &$match) 
		{
			$match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
		}
		
		return implode('_', $matches[0]);
	}

	/**
	* Uppercase every first letter of every word
	*
	* @param string
	* @return object
	*/
	public function capitalize()
	{
		$string = "";
		foreach(explode(" ", $this->string) as $value) {
			$string .= ' ' . ucfirst($value);
		}
		return $string;
	}

	/**
	* Name constructor
	*
	* @param string
	* @return object
	*/
	public function create($string)
	{
		return new static($string);
	}

	/**
	* HTML Entities
	*
	* @param  constant  $flags
	* @param  string    $encoding
	* @param  boolean   $doubleEncode
	* @return object
	*/
	public function htmlEntities($flags = ENT_HTML5, $encoding = 'UTF-8', $doubleEncode = true)
	{
		return htmlentities($this->string);
	}
}
