<?php

// PSR-1

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
		if (!is_string($string)) {
			return 'Cannot create string type of ' . gettype($string);
		}
		$this->string = $string;
	}
	
	/**
	* @return string
	*/
    public function __toString()
    {
		return $this->string;
    }
	
	
	/**
	* Append to string
	*
	* @param string
	* @return object
	*/	
	public function append($string)
	{
		return new static($this->string . $string);
	}
	
	
	/**
	* Convert string to 1) camelCase, 2) ClassCase, 3) slug-case, 4) snake_case
	*
	* @param int
	* @return object
	*/
	public function changeCase($type = 1)
	{
		// 1 = camelCase, 2 = ClassCase, 3 = slug-case, 4 = snake_case
		preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $this->string, $matches);
		
		//Force the variable to be passed by reference
		foreach ($matches[0] as &$match) {
			$match = $match == strtoupper($match) ? strtolower($match) : ucfirst($match);
		}
		
		switch($type) {
			case 1:
				// first letter should be lowercase
				$matches[0][0] = strtolower($matches[0][0]);
				
				$delimiter = '';
				break; // precaution
			case 2:
				$delimiter = '';
				break; // precaution
			case 3:
				// all characters should be lowercase
				foreach ($matches[0] as $key => $value) {
					$matches[0][$key] = strtolower($value);
				}
				$delimiter = '-';
				break;
			case 4:
				// first letters should be lowercase
				foreach ($matches[0] as $key => $value) {
					$matches[0][$key] = strtolower($value);
				}
				
				$delimiter = '_';
				break; // precaution
		}
		
		return new static(implode($delimiter, $matches[0]));
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
	* Get the plural form of the noun based on the number of items
	*
	* @param array
	* @return object
	*/
	public function getPlural($array = [])
	{
		if (count($array) == 1) { // Return singular if array is equal to one
			return new static($this->string);
		}
		// Source: https://www.grammarly.com/handbook/grammar/nouns/3/plural-nouns/
		$plural = [
			'sheep', 'moose'
		];
		$exceptions = [
			'roof' => 'roofs'
		];
		$plurable = [
			's' => 'ses',
			'f' => 'ves',
			'fe' => 'ves',
			'y' => 'ies',
			'o' => 'oes',
			'us' => 'i',
			'is' => 'es',
			'on' => 'a',
		];
		
		if( in_array(strtolower($this->string), $plural) ) { // sheep, moose
			$return = $this->string;
		}
		else if( array_key_exists(strtolower(substr($this->string, -2)), $plurable) ) { // fe, us, is, on
			$return = substr($this->string, 0, -2) . $plurable[substr($this->string, -2)];
		}
		else if( array_key_exists(strtolower(substr($this->string, -1)), $plurable) ) {
			$return = substr($this->string, 0, -1) . $plurable[substr($this->string, -1)];
		}
		else if( array_key_exists(strtolower($this->string), $exceptions) ) {
			$return = $exceptions[strtolower($this->string)];
		}
		else {
			$return = $this->string . 's';
		}
		
		return new static($return);
	}
	
	
	/**
	* Assign ' or 's to corresponding noun
	*
	* @param string
	* @return object
	*/
	public function getPossessive()
	{
		return new static($this->string .= substr($this->string, -1) == 's' ? "'" : "'s");
	}
	
	
	/**
	* Prepend to string
	*
	* @param string
	* @return object
	*/	
	public function prepend($string = '')
	{
		return new static($string . $this->string);
	}
	
	/**
	* Replace/Remove string with set of characters
	*
	* @param string
	* @param string
	* @return object
	*/
	public function replace($string = '', $replacement = '')
	{
		return new static(str_replace($string, $replacement, $this->string));
	}
	
	/**
	* Append string by itself
	*
	* @param int
	* @return object
	*/
	public function replicate($iterations = 1)
	{
		if (!is_int($iterations)) {
			return 'Value must be an integer';
		}
		else if ($iterations <= 0 ) {
			return 'Value must be greater than 0';
		}
		
		$string = "";
		$ctr = 0;
		while ($ctr < $iterations) {
			$string .= trim($this->string);
			$ctr++;
		}
		
		return new static($string);
	}
	
	
	/**
	* Return the string.
	*
	* @return string
	*/
    public function toString()
    {
		return $this->string;
    }

	
	/**
	* Transform string to lower/upper case
	*
	* @param int $type
	* @param string $position
	* @return object
	*/
	public function transform($type = 1, $position = 0)
	{
		if ($type == 1) { // Lowercase
			try {
				if($position == 0) {
					return strtolower($this->string);
				}
				else if($position >= 1) {
					$position--; // So that counter starts at 1
					foreach (str_split($this->string) as $key => $value) {
						if ($position == $key) $this->string[$position] = strtolower($value);
					}
					return new static($this->string);
				}
			} catch (Exception $e) {
			}
		}
		else { // Uppercase
			try {
				if ($position == 0) {
					return strtoupper($this->string);
				}
				else if ($position >= 1) {
					$position--; // So that counter starts at 1
					foreach (str_split($this->string) as $key => $value) {
						if($position == $key) $this->string[$position] = strtoupper($value);
					}
					return new static($this->string);
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
	* @return string
	**/
	public function transformWords($type = 1, $position = 0)
	{
		$string = "";
		foreach (explode(" ", $this->string) as $value) {
			$string .= ' ' . Stringify::create($value)->transform($type, $position);
		}
		return new static($string);
	}
}
