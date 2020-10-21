<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\J;

/**
 * @param J<int,string> $combinator
 * @param callable(int): Closure(string): string $f
 * @param int $x
 * @param string $y
 * @param int $z
 */
function test(J $combinator, callable $f, $x, $y, $z): string
{
    return $combinator->__invoke()($f)($x)($y)($z);
}
