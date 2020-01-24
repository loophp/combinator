<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use loophp\combinator\Combinator;

/**
 * Class L.
 *
 * @psalm-template ResultType
 */
final class L extends Combinator
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
     * L constructor.
     *
     * @param callable $f
     * @param callable $g
     */
    public function __construct(callable $f, callable $g)
    {
        $this->f = $f;
        $this->g = $g;
    }

    /**
     * @psalm-return ResultType
     *
     * @return mixed
     */
    public function __invoke()
    {
        return ($this->f)(($this->g)($this->g));
    }
}
