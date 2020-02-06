<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class J.
 *
 * @psalm-template AType
 * @psalm-template BType
 *
 * @psalm-immutable
 */
final class J extends Combinator
{
    /**
     * @psalm-var callable(AType): callable(BType): BType
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
     * @psalm-var AType
     *
     * @var mixed
     */
    private $z;

    /**
     * J constructor.
     *
     * @psalm-param callable(AType): callable(BType): BType $f
     * @psalm-param AType $x
     * @psalm-param BType $y
     * @psalm-param AType $z
     *
     * @param callable $f
     * @param mixed $x
     * @param mixed $y
     * @param mixed $z
     */
    public function __construct(callable $f, $x, $y, $z)
    {
        $this->f = $f;
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
    }

    /**
     * @psalm-return BType
     */
    public function __invoke()
    {
        return (($this->f)($this->x))((($this->f)($this->z))($this->y));
    }

    /**
     * @template NewAType
     * @template NewBType
     *
     * @psalm-param callable(NewAType): callable(NewBType): NewBType $f
     *
     * @param callable $f
     *
     * @psalm-return Closure(NewAType): Closure(NewBType): Closure(NewAType): NewBType
     *
     * @return NewBType
     */
    public static function on(callable $f): Closure
    {
        return
            /** @param NewAType $x */
            static function ($x) use ($f): Closure {
                return
                    /** @param NewBType $y */
                    static function ($y) use ($f, $x): Closure {
                        return
                            /** @param NewAType $z */
                            static function ($z) use ($f, $x, $y) {
                                return (new self($f, $x, $y, $z))();
                            };
                    };
            };
    }
}
