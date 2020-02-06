<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class E.
 *
 * @psalm-template AType
 * @psalm-template BType
 * @psalm-template CType
 * @psalm-template DType
 * @psalm-template EType
 *
 * @psalm-immutable
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 */
final class E extends Combinator
{
    /**
     * @psalm-var callable(AType): callable(DType): EType
     *
     * @var callable
     */
    private $f;

    /**
     * @psalm-var callable(BType): callable(CType): DType
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
     * @psalm-var BType
     *
     * @var mixed
     */
    private $y;

    /**
     * @psalm-var CType
     *
     * @var mixed
     */
    private $z;

    /**
     * E constructor.
     *
     * @psalm-param callable(AType): callable(DType): EType $f
     * @psalm-param AType $x
     * @psalm-param callable(BType): callable(CType): DType $g
     * @psalm-param BType $y
     * @psalm-param CType $z
     *
     * @param callable $f
     * @param mixed $x
     * @param callable $g
     * @param mixed $y
     * @param mixed $z
     */
    public function __construct(callable $f, $x, callable $g, $y, $z)
    {
        $this->f = $f;
        $this->g = $g;
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
    }

    /**
     * @psalm-return EType
     */
    public function __invoke()
    {
        return (($this->f)($this->x))((($this->g)($this->y))($this->z));
    }

    /**
     * @template NewAType
     * @template NewBType
     * @template NewCType
     * @template NewDType
     * @template NewEType
     *
     * @psalm-param callable(NewAType): callable(NewDType): NewEType $f
     *
     * @param callable $f
     *
     * @psalm-return Closure(NewAType): Closure(callable(NewBType): callable(NewCType): NewDType): Closure(NewBType): Closure(NewCType)
     *
     * @return Closure
     */
    public static function on(callable $f): Closure
    {
        return
            /** @param NewAType $x */
            static function ($x) use ($f): Closure {
                return
                    /** @psalm-param callable(NewBType): callable(NewCType): NewDType $g */
                    static function (callable $g) use ($f, $x): Closure {
                        return
                            /** @param NewBType $y */
                            static function ($y) use ($f, $x, $g): Closure {
                                return
                                    /** @param NewCType $z */
                                    static function ($z) use ($f, $x, $g, $y) {
                                        return (new self($f, $x, $g, $y, $z))();
                                    };
                            };
                    };
            };
    }
}
