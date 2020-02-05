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
 *
 * @psalm-immutable
 */
final class A extends Combinator
{
    /**
     * @psalm-var callable(AType): BType
     *
     * @var callable
     */
    private $f;

    /**
     * @psalm-var AType
     *
     * @var mixed
     */
    private $x;

    /**
     * A constructor.
     *
     * @psalm-param callable(AType): BType $f
     * @psalm-param AType $x
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
     * @template NewAType
     * @template NewBType
     *
     * @param callable(NewAType): NewBType $f
     *
     * @return Closure(NewAType): NewBType
     */
    public static function on(callable $f): Closure
    {
        return
            /** @param NewAType $x */
            static function ($x) use ($f) {
                return (new self($f, $x))();
            };
    }
}
