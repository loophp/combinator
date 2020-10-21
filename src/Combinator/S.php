<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class S.
 *
 * @template NewAType
 * @template NewBType
 * @template NewCType
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 * phpcs:disable Generic.WhiteSpace.ScopeIndent.IncorrectExact
 */
final class S extends Combinator
{
    /**
     * @psalm-return Closure(callable(NewAType): Closure(NewBType): NewCType): Closure(callable(NewAType): NewBType): Closure(NewAType): NewCType
     */
    public function __invoke(): Closure
    {
        return
            /**
             * @psalm-param callable(NewAType): Closure(NewBType): NewCType $f
             *
             * @psalm-return Closure(callable(NewAType): NewBType): Closure(NewAType): NewCType
             */
            static function (callable $f): Closure {
                return
                    /**
                     * @param callable(NewAType): NewBType $g
                     *
                     * @return Closure(NewAType): NewCType
                     */
                    static function (callable $g) use ($f): Closure {
                        return
                            /**
                             * @param NewAType $x
                             *
                             * @return NewCType
                             */
                            static function ($x) use ($f, $g) {
                                return $f($x)($g($x));
                            };
                    };
            };
    }
}
