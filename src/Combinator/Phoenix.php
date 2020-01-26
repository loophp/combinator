<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class Phoenix.
 *
 * @psalm-template AType
 * @psalm-template BType
 * @psalm-template CType
 * @psalm-template DType
 */
final class Phoenix extends Combinator
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
     * @var callable
     */
    private $h;

    /**
     * @var mixed
     */
    private $x;

    /**
     * Phoenix constructor.
     *
     * @psalm-param callable(AType): callable(BType): CType $f
     * @psalm-param callable(DType): AType $g
     * @psalm-param callable(DType): BType $h
     * @psalm-param DType $x
     *
     * @param callable $f
     * @param callable $g
     * @param callable $h
     * @param mixed $x
     */
    public function __construct(callable $f, callable $g, callable $h, $x)
    {
        $this->f = $f;
        $this->g = $g;
        $this->h = $h;
        $this->x = $x;
    }

    /**
     * @psalm-return CType
     */
    public function __invoke()
    {
        return ($this->f)(($this->g)($this->x))(($this->h)($this->x));
    }

    /**
     * @param callable $a
     *
     * @return Closure
     */
    public static function on(callable $a): Closure
    {
        return static function (callable $b) use ($a): Closure {
            return static function (callable $c) use ($a, $b): Closure {
                return static function ($d) use ($a, $b, $c) {
                    return (new self($a, $b, $c, $d))();
                };
            };
        };
    }
}
