<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use Closure;
use loophp\combinator\Combinator;

/**
 * Class B.
 *
 * @psalm-template AType
 * @psalm-template BType
 * @psalm-template CType
 *
 * @psalm-immutable
 */
final class B extends Combinator
{
    /**
     * @psalm-var callable(AType): BType
     *
     * @var callable
     */
    private $f;

    /**
     * @psalm-var callable(CType): AType
     *
     * @var callable
     */
    private $g;

    /**
     * @psalm-var CType
     *
     * @var mixed
     */
    private $x;

    /**
     * B constructor.
     *
     * @psalm-param callable(AType): BType $f
     * @psalm-param callable(CType): AType $g
     * @psalm-param CType $x
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
     * @psalm-return BType
     */
    public function __invoke()
    {
        return ($this->f)(($this->g)($this->x));
    }

    /**
     * @template AParam
     * @template AReturn
     *
     * @param callable(AParam): AReturn $f
     *
     * @return Closure(callable(mixed): AParam): Closure(mixed): AReturn
     */
    public static function on(callable $f): Closure
    {
        return
            /** @param callable(mixed): AParam $g */
            static function (callable $g) use ($f): Closure {
                return
                    /** @param mixed $x */
                    static function ($x) use ($f, $g) {
                        return (new self($f, $g, $x))();
                    };
            };
    }
}
