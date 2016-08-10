<?php
	include '..\src\Stringify.php';
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

		public function create($string)
		{
			$string = Stringify::create('Hello World');
			$this->assertEquals('Hello World', $string);
		}
		
		public function transform()
		{
			$string = Stringify::create('HELLO')->transform();
			$this->assertEquals('hello', $string);
			$string = Stringify::create('HELLO')->transform();
			$this->assertEquals('hello', $string);
		}
		
		public function transformWords()
		{
			$string = Stringify::create('HELLO WORLD')->transformWords();
			$this->assertEquals('hello world', $string);
		}
	}
?>
