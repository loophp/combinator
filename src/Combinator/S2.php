<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class S2.
 *
 * @template NewAType
 * @template NewBType
 * @template NewCType
 * @template NewDType
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 * phpcs:disable Generic.WhiteSpace.ScopeIndent.IncorrectExact
 */
final class S2 extends Combinator
{
    /**
     * @return Closure(callable(NewBType): Closure(NewCType): NewDType): Closure(callable(NewAType): NewBType): Closure(callable(NewAType): NewCType): Closure(NewAType): NewDType
     */
    public function __invoke(): Closure
    {
        return
            /**
             * @param callable(NewBType): (Closure(NewCType): NewDType) $f
             *
             * @return Closure(callable(NewAType): NewBType): Closure(callable(NewAType): NewCType): Closure(NewAType): NewDType
             */
            static fn (callable $f): Closure =>
                /**
                 * @param callable(NewAType): NewBType $g
                 *
                 * @return Closure(callable(NewAType): NewCType): Closure(NewAType): NewDType
                 */
                static fn (callable $g): Closure =>
                    /**
                     * @param callable(NewAType): NewCType $h
                     *
                     * @return Closure(NewAType): NewDType
                     */
                    static fn (callable $h): Closure =>
                        /**
                         * @param NewAType $x
                         *
                         * @return NewDType
                         */
                        static fn (mixed $x): mixed => $f($g($x))($h($x));
    }
}
