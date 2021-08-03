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
 * Class F.
 *
 * @template NewAType
 * @template NewBType
 * @template NewCType
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 * phpcs:disable Generic.WhiteSpace.ScopeIndent.IncorrectExact
 */
final class F extends Combinator
{
    /**
     * @return Closure(NewAType): Closure(NewBType): Closure(callable(NewBType): Closure(NewAType): NewCType): NewCType
     */
    public function __invoke(): Closure
    {
        return
            /**
             * @param NewAType $x
             *
             * @return Closure(NewBType): Closure(callable(NewBType): Closure(NewAType): NewCType): NewCType
             */
            static fn (mixed $x): Closure =>
                /**
                 * @param NewBType $y
                 *
                 * @return Closure(callable(NewBType): Closure(NewAType): NewCType): NewCType
                 */
                static fn (mixed $y): Closure =>
                    /**
                     * @param callable(NewBType): (Closure(NewAType): NewCType) $f
                     *
                     * @return NewCType
                     */
                    static fn (callable $f): mixed => ($f)($y)($x);
    }
}
