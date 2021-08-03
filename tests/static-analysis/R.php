<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\R;

/**
 * @param R<bool,int,string> $combinator
 * @param bool $x
 * @param callable(int): (Closure(bool): (string)) $f
 * @param int $y
 *
 * @return string
 */
function test(R $combinator, $x, callable $f, $y)
{
    return $combinator->__invoke()($x)($f)($y);
}
