<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use loophp\combinator\Combinator;

/**
 * Class A.
 */
final class A extends Combinator
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
     * A constructor.
     *
     * @param callable $f
     * @param mixed $x
     */
    public function __construct(callable $f, $x)
    {
        $this->f = $f;
        $this->x = $x;
    }

    /**
     * @return mixed
     */
    public function __invoke()
    {
        return ($this->f)($this->x);
    }
}
