<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\I;

/**
 * @param I<int> $combinator
 * @param int $x
 */
function test(I $combinator, $x): int
{
    return $combinator->__invoke()($x);
}
