<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\S as Combinator;

/**
 * @param callable(string): callable(bool): int $f
 * @param callable(string): bool $g
 * @param string $x
 *
 * @return int
 */
function test(callable $f, callable $g, $x)
{
    return (new Combinator($f, $g, $x))();
}
