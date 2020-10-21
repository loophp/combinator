<?php

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
             * @param callable(NewAType): callable(NewAType): NewBType $f
             *
             * @return Closure(callable(NewCType): NewAType): Closure(NewCType): Closure(NewCType): NewBType
             */
            static function (callable $f): Closure {
                return
                    /**
                     * @param callable(NewCType): NewAType $g
                     *
                     * @return Closure(NewCType): Closure(NewCType): NewBType
                     */
                    static function (callable $g) use ($f): Closure {
                        return
                            /**
                             * @param NewCType $x
                             *
                             * @return Closure(NewCType): NewBType
                             */
                            static function ($x) use ($f, $g): Closure {
                                return
                                    /**
                                     * @param NewCType $y
                                     *
                                     * @return NewBType
                                     */
                                    static function ($y) use ($f, $g, $x) {
                                        return ($f)(($g)($x))(($g)($y));
                                    };
                            };
                    };
            };
    }
}
