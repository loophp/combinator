<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\G as Combinator;

/**
 * @param callable(int): callable(string): bool $f
 * @param callable(array): string $g
 * @param array $x
 * @param int $y
 *
 * @return bool
 */
function test(callable $f, callable $g, $x, $y)
{
    return (new Combinator($f, $g, $x, $y))();
}
