<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class F.
 *
 * @template AType
 * @template BType
 * @template CType
 */
final class F extends Combinator
{
    /**
     * @var callable(BType): (Closure(AType): (CType))
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
     * F constructor.
     *
     * @param AType $x
     * @param BType $y
     * @param callable(BType): (Closure(AType): (CType)) $f
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
        return ($this->f)($this->y)($this->x);
    }

    /**
     * @template NewAType
     * @template NewBType
     * @template NewCType
     *
     * @param NewAType $a
     *
     * @return Closure(NewBType):(Closure(callable(NewBType): (Closure(NewAType): (NewCType))):(NewCType))
     */
    public static function on($a): Closure
    {
        return
            /**
             * @param NewBType $b
             *
             * @return Closure(callable(NewBType): (Closure(NewAType): (NewCType))):(NewCType)
             */
            static function ($b) use ($a): Closure {
                return
                    /**
                     * @param callable(NewBType): (Closure(NewAType): (NewCType)) $c
                     *
                     * @return NewCType
                     */
                    static function (callable $c) use ($a, $b) {
                        return (new self($a, $b, $c))();
                    };
            };
    }
}
