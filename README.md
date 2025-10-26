[![Latest Stable Version][latest stable version]][1]
[![GitHub stars][github stars]][1] [![Total Downloads][total downloads]][1]
[![GitHub Workflow Status][github workflow status]][2]
[![Scrutinizer code quality][code quality]][3]
[![Type Coverage][type coverage]][4] [![Code Coverage][code coverage]][3]
[![License][license]][1] [![Donate!][donate github]][github sponsors link]

# Combinator

This package provides a comprehensive collection of well-known combinators for
PHP, enabling a more declarative, [point-free programming style].

## Description

A combinator is a [higher-order function] that uses only function application
and previously defined combinators to define a result from its arguments. This
concept was introduced by [Moses Schönfinkel] in 1920 and later developed by
[Haskell Curry].

In computer science, combinatory logic serves as a theoretical model of
computation and is a cornerstone of [functional programming] language design.
The core idea is to build complex functions without ever having to mention
variables.

### Why use Combinators?

Using combinators can help you:

- **Write cleaner, more declarative code:** By abstracting away function
  composition and argument manipulation, your code can become more readable and
  expressive.
- **Avoid temporary variables:** Combinators provide powerful ways to pipe data
  through a series of functions in a clean, fluent manner.
- **Explore functional programming:** This library provides a practical way to
  learn about and experiment with fundamental concepts of functional programming
  and lambda calculus, right within PHP.

## Requirements

- PHP >= 8.0

## Installation

You can install the package via Composer:

```shell
composer require loophp/combinator
```

## Available Combinators

The following is a list of the combinators available in this package.

