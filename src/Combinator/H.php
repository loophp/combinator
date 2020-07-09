<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class H.
 *
 * @template AType
 * @template BType
 * @template CType
 */
final class H extends Combinator
{
    /**
     * @var callable(AType): (Closure(BType): (Closure(AType): (CType)))
     */
    private $f;

    /**
     * @var AType
     */
    private $x;

    /**
     * @var BType
     */
    private $y;

    /**
     * H constructor.
     *
     * @param callable(AType): (Closure(BType): (Closure(AType): (CType))) $f
     * @param AType $x
     * @param BType $y
     */
    public function __construct(callable $f, $x, $y)
    {
        $this->f = $f;
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @return CType
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
     * @param callable(NewAType): (Closure(NewBType): (Closure(NewAType): (NewCType))) $f
     *
     * @return Closure(NewAType):(Closure(NewBType):(NewCType))
     */
    public static function on(callable $f): Closure
    {
        return
            /**
             * @param NewAType $x
             *
             * @return Closure(NewBType):(NewCType)
             */
            static function ($x) use ($f): Closure {
                return
                    /**
                     * @param NewBType $y
                     *
                     * @return NewCType
                     */
                    static function ($y) use ($f, $x) {
                        return (new self($f, $x, $y))();
                    };
            };
    }
}
