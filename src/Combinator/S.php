<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use loophp\combinator\Combinator;

/**
 * Class S.
 *
 * @psalm-template AType
 * @psalm-template BType
 * @psalm-template CType
 */
final class S extends Combinator
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
     * S constructor.
     *
     * @psalm-param callable(AType): callable(BType): CType $f
     * @psalm-param callable(AType): BType $g
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
        return ($this->f)($this->x)(($this->g)($this->x));
    }
}
