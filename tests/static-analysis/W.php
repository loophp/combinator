<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\W;

/**
 * @param W<bool, string> $combinator
 * @param callable(bool): callable(bool): string $f
 * @param bool $x
 *
 * @return string
 */
function test(W $combinator, callable $f, $x)
{
    return $combinator->__invoke()($f)($x);
}
