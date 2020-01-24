<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\F as Combinator;

/**
 * @param string $x
 * @param int $y
 * @param callable(int): callable(string): bool $f
 *
 * @return bool
 */
function test($x, $y, callable $f)
{
    return (new Combinator($x, $y, $f))();
}
