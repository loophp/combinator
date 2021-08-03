<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class Blackbird.
 *
 * @template NewAType
 * @template NewBType
 * @template NewCType
 * @template NewDType
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 */
final class Blackbird extends Combinator
{
    /**
     * @return Closure(callable(NewCType): NewDType): Closure(callable(NewAType): callable(NewBType): NewCType): Closure(NewAType): Closure(NewBType): NewCType
     */
    public function __invoke(): Closure
    {
        return B::of()(B::of())(B::of());
    }
}
