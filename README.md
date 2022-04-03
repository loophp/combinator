[![Latest Stable Version][latest stable version]][1]
 [![GitHub stars][github stars]][1]
 [![Total Downloads][total downloads]][1]
 [![GitHub Workflow Status][github workflow status]][2]
 [![Scrutinizer code quality][code quality]][3]
 [![Type Coverage][type coverage]][4]
 [![Code Coverage][code coverage]][3]
 [![License][license]][1]
 [![Donate!][donate github]][5]
 [![Donate!][donate paypal]][6]

# Combinator

## Description

This package provides a list of well known Combinators.

A combinator is [a higher-order function][7] that uses only function
application and earlier defined combinators to define a result from its arguments.
It was introduced in 1920 by [Moses Schönfinkel][8] and
[Haskell Curry][9], and has more recently been used in computer
science as a theoretical model of computation and also as a basis for the design of [functional programming languages][10].
Combinators which were introduced by Schönfinkel in 1920 with the idea of providing an analogous way to build up
functions - and to remove any mention of variables - particularly in predicate logic.

## Requirements

* PHP >= 8

## Installation

```shell script
composer require loophp/combinator
```

## Available combinators

| Name      | Alias         | Composition       | Composition using S and K                                                                                                                                                                                     | Haskell | Lambda calculus             | Term definition (JS like)                | Type                                                 | # Arguments |
|-----------|---------------|-------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|---------|-----------------------------|------------------------------------------|------------------------------------------------------|-------------|
| A         | Apply         | `SK(SK)`          | <details>`(S(K))(S(K))`</details>                                                                                                                                                                             | `$`     | `λab.ab`                    | `a => b => a(b)`                         | `(a -> b) -> a -> b`                                 | 2           |
| B         | Bluebird      | `S(KS)K`          | <details>`S(KS)K`</details>                                                                                                                                                                                   | `.`     | `λabc.a(bc)`                | `a => b => c => a(b(c))`                 | `(a -> b) -> (c -> a) -> c -> b`                     | 3           |
| Blackbird | Blackbird     | `BBB`             | <details>`(S(K(S(KS)K)))(S(KS)K)`</details>                                                                                                                                                                   | `...`   | `λabcd.a(bcd)`              | `a => b => c => => d => a(b(c)(d))`      | `(c -> d) -> (a -> b -> c) -> a -> b -> d`           | 4           |
| C         | Cardinal      | `S(BBS)(KK)`      | <details>`((S((S(K(S(KS)K)))S))(KK))`</details>                                                                                                                                                               | `flip`  | `λabc.acb`                  | `a => b => c => a(c)(b)`                 | `(a -> b -> c) -> b -> a -> c`                       | 3           |
| D         | Dove          | `BB`              | <details>`(S(K(S(KS)K)))`</details>                                                                                                                                                                           |         | `λabcd.ab(cd)`              | `a => b => c => d => a(b)(c(d))`         | `(a -> c -> d) -> a -> (b -> c) -> b -> d`           | 4           |
| E         | Eagle         | `B(BBB)`          | <details>`(S(K((S(K(S(KS)K)))((S(KS))K))))`</details>                                                                                                                                                         |         | `λabcde.ab(cde)`            | `a => b => c => d => e => a(b)(c(d)(e))` | `(a -> d -> e) -> a -> (b -> c -> d) -> b -> c -> e` | 5           |
| F         | Finch         | `ETTET`           | <details>`((S(K((S((SK)K))(K((S(K(S((SK)K))))K)))))((S(K((S(K(S(KS)K)))((S(KS))K))))((S(K(S((SK)K))))K)))`</details>                                                                                          |         | `λabc.cba`                  | `a => b => c => c(b)(a)`                 | `a -> b -> (b -> a -> c) -> c`                       | 3           |
| G         | Goldfinch     | `BBC`             | <details>`((S(K(S(KS)K)))((S((S(K(S(KS)K)))S))(KK)))`</details>                                                                                                                                               |         | `λabcd.ad(bc)`              | `a => b => c => d => a(d)(b(c))`         | `(a -> b -> c) -> (d -> b) -> d -> a -> c`           | 4           |
| H         | Hummingbird   | `BW(BC)`          | <details>`((S(K((S(K(S((S(K((S((SK)K))((SK)K))))((S(K(S(KS)K)))((S(K(S((SK)K))))K))))))K)))(S(K((S((S(K(S(KS)K)))S))(KK)))))`</details>                                                                       |         | `λabc.abcb`                 | `a => b => c => a(b)(c)(b)`              | `(a -> b -> a -> c) -> a -> b -> c`                  | 3           |
| I         | Idiot         | `SKK`             | <details>`((SK)K)`</details>                                                                                                                                                                                  | `id`    | `λa.a`                      | `a => a`                                 | `a -> a`                                             | 1           |
| J         | Jay           | `B(BC)(W(BC(E)))` | <details>`((S(K(S(K((S((S(K(S(KS)K)))S))(KK))))))((S((S(K((S((SK)K))((SK)K))))((S(K(S(KS)K)))((S(K(S((SK)K))))K))))(K((S(K((S((S(K(S(KS)K)))S))(KK))))(S(K((S(K(S(KS)K)))((S(KS))K))))))))`</details>         |         | `λabcd.ab(adc)`             | `a => b => c => d => a(b)(a(d)(c))`      | `(a -> b -> b) -> a -> b -> a -> b`                  | 4           |
| K         | Kestrel       | `K`               | <details>`K`</details>                                                                                                                                                                                        | `const` | `λab.a`                     | `a => b => a`                            | `a -> b -> a`                                        | 2           |
| Ki        | Kite          | `KI`              | <details>`(K((SK)K))`</details>                                                                                                                                                                               |         | `λab.b`                     | `a => b => b`                            | `a -> b -> b`                                        | 2           |
| L         | Lark          | `CBM`             | <details>`((S((S(KS))K))(K((S((SK)K))((SK)K))))`</details>                                                                                                                                                    |         | `λab.a(bb)`                 | `a => b => a(b(b))`                      |                                                      | 2           |
| M         | Mockingbird   | `SII`             | <details>`((S((SK)K))((SK)K))`</details>                                                                                                                                                                      |         | `λa.aa`                     | `a => a(a)`                              |                                                      | 1           |
| O         | Owl           | `SI`              | <details>`(S((SK)K))`</details>                                                                                                                                                                               |         | `λab.b(ab)`                 | `a => b => b(a(b))`                      | `((a -> b) -> a) -> (a -> b) -> b`                   | 2           |
| Omega     | Ω             | `MM`              | <details>`(((S((SK)K))((SK)K))((S((SK)K))((SK)K)))`</details>                                                                                                                                                 |         | `λa.(aa)(aa)`               | `a => (a(a))(a(a))`                      |                                                      | 1           |
| Phoenix   |               |                   |                                                                                                                                                                                                               |         | `λabcd.a(bd)(cd)`           | `a => b => c => d => a(b(d))(c(d))`      | `(a -> b -> c) -> (d -> a) -> (d -> b) -> d -> c`    | 4           |
| Psi       |               |                   |                                                                                                                                                                                                               | `on`    | `λabcd.a(bc)(bd)`           | `a => b => c => d => a(b(c))(b(d))`      | `(a -> a -> b) -> (c -> a) -> c -> c -> b`           | 4           |
| Q         | Queer         | `CB`              | <details>`((S(K(S((S(KS))K))))K)`</details>                                                                                                                                                                   | `(##)`  | `λabc.b(ac)`                | `a => b => c => b(a(c))`                 | `(a -> b) -> (b -> c) -> a -> c`                     | 3           |
| R         | Robin         | `BBT`             | <details>`((S(K(S(KS)K)))((S(K(S((SK)K))))K))`</details>                                                                                                                                                      |         | `λabc.bca`                  | `a => b => c => b(c)(a)`                 | `a -> (b -> a -> c) -> b -> c`                       | 3           |
| S         | Starling      | `S`               | <details>`S`</details>                                                                                                                                                                                        | `<*>`   | `λabc.ac(bc)`               | `a => b => c => a(c)(b(c))`              | `(a -> b -> c) -> (a -> b) -> a -> c`                | 3           |
| S_        |               |                   |                                                                                                                                                                                                               | `<*>`   | `λabc.a(bc)c`               | `a => b => c => a(b(c))(c)`              | `(a -> b -> c) -> (b -> a) -> b -> c`                | 3           |
| S2        |               |                   |                                                                                                                                                                                                               | `<*>`   | `λabcd.a((bd)(cd))`         | `a => b => c => d => a(b(d))(c(d))`      | `(b -> c -> d) -> (a -> b) -> (a -> c) -> a -> d`    | 4           |
| T         | Trush         | `CI`              | <details>`((S(K(S((SK)K))))K)`</details>                                                                                                                                                                      | `(#)`   | `λab.ba`                    | `a => b => b(a)`                         | `a -> (a -> b) -> b`                                 | 2           |
| U         | Turing        | `LO`              | <details>`((S(K(S((SK)K))))((S((SK)K))((SK)K)))`</details>                                                                                                                                                    |         | `λab.b(aab)`                | `a => b => b(a(a)(b))`                   |                                                      | 2           |
| V         | Vireo         | `BCT`             | <details>`((S(K((S((S(K(S(KS)K)))S))(KK))))((S(K(S((SK)K))))K))`</details>                                                                                                                                    |         | `λabc.cab`                  | `a => b => c => c(a)(b)`                 | `a -> b -> (a -> b -> c) -> c`                       | 3           |
| W         | Warbler       | `C(BMR)`          | <details>`((S(K(S((S(K((S((SK)K))((SK)K))))((S(K(S(KS)K)))((S(K(S((SK)K))))K))))))K)`</details>                                                                                                               |         | `λab.abb`                   | `a => b => a(b)(b)`                      | `(a -> a -> b) -> a -> b`                            | 2           |
| Y         | Y-Fixed point |                   |                                                                                                                                                                                                               |         | `λa.(λb(a(bb))(λb(a(bb))))` | `a => (b => b(b))(b => a(c => b(b)(c)))` |                                                      | 1           |
| Z         | Z-Fixed point |                   |                                                                                                                                                                                                               |         | `λa.M(λb(a(Mb)))`           |                                          |                                                      | 1           |

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

