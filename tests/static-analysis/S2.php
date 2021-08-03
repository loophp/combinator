<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\S2;

/**
 * @param S2<string,bool,int,array> $combinator
 * @param callable(bool): Closure(int): array $f
 * @param callable(string): bool $g
 * @param callable(string): int $h
 * @param string $x
 *
 * @return array
 */
function test(S2 $combinator, callable $f, callable $g, callable $h, $x)
{
    return $combinator->__invoke()($f)($g)($h)($x);
}
