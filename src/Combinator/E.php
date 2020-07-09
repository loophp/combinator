<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class E.
 *
 * @template AType
 * @template BType
 * @template CType
 * @template DType
 * @template EType
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 */
final class E extends Combinator
{
    /**
     * @var callable(AType): callable(DType): EType
     */
    private $f;

    /**
     * @var callable(BType): callable(CType): DType
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
     * @var CType
     */
    private $z;

    /**
     * E constructor.
     *
     * @param callable(AType): (callable(DType): (EType)) $f
     * @param AType $x
     * @param callable(BType): (callable(CType): (DType)) $g
     * @param BType $y
     * @param CType $z
     */
    public function __construct(callable $f, $x, callable $g, $y, $z)
    {
        $this->f = $f;
        $this->g = $g;
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
    }

    /**
     * @return EType
     */
    public function __invoke()
    {
        return (($this->f)($this->x))((($this->g)($this->y))($this->z));
    }

    /**
     * @template NewAType
     * @template NewBType
     * @template NewCType
     * @template NewDType
     * @template NewEType
     *
     * @param callable(NewAType): (callable(NewDType): (NewEType)) $f
     *
     * @return Closure(NewAType):(Closure(callable(NewBType): (callable(NewCType): (NewDType))):(Closure(NewBType):(Closure(NewCType):(NewEType))))
     */
    public static function on(callable $f): Closure
    {
        return
            /**
             * @param NewAType $x
             *
             * @return Closure(callable(NewBType): callable(NewCType): NewDType):(Closure(NewBType):(Closure(NewCType):(NewEType)))
             */
            static function ($x) use ($f): Closure {
                return
                    /**
                     * @param callable(NewBType): (callable(NewCType): (NewDType)) $g
                     *
                     * @return Closure(NewBType): (Closure(NewCType):(NewEType))
                     */
                    static function (callable $g) use ($f, $x): Closure {
                        return
                            /**
                             * @param NewBType $y
                             *
                             * @return Closure(NewCType):(NewEType)
                             */
                            static function ($y) use ($f, $x, $g): Closure {
                                return
                                    /**
                                     * @param NewCType $z
                                     *
                                     * @return NewEType
                                     */
                                    static function ($z) use ($f, $x, $g, $y) {
                                        return (new self($f, $x, $g, $y, $z))();
                                    };
                            };
                    };
            };
    }
}
