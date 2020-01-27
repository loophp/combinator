<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class A.
 *
 * @psalm-template AType
 * @psalm-template BType
 */
final class A extends Combinator
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
     * A constructor.
     *
     * @psalm-param callable(AType): BType $f
     * @psalm-param BType $x
     *
     * @param callable $f
     * @param mixed $x
     */
    public function __construct(callable $f, $x)
    {
        $this->f = $f;
        $this->x = $x;
    }

    /**
     * @psalm-return BType
     */
    public function __invoke()
    {
        return ($this->f)($this->x);
    }

    /**
     * @psalm-param callable(AType): BType $f
     *
     * @param callable $f
     *
     * @return Closure
     */
    public static function on(callable $f): Closure
    {
        return static function ($x) use ($f) {
            return (new self($f, $x))();
        };
    }
}
