<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class C.
 *
 * @psalm-template AType
 * @psalm-template BType
 * @psalm-template CType
 *
 * @psalm-immutable
 */
final class C extends Combinator
{
    /**
     * @psalm-var callable(AType): callable(BType): CType
     *
     * @var callable
     */
    private $f;

    /**
     * @psalm-var BType
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
     * C constructor.
     *
     * @psalm-param callable(AType): callable(BType): CType $f
     * @psalm-param BType $x
     * @psalm-param AType $y
     *
     * @param callable $f
     * @param mixed $x
     * @param mixed $y
     */
    public function __construct(callable $f, $x, $y)
    {
        $this->f = $f;
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @psalm-return CType
     *
     * @return mixed
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
     * @psalm-param callable(NewAType): callable(NewBType): NewCType $f
     *
     * @param callable(NewAType): NewCType $f
     *
     * @return Closure(NewBType): Closure(NewAType): NewCType
     */
    public static function on(callable $f): Closure
    {
        return
            /** @param NewBType $x */
            static function ($x) use ($f): Closure {
                return
                /** @param NewAType $y */
                static function ($y) use ($f, $x) {
                    return (new self($f, $x, $y))();
                };
            };
    }
}
