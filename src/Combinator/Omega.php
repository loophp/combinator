<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

final class Omega extends Combinator
{
    public function __invoke(): Closure
    {
        return
            /**
             * @param callable(callable): (callable(callable): callable) $f
             */
            static fn (callable $f): mixed => ($f)($f)(($f)($f));
    }
}
