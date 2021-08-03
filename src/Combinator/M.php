<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

final class M extends Combinator
{
    public function __invoke(): Closure
    {
        return static fn (callable $f): mixed => $f($f);
    }
}
