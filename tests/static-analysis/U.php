<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\U;

/**
 * @param U $combinator
 * @param callable(callable):callable $f
 * @param callable(int): mixed $g
 *
 * @return mixed
 * @psalm-suppress MixedFunctionCall
 */
function test(U $combinator, callable $f, callable $g)
{
    return $combinator->__invoke()($f)($g);
}
