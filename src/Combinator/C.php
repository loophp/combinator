<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class C.
 *
 * @template AType
 * @template BType
 * @template CType
 */
final class C extends Combinator
{
    /**
     * @var callable(AType): callable(BType): CType
     */
    private $f;

    /**
     * @var BType
     */
    private $x;

    /**
     * @var AType
     */
    private $y;

    /**
     * C constructor.
     *
     * @param callable(AType): (callable(BType): (CType)) $f
     * @param BType $x
     * @param AType $y
     */
    public function __construct(callable $f, $x, $y)
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
     * @param callable(NewAType): (callable(NewBType): (NewCType)) $f
     *
     * @return Closure(NewBType):(Closure(NewAType):(NewCType))
     */
    public static function on(callable $f): Closure
    {
        return
            /**
             * @param NewBType $x
             *
             * @return Closure(NewAType):(NewCType)
             */
            static function ($x) use ($f): Closure {
                return
                /**
                 * @param NewAType $y
                 *
                 * @return NewCType
                 */
                static function ($y) use ($f, $x) {
                    return (new self($f, $x, $y))();
                };
            };
    }
}
