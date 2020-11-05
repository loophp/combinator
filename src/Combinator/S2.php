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
     * @psalm-return Closure(callable(NewBType): Closure(NewCType): NewDType): Closure(callable(NewAType): NewBType): Closure(callable(NewAType): NewCType): Closure(NewAType): NewDType
     */
    public function __invoke(): Closure
    {
        return
            /**
             * @psalm-param callable(NewBType): Closure(NewCType): NewDType $f
             *
             * @psalm-return Closure(callable(NewAType): NewBType): Closure(callable(NewAType): NewCType): Closure(NewAType): NewDType
             */
            static function (callable $f): Closure {
                return
                    /**
                     * @psalm-param callable(NewAType): NewBType $g
                     *
                     * @psalm-return Closure(callable(NewAType): NewCType): Closure(NewAType): NewDType
                     */
                    static function (callable $g) use ($f): Closure {
                        return
                            /**
                             * @psalm-param callable(NewAType): NewCType $h
                             *
                             * @psalm-return Closure(NewAType): NewDType
                             */
                            static function (callable $h) use ($f, $g): Closure {
                                return
                                    /**
                                     * @psalm-param NewAType $x
                                     *
                                     * @psalm-return NewDType
                                     *
                                     * @param mixed $x
                                     */
                                    static function ($x) use ($f, $g, $h) {
                                        return $f($g($x))($h($x));
                                    };
                            };
                    };
            };
    }
}
