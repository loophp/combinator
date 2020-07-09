<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\R as Combinator;

/**
 * @param bool $x
 * @param callable(int): (Closure(bool): (string)) $f
 * @param int $y
 *
 * @return string
 */
function test($x, callable $f, $y)
{
    return (new Combinator($x, $f, $y))();
}
