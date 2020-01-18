<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use loophp\combinator\Combinator;

/**
 * Class E.
 */
final class E extends Combinator
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
     * @var mixed
     */
    private $z;

    /**
     * E constructor.
     *
     * @param callable $f
     * @param mixed $x
     * @param callable $g
     * @param mixed $y
     * @param mixed $z
     */
    public function __construct(callable $f, $x, callable $g, $y, $z)
    {
        $this->f = $f;
        $this->g = $g;
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
    }

    /**
     * @return mixed
     */
    public function __invoke()
    {
        return (($this->f)($this->x))((($this->g)($this->y))($this->z));
    }

    /**
     * @return callable
     */
    public static function closure(): callable
    {
        return static function (callable $f, $x, callable $g, $y, $z) {
            return (new self($f, $x, $g, $y, $z))();
        };
    }
}
