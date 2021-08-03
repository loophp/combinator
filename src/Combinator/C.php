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
             * @param callable(NewAType): (callable(NewBType): NewCType) $f
             *
             * @return Closure(NewBType): Closure(NewAType): NewCType
             */
            static fn (callable $f): Closure =>
                /**
                 * @param NewBType $x
                 *
                 * @return Closure(NewAType): NewCType
                 */
                static fn (mixed $x): Closure =>
                    /**
                     * @param NewAType $y
                     *
                     * @return NewCType
                     */
                    static fn (mixed $y) => ($f)($y)($x);
    }
}
