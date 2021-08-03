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
             * @return Closure(NewBType): Closure(callable(NewAType): callable(NewBType): NewCType): NewCType
             */
            static fn (mixed $x): Closure =>
                /**
                 * @param NewBType $y
                 *
                 * @return Closure(callable(NewAType): callable(NewBType): NewCType): NewCType
                 */
                static fn (mixed $y): Closure =>
                    /**
                     * @param callable(NewAType): (callable(NewBType): NewCType) $f
                     *
                     * @return NewCType
                     */
                    static fn (callable $f): mixed => (($f)($x))($y);
    }
}
