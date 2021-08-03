<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

final class U extends Combinator
{
    /**
     * @suppress MissingClosureReturnType
     * @suppress MissingClosureParamType
     * @suppress MixedArgumentTypeCoercion
     */
    public function __invoke(): Closure
    {
        return
            /**
             * @param callable(callable): callable $f
             *
             * @return Closure(callable): mixed
             */
            static fn (callable $f): Closure => static fn (callable $g): mixed => $g(($f($f))($g));
    }
}
