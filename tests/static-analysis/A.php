<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\A as Combinator;

/**
 * @param callable(int): string $f
 * @param string $x
 *
 * @return string
 */
function test(callable $f, $x)
{
    return (new Combinator($f, $x))();
}
