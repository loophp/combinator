<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\M;

/**
 * @param M $combinator
 * @param callable(int): mixed $f
 *
 * @return mixed
 */
function test(M $combinator, callable $f)
{
    return $combinator->__invoke()($f);
}
