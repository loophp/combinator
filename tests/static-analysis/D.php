<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\D;

/**
 * @param D<int, array, string, bool> $combinator
 * @param callable(int): Closure(string): bool $f
 * @param int $x
 * @param callable(array): string $g
 * @param array $y
 */
function test(D $combinator, callable $f, $x, callable $g, $y): bool
{
    return $combinator->__invoke()($f)($x)($g)($y);
}