| Name          | Alias         | Haskell | Lambda Calculus                   | Term Definition (JS-like)                           | Type                                                 |
| :------------ | :------------ | :------ | :-------------------------------- | :-------------------------------------------------- | :--------------------------------------------------- |
| **A**         | Apply         | `$`     | `λab.ab`                          | `a => b => a(b)`                                    | `(a -> b) -> a -> b`                                 |
| **B**         | Bluebird      | `.`     | `λabc.a(bc)`                      | `a => b => c => a(b(c))`                            | `(b -> c) -> (a -> b) -> a -> c`                     |
| **Blackbird** |               | `...`   | `λabcd.a(bcd)`                    | `a => b => c => d => a(b(c)(d))`                    | `(c -> d) -> (a -> b -> c) -> a -> b -> d`           |
| **C**         | Cardinal      | `flip`  | `λabc.acb`                        | `a => b => c => a(c)(b)`                            | `(a -> b -> c) -> b -> a -> c`                       |
| **D**         | Dove          |         | `λabcd.ab(cd)`                    | `a => b => c => d => a(b)(c(d))`                    | `(b -> c -> d) -> a -> (b -> c) -> a -> d`           |
| **E**         | Eagle         |         | `λabcde.ab(cde)`                  | `a => b => c => d => e => a(b)(c(d)(e))`            | `(c -> d -> e) -> a -> (b -> c -> d) -> b -> c -> e` |
| **F**         | Finch         |         | `λabc.cba`                        | `a => b => c => c(b)(a)`                            | `a -> b -> (b -> a -> c) -> c`                       |
| **G**         | Goldfinch     |         | `λabcd.ad(bc)`                    | `a => b => c => d => a(d)(b(c))`                    | `(c -> b) -> (a -> d -> c) -> a -> d -> b`           |
| **H**         | Hummingbird   |         | `λabc.abcb`                       | `a => b => c => a(b)(c)(b)`                         | `(a -> b -> a -> c) -> a -> b -> c`                  |
| **I**         | Idiot         | `id`    | `λa.a`                            | `a => a`                                            | `a -> a`                                             |
| **J**         | Jay           |         | `λabcd.ab(adc)`                   | `a => b => c => d => a(b)(a(d)(c))`                 | `(a -> c -> d) -> a -> b -> (a -> c) -> d`           |
| **K**         | Kestrel       | `const` | `λab.a`                           | `a => b => a`                                       | `a -> b -> a`                                        |
| **Ki**        | Kite          | `konst` | `λab.b`                           | `a => b => b`                                       | `a -> b -> b`                                        |
| **L**         | Lark          |         | `λab.a(bb)`                       | `a => b => a(b(b))`                                 | `(a -> a -> b) -> (a -> b)`                          |
| **M**         | Mockingbird   |         | `λa.aa`                           | `a => a(a)`                                         | `(a -> a) -> a`                                      |
| **O**         | Owl           |         | `λab.b(ab)`                       | `a => b => b(a(b))`                                 | `((a -> b) -> a) -> (a -> b) -> b`                   |
| **Omega**     | Ω             |         | `λa.(aa)(aa)`                     | `a => (a(a))(a(a))`                                 | `(a -> a) -> b`                                      |
| **Phoenix**   |               |         | `λabcd.a(bd)(cd)`                 | `a => b => c => d => a(b(d))(c(d))`                 | `(b -> c -> d) -> (a -> b) -> (a -> c) -> a -> d`    |
| **Psi**       |               | `on`    | `λabcd.a(bc)(bd)`                 | `a => b => c => d => a(b(c))(b(d))`                 | `(b -> b -> c) -> (a -> b) -> a -> a -> c`           |
| **Q**         | Queer         | `(##)`  | `λabc.b(ac)`                      | `a => b => c => b(a(c))`                            | `(a -> b) -> (b -> c) -> a -> c`                     |
| **R**         | Robin         |         | `λabc.bca`                        | `a => b => c => b(c)(a)`                            | `a -> (b -> a -> c) -> b -> c`                       |
| **S**         | Starling      | `<*>`   | `λabc.ac(bc)`                     | `a => b => c => a(c)(b(c))`                         | `(a -> b -> c) -> (a -> b) -> a -> c`                |
| **S'**        | S Prime       | `<*>`   | `λabc.a(bc)c`                     | `a => b => c => a(b(c))(c)`                         | `(b -> a -> c) -> (a -> b) -> a -> c`                |
| **S₂**        | S-Two         | `<*>`   | `λabcd.a((bd)(cd))`               | `a => b => c => d => a(b(d)(c(d)))`                 | `(c -> d) -> (a -> b -> c) -> (a -> b) -> a -> d`    |
| **T**         | Thrush        | `(&)`   | `λab.ba`                          | `a => b => b(a)`                                    | `a -> (a -> b) -> b`                                 |
| **U**         | Turing        |         | `λab.b(aab)`                      | `a => b => b(a(a)(b))`                              | `((a -> b) -> b) -> (a -> b) -> b`                   |
| **V**         | Vireo         |         | `λabc.cab`                        | `a => b => c => c(a)(b)`                            | `a -> b -> (a -> b -> c) -> c`                       |
| **W**         | Warbler       |         | `λab.abb`                         | `a => b => a(b)(b)`                                 | `(a -> a -> b) -> a -> b`                            |
| **Y**         | Y-Fixed point | `fix`   | `λf.(λx.f(xx))(λx.f(xx))`         | `f => (x => f(x(x)))(x => f(x(x)))`                 | `(a -> a) -> a`                                      |
| **Z**         | Z-Fixed point | `fix`   | `λf.(λx.f(λv.xxv))(λx.f(λv.xxv))` | `f => (x => f(v => x(x)(v)))(x => f(v => x(x)(v)))` | `(a -> a) -> a`                                      |

## Combinator by Example

Click on any combinator below to see a practical usage example. All combinators
are invokable classes, but the easiest way to access them is through the
`loophp\combinator\Combinators` facade, which statically provides each one.

<details>
<summary>A (Apply) Combinator</summary>

- **Lambda:** `λab.ab`
- **Purpose:** Applies a function `a` to an argument `b`. In Haskell, this is
  the `$` operator. It can help reduce the number of parentheses in complex
  expressions.

````php
use loophp\combinator\Combinators;

$a = Combinators::A();
$strlen = 'strlen';
$string = 'hello world';

// Instead of $strlen($string)
echo $a($strlen)($string); // Outputs: 11
```</details>

<details>
<summary>B (Bluebird) Combinator</summary>

*   **Lambda:** `λabc.a(bc)`
*   **Purpose:** Function composition. It takes two functions, `a` and `b`, and a value `c`, and applies `a` to the result of `b` applied to `c`. This is `.` in Haskell.

```php
use loophp\combinator\Combinators;

