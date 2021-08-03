<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\M;

/**
 * @param callable(int): mixed $f
 */
function test(M $combinator, callable $f): mixed
{
    return $combinator->__invoke()($f);
}
