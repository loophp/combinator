<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class Psi.
 *
 * @psalm-template AType
 * @psalm-template BType
 * @psalm-template CType
 */
final class Psi extends Combinator
{
    /**
     * @var callable(AType):(callable(AType):(BType))
     */
    private $f;

    /**
     * @var callable(CType):(AType)
     */
    private $g;

    /**
     * @var CType
     */
    private $x;

    /**
     * @var CType
     */
    private $y;

    /**
     * Psi constructor.
     *
     * @psalm-param callable(AType): (callable(AType): (BType)) $f
     * @psalm-param callable(CType): (AType) $g
     * @psalm-param CType $x
     * @psalm-param CType $y
     *
     * @param mixed $x
     * @param mixed $y
     */
    public function __construct(callable $f, callable $g, $x, $y)
    {
        $this->f = $f;
        $this->g = $g;
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @return BType
     */
    public function __invoke()
    {
        return ($this->f)(($this->g)($this->x))(($this->g)($this->y));
    }

    /**
     * @template NewAType
     * @template NewBType
     * @template NewCType
     *
     * @param callable(NewAType): (callable(NewAType): (NewBType)) $f
     */
    public static function on(callable $f): Closure
    {
        return
            /**
             * @psalm-param callable(NewCType): NewAType $g
             */
            static function (callable $g) use ($f): Closure {
                return
                    /**
                     * @psalm-param NewCType $x
                     *
                     * @param mixed $x
                     */
                    static function ($x) use ($f, $g): Closure {
                        return
                            /**
                             * @psalm-param NewCType $y
                             *
                             * @param mixed $y
                             */
                            static function ($y) use ($f, $g, $x) {
                                return (new self($f, $g, $x, $y))();
                            };
                    };
            };
    }
}
