<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\A;

/**
 * @psalm-param A<int, string> $combinator
 *
 * @psalm-param callable(int): string $f
 *
 * @param int $x
 *
 * @psalm-return string
 */
function test(A $combinator, callable $f, $x): string
{
    return $combinator->__invoke()($f)($x);
}
