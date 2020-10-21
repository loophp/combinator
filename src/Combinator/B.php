<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class B.
 *
 * @template NewAType
 * @template NewBType
 * @template NewCType
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 */
final class B extends Combinator
{
    /**
     * @return Closure(callable(NewAType): NewBType): Closure(callable(NewCType): NewAType): Closure(NewCType): NewBType
     */
    public function __invoke(): Closure
    {
        return
            /**
             * @param callable(NewAType): NewBType $f
             *
             * @return Closure(callable(NewCType): NewAType): Closure(NewCType): NewBType
             */
            static function (callable $f): Closure {
                return
                    /**
                     * @param callable(NewCType): NewAType $g
                     *
                     * @return Closure(NewCType): NewBType
                     */
                    static function (callable $g) use ($f): Closure {
                        return
                            /**
                             * @param NewCType $x
                             *
                             * @return NewBType
                             */
                            static function ($x) use ($f, $g) {
                                return ($f)(($g)($x));
                            };
                    };
            };
    }
}
