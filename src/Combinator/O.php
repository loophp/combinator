<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use loophp\combinator\Combinator;

/**
 * Class O.
 *
 * @psalm-template AType
 * @psalm-template BType
 */
final class O extends Combinator
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
     * O constructor.
     *
     * @param callable(callable(AType): BType): AType $f
     * @param callable(AType): BType $g
     */
    public function __construct(callable $f, callable $g)
    {
        $this->f = $f;
        $this->g = $g;
    }

    /**
     * @psalm-return BType
     */
    public function __invoke()
    {
        return ($this->g)((($this->f)($this->g)));
    }
}
