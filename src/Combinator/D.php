<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class D.
 *
 * @template NewAType
 * @template NewBType
 * @template NewCType
 * @template NewDType
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 * phpcs:disable Generic.WhiteSpace.ScopeIndent.IncorrectExact
 */
final class D extends Combinator
{
    /**
     * @return Closure(callable(NewAType): Closure(NewCType): NewDType): Closure(NewAType): Closure(callable(NewBType): NewCType): Closure(NewBType): NewDType
     */
    public function __invoke(): Closure
    {
        return
            /**
             * @param callable(NewAType): (Closure(NewCType): NewDType) $f
             *
             * @return Closure(NewAType): Closure(callable(NewBType): NewCType): Closure(NewBType): NewDType
             */
            static fn (callable $f): Closure =>
                /**
                 * @param NewAType $x
                 *
                 * @return Closure(callable(NewBType): NewCType): Closure(NewBType): NewDType
                 */
                static fn (mixed $x): Closure =>
                    /**
                     * @param callable(NewBType): NewCType $g
                     *
                     * @return Closure(NewBType): NewDType
                     */
                    static fn (callable $g): Closure =>
                        /**
                         * @param NewBType $y
                         *
                         * @return NewDType
                         */
                        static fn (mixed $y): mixed => (($f)($x))(($g)($y));
    }
}
