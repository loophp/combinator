<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\Y as Combinator;

/**
 * @param callable(int): callable $f
 *
 * @return callable
 */
function test(callable $f)
{
    return (new Combinator($f))();
}
