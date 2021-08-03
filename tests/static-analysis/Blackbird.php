<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\Blackbird;

/**
 * @param Blackbird<int, int, int, int> $combinator
 * @param callable(int): int $f
 * @param callable(string): Closure(string): int $g
 * @param string $h
 * @param string $x
 */
function test(Blackbird $combinator, callable $f, callable $g, int $h, int $x): int
{
    return $combinator->__invoke()($f)($g)($h)($x);
}
