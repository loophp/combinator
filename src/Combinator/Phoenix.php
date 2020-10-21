<?php

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
     * @psalm-return Closure(callable(NewAType): callable(NewBType): NewCType): Closure(callable(NewDType): NewAType): Closure(callable(NewDType): NewBType): Closure(NewDType): NewCType
     */
    public function __invoke(): Closure
    {
        return
            /**
             * @param callable(NewAType): callable(NewBType): NewCType $f
             *
             * @return Closure(callable(NewDType): NewAType): Closure(callable(NewDType): NewBType): Closure(NewDType): NewCType
             */
            static function (callable $f): Closure {
                return
                    /**
                     * @param callable(NewDType): NewAType $g
                     *
                     * @return Closure(callable(NewDType): NewBType): Closure(NewDType): NewCType
                     */
                    static function (callable $g) use ($f): Closure {
                        return
                            /**
                             * @param callable(NewDType): NewBType $h
                             *
                             * @return Closure(NewDType): NewCType
                             */
                            static function (callable $h) use ($f, $g): Closure {
                                return
                                    /**
                                     * @param NewDType $x
                                     *
                                     * @return NewCType
                                     */
                                    static function ($x) use ($f, $g, $h) {
                                        return ($f)(($g)($x))(($h)($x));
                                    };
                            };
                    };
            };
    }
}
