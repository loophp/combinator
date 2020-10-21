<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * @template NewAType
 */
final class I extends Combinator
{
    /**
     * @psalm-return Closure(NewAType): NewAType
     */
    public function __invoke(): Closure
    {
        return
            /**
             * @param NewAType $x
             *
             * @return NewAType
             */
            static function ($x) {
                return $x;
            };
    }
}
