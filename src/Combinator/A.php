<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * @template NewAType
 * @template NewBType
 */
final class A extends Combinator
{
    /**
     * @return Closure(callable(NewAType): NewBType): Closure(NewAType): NewBType
     */
    public function __invoke(): Closure
    {
        return
            /**
             * @psalm-param callable(NewAType): NewBType $f
             *
             * @psalm-return Closure(NewAType): NewBType
             */
            static function (callable $f): Closure {
                return
                    /**
                     * @param mixed $x
                     * @psalm-param NewAType $x
                     *
                     * @psalm-return NewBType
                     */
                    static function ($x) use ($f) {
                        return ($f)($x);
                    };
            };
    }
}
