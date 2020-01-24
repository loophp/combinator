<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\Phoenix as Combinator;

/**
 * @param callable(array): callable(int): string $f
 * @param callable(bool): array $g
 * @param callable(bool): int $h
 * @param bool $x
 *
 * @return string
 */
function test(callable $f, callable $g, callable $h, $x)
{
    return (new Combinator($f, $g, $h, $x))();
}
