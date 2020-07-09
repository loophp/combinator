<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class R.
 *
 * @template AType
 * @template BType
 * @template CType
 */
final class R extends Combinator
{
    /**
     * @var callable(BType):(Closure(AType):(CType))
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
     * R constructor.
     *
     * @param AType $x
     * @param callable(BType):(Closure(AType):(CType)) $f
     * @param BType $y
     */
    public function __construct($x, callable $f, $y)
    {
        $this->f = $f;
        $this->y = $y;
        $this->x = $x;
    }

    /**
     * @return CType
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
     * @param NewAType $x
     *
     * @return Closure(callable(NewBType):(Closure(NewAType):(NewCType))):(Closure(NewBType):(NewCType))
     */
    public static function on($x): Closure
    {
        return
            /**
             * @param callable(NewBType):(Closure(NewAType):(NewCType)) $f
             *
             * @return Closure(NewBType):(NewCType)
             */
            static function (callable $f) use ($x): Closure {
                return
                    /**
                     * @param NewBType $y
                     *
                     * @return NewCType
                     */
                    static function ($y) use ($x, $f) {
                        return (new self($x, $f, $y))();
                    };
            };
    }
}
