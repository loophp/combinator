<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use loophp\combinator\Combinator;

/**
 * Class G.
 */
final class G extends Combinator
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
     * @var callable
     */
    private $y;

    /**
     * G constructor.
     *
     * @param callable $f
     * @param callable $g
     * @param mixed $x
     * @param mixed $y
     */
    public function __construct(callable $f, callable $g, $x, $y)
    {
        $this->f = $f;
        $this->g = $g;
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @return mixed
     */
    public function __invoke()
    {
        return (($this->f)($this->y))(($this->g)($this->x));
    }
}