$b = Combinators::B();
$addOne = fn(int $x): int => $x + 1;
$multiplyByTwo = fn(int $x): int => $x * 2;

// Create a new function: multiply by two, then add one.
$composed = $b($addOne)($multiplyByTwo);

echo $composed(5); // Outputs: 11 (which is 1 + (2 * 5))
````

</details>

<details>
<summary>Blackbird Combinator</summary>

- **Lambda:** `λabcd.a(bcd)`
- **Purpose:** Extended function composition for three functions: `a(b(c(d)))`.

```php
use loophp\combinator\Combinators;

$blackbird = Combinators::Blackbird();
$wrapInP = fn(string $s): string => "<p>$s</p>";
$toUpper = 'strtoupper';
$addExclamation = fn(string $s): string => "$s!";

$format = $blackbird($wrapInP)($toUpper)($addExclamation);

echo $format('hello'); // Outputs: <p>HELLO!</p>
```

</details>

<details>
<summary>C (Cardinal) Combinator</summary>

- **Lambda:** `λabc.acb`
- **Purpose:** Flips arguments. It takes a function `a` and two arguments `b`
  and `c`, and applies `a` with `c` as the first argument and `b` as the second.
  This is `flip` in Haskell.

````php
use loophp\combinator\Combinators;

$c = Combinators::C();
$divide = fn(int $x, int $y): float => $x / $y;

$flippedDivide = $c($divide);

echo $flippedDivide(2)(10); // Outputs: 5 (same as $divide(10, 2))
```</details>

<details>
<summary>D (Dove) Combinator</summary>

*   **Lambda:** `λabcd.ab(cd)`
*   **Purpose:** Composes two functions and their arguments: `a(b)(c(d))`.

```php
use loophp\combinator\Combinators;

$d = Combinators::D();
$add = fn(int $x): callable => fn(int $y): int => $x + $y;
$multiply = fn(int $x): callable => fn(int $y): int => $x * $y;

// Calculates ( (2 + 3) + (4 * 5) ) using curried functions
echo $d($add)($add(2)(3))($multiply(4))(5); // Outputs: 25
````

</details>

<details>
<summary>E (Eagle) Combinator</summary>

- **Lambda:** `λabcde.ab(cde)`
- **Purpose:** Five-argument composition, useful for deeply nested function
  calls: `a(b)(c(d(e)))`.

```php
use loophp\combinator\Combinators;

$e = Combinators::E();
$add = fn(int $x): callable => fn(int $y): int => $x + $y;
$multiplyByTwo = fn(int $x): int => $x * 2;
$addOne = fn(int $x): int => $x + 1;

// Equivalent to: $add(10)(($multiplyByTwo($addOne(5))))
echo $e($add)(10)($multiplyByTwo)($addOne)(5); // Outputs: 22
```

</details>

<details>
<summary>F (Finch) Combinator</summary>

- **Lambda:** `λabc.cba`
- **Purpose:** Reverses the application order. Applies `c` to `b`, and then to
  `a`.

```php
use loophp\combinator\Combinators;

$f = Combinators::F();
$concat = fn(string $a): callable => fn(string $b): string => $a . $b;

// Instead of $concat(' world')('hello')
echo $f('hello')(' world')($concat); // Outputs: " worldhello"
```

</details>

<details>
<summary>G (Goldfinch) Combinator</summary>

- **Lambda:** `λabcd.ad(bc)`
- **Purpose:** Applies arguments in a unique order: `a(d)(b(c))`.

```php
use loophp\combinator\Combinators;

$g = Combinators::G();
$merge = fn(array $a): callable => fn(array $b): array => array_merge($a, $b);
$mapToUpper = fn(array $a): array => array_map('strtoupper', $a);

// Equivalent to $merge(['d', 'e'])(($mapToUpper(['a', 'b', 'c'])))
$result = $g($merge)($mapToUpper)(['a', 'b', 'c'])(['d', 'e']);
print_r($result); // Outputs: Array ( [0] => A [1] => B [2] => C [3] => d [4] => e )
```

</details>

<details>
<summary>H (Hummingbird) Combinator</summary>

