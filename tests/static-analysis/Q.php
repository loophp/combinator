<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\Q as Combinator;

/**
 * @param callable(bool): string $f
 * @param callable(string): int $g
 * @param bool $x
 *
 * @return int
 */
function test(callable $f, callable $g, $x)
{
    return (new Combinator($f, $g, $x))();
}
