<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\B;

/**
 * @param B<string, int, bool> $combinator
 * @param callable(string): int $f
 * @param callable(bool): string $g
 * @param bool $x
 */
function test(B $combinator, callable $f, callable $g, $x): int
{
    return $combinator->__invoke()($f)($g)($x);
}
