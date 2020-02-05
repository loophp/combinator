<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class Q.
 *
 * @psalm-template AType
 * @psalm-template BType
 * @psalm-template CType
 *
 * @psalm-immutable
 */
final class Q extends Combinator
{
    /**
     * @psalm-var callable(AType): BType
     *
     * @var callable
     */
    private $f;

    /**
     * @psalm-var callable(BType): CType
     *
     * @var callable
     */
    private $g;

    /**
     * @psalm-var AType
     *
     * @var mixed
     */
    private $x;

    /**
     * Q constructor.
     *
     * @psalm-param callable(AType): BType $f
     * @psalm-param callable(BType): CType $g
     * @psalm-param AType $x
     *
     * @param callable $f
     * @param callable $g
     * @param mixed $x
     */
    public function __construct(callable $f, callable $g, $x)
    {
        $this->f = $f;
        $this->g = $g;
        $this->x = $x;
    }

    /**
     * @psalm-return CType
     */
    public function __invoke()
    {
        return ($this->g)((($this->f)($this->x)));
    }

    /**
     * @template NewAType
     * @template NewBType
     * @template NewCType
     *
     * @psalm-param callable(NewAType): NewBType $f
     *
     * @param callable $f
     *
     * @psalm-return Closure(callable(NewBType): NewCType): Closure(NewAType): NewCType
     *
     * @return Closure
     */
    public static function on(callable $f): Closure
    {
        return
            /** @psalm-param callable(NewBType): NewCType $g */
            static function (callable $g) use ($f): Closure {
                return
                    /** @psalm-param NewAType $x */
                    static function ($x) use ($f, $g) {
                        return (new self($f, $g, $x))();
                    };
            };
    }
}
