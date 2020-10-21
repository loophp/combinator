<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\A;

/**
 * @psalm-param A<int, string> $combinator
 *
 * @psalm-param callable(int): string $f
 *
 * @param int $x
 *
 * @psalm-return string
 */
function test(A $combinator, callable $f, $x): string
{
    return $combinator->__invoke()($f)($x);
}
