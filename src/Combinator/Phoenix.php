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
 * Class Phoenix.
 *
 * @template NewAType
 * @template NewBType
 * @template NewCType
 * @template NewDType
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 * phpcs:disable Generic.WhiteSpace.ScopeIndent.IncorrectExact
 */
final class Phoenix extends Combinator
{
    /**
     * @return Closure(callable(NewAType): callable(NewBType): NewCType): Closure(callable(NewDType): NewAType): Closure(callable(NewDType): NewBType): Closure(NewDType): NewCType
     */
    public function __invoke(): Closure
    {
        return
            /**
             * @param callable(NewAType): (callable(NewBType): NewCType) $f
             *
             * @return Closure(callable(NewDType): NewAType): Closure(callable(NewDType): NewBType): Closure(NewDType): NewCType
             */
            static fn (callable $f): Closure =>
                /**
                 * @param callable(NewDType): NewAType $g
                 *
                 * @return Closure(callable(NewDType): NewBType): Closure(NewDType): NewCType
                 */
                static fn (callable $g): Closure =>
                    /**
                     * @param callable(NewDType): NewBType $h
                     *
                     * @return Closure(NewDType): NewCType
                     */
                    static fn (callable $h): Closure =>
                        /**
                         * @param NewDType $x
                         *
                         * @return NewCType
                         */
                        static fn (mixed $x): mixed => ($f)(($g)($x))(($h)($x));
    }
}
