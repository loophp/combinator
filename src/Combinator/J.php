<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class J.
 *
 * @template NewAType
 * @template NewBType
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 * phpcs:disable Generic.WhiteSpace.ScopeIndent.IncorrectExact
 */
final class J extends Combinator
{
    /**
     * @return Closure(callable(NewAType): Closure(NewBType): NewBType): Closure(NewAType):(Closure(NewBType):(Closure(NewAType):(NewBType)))
     */
    public function __invoke(): Closure
    {
        return
            /**
             * @param callable(NewAType): Closure(NewBType): NewBType $f
             *
             * @return Closure(NewAType): Closure(NewBType): Closure(NewAType): NewBType
             */
            static function (callable $f): Closure {
                return
                    /**
                     * @param NewAType $x
                     *
                     * @return Closure(NewBType): Closure(NewAType): NewBType
                     */
                    static function ($x) use ($f): Closure {
                        return
                            /**
                             * @param NewBType $y
                             *
                             * @return Closure(NewAType): NewBType
                             */
                            static function ($y) use ($f, $x): Closure {
                                return
                                    /**
                                     * @param NewAType $z
                                     *
                                     * @return NewBType
                                     */
                                    static function ($z) use ($f, $x, $y) {
                                        return (($f)($x))((($f)($z))($y));
                                    };
                            };
                    };
            };
    }
}
