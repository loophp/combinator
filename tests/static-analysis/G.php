<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\G;

/**
 * @param G<int,string,bool,array> $combinator
 * @param callable(int): callable(string): bool $f
 * @param callable(array): string $g
 * @param array $x
 * @param int $y
 *
 * @return bool
 */
function test(G $combinator, callable $f, callable $g, $x, $y)
{
    return $combinator->__invoke()($f)($g)($x)($y);
}
