<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\O as Combinator;

/**
 * @param callable(callable(int): string): int $f
 * @param callable(int): string $g
 *
 * @return string
 */
function test(callable $f, callable $g)
{
    return (new Combinator($f, $g))();
}