- **Lambda:** `λabc.abcb`
- **Purpose:** Applies a three-argument function, but uses the second argument
  twice: `a(b)(c)(b)`.

```php
use loophp\combinator\Combinators;

$h = Combinators::H();
$wrap = fn(string $tag): callable => fn(string $content): callable => fn(string $closingTag): string => "<$tag>$content</$closingTag>";

// Uses 'div' as both the opening and closing tag.
$wrapInDiv = $h($wrap)('div');

echo $wrapInDiv('Hello'); // Outputs: <div>Hello</div>
```

</details>

<details>
<summary>I (Idiot) Combinator</summary>

- **Lambda:** `λa.a`
- **Purpose:** The identity function. It returns whatever argument it receives.
  This is `id` in Haskell.

```php
use loophp\combinator\Combinators;

$i = Combinators::I();

echo $i('Hello World'); // Outputs: Hello World
echo $i(42);            // Outputs: 42
```

</details>

<details>
<summary>J (Jay) Combinator</summary>

- **Lambda:** `λabcd.ab(adc)`
- **Purpose:** A complex combinator useful for specific recursive or
  state-passing scenarios: `a(b)(a(d)(c))`.

````php
use loophp\combinator\Combinators;

$j = Combinators::J();
$log = fn(string $prefix): callable => fn(string $message): string => "[$prefix] $message";

// Creates a nested log message
// Equivalent to $log('INFO')($log('USER')('action'))
echo $j($log)('INFO')('action')('USER'); // Outputs: [INFO] [USER] action```
</details>

<details>
<summary>K (Kestrel) Combinator</summary>

*   **Lambda:** `λab.a`
*   **Purpose:** The constant function. It takes two arguments and always returns the first. This is `const` in Haskell.

```php
use loophp\combinator\Combinators;

$k = Combinators::K();
$alwaysReturns5 = $k(5);

echo $alwaysReturns5('foo'); // Outputs: 5
echo $alwaysReturns5(123);   // Outputs: 5
````

</details>

<details>
<summary>Ki (Kite) Combinator</summary>

- **Lambda:** `λab.b`
- **Purpose:** The opposite of the Kestrel. It takes two arguments and always
  returns the second.

```php
use loophp\combinator\Combinators;

$ki = Combinators::Ki();
$getSecond = $ki('ignored');

echo $getSecond('hello'); // Outputs: hello
echo $getSecond(true);    // Outputs: 1 (for true)
```

</details>

<details>
<summary>L (Lark) Combinator</summary>

- **Lambda:** `λab.a(bb)`
- **Purpose:** Applies function `a` to the result of function `b` applied to
  itself. This requires `b` to be a function that can meaningfully accept itself
  as an argument.

```php
use loophp\combinator\Combinators;

$l = Combinators::L();
$inspectType = fn(mixed $arg): string => "Argument is of type: " . gettype($arg);
$selfApplicable = fn(callable $c): string => "I am a function.";

// Equivalent to $inspectType($selfApplicable($selfApplicable))
echo $l($inspectType)($selfApplicable); // Outputs: Argument is of type: string
```

</details>

<details>
<summary>M (Mockingbird) Combinator</summary>

- **Lambda:** `λa.aa`
- **Purpose:** Self-application (also known as the `ω` combinator). It applies
  its single argument (which must be a function) to itself.

```php
use loophp\combinator\Combinators;

$m = Combinators::M();
$describe = fn(callable $c): string => "This is a closure.";

// Applies the $describe function to itself.
echo $m($describe); // Outputs: This is a closure.
```

</details>

<details>
<summary>O (Owl) Combinator</summary>

- **Lambda:** `λab.b(ab)`
- **Purpose:** A peculiar form of composition, `b(a(b))`. Useful in specific
  recursive algorithms or data structure manipulations.

```php
use loophp\combinator\Combinators;

$o = Combinators::O();
// A curried function to prepend to an array
$prepend = fn(mixed $item): callable => fn(array $list): array => [$item, ...$list];
$reverse = 'array_reverse';

