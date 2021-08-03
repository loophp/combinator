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
 * Class J.
 *
 * @template NewAType
 * @template NewBType
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 * phpcs:disable Generic.WhiteSpace.ScopeIndent.IncorrectExact
 */
final class J extends Combinator
{
    /**
     * @return Closure(callable(NewAType): Closure(NewBType): NewBType): Closure(NewAType):(Closure(NewBType):(Closure(NewAType):(NewBType)))
     */
    public function __invoke(): Closure
    {
        return
            /**
             * @param callable(NewAType): (Closure(NewBType): NewBType) $f
             *
             * @return Closure(NewAType): Closure(NewBType): Closure(NewAType): NewBType
             */
            static fn (callable $f): Closure =>
                /**
                 * @param NewAType $x
                 *
                 * @return Closure(NewBType): Closure(NewAType): NewBType
                 */
                static fn (mixed $x): Closure =>
                    /**
                     * @param NewBType $y
                     *
                     * @return Closure(NewAType): NewBType
                     */
                    static fn (mixed $y): Closure =>
                        /**
                         * @param NewAType $z
                         *
                         * @return NewBType
                         */
                        static fn (mixed $z): mixed => (($f)($x))((($f)($z))($y));
    }
}
