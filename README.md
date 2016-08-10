# Stringify
A simple class to manipulate strings, Object-Oriented style. Inspired by Matt Sparks' <a href="https://github.com/mattsparks/the-stringler">the-stringler</a>. Tried to make my own and post it here.

# Methods
<h3>string append($string)</h3>
```php
  Stringify::create('Hello')->append(' World!');
  // Hello World!
```

<h3>string camelToSnake</h3>
```php
  Stringify::create('Hello World')->camelToSnake();
  // hello_world
```

<h3>string create($string)</h3>
```php
  // Named constructor
  Stringify::create('Hello World')
```

<h3>string toSlug</h3>
```php
  Stringify::create('Hello World')->toSlug();
  // hello-world
```

<h3> string transform ( int $type [, string $position] ) </h3>
```php
  Stringify::create('HELLO')->transform();
  // hello
  Stringify::create('HELLO')->transform(0, 1);
  // hELLO
  Stringify::create('hello')->transform(1, 1);
  // Hello
```

<h3> string transformWords ( int $type [, string $position] ) </h3>
```php
  Stringify::create('HELLO WORLD')->transformWords();
  // hello world
  Stringify::create('HELLO')->transformWords(0, 1);
  // hELLO wORLD
  Stringify::create('hello')->transformWords(1, 1);
  // Hello World
```

<h1>To be continued...</h1>
