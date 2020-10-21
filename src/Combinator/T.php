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
     * @psalm-return Closure(NewAType): Closure(callable(NewAType): NewBType): NewBType
     */
    public function __invoke(): Closure
    {
        return
            /**
             * @param NewAType $x
             *
             * @psalm-return Closure(callable(NewAType): NewBType): NewBType
             */
            static function ($x): Closure {
                return
                    /**
                     * @param callable(NewAType): NewBType $f
                     *
                     * @psalm-return NewBType
                     */
                    static function (callable $f) use ($x) {
                        return ($f)($x);
                    };
            };
    }
}
