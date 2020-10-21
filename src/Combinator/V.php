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
final class V extends Combinator
{
    /**
     * @return Closure(NewAType): Closure(NewBType): Closure(callable(NewAType): callable(NewBType): NewCType): NewCType
     */
    public function __invoke(): Closure
    {
        return
            /**
             * @param NewAType $x
             *
             * @psalm-return Closure(NewBType): Closure(callable(NewAType): callable(NewBType): NewCType): NewCType
             */
            static function ($x): Closure {
                return
                    /**
                     * @param NewBType $y
                     *
                     * @psalm-return Closure(callable(NewAType): callable(NewBType): NewCType): NewCType
                     */
                    static function ($y) use ($x): Closure {
                        return
                            /**
                             * @psalm-param callable(NewAType): callable(NewBType): NewCType $f
                             *
                             * @psalm-return NewCType
                             */
                            static function (callable $f) use ($x, $y) {
                                return (($f)($x))($y);
                            };
                    };
            };
    }
}
