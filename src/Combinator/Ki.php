<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * @template NewAType
 * @template NewBType
 */
final class Ki extends Combinator
{
    /**
     * @return Closure(NewAType): Closure(NewBType): NewBType
     */
    public function __invoke(): Closure
    {
        return
            /**
             * @param NewAType $x
             *
             * @return Closure(NewBType): NewBType
             */
            static fn (mixed $x): Closure =>
                /**
                 * @param NewBType $y
                 *
                 * @return NewBType
                 */
                static fn (mixed $y) => $y;
    }
}
