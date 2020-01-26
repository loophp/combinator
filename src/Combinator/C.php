<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class C.
 *
 * @psalm-template AType
 * @psalm-template BType
 * @psalm-template CType
 */
final class C extends Combinator
{
    /**
     * @var callable
     */
    private $f;

    /**
     * @var mixed
     */
    private $x;

    /**
     * @var mixed
     */
    private $y;

    /**
     * C constructor.
     *
     * @psalm-param callable(AType): callable(BType): CType $f
     * @psalm-param BType $x
     * @psalm-param AType $y
     *
     * @param callable $f
     * @param mixed $x
     * @param mixed $y
     */
    public function __construct(callable $f, $x, $y)
    {
        $this->f = $f;
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @psalm-return CType
     */
    public function __invoke()
    {
        return ($this->f)($this->y)($this->x);
    }

    /**
     * @param callable $a
     *
     * @return Closure
     */
    public static function on(callable $a): Closure
    {
        return static function ($b) use ($a): Closure {
            return static function ($c) use ($a, $b) {
                return (new self($a, $b, $c))();
            };
        };
    }
}
