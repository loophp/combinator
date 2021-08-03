<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\V;

/**
 * @param V<int,string,bool> $combinator
 * @param int $x
 * @param string $y
 * @param callable(int): callable(string): bool $f
 *
 * @return bool
 */
function test(V $combinator, $x, $y, callable $f)
{
    return $combinator->__invoke()($x)($y)($f);
}
