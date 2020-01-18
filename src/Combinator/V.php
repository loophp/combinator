<?php

declare(strict_types=1);

namespace loophp\combinator\Combinator;

use loophp\combinator\Combinator;

/**
 * Class V.
 */
final class V extends Combinator
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
     * @var mixed
     */
    private $y;

    /**
     * V constructor.
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
        return (($this->f)($this->x))($this->y);
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
