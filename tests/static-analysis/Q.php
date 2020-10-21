<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\Q;

/**
 * @param Q<bool,string,int> $combinator
 * @param callable(bool): string $f
 * @param callable(string): int $g
 * @param bool $x
 *
 * @return int
 */
function test(Q $combinator, callable $f, callable $g, $x)
{
    return $combinator->__invoke()($f)($g)($x);
}
