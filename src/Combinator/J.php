<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use loophp\combinator\Combinator;

/**
 * Class J.
 */
final class J extends Combinator
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
     * @var mixed
     */
    private $z;

    /**
     * J constructor.
     *
     * @param callable $f
     * @param mixed $x
     * @param mixed $y
     * @param mixed $z
     */
    public function __construct(callable $f, $x, $y, $z)
    {
        $this->f = $f;
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
    }

    /**
     * @return mixed
     */
    public function __invoke()
    {
        return (($this->f)($this->x))((($this->f)($this->z))($this->y));
    }
}
