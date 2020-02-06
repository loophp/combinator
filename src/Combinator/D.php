<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class D.
 *
 * @psalm-template AType
 * @psalm-template BType
 * @psalm-template CType
 * @psalm-template DType
 *
 * @psalm-immutable
 */
final class D extends Combinator
{
    /**
     * @psalm-var callable(AType): callable(CType): DType
     *
     * @var callable
     */
    private $a;

    /**
     * @psalm-var AType
     *
     * @var mixed
     */
    private $b;

    /**
     * @psalm-var callable(BType): CType
     *
     * @var callable
     */
    private $c;

    /**
     * @psalm-var BType
     *
     * @var mixed
     */
    private $d;

    /**
     * D constructor.
     *
     * @psalm-param callable(AType): callable(CType): DType $a
     * @psalm-param AType $b
     * @psalm-param callable(BType): CType $c
     * @psalm-param BType $d
     *
     * @param callable $a
     * @param mixed $b
     * @param callable $c
     * @param mixed $d
     */
    public function __construct(callable $a, $b, callable $c, $d)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
        $this->d = $d;
    }

    /**
     * @psalm-return DType
     */
    public function __invoke()
    {
        return (($this->a)($this->b))(($this->c)($this->d));
    }

    /**
     * @template NewAType
     * @template NewBType
     * @template NewCType
     * @template NewDType
     *
     * @psalm-param callable(NewAType): callable(NewCType): NewDType $f
     *
     * @param callable(NewCType): NewDType $f
     *
     * @return Closure(NewAType): Closure(Closure(NewBType): NewCType): Closure(NewBType): NewDType
     */
    public static function on(callable $f): Closure
    {
        return
            /** @param NewAType $x */
            static function ($x) use ($f): Closure {
                return
                    /** @param callable(NewBType): NewCType $g */
                    static function (callable $g) use ($f, $x): Closure {
                        return
                            /** @param NewBType $y */
                            static function ($y) use ($f, $x, $g) {
                                return (new self($f, $x, $g, $y))();
                            };
                    };
            };
    }
}
