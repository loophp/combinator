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
             * @param callable(NewAType): callable(NewDType): NewEType $f
             *
             * @return Closure(NewAType): Closure(callable(NewBType): callable(NewCType): NewDType): Closure(NewBType): Closure(NewCType): NewEType
             */
            static function (callable $f): Closure {
                return
                    /**
                     * @param NewAType $x
                     *
                     * @return Closure(callable(NewBType): callable(NewCType): NewDType): Closure(NewBType): Closure(NewCType): NewEType
                     */
                    static function ($x) use ($f): Closure {
                        return
                            /**
                             * @param callable(NewBType): callable(NewCType): NewDType $g
                             *
                             * @return Closure(NewBType): Closure(NewCType): NewEType
                             */
                            static function (callable $g) use ($f, $x): Closure {
                                return
                                    /**
                                     * @param NewBType $y
                                     *
                                     * @return Closure(NewCType): NewEType
                                     */
                                    static function ($y) use ($f, $x, $g): Closure {
                                        return
                                            /**
                                             * @param NewCType $z
                                             *
                                             * @return NewEType
                                             */
                                            static function ($z) use ($f, $x, $g, $y) {
                                                return (($f)($x))((($g)($y))($z));
                                            };
                                    };
                            };
                    };
            };
    }
}
