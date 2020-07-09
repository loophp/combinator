<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class G.
 *
 * @template AType
 * @template BType
 * @template CType
 * @template DType
 */
final class G extends Combinator
{
    /**
     * @var callable(AType): (callable(BType): (CType))
     */
    private $f;

    /**
     * @var callable(DType): BType
     */
    private $g;

    /**
     * @var DType
     */
    private $x;

    /**
     * @var AType
     */
    private $y;

    /**
     * G constructor.
     *
     * @param callable(AType): (callable(BType): (CType)) $f
     * @param callable(DType): (BType) $g
     * @param DType $x
     * @param AType $y
     */
    public function __construct(callable $f, callable $g, $x, $y)
    {
        $this->f = $f;
        $this->g = $g;
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @return CType
     */
    public function __invoke()
    {
        return (($this->f)($this->y))(($this->g)($this->x));
    }

    /**
     * @template NewAType
     * @template NewBType
     * @template NewCType
     * @template NewDType
     *
     * @param callable(NewAType): (callable(NewBType): (NewCType)) $f
     *
     * @return Closure(callable(NewDType): (NewBType)):(Closure(NewDType):(Closure(NewAType):(NewCType)))
     */
    public static function on(callable $f): Closure
    {
        return
            /**
             * @param callable(NewDType): (NewBType) $g
             *
             * @return Closure(NewDType):(Closure(NewAType):(NewCType))
             */
            static function (callable $g) use ($f): Closure {
                return
                    /**
                     * @param NewDType $x
                     *
                     * @return Closure(NewAType):(NewCType)
                     */
                    static function ($x) use ($f, $g): Closure {
                        return
                            /**
                             * @param NewAType $y
                             *
                             * @return NewCType
                             */
                            static function ($y) use ($f, $g, $x) {
                                return (new self($f, $g, $x, $y))();
                            };
                    };
            };
    }
}
