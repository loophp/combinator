<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\T;

/**
 * @param T<int,string> $combinator
 * @param int $x
 * @param callable(int): string $f
 *
 * @return string
 */
function test(T $combinator, $x, callable $f)
{
    return $combinator->__invoke()($x)($f);
}
