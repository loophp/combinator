<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\T as Combinator;

/**
 * @param int $x
 * @param callable(int): string $f
 *
 * @return string
 */
function test($x, callable $f)
{
    return (new Combinator($x, $f))();
}
