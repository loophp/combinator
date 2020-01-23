<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use loophp\combinator\Combinator;

/**
 * Class U.
 */
final class U extends Combinator
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
     * U constructor.
     *
     * @param callable $f
     * @param callable $g
     */
    public function __construct(callable $f, callable $g)
    {
        $this->f = $f;
        $this->g = $g;
    }

    /**
     * @return mixed
     */
    public function __invoke()
    {
        $f = $this->f;
        $g = $this->g;

        return $g(($f($f))($g));
    }
}
