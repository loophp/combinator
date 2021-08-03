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
     * @return Closure(callable(NewAType): Closure(NewBType): NewCType): Closure(callable(NewAType): NewBType): Closure(NewAType): NewCType
     */
    public function __invoke(): Closure
    {
        return
            /**
             * @param callable(NewAType): (Closure(NewBType): NewCType) $f
             *
             * @return Closure(callable(NewAType): NewBType): Closure(NewAType): NewCType
             */
            static fn (callable $f): Closure =>
                /**
                 * @param callable(NewAType): NewBType $g
                 *
                 * @return Closure(NewAType): NewCType
                 */
                static fn (callable $g): Closure =>
                    /**
                     * @param NewAType $x
                     *
                     * @return NewCType
                     */
                    static fn (mixed $x): mixed => $f($x)($g($x));
    }
}
