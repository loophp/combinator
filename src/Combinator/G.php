<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class G.
 *
 * @psalm-template AType
 * @psalm-template BType
 * @psalm-template CType
 * @psalm-template DType
 */
final class G extends Combinator
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
     * G constructor.
     *
     * @psalm-param callable(AType): callable(BType): CType $f
     * @psalm-param callable(DType): BType $g
     * @psalm-param DType $x
     * @psalm-param AType $y
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
     * @psalm-return CType
     */
    public function __invoke()
    {
        return (($this->f)($this->y))(($this->g)($this->x));
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
