<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

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
     * Psi constructor.
     *
     * @psalm-param callable(BType) : callable(CType) : DType $f
     * @psalm-param callable(AType) : BType $g
     * @psalm-param callable(AType) : CType $h
     * @psalm-param AType $x
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
     * @psalm-return DType
     */
    public function __invoke()
    {
        return ($this->f)(($this->g)($this->x))(($this->h)($this->x));
    }
}
