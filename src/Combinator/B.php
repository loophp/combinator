<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use loophp\combinator\Combinator;

/**
 * Class B.
 */
final class B extends Combinator
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
     * B constructor.
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
     * @return mixed
     */
    public function __invoke()
    {
        return ($this->f)(($this->g)($this->x));
    }
}
