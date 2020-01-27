<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\H as Combinator;

/**
 * @param callable(array): callable(bool): callable(array): string $f
 * @param array $x
 * @param bool $y
 *
 * @return string
 */
function test(callable $f, $x, $y)
{
    return (new Combinator($f, $x, $y))();
}
