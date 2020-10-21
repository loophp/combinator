<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class O.
 *
 * @template NewAType
 * @template NewBType
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 * phpcs:disable Generic.WhiteSpace.ScopeIndent.IncorrectExact
 */
final class O extends Combinator
{
    /**
     * @return Closure(callable(callable(NewAType): NewBType): NewAType): Closure(callable(NewAType): (NewBType)): (NewBType)
     */
    public function __invoke(): Closure
    {
        return
            /**
             * @param callable(callable(NewAType): NewBType): NewAType $f
             *
             * @return Closure(callable(NewAType): NewBType): NewBType
             */
            static function (callable $f): Closure {
                return
                    /**
                     * @param callable(NewAType): NewBType $g
                     *
                     * @return NewBType
                     */
                    static function (callable $g) use ($f) {
                        return ($g)((($f)($g)));
                    };
            };
    }
}
