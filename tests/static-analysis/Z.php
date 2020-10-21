<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use Closure;
use loophp\combinator\Combinator\Z;

/**
 * @param callable(callable): Closure $f
 *
 * @psalm-suppress MixedInferredReturnType
 * @psalm-suppress MixedReturnStatement
 */
function test(Z $combinator, callable $f): Closure
{
    return $combinator->__invoke()($f);
}