// Equivalent to $reverse($prepend(3)([1, 2])) -> $reverse([3, 1, 2])
$result = $o($prepend)([1, 2])($reverse)(3);
print_r($result); // Outputs: Array ( [0] => 2 [1] => 1 [2] => 3 )
```

</details>

<details>
<summary>Omega (Ω) Combinator</summary>

- **Lambda:** `λa.(aa)(aa)`
- **Purpose:** The divergent combinator. It is constructed from the Mockingbird
  (`M`) as `MM`. When applied to _any_ function, it creates an infinitely
  recursive call that will exhaust memory. **Do not run this code.**

````php
// This will cause a fatal error due to infinite recursion.
// $omega = Combinators::Omega();
// $omega(fn($x) => $x);```
</details>

<details>
<summary>Phoenix Combinator</summary>

*   **Lambda:** `λabcd.a(bd)(cd)`
*   **Purpose:** Distributes an argument `d` across two functions `b` and `c`, then combines the results with function `a`.

```php
use loophp\combinator\Combinators;

$phoenix = Combinators::Phoenix();
$add = fn(int $x): callable => fn(int $y): int => $x + $y;
$multiplyByTwo = fn(int $x): int => $x * 2;
$multiplyByThree = fn(int $x): int => $x * 3;

// Calculates (2 * 10) + (3 * 10)
$calculate = $phoenix($add)($multiplyByTwo)($multiplyByThree);

echo $calculate(10); // Outputs: 50
````

</details>

<details>
<summary>Psi (Ψ) Combinator</summary>

- **Lambda:** `λabcd.a(bc)(bd)`
- **Purpose:** Another distribution combinator, but this one distributes a
  function `b` over two arguments `c` and `d`.

```php
use loophp\combinator\Combinators;

$psi = Combinators::Psi();
$makePair = fn(string $a): callable => fn(string $b): string => "($a, $b)";
$getName = fn(array $user): string => $user['name'];
$getEmail = fn(array $user): string => $user['email'];
$user = ['name' => 'John', 'email' => 'john@example.com'];

// Equivalent to $makePair($getName($user))($getEmail($user))
echo $psi($makePair)($getName)($getEmail)($user); // Outputs: (John, john@example.com)
```

</details>

<details>
<summary>Q (Queer) Combinator</summary>

- **Lambda:** `λabc.b(ac)`
- **Purpose:** A different form of composition, applying `b` to the result of
  `a` applied to `c`.

```php
use loophp\combinator\Combinators;

$q = Combinators::Q();
$addOne = fn(int $x): int => $x + 1;
$multiplyByTwo = fn(int $x): int => $x * 2;

// Equivalent to $multiplyByTwo($addOne(5))
$composed = $q($addOne)($multiplyByTwo);

echo $composed(5); // Outputs: 12
```

</details>

<details>
<summary>R (Robin) Combinator</summary>

- **Lambda:** `λabc.bca`
- **Purpose:** Reorders arguments for a two-argument function `b`.

```php
use loophp\combinator\Combinators;

$r = Combinators::R();
$divide = fn(int $x): callable => fn(int $y): float => $x / $y;

// Equivalent to $divide(10)(2)
echo $r(2)($divide)(10); // Outputs: 5
```

</details>

<details>
<summary>S (Starling) Combinator</summary>

- **Lambda:** `λabc.ac(bc)`
- **Purpose:** The substitution combinator. It applies a third argument `c` to
  both `a` and `b`, then applies the result of `a(c)` to the result of `b(c)`.
  It is fundamental to combinatory logic.

```php
use loophp\combinator\Combinators;

$s = Combinators::S();
$add = fn(int $x): callable => fn(int $y): int => $x + $y;
$square = fn(int $x): int => $x * $x;

// Equivalent to $add($x)($square($x)) where $x is 3. So 3 + (3*3)
echo $s($add)($square)(3); // Outputs: 12
```

</details>

<details>
<summary>S' (S Prime) Combinator</summary>

- **Lambda:** `λabc.a(bc)c`
- **Purpose:** A variation of the Starling that provides the final argument `c`
  to the outer function `a` as well. Useful for functions that need both the
  result of an operation and the original value, such as logging or debugging.

```php
use loophp\combinator\Combinators;

$s_ = Combinators::S_();
$log = fn(string $result): callable => fn(string $original): string => "Input '$original' produced '$result'";
$transform = 'strtoupper';

