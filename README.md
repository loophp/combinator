[![Latest Stable Version](https://img.shields.io/packagist/v/loophp/combinator.svg?style=flat-square)](https://packagist.org/packages/loophp/combinator)
 [![GitHub stars](https://img.shields.io/github/stars/loophp/combinator.svg?style=flat-square)](https://packagist.org/packages/loophp/combinator)
 [![Total Downloads](https://img.shields.io/packagist/dt/loophp/combinator.svg?style=flat-square)](https://packagist.org/packages/loophp/combinator)
 [![GitHub Workflow Status](https://img.shields.io/github/workflow/status/loophp/combinator/Continuous%20Integration?style=flat-square)](https://github.com/loophp/combinator/actions)
 [![Scrutinizer code quality](https://img.shields.io/scrutinizer/quality/g/loophp/combinator/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/loophp/combinator/?branch=master)
 [![Type Coverage](https://shepherd.dev/github/loophp/combinator/coverage.svg)](https://shepherd.dev/github/loophp/combinator)
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

| Name    | Alias         | Composition       | Composition using S and K                                                                                                                                                                  | Haskel  | Lambda calculus             | Term definition (JS like)                | Type                                                 | # Arguments |
|---------|---------------|-------------------|--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|---------|-----------------------------|------------------------------------------|------------------------------------------------------|-------------|
| A       | Apply         | `SK(SK)`          | `(S(K))(S(K))`                                                                                                                                                                             | `$`     | `λab.ab`                    | `a => b => a(b)`                         | `(a -> b) -> a -> b`                                 | 2           |
| B       | Bluebird      | `S(KS)K`          | `S(KS)K`                                                                                                                                                                                   | `.`     | `λabc.a(bc)`                | `a => b => c => a(b(c))`                 | `(a -> b) -> (c -> a) -> c -> b`                     | 3           |
| C       | Cardinal      | `S(BBS)(KK)`      | `((S((S(K((S(KS))K)))S))(KK))`                                                                                                                                                             | `flip`  | `λabc.acb`                  | `a => b => c => a(c)(b)`                 | `(a -> b -> c) -> b -> a -> c`                       | 3           |
| D       | Dove          | `BB`              | `(S(K((S(KS))K)))`                                                                                                                                                                         |         | `λabcd.ab(cd)`              | `a => b => c => d => a(b)(c(d))`         | `(a -> c -> d) -> a -> (b -> c) -> b -> d`           | 4           |
| E       | Eagle         | `B(BBB)`          | `(S(K((S(K((S(KS))K)))((S(KS))K))))`                                                                                                                                                       |         | `λabcde.ab(cde)`            | `a => b => c => d => e => a(b)(c(d)(e))` | `(a -> d -> e) -> a -> (b -> c -> d) -> b -> c -> e` | 5           |
| F       | Finch         | `ETTET`           | `((S(K((S((SK)K))(K((S(K(S((SK)K))))K)))))((S(K((S(K((S(KS))K)))((S(KS))K))))((S(K(S((SK)K))))K)))`                                                                                        |         | `λabc.cba`                  | `a => b => c => c(b)(a)`                 | `a -> b -> (b -> a -> c) -> c`                       | 3           |
| G       | Goldfinch     | `BBC`             | `((S(K((S(KS))K)))((S((S(K((S(KS))K)))S))(KK)))`                                                                                                                                           |         | `λabcd.ad(bc)`              | `a => b => c => d => a(d)(b(c))`         | `(a -> b -> c) -> (d -> b) -> d -> a -> c`           | 4           |
| H       | Hummingbird   | `BW(BC)`          | `((S(K((S(K(S((S(K((S((SK)K))((SK)K))))((S(K((S(KS))K)))((S(K(S((SK)K))))K))))))K)))(S(K((S((S(K((S(KS))K)))S))(KK)))))`                                                                   |         | `λabc.abcb`                 | `a => b => c => a(b)(c)(b)`              | `(a -> b -> a -> c) -> a -> b -> c `                 | 3           |
| I       | Idiot         | `SKK`             | `((SK)K)`                                                                                                                                                                                  | `id`    | `λa.a`                      | `a => a`                                 | `a -> a`                                             | 1           |
| J       | Jay           | `B(BC)(W(BC(E)))` | `((S(K(S(K((S((S(K((S(KS))K)))S))(KK))))))((S((S(K((S((SK)K))((SK)K))))((S(K((S(KS))K)))((S(K(S((SK)K))))K))))(K((S(K((S((S(K((S(KS))K)))S))(KK))))(S(K((S(K((S(KS))K)))((S(KS))K))))))))` |         | `λabcd.ab(adc)`             | `a => b => c => d => a(b)(a(d)(c))`      | `(a -> b -> b) -> a -> b -> a -> b`                  | 4           |
| K       | Kestrel       | `K`               | `K`                                                                                                                                                                                        | `const` | `λab.a`                     | `a => b => a`                            | `a -> b -> a`                                        | 2           |
| Ki      | Kite          | `KI`              | `(K((SK)K))`                                                                                                                                                                               |         | `λab.b`                     | `a => b => b`                            | `a -> b -> b`                                        | 2           |
| L       | Lark          | `CBM`             | `((S((S(KS))K))(K((S((SK)K))((SK)K))))`                                                                                                                                                    |         | `λab.a(bb)`                 | `a => b => a(b(b))`                      |                                                      | 2           |
| M       | Mockingbird   | `SII`             | `((S((SK)K))((SK)K))`                                                                                                                                                                      |         | `λa.aa`                     | `a => a(a)`                              |                                                      | 1           |
| O       | Owl           | `SI`              | `(S((SK)K))`                                                                                                                                                                               |         | `λab.b(ab)`                 | `a => b => b(a(b))`                      | `((a -> b) -> a) -> (a -> b) -> b`                   | 2           |
| Omega   | Ω             | `MM`              | `(((S((SK)K))((SK)K))((S((SK)K))((SK)K)))`                                                                                                                                                 |         | `λa.(aa)(aa)`               | `a => (a(a))(a(a))`                      |                                                      | 1           |
| Phoenix |               |                   |                                                                                                                                                                                            |         | `λabcd.a(bd)(cd)`           | `a => b => c => d => a(b(d))(c(d))`      | `(a -> b -> c) -> (d -> a) -> (d -> b) -> d -> c`    | 4           |
| Psi     |               |                   |                                                                                                                                                                                            | `on`    | `λabcd.a(bc)(bd)`           | `a => b => c => d => a(b(c))(b(d))`      | `(a -> a -> b) -> (c -> a) -> c -> c -> b`           | 4           |
| Q       | Queer         | `CB`              | `((S(K(S((S(KS))K))))K)`                                                                                                                                                                   | `(##)`  | `λabc.b(ac)`                | `a => b => c => b(a(c))`                 | `(a -> b) -> (b -> c) -> a -> c`                     | 3           |
| R       | Robin         | `BBT`             | `((S(K((S(KS))K)))((S(K(S((SK)K))))K))`                                                                                                                                                    |         | `λabc.bca`                  | `a => b => c => b(c)(a)`                 | `a -> (b -> a -> c) -> b -> c`                       | 3           |
| S       | Starling      | `S`               | `S`                                                                                                                                                                                        | `<*>`   | `λabc.ac(bc)`               | `a => b => c => a(c)(b(c))`              | `(a -> b -> c) -> (a -> b) -> a -> c`                | 3           |
| S_      |               |                   |                                                                                                                                                                                            | `<*>`   | `λabc.a(bc)c`               | `a => b => c => a(b(c))(c)`              | `(a -> b -> c) -> (b -> a) -> b -> c`                | 3           |
| S2      |               |                   |                                                                                                                                                                                            | `<*>`   | `λabcd.a((bd)(cd))`         | `a => b => c => d => a(b(d))(c(d))`      | `(b -> c -> d) -> (a -> b) -> (a -> c) -> a -> d`    | 4           |
| T       | Trush         | `CI`              | `((S(K(S((SK)K))))K)`                                                                                                                                                                      | `(#)`   | `λab.ba`                    | `a => b => b(a)`                         | `a -> (a -> b) -> b`                                 | 2           |
| U       | Turing        | `LO`              | `((S(K(S((SK)K))))((S((SK)K))((SK)K)))`                                                                                                                                                    |         | `λab.b(aab)`                | `a => b => b(a(a)(b))`                   |                                                      | 2           |
| V       | Vireo         | `BCT`             | `((S(K((S((S(K((S(KS))K)))S))(KK))))((S(K(S((SK)K))))K))`                                                                                                                                  |         | `λabc.cab`                  | `a => b => c => c(a)(b)`                 | `a -> b -> (a -> b -> c) -> c`                       | 3           |
| W       | Warbler       | `C(BMR)`          | `((S(K(S((S(K((S((SK)K))((SK)K))))((S(K((S(KS))K)))((S(K(S((SK)K))))K))))))K)`                                                                                                             |         | `λab.abb`                   | `a => b => a(b)(b)`                      | `(a -> a -> b) -> a -> b`                            | 2           |
| Y       | Y-Fixed point |                   |                                                                                                                                                                                            |         | `λa.(λb(a(bb))(λb(a(bb))))` | `a => (b => b(b))(b => a(c => b(b)(c)))` |                                                      | 1           |
| Z       | Z-Fixed point |                   |                                                                                                                                                                                            |         | `λa.M(λb(a(Mb)))`           |                                          |                                                      | 1           |

## Usage

### Simple combinators

```php
<?php

declare(strict_types=1);

include 'vendor/autoload.php';

use loophp\combinator\Combinators;

// Lambda calculus: I combinator correspond to λa.a
Combinators::I()('a'); // a

// Lambda calculus: K combinator correspond to λa.λb.a (or λab.a)
Combinators::K()('a')('b'); // a

// Lambda calculus: C combinator correspond to λf(λa(λb(fba)))
// and thus: C K a b = b
Combinators::C()(Combinators::K())('a')('b'); // b

// Lambda calculus: Ki combinator correspond to λa.λb.b (or λab.b)
Combinators::Ki()('a')('b'); // b
```

### Y combinator

```php
<?php

declare(strict_types=1);

include 'vendor/autoload.php';

use loophp\combinator\Combinators;

$fibonacci = Combinators::Y()(
    static function ($f) {
        return static function ($n) use ($f) {
            return (1 >= $n) ? $n : ($f($n - 1) + $f($n - 2));
        };
    }
);

$result = $fibonacci(10); // 55
```

More on [the wikipedia page](https://en.wikipedia.org/wiki/Fixed-point_combinator).

## Suggested reading and resources

- [To Mock a Mockingbird](https://en.wikipedia.org/wiki/To_Mock_a_Mockingbird)
- [http://dkeenan.com/Lambda/](http://dkeenan.com/Lambda/)
- https://gist.github.com/Avaq/1f0636ec5c8d6aed2e45
- https://en.wikipedia.org/wiki/Combinatory_logic
- https://github.com/sanctuary-js/sanctuary
- https://en.wikipedia.org/wiki/Lambda_calculus
- https://hackage.haskell.org/package/data-aviary-0.4.0/docs/src/Data-Aviary-BirdsInter.html
- https://github.com/fantasyland/fantasy-birds/blob/master/README.md
- https://www.cis.upenn.edu/~bcpierce/tapl/
- https://plato.stanford.edu/entries/lambda-calculus/
- https://github.com/glebec/lambda-talk

## Thanks

* [Marco Pivetta](https://github.com/ocramius)
* [Danny Willems](https://github.com/dannywillems)

## Authors

* Pol Dellaiera
