<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\I as Combinator;

/**
 * @param int $x
 *
 * @return int
 */
function test($x)
{
    return (new Combinator($x))();
}
