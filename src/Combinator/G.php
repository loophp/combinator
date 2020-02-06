<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class G.
 *
 * @psalm-template AType
 * @psalm-template BType
 * @psalm-template CType
 * @psalm-template DType
 *
 * @psalm-immutable
 */
final class G extends Combinator
{
    /**
     * @psalm-var callable(AType): callable(BType): CType
     *
     * @var callable
     */
    private $f;

    /**
     * @psalm-var callable(DType): BType
     *
     * @var callable
     */
    private $g;

    /**
     * @psalm-var DType
     *
     * @var mixed
     */
    private $x;

    /**
     * @psalm-var AType
     *
     * @var mixed
     */
    private $y;

    /**
     * G constructor.
     *
     * @psalm-param callable(AType): callable(BType): CType $f
     * @psalm-param callable(DType): BType $g
     * @psalm-param DType $x
     * @psalm-param AType $y
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
     * @psalm-return CType
     */
    public function __invoke()
    {
        return (($this->f)($this->y))(($this->g)($this->x));
    }

    /**
     * @template NewAType
     * @template NewBType
     * @template NewCType
     * @template NewDType
     *
     * @psalm-param callable(NewAType): callable(NewBType): NewCType $f
     *
     * @param callable $f
     *
     * @return Closure(callable(NewDType): NewBType): Closure(NewDType): Closure(NewAType): NewCType
     */
    public static function on(callable $f): Closure
    {
        return
            /** @param callable(NewDType): NewBType $g */
            static function (callable $g) use ($f): Closure {
                return
                    /** @param NewDType $x */
                    static function ($x) use ($f, $g): Closure {
                        return
                            /** @param NewAType $y */
                            static function ($y) use ($f, $g, $x) {
                                return (new self($f, $g, $x, $y))();
                            };
                    };
            };
    }
}
