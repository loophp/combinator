<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use loophp\combinator\Combinator;

/**
 * Class F.
 *
 * @psalm-template AType
 * @psalm-template BType
 * @psalm-template CType
 */
final class F extends Combinator
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
     * F constructor.
     *
     * @psalm-param AType $x
     * @psalm-param BType $y
     * @psalm-param callable(BType): callable(AType): CType $f
     *
     * @param mixed $x
     * @param mixed $y
     * @param callable $f
     */
    public function __construct($x, $y, callable $f)
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
}
