<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\H;

/**
 * @param H<array, bool,string> $combinator
 * @param callable(array): (Closure(bool): (Closure(array): (string))) $f
 * @param array $x
 * @param bool $y
 */
function test(H $combinator, callable $f, $x, $y): string
{
    return $combinator->__invoke()($f)($x)($y);
}
