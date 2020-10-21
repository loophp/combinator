<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class H.
 *
 * @template NewAType
 * @template NewBType
 * @template NewCType
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 * phpcs:disable Generic.WhiteSpace.ScopeIndent.IncorrectExact
 */
final class H extends Combinator
{
    /**
     * @return Closure(callable(NewAType): Closure(NewBType): Closure(NewAType): NewCType): Closure(NewAType): Closure(NewBType): NewCType
     */
    public function __invoke(): Closure
    {
        return
            /**
             * @param callable(NewAType): Closure(NewBType): Closure(NewAType): NewCType $f
             *
             * @return Closure(NewAType): Closure(NewBType): NewCType
             */
            static function (callable $f): Closure {
                return
                    /**
                     * @param NewAType $x
                     *
                     * @return Closure(NewBType): NewCType
                     */
                    static function ($x) use ($f): Closure {
                        return
                            /**
                             * @param NewBType $y
                             *
                             * @return NewCType
                             */
                            static function ($y) use ($f, $x) {
                                return ((($f)($x))($y))($x);
                            };
                    };
            };
    }
}
