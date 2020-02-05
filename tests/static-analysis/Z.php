<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use Closure;
use loophp\combinator\Combinator\Z as Combinator;

/**
 * @param callable(callable): Closure $f
 *
 * @return Closure
 */
function test(callable $f): Closure
{
    return (new Combinator($f))();
}
