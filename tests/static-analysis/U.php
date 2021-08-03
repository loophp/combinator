<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\combinator\Tests\StaticAnalysis;

use loophp\combinator\Combinator\U;

/**
 * @param callable(callable):callable $f
 * @param callable(int): mixed $g
 *
 * @return mixed
 * @psalm-suppress MixedFunctionCall
 */
function test(U $combinator, callable $f, callable $g)
{
    return $combinator->__invoke()($f)($g);
}