// Equivalent to $log(strtoupper('hello'))('hello')
$logTransformation = $s_($log)($transform);

echo $logTransformation('hello'); // Outputs: Input 'hello' produced 'HELLO'
```

</details>

<details>
<summary>S₂ (S-Two) Combinator</summary>

- **Lambda:** `λabcd.a((bd)(cd))`
- **Purpose:** Applies two different functions `b` and `c` to the same data `d`,
  and then combines their results with a third function `a`. In Haskell, this is
  similar to `liftA2`.

```php
use loophp\combinator\Combinators;

$s2 = Combinators::S2();
$combine = fn(int $product): callable => fn(int $sum): string => "Sum: $sum, Product: $product";
$sum = fn(int $x): callable => fn(int $y): int => $x + $y;
$product = fn(int $x): callable => fn(int $y): int => $x * $y;
$value = 3;

// This is a bit mind-bending. The lambda is a((bd)(cd)).
// Let's find a better example. `a` must take one argument.
$format = fn(int $result): string => "Final result is: $result";
$multiply = fn(int $x): callable => fn(int $y): int => $x * $y;
$addOne = fn(int $x): int => $x + 1;
$d = 5;

// Equivalent to $format($multiply(5)($addOne(5))) -> $format(5 * 6)
echo $s2($format)($multiply)($addOne)($d); // Outputs: Final result is: 30
```

</details>

<details>
<summary>T (Thrush) Combinator</summary>

- **Lambda:** `λab.ba`
- **Purpose:** Reverse application. Applies function `b` to argument `a`. This
  is `(&)` in Haskell and is useful for data-last programming styles.

````php
use loophp\combinator\Combinators;

$t = Combinators::T();
$multiplyByTwo = fn(int $x): int => $x * 2;

// Instead of $multiplyByTwo(5)
echo $t(5)($multiplyByTwo); // Outputs: 10
```</details>

<details>
<summary>U (Turing) Combinator</summary>

*   **Lambda:** `λab.b(aab)`
*   **Purpose:** A fixed-point combinator that can hold state. `b` is applied to `a` applied to itself applied to `b`.

```php
use loophp\combinator\Combinators;

$u = Combinators::U();
$factorialGenerator = static fn(callable $f): callable =>
    static fn(int $n): int => (0 === $n) ? 1 : $n * $f($f)($n - 1);

$factorial = $u($factorialGenerator);

echo $factorial(5); // Outputs: 120
````

</details>

<details>
<summary>V (Vireo) Combinator</summary>

- **Lambda:** `λabc.cab`
- **Purpose:** Argument swapping. Given `c`, `a`, `b`, it calls `c(a)(b)`.

```php
use loophp\combinator\Combinators;

$v = Combinators::V();
$str_replace = 'str_replace';
$search = 'foo';
$replace = 'bar';

// Creates a function that replaces 'foo' with 'bar' in a given subject string.
$replaceFoo = $v($search)($replace)($str_replace);

echo $replaceFoo('this is foo'); // Outputs: this is bar
```

</details>

<details>
<summary>W (Warbler) Combinator</summary>

- **Lambda:** `λab.abb`
- **Purpose:** Duplicates an argument. It applies function `a` to argument `b`
  twice.

```php
use loophp\combinator\Combinators;

$w = Combinators::W();
$add = fn(int $x): callable => fn(int $y): int => $x + $y;

// Equivalent to $add(5)(5)
echo $w($add)(5); // Outputs: 10
```

</details>

<details>
<summary>Y & Z (Fixed-Point) Combinators</summary>

- **Purpose:** The Y and Z combinators are used to achieve recursion in
  languages that do not have built-in recursive syntax. They are "fixed-point"
  finders for functions. The Z combinator is a variant that works in strict
  (eagerly evaluated) languages like PHP without causing infinite loops during
  construction.

```php
use loophp\combinator\Combinators;
use Closure;

// A "generator" function that describes one step of the factorial calculation.
// It takes the recursive function ($fact) as an argument.
$factorialGenerator = static fn (Closure $fact): Closure =>
    static fn (int $n): int => (0 === $n) ? 1 : ($n * $fact($n - 1));

