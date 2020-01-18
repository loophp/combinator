<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use loophp\combinator\Combinator;

/**
 * Class D.
 */
final class D extends Combinator
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
     * D constructor.
     *
     * @param callable $f
     * @param callable $g
     * @param mixed $x
     * @param mixed $y
     */
    public function __construct(callable $f, $x, callable $g, $y)
    {
        $this->f = $f;
        $this->x = $x;
        $this->g = $g;
        $this->y = $y;
    }

    /**
     * @return mixed
     */
    public function __invoke()
    {
        return (($this->f)($this->x))(($this->g)($this->y));
    }

    /**
     * @return callable
     */
    public static function closure(): callable
    {
        return static function (callable $f, $x, callable $g, $y) {
            return (new self($f, $x, $g, $y))();
        };
    }
}
