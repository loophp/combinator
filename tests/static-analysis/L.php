<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\L;

/**
 * @return mixed
 * @psalm-suppress MixedFunctionCall
 */
function test(L $combinator, callable $f, callable $g)
{
    return $combinator->__invoke()($f)($g);
}
