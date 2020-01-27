<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\L as Combinator;

/**
 * @param callable(int): mixed $f
 * @param callable(int): mixed $g
 *
 * @return mixed
 */
function test(callable $f, callable $g)
{
    return (new Combinator($f, $g))();
}
