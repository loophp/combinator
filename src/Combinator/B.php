<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class B.
 *
 * @template AType
 * @template BType
 * @template CType
 */
final class B extends Combinator
{
    /**
     * @var callable(AType): BType
     */
    private $f;

    /**
     * @var callable(CType): AType
     */
    private $g;

    /**
     * @var CType
     */
    private $x;

    /**
     * B constructor.
     *
     * @param callable(AType): BType $f
     * @param callable(CType): AType $g
     * @param CType $x
     */
    public function __construct(callable $f, callable $g, $x)
    {
        $this->f = $f;
        $this->g = $g;
        $this->x = $x;
    }

    /**
     * @return BType
     */
    public function __invoke()
    {
        return ($this->f)(($this->g)($this->x));
    }

    /**
     * @template NewAType
     * @template NewBType
     * @template NewCType
     *
     * @param callable(NewAType): (NewBType) $f
     *
     * @return Closure(Closure(NewCType):(NewAType)):(Closure(NewCType):(NewBType))
     */
    public static function on(callable $f): Closure
    {
        return
            /**
             * @param callable(NewCType):(NewAType) $g
             *
             * @return Closure(NewCType):(NewBType)
             */
            static function (callable $g) use ($f): Closure {
                return
                    /**
                     * @param NewCType $x
                     *
                     * @return NewBType
                     */
                    static function ($x) use ($f, $g) {
                        return (new self($f, $g, $x))();
                    };
            };
    }
}
