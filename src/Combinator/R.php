<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * @template NewAType
 * @template NewBType
 * @template NewCType
 */
final class R extends Combinator
{
    /**
     * @return Closure(NewAType): Closure(callable(NewBType): Closure(NewAType): NewCType): Closure(NewBType): NewCType
     */
    public function __invoke(): Closure
    {
        return
            /**
             * @param NewAType $x
             *
             * @return Closure(callable(NewBType): Closure(NewAType): NewCType): Closure(NewBType): NewCType
             */
            static function ($x): Closure {
                return
                    /**
                     * @psalm-param callable(NewBType): Closure(NewAType): NewCType $f
                     *
                     * @return Closure(NewBType): NewCType
                     */
                    static function (callable $f) use ($x): Closure {
                        return
                            /**
                             * @param NewBType $y
                             *
                             * @return NewCType
                             */
                            static function ($y) use ($x, $f) {
                                return (($f)($y))($x);
                            };
                    };
            };
    }
}
