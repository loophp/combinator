<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class C.
 *
 * @template NewAType
 * @template NewBType
 * @template NewCType
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 */
final class C extends Combinator
{
    /**
     * @return Closure(callable(NewAType): callable(NewBType): NewCType): Closure(NewBType): Closure(NewAType): NewCType
     */
    public function __invoke(): Closure
    {
        return
        /**
         * @param callable(NewAType): callable(NewBType): NewCType $f
         *
         * @return Closure(NewBType): Closure(NewAType): NewCType
         */
        static function (callable $f): Closure {
            return
                /**
                 * @param NewBType $x
                 *
                 * @return Closure(NewAType):(NewCType)
                 */
                static function ($x) use ($f): Closure {
                    return
                        /**
                         * @param NewAType $y
                         *
                         * @return NewCType
                         */
                        static function ($y) use ($f, $x) {
                            return ($f)($y)($x);
                        };
                };
        };
    }
}
