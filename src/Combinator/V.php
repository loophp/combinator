<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class V.
 *
 * @psalm-template AType
 * @psalm-template BType
 * @psalm-template CType
 *
 * @psalm-immutable
 */
final class V extends Combinator
{
    /**
     * @psalm-var callable(AType): callable(BType): CType
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
     * V constructor.
     *
     * @psalm-param AType $x
     * @psalm-param BType $y
     * @psalm-param callable(AType): callable(BType): CType $f
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
        return (($this->f)($this->x))($this->y);
    }

    /**
     * @template NewAType
     * @template NewBType
     * @template NewCType
     *
     * @psalm-param NewAType $x
     *
     * @param mixed $x
     *
     * @psalm-return Closure(NewBType): Closure(callable(NewAType): callable(NewBType): NewCType): NewCType
     *
     * @return Closure
     */
    public static function on($x): Closure
    {
        return
            /** @psalm-param NewBType $y */
            static function ($y) use ($x): Closure {
                return
                    /** @psalm-param callable(NewAType): callable(NewBType): NewCType $f */
                    static function (callable $f) use ($x, $y) {
                        return (new self($x, $y, $f))();
                    };
            };
    }
}
