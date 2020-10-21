<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\L;

/**
 * @param L $combinator
 *
 * @return mixed
 * @psalm-suppress MixedFunctionCall
 */
function test(L $combinator, callable $f, callable $g)
{
    return $combinator->__invoke()($f)($g);
}
