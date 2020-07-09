<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class J.
 *
 * @template AType
 * @template BType
 */
final class J extends Combinator
{
    /**
     * @var callable(AType): (callable(BType): (BType))
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
     * @var AType
     */
    private $z;

    /**
     * J constructor.
     *
     * @param callable(AType): (callable(BType): (BType)) $f
     * @param AType $x
     * @param BType $y
     * @param AType $z
     */
    public function __construct(callable $f, $x, $y, $z)
    {
        $this->f = $f;
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
    }

    /**
     * @return BType
     */
    public function __invoke()
    {
        return (($this->f)($this->x))((($this->f)($this->z))($this->y));
    }

    /**
     * @template NewAType
     * @template NewBType
     *
     * @param callable(NewAType): (callable(NewBType): (NewBType)) $f
     *
     * @return Closure(NewAType):(Closure(NewBType):(Closure(NewAType):(NewBType)))
     */
    public static function on(callable $f): Closure
    {
        return
            /**
             * @param NewAType $x
             *
             * @return Closure(NewBType):(Closure(NewAType):(NewBType))
             */
            static function ($x) use ($f): Closure {
                return
                    /**
                     * @param NewBType $y
                     *
                     * @return Closure(NewAType):(NewBType)
                     */
                    static function ($y) use ($f, $x): Closure {
                        return
                            /**
                             * @param NewAType $z
                             *
                             * @return NewBType
                             */
                            static function ($z) use ($f, $x, $y) {
                                return (new self($f, $x, $y, $z))();
                            };
                    };
            };
    }
}
