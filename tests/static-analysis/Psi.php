<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\Psi;

/**
 * @param Psi<array,string,bool> $combinator
 * @param callable(array): callable(array): string $f
 * @param callable(bool): array $g
 * @param bool $x
 * @param bool $y
 *
 * @return string
 */
function test(Psi $combinator, callable $f, callable $g, $x, $y)
{
    return $combinator->__invoke()($f)($g)($x)($y);
}
