<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\B as Combinator;

/**
 * @param callable(int): string $f
 * @param callable(bool): int $g
 * @param bool $x
 *
 * @return string
 */
function test(callable $f, callable $g, $x)
{
    return (new Combinator($f, $g, $x))();
}
