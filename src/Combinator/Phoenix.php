<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class Phoenix.
 *
 * @template AType
 * @template BType
 * @template CType
 * @template DType
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 */
final class Phoenix extends Combinator
{
    /**
     * @var callable(AType): (callable(BType): (CType))
     */
    private $f;

    /**
     * @var callable(DType): AType
     */
    private $g;

    /**
     * @var callable(DType): BType
     */
    private $h;

    /**
     * @var DType
     */
    private $x;

    /**
     * Phoenix constructor.
     *
     * @param callable(AType): (callable(BType): (CType)) $f
     * @param callable(DType): (AType) $g
     * @param callable(DType): (BType) $h
     * @param DType $x
     */
    public function __construct(callable $f, callable $g, callable $h, $x)
    {
        $this->f = $f;
        $this->g = $g;
        $this->h = $h;
        $this->x = $x;
    }

    /**
     * @return CType
     */
    public function __invoke()
    {
        return ($this->f)(($this->g)($this->x))(($this->h)($this->x));
    }

    /**
     * @template NewAType
     * @template NewBType
     * @template NewCType
     * @template NewDType
     *
     * @param callable(NewAType): (callable(NewBType): (NewCType)) $f
     */
    public static function on(callable $f): Closure
    {
        return
            /**
             * @param callable(NewDType): (NewAType) $g
             *
             * @return Closure(callable(NewDType): (NewBType)):(Closure(NewDType):(NewCType))
             */
            static function (callable $g) use ($f): Closure {
                return
                    /**
                     * @param callable(NewDType): (NewBType) $h
                     *
                     * @return Closure(NewDType):(NewCType)
                     */
                    static function (callable $h) use ($f, $g): Closure {
                        return
                            /**
                             * @param NewDType $x
                             *
                             * @return NewCType
                             */
                            static function ($x) use ($f, $g, $h) {
                                return (new self($f, $g, $h, $x))();
                            };
                    };
            };
    }
}
