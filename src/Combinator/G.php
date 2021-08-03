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
 * Class G.
 *
 * @template NewAType
 * @template NewBType
 * @template NewCType
 * @template NewDType
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 * phpcs:disable Generic.WhiteSpace.ScopeIndent.IncorrectExact
 */
final class G extends Combinator
{
    /**
     * @return Closure(callable(NewAType): callable(NewBType): NewCType): Closure(callable(NewDType): NewBType): Closure(NewDType): Closure(NewAType): NewCType
     */
    public function __invoke(): Closure
    {
        return
            /**
             * @param callable(NewAType): (callable(NewBType): NewCType) $f
             *
             * @return Closure(callable(NewDType): NewBType): Closure(NewDType): Closure(NewAType): NewCType
             */
            static fn (callable $f): Closure =>
                /**
                 * @param callable(NewDType): NewBType $g
                 *
                 * @return Closure(NewDType): Closure(NewAType): NewCType
                 */
                static fn (callable $g): Closure =>
                    /**
                     * @param NewDType $x
                     *
                     * @return Closure(NewAType): NewCType
                     */
                    static fn (mixed $x): Closure =>
                        /**
                         * @param NewAType $y
                         *
                         * @return NewCType
                         */
                        static fn (mixed $y): mixed => (($f)($y))(($g)($x));
    }
}
