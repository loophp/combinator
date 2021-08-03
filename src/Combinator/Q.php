<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class Q.
 *
 * @template NewAType
 * @template NewBType
 * @template NewCType
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 * phpcs:disable Generic.WhiteSpace.ScopeIndent.IncorrectExact
 */
final class Q extends Combinator
{
    /**
     * @return Closure(callable(NewAType): NewBType): Closure(callable(NewBType): NewCType):Closure(NewAType): NewCType
     */
    public function __invoke(): Closure
    {
        return
            /**
             * @param callable(NewAType): NewBType $f
             *
             * @return Closure(callable(NewBType): NewCType):Closure(NewAType): NewCType
             */
            static fn (callable $f): Closure =>
                /**
                 * @param callable(NewBType): NewCType $g
                 *
                 * @return Closure(NewAType): NewCType
                 */
                static fn (callable $g): Closure =>
                    /**
                     * @param NewAType $x
                     *
                     * @return NewCType
                     */
                    static fn (mixed $x): mixed => ($g)((($f)($x)));
    }
}
