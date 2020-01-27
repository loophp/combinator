<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\M as Combinator;

/**
 * @param callable(int): mixed $f
 *
 * @return mixed
 */
function test(callable $f)
{
    return (new Combinator($f))();
}
