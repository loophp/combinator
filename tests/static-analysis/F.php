<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\F;

/**
 * @param F<string,int,bool> $combinator
 * @param string $x
 * @param int $y
 * @param callable(int): (Closure(string): (bool)) $f
 */
function test(F $combinator, $x, $y, callable $f): bool
{
    return $combinator->__invoke()($x)($y)($f);
}
