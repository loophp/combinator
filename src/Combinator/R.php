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
            static fn (mixed $x): Closure =>
                /**
                 * @param callable(NewBType): (Closure(NewAType): NewCType) $f
                 *
                 * @return Closure(NewBType): NewCType
                 */
                static fn (callable $f): Closure =>
                    /**
                     * @param NewBType $y
                     *
                     * @return NewCType
                     */
                    static fn (mixed $y): mixed => (($f)($y))($x);
    }
}
