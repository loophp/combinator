<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use loophp\combinator\Combinator;

/**
 * Class R.
 *
 * @psalm-template AType
 * @psalm-template BType
 * @psalm-template CType
 */
final class R extends Combinator
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
     * R constructor.
     *
     * @psalm-param AType $x
     * @psalm-param callable(BType): callable(AType): CType $f
     * @psalm-param BType $y
     *
     * @param mixed $x
     * @param callable $f
     * @param mixed $y
     */
    public function __construct($x, callable $f, $y)
    {
        $this->f = $f;
        $this->y = $y;
        $this->x = $x;
    }

    /**
     * @psalm-return CType
     */
    public function __invoke()
    {
        return (($this->f)($this->y))($this->x);
    }
}
