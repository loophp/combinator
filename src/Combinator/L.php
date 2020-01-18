<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use loophp\combinator\Combinator;

/**
 * Class L.
 */
final class L extends Combinator
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
     * L constructor.
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
        return ($this->f)((($this->g)($this->g)));
    }

    /**
     * @return callable
     */
    public static function closure(): callable
    {
        return static function (callable $f, callable $g) {
            return (new self($f, $g))();
        };
    }
}
