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
}

echo Stringify::create('hello world!')->capitalize();

/*

htmlEntities($flags = ENT_HTML5, $encoding = 'UTF-8', $doubleEncode = true)

Manipulator::make('&')->htmlEntities();
// &amp;
htmlEntitiesDecode($flags = ENT_HTML5, $encoding = 'UTF-8')

Manipulator::make('&amp;')->htmlEntitiesDecode();
// &
htmlSpecialCharacters($flags = ENT_HTML5, $encoding = 'UTF-8', $doubleEncode = true)

Manipulator::make('&<>')->htmlSpecialCharacters();
// &amp;&lt;&gt;
lowercaseFirst

Manipulator::make('HELLO')->lowercaseFirst();
// hELLO
make($string)

// Named constructor
Manipulator::make('string');
pad($length, $string, $type = null)

Manipulator::make('Hello')->pad(2, '!!', STR_PAD_RIGHT);
// Hello!!
prepend($string)

Manipulator::make('is the one.')->prepend('Neo ');
// Neo is the one.
pluralize($items = null)

Manipulator::make('Potato')->pluralize();
// Potatoes
You can optionally pass an array or numeric value to pluaralize to determine if the given string should be pluaralized.

$dogs = ['Zoe', 'Spot', 'Pickles'];
Manipulator::make('Dog')->pluralize($dogs);
// Dogs

$cats = ['Whiskers'];
Manipulator::make('Cat')->pluralize($cats);
// Cat
remove($string, $caseSensitive = true)

Manipulator::make('Dog Gone')->remove('Gone');
// Dog
removeSpecialCharacters($exceptions = [])

Manipulator::make('Hello!!')->removeSpecialCharacters();
// Hello
Manipulator::make('Hello!!')->removeSpecialCharacters(['!']);
// Hello!!
repeat($multiplier = 1)

Manipulator::make('la')->repeat(3);
// lalala
replace($find, $replace = '', $caseSensitive = true)

Manipulator::make('Pickles are good.')->replace('good', 'terrible');
// Pickles are terrible.
reverse

Manipulator::make('Whoa!')->reverse();
// !aohW
snakeToCamel

Manipulator::make('snake_case')->snakeToCamel();
// snakeCase
snakeToClass

stripTags($allowed = '')

Manipulator::make('<i>Hello</i>')->stripTags();
// Hello
toCamelCase

Manipulator::make('camel case')->toCamelCase();
// camelCase
toLower

Manipulator::make('LOWER')->toLower();
// lower
toSlug

Manipulator::make('This is a slug!')->toSlug();
// this-is-a-slug
toSnakeCase

Manipulator::make('snake case')->toSnakeCase();
// snake_case
toString

This method just returns the string.

toUpper

Manipulator::make('upper')->toUpper();
// UPPER
trim

Manipulator::make('  trimmed  ')->trim();
// trimmed
trimBeginning

Manipulator::make('  trimmed')->trimBeginning();
// trimmed
trimEnd

Manipulator::make('trimmed  ')->trimEnd();
// trimmed
truncate($length = 100, $append = '...')

Manipulator:make('This is a sentence and will be truncated.')->truncate(10, '...');
// This is a ...
urlDecode

Manipulator::make('hello%21')->urlDecode();
// hello!
urlEncode

Manipulator::make('hello!')->urlEncode();
// hello%21

*/