<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class S.
 *
 * @template AType
 * @template BType
 * @template CType
 */
final class S extends Combinator
{
    /**
     * @var callable(AType):(callable(BType):(CType))
     */
    private $f;

    /**
     * @var callable(AType):(BType)
     */
    private $g;

    /**
     * @var AType
     */
    private $x;

    /**
     * S constructor.
     *
     * @param callable(AType):(callable(BType):(CType)) $f
     * @param callable(AType):(BType) $g
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
        return ($this->f)($this->x)(($this->g)($this->x));
    }

    /**
     * @template NewAType
     * @template NewBType
     * @template NewCType
     *
     * @param callable(NewAType):(callable(NewBType):(NewCType)) $f
     */
    public static function on(callable $f): Closure
    {
        return
            /**
             * @param callable(NewAType):(NewBType) $g
             *
             * @return Closure(NewAType):(NewCType)
             */
            static function (callable $g) use ($f): Closure {
                return
                    /**
                     * @param NewAType $x
                     *
                     * @return NewCType
                     */
                    static function ($x) use ($f, $g) {
                        return (new self($f, $g, $x))();
                    };
            };
    }
}
