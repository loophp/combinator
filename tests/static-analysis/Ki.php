<?php

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\Ki;

/**
 * @param Ki<int, string> $combinator
 * @param int $x
 * @param string $y
 *
 * @return string
 */
function test(Ki $combinator, $x, $y)
{
    return $combinator->__invoke()($x)($y);
}
