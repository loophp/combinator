<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class Psi.
 *
 * @psalm-template AType
 * @psalm-template BType
 * @psalm-template CType
 *
 * @psalm-immutable
 */
final class Psi extends Combinator
{
    /**
     * @psalm-var callable(AType): callable(AType): BType
     *
     * @var callable
     */
    private $f;

    /**
     * @psalm-var callable(CType): AType
     *
     * @var callable
     */
    private $g;

    /**
     * @psalm-var CType
     *
     * @var mixed
     */
    private $x;

    /**
     * @psalm-var CType
     *
     * @var mixed
     */
    private $y;

    /**
     * Psi constructor.
     *
     * @psalm-param callable(AType): callable(AType): BType $f
     * @psalm-param callable(CType): AType $g
     * @psalm-param CType $x
     * @psalm-param CType $y
     *
     * @param callable $f
     * @param callable $g
     * @param mixed $x
     * @param mixed $y
     */
    public function __construct(callable $f, callable $g, $x, $y)
    {
        $this->f = $f;
        $this->g = $g;
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @psalm-return BType
     */
    public function __invoke()
    {
        return ($this->f)(($this->g)($this->x))(($this->g)($this->y));
    }

    /**
     * @template NewAType
     * @template NewBType
     * @template NewCType
     *
     * @psalm-param callable(NewAType): callable(NewAType): NewBType $f
     *
     * @param callable $f
     *
     * @psalm-return Closure(callable(NewCType): NewAType): Closure(NewCType): Closure(NewCType): NewBType
     *
     * @return Closure
     */
    public static function on(callable $f): Closure
    {
        return
            /** @psalm-param callable(NewCType): NewAType $g */
            static function (callable $g) use ($f): Closure {
                return
                    /** @psalm-param NewCType $x */
                    static function ($x) use ($f, $g): Closure {
                        return
                            /** @psalm-param NewCType $y */
                            static function ($y) use ($f, $g, $x) {
                                return (new self($f, $g, $x, $y))();
                            };
                    };
            };
    }
}
