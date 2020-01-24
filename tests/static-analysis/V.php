<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\V as Combinator;

/**
 * @param int $x
 * @param string $y
 * @param callable(int): callable(string): bool $f
 *
 * @return bool
 */
function test($x, $y, callable $f)
{
    return (new Combinator($x, $y, $f))();
}
