<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class Q.
 *
 * @psalm-template AType
 * @psalm-template BType
 * @psalm-template CType
 */
final class Q extends Combinator
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
     * Q constructor.
     *
     * @psalm-param callable(AType): BType $f
     * @psalm-param callable(BType): CType $g
     * @psalm-param AType $x
     *
     * @param callable $f
     * @param callable $g
     * @param mixed $x
     */
    public function __construct(callable $f, callable $g, $x)
    {
        $this->f = $f;
        $this->g = $g;
        $this->x = $x;
    }

    /**
     * @psalm-return CType
     */
    public function __invoke()
    {
        return ($this->g)((($this->f)($this->x)));
    }

    /**
     * @param callable $a
     *
     * @return Closure
     */
    public static function on(callable $a): Closure
    {
        return static function (callable $b) use ($a): Closure {
            return static function ($c) use ($a, $b) {
                return (new self($a, $b, $c))();
            };
        };
    }
}
