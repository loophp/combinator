<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class Q.
 *
 * @template AType
 * @template BType
 * @template CType
 */
final class Q extends Combinator
{
    /**
     * @var callable(AType): BType
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
     * Q constructor.
     *
     * @param callable(AType): BType $f
     * @param callable(BType): CType $g
     * @param AType $x
     */
    public function __construct(callable $f, callable $g, $x)
    {
        $this->f = $f;
        $this->g = $g;
        $this->x = $x;
    }

    /**
     * @return CType
     */
    public function __invoke()
    {
        return ($this->g)((($this->f)($this->x)));
    }

    /**
     * @template NewAType
     * @template NewBType
     * @template NewCType
     *
     * @param callable(NewAType): (NewBType) $f
     */
    public static function on(callable $f): Closure
    {
        return
            /**
             * @param callable(NewBType): NewCType $g
             *
             * @return \Closure(NewAType):(NewCType)
             */
            static function (callable $g) use ($f): Closure {
                return
                    /**
                     * @param NewAType $x
                     */
                    static function ($x) use ($f, $g) {
                        return (new self($f, $g, $x))();
                    };
            };
    }
}
