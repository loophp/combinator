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
             * @param callable(NewAType): Closure(NewCType): NewDType $f
             *
             * @return Closure(NewAType): Closure(callable(NewBType): NewCType): Closure(NewBType): NewDType
             */
            static function (callable $f): Closure {
                return
                    /**
                     * @param NewAType $x
                     *
                     * @return Closure(callable(NewBType): NewCType): Closure(NewBType): NewDType
                     */
                    static function ($x) use ($f): Closure {
                        return
                            /**
                             * @param callable(NewBType): NewCType $g
                             *
                             * @return Closure(NewBType): NewDType
                             */
                            static function (callable $g) use ($f, $x): Closure {
                                return
                                    /**
                                     * @param NewBType $y
                                     *
                                     * @return NewDType
                                     */
                                    static function ($y) use ($f, $x, $g) {
                                        return (($f)($x))(($g)($y));
                                    };
                            };
                    };
            };
    }
}
