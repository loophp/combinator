<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\Psi as Combinator;

/**
 * @param callable(int) : callable(int) $f
 * @param callable(int) : int $g
 * @param int $x
 * @param int $y
 *
 * @return int
 */
function test(callable $f, callable $g, $x, $y)
{
    return (new Combinator($f, $g, $x, $y))();
}
