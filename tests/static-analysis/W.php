<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\W as Combinator;

/**
 * @param callable(bool): callable(bool): string $f
 * @param bool $x
 *
 * @return string
 */
function test(callable $f, $x)
{
    return (new Combinator($f, $x))();
}
