[![Latest Stable Version](https://img.shields.io/packagist/v/loophp/combinator.svg?style=flat-square)](https://packagist.org/packages/loophp/combinator)
 [![GitHub stars](https://img.shields.io/github/stars/loophp/combinator.svg?style=flat-square)](https://packagist.org/packages/loophp/combinator)
 [![Total Downloads](https://img.shields.io/packagist/dt/loophp/combinator.svg?style=flat-square)](https://packagist.org/packages/loophp/combinator)
 [![GitHub Workflow Status](https://img.shields.io/github/workflow/status/loophp/combinator/Continuous%20Integration?style=flat-square)](https://github.com/loophp/combinator/actions)
 [![Scrutinizer code quality](https://img.shields.io/scrutinizer/quality/g/loophp/combinator/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/loophp/combinator/?branch=master)
 [![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/loophp/combinator/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/loophp/combinator/?branch=master)
 [![License](https://img.shields.io/packagist/l/loophp/combinator.svg?style=flat-square)](https://packagist.org/packages/loophp/combinator)
 [![Donate!](https://img.shields.io/badge/Donate-Paypal-brightgreen.svg?style=flat-square)](https://paypal.me/drupol)

# Combinator

This package provides a list of well known Combinators.

A combinator is [a higher-order function](https://en.wikipedia.org/wiki/Higher-order_function) that uses only function
application and earlier defined combinators to define a result from its arguments.
It was introduced in 1920 by [Moses Schönfinkel](https://en.wikipedia.org/wiki/Moses_Sch%C3%B6nfinkel) and
[Haskell Curry](https://en.wikipedia.org/wiki/Haskell_Curry), and has more recently been used in computer
science as a theoretical model of computation and also as a basis for the design of [functional programming languages](https://en.wikipedia.org/wiki/Functional_programming_languages).
Combinators which were introduced by Schönfinkel in 1920 with the idea of providing an analogous way to build up
functions - and to remove any mention of variables - particularly in predicate logic.

## Requirements

* PHP >= 7.1.3

## Installation

```shell script
composer require loophp/combinator
```

## Available combinators

| Combinator | Alias       | Haskel | Definition (Term)                        | Type                                                 | # Arguments |
|------------|-------------|--------|------------------------------------------|------------------------------------------------------|-------------|
| A          | Apply       | $      | `a => b => a(b)`                         | `(a -> b) -> a -> b`                                 | 2           |
| B          | Bluebird    | .      | `a => b => c => a(b(c))`                 | `(a -> b) -> (c -> a) -> c -> b`                     | 3           |
| C          | Cardinal    | flip   | `a => b => c => a(c)(b)`                 | `(a -> b -> c) -> b -> a -> c`                       | 3           |
| D          | Dove        |        | `a => b => c => d => a(b)(c(d))`         | `(a -> c -> d) -> a -> (b -> c) -> b -> d`           | 4           |
| E          | Eagle       |        | `a => b => c => d => e => a(b)(c(d)(e))` | `(a -> d -> e) -> a -> (b -> c -> d) -> b -> c -> e` | 5           |
| F          | Finch       |        | `a => b => c => c(b)(a)`                 | `a -> b -> (b -> a -> c) -> c`                       | 3           |
| G          | Goldfinch   |        | `a => b => c => d => a(d)(b(c))`         | `(a -> b -> c) -> (d -> b) -> d -> a -> c`           | 4           |
| H          | Hummingbird |        | `a => b => c => a(b)(c)(b)`              | `(a -> b -> a -> c) -> a -> b -> c `                 | 3           |
| I          | Idiot       | id     | `a => a`                                 | `a -> a`                                             | 1           |
| J          | Jay         |        | `a => b => c => d => a(b)(a(d)(c))`      | `(a -> b -> b) -> a -> b -> a -> b`                  | 4           |
| K          | Kestrel     | const  | `a => b => a`                            | `a -> b -> a`                                        | 2           |
| Ki         | Kite        |        | `a => b => b`                            | `a -> b -> b`                                        | 2           |
| L          | Lark        |        | `a => b => a(b(b))`                      |                                                      | 2           |
| M          | Mockingbird |        | `a => a(a)`                              |                                                      | 1           |
| O          | Owl         |        | `a => b => b(a(b))`                      | `((a -> b) -> a) -> (a -> b) -> b`                   | 2           |
| Phoenix    |             |        | `a => b => c => d => a(b(d))(c(d))`      | `(a -> b -> c) -> (d -> a) -> (d -> b) -> d -> c`    | 4           |
| Psi        |             | on     | `a => b => c => d => a(b(c))(b(d))`      | `(b -> b -> c) -> (a -> b) -> a -> a -> c`           | 4           |
| Q          | Queer       | (##)   | `a => b => c => b(a(c))`                 | `(a -> b) -> (b -> c) -> a -> c`                     | 3           |
| R          | Robin       |        | `a => b => c => b(c)(a)`                 | `a -> (b -> a -> c) -> b -> c`                       | 3           |
| S          | Starling    | <*>    | `a => b => c => a(c)(b(c))`              | `(a -> b -> c) -> (a -> b) -> a -> c`                | 3           |
| T          | Trush       | (#)    | `a => b => b(a)`                         | `a -> (a -> b) -> b`                                 | 2           |
| U          | Turing bird |        | `a => b => b(a(a)(b))`                   |                                                      | 2           |
| V          | Vireo       |        | `a => b => c => c(a)(b)`                 | `a -> b -> (a -> b -> c) -> c`                       | 3           |
| W          | Warbler     |        | `a => b => a(b)(b)`                      | `(a -> a -> b) -> a -> b`                            | 2           |
| Y          | Fixed point |        | `a => (b => b(b))(b => a(c => b(b)(c)))` |                                                      | 1           |

Example with the B combinator:

The definition means that the combinator needs 3 arguments: `a`, `b` and `c`.
The return of this combinator is the result of the function `a` applied to the result of the function `b` applied to `c`.

PHP will first evaluate `b(c)` and will then pass the result to the function `a`, this is what the definition means: `a(b(c))`

## Usage

Example with [the Y combinator](https://en.wikipedia.org/wiki/Fixed-point_combinator).

```php
<?php

declare(strict_types=1);

include 'vendor/autoload.php';

use loophp\combinator\Y;

$fibonacci = new Y(
    static function ($f) {
        return static function ($n) use ($f) {
            return (1 >= $n) ? $n : ($f($n - 1) + $f($n - 2));
        };
    }
);

$result = $fibonacci()(10);
```

## Further reading

- [To Mock a Mockingbird](https://en.wikipedia.org/wiki/To_Mock_a_Mockingbird)
- [http://dkeenan.com/Lambda/](http://dkeenan.com/Lambda/)
- https://gist.github.com/Avaq/1f0636ec5c8d6aed2e45
- https://en.wikipedia.org/wiki/Combinatory_logic
- https://github.com/sanctuary-js/sanctuary
- https://en.wikipedia.org/wiki/Lambda_calculus
- https://hackage.haskell.org/package/data-aviary-0.4.0/docs/src/Data-Aviary-BirdsInter.html
- https://github.com/fantasyland/fantasy-birds/blob/master/README.md
- https://www.cis.upenn.edu/~bcpierce/tapl/

## Thanks

* [Marco Pivetta](https://github.com/ocramius)
* [Danny Willems](https://github.com/dannywillems)

## Authors

* Pol Dellaiera
