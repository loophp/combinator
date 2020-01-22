[![Latest Stable Version](https://img.shields.io/packagist/v/loophp/combinator.svg?style=flat-square)](https://packagist.org/packages/loophp/combinator)
 [![GitHub stars](https://img.shields.io/github/stars/loophp/combinator.svg?style=flat-square)](https://packagist.org/packages/loophp/combinator)
 [![Total Downloads](https://img.shields.io/packagist/dt/loophp/combinator.svg?style=flat-square)](https://packagist.org/packages/loophp/combinator)
 [![GitHub Workflow Status](https://img.shields.io/github/workflow/status/loophp/combinator/Continuous%20Integration?style=flat-square)](https://github.com/loophp/combinator/actions)
 [![Scrutinizer code quality](https://img.shields.io/scrutinizer/quality/g/loophp/combinator/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/loophp/combinator/?branch=master)
 [![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/loophp/combinator/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/loophp/combinator/?branch=master)
 [![Mutation testing badge](https://badge.stryker-mutator.io/github.com/loophp/combinator/master)](https://stryker-mutator.github.io)
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

| Combinator | Alias | Haskel | Definition                                    | # Arguments |
|------------|-------|--------|-----------------------------------------------|-------------|
| A          | Apply       | $     | `a => b => a(b)`                         | 2           |
| B          | Bluebird    | .     | `a => b => c => a(b(c))`                 | 3           |
| C          | Cardinal    | flip  | `a => b => c => a(c)(b)`                 | 3           |
| D          | Dove        |       | `a => b => c => d => a(b)(c(d))`         | 4           |
| E          | Eagle       |       | `a => b => c => d => e => a(b)(c(d)(e))` | 5           |
| F          | Finch       |       | `a => b => c => c(b)(a)`                 | 3           |
| G          | Goldfinch   |       | `a => b => c => d => a(d)(b(c))`         | 4           |
| H          | Hummingbird |       | `a => b => c => a(b)(c)(b)`              | 3           |
| I          | Idiot       | id    | `a => a`                                 | 1           |
| J          | Jay         |       | `a => b => c => d => a(b)(a(d)(c))`      | 4           |
| K          | Kestrel     | const | `a => b => a`                            | 2           |
| Ki         | Kite        |       | `a => b => b`                            | 2           |
| L          |             |       | `a => b => a(b(b))`                      | 2           |
| M          |             |       | `a => a(a)`                              | 1           |
| O          | Owl         |       | `a => b => b(a(b))`                      | 2           |
| Psi        |             | on    | `a => b => c => d => a((b(c))(b(d)))`    | 4           |
| Q          | Queer       | (##)  | `a => b => c => b(a(c))`                 | 3           |
| R          | Robin       |       | `a => b => c => b(c)(a)`                 | 3           |
| S          | Starling    | <*>   | `a => b => c => a(c)(b(c))`              | 3           |
| T          | Trush       | (#)   | `a => b => b(a)`                         | 2           |
| U          |             |       | `a => b => b(a(a)(b))`                   | 2           |
| V          | Vireo       |       | `a => b => c => c(a)(b)`                 | 3           |
| W          | Warbler     |       | `a => b => a(b)(b)`                      | 2           |
| Y          |             |       | `a => (b => b(b))(b => a(c => b(b)(c)))` | 1           |

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

## Authors

* Pol Dellaiera
