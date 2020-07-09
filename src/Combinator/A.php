<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class A.
 *
 * @template AType
 * @template BType
 */
final class A extends Combinator
{
    /**
     * @var callable(AType): BType
     */
    private $f;

    /**
     * @var AType
     */
    private $x;

    /**
     * A constructor.
     *
     * @param callable(AType): BType $f
     * @param AType $x
     */
    public function __construct(callable $f, $x)
    {
        $this->f = $f;
        $this->x = $x;
    }

    /**
     * @return BType
     */
    public function __invoke()
    {
        return ($this->f)($this->x);
    }

    /**
     * @template NewAType
     * @template NewBType
     *
     * @param callable(NewAType): NewBType $f
     *
     * @return Closure(NewAType): NewBType
     */
    public static function on(callable $f): Closure
    {
        return
            /** @param NewAType $x */
            static function ($x) use ($f) {
                return (new self($f, $x))();
            };
    }
}
