<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class D.
 *
 * @psalm-template AType
 * @psalm-template BType
 * @psalm-template CType
 * @psalm-template DType
 */
final class D extends Combinator
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
     * D constructor.
     *
     * @psalm-param callable(AType): callable(CType): DType $f
     * @psalm-param AType $x
     * @psalm-param callable(BType): CType $g
     * @psalm-param BType $y
     *
     * @param callable $f
     * @param callable $g
     * @param mixed $x
     * @param mixed $y
     */
    public function __construct(callable $f, $x, callable $g, $y)
    {
        $this->f = $f;
        $this->x = $x;
        $this->g = $g;
        $this->y = $y;
    }

    /**
     * @psalm-return DType
     */
    public function __invoke()
    {
        return (($this->f)($this->x))(($this->g)($this->y));
    }

    /**
     * @param callable $a
     *
     * @return Closure
     */
    public static function on(callable $a): Closure
    {
        return static function ($b) use ($a): Closure {
            return static function (callable $c) use ($a, $b): Closure {
                return static function ($d) use ($a, $b, $c) {
                    return (new self($a, $b, $c, $d))();
                };
            };
        };
    }
}
