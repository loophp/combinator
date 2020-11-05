<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class S_.
 *
 * @template NewAType
 * @template NewBType
 * @template NewCType
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 * phpcs:disable Generic.WhiteSpace.ScopeIndent.IncorrectExact
 * phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps
 */
final class S_ extends Combinator
{
    /**
     * @psalm-return Closure(callable(NewAType): Closure(NewBType): NewCType): Closure(callable(NewBType): NewAType): Closure(NewBType): NewCType
     */
    public function __invoke(): Closure
    {
        return
            /**
             * @psalm-param callable(NewAType): Closure(NewBType): NewCType $f
             *
             * @psalm-return Closure(callable(NewBType): NewAType): Closure(NewBType): NewCType
             */
            static function (callable $f): Closure {
                return
                    /**
                     * @psalm-param callable(NewBType): NewAType $g
                     *
                     * @psalm-return Closure(NewBType): NewCType
                     */
                    static function (callable $g) use ($f): Closure {
                        return
                            /**
                             * @psalm-param NewBType $x
                             *
                             * @psalm-return NewCType
                             *
                             * @param mixed $x
                             */
                            static function ($x) use ($f, $g) {
                                return $f($g($x))($x);
                            };
                    };
            };
    }
}
