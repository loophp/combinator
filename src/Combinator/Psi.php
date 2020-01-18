<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use loophp\combinator\Combinator;

/**
 * Class Psi.
 */
final class Psi extends Combinator
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
     * @var mixed
     */
    private $y;

    /**
     * Psi constructor.
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
        return ($this->f)(($this->g)($this->x), ($this->g)($this->y));
    }

    /**
     * @return callable
     */
    public static function closure(): callable
    {
        return static function (callable $f, callable $g, $x, $y) {
            return (new self($f, $g, $x, $y))();
        };
    }
}
