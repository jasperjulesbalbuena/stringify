# Stringify
A simple class to manipulate strings, Object-Oriented style. Inspired by Matt Sparks' <a href="https://github.com/mattsparks/the-stringler">the-stringler</a>. Tried to make my own and post it here.

# Methods
<h3>append($string)</h3>
```php
  Stringify::create('Hello')->append(' World!');
  // Hello World!
```

<h3>camelToSnake</h3>
```php
  Stringify::create('Hello World')->camelToSnake();
  // hello_world
```

<h3>create($string)</h3>
```php
  // Named constructor
  Stringify::create('Hello World')
```

<h3>toSlug</h3>
```php
  Stringify::create('Hello World')->toSlug();
  // hello-world
```

<h3>
```php
  string substr ( string $string , int $start [, int $length ] )
```
</h3>
```php
  Stringify::create('H
```

<h1>To be continued...</h1>
