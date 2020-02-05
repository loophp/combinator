<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class F.
 *
 * @psalm-template AType
 * @psalm-template BType
 * @psalm-template CType
 *
 * @psalm-immutable
 */
final class F extends Combinator
{
    /**
     * @psalm-var callable(BType): callable(AType): CType
     *
     * @var callable
     */
    private $f;

    /**
     * @psalm-var AType
     *
     * @var mixed
     */
    private $x;

    /**
     * @psalm-var BType
     *
     * @var mixed
     */
    private $y;

    /**
     * F constructor.
     *
     * @psalm-param AType $x
     * @psalm-param BType $y
     * @psalm-param callable(BType): callable(AType): CType $f
     *
     * @param mixed $x
     * @param mixed $y
     * @param callable $f
     */
    public function __construct($x, $y, callable $f)
    {
        $this->f = $f;
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @psalm-return CType
     */
    public function __invoke()
    {
        return ($this->f)($this->y)($this->x);
    }

    /**
     * @template NewAType
     * @template NewBType
     * @template NewCType
     *
     * @psalm-param NewAType $a
     *
     * @param mixed $a
     *
     * @return Closure(NewBType): Closure(callable(NewBType): callable(NewAType): NewCType): NewCType
     */
    public static function on($a): Closure
    {
        return
            /** @param NewBType $b */
            static function ($b) use ($a): Closure {
                return
                    /** @psalm-param callable(NewBType): callable(NewAType): NewCType $c */
                    static function (callable $c) use ($a, $b) {
                        return (new self($a, $b, $c))();
                    };
            };
    }
}
