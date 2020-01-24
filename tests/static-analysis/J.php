<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\J as Combinator;

/**
 * @param callable(int): callable(string): string  $f
 * @param int $x
 * @param string $y
 * @param int $z
 *
 * @return string
 */
function test(callable $f, $x, $y, $z)
{
    return (new Combinator($f, $x, $y, $z))();
}
