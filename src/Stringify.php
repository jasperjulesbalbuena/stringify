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
	* Convert sentence to slug
	*
	* @return object
	*/
	public function toSlug()
	{
		return strtolower(str_replace(' ', '-', trim($this->string)));
	}

	/**
	* Transform string to lower/upper case
	*
	* @param int $type
	* @param string $position
	* @return object
	*/
	public function transform($type = 1, $position = 'all')
	{
		if( $type == 0 ) { // Lowercase
			try {
				if($position == 'all') {
					return strtolower($this->string);
				}
				else if($position >= 1) {
					$position--; // So that counter starts at 1
					foreach(str_split($this->string) as $key => $value) {
						if($position == $key) $this->string[$position] = strtolower($value);
					}

					return $this->string;
				}
			} catch (Exception $e) {

			}
		}
		else { // Uppercase
			try {
				if($position == 'all') {
					return strtoupper($this->string);
				}
				else if($position >= 1) {
					foreach(str_split($this->string) as $key => $value) {
						if($position == $key) $this->string[$position] = strtoupper($value);
					}

					return $this->string;
				}
			} catch (Exception $e) {
				
			}
		}
	}

	/**
	* Transform words to lower/upper case
	*
	* @param int $type
	* @param string $position
	* @return object
	**/
	public function transformWords($type = 1, $position = 'all') {
		$string = "";

		foreach(explode(" ", $this->string) as $value) {
			$string .= ' ' . Stringify::create($value)->transform($type, $position);
		}

		return $string;
	}
}

