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
             * @param callable(NewAType): (Closure(NewBType): (Closure(NewAType): NewCType)) $f
             *
             * @return Closure(NewAType): Closure(NewBType): NewCType
             */
            static fn (callable $f): Closure =>
                /**
                 * @param NewAType $x
                 *
                 * @return Closure(NewBType): NewCType
                 */
                static fn (mixed $x): Closure =>
                    /**
                     * @param NewBType $y
                     *
                     * @return NewCType
                     */
                    static fn (mixed $y): mixed => ((($f)($x))($y))($x);
    }
}
