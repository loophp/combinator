<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class V.
 *
 * @template AType
 * @template BType
 * @template CType
 */
final class V extends Combinator
{
    /**
     * @var callable(AType): callable(BType): CType
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
     * V constructor.
     *
     * @param AType $x
     * @param BType $y
     * @param callable(AType): (callable(BType): (CType)) $f
     */
    public function __construct($x, $y, callable $f)
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
        return (($this->f)($this->x))($this->y);
    }

    /**
     * @template NewAType
     * @template NewBType
     * @template NewCType
     *
     * @param NewAType $x
     *
     * @return Closure(NewBType):(Closure(callable(NewAType): (callable(NewBType): (NewCType))):(NewCType))
     */
    public static function on($x): Closure
    {
        return
            /**
             * @param NewBType $y
             *
             * @return Closure(callable(NewAType): (callable(NewBType): (NewCType))):(NewCType)
             */
            static function ($y) use ($x): Closure {
                return
                    /**
                     * @param callable(NewAType): (callable(NewBType): (NewCType)) $f
                     *
                     * @return NewCType
                     */
                    static function (callable $f) use ($x, $y) {
                        return (new self($x, $y, $f))();
                    };
            };
    }
}
