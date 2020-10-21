<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\O;

/**
 * @param O<int,string> $combinator
 * @param callable(callable(int): string): int $f
 * @param callable(int): string $g
 *
 * @return string
 */
function test(O $combinator, callable $f, callable $g)
{
    return $combinator->__invoke()($f)($g);
}
