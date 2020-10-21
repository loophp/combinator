<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\E;

/**
 * @param E<int,bool,iterable,array,string> $combinator
 * @param callable(int): callable(array): string $f
 * @param int $x
 * @param callable(bool): callable(iterable): array $g
 * @param bool $y
 * @param iterable $z
 *
 * @return string
 */
function test(E $combinator, callable $f, $x, callable $g, $y, $z)
{
    return $combinator->__invoke()($f)($x)($g)($y)($z);
}
