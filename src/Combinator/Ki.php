<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * @template NewAType
 * @template NewBType
 */
final class Ki extends Combinator
{
    /**
     * @return Closure(NewAType): Closure(NewBType): NewBType
     */
    public function __invoke(): Closure
    {
        return
            /**
             * @param NewAType $x
             *
             * @return Closure(NewBType): NewBType
             */
            static function ($x): Closure {
                return
                    /**
                     * @param NewBType $y
                     *
                     * @return NewBType
                     */
                    static function ($y) use ($x) {
                        return $y;
                    };
            };
    }
}
