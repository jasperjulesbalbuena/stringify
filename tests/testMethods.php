<?php
	include '../src/Stringify.php';
	class Test extends PHPUnit_Framework_TestCase
	{
		public function test_appended()
		{
			$string = Stringify::create('Hello')->append(' World');
			$this->assertEquals('Hello World', $string);
		}

		public function test_camelToSnake()
		{
			$string = Stringify::create('Hello World')->camelToSnake();
			$this->assertEquals('hello_world', $string);
		}

		public function capitalize()
		{
			$string = Stringify::create('Hello WoRld')->capitalize();
			$this->assertEquals('Hello WoRld', $string);
		}

		public function create($string)
		{
			$string = Stringify::create('Hello World');
			$this->assertEquals('Hello World', $string);
		}
	}
?>