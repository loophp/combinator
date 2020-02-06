<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class Phoenix.
 *
 * @psalm-template AType
 * @psalm-template BType
 * @psalm-template CType
 * @psalm-template DType
 *
 * @psalm-immutable
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 */
final class Phoenix extends Combinator
{
    /**
     * @psalm-var callable(AType): callable(BType): CType
     *
     * @var callable
     */
    private $f;

    /**
     * @psalm-var callable(DType): AType
     *
     * @var callable
     */
    private $g;

    /**
     * @psalm-var callable(DType): BType
     *
     * @var callable
     */
    private $h;

    /**
     * @psalm-var DType
     *
     * @var mixed
     */
    private $x;

    /**
     * Phoenix constructor.
     *
     * @psalm-param callable(AType): callable(BType): CType $f
     * @psalm-param callable(DType): AType $g
     * @psalm-param callable(DType): BType $h
     * @psalm-param DType $x
     *
     * @param callable $f
     * @param callable $g
     * @param callable $h
     * @param mixed $x
     */
    public function __construct(callable $f, callable $g, callable $h, $x)
    {
        $this->f = $f;
        $this->g = $g;
        $this->h = $h;
        $this->x = $x;
    }

    /**
     * @psalm-return CType
     */
    public function __invoke()
    {
        return ($this->f)(($this->g)($this->x))(($this->h)($this->x));
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
     * @psalm-return Closure(callable(NewDType): NewAType): Closure(callable(NewDType): NewBType): Closure(NewDType): NewCType
     *
     * @return Closure
     */
    public static function on(callable $f): Closure
    {
        return
            /** @psalm-param callable(NewDType): NewAType $g */
            static function (callable $g) use ($f): Closure {
                return
                    /** @psalm-param callable(NewDType): NewBType $h */
                    static function (callable $h) use ($f, $g): Closure {
                        return
                            /** @psalm-param NewDType $x  */
                            static function ($x) use ($f, $g, $h) {
                                return (new self($f, $g, $h, $x))();
                            };
                    };
            };
    }
}
