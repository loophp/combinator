<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use Closure;
use loophp\combinator\Combinator\Y as Combinator;

/**
 * @param callable(callable): Closure $f
 */
function test(callable $f): Closure
{
    return (new Combinator($f))();
}
