<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use loophp\combinator\Combinator;

/**
 * Class F.
 */
final class F extends Combinator
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
     * @var callable
     */
    private $y;

    /**
     * F constructor.
     *
     * @param mixed $x
     * @param mixed $y
     * @param callable $f
     */
    public function __construct($x, $y, callable $f)
    {
        $this->f = $f;
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @return mixed
     */
    public function __invoke()
    {
        return ($this->f)($this->y)($this->x);
    }

    /**
     * @return callable
     */
    public static function closure(): callable
    {
        return static function ($x, $y, callable $f) {
            return (new self($x, $y, $f))();
        };
    }
}
