<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use loophp\combinator\Combinator;

/**
 * Class R.
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
     * @return mixed
     */
    public function __invoke()
    {
        return (($this->f)($this->y))($this->x);
    }
}
