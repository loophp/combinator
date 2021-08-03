<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\C;

/**
 * @param C<int, string, int> $combinator
 * @param callable(int): callable(string): int $f
 * @param string $x
 * @param int $y
 */
function test(C $combinator, callable $f, $x, $y): int
{
    return $combinator->__invoke()($f)($x)($y);
}
