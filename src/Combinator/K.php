<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * @template NewAType
 * @template NewBType
 */
final class K extends Combinator
{
    /**
     * @return Closure(NewAType): Closure(NewBType): NewAType
     */
    public function __invoke(): Closure
    {
        return
            /**
             * @param NewAType $x
             *
             * @return Closure(NewBType): NewAType
             */
            static fn (mixed $x): Closure =>
                /**
                 * @param NewBType $y
                 *
                 * @return NewAType
                 */
                static fn (mixed $y) => $x;
    }
}
