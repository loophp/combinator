<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class R.
 *
 * @psalm-template AType
 * @psalm-template BType
 * @psalm-template CType
 *
 * @psalm-immutable
 */
final class R extends Combinator
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
     * R constructor.
     *
     * @psalm-param AType $x
     * @psalm-param callable(BType): callable(AType): CType $f
     * @psalm-param BType $y
     *
     * @param mixed $x
     * @param callable $f
     * @param mixed $y
     */
    public function __construct($x, callable $f, $y)
    {
        $this->f = $f;
        $this->y = $y;
        $this->x = $x;
    }

    /**
     * @psalm-return CType
     */
    public function __invoke()
    {
        return (($this->f)($this->y))($this->x);
    }

    /**
     * @template NewAType
     * @template NewBType
     * @template NewCType
     *
     * @psalm-param NewAType $x
     *
     * @param NewAType $x
     *
     * @psalm-return Closure(callable(NewBType): callable(NewAType): NewCType): Closure(NewBType): NewCType
     *
     * @return Closure
     */
    public static function on($x): Closure
    {
        return
            /** @psalm-param callable(NewBType): callable(NewAType): NewCType $f */
            static function (callable $f) use ($x): Closure {
                return
                    /** @psalm-param NewBType $y */
                    static function ($y) use ($x, $f) {
                        return (new self($x, $f, $y))();
                    };
            };
    }
}
