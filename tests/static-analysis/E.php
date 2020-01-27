<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\E as Combinator;

/**
 * @param callable(int): callable(array): string $f
 * @param int $x
 * @param callable(bool): callable(iterable): array $g
 * @param bool $y
 * @param iterable $z
 *
 * @return string
 */
function test(callable $f, $x, callable $g, $y, $z)
{
    return (new Combinator($f, $x, $g, $y, $z))();
}
