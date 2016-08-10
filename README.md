# Stringify
A simple class to manipulate strings, Object-Oriented style. Inspired by Matt Sparks' <a href="https://github.com/mattsparks/the-stringler">the-stringler</a>. Tried to make my own and post it here.

# Methods
<h3>string append($string)</h3>
```php
  Stringify::create('Hello')->append(' World!');
  // Hello World!
```


<h3>string changeCase([, int $type = 1])</h3>
```php
  Stringify::create('Hello World')->changeCase(1); // camelCase
  // helloWorld
  Stringify::create('Hello World')->changeCase(2); // ClassCase
  // HelloWorld
  Stringify::create('Hello World')->changeCase(3); // slug-case
  // hello-world
  Stringify::create('Hello World')->changeCase(4); // snake_case
  // hello_world
```


<h3>string create($string)</h3>
```php
  // Named constructor
  Stringify::create('Hello World')
```


<h3>string getPlural([, array $array = []])</h3>
```php
  Stringify::create('wife')->getPlural();
  // wives
  Stringify::create('wife')->getPlural(['Paula']);
  // wife
  Stringify::create('wife')->getPlural(['Paula', 'Diane']);
  // wives
```


<h3>string getPossessive()</h3>
```php
  Stringify::create('Jay')->getPossessive();
  // Jay's
  Stringify::create('Jess')->getPossessive();
  // Jess'
```


<h3>string prepend([, string $string = ''])</h3>
```php
  Stringify::create('Sabater')->prepend('Jay ');
  // Jay Sabater
```


<h3>string replace([, string $string = '', string $replacement = ''])</h3>
```php
  Stringify::create('Hello World')->replace('World');
  // Hello
  Stringify::create('Hello World')->replace('World', 'Jay');
  // Hello Jay
```


<h3>string replicate([, int $iterations = 1])</h3>
```php
  Stringify::create('Hello ')->prepend(2);
  // Hello Hello 
```


<h3>string toString</h3>
This method just returns the string.


<h3>string transform([, int $type = 1, int $position = 0])</h3>
```php
  Stringify::create('HELLO')->transform();
  // hello
  Stringify::create('hello')->transform(2);
  // HELLO
  Stringify::create('HELLO')->transform(1, 1);
  // hELLO
```


<h3>string transformWords([, int $type = 1, int $position = 0])</h3>
```php
  Stringify::create('HELLO WORLD')->transformWords();
  // hello world
  Stringify::create('hello world')->transform(2);
  // HELLO WORLD
  Stringify::create('HELLO WORLD')->transform(1, 1);
  // hELLO wORLD
```


<h1>To be continued...</h1>
