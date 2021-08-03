<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * @template NewAType
 * @template NewBType
 */
final class T extends Combinator
{
    /**
     * @return Closure(NewAType): Closure(callable(NewAType): NewBType): NewBType
     */
    public function __invoke(): Closure
    {
        return
            /**
             * @param NewAType $x
             *
             * @return Closure(callable(NewAType): NewBType): NewBType
             */
            static fn (mixed $x): Closure =>
                /**
                 * @param callable(NewAType): NewBType $f
                 *
                 * @return NewBType
                 */
                static fn (callable $f): mixed => ($f)($x);
    }
}
