<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class H.
 *
 * @psalm-template AType
 * @psalm-template BType
 * @psalm-template CType
 *
 * @psalm-immutable
 */
final class H extends Combinator
{
    /**
     * @psalm-var callable(AType): callable(BType): callable(AType): CType
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
     * H constructor.
     *
     * @psalm-param callable(AType): callable(BType): callable(AType): CType $f
     * @psalm-param AType $x
     * @psalm-param BType $y
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
     */
    public function __invoke()
    {
        return ((($this->f)($this->x))($this->y))($this->x);
    }

    /**
     * @template NewAType
     * @template NewBType
     * @template NewCType
     *
     * @psalm-param callable(NewAType): callable(NewBType): callable(NewAType): NewCType $f
     *
     * @param callable $f
     *
     * @return Closure(NewAType): Closure(NewBType): NewCType
     */
    public static function on(callable $f): Closure
    {
        return
            /** @param NewAType $x */
            static function ($x) use ($f): Closure {
                return
                    /** @param NewBType $y */
                    static function ($y) use ($f, $x) {
                        return (new self($f, $x, $y))();
                    };
            };
    }
}
