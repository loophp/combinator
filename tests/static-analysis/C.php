<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\C as Combinator;

/**
 * @param callable(int): callable(string): bool $f
 * @param string $x
 * @param int $y
 *
 * @return bool
 */
function test(callable $f, $x, $y)
{
    return (new Combinator($f, $x, $y))();
}
