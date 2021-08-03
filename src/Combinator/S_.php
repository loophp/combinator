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
 * Class S_.
 *
 * @template NewAType
 * @template NewBType
 * @template NewCType
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 * phpcs:disable Generic.WhiteSpace.ScopeIndent.IncorrectExact
 * phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps
 */
final class S_ extends Combinator
{
    /**
     * @return Closure(callable(NewAType): Closure(NewBType): NewCType): Closure(callable(NewBType): NewAType): Closure(NewBType): NewCType
     */
    public function __invoke(): Closure
    {
        return
            /**
             * @param callable(NewAType): (Closure(NewBType): NewCType) $f
             *
             * @return Closure(callable(NewBType): NewAType): Closure(NewBType): NewCType
             */
            static fn (callable $f): Closure =>
                /**
                 * @param callable(NewBType): NewAType $g
                 *
                 * @return Closure(NewBType): NewCType
                 */
                static fn (callable $g): Closure =>
                    /**
                     * @param NewBType $x
                     *
                     * @return NewCType
                     */
                    static fn (mixed $x): mixed => $f($g($x))($x);
    }
}
