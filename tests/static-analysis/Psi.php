<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\Psi as Combinator;

/**
 * @param callable(array): callable(array): string $f
 * @param callable(bool): array $g
 * @param bool $x
 * @param bool $y
 *
 * @return string
 */
function test(callable $f, callable $g, $x, $y)
{
    return (new Combinator($f, $g, $x, $y))();
}
