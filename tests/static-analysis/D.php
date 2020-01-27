<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\D as Combinator;

/**
 * @param callable(int): callable(string): bool $f
 * @param int $x
 * @param callable(array): string $g
 * @param array $y
 *
 * @return bool
 */
function test(callable $f, $x, callable $g, $y)
{
    return (new Combinator($f, $x, $g, $y))();
}
