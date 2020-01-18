<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use loophp\combinator\Combinator;

/**
 * Class Q.
 */
final class Q extends Combinator
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
     * Q constructor.
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
        return ($this->g)((($this->f)($this->x)));
    }

    /**
     * @return callable
     */
    public static function closure(): callable
    {
        return static function (callable $f, callable $g, $x) {
            return (new self($f, $g, $x))();
        };
    }
}