// The Z combinator creates a recursive factorial function from the generator.
$factorial = Combinators::Z()($factorialGenerator);

echo $factorial(6); // Outputs: 720

// The Y combinator can also be used, as this library implements it in a way
// that is safe for eager evaluation.
$fibonacciGenerator = static fn (Closure $fibo): Closure =>
    static fn (int $n): int => ($n <= 1) ? $n : $fibo($n - 1) + $fibo($n - 2);

$fibonacci = Combinators::Y()($fibonacciGenerator);

echo $fibonacci(10); // Outputs: 55
```

</details>

## Suggested reading and resources

- [To Mock a Mockingbird]
- http://dkeenan.com/Lambda/
- https://gist.github.com/Avaq/1f0636ec5c8d6aed2e45
- https://en.wikipedia.org/wiki/Combinatory_logic
- https://joshmoody.org/blog/programming-with-less-than-nothing/
- https://github.com/joshmoody24/skoobert

## Contributing

Feel free to contribute by sending pull requests. We are a usually very
responsive team and we will help you going through your pull request from the
beginning to the end.

For some reasons, if you can't contribute to the code and willing to help,
sponsoring is a good, sound and safe way to show us some gratitude for the hours
we invested in this package.

Sponsor me on [Github][github sponsors link] and/or any of [the contributors].

### Thanks

- [Marco Pivetta]

### Authors

- [Pol Dellaiera]

## Changelog

See [CHANGELOG.md] for a changelog based on [git commits]. For more detailed
changelogs, please check [the release changelogs].

[1]: https://packagist.org/packages/loophp/combinator
[2]: https://github.com/loophp/combinator/actions
[3]: https://scrutinizer-ci.com/g/loophp/combinator/?branch=master
[4]: https://shepherd.dev/github/loophp/combinator
[github sponsors link]: https://github.com/sponsors/drupol
[the contributors]: https://github.com/loophp/combinator/graphs/contributors
[latest stable version]:
  https://img.shields.io/packagist/v/loophp/combinator.svg?style=flat-square
[github stars]:
  https://img.shields.io/github/stars/loophp/combinator.svg?style=flat-square
[total downloads]:
  https://img.shields.io/packagist/dt/loophp/combinator.svg?style=flat-square
[github workflow status]:
  https://img.shields.io/github/actions/workflow/status/loophp/combinator/tests.yml?branch=master&style=flat-square
[code quality]:
  https://img.shields.io/scrutinizer/quality/g/loophp/combinator/master.svg?style=flat-square
[type coverage]:
  https://img.shields.io/badge/dynamic/json?style=flat-square&color=color&label=Type%20coverage&query=message&url=https%3A%2F%2Fshepherd.dev%2Fgithub%2Floophp%2Fcombinator%2Fcoverage
[code coverage]:
  https://img.shields.io/scrutinizer/coverage/g/loophp/combinator/master.svg?style=flat-square
[license]:
  https://img.shields.io/packagist/l/loophp/combinator.svg?style=flat-square
[donate github]:
  https://img.shields.io/badge/Sponsor-Github-brightgreen.svg?style=flat-square
[donate paypal]:
  https://img.shields.io/badge/Sponsor-Paypal-brightgreen.svg?style=flat-square
[Moses Schönfinkel]: https://en.wikipedia.org/wiki/Moses_Sch%C3%B6nfinkel
[Haskell Curry]: https://en.wikipedia.org/wiki/Haskell_Curry
[11]: https://en.wikipedia.org/wiki/Fixed-point_combinator
[To Mock a Mockingbird]: https://en.wikipedia.org/wiki/To_Mock_a_Mockingbird
[Marco Pivetta]: https://github.com/ocramius
[Pol Dellaiera]: https://not-a-number.io/
[CHANGELOG.md]: https://github.com/loophp/combinator/blob/master/CHANGELOG.md
[git commits]: https://github.com/loophp/combinator/commits/master
[the release changelogs]: https://github.com/loophp/combinator/releases
[point-free programming style]: https://en.wikipedia.org/wiki/Tacit_programming
[higher-order function]: https://en.wikipedia.org/wiki/Higher-order_function
[functional programming]: https://en.wikipedia.org/wiki/Functional_programming
