<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\K;

/**
 * @param K<string, int> $combinator
 * @param string $x
 * @param int $y
 *
 * @return string
 */
function test(K $combinator, $x, $y)
{
    return $combinator->__invoke()($x)($y);
}
