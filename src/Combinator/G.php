<?php

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
     * @psalm-return Closure(callable(NewAType): callable(NewBType): NewCType): Closure(callable(NewDType): NewBType): Closure(NewDType): Closure(NewAType): NewCType
     */
    public function __invoke(): Closure
    {
        return
            /**
             * @param callable(NewAType): callable(NewBType): NewCType $f
             *
             * @return Closure(callable(NewDType): NewBType): Closure(NewDType): Closure(NewAType): NewCType
             */
            static function (callable $f): Closure {
                return
                    /**
                     * @param callable(NewDType): NewBType $g
                     *
                     * @return Closure(NewDType): Closure(NewAType): NewCType
                     */
                    static function (callable $g) use ($f): Closure {
                        return
                            /**
                             * @param NewDType $x
                             *
                             * @return Closure(NewAType): NewCType
                             */
                            static function ($x) use ($f, $g): Closure {
                                return
                                    /**
                                     * @param NewAType $y
                                     *
                                     * @return NewCType
                                     */
                                    static function ($y) use ($f, $g, $x) {
                                        return (($f)($y))(($g)($x));
                                    };
                            };
                    };
            };
    }
}
