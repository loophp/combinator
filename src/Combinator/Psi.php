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
     * @var callable
     */
    private $f;

    /**
     * @var callable
     */
    private $g;

    /**
     * @var mixed
     */
    private $x;

    /**
     * @var mixed
     */
    private $y;

    /**
     * Psi constructor.
     *
     * @psalm-param callable(AType): callable(AType): BType $f
     * @psalm-param callable(CType): AType $g
     * @psalm-param CType $x
     * @psalm-param CType $y
     *
     * @param callable $f
     * @param callable $g
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
     * @psalm-return BType
     */
    public function __invoke()
    {
        return ($this->f)(($this->g)($this->x))(($this->g)($this->y));
    }

    /**
     * @param callable $a
     *
     * @return Closure
     */
    public static function on(callable $a): Closure
    {
        return static function (callable $b) use ($a): Closure {
            return static function ($c) use ($a, $b): Closure {
                return static function ($d) use ($a, $b, $c) {
                    return (new self($a, $b, $c, $d))();
                };
            };
        };
    }
}
