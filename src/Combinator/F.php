<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class F.
 *
 * @template NewAType
 * @template NewBType
 * @template NewCType
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 * phpcs:disable Generic.WhiteSpace.ScopeIndent.IncorrectExact
 */
final class F extends Combinator
{
    /**
     * @psalm-return Closure(NewAType): Closure(NewBType): Closure(callable(NewBType): Closure(NewAType): NewCType): NewCType
     */
    public function __invoke(): Closure
    {
        return
            /**
             * @param NewAType $x
             *
             * @return Closure(NewBType): Closure(callable(NewBType): Closure(NewAType): NewCType): NewCType
             */
            static function ($x): Closure {
                return
                    /**
                     * @param NewBType $y
                     *
                     * @return Closure(callable(NewBType): Closure(NewAType): NewCType): NewCType
                     */
                    static function ($y) use ($x): Closure {
                        return
                            /**
                             * @param callable(NewBType): Closure(NewAType): NewCType $f
                             *
                             * @return NewCType
                             */
                            static function (callable $f) use ($x, $y) {
                                return ($f)($y)($x);
                            };
                    };
            };
    }
}
