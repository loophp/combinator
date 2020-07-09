<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class D.
 *
 * @template AType
 * @template BType
 * @template CType
 * @template DType
 */
final class D extends Combinator
{
    /**
     * @var callable(AType): callable(CType): DType
     */
    private $f;

    /**
     * @var callable(BType): CType
     */
    private $g;

    /**
     * @var AType
     */
    private $x;

    /**
     * @var BType
     */
    private $y;

    /**
     * D constructor.
     *
     * @param callable(AType): (callable(CType): (DType)) $f
     * @param AType $x
     * @param callable(BType): CType $g
     * @param BType $y
     */
    public function __construct(callable $f, $x, callable $g, $y)
    {
        $this->f = $f;
        $this->x = $x;
        $this->g = $g;
        $this->y = $y;
    }

    /**
     * @return DType
     */
    public function __invoke()
    {
        return (($this->f)($this->x))(($this->g)($this->y));
    }

    /**
     * @template NewAType
     * @template NewBType
     * @template NewCType
     * @template NewDType
     *
     * @param callable(NewAType): (Closure(NewCType): (NewDType)) $f
     */
    public static function on(callable $f): Closure
    {
        return
            /**
             * @param NewAType $x
             *
             * @return Closure(callable(NewBType): (NewCType)): (Closure(NewBType): (NewDType))
             */
            static function ($x) use ($f): Closure {
                return
                    /**
                     * @param callable(NewBType): (NewCType) $g
                     *
                     * @return Closure(NewBType): (NewDType)
                     */
                    static function (callable $g) use ($f, $x): Closure {
                        return
                            /**
                             * @param NewBType $y
                             *
                             * @return NewDType
                             */
                            static function ($y) use ($f, $x, $g) {
                                return (new self($f, $x, $g, $y))();
                            };
                    };
            };
    }
}
