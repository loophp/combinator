<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\Ki as Combinator;

/**
 * @param int $x
 * @param string $y
 *
 * @return string
 */
function test($x, $y)
{
    return (new Combinator($x, $y))();
}
