<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\Psi;

/**
 * @param Psi<array,string,bool> $combinator
 * @param callable(array): callable(array): string $f
 * @param callable(bool): array $g
 * @param bool $x
 * @param bool $y
 *
 * @return string
 */
function test(Psi $combinator, callable $f, callable $g, $x, $y)
{
    return $combinator->__invoke()($f)($g)($x)($y);
}
