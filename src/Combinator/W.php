<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * @template NewAType
 * @template NewBType
 */
final class W extends Combinator
{
    /**
     * @return Closure(callable(NewAType): callable(NewAType): NewBType): Closure(NewAType): NewBType
     */
    public function __invoke(): Closure
    {
        return
            /**
             * @param callable(NewAType): callable(NewAType): NewBType $f
             *
             * @return Closure(NewAType): NewBType
             */
            static function (callable $f): Closure {
                return
                    /**
                     * @param NewAType $x
                     *
                     * @return NewBType
                     */
                    static function ($x) use ($f) {
                        return ($f)($x)($x);
                    };
            };
    }
}
