<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\S_;

/**
 * @param S_<string,bool,int> $combinator
 * @param callable(string): Closure(bool): int $f
 * @param callable(bool): string $g
 * @param bool $x
 *
 * @return int
 */
function test(S_ $combinator, callable $f, callable $g, $x)
{
    return $combinator->__invoke()($f)($g)($x);
}
