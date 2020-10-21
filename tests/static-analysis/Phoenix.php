<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\Phoenix;

/**
 * @param Phoenix<array,int,string,bool> $combinator
 * @param callable(array): callable(int): string $f
 * @param callable(bool): array $g
 * @param callable(bool): int $h
 * @param bool $x
 *
 * @return string
 */
function test(Phoenix $combinator, callable $f, callable $g, callable $h, $x)
{
    return $combinator->__invoke()($f)($g)($h)($x);
}
