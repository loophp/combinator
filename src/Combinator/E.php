<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class E.
 *
 * @template NewAType
 * @template NewBType
 * @template NewCType
 * @template NewDType
 * @template NewEType
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 * phpcs:disable Generic.WhiteSpace.ScopeIndent.IncorrectExact
 */
final class E extends Combinator
{
    /**
     * @return Closure(callable(NewAType): callable(NewDType): NewEType): Closure(NewAType): Closure(callable(NewBType): callable(NewCType): NewDType): Closure(NewBType): Closure(NewCType): NewEType
     */
    public function __invoke(): Closure
    {
        return
            /**
             * @param callable(NewAType): (callable(NewDType): NewEType) $f
             *
             * @return Closure(NewAType): Closure(callable(NewBType): callable(NewCType): NewDType): Closure(NewBType): Closure(NewCType): NewEType
             */
            static fn (callable $f): Closure =>
                /**
                 * @param NewAType $x
                 *
                 * @return Closure(callable(NewBType): callable(NewCType): NewDType): Closure(NewBType): Closure(NewCType): NewEType
                 */
                static fn (mixed $x): Closure =>
                    /**
                     * @param callable(NewBType): (callable(NewCType): NewDType) $g
                     *
                     * @return Closure(NewBType): Closure(NewCType): NewEType
                     */
                    static fn (callable $g): Closure =>
                        /**
                         * @param NewBType $y
                         *
                         * @return Closure(NewCType): NewEType
                         */
                        static fn (mixed $y): Closure =>
                            /**
                             * @param NewCType $z
                             *
                             * @return NewEType
                             */
                            static fn (mixed $z): mixed => (($f)($x))((($g)($y))($z));
    }
}
