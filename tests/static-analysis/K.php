<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\K as Combinator;

/**
 * @param string $x
 * @param int $y
 *
 * @return int
 */
function test($x, $y)
{
    return (new Combinator($x, $y))();
}
