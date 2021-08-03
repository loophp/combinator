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
 * Class Psi.
 *
 * @template NewAType
 * @template NewBType
 * @template NewCType
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 * phpcs:disable Generic.WhiteSpace.ScopeIndent.IncorrectExact
 */
final class Psi extends Combinator
{
    /**
     * @return Closure(callable(NewAType): callable(NewAType): NewBType): Closure(callable(NewCType): NewAType): Closure(NewCType): Closure(NewCType): NewBType
     */
    public function __invoke(): Closure
    {
        return
            /**
             * @param callable(NewAType): (callable(NewAType): NewBType) $f
             *
             * @return Closure(callable(NewCType): NewAType): Closure(NewCType): Closure(NewCType): NewBType
             */
            static fn (callable $f): Closure =>
                /**
                 * @param callable(NewCType): NewAType $g
                 *
                 * @return Closure(NewCType): Closure(NewCType): NewBType
                 */
                static fn (callable $g): Closure =>
                    /**
                     * @param NewCType $x
                     *
                     * @return Closure(NewCType): NewBType
                     */
                    static fn (mixed $x): Closure =>
                        /**
                         * @param NewCType $y
                         *
                         * @return NewBType
                         */
                        static fn (mixed $y): mixed => ($f)(($g)($x))(($g)($y));
    }
}