namespace Test;

include __DIR__ . '/vendor/autoload.php';

use Closure;
use loophp\combinator\Combinators;

// Example 1
$factorialGenerator = static fn (Closure $fact): Closure =>
static fn (int $n): int  => (0 === $n) ? 1 : ($n * $fact($n - 1));

$factorial = Combinators::Y()($factorialGenerator);

var_dump($factorial(6)); // 720

// Example 2
$fibonacciGenerator = static fn (Closure $fibo): Closure =>
static fn (int $number): int => (1 >= $number) ? $number : $fibo($number - 1) + $fibo($number - 2);

$fibonacci = Combinators::Y()($fibonacciGenerator);

var_dump($fibonacci(10)); // 55
```

More on [the wikipedia page][11].

## Suggested reading and resources

- [To Mock a Mockingbird][12]
- [http://dkeenan.com/Lambda/][13]
- https://gist.github.com/Avaq/1f0636ec5c8d6aed2e45
- https://en.wikipedia.org/wiki/Combinatory_logic
- https://github.com/sanctuary-js/sanctuary
- https://en.wikipedia.org/wiki/Lambda_calculus
- https://hackage.haskell.org/package/data-aviary-0.4.0/docs/src/Data-Aviary-BirdsInter.html
- https://github.com/fantasyland/fantasy-birds/blob/master/README.md
- https://www.cis.upenn.edu/~bcpierce/tapl/
- https://plato.stanford.edu/entries/lambda-calculus/
- https://github.com/glebec/lambda-talk
- https://www.youtube.com/watch?v=seVSlKazsNk

## Contributing

Feel free to contribute by sending Github pull requests. I'm quite responsive :-)

If you can't contribute to the code, you can also sponsor me on [Github][5] or
[Paypal][6].

### Thanks

* [Marco Pivetta][14]
* [Danny Willems][15]

### Authors

* [Pol Dellaiera][16]

## Changelog

See [CHANGELOG.md][17] for a changelog based on [git commits][18].

For more detailed changelogs, please check [the release changelogs][19].

[1]: https://packagist.org/packages/loophp/combinator
[2]: https://github.com/loophp/combinator/actions
[3]: https://scrutinizer-ci.com/g/loophp/combinator/?branch=master
[4]: https://shepherd.dev/github/loophp/combinator
[5]: https://github.com/sponsors/drupol
[6]: https://www.paypal.me/drupol
[latest stable version]: https://img.shields.io/packagist/v/loophp/combinator.svg?style=flat-square
[github stars]: https://img.shields.io/github/stars/loophp/combinator.svg?style=flat-square
[total downloads]: https://img.shields.io/packagist/dt/loophp/combinator.svg?style=flat-square
[github workflow status]: https://img.shields.io/github/workflow/status/loophp/combinator/Continuous%20Integration?style=flat-square
[code quality]: https://img.shields.io/scrutinizer/quality/g/loophp/combinator/master.svg?style=flat-square
[type coverage]: https://img.shields.io/badge/dynamic/json?style=flat-square&color=color&label=Type%20coverage&query=message&url=https%3A%2F%2Fshepherd.dev%2Fgithub%2Floophp%2Fcombinator%2Fcoverage
[code coverage]: https://img.shields.io/scrutinizer/coverage/g/loophp/combinator/master.svg?style=flat-square
[license]: https://img.shields.io/packagist/l/loophp/combinator.svg?style=flat-square
[donate github]: https://img.shields.io/badge/Sponsor-Github-brightgreen.svg?style=flat-square
[donate paypal]: https://img.shields.io/badge/Sponsor-Paypal-brightgreen.svg?style=flat-square
[7]: https://en.wikipedia.org/wiki/Higher-order_function
[8]: https://en.wikipedia.org/wiki/Moses_Sch%C3%B6nfinkel
[9]: https://en.wikipedia.org/wiki/Haskell_Curry
[10]: https://en.wikipedia.org/wiki/Functional_programming_languages
[11]: https://en.wikipedia.org/wiki/Fixed-point_combinator
[12]: https://en.wikipedia.org/wiki/To_Mock_a_Mockingbird
[13]: http://dkeenan.com/Lambda/
[14]: https://github.com/ocramius
[15]: https://github.com/dannywillems
[16]: https://not-a-number.io/
[17]: https://github.com/loophp/combinator/blob/master/CHANGELOG.md
[18]: https://github.com/loophp/combinator/commits/master
[19]: https://github.com/loophp/combinator/releases
