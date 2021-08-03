<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

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
