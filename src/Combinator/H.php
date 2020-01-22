<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use loophp\combinator\Combinator;

/**
 * Class H.
 */
final class H extends Combinator
{
    /**
     * @var callable
     */
    private $f;

    /**
     * @var callable
     */
    private $x;

    /**
     * @var mixed
     */
    private $y;

    /**
     * H constructor.
     *
     * @param callable $f
     * @param mixed $x
     * @param mixed $y
     */
    public function __construct(callable $f, $x, $y)
    {
        $this->f = $f;
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @return mixed
     */
    public function __invoke()
    {
        return ((($this->f)($this->x))($this->y))($this->x);
    }
}
